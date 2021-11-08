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
			add_action('wp_enqueue_scripts', array($this, 'js_init') );
		}

		public function js_init() {
    		wp_enqueue_script( 'string-translator-js', plugins_url( '/js/string_translator.js', __FILE__ ));
    		$translation_array = array(
    			'some_string' => __( 'Some string to translate', 'string_translator' ),
    			'a_value' => '10'
			);
			wp_set_script_translations('string-translator-js', 'string_translator', plugin_dir_path(__FILE__) . '/languages/' );
			wp_localize_script( 'string-translator-js', 'object_name', $translation_array );
		}		
 
		public function sample_plugin_setup_menu()	{	
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
			$my_content = sprintf( __("Today's date is %1s and time is %2s" , 'string_translator'), $date, $time );
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