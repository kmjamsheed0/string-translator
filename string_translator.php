<?php
/*
Plugin Name: String Translation plugin
Description: A  plugin to translate string
Author: Jamsheed
Text Domain: string_translator
Domain Path: /languages
*/

if(!defined('WPINC')){ die; }

if(!class_exists('StringTranslator')) {	
	class StringTranslator {
		public function __construct() {
			add_action('init', array($this, 'plugin_load_textdomain') );
			add_action('admin_menu', array($this, 'sample_plugin_setup_menu') );
			add_filter('the_content', array($this, 'add_content_before') );
		}		
 
		public function sample_plugin_setup_menu()	{	
    		//add_menu_page( 'Sample Plugin Page', 'Sample Plugin', 'manage_options', 'sample-plugin', array($this, 'sample_init') );
			add_menu_page(
			__( 'StringTranslator Setting Page', 'string_translator' ),
			__( 'StringTranslator Setting Page', 'string_translator' ),
			'manage_options',
			'string_translator_setting_page',
			array($this, 'sample_init'),
			'',
			6
			);
		}		
 
		public function sample_init()	{
    		?>
			<h2><?php _e('My Plugin Title', 'string_translator'); ?></h2>
			<?php echo __('My Plugin Settings', 'string_translator'); ?>
			<?php
		}

		public function add_content_before($content) {
			$date = date(get_option('date_format'));
			$time = date("h:i:sa");
			//$time = '123';
			//$date = current_time( 'mysql' );	
			$my_content = sprintf( __("Today's date is %1s and time is %2s" , 'string_translator'), $date, $time );
			//$my_content = __("Today is ",'string_translator');
			$full_content = $my_content.$content;
			return $full_content; 
		}

		public function plugin_load_textdomain() {
			load_plugin_textdomain( 'string_translator', false, basename( dirname( __FILE__ ) ) . '/languages/' );
		}
	}
	new StringTranslator();
}
 
?>