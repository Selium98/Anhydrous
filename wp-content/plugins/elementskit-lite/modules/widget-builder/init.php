<?php
namespace ElementsKit\Modules\Widget_Builder;

defined( 'ABSPATH' ) || exit;

class Init{
    private $dir;
    private $url;

    public function __construct(){

        // get current directory path
        $this->dir = dirname(__FILE__) . '/';

        // get current module's url
		$this->url = \ElementsKit::plugin_url() . 'modules/widget-builder/';

		// include all necessary files
		$this->include_files();

		//hooks
		add_action('admin_enqueue_scripts', [$this, 'load_scripts']);
		add_action('add_meta_boxes', [$this, 'register_meta_boxes']);
		// add_action('elementor/init', [$this, 'elementor_widget_category']);
		add_action( 'elementor/widgets/widgets_registered', [$this, 'register_widgets']);

		// calling necessary classess
		new Api\Common();
		new Cpt();
	}
	
	public function include_files(){
		// include $this->dir . 'extend-controls.php';
	}

	public function register_widgets($widgets_manager){
		$widgets = get_posts([
			'post_type'   => 'elementskit_widget',
			'post_status' => 'publish'
            // 'numberposts' => 0
		]);

		$upload = wp_upload_dir();
		foreach($widgets as $widget){
			$slug = 'ekit_wb_' . $widget->ID;
			$dir = $upload['basedir'] . '/elementskit/custom_widgets/' . $slug . '/';
			$file = $dir . 'widget.php';
			$class_name = '\Elementor\Ekit_Wb_' . $widget->ID;

			if(file_exists($file)){
				include $file;
				$widgets_manager->register_widget_type(new $class_name());
			}
		}

	}

    public function elementor_widget_category($widgets_manager){
		\Elementor\Plugin::$instance->elements_manager->add_category(
			'elementskit',
			[
				'title' =>esc_html__( 'ElementsKit Custom', 'elementskit' ),
				'icon' => 'fa fa-plug',
			],
			1
		);
	}

	public function load_scripts(){
		$screen = get_current_screen();
		
		if($screen->id != 'elementskit_widget'){
			return;
		}

		wp_enqueue_style( 'google-fonts-roboto', 'https://fonts.googleapis.com/css?family=Roboto:300,400,500,700', [], null );
		wp_enqueue_style( 'font-awesome', ELEMENTOR_ASSETS_URL . 'lib/font-awesome/css/all.min.css', [], null );
		wp_enqueue_style( 'elementskit-widget-builder-editor-css', $this->url . 'assets/css/ekit-widget-builder-editor.css', [], \ElementsKit::VERSION );
		wp_enqueue_style( 'elementskit-widget-builder-common-css', $this->url . 'assets/css/ekit-widget-builder-common.css', [], \ElementsKit::VERSION );

		wp_enqueue_script( 'elementskit-widget-builder-editor-js', $this->url . 'assets/js/ekit-widget-builder-editor.js', [], \ElementsKit::VERSION, true );
	}

	public function register_meta_boxes() {
		add_meta_box( 'elementskit-widget-builder-markup', __( 'My Meta Box', 'textdomain' ), [$this, 'metabox_display_callback'], 'elementskit_widget' );
	}

	public function metabox_display_callback( $post ) {
		include $this->dir . 'views/builder.php';
	}
	
}
