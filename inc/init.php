<?php
/**
 * erw-builder functions and definitions
 *
 * @package erw-builder
 */

//-> =Register Script
add_action('wp_enqueue_scripts', 'erw_enqueue_scripts', 10);
function erw_enqueue_scripts() {
    
    $_styles  = array( 'bootstrap','font-awesome','swiper','animate','main' );
    $_scripts = array( 'popper', 'bootstrap','swiper', 'nicescroll','scrollIt', 'wow', 'main' );

    foreach ($_styles as $script) {
        $_style = ($script == 'main' || $script == 'responsive') ? $script.'.css' : $script.'.min.css' ;
        wp_enqueue_style( $_style, ERW_THEME_CSS_URI .$_style, NULL, NULL); 
    }
    foreach ($_scripts as $script) {
        $_script = ($script == 'main') ? $script.'.js' : $script.'.min.js' ;
        wp_enqueue_script( $_script, ERW_THEME_JS_URI .$_script, array('jquery'), NULL, true);
    }

    wp_enqueue_style('style', get_stylesheet_uri(), NULL, NULL);
    wp_enqueue_style('responsive', ERW_THEME_CSS_URI . 'responsive.css', NULL, NULL); 

}

//-> =Add favicons
function add_favicon() {  
    echo '<link rel="apple-touch-icon" sizes="180x180" href="'. ERW_THEME_FAVICON_URI . '/apple-touch-icon.png">'. "\n";
    echo '<link rel="icon" type="image/png" sizes="32x32" href="'. ERW_THEME_FAVICON_URI . '/favicon-32x32.png">'. "\n";
    echo '<link rel="icon" type="image/png" sizes="16x16" href="'. ERW_THEME_FAVICON_URI . '/favicon-16x16.png">'. "\n";
    echo '<link rel="manifest" href="'. ERW_THEME_FAVICON_URI . '/site.webmanifest">'. "\n";
    echo '<link rel="mask-icon" href="'. ERW_THEME_FAVICON_URI . '/safari-pinned-tab.svg" color="#5bbad5">'. "\n";
    echo '<link rel="shortcut icon" href="'. ERW_THEME_FAVICON_URI . '/favicon.ico">'. "\n";
    echo '<meta name="apple-mobile-web-app-title" content="Anaya Pro">'. "\n";
    echo '<meta name="application-name" content="Anaya Pro">'. "\n";
    echo '<meta name="msapplication-TileColor" content="#ffffff">'. "\n";
    echo '<meta name="msapplication-config" content="'. ERW_THEME_FAVICON_URI . '/browserconfig.xml">'. "\n";
    echo '<meta name="theme-color" content="#ffffff">'. "\n";
}


/**
 * Remove Dashboard Meta Boxes
 */
function mb_remove_dashboard_widgets() {
    global $wp_meta_boxes;
    // unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
    // unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
    // unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
    // unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
}


/**
 * Remove Query Strings From Static Resources
 */
function mb_remove_script_version( $src ){
    $parts = explode( '?ver', $src );
    return $parts[0];
}
function remove_wp_ver_par( $src ) {
    if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}

/**
 * Remove Read More Jump
 */
function mb_remove_more_jump_link( $link ) {
    $offset = strpos( $link, '#more-' );
    if ($offset) {
        $end = strpos( $link, '"',$offset );
    }
    if ($end) {
        $link = substr_replace( $link, '', $offset, $end-$offset );
    }
    return $link;
}

/**
 * Register Widget Areas
 */
