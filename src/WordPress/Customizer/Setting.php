<?php

namespace Nongol\WordPress\Customizer;

!defined( 'WPINC ' ) or die;

/**
 * Register all actions
 *
 * @package    Nongol
 * @subpackage Nongol\Includes\WordPress
 */

class Setting extends Customizer {

    /**
     * Build
     * @return  void
     */
    public function build($wp_customize){
        $wp_customize->add_setting($this->ID, $this->args);
    }

}