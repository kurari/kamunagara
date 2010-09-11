<?php
define('ROOT',realpath('../'));
set_include_path(ROOT.'/lib');

//--------------------------------
// Setup Cache Handler
//--------------------------------
require_once 'cache/cache.class.php';
NyaaCache::stack(
	NyaaCache::factory(
		'dir',
		'SESSION',
		array('path'=>ROOT.'/site/cache')
	)
);

//--------------------------------
// Setup Log Handler
//--------------------------------
require_once 'log/log.class.php';
$_NYAA_LOG = array();
$logger    = new NyaaLog( );
$handler   = $logger->createHandler('capture');
$handler->bind($_NYAA_LOG);
$logger->addHandler(NyaaLog::ALL, $handler);
NyaaLog::addStack( $logger );


//--------------------------------
// Setup Session
//--------------------------------
require_once 'fw/session.handler.class.php';
$ses = new NyaaSessionHandler( );
session_set_save_handler( array($ses,'open'), array($ses,'close'), array($ses,'read'), array($ses,'write'), array($ses,'destroy'), array($ses,'gc'));
session_start();
?>
