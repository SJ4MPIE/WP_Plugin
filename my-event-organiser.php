<?php 

    /**    
     
    * Plugin Name: My event organisator plugin
    * Plugin URI:  < your plugin url >
    * Description: This plugin will help organising an event with your website
    * Author:      Sam Tieman  
    * Author URI:  samtieman.com
    * Version:     0.0.1
    * Text Domain: my-event-organiser
    * Domain Path: languages 
    * This is distributed in the hope that it will be useful,
    * but WITHOUT ANY WARRANTY; without even the implied warranty of 
    * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    * GNU General Public License for more details.
    * You should have received a copy of the GNU General Public License 
    * along with your plugin. If not, see <http://www.gnu.org/licenses/>.
    */ 
    // Define the plugin name:
    define ( 'MY_EVENT_ORGANISER_PLUGIN', __FILE__ ); 

    // Include the general definition file:
    require_once plugin_dir_path( __FILE__ ) .  'includes/defs.php';

    class MyEventOrganiser { 
        public function __construct() {              
            // Fire a hook before the class is setup.
            do_action( 'my_event_organiser_pre_init' ); 
            // Load the plugin.
            add_action( 'init', array( $this, 'init' ), 1 );
        }
        /**      
        * Loads the plugin into WordPress.      
        * @since 1.0.0      
        */     
        public function init() { 
            // Run hook once Plugin has been initialized.
            do_action( 'my_event_organiser_init' ); 
            // Load admin only components.         
            if ( is_admin() ) { 
                // Load all admin specific includes             
                $this->requireAdmin();                           
                // Setup admin page             
                $this->createAdmin();
            }     
    }          
    /**      
    * Loads all admin related files into scope.      
    * @since 1.0.0      
    */     
    public function requireAdmin() { 
        // Admin controller file      
        require_once MY_EVENT_ORGANISER_PLUGIN_ADMIN_DIR. 
        '/MyEventOrganiser_AdminController.php';     
    }          
    /**      
    * Admin controller functionality      
    */     
    public function createAdmin(){                  
        MyEventOrganiser_AdminController::prepare();     
    }
}

// Instantiate the class 
$event_organiser = new MyEventOrganiser(); 
 
 ?> 