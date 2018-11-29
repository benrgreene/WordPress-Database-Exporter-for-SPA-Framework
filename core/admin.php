<?php

class BRG_SPA_Admin_Interface_Controller {

    const SETTINGS_PAGE_SLUG  = 'brg_spa_settings_page';

    public function __construct() {
        add_action( 'admin_menu', array( $this, 'add_admin_menu') );
    }

    public function add_admin_menu() {
        $min_level = 'edit_posts';
        add_menu_page( 'SPA Exporter', 'SPA Exporter', $min_level, self::SETTINGS_PAGE_SLUG, array( $this, 'display_settings_page' ), 'dashicons-analytics' );
    }

    public function display_settings_page() {
        include plugin_dir_path( __DIR__ ) . 'templates/settings.php';
    }
}
