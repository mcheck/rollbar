<?php
/**
 * @brief		[DF] Rollbar Application Class
 * @author		<a href=''>Daniel Fatkic</a>
 * @copyright	(c) 2019 Daniel Fatkic
 * @package		Invision Community
 * @subpackage	[DF] Rollbar
 * @since		22 Mar 2019
 * @version		
 */
 
namespace IPS\rollbar;

/**
 * [DF] Rollbar Application Class
 */
class _Application extends \IPS\Application
{
	PUBLIC CONST GITHUB_REPO = "https://github.com/DanielFatkic/rollbar";

	/**
	 * Get any third parties this app uses for the privacy policy
	 *
	 * @return array( title => language bit, description => language bit, privacyUrl => privacy policy URL )
	 */
	public function privacyPolicyThirdParties()
	{
		return [[
			'title' => \IPS\Member::loggedIn()->language()->addToStack("rollbar"),
			'description' => "We're using rollbar to monitor website errors",
			'privacyUrl' => "https://docs.rollbar.com/docs/privacy-policy"
		]];
	}

	protected function get__icon()
	{
		return "exclamation-triangle";
	}
}