<?php

namespace NinjaTodo\Classes;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * HELPER COMMENT START
 *
 * This class is used to bring your plugin to life.
 * All the other registered classed bring features which are
 * controlled and managed by this class.
 *
 * Within the add_hooks() function, you can register all of
 * your WordPress related actions and filters as followed:
 *
 * add_action( 'my_action_hook_to_call', array( $this, 'the_action_hook_callback', 10, 1 ) );
 * or
 * add_filter( 'my_filter_hook_to_call', array( $this, 'the_filter_hook_callback', 10, 1 ) );
 * or
 * add_shortcode( 'my_shortcode_tag', array( $this, 'the_shortcode_callback', 10 ) );
 *
 * Once added, you can create the callback function, within this class, as followed:
 *
 * public function the_action_hook_callback( $some_variable ){}
 * or
 * public function the_filter_hook_callback( $some_variable ){}
 * or
 * public function the_shortcode_callback( $attributes = array(), $content = '' ){}
 *
 *
 * HELPER COMMENT END
 */

/**
 * Class Todo_Run
 *
 * Thats where we bring the plugin to life
 *
 * @package     TODO
 * @subpackage  Classes/Todo_Run
 * @author      Ninjateam
 * @since       1.0.0
 */
class Run {
	private $hook_suffix;
	/**
	 * Our Todo_Run constructor
	 * to run the plugin logic.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		$this->add_hooks();
	}

	/**
	 * ######################
	 * ###
	 * #### WordPress HOOKS
	 * ###
	 * ######################
	 */

	/**
	 * Registers all WordPress and plugin related hooks
	 *
	 * @access  private
	 * @since   1.0.0
	 * @return  void
	 */
	private function add_hooks() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_backend_scripts_and_styles' ), 20 );
		add_action( 'admin_menu', array( $this, 'add_admin_menu_items' ), 100, 1 );
	}

	/**
	 * ######################
	 * ###
	 * #### WordPress HOOK CALLBACKS
	 * ###
	 * ######################
	 */

	/**
	 * Enqueue the backend related scripts and styles for this plugin.
	 * All of the added scripts andstyles will be available on every page within the backend.
	 *
	 * @access  public
	 * @since   1.0.0
	 *
	 * @return  void
	 */
	public function enqueue_backend_scripts_and_styles( $screen ) {
		if ( $screen !== $this->hook_suffix ) {
			return;
		}

		Vite::enqueueVite();
	}

	/**
	 * Add a new menu item to the WordPress topbar
	 *
	 * @access  public
	 * @since   1.0.0
	 *
	 * @param   object $admin_bar The WP_Admin_Bar object
	 *
	 * @return  void
	 */
	public function add_admin_menu_items() {
		$this->hook_suffix = add_menu_page(
			esc_html__( 'Todo List', 'njt-todo' ),
			esc_html__( 'Todo List', 'njt-todo' ),
			'manage_options',
			'njt-todo-settings',
			array( $this, 'njt_todo_options_page' ),
			'dashicons-businessman',
			55
		);
	}

	public function njt_todo_options_page() {
		echo "<div id='njt-app'></div>";
	}
}
