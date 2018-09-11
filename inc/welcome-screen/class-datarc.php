<?php

class Datarc_Welcome {

	public $recommended_plugins = array(
		'elementor'  => array(
			'recommended' => false,
		),
		'contact-form-7'    => array(
			'recommended' => false,
		),
		'one-click-demo-import' => array(
			'recommended' => false,
		)
	);

	public $recommended_actions;

	public $theme_slug = 'datarc';

	function __construct() {

		if ( ! is_admin() && ! is_customize_preview() ) {
			return;
		}

		$this->load_class();

		$this->recommended_actions = apply_filters(
			'datarc_required_actions', array(
				array(
					'id'          => 'datarc-req-ac-install-companion-plugin',
					'title'       => Datarc_Notify_System::datarc_companion_title(),
					'description' => Datarc_Notify_System::datarc_companion_description(),
					'check'       => Datarc_Notify_System::datarc_has_plugin( 'datarc-companion' ),
					'plugin_slug' => 'datarc-companion',
				),
				array(
					'id'          => 'datarc-req-ac-install-elementor',
					'title'       => Datarc_Notify_System::datarc_elementor_title(),
					'description' => Datarc_Notify_System::datarc_elementor_description(),
					'check'       => Datarc_Notify_System::datarc_has_plugin( 'elementor' ),
					'plugin_slug' => 'elementor',
				),
				array(
					'id'          => 'datarc-req-ac-install-contact-form-7',
					'title'       => Datarc_Notify_System::datarc_cf7_title(),
					'description' => Datarc_Notify_System::datarc_cf7_description(),
					'check'       => Datarc_Notify_System::datarc_has_plugin( 'contact-form-7' ),
					'plugin_slug' => 'contact-form-7',
				),
				array(
					'id'          => 'datarc-req-ac-install-oneclick',
					'title'       => Datarc_Notify_System::datarc_oneclick_title(),
					'description' => Datarc_Notify_System::datarc_oneclick_description(),
					'check'       => Datarc_Notify_System::datarc_has_plugin( 'one-click-demo-import' ),
					'plugin_slug' => 'one-click-demo-import',
				),
				array(
					'id'          => 'datarc-req-import-content',
					'title'       => esc_html__( 'Import Demo Content', 'datarc' ),
					'description' => esc_html__( 'Clicking the button below will import demo data. Before import demo data please install all recommended plugins.', 'datarc' ),
					'help'        => $this->generate_action_html(),
					'check'       => Datarc_Notify_System::datarc_has_content(),
				),
			)
		);

		$this->init_epsilon();
		$this->init_welcome_screen();

		// Hooks
		add_action( 'customize_register', array( $this, 'init_customizer' ) );

	}

	public function load_class() {

		if ( ! is_admin() && ! is_customize_preview() ) {
			return;
		}

		require_once get_template_directory() . '/inc/welcome-screen/class-datarc-notify-system.php';
		require_once get_template_directory() . '/inc/welcome-screen/class-epsilon-welcome-screen.php';

	}

	public function init_epsilon() {

		$args = array(
			'controls' => array( 'slider', 'toggle' ), // array of controls to load
			'sections' => array( 'recommended-actions', 'pro' ), // array of sections to load
			'backup'   => false,
		);

		new Epsilon_Framework( $args );

	}

	public function init_welcome_screen() {

		Epsilon_Welcome_Screen::get_instance(
			$config = array(
				'theme-name' => 'Datarc',
				'theme-slug' => 'datarc',
				'actions'    => $this->recommended_actions,
				'plugins'    => $this->recommended_plugins,
			)
		);

	}

	public function init_customizer( $wp_customize ) {
		$current_theme = wp_get_theme();
		$wp_customize->add_section(
			new Epsilon_Section_Recommended_Actions(
				$wp_customize, 'epsilon_recomended_section', array(
					'title'                        => esc_html__( 'Recomended Actions', 'datarc' ),
					'social_text'                  => esc_html( $current_theme->get( 'Author' ) ) . esc_html__( ' is social :', 'datarc' ),
					'plugin_text'                  => esc_html__( 'Recomended Plugins :', 'datarc' ),
					'actions'                      => $this->recommended_actions,
					'plugins'                      => $this->recommended_plugins,
					'theme_specific_option'        => $this->theme_slug . '_show_required_actions',
					'theme_specific_plugin_option' => $this->theme_slug . '_show_required_plugins',
					'facebook'                     => 'https://www.facebook.com/colorlib',
					'twitter'                      => 'https://twitter.com/colorlib',
					'wp_review'                    => true,
					'priority'                     => 0,
				)
			)
		);

	}

	private function generate_action_html() {

		$import_actions = array(
			'set-frontpage'  => esc_html__( 'Set Static FrontPage', 'datarc' ),
			'import-widgets' => esc_html__( 'Import HomePage Widgets', 'datarc' ),
		);

		$import_plugins = array(
			'datarc-companion' => esc_html__( 'Datarc Companion', 'datarc' ),
			'jetpack'           => esc_html__( 'Jetpack', 'datarc' ),
			'contact-form-7'    => esc_html__( 'Contact Form 7', 'datarc' ),
		);

		$plugins_html = '';

		if ( is_customize_preview() ) {
			$url  = 'themes.php?page=%1$s-welcome&tab=%2$s';
			$html = '<a class="button button-primary" id="" href="' . esc_url( admin_url( sprintf( $url, 'datarc', 'recommended-actions' ) ) ) . '">' . __( 'Import Demo Content', 'datarc' ) . '</a>';
		} else {
			$html  = '<p><a class="button button-primary" target="_blank" href="'.esc_url(admin_url('themes.php?page=datarc-demo-import')).'">' . __( 'Go To Import Demo Content', 'datarc' ) . '</a>';
			$html .= '<div class="import-content-container" id="welcome-hidden-content">';

			foreach ( $import_plugins as $id => $label ) {
				if ( ! Datarc_Notify_System::datarc_has_plugin( $id ) ) {
					$plugins_html .= $this->generate_checkbox( $id, $label, 'plugins' );
				}
			}

			if ( '' != $plugins_html ) {
				$html .= '<div class="plugins-container">';
				$html .= '<h4>' . __( 'Plugins', 'datarc' ) . '</h4>';
				$html .= '<div class="checkbox-group">';
				$html .= $plugins_html;
				$html .= '</div>';
				$html .= '</div>';
			}

			$html .= '<div class="demo-content-container">';
			$html .= '<h4>' . __( 'Demo Content', 'datarc' ) . '</h4>';
			$html .= '<div class="checkbox-group">';
			foreach ( $import_actions as $id => $label ) {
				$html .= $this->generate_checkbox( $id, $label );
			}
			$html .= '</div>';
			$html .= '</div>';
			$html .= '</div>';
		}

		return $html;

	}

	private function generate_checkbox( $id, $label, $name = 'options', $block = false ) {
		$string = '<label><input checked type="checkbox" name="%1$s" class="demo-checkboxes"' . ( $block ? ' disabled ' : ' ' ) . 'value="%2$s">%3$s</label>';

		return sprintf( $string, $name, $id, $label );
	}

}

new Datarc_Welcome();
