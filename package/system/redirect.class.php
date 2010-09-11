<?php
require_once dirname(__FILE__).'/system.class.php';

class SystemRedirectApp extends SystemApp
{

	function run( )
	{
		$Tpl=$this->getTemplater( );
		$Tpl->set('request',$this->Request->get());
		return $Tpl->fetch( $this->myName.'.html');
	}

}
?>
