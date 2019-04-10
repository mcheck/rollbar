//<?php

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !\defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	exit;
}

class rollbar_hook_output extends _HOOK_CLASS_
{


	/**
	 * Display Error Screen
	 *
	 * @param    string 			$message 			language key for error message
	 * @param    mixed 				$code 				Error code
	 * @param    int 				$httpStatusCode 	HTTP Status Code
	 * @param    string 			$adminMessage 		language key for error message to show to admins
	 * @param    array 				$httpHeaders 		Additional HTTP Headers
	 * @param    string 			$extra 				Additional information (such backtrace or API error) which will be shown to admins
	 * @param	int|string|NULL		$faultyAppOrHookId	The 3rd party application or the hook id, which caused this error, NULL if it was a core application
	 */
	public function error( $message, $code, $httpStatusCode=500, $adminMessage=NULL, $httpHeaders=array (
), $extra=NULL, $faultyAppOrHookId=NULL )
	{
		if ( defined('DF_ROLLBAR_SERVER_TOKEN') AND defined('LOG_IPS_ERRORS' ) )
		{
			/* Send errors to rollbar */
			$info = array(
				'level' => (int)\substr( $code, 0, 1 ),
				'member_id' => \IPS\Member::loggedIn()->member_id ?: 0,
				'log_error' => $message,
				'log_error_code' => $code,
				'log_ip_address' => \IPS\Request::i()->ipAddress(),
			);

			$logger = \Rollbar\Rollbar::logger();
			$logger->error(\IPS\Member::loggedIn()->language()->get($message), $info);
		}
		return parent::error( $message, $code, $httpStatusCode, $adminMessage, $httpHeaders, $extra, $faultyAppOrHookId );
	}

}
