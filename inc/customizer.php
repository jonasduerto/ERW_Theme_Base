<?php

/**
 * ERW_Theme_Base Theme Customizer
 *
 * @package ERW_Theme_Base
 * 
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */


function ERW_Theme_Base_customize_register( $wp_customize ) {
    class th_Customize_Alpha_Color_Control extends WP_Customize_Control {

        public $type = 'alphacolor';
        public $palette = true;
        public $default = '#3FADD7';

        protected function render() {
            $id = 'customize-control-' . str_replace( '[', '-', str_replace( ']', '', $this->id ));
            $class = 'customize-control customize-control-' . $this->type; ?>
            <li id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>">
                <?php $this->render_content(); ?>
            </li>
            <?php
        }
        public function render_content() { ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <input type="text" data-palette="<?php echo $this->palette; ?>" data-default-color="<?php echo $this->default; ?>" value="<?php echo intval( $this->value()); ?>" class="pluto-color-control" <?php $this->link(); ?>  />
            </label>
            <?php
        }
    }
    class th_Customizer_Number_Control extends WP_Customize_Control {
        public $type = 'number';
        public function render_content() { ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <input type="number" <?php $this->link(); ?> value="<?php echo intval( $this->value()); ?>" />
            </label>
            <?php
        }
    }
    class th_Customize_Textarea_Control extends WP_Customize_Control {
        public $type = 'textarea';
        public function render_content() { ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <textarea rows="5" id="customize_textarea" <?php $this->link(); ?>><?php echo esc_textarea( $this->value()); ?></textarea>
            </label>
            <?php
        }
    }
    class th_Html_Support extends WP_Customize_Control {
        public function render_content() {
            echo __('You can insert any HTML code in here, to create links, google maps or anything else.','ERW_Theme_Base Customizer');
        }
    }
    class th_LatestNews extends WP_Customize_Control {
        public function render_content() {
            echo __('The main content of this section consists of blog posts.','ERW_Theme_Base Customizer');
        }
    }
    class th_Colors_Panel extends WP_Customize_Control {
        public function render_content() {
            echo __('To have full control over the colors on homepage sections please visit each section options in Customizer.','ERW_Theme_Base Customizer');
        }
    }

function ct_chosen_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
function ct_chosen_sanitize_skype( $input ) {
    return esc_url_raw( $input, array( 'http', 'https', 'skype' ) );
}
function ct_chosen_sanitize_css( $css ) {
    $css = wp_kses( $css, array( '\'', '\"' ) );
    $css = str_replace( '&gt;', '>', $css );
    return $css;
}
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    $wp_customize->remove_section('colors');

    /*=============== GENERAL OPTIONS ================= */
    /*******************************************************/

    /*=============== Panel One ============= */
    $wp_customize->add_panel( 'panel_1', array(
        'priority' => 31,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'General options')
    ));

    /*===============================================
    =================== Stylesheet ================== */
    $wp_customize->add_section( 'th_stylesheet_section' , array(
        'title'       => __( 'Stylesheet'),
        'priority'    => 1,
        'panel' => 'panel_1'
    ));

    /*=============== Navbar ============= */
    $wp_customize->add_setting( 'th_header_top', array('default'=>'2'));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'th_header_top', array(
        'label'    => 'Top header',
        'section'  => 'th_stylesheet_section',
        'type'     => 'select',
        'priority' => 1,
        'choices'   => array(
            '1' => 'Show',
            '2' => 'Hidden',
        )
    )));

    /*=============== Header ============= */
    $wp_customize->add_setting( 'th_header', array('default'=>'1'));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'th_header', array(
        'label'    => 'Header Layout',
        'section'  => 'th_stylesheet_section',
        'type'     => 'select',
        'priority'    => 2,
        'choices'   => array(
            '1' => 'Trasparent',
            '2' => 'Solid',
        )
    )));
    /*=============== Navbar ============= */
    $wp_customize->add_setting( 'th_navbar', array('default'=>'3'));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'th_navbar', array(
        'label'    => 'Navbar Layout',
        'section'  => 'th_stylesheet_section',
        'type'     => 'select',
        'priority' => 3,
        'choices'   => array(
            '1' => 'Nav Center',
            '2' => 'Nav Center logo',
            '3' => 'Nav right',
            '4' => 'Nav left',
        )
    )));
    /*===============================================
    ================ General options ================ */
    $wp_customize->add_section( 'th_general_section' , array(
        'title'       => __( 'General options'),
        'priority'    => 2,
        'panel' => 'panel_1'
    ));
    /*=============== Support ============= */
    $wp_customize->add_setting( 'support', array('default'=>'Support'));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'Support', array(
            'label'    => __( 'Support'),
            'section'  => 'th_general_section',
            'settings' => 'support',
        )
    ));
    /*=============== Logo ============= */
    $wp_customize->add_setting( 'th_logo', array('sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ERW_Theme_Baseslug_logo', array(
        'label'    => 'Logo',
        'section'  => 'th_general_section',
        'settings' => 'th_logo',
        'priority'    => 2,
    )));
    /*=============== email ============= */
    $wp_customize->add_setting( 'th_email', array( 'default' => get_option( 'admin_email' ), ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'th_email', array(
        'label'    => 'Email',
        'section'  => 'th_general_section',
        'priority' => 3,
    )));
    /*=============== Address One ============= */
    $wp_customize->add_setting( 'th_address');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'th_address', array(
        'label'    => 'Address One',
        'section'  => 'th_general_section',
        'priority' => 4,
    )));
    /*=============== Address Two ============= */
    $wp_customize->add_setting( 'th_address_two');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'th_address_two', array(
        'label'    => 'Address Two',
        'section'  => 'th_general_section',
        'priority' => 5,
    )));
    /*=============== Phone ============= */
    $wp_customize->add_setting( 'phone');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'phone', array(
        'label'    => 'Phone One',
        'section'  => 'th_general_section',
        'settings' => 'phone',
        'priority' => 6,
    )));
    /*===============  Phone Two ============= */
    $wp_customize->add_setting( 'phonetwo');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'phonetwo', array(
        'label'    => 'Phone Two',
        'section'  => 'th_general_section',
        'settings' => 'phonetwo',
        'priority' => 7,
    )));
    /*=============== google_anaytics ============= */
    $wp_customize->add_setting( 'google_anaytics' );
    $wp_customize->add_control( new th_Customize_Textarea_Control( $wp_customize, 'google_anaytics', array(
        'label'   => __( 'Google analytics code'),
        'section' => 'th_general_section',
        'priority' => 8
    )));
    /*===============================================
    ================ Socials sections =============== */
    $wp_customize->add_section( 'socials_section' , array(
        'title'=> __( 'Social Media Icons', 'chosen'),
        'priority'    => 3,
        'description' => __( 'Add the URL for each of your social profiles.' ),
        'panel' => 'panel_1'
    ));

    // get the social sites array
    $social_sites = chosen_social_array();
    // set a priority used to order the social sites
    $priority = 5;

    // create a setting and control for each social site
    foreach ( $social_sites as $social_site => $value ) {
        // if email icon
        if ( $social_site == 'email' ) {
            // setting
            $wp_customize->add_setting( $value, array(
                'sanitize_callback' => 'ct_chosen_sanitize_email'
            ) );
            // control
            $wp_customize->add_control( $value, array(
                'label'    => __( 'Email Address', 'chosen' ),
                'section'  => 'socials_section',
                'priority' => $priority
            ) );
        } else {
            $label = ucfirst( $social_site );
            if ( $social_site == 'google-plus' ) {
                $label = 'Google Plus';
            } elseif ( $social_site == 'rss' ) {
                $label = 'RSS';
            } elseif ( $social_site == 'soundcloud' ) {
                $label = 'SoundCloud';
            } elseif ( $social_site == 'slideshare' ) {
                $label = 'SlideShare';
            } elseif ( $social_site == 'codepen' ) {
                $label = 'CodePen';
            } elseif ( $social_site == 'stumbleupon' ) {
                $label = 'StumbleUpon';
            } elseif ( $social_site == 'deviantart' ) {
                $label = 'DeviantArt';
            } elseif ( $social_site == 'hacker-news' ) {
                $label = 'Hacker News';
            } elseif ( $social_site == 'whatsapp' ) {
                $label = 'WhatsApp';
            } elseif ( $social_site == 'qq' ) {
                $label = 'QQ';
            } elseif ( $social_site == 'vk' ) {
                $label = 'VK';
            } elseif ( $social_site == 'wechat' ) {
                $label = 'WeChat';
            } elseif ( $social_site == 'tencent-weibo' ) {
                $label = 'Tencent Weibo';
            } elseif ( $social_site == 'paypal' ) {
                $label = 'PayPal';
            } elseif ( $social_site == 'email-form' ) {
                $label = 'Contact Form';
            }
            if ( $social_site == 'skype' ) {
                // setting
                $wp_customize->add_setting( $value, array(
                    'sanitize_callback' => 'ct_chosen_sanitize_skype'
                ) );
                // control
                $wp_customize->add_control( $value, array(
                    'type'        => 'url',
                    'label'       => $label,
                    'description' => sprintf( __( 'Accepts Skype link protocol (<a href="%s" target="_blank">learn more</a>)', 'chosen' ), 'https://www.competethemes.com/blog/skype-links-wordpress/' ),
                    'section'     => 'socials_section',
                    'priority'    => $priority
                ) );
            } else {
                // setting
                $wp_customize->add_setting( $value, array(
                    'sanitize_callback' => 'esc_url_raw'
                ) );
                // control
                $wp_customize->add_control( $value, array(
                    'type'     => 'url',
                    'label'    => $label,
                    'section'  => 'socials_section',
                    'priority' => $priority
                ) );
            }
        }
        // increment the priority for next site
        $priority = $priority + 5;
    }





    // /*=============== CONTACT US SECTION ================= */
    // /*******************************************************/
    // /*=============== Panel Four ============= */
    // $wp_customize->add_panel( 'panel_2', array(
    //     'priority' => 39,
    //     'capability' => 'edit_theme_options',
    //     'theme_supports' => '',
    //     'title' => __( 'Contact us section')
    // ));

    // /*=============== CONTACT US SETTINGS ============= */
    // $wp_customize->add_section( 'contactus_settings_section' , array(
    //     'title'       => __( 'Settings'),
    //     'priority'    => 1,
    //     'panel' => 'panel_2'
    // ));

    // /* contactus_email */
    // $wp_customize->add_setting( 'contactus_email', array(
    //     'sanitize_callback' => 'sanitize_text'
    // ));

    // $wp_customize->add_control( 'contactus_email', array(
    //     'label'    => __( 'Email address'),
    //     'description' => __( 'The contact us form is submitted to this email address.','ERW_Theme_Base Customizer' ),
    //     'section'  => 'contactus_settings_section',
    //     'priority'    => 4,
    // ));

    /*=============== GOOGLE MAP SECTION ================= 
    /*******************************************************/
    // $wp_customize->add_section( 'gmap_section' , array(
    //     'title'       => __( 'Google map section'),
    //     'priority'    => 41,
    //     'panel' => 'panel_2'
    // ));

    // /* googlemap_show */
    // $wp_customize->add_setting( 'googlemap_show');

    // $wp_customize->add_control( 'googlemap_show', array(
    //     'type' => 'checkbox',
    //     'label' => __('Show google map section?','ERW_Theme_Base Customizer'),
    //     'description' => __('If you check this box, the Google map section will appear on homepage.','ERW_Theme_Base Customizer'),
    //     'section' => 'gmap_section',
    //     'priority'    => 1,
    // ));

    // /* googlemap_address */
    // $wp_customize->add_setting( 'googlemap_address', array(
    //     'sanitize_callback' => 'sanitize_text',
    //     'default' => __( 'New York, Leroy Street','ERW_Theme_Base Customizer' )
    // ));

    // $wp_customize->add_control( 'googlemap_address', array(
    //     'label'    => __( 'Google map address'),
    //     'section'  => 'gmap_section',
    //     'priority'    => 2,
    // ));
}

add_action( 'customize_register', 'ERW_Theme_Base_customize_register' );

function ERW_Theme_Base_customize_preview_js() {
    wp_enqueue_script( 'ERW_Theme_Base_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}