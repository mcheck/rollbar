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


	protected function get__icon()
	{
		return "exclamation-triangle";
	}
}