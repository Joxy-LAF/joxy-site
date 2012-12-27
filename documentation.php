<?php
	if ($aSubPage !== '' && is_file('documentation-' . $aSubPage . '.php')) {
		include('documentation-' . $aSubPage . '.php');
	} else {
		include('documentation-home.php');
	}
?>