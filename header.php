<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->

<html <?php language_attributes(); ?>>
<!--<![endif]-->
   <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />
        <link href="https://fonts.googleapis.com/css?family=Handlee:100,300,400|Palanquin:100,300,400" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <?php //if( !empty(get_theme_mod('google_anaytics')) ): echo get_theme_mod('google_anaytics'); endif; ?>

        <?php wp_head();?>
        <?php 
            $default_logo = get_stylesheet_directory_uri() . "/assets/img/logo.png"; 
            $th_logo      = get_theme_mod( 'th_logo', $default_logo ); 
            $logo         = (empty($th_logo)) ? $default_logo : $th_logo ; 
        ?>
    </head>
     <body <?php body_class();?> data-spy="scroll" data-target="#navbarNav" data-offset="0">

    <!--[if lt IE 8]>
        <p class="browserupgrade">
            <h3>You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.
        </h3></p>
    <![endif]-->

<?php 
    $navbar = get_theme_mod('th_navbar');
    if ($navbar == 1){
        require_once ERW_THEME_DIR . "/navbar/navbar-center.php";
    } elseif ($navbar == 2){
        require_once ERW_THEME_DIR . "/navbar/navbar-center-top.php";
    } elseif ($navbar == 3){
        require_once ERW_THEME_DIR . "/navbar/navbar-right.php";
    } elseif ($navbar == 4){
        require_once ERW_THEME_DIR . "/navbar/navbar-left.php";
    }
?>