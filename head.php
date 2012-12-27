<?php
	$aPage = 'home';
	$aSubPage = '';
	if (isset($vRequest[1])) {
		if (in_array($vRequest[1], array('download', 'screenshots', 'documentation', 'faq', 'about'))) {
				$aPage = $vRequest[1];
				
				if ($vRequest[1] === 'documentation' && isset($vRequest[2]) && in_array($vRequest[2], array('download', 'compile', 'install', 'usage', 'problems'))) {
					$aSubPage = $vRequest[2];
				}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<!-- libraries -->
	<script src="<?= APP_PREFIX ?>/js/jquery.js"></script>
<?php if ($aPage === 'download') : ?>
	<script src="<?= APP_PREFIX ?>/js/switchDistro.js"></script>
<?php endif; ?>
	<script src="<?= APP_PREFIX ?>/Bootstrap/js/bootstrap.js"></script>
	<link href="<?= APP_PREFIX ?>/Bootstrap/css/bootstrap.css" rel="stylesheet">
	
	<!-- CSS styling -->
	<link type="text/css" href="<?= APP_PREFIX ?>/css/style.css" rel="stylesheet" />
	
	<title>Joxy</title>
</head>

<body>

<div id="konqi-duke-image"></div>

<div class="container">
	<div class="row" id="navrow">
		<center>
			<div class="btn-group upper-navbar center">
<?php
	$aMenuItems = array(
		'home' => 'Home',
		'download' => 'Download',
		'screenshots' => 'Screenshots',
		'documentation' => 'Documentation',
		'faq' => 'FAQ',
		'about' => 'About'
	);
	foreach ($aMenuItems as $aMIkey => $aMIval) {
		echo('				<a class="btn btn-small' . ($aPage === $aMIkey ? ' active' : '') . '" href="' . APP_PREFIX . '/' . $aMIkey . '">' . $aMIval . '</a>' . "\n");
	}
	unset($aMIkey);
	unset($aMIval);
?>
			</div>
<?php if ($aPage === 'documentation') : ?>
			<div class="btn-group upper-navbar lower-navbar">
<?php
	$aMenuItems = array(
		'download' => 'Download',
		'compile' => 'Compilation',
		'install' => 'Installation',
		'usage' => 'Usage',
		'problems' => 'Problems'
	);
	foreach ($aMenuItems as $aMIkey => $aMIval) {
		echo('				<a class="btn btn-small' . ($aSubPage === $aMIkey ? ' active' : '') . '" href="' . APP_PREFIX . '/documentation/' . $aMIkey . '">' . $aMIval . '</a>' . "\n");
	}
	unset($aMIkey);
	unset($aMIval);
?>
			</div>
<?php endif; ?>
		</center>
	</div>