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
//$installer->update('system');
//$installer->run( );

$install = array('system','user');
foreach($install as $package)
{
	$installer->install( $package );
}
$installer->save( );

foreach($_NYAA_LOG as $log) echo '<li>'.$log.'</li>';
?>
