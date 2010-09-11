<?php
/**
 * kamunagara
 */
require_once 'header.php';
require_once 'fw/fw.class.php';

$rootdir = ROOT.'/site';
$file    = ROOT.'/site/root.conf';

$installer = NyaaFW::factory( $file, array(
	'fw.type'=>"installer",
	'fw.appmap'=>'default',
	'root.dir'=>$rootdir,
	'package.dir'=>ROOT.'/package'
));
//$installer->disable('system');
//$installer->enable('system');
$installer->update('system');



$handler = NyaaFW::factory( $file, array(
	'fw.type'=>"web",
	'fw.appmap'=>'default',
	'root.dir'=>$rootdir
));
$handler->setSession( $_SESSION );
$handler->setCookie( $_COOKIE );
$handler->setRequest( isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO']: '', $_POST, $_GET );
$handler->init( );
$handler->run( );

foreach($_NYAA_LOG as $log) echo '<li>'.$log.'</li>';
?>
