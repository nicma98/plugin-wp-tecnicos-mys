<?php
/**
 * Plugin Name:   Técnicos de Motos & Servitecas
 * Plugin URI:
 * Description:   Plugin para el servicio técnico de Motos & Servitecas.
 * Version:       1.0.0
 * Author: Nicolas Muñoz
 * Author URI:
 * Text Domain:   tecnicos-mys
 *
 * @package     Motos&Servitecas_Tecnicos
 */
 
defined( 'ABSPATH' ) || die();

global $wpdb;
 
define( 'SERVICIOS_MYS_DIR', plugin_dir_path( __FILE__ ) );
define( 'SERVICIOS_MYS_PLUGIN_FILE', __FILE__ );
define( 'SERVICIOS_MYS_PLUGIN_URL', plugins_url() . '/mys-tecnicos' );
define( 'SERVICIOS_MYS_VERSION', '1.0.0' );
define( 'SERVICIOS_MYS_TEXT_DOMAIN', 'tecnicos-mys' );

/**
 * Código que se ejecuta en la activación del plugin
 */
function tecnicos_mys_activate() {
    require_once SERVICIOS_MYS_DIR . 'includes/class-mys-activator.php';
	MYS_Activator::activate();
}
register_activation_hook( __FILE__, 'tecnicos_mys_activate' );

/**
 * Código que se ejecuta en la desactivación del plugin
 */
function tecnicos_mys_deactivate() {
    require_once SERVICIOS_MYS_DIR . 'includes/class-mys-deactivator.php';
	MYS_Deactivator::deactivate();
}
register_deactivation_hook( __FILE__, 'tecnicos_mys_deactivate' );
 
/**
 * Requiriendo la clase master
 */
require_once SERVICIOS_MYS_DIR . 'includes/class-mys-master.php';

/**
 * Funcion para iniciar la clase master
 */
function mys_run_master_class_tecnicos(){
    $master = new MYS_Master();
    $master->init();
}

mys_run_master_class_tecnicos();