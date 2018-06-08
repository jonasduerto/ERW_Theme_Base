<?php
/**
* The main template file.
*
* This is the most generic template file in a WordPress theme
* and one of the two required files for a theme (the other being style.css).
* It is used to display a page when nothing more specific matches a query.
* E.g., it puts together the home page when no home.php file exists.
* Learn more: http://codex.wordpress.org/Template_Hierarchy
*
* @package ERW_Theme_Base
*/

get_header(); ?>

<!-- <section class="section page wow ease-out parallax" id="home">
   <?php //layerslider(1); ?>
</section> -->

<section id="hero-section-26" class="hero-section white-section section-no-padding">
    <div class="section-container">
        <div class="gfort-swiper-slider" data-swiper-items="1">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide">
                    <div class="swiper-slide-container">
                        <div class="image-block">
                            <div class="image-block-container">
                            <div class="text-block-container">
                                <h1 class="title">Lorem ipsum dolor sit amet </h1>
                                <h2 class="subtitle">adipisicing elit consectetur adipisicing elit</h2>
                            </div>
                                <img class="img-fluid w-100" src="<?php echo ERW_THEME_IMAGES_URI ?>/hero/hero-040.jpg" alt="Slide Image" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="swiper-slide-container">
                        <div class="image-block">
                            <div class="image-block-container">
                            <div class="text-block-container">
                                <h1 class="title">Lorem ipsum dolor sit amet</h1>
                                <h2 class="subtitle">adipisicing elit consectetur adipisicing elit</h2>
                            </div>
                                <img class="img-fluid w-100" src="<?php echo ERW_THEME_IMAGES_URI ?>/hero/charanyjivanmukta.jpg" alt="Slide Image" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="swiper-slide-container">
                        <div class="image-block">
                            <div class="image-block-container">
                            <div class="text-block-container">
                                <h1 class="title">Lorem ipsum dolor sit amet </h1>
                                <h2 class="subtitle">adipisicing elit consectetur adipisicing elit</h2>
                            </div>
                                <img class="img-fluid w-100" src="<?php echo ERW_THEME_IMAGES_URI ?>/hero/hero-039.jpg" alt="Slide Image" />
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <!-- If we need scrollbar -->
            <div class="swiper-scrollbar"></div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-4 content-block content-block-style-1 sticky-block">
                    <div class="content-block-container">
                        <div class="image-block">
                            <div class="image-block-container">
                                <img class="img-fluid w-100" src="<?php echo ERW_THEME_IMAGES_URI ?>/hero/hero-041.jpg" alt="Image Block" />
                            </div>
                        </div>
                        <h6><i class="color fa fa-arrow-right"></i> Spirituality to Your Home and Business</h6>
                        <h6><i class="color fa fa-arrow-right"></i> Private Kundalini Yoga Classes</h6>
                        <h6><i class="color fa fa-arrow-right"></i> Community Group Meditation</h6>
                    </div>
                </div>
                <div class="col-sm-4 content-block content-block-style-1 sticky-block">
                    
                    <div class="content-block-container">
                        <div class="image-block">
                            <div class="image-block-container">
                                <img class="img-fluid w-100" src="<?php echo ERW_THEME_IMAGES_URI ?>/hero/hero-042.jpg" alt="Image Block" />
                            </div>
                        </div>
                        <h6><i class="color fa fa-arrow-right"></i> Ayurveda Lifestyle Consulting</h6>
                        <h6><i class="color fa fa-arrow-right"></i> Urban Spirituality (Coaching)</h6>
                        <h6><i class="color fa fa-arrow-right"></i> Weekend Retreat Packages</h6>
                    </div>
                </div>
                <div class="col-sm-4 content-block content-block-style-1 sticky-block">
                    <div class="content-block-container">
                        <div class="image-block">
                            <div class="image-block-container">
                                <img class="img-fluid w-100" src="<?php echo ERW_THEME_IMAGES_URI ?>/hero/hero-043.jpg" alt="Image Block" />
                            </div>
                        </div>
                        <h6><i class="color fa fa-arrow-right"></i> Workshops</h6>
                        <h6><i class="color fa fa-arrow-right"></i> Media Training for artists,</h6>
                        <h6><i class="color fa fa-arrow-right"></i> executives and entrepreneurs</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="about-us" class="content-section grey-section">
    <div class="container">
        <div class="row justify-content-center align-content-stretch align-items-stretch align-self-stretch">
            <div class="col-sm-6 align-self-center">
                <img class="img-fluid w-100 show-mobile" src="<?php echo ERW_THEME_IMAGES_URI ?>/Anaya.jpg" alt="Parallax Image">
            </div>
            <div class="col-sm-6 align-self-center pt-2 pt-md-4 pt-lg-5 pb-2 pb-md-4 pb-lg-5">
                <div class="title-block-container text-center">
                    <h1 class="fw100">About Us</h1>
                    <div class="line-separator"></div>
                    <h4 class="fw900">Produced by Anaya Media</h4>
                </div>
                <div class="content-block-container text-center">
                    <p>We are a dynamic platform that adopts an urban spirituality lifestyle. Conversations from soul to soul; Vitamin to keep it elevated! Unplugged live interviews from heart to heart. High profile guests are agents of change or angels on earth who are making a difference in the community.</p>
                </div>
            </div>
        </div>
    </div>
