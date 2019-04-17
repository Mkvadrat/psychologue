<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
/**
 * Plugin Name: Everest Timeline Lite
 * Plugin URI:  https://accesspressthemes.com/wordpress-plugins/everest-timeline-lite/
 * Description:  Plugin to Manage / Design Story/Event Timeline | 4 stunning, responsive, creative and powerful design.
 * Version:     1.0.4
 * Author:      AccessPress Themes
 * Author URI:  http://accesspressthemes.com/
 * Domain Path: /languages/
 * Text Domain: everest-timeline-lite
 * */
/**
 * Declartion of necessary constants for plugin
 * */
defined( 'ETLAK_VERSION' ) or define( 'ETLAK_VERSION', '1.0.4' ); //plugin version
defined( 'ETLAK_TD' ) or define( 'ETLAK_TD', 'everest-timeline-lite' ); //plugin's text domain
defined( 'ETLAK_IMG_DIR' ) or define( 'ETLAK_IMG_DIR', plugin_dir_url( __FILE__ ) . 'images' ); //plugin image directory
defined( 'ETLAK_JS_DIR' ) or define( 'ETLAK_JS_DIR', plugin_dir_url( __FILE__ ) . 'js' );  //plugin js directory
defined( 'ETLAK_CSS_DIR' ) or define( 'ETLAK_CSS_DIR', plugin_dir_url( __FILE__ ) . 'css' ); // plugin css dir
defined( 'ETLAK_PATH' ) or define( 'ETLAK_PATH', plugin_dir_path( __FILE__ ) );
defined( 'ETLAK_URL' ) or define( 'ETLAK_URL', plugin_dir_url( __FILE__ ) );

