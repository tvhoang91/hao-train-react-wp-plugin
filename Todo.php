<?php

namespace NinjaTodo;

/**
 * Todo
 *
 * @package       TODO
 * @author        Ninjateam
 * @license       gplv2
 * @version       1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:   Todo
 * Plugin URI:    https://ninjateam.org/
 * Description:   Manage your todo task quickly and flexible.
 * Version:       1.0.0
 * Author:        Ninjateam
 * Author URI:    https://ninjateam.org/
 * Text Domain:   njt-todo
 * Domain Path:   /languages
 * License:       GPLv2
 * License URI:   https://www.gnu.org/licenses/gpl-2.0.html
 *
 * You should have received a copy of the GNU General Public License
 * along with Todo. If not, see <https://www.gnu.org/licenses/gpl-2.0.html/>.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * HELPER COMMENT START
 *
 * This file contains the main information about the plugin.
 * It is used to register all components necessary to run the plugin.
 *
 * The comment above contains all information about the plugin
 * that are used by WordPress to differenciate the plugin and register it properly.
 * It also contains further PHPDocs parameter for a better documentation
 *
 * The function TODO() is the main function that you will be able to
 * use throughout your plugin to extend the logic. Further information
 * about that is available within the sub classes.
 *
 * HELPER COMMENT END
 */

// Plugin name
define( 'TODO_NAME', 'Todo' );

// Plugin version
define( 'TODO_VERSION', '1.0.0' );

// Plugin Root File
define( 'TODO_PLUGIN_FILE', __FILE__ );

// Plugin base
define( 'TODO_PLUGIN_BASE', plugin_basename( TODO_PLUGIN_FILE ) );

// Plugin Folder Path
define( 'TODO_PLUGIN_DIR', plugin_dir_path( TODO_PLUGIN_FILE ) );

// Plugin Folder URL
define( 'TODO_PLUGIN_URL', plugin_dir_url( TODO_PLUGIN_FILE ) );

// Plugin Environment
define( 'TODO_PLUGIN_DEVELOPMENT', true );

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}


/**
 * The main function to load the only instance
 * of our master class.
 *
 * @author  Ninjateam
 * @since   1.0.0
 * @return  object|Todo
 */
function TODO() {
	return Init::instance();
}

TODO();