function the_widgets_init() {
    // Main Sidebar
    register_sidebar( array(
        'name'          => __( 'Sidebar', 'ERW_Theme_Base' ),
        'id'            => 'sidebar-1',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ) );

    // Footer sidebar
    register_sidebar(array( 
        'name'          => 'Footer 1',
        'id'            => 'footer1-sidebar',
        'description'   => 'Widetized footer',
        'description'   => 'Widetized footer',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="headline"><h3>',
        'after_title'   => '</h3></div>',
    ));
    register_sidebar(array( 
        'name'          => 'Footer 2',
        'id'            => 'footer2-sidebar',
        'description'   => 'Widetized footer',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="headline"><h3>',
        'after_title'   => '</h3></div>',
    ));
    register_sidebar(array( 
        'name'          => 'Footer 3',
        'id'            => 'footer3-sidebar',
        'description'   => 'Widetized footer',
        'description'   => 'Widetized footer',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="headline"><h3>',
        'after_title'   => '</h3></div>',
    ));
    register_sidebar(array( 
        'name'          => 'Footer 4',
        'id'            => 'footer4-sidebar',
        'description'   => 'Widetized footer',
        'description'   => 'Widetized footer',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="headline"><h3>',
        'after_title'   => '</h3></div>',
    ));

    // Live Help
    register_sidebar(array( 
        'name'          => 'Live Help',
        'id'            => 'livehelp',
        'description'   => "Live Help navbar menu",
        "before_widget" => "<li id='nb_livehelp' class='nb_livehelp navbar-right'>",
        "after_widget"  => "</li>",
        "before_title"  => "<span class='nb_livehelp_title none'>",
        "after_title"   => "</span>"
    ));

}


function custom_theme_setup() {
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'pheader_img', 1300, 580, true );
    add_image_size( 'thumbnails_294_195', 294, 195, true );
    add_image_size( 'thumbnails_370_296', 370, 276, true );
    add_image_size( 'thumbnails_250_200', 250, 200, true );
    add_image_size( 'thumbnails_archive_406_276', 406, 276, true );
}

add_action( 'snerwidget_after', 'get_languages' );
function add_icon_language_snerwidget() {
    return get_languages();
}

function get_languages() {
    $languages = icl_get_languages('skip_missing=0&orderby=code&order=desc');
    if(!empty($languages)): foreach($languages as $l):    
        if(!$l['active']) echo '<a id="flags_language_selector" href="'.$l['url'].'"><img src="'.$l['country_flag_url'].'"alt="'.$l['language_code'].'"/> <span class="languages_name">'.$l['native_name'].'</span> </a>';
    endforeach; endif;
}

function add_nav_menu_items_icl_get_languages( $items, $args ) {
    if (function_exists('icl_get_languages') && $args->theme_location == 'primary') {
        $languages = icl_get_languages('skip_missing=0');
        if(1 < count($languages)){ 
            foreach($languages as $l){ 
                if(!$l['active']){ 
                    $items = $items.'<li class="menu-item-'.$l['language_code'].'"><a href="'. $l['url'].'">'.$l['native_name'].'</a></li>';
                }
            }
        }
    }
    return $items;
}

function excerpt($limit) {
    return wp_trim_words(get_the_excerpt(), $limit);
}
function create_slug($string){
    $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
    $slug = strtolower($string);
    if (empty($string)) {
        return 'n-a';
    }
   return $slug;
}

//add_action('get_header', 'remove_admin_login_header');
function remove_admin_login_header() {
    //remove_action('wp_head', '_admin_bar_bump_cb');
}
function format_phone($country, $phone) {
    $function = 'format_phone_' . $country;
    if(function_exists($function)) {
    return $function($phone);
    } else {
        $phone = preg_replace("/[^0-9]/", "", $phone);
    } 
  return $phone;
}
function format_phone_us($phone) {
  // note: making sure we have something
  if(!isset($phone{3})) { return ''; }
  // note: strip out everything but numbers 
  $phone = preg_replace("/[^0-9]/", "", $phone);
  $length = strlen($phone);
  switch($length) {
  case 7:
    return preg_replace("/([0-9]{3})([0-9]{4})/", "$1-$2", $phone);
  break;
  case 10:
   return preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1)$2-$3", $phone);
  break;
  case 11:
  return preg_replace("/([0-9]{1})([0-9]{3})([0-9]{3})([0-9]{4})/", "$1($2)$3-$4", $phone);
  break;
  default:
    return $phone;
  break;
  }
}
/**
 * Generate random unique md5
 */
