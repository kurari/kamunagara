<?php
require_once dirname(__FILE__).'/system.class.php';

class SystemDefaultApp extends SystemApp
{

	function run( )
	{
		$tpl = $this->myName.'.html';
		return $this->getTemplater( )->fetch($tpl);
	}
}
?>
