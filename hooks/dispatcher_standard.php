//<?php

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !\defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	exit;
}

abstract class rollbar_hook_dispatcher_standard extends _HOOK_CLASS_
{

	public function init()
	{
		$this->initRollbar();
		parent::init();
	}


	protected function initRollbar()
	{
		if ( defined('DF_ROLLBAR_SERVER_TOKEN') )
		{
			require_once \IPS\ROOT_PATH . '/applications/rollbar/sources/vendor/autoload.php';
			$config = array(
				// required
				'access_token' => DF_ROLLBAR_SERVER_TOKEN,
				'environment' => \IPS\Settings::i()->base_url,
				'root' => \IPS\ROOT_PATH
			);
			\Rollbar\Rollbar::init($config);
		}
	}
}