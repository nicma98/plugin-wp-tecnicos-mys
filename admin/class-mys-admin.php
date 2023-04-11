<?php

/**
 * 
 */
class MYS_Admin {
    
    /**
	 * El identificador único de éste plugin
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name  El nombre o identificador único de éste plugin
	 */
    private $plugin_name;
    
    /**
	 * Versión actual del plugin
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version  La versión actual del plugin
	 */
    private $version;

    /**
     * 
     */
    private $menu_admin;

    /**
     * 
     */
    private $crud_db;
    
    /**
     * @param string $plugin_name nombre o identificador único de éste plugin.
     * @param string $version La versión actual del plugin.
     */
    public function __construct( $plugin_name, $version ) {
        
        $this->plugin_name = $plugin_name;
        $this->version = $version;  
        $this->menu_admin = new MYS_Menus();
        $this->crud_db = new MYS_CRUD_DB();
        
    }
    
    /**
	 * Registra los archivos de hojas de estilos del área de administración
	 *
	 * @since    1.0.0
     * @access   public
	 */
    public function enqueue_styles() {
        
        /**
         * Una instancia de esta clase debe pasar a la función run()
         * definido en BC_Cargador como todos los ganchos se definen
         * en esa clase particular.
         *
         * El BC_Cargador creará la relación
         * entre los ganchos definidos y las funciones definidas en este
         * clase.
		 */
		wp_enqueue_style( $this->plugin_name, SERVICIOS_MYS_PLUGIN_URL . '/admin/css/css-admin.css', array(), $this->version, 'all' );
        
    }
    
    /**
	 * Registra los archivos Javascript del área de administración
	 *
	 * @since    1.0.0
     * @access   public
	 */
    public function enqueue_scripts() {
        
        /**
         * Una instancia de esta clase debe pasar a la función run()
         * definido en BC_Cargador como todos los ganchos se definen
         * en esa clase particular.
         *
         * El BC_Cargador creará la relación
         * entre los ganchos definidos y las funciones definidas en este
         * clase.
		 */
        wp_enqueue_editor();
        wp_enqueue_script( $this->plugin_name, SERVICIOS_MYS_PLUGIN_URL . '/admin/js/js-admin.js', ['jquery'], $this->version, true );
        wp_localize_script(
            $this->plugin_name,
            'object_ajax',
            [
                'url' => admin_url('admin-ajax.php'),
                'token' => wp_create_nonce('mys_token')
            ]
        );
        
    }

    /**
     * Funcion para registrar menu principal
     */
    public function add_menu()
    {
        $this->menu_admin->add_menu_page(
            __('Tecnicos MYS','tecnicos-mys'),
            __('Tecnicos MYS','tecnicos-mys'),
            'manage_options',
            'tecnicos-mys',
            [$this, 'control_display_menu'],
            '',
            15
        );

        $this->menu_admin->run();
    }

    /**
     * Funcion para usar vista de pagina admin
     */
    public function control_display_menu()
    {
        require_once SERVICIOS_MYS_DIR . 'admin/partials/mys-tecnicos-admin.php';
    }
    
}