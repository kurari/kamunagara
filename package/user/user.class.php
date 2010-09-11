<?php
/**
 * User Base App
 */


class UserApp extends NyaaFWApp
{
	function __construct( $FW )
	{
		parent::__construct( $FW );

		$lang = dirname(__FILE__).'/etc/message.jp';
		$FW->loadMessage( $lang);
	}

	function applyLogin( $Req )
	{
		$valid = dirname(__FILE__).'/etc/validater.toregister';
		$validater  = $this->validaterFactory($valid);
		$result = $validater->validate( $Req->get() );
		if( true !== $res = $validater->validate( $Req->get( ) ) ){
			foreach( $res as $e ) $errors[] = $e->getMessage( );
			return $this->FW->resultError( $Req, $errors );
		}
		$this->FW->redirect( 'user.register', $Req->get('email','password') );
	}

	function snipForm( )
	{
		$login = dirname(__FILE__).'/etc/form.login';
		$key = $this->myName.'.login';
		$bind['form'] = $form  = $this->formFactory($login, $key);
		if( false != $result = $this->FW->getResult( $key ))
		{
			$bind['form']->setValues( $result->getOr('request',array()) );
		}
		$bind['result'] = $result;
		return  $bind;
	}

}
?>
