<?php

namespace Nongol\Controller;
!defined('WPINC ') or die();

/**
 * Plugin hooks in a frontend
 *
 * @package    Nongol
 * @subpackage Nongol/Controller
 */

use Nongol\View;
use Nongol\Controller;
use Nongol\WordPress\Hook\Action;

class Frontend extends Controller
{
	/**
	 * Admin constructor
	 *
	 * @return void
	 * @var    object $plugin Plugin configuration
	 * @pattern prototype
	 */
	public function __construct($plugin)
	{
		parent::__construct($plugin);

		/** @frontend - Eneque scripts */
		$action = new Action();
		$action->setComponent($this);
		$action->setHook('wp_enqueue_scripts');
		$action->setCallback('frontend_enequeue');
		$action->setAcceptedArgs(0);
		$action->setMandatory(true);
		$action->setDescription(__('Enqueue frontend framework assets', 'nongol'));
		$this->hooks[] = $action;

		/** @frontend - Load modal DOM */
		$action = clone $action;
		$action->setHook('wp_footer');
		$action->setCallback('modal_dom');
		$action->setDescription(__('Load modal DOM', 'nongol'));
		$this->hooks[] = $action;
	}

	/**
	 * Eneque scripts @frontend
	 *
	 * @return  void
	 */
	public function frontend_enequeue()
	{
		$this->WP->wp_enqueue_style('nongol-style', 'build/css/frontend.min.css');
		$this->WP->wp_enqueue_script('nongol-script', 'build/js/frontend/frontend.min.js', array(), '', true);
	}

	/**
	 * Modal DOM
	 *
	 * @return  void
	 */
	public function modal_dom(){
		// Sections
		$sections = array();
		$sections['Frontend.modal.button'] = array();
		$sections['Frontend.modal.modal-1'] = array();

		// Load view.
		$view = new View( $this->Framework );
		$view->setTemplate( 'frontend.blank' );
		$view->setSections( $sections );
		$view->setOptions( array( 'shortcode' => true ) );
		$view->build();
	}
}
