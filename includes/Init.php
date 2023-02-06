<?php

namespace NinjaTodo;

use NinjaTodo\Classes\Helpers;
use NinjaTodo\Classes\Run;
use NinjaTodo\Classes\Settings;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

final class Init {


	/**
	 * The real instance
	 *
	 * @access  private
	 * @since   1.0.0
	 * @var     object|Todo
	 */
	private static $instance;

	/**
	 * TODO helpers object.
	 *
	 * @access  public
	 * @since   1.0.0
	 * @var     object|Todo_Helpers
	 */
	public $helpers;

	/**
	 * TODO settings object.
	 *
	 * @access  public
	 * @since   1.0.0
	 * @var     object|Todo_Settings
	 */
	public $settings;

	/**
	 * Throw error on object clone.
	 *
	 * Cloning instances of the class is forbidden.
	 *
	 * @access  public
	 * @since   1.0.0
	 * @return  void
	 */
	public function __clone() {
		 _doing_it_wrong( __FUNCTION__, __( 'You are not allowed to clone this class.', 'njt-todo' ), '1.0.0' );
	}

	/**
	 * Disable unserializing of the class.
	 *
	 * @access  public
	 * @since   1.0.0
	 * @return  void
	 */
	public function __wakeup() {
		_doing_it_wrong( __FUNCTION__, __( 'You are not allowed to unserialize this class.', 'njt-todo' ), '1.0.0' );
	}

	/**
	 * Main Todo Instance.
	 *
	 * Insures that only one instance of Todo exists in memory at any one
	 * time. Also prevents needing to define globals all over the place.
	 *
	 * @access      public
	 * @since       1.0.0
	 * @static
	 * @return      object|Todo The one true Todo
	 */
	public static function instance() {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Init ) ) {
			self::$instance = new Init();
			self::$instance->base_hooks();
			self::$instance->helpers  = new Helpers();
			self::$instance->settings = new Settings();

			//Fire the plugin logic
			new Run();

			/**
			 * Fire a custom action to allow dependencies
			 * after the successful plugin setup
			 */
			do_action( 'TODO/plugin_loaded' );
		}

		return self::$instance;
	}

	/**
	 * Add base hooks for the core functionality
	 *
	 * @access  private
	 * @since   1.0.0
	 * @return  void
	 */
	private function base_hooks() {
		 add_action( 'plugins_loaded', array( self::$instance, 'load_textdomain' ) );
	}

	/**
	 * Loads the plugin language files.
	 *
	 * @access  public
	 * @since   1.0.0
	 * @return  void
	 */
	public function load_textdomain() {
		 load_plugin_textdomain( 'todo', false, dirname( plugin_basename( TODO_PLUGIN_FILE ) ) . '/languages/' );
	}
}
