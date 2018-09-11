<?php

if ( ! class_exists( 'Datarc_Notify_System' ) ) {
	/**
	 * Class Datarc_Notify_System
	 */
	class Datarc_Notify_System extends Epsilon_Notify_System {
		/**
		 * @param $ver
		 *
		 * @return mixed
		 */
		public static function datarc_version_check( $ver ) {
			$datarc = wp_get_theme();

			return version_compare( $datarc['Version'], $ver, '>=' );
		}

		/**
		 * @return bool
		 */
		public static function datarc_is_not_static_page() {
			return 'page' == get_option( 'show_on_front' ) ? true : false;
		}


		/**
		 * @return bool
		 */
		public static function datarc_has_content() {
			$option = get_option( 'datarc_imported_demo', false );
			if ( $option ) {
				return true;
			};

			return false;
		}

		/**
		 * @return bool|mixed
		 */
		public static function datarc_check_import_req() {
			$needs = array(
				'has_content' => self::datarc_has_content(),
				'has_plugin'  => self::datarc_has_plugin( 'datarc-companion' ),
			);

			if ( $needs['has_content'] ) {
				return true;
			}

			if ( $needs['has_plugin'] ) {
				return false;
			}

			return true;
		}

		/**
		 * @return bool
		 */
		public static function datarc_check_plugin_is_installed( $slug ) {
			$slug2 = $slug;
			if ( 'wordpress-seo' === $slug ) {
				$slug2 = 'wp-seo';
			}

			$path = WPMU_PLUGIN_DIR . '/' . $slug . '/' . $slug2 . '.php';
			if ( ! file_exists( $path ) ) {
				$path = WP_PLUGIN_DIR . '/' . $slug . '/' . $slug2 . '.php';

				if ( ! file_exists( $path ) ) {
					$path = false;
				}
			}

			if ( file_exists( $path ) ) {
				return true;
			}

			return false;
		}

		/**
		 * @return bool
		 */
		public static function datarc_check_plugin_is_active( $slug ) {
			$slug2 = $slug;
			if ( 'wordpress-seo' === $slug ) {
				$slug2 = 'wp-seo';
			}

			$path = WPMU_PLUGIN_DIR . '/' . $slug . '/' . $slug2 . '.php';
			if ( ! file_exists( $path ) ) {
				$path = WP_PLUGIN_DIR . '/' . $slug . '/' . $slug2 . '.php';
				if ( ! file_exists( $path ) ) {
					$path = false;
				}
			}

			if ( file_exists( $path ) ) {
				include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

				return is_plugin_active( $slug . '/' . $slug2 . '.php' );
			}
		}

		public static function datarc_has_plugin( $slug = null ) {

			$check = array(
				'installed' => self::check_plugin_is_installed( $slug ),
				'active'    => self::check_plugin_is_active( $slug ),
			);

			if ( ! $check['installed'] || ! $check['active'] ) {
				return false;
			}

			return true;
		}

		public static function datarc_companion_title() {
			$installed = self::check_plugin_is_installed( 'datarc-companion' );
			if ( ! $installed ) {
				return esc_html__( 'Install: Datarc Companion Plugin', 'datarc' );
			}

			$active = self::check_plugin_is_active( 'datarc-companion' );
			if ( $installed && ! $active ) {
				return esc_html__( 'Activate: Datarc Companion Plugin', 'datarc' );
			}

			return esc_html__( 'Install: Datarc Companion Plugin', 'datarc' );
		}

		public static function datarc_elementor_title() {
			$installed = self::check_plugin_is_installed( 'elementor' );
			if ( ! $installed ) {
				return esc_html__( 'Install: Elementor Page Builder Plugin', 'datarc' );
			}

			$active = self::check_plugin_is_active( 'elementor' );
			if ( $installed && ! $active ) {
				return esc_html__( 'Activate: Elementor Page Builder Plugin', 'datarc' );
			}

			return esc_html__( 'Install: Elementor Page Builder Plugin', 'datarc' );
		}

		public static function datarc_weglot_title() {
			$installed = self::check_plugin_is_installed( 'weglot' );
			if ( ! $installed ) {
				return esc_html__( 'Install: Weglot Translate Plugin', 'datarc' );
			}

			$active = self::check_plugin_is_active( 'wordpress-seo' );
			if ( $installed && ! $active ) {
				return esc_html__( 'Activate: Weglot Translate Plugin', 'datarc' );
			}

			return esc_html__( 'Install: Weglot Translate Plugin', 'datarc' );
		}

		public static function datarc_woocommerce_title() {
			$installed = self::check_plugin_is_installed( 'woocommerce' );
			if ( ! $installed ) {
				return esc_html__( 'Install: WooCommerce', 'datarc' );
			}

			$active = self::check_plugin_is_active( 'woocommerce' );
			if ( $installed && ! $active ) {
				return esc_html__( 'Activate: WooCommerce', 'datarc' );
			}

			return esc_html__( 'Install: WooCommerce', 'datarc' );
		}

		public static function datarc_cf7_title() {
			$installed = self::check_plugin_is_installed( 'contac-form-7' );
			if ( ! $installed ) {
				return esc_html__( 'Install: Contact Form 7', 'datarc' );
			}

			$active = self::check_plugin_is_active( 'contac-form-7' );
			if ( $installed && ! $active ) {
				return esc_html__( 'Activate: Contact Form 7', 'datarc' );
			}

			return esc_html__( 'Install: Contact Form 7', 'datarc' );
		}

		public static function datarc_oneclick_title() {
			$installed = self::check_plugin_is_installed( 'one-click-demo-import' );
			if ( ! $installed ) {
				return esc_html__( 'Install: One Click Demo Import', 'datarc' );
			}

			$active = self::check_plugin_is_active( 'one-click-demo-import' );
			if ( $installed && ! $active ) {
				return esc_html__( 'Activate: One Click Demo Import', 'datarc' );
			}

			return esc_html__( 'Install: One Click Demo Import', 'datarc' );
		}

		/**
		 * @return string
		 */
		public static function datarc_companion_description() {
			$installed = self::check_plugin_is_installed( 'datarc-companion' );

			if ( ! $installed ) {
				return esc_html__( 'Please install Datarc Companion plugin.', 'datarc' );
			}

			$active = self::check_plugin_is_active( 'datarc-companion' );
			if ( $installed && ! $active ) {
				return esc_html__( 'Please activate Datarc Companion plugin.', 'datarc' );
			}

			return esc_html__( 'Please install Datarc Companion plugin.', 'datarc' );
		}

		/**
		 * @return string
		 */
		public static function datarc_woocommerce_description() {
			$installed = self::check_plugin_is_installed( 'woocommerce' );

			if ( ! $installed ) {
				return esc_html__( 'Please install WooCommerce. Note that you won\'t be able to use the shop without it.', 'datarc' );
			}

			$active = self::check_plugin_is_active( 'woocommerce' );
			if ( $installed && ! $active ) {
				return esc_html__( 'Please activate WooCommerce. Note that you won\'t be able to use the shop without it.', 'datarc' );
			}

			return esc_html__( 'Please install WooCommerce. Note that you won\'t be able to use the shop without it.', 'datarc' );
		}

		public static function datarc_cf7_description() {
			$installed = self::check_plugin_is_installed( 'contac-form-7' );

			if ( ! $installed ) {
				return esc_html__( 'Please install Contact Form 7. Note that you won\'t be able to use Contact Form without it.', 'datarc' );
			}

			$active = self::check_plugin_is_active( 'contac-form-7' );
			if ( $installed && ! $active ) {
				return esc_html__( 'Please activate Contact Form 7. Note that you won\'t be able to use Contact Form without it.', 'datarc' );
			}

			return esc_html__( 'Please install Contact Form 7. Note that you won\'t be able to use Contact Form without it.', 'datarc' );
		}

		public static function datarc_elementor_description() {
			$installed = self::check_plugin_is_installed( 'elementor' );
			if ( ! $installed ) {
				return esc_html__( 'Please install Elementor page builder plugin.', 'datarc' );
			}

			$active = self::check_plugin_is_active( 'elementor' );
			if ( $installed && ! $active ) {
				return esc_html__( 'Please activate Elementor page builder plugin.', 'datarc' );
			}

			return esc_html__( 'Please install Elementor page builder plugin.', 'datarc' );

		}

		public static function datarc_weglot_description() {
			$installed = self::check_plugin_is_installed( 'weglot' );
			if ( ! $installed ) {
				return esc_html__( 'Please install Weglot Translate plugin.', 'datarc' );
			}

			$active = self::check_plugin_is_active( 'weglot' );
			if ( $installed && ! $active ) {
				return esc_html__( 'Please activate Weglot Translate plugin.', 'datarc' );
			}

			return esc_html__( 'Please install Weglot Translate plugin.', 'datarc' );

		}

		public static function datarc_oneclick_description() {
			$installed = self::check_plugin_is_installed( 'one-click-demo-import' );
			if ( ! $installed ) {
				return esc_html__( 'Please install One Click Demo Import plugin to import demo data.', 'datarc' );
			}

			$active = self::check_plugin_is_active( 'one-click-demo-import' );
			if ( $installed && ! $active ) {
				return esc_html__( 'Please activate One Click Demo Import plugin to import demo data.', 'datarc' );
			}

			return esc_html__( 'Please install One Click Demo Import plugin to import demo data.', 'datarc' );

		}

		/**
		 * @return bool
		 */
		public static function datarc_is_not_template_front_page() {
			$page_id = get_option( 'page_on_front' );

			return get_page_template_slug( $page_id ) == 'page-templates/frontpage-template.php' ? true : false;
		}
	}
}// End if().
