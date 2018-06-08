<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * Template Name: Contact us
 *
 *
 * @package ERW_Theme_Base
 */

get_header(); ?>

<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID),'pheader_img' ); ?>
<div id="page-title-<?php echo $post->ID; ?>" class="page_title1 pb0 pt0 parallax" style="background-image: url(<?php echo $url; ?>);">
    <div class="onewrapper gradient pb100 pb70">
        <div class="container pt100 pb70">
            <h1 class="pt60 text-center animated bounceInDown"><?php the_title(); ?></h1>
            <h2 class="text-center animated bounceInDown">There are many variations of passages of Lorem Ipsum available</h2>
        </div>
    </div>
</div>

<main id="page-contact-us" class="content section-contact-us">
    

<div role="tabpanel">
    <!-- Nav tabs -->

    <div class="container pt40 mt20">
        
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#california" aria-controls="california" role="tab" data-toggle="tab">San Jose, California</a>
                </li>
                <li role="presentation">
                    <a href="#miami" aria-controls="miami" role="tab" data-toggle="tab">Miami, Florida</a>
                </li>
            </ul>
        
    </div>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="california">
            <div class="container">
                
                    <div class="contactPage pt20 pb100">
                        <h4 style="margin-top: 0px !important;">Write your message below</h4>
                        <div class="two_third">
                            <?php  echo do_shortcode('[contact-form-7 id="22" title="Contact form english"]'); ?>
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/contact-us-san-jose-california.jpg" class="img-responsive mt30" alt="Image">
                        </div>
                        <div class="one_third_last borderleft box">
                            <h4>San Jose, California</h4>
                            <ul class="list-unstyled clearfix">
                                <li><i class="fa fa-map-marker"></i> 
                                    <address>Santa Clara – Techmart Center <br>
                                        5201 Great America Pkwy. <br>
                                        Suite # 320 <br>
                                        Santa Clara, CA, 95054, US
                                    </address>
                                </li>
                                <li><i class="fa fa-mobile"></i> <span>(650) 772-5000</span></li>
                                <li><i class="fa fa-mobile"></i> <span>1-800-376-3133</span></li>
                            </ul>
                            <h1 style="height: 10px; margin-top: 10px; border-top: 1px dashed grey;"></h1>
                            <h4>Office hours</h4>
                            <p><span style="margin-top: 9px; display: block;">( US Eastern time )</span></p>
                            <ul class="list-unstyled clearfix">
                            <li>Online Support 24/7</li>
                                <li><i class="fa fa-clock-o"></i> <span>Monday – Friday: 8:AM to 5:PM</span></li>
                                <li><i class="fa fa-times"></i> <span>Sunday: Closed</span></li>
                            </ul>
                            <h1 style="height: 10px; margin-top: 10px; border-top: 1px dashed grey;"></h1>
                            <h4>Social Media</h4>
                            <ul class="contact-social-icons icon-zoom list-unstyled pb0 pt0 mb0 mt0">
                              <li> <a target="_blank" href="https://www.facebook.com/ERW_Theme_Base-155345969163"><i class="fa fa-facebook"></i> <span>Follow us!</span></a></li>
                              <li> <a target="_blank" href="https://twitter.com/ERW_Theme_Base"><i class="fa fa-twitter"></i> <span>Find us!</span></a></li>
                              <li> <a target="_blank" href="#"><i class="fa fa-google-plus"></i> <span>Circle us</span></a></li>
                              <li> <a target="_blank" href="https://www.youtube.com/channel/UCiLdy0pLdnot-3BBzHvLoAw6833"><i class="fa fa-youtube-play"></i> <span>Subscribe!</span></a></li>
                            </ul>
                        </div>
                    </div>
            </div>
                <div class="clearfix"></div>
    <section class="sec-cont-contact pt40 clearfix">
        <div class="container">
            <div class="center-vertical img-content">
                <img src="/wp-content/themes/ERW_Theme_Base/img/x125a5s28528ad.png" class="img-responsive" alt="Image">
            </div>
            <div class="center-vertical text-content text-center">
                <h1 class="text-center">Always Ready</h1>
                <h2 class="text-center font-weight-7"><a href="tel:6507725000">(650) 772-5000</a></h2>
            </div>
        </div>
    </section>
        </div>
        <div role="tabpanel" class="tab-pane" id="miami">
          <div class="container">
            
                <div class="contactPage pt20 pb100">

                    <h4 style="margin-top: 0px !important;">Write your message below</h4>
                    <div class="two_third">
                        <?php  echo do_shortcode('[contact-form-7 id="22" title="Contact form english"]'); ?>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/contact-us-miami.jpg" class="img-responsive mt40" alt="Image">
                    </div>
                    <div class="one_third_last borderleft box">
                        <h4>Miami, Florida</h4>
                        <ul class="list-unstyled clearfix">
                            <li><i class="fa fa-map-marker"></i> 
                                <address>7900 Oak Ln <br />
                                Suite #400, <br />
                                Miami Lakes, FL 33016</address>
                            </li>
                            <li><i class="fa fa-mobile"></i> <span>(305) 900-5528</span></li>
                            <li><i class="fa fa-mobile"></i> <span>1-800-376-3133</span></li>
                        </ul>
                        <h1 style="height: 10px; margin-top: 10px; border-top: 1px dashed grey;"></h1>
                        <h4>Office hours</h4>
                        <p><span style="margin-top: 9px; display: block;">( US Pacific Time )</span></p>
                        <ul class="list-unstyled clearfix">
                            <li><i class="fa fa-clock-o"></i> <span>Monday – Friday: 8:AM to 5:PM</span></li>
                            <li><i class="fa fa-times"></i> <span>Sunday: Closed</span></li>
                        </ul>
                        <ul class="contact-social-icons text-center icon-zoom list-unstyled list-inline pb0 pt0 mb0 mt0">
                          <li> <a target="_blank" href="https://www.facebook.com/ERW_Theme_Base-155345969163"><i class="fa fa-facebook"></i></a></li>
                          <li> <a target="_blank" href="#"><i class="fa fa-skype"></i></a></li>
                          <li> <a target="_blank" href="https://twitter.com/ERW_Theme_Base"><i class="fa fa-twitter"></i></a></li>
                          <li> <a target="_blank" href="https://www.youtube.com/channel/UCiLdy0pLdnot-3BBzHvLoAw6833"><i class="fa fa-youtube-play"></i></a></li>
                        </ul>
                    </div>
                </div>
            
          </div>
              <div class="clearfix"></div>
    <section class="sec-cont-contact pt40 clearfix">
        <div class="container">
            <div class="center-vertical img-content">
                <img src="/wp-content/themes/ERW_Theme_Base/img/x125a5s28528ad.png" class="img-responsive" alt="Image">
            </div>
            <div class="center-vertical text-content text-center">
                <h1 class="text-center">Always Ready</h1>
                <h2 class="text-center font-weight-7"><a href="tel:3059005528">(305) 900-5528</a></h2>
            </div>
        </div>
    </section>
        </div>
    </div>
</div>
</main>
<?php get_footer(); ?>
