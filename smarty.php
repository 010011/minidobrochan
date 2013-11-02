
<?php
	ini_set('display_errors', 'On');
	error_reporting(E_ALL | E_STRICT);
	require_once('env.php');
	require(ROOT . '/smrt/libs/Smarty.class.php');

	$smarty = new Smarty ();
	$smarty->template_dir= ROOT . 'smrt/tpl/';
	$smarty->compile_dir=	 ROOT . 'smrt/tplc/';
	$smarty->config_dir=	 ROOT . 'smrt/conf/';
	$smarty->cache_dir=		 ROOT . 'smrt/cache/'
?>