if ( ! class_exists( 'ETLAK_Class' ) ) {

    class ETLAK_Class{

        /**
         * Initializes the plugin functions
         */
        function __construct(){

            add_action( 'init', array( $this, 'etlak_plugin_text_domain' ) ); //loads text domain for translation ready
            add_action( 'wp_enqueue_scripts', array( $this, 'etlak_register_assets' ) ); //registers scripts and styles for front end
            add_action( 'init', array( $this, 'etlak_register_post_type' ) ); //register custom post type
            add_action( 'admin_enqueue_scripts', array( $this, 'etlak_register_admin_assets' ) ); //register plugin scripts and css in wp-admin
            add_action( 'add_meta_boxes', array( $this, 'etlak_add_blog_metabox' ) ); //added blog showcase metabox
            add_action( 'add_meta_boxes', array( $this, 'etlak_shortcode_usage_metabox' ) ); //added shortcode usages metabox
            add_action( 'save_post', array( $this, 'etlak_meta_save' ) );
            add_action( 'wp_ajax_etlak_selected_post_taxonomy', array( $this, 'etlak_selected_post_taxonomy' ) );
            add_action( 'wp_ajax_etlak_selected_taxonomy_terms', array( $this, 'etlak_selected_taxonomy_terms' ) );
            add_action( 'wp_ajax_etlak_hierarchy_terms', array( $this, 'etlak_hierarchy_terms' ) );
            add_action( 'wp_ajax_etlak_add_tax_condition', array( $this, 'etlak_add_tax_condition' ) );
            add_shortcode( 'et', array( $this, 'etlak_generate_shortcode' ) ); // generating shortcode
            add_action( 'template_redirect', array( $this, 'etlak_page_template_redirect' ) );
            add_filter( 'preview_post_link', array( $this, 'etlak_preview_page' ), 10, 2 );
            add_action( 'wp_ajax_etlak_filter_tax_terms', array( $this, 'etlak_filter_tax_terms' ) );
            add_action( 'wp_ajax_etlak_pagination_action', array( $this, 'etlak_pagination_action' ) );
            add_action( 'wp_ajax_nopriv_etlak_pagination_action', array( $this, 'etlak_pagination_action' ) );
            add_action( 'template_redirect', array( $this, 'etlak_preview_blog' ) );
            add_action( 'admin_menu', array( $this, 'etlak_register_about_us_page' ) ); //add submenu page
            add_action( 'admin_menu', array( $this, 'etlak_register_stuff_page' ) ); //add submenu page
            add_filter( 'post_row_actions', array( $this, 'etlak_remove_row_actions' ), 10, 1 );
            add_filter( 'manage_everesttimeline_posts_columns', array( $this, 'etlak_columns_head' ) );
            add_action( 'manage_everesttimeline_posts_custom_column', array( $this, 'etlak_columns_content' ), 10, 2 );
            add_action( 'admin_head-post-new.php', array( $this, 'etlak_posttype_admin_css' ) );
            add_action( 'admin_head-post.php', array( $this, 'etlak_posttype_admin_css' ) );
        }

//load the text domain for language translation
        function etlak_plugin_text_domain(){
            load_plugin_textdomain( 'everest-timeline-lite', false, basename( dirname( __FILE__ ) ) . '/languages/' );
        }

//register admin assets
        function etlak_register_admin_assets( $hook ){
            global $post;
            wp_enqueue_media();
            wp_enqueue_script( 'etlak-iconpicker-script', ETLAK_JS_DIR . '/icon-picker.js', array( 'jquery' ), ETLAK_VERSION );
            wp_enqueue_script( 'jquery-ui-core' );
            wp_enqueue_style( 'dashicons' );
            wp_enqueue_style( 'etlak-fontawesome', ETLAK_CSS_DIR . '/font-awesome.min.css', false, ETLAK_VERSION );
            wp_enqueue_script( 'etlak-admin-script', ETLAK_JS_DIR . '/et-admin-script.js', array( 'jquery', 'jquery-ui-sortable', 'jquery-ui-core', 'etlak-iconpicker-script' ), ETLAK_VERSION );
            $admin_ajax_nonce = wp_create_nonce( 'etlak-admin-ajax-nonce' );
            $admin_ajax_object = array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'ajax_nonce' => $admin_ajax_nonce );
            wp_localize_script( 'etlak-admin-script', 'etlak_backend_js_params', $admin_ajax_object );
            wp_enqueue_style( 'etlak-backend-style', ETLAK_CSS_DIR . '/etlak-backend-style.css', false, ETLAK_VERSION );
        }

//register frontend assests
        function etlak_register_assets(){
            wp_enqueue_style( 'dashicons' );
            wp_enqueue_style( 'etlak-fontawesome', ETLAK_CSS_DIR . '/font-awesome.min.css', false, ETLAK_VERSION );
            wp_enqueue_style( 'etlak-font', '//fonts.googleapis.com/css?family=Bitter|Hind|Playfair+Display:400,400i,700,700i,900,900i|Open+Sans:400,500,600,700,900|Lato:300,400,700,900|Montserrat|Droid+Sans|Roboto|Lora:400,400i,700,700i|Roboto+Slab|Rubik|Merriweather:300,400,700,900|Poppins|Ropa+Sans|Playfair+Display|Rubik|Source+Sans+Pro|Roboto+Condensed|Roboto+Slab:300,400,700|Amatic+SC:400,700|Quicksand|Oswald|Quicksand:400,500,700|Vollkorn:400,400i,600,600i,700,700i|Fjalla+One', false );
            wp_enqueue_style( 'etlak-frontend-style', ETLAK_CSS_DIR . '/etlak-frontend.css', false, ETLAK_VERSION );
            wp_enqueue_style( 'etlak-responsive-style', ETLAK_CSS_DIR . '/etlak-responsive.css', false, ETLAK_VERSION );
        }

//register  custom post type
        function etlak_register_post_type(){
            include('inc/admin/register/et-register-post.php');
            register_post_type( 'Everest Timeline', $args );
        }

//adding  metabox
        function etlak_add_blog_metabox(){
            add_meta_box( 'etlak_add_timeline', __( 'Everest Timeline', ETLAK_TD ), array( $this, 'etlak_add_timeline_callback' ), 'everesttimeline', 'normal', 'low' );
        }

        /*
         * callback function for Blog manager metabox
         */

        function etlak_add_timeline_callback( $post ){
            wp_nonce_field( basename( __FILE__ ), 'etlak_timeline_nonce' );
            include('inc/admin/et-timeline-meta.php');
        }

//save the metabox
        function etlak_meta_save( $post_id ){

// Checks save status
            $is_autosave = wp_is_post_autosave( $post_id );
            $is_revision = wp_is_post_revision( $post_id );
            $is_valid_nonce = ( isset( $_POST[ 'etlak_timeline_nonce' ] ) && wp_verify_nonce( $_POST[ 'etlak_timeline_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
// Exits script depending on save status
            if ( $is_autosave || $is_revision || ! $is_valid_nonce ) {
                return;
            }

            if ( isset( $_POST[ 'et_option' ] ) ) {
                $etlak_array = ( array ) $_POST[ 'et_option' ];
                $val = $this -> etlak_sanitize_array( $etlak_array );
                update_post_meta( $post_id, 'et_option', $val );
            }
            return;
        }

//adding  metabox
        function etlak_add_settings_metabox(){
            foreach ( array_keys( $GLOBALS[ 'wp_post_types' ] ) as $post_type ) {

                if ( in_array( $post_type, array( 'attachment', 'revision', 'nav_menu_item', 'everesttimeline' ) ) )
                    continue;

                add_meta_box( 'etlak_add_setting_timeline', __( 'Everest Timeline', ETLAK_TD ), array( $this, 'etlak_extra_field_callback' ), $post_type, 'normal', 'core' );
            }
        }

        function etlak_print_array( $array ){
            echo '<pre>';
            print_r( $array );
            echo '</pre>';
        }

        function etlak_selected_post_taxonomy(){
            global $wpdb;
            include( 'inc/ajax/fetch-taxonomy.php' );
            die();
        }

        function etlak_selected_taxonomy_terms(){
            global $wpdb;
            include( 'inc/ajax/fetch-terms.php' );
            die();
        }

        function etlak_hierarchy_terms(){
            global $wpdb;
            include( 'inc/ajax/hierarchy-terms.php' );
            die();
        }

        function etlak_add_tax_condition(){
            global $wpdb;
            include( 'inc/ajax/add-tax.php' );
            die();
        }

        function etlak_filter_tax_terms(){
            global $wpdb;
            include( 'inc/ajax/filter-tax.php' );
            die();
        }

        /*
         * Generate random key string
         */

        function etlak_generate_random_string( $length ){
            $string = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $random_string = '';
            for ( $i = 1; $i <= $length; $i ++ ) {
                $random_string .= $string[ rand( 0, 61 ) ];
            }
            return $random_string;
        }

        function etlak_generate_shortcode( $atts, $content = null ){

            ob_start();
            include('inc/frontend/et-frontend.php');
            $timeline = ob_get_contents();
            ob_end_clean();
            return $timeline;
        }

        /*
         * Shortcode Usage Metabox
         */

        function etlak_shortcode_usage_metabox(){
            add_meta_box( 'etlak_shortcode_usage_option', __( 'Everest Timeline Usage', ETLAK_TD ), array( $this, 'etlak_shortcode_usage' ), 'everesttimeline', 'side', 'default' );
        }

        function etlak_shortcode_usage( $post ){

            wp_nonce_field( basename( __FILE__ ), 'etlak_shortcode_usage_option_nonce' );
            include('inc/admin/settings/et-usages.php');
        }

//returns all the terms for category dropdown as options
        function etlak_fetch_category_list( $taxonomy, $term_id ){
            $option_html = "";
            $taxonomies_array[] = $taxonomy;
            $terms = get_terms( $taxonomy, array( 'hide_empty' => false ) );
            $categoryHierarchy = array();
            $this -> etlak_sort_terms_hierarchicaly( $terms, $categoryHierarchy );
            if ( count( $categoryHierarchy ) > 0 ) { //condition check if the taxonomy has atleast single term
                $terms_exclude = array();
                $option_html .= $this -> etlak_print_option( $categoryHierarchy, 1, '', '', $term_id );
            }

            return $option_html;
        }

        function etlak_sort_terms_hierarchicaly( Array &$cats, Array &$into, $parentId = 0 ){
            foreach ( $cats as $i => $cat ) {
                if ( $cat -> parent == $parentId ) {
                    $into[ $cat -> term_id ] = $cat;
                    unset( $cats[ $i ] );
                }
            }

            foreach ( $into as $topCat ) {
                $topCat -> children = array();
                $this -> etlak_sort_terms_hierarchicaly( $cats, $topCat -> children, $topCat -> term_id );
            }
        }

        function etlak_print_option( $terms, $hierarchical = 1, $form = '', $field_title = '', $selected_term = array() ){

            foreach ( $terms as $term ) {
                $space = $this -> etlak_check_parent( $term );
                $option_value = $term -> term_id;
                if ( is_array( $selected_term ) ) {
                    $selected = (in_array( $option_value, $selected_term )) ? 'selected="selected"' : '';
                } else {
                    $selected = ($selected_term == $option_value) ? 'selected="selected"' : '';
                }

                $form .= '<option value="' . $option_value . '" ' . $selected . '>' . $space . $term -> name . '</option>';


                if ( ! empty( $term -> children ) ) {

                    $form .= $this -> etlak_print_option( $term -> children, $hierarchical, '', $field_title, $selected_term );
                }
            }
            return $form;
        }

        function etlak_check_parent( $term, $space = '' ){
            if ( is_object( $term ) ) {
                if ( $term -> parent != 0 ) {
                    $space .= str_repeat( '&nbsp;', 2 );
                    $parent_term = get_term_by( 'id', $term -> parent, $term -> taxonomy );
// var_dump($space);
                    $space .= $this -> etlak_check_parent( $parent_term, $space );
                }
            }

            return $space;
        }

        function etlak_print_checkbox( $terms, $form = '', $field_title = '', $selected_term = array() ){
            foreach ( $terms as $term ) {
                $space = $this -> etlak_check_parent( $term );
                $option_value = $term -> slug;
                if ( is_array( $selected_term ) ) {
                    $checked = (in_array( $option_value, $selected_term )) ? 'checked="checked"' : '';
                } else {
                    $checked = ($selected_term == $option_value) ? 'checked="checked"' : '';
                }
                $form .= '<label class="etlak-checkbox-label">' . $space . '<input type="checkbox" name="' . $field_title . '[]"  value="' . $option_value . '" ' . $checked . '/>' . $term -> name . '</label>';

                if ( ! empty( $term -> children ) ) {

                    $form .= $this -> etlak_print_checkbox( $term -> children, '', $field_title, $selected_term );
                }
            }

            return $form;
        }

        /*
         * Redirect function for view count
         */

        function etlak_get_post_view( $postID ){
            $count_key = 'post_views_count';
            $count = get_post_meta( $postID, $count_key, true );
            if ( $count == '' ) {
                delete_post_meta( $postID, $count_key );
                add_post_meta( $postID, $count_key, '0' );

                return '0 View';
            }

            return $count . ' Views';
        }

        function etlak_set_post_view( $postID ){
            $count_key = 'post_views_count';
            $count = ( int ) get_post_meta( $postID, $count_key, true );
            if ( $count < 1 ) {
                delete_post_meta( $postID, $count_key );
                add_post_meta( $postID, $count_key, '0' );
            } else {
                $count ++;
                update_post_meta( $postID, $count_key, ( string ) $count );
            }
        }

        function etlak_page_template_redirect(){
            if ( is_single() ) {
                $this -> etlak_set_post_view( get_the_ID() );
            }
        }

        /*
         * Preview page
         */

        function etlak_preview_page( $post ){


            if ( get_post_type() == 'everesttimeline' ) {
                $post_status = get_post_status();
                if ( $post_status != 'auto-draft' ) {
                    $post_id = get_the_ID();
                    $link = site_url( '?everesttimeline_preview=true&blog_id=' . $post_id );
                    return $link;
                }
            } else {
                $post = get_post( get_the_ID() );
                $args = array(
                    'p' => $post -> ID
                    , 'preview' => 'true'
                );
                return add_query_arg( $args, home_url() );
                // exit();
            }
        }

        /**
         * Sanitizes Multi Dimensional Array
         * @param array $array
         * @param array $sanitize_rule
         * @return array
         *
         * @since 1.0.0
         */
        function etlak_sanitize_array( $array = array(), $sanitize_rule = array() ){
            if ( ! is_array( $array ) || count( $array ) == 0 ) {
                return array();
            }

            foreach ( $array as $k => $v ) {
                if ( ! is_array( $v ) ) {

                    $default_sanitize_rule = (is_numeric( $k )) ? 'text' : 'html';
                    $sanitize_type = isset( $sanitize_rule[ $k ] ) ? $sanitize_rule[ $k ] : $default_sanitize_rule;
                    $array[ $k ] = $this -> etlak_sanitize_value( $v, $sanitize_type );
                }
                if ( is_array( $v ) ) {
                    $array[ $k ] = $this -> etlak_sanitize_array( $v, $sanitize_rule );
                }
            }

            return $array;
        }

        /**
         * Sanitizes Value
         *
         * @param type $value
         * @param type $sanitize_type
         * @return string
         *
         * @since 1.0.0
         */
        function etlak_sanitize_value( $value = '', $sanitize_type = 'text' ){
            switch ( $sanitize_type ) {
                case 'html':
                    $allowed_html = wp_kses_allowed_html( 'post' );
                    return wp_kses( $value, $allowed_html );
                    break;
                default:
                    return sanitize_text_field( $value );
                    break;
            }
        }

        function etlak_preview_blog(){
            if ( isset( $_GET[ 'everesttimeline_preview' ], $_GET[ 'blog_id' ] ) && $_GET[ 'everesttimeline_preview' ] && is_user_logged_in() ) {
                include(ETLAK_PATH . 'inc/frontend/et-preview.php');
                die();
            }
        }

        /*
         * Adding Submenu page
         */

        function etlak_register_about_us_page(){
            add_submenu_page(
                    'edit.php?post_type=everesttimeline', __( 'About Us', ETLAK_TD ), __( 'About Us', ETLAK_TD ), 'manage_options', 'etlak-about-us', array( $this, 'etlak_about_callback' ) );
        }

        function etlak_about_callback(){

            include('inc/admin/et-about-page.php');
        }

        function etlak_register_stuff_page(){
            add_submenu_page(
                    'edit.php?post_type=everesttimeline', __( 'More WordPress Stuff', ETLAK_TD ), __( 'More WordPress Stuff', ETLAK_TD ), 'manage_options', 'etlak-stuff-us', array( $this, 'etlak_stuff_callback' ) );
        }

        function etlak_stuff_callback(){

            include('inc/admin/et-stuff-page.php');
        }

        function etlak_remove_row_actions( $actions ){
            if ( get_post_type() == 'everesttimeline' ) { // choose the post type where you want to hide the button
                unset( $actions[ 'view' ] ); // this hides the VIEW button on your edit post screen
                unset( $actions[ 'inline hide-if-no-js' ] );
            }
            return $actions;
        }

        /* Add custom column to post list */

        function etlak_columns_head( $columns ){
            $columns[ 'shortcodes' ] = __( 'Shortcodes', ETLAK_TD );
            $columns[ 'template' ] = __( 'Template Include', ETLAK_TD );
            return $columns;
        }

        function etlak_columns_content( $column, $post_id ){

            if ( $column == 'shortcodes' ) {
                $id = $post_id;
                ?>
                <textarea style="resize: none;" rows="2" cols="20" readonly="readonly">[et id="<?php echo $post_id; ?>"]</textarea><?php
            }
            if ( $column == 'template' ) {
                $id = $post_id;
                ?>
                <textarea style="resize: none;" rows="2" cols="41" readonly="readonly">&lt;?php echo do_shortcode("[et id='<?php echo $post_id; ?>']"); ?&gt;</textarea><?php
            }
        }

        /*
         * Remove view and preview from wp blog post
         */

        function etlak_posttype_admin_css(){
            global $post_type;
            $post_types = array(
                /* set post types */
                'everesttimeline'
            );
            if ( in_array( $post_type, $post_types ) )
                echo '<style type="text/css">#view-post-btn, .updated a,#screen-meta-links .screen-meta-toggle
                {display: none;}</style>';
        }

        // retrieves the attachment ID from the file URL
        function etlak_get_image_id( $image_url ){
            global $wpdb;
            $query = "SELECT ID FROM {$wpdb -> posts} WHERE guid='$image_url'";
            $id = $wpdb -> get_var( $query );
            return $id;
        }

    }

//class terminations

    $etlak_obj = new ETLAK_Class();
}//class exist check close

