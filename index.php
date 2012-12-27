<?php
	define('APP_PREFIX', '/joxy');
	include('head.php');
	echo("\n");
	
	if (is_file($aPage . '.php')) {
		include($aPage . '.php');
	} else {
		include('404.php');
	}
	echo("\n");
	
	include('foot.php');
	echo("\n");
?>