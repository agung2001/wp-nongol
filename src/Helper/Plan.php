<?php

namespace Nongol\Helper;

!defined('WPINC ') or die();

/**
 * Helper library for Nongol framework
 *
 * @package    Nongol
 * @subpackage Nongol\Includes
 */

trait Plan
{
	/**
	 * Get Premium Plan Info
	 * @return bool
	 */
	public function isPremiumPlan()
	{
		return true;
		/** Get Plan from config.json file */
		$plan = $this->Framework->getConfig()->premium;

		/** Freemius - Check Premium Plan */
		if (function_exists('nongol_freemius')) {
			if (nongol_freemius()->is__premium_only()) {
				if (nongol_freemius()->is_plan('pro')) {
					$plan = 'pro';
				}
			}
		}

		return $plan;
	}

	/**
	 * Get Upgrade URL
	 * @return string
	 */
	public function getUpgradeURL()
	{
		return function_exists('nongol_freemius')
			? nongol_freemius()->get_upgrade_url()
			: false;
	}
}