</section>

    <?php //echo do_shortcode('[faqs catname="faqpage"]'); ?>

<section class="section pt-5 pb-5" id="faq">
    <div class="container">
        <div class="title-block-container text-center">
            <h1 class="fw100">Frequently Asked Questions</h1>
            <div class="line-separator"></div>
            <p class="text-muted mt-4 title-subtitle mx-auto">It is a long established fact that a reader will be of a page when established fact looking at its layout.</p>
        </div>
  
        <div class="row">
            <div class="col-md-4 faq-side"> 
                <div class="faq pt-5">
                    <div class="faq-icon faq-left">
                        <i class="fa fa-question-circle"></i>
                    </div>
                    <div class="faq-ans">
                        <h5 class="faq-title">How many years of experience do they have?</h5>
                        <p class="faq-sub-title pt-2 text-muted">15+ years</p>
                    </div>
                </div> 
                <div class="faq pt-5">
                    <div class="faq-icon faq-left">
                        <i class="fa fa-question-circle"></i>
                    </div>
                    <div class="faq-ans">
                        <h5 class="faq-title">What techniques do you use?</h5>
                        <p class="faq-sub-title pt-2 text-muted">Ayurveda that help generate vitality</p>
                    </div>
                </div>
                <div class="faq pt-5">
                    <div class="faq-icon faq-left">
                        <i class="fa fa-question-circle"></i>
                    </div>
                    <div class="faq-ans">
                        <h5 class="faq-title">What kind of life do they adopt?</h5>
                        <p class="faq-sub-title pt-2 text-muted">Urban spiritual life</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 faq-side "> 
                <div class="faq pt-5">
                    <div class="faq-icon faq-left">
                        <i class="fa fa-question-circle"></i>
                    </div>
                    <div class="faq-ans">
                        <h5 class="faq-title">Do the chakras work?</h5>
                        <p class="faq-sub-title pt-2 text-muted">Yes, with Crystals and Aromatherapy</p>
                    </div>
                </div> 
                <div class="faq pt-5">
                    <div class="faq-icon faq-left">
                        <i class="fa fa-question-circle"></i>
                    </div>
                    <div class="faq-ans">
                        <h5 class="faq-title">Do they give private classes?</h5>
                        <p class="faq-sub-title pt-2 text-muted">Yes, from Kundalini Yoga</p>
                    </div>
                </div>
                <div class="faq pt-5">
                    <div class="faq-icon faq-left">
                        <i class="fa fa-question-circle"></i>
                    </div>
                    <div class="faq-ans">
                        <h5 class="faq-title">Do you hold workshops for businesses?</h5>
                        <p class="faq-sub-title pt-2 text-muted">Yes.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 faq-side"> 
                <div class="faq pt-5">
                    <div class="faq-icon faq-left">
                        <i class="fa fa-question-circle"></i>
                    </div>
                    <div class="faq-ans">
                        <h5 class="faq-title">Do you offer withdrawal packages?</h5>
                        <p class="faq-sub-title pt-2 text-muted">Yes, weekend.</p>
                    </div>
                </div> 
                <div class="faq pt-5">
                    <div class="faq-icon faq-left">
                        <i class="fa fa-question-circle"></i>
                    </div>
                    <div class="faq-ans">
                        <h5 class="faq-title">I want to participate in the workshops, what should I do?</h5>
                        <p class="faq-sub-title pt-2 text-muted">Contact us at <?php echo do_shortcode('[phone]'); ?> or write to <?php echo do_shortcode('[email]'); ?></p>
                    </div>
                </div>
                <div class="faq pt-5">
                    <div class="faq-icon faq-left">
                        <i class="fa fa-question-circle"></i>
                    </div>
                    <div class="faq-ans">
                        <h5 class="faq-title">Where are they located?</h5>
                        <p class="faq-sub-title pt-2 text-muted"><?php echo do_shortcode('[address]'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="social_follow" class="social parallax bg-darken">
  <div class="container">
        <div class="title-block-container text-center">
            <h1 class="fw100 text-white">Follow us..!</h1>
            <div class="line-separator"></div>
            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </div>
          
    <div class="row social-icons">
      <?php $social_sites = chosen_social_array();
      foreach ($social_sites as $social_site => $value ):
         $_social_value = get_theme_mod($value);
         if(isset($_social_value) && $_social_value != ""): 
            $social_name = str_replace('-', ' ', $social_site); ?>     
                <a href="<?php echo $_social_value; ?>" class="social-link col-md-3 col-6">
                    <i class="fa fa-<?php echo $social_site;?>" aria-hidden="true"></i>
                    <span class="social-name"><?php echo ucfirst($social_name); ?></span>
                </a>
          <?php endif;
        endforeach; ?>
    </div>
  </div>
</section>


<section class="contacts content-block pt-5 pb-5 wow fadeIn" id="contact-us">
    <div class="container">
        <div class="title-block-container text-center">
            <h1 class="fw100">Contact us</h1>
            <div class="line-separator"></div>
            <p class="text-muted mt-4 title-subtitle mx-auto">Thank you again for visiting our website and if you have any questions please feel free to contact us at anytime.</p>
        </div>
        <div class="contact-details">
            <div class="row contacts-row">
                <div class="col-sm-7" id="contact-form-section">           
                    <?php echo do_shortcode('[contact-form-7 id="4" title="Contact form 1"]'); ?>
                </div>
                <div class="col-sm-4 contact-address contactdetails">
                    <!-- Address -->
                    <div class="contact-item contact-item-address">
                      <h6>Address</h6>
                      <p><?php echo nl2br(get_theme_mod('th_address')); ?></p>
                    </div>
                    <!-- Phone Numbers -->
                    <div class="contact-item contact-item-phone">
                      <h6>Phone Numbers</h6>
                      <p><?php echo do_shortcode('[phone]'); ?></p>
                    </div>
                    <!-- Email Address -->
                    <div class="contact-item contact-item-mail">
                      <h6>Email Address</h6>
                      <p><?php echo do_shortcode('[email]'); ?></p>
                    </div>
                    <!-- Business Hours -->
                    <div class="contact-item contact-item-hours">
                      <h6>Business Hours <small>( Eastern Time US )</small></h6>
                      <p>Monday - Friday : 9:00 AM - 5:00 PM</p>
                      <p>Saturdays : 8:00 AM to 12:00 PM</p>
                      <p>Sundays: <span class="red">Closed</span></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="section map wow fadeIn" id="gmap">
    <div class="elementor-custom-embed">
        <?php 
            $get_address_value = get_theme_mod('th_address'); 
            $aria_label = get_bloginfo('title'); 
        ?>
        <iframe src="https://www.google.com/maps?q=<?php echo urldecode($get_address_value); ?>&output=embed" aria-label="<?php echo $aria_label; ?>" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
</section>

<?php get_footer(); ?>
