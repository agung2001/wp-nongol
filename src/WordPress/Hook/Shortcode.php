<?php

namespace Nongol\WordPress\Hook;

!defined('WPINC ') or die();

/**
 * Abstract class for hook
 *
 * @package    Nongol
 * @subpackage Nongol\Includes\WordPress
 */

class Shortcode extends Hook
{
	/**
	 * Run hook
	 * @return  void
	 * NOTE: Theme can not run add_shortcode function
	 */
	public function run()
	{
		add_shortcode($this->hook, [$this->component, $this->callback]);
	}
}