function fw_rand_md5() {
    return md5(time() .'-'. uniqid(rand(), true) .'-'. mt_rand(1, 1000));
}
function fw_unique_increment() {
    static $i = 0;
    return ++$i;
}
function custom_items_wrap() {
   $wrap  = '<ul id="%1$s" class="%2$s">';
      $wrap .= '%3$s';
      $phone = get_theme_mod('phone');
      if ( isset( $phone ) && $phone != "" ) :
            $wrap .= '<li class="menu-item navbar-right menu-phone hidden-xs">';
                $wrap .= '<a href="tel:' . format_phone( null, $phone ) . '">' . format_phone( 'us', $phone ) . '</a>';
            $wrap .= '</li>';
       endif;
   $wrap .= '</ul>';
    return $wrap;
}


/**
 * Function to show the footer info, copyright information
 */

function footer_copyright() {
   echo sprintf( __( '%1$s &copy; %2$s %3$s. %4$s.' ), 
    __('Copyright','ERW_Theme_Base' ), 
    date('Y'),
    esc_attr( get_bloginfo( 'name', 'display' ) ),
    __('All rights reserved','ERW_Theme_Base' ) );
}



function chosen_social_array() {
    $social_sites = array(
        'twitter'       => 'th_socials_twitter',
        'facebook'      => 'th_socials_facebook',
        'google-plus'   => 'th_socials_googleplus',
        'pinterest'     => 'th_socials_pinterest',
        'linkedin'      => 'th_socials_linkedin',
        'youtube'       => 'th_socials_youtube',
        'vimeo'         => 'th_socials_vimeo',
        'tumblr'        => 'th_socials_tumblr',
        'instagram'     => 'th_socials_instagram',
        'flickr'        => 'th_socials_flickr',
        'dribbble'      => 'th_socials_dribbble',
        'rss'           => 'th_socials_rss',
        'reddit'        => 'th_socials_reddit',
        'soundcloud'    => 'th_socials_soundcloud',
        'spotify'       => 'th_socials_spotify',
        'vine'          => 'th_socials_vine',
        'yahoo'         => 'th_socials_yahoo',
        'behance'       => 'th_socials_behance',
        'codepen'       => 'th_socials_codepen',
        'delicious'     => 'th_socials_delicious',
        'stumbleupon'   => 'th_socials_stumbleupon',
        'deviantart'    => 'th_socials_deviantart',
        'digg'          => 'th_socials_digg',
        'github'        => 'th_socials_github',
        'hacker-news'   => 'th_socials_hacker-news',
        'steam'         => 'th_socials_steam',
        'vk'            => 'th_socials_vk',
        'weibo'         => 'th_socials_weibo',
        'tencent-weibo' => 'th_socials_tencent_weibo',
        '500px'         => 'th_socials_500px',
        'foursquare'    => 'th_socials_foursquare',
        'slack'         => 'th_socials_slack',
        'slideshare'    => 'th_socials_slideshare',
        'qq'            => 'th_socials_qq',
        'whatsapp'      => 'th_socials_whatsapp',
        'skype'         => 'th_socials_skype',
        'wechat'        => 'th_socials_wechat',
        'xing'          => 'th_socials_xing',
        'paypal'        => 'th_socials_paypal',
        'email'         => 'th_socials_email',
        'email-form'    => 'th_socials_email_form'
    );
    return apply_filters( 'chosen_social_array_filter', $social_sites );
}
add_filter( 'fcs_idtranslated', 'fcs_idtranslated_func', 10 );
function fcs_idtranslated_func($postid) { 
    global $sitepress;
 
    // save current language
    $current_lang = $sitepress->get_current_language();
 
    //get the default language
    $default_lang = $sitepress->get_default_language();
 
    //If the site is being viewed in the same language as the shortcode ID was entered
    //you must switch to the second language.
    //otherwise, use the $current_lang
    //$current_lang = ( $current_lang == $default_lang ) ? $current_lang : $default_lang;
 
    $sitepress->switch_lang($default_lang);
    $t_post_id = icl_object_id($postid, 'page', true, $default_lang);
    $value = $postid.'***'.$t_post_id;
    $sitepress->switch_lang($current_lang);
     
    return $t_post_id;
}



