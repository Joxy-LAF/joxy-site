<?php

/*
 * This file may be included from the index.php of Joxy.
 * In that case, "$aLang" should indicate the language.
 * If not set, English is supposed.
 *
 * Displays a 'gallery' of screenshots, supposing
 * there is a folder called 'screenshots'
 */

/**
 * Encode file to base64.
 * @see http://www.php.net/manual/en/function.base64-encode.php#105200
 */
function base64_encode_image($pFileName, $pFileType) {
	if ($pFileName) {
		$aImgBinary = fread(fopen($pFileName, "r"), filesize($pFileName));
		return 'data:image/' . $pFileType . ';base64,' . base64_encode($aImgBinary);
	}
}

/**
 * Read DESCRIPTION_FILE and search for the description for given file.
 * If no such description is found, null is returned.
 * Else, the description found is returned.
 */
function getImageDescription($pFileName) {
	global $aLang;
	if (!file_exists(DESCRIPTION_FILE))  return null;
	$pFileName = array_pop(explode('/', $pFileName));
	$aLines = file(DESCRIPTION_FILE);
	$aDescr = null;

	foreach ($aLines as $aLineNum => $aLine) {
		if ($aLine[0] === '#')  continue;
		$aLineSplit = explode('===', $aLine);
		$aFileDescr = explode('_', $aLineSplit[0]);
		$aLangDescr = trim(array_pop($aFileDescr));
		$aFileDescr = trim(implode('_', $aFileDescr));
		// The '_EN' can be left out, in that case, that is used.
		if (trim($aLineSplit[0]) === $pFileName || ($aFileDescr === $pFileName && ($aLangDescr === strtoupper($aLang) || (!isset($aLang) && strtoupper($aLangDescr) === 'EN')))) {
				array_shift($aLineSplit);
			$aDescr = trim(implode('===', $aLineSplit));
			break;
		}
	}
	unset($aLineNum);
	unset($aLine);

	return $aDescr;
}

/**
 * Read contents of given directory and return an array of filenames.
 * Only files ending in "png" are read, files are returned in sorted order.
 */
function readDirectory($pPath) {
	$aReturn = array();
	if ($aHandle = opendir($pPath)) {
		while (false !== ($aEntry = readdir($aHandle))) {
			if ($aEntry != "." && $aEntry != ".." && array_pop(explode(".", $aEntry)) == "png") {
			$aReturn[] = $pPath . $aEntry;
			}
		}
		closedir($aHandle);
	}
	sort($aReturn);
	return array_reverse($aReturn);
}

// Determine directory this file is located
$aBase = __FILE__;
$aBase = explode('/', $aBase);
unset($aBase[count($aBase) - 1]);
$aBase = implode('/', $aBase) . '/';

// Directory where screenshots should be located
$aScreenDir = $aBase . 'screenshots/';

// File with descriptions of images
define('DESCRIPTION_FILE', $aScreenDir . 'ImageDescriptions.txt');

?>
	<div class="row">
		<div class="span12">
			<div id="newsCarousel" class="carousel carousel-fixed-height slide topspace">
				<!-- Carousel items -->
				<div class="carousel-inner">
<?php
// Read contents of directory with screenshots
if (is_dir($aScreenDir)) {
	$aScreenshots = readDirectory($aScreenDir);
	if (count($aScreenshots) == 0) {
		echo('<p>' . ((!isset($aLang) || $aLang != "nl") ? 'No screenshots available yet, sorry.' : 'Er zijn nog geen schermafdrukken beschikbaar, sorry.' ) . '</p>');
	} else {
		$aFirstScreenshot = true;
		for ($i = 0; $i < count($aScreenshots); $i++) {
			$aScreenshotClass = ($aFirstScreenshot) ? 'active item' : 'item';
			$aImgDesc = getImageDescription($aScreenshots[$i]);
			if (is_null($aImgDesc))  continue;
			$aFirstScreenshot = false;
			echo(
					'					<div class="' . $aScreenshotClass . ' carousel-fixed-height">' . "\n" .
					'						<img class="screenshot" src="' . base64_encode_image($aScreenshots[$i], 'png') . '" alt="' . basename($aScreenshots[$i]) . '" />' . "\n" .
					'						<div class="carousel-caption">' . "\n" .
					'							<h4>' . basename($aScreenshots[$i]) . '</h4>' . "\n" .
					'							<p>' . $aImgDesc . '</p>' . "\n" .
					'						</div>' . "\n" .
					'					</div>' . "\n"
				);
		}
  }
} else {
  // Should never happen obviously
  echo('				<p>' . ((!isset($aLang) || $aLang != "nl") ? 'Oops. A fatal error occured.' : 'Oeps. Er is een fatale fout opgetreden.' ) . '</p>');
}
?>
				</div>
				<!-- Carousel nav -->
				<a class="carousel-control left" href="#newsCarousel" data-slide="prev">&lsaquo;</a>
				<a class="carousel-control right" href="#newsCarousel" data-slide="next">&rsaquo;</a>
			</div>
		</div>
	</div>