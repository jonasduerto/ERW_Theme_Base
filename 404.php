<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package ERW_Theme_Base
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main-pages" class="site-main mt50 mb50 container" role="main">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="card animated fadeInUp">
                        <div class="card-block">
                            <!--=== Error 404 ===-->
                            <div id="primary" class="content-area  content center-block text-center">
                                <h1 class="title-404">404</h1>
                                <span class="sorry text-muted">Sorry, the page you were looking for could not be found!</span>
                                <h5 class="page-title text-center">Lo sentimos, Ésta dirección no está disponible, Regresar a la Página Principal.</h5>
                                <a class="btn btn-link white bg-blue" href="/">Página Principal</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer(); ?>


<style>
    html { -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; }
    body {
        color: #757575;
        background-color: #f5f5f5;
        font-family: Roboto,sans-serif;
        font-size: 15px;
        font-size: 1.5rem;
        font-weight: 400;
        line-height: 26px;
        line-height: 2.6rem;
        -webkit-font-smoothing: antialiased;
        -webkit-tap-highcolor-light: transparent;
    }
    #navigation, #navigation.affix {
        position: relative !important;
        border-bottom-color: #fff !important;
        background-color: #fff !important;
        box-shadow: 0px 1px 11px rgba(67, 89, 108, 0.54) !important;
    }
    #navigation .navbar-nav>li>a, #navigation.affix .navbar-nav>li>a {
        color: #444 !important;
    }

    a { color: #FF971C; text-decoration: none; }
    a:focus, a:hover { color: #CC7004; text-decoration: none; }

    .card {
        box-shadow: none;
        box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);
        border-radius: 2px;
        background-color: #fff;
    }
    .color-dark {
        color: #424242!important;
    }
    .card .card-block {
        padding: 40px;
        padding: 4rem;
    }
    h1.title-404{
        color: #eee;
        font-size: 220px;
        line-height: 160px;
        font-weight: 900;
        text-shadow: 0 2px 2px rgba(0, 0, 0, 0.45);
        margin: 0;
    }
    .btn {
        font-weight: 400;
        letter-spacing: .14px;
        white-space: nowrap;
        -ms-flex-item-align: center;
        -ms-grid-row-align: center;
        align-self: center;
        outline: rgba(0,0,0,.870588) none 0;
    }
    .btn.btn-link.outline {
        box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);
    }
    @media (max-width:480px) {
        h1.title-404{
            font-size: 100px;
            line-height: 90px;
        }
        .card .card-block {
            padding: 10px;
            padding: 1rem;
        }
    }

</style>