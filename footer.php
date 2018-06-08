<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package ERW_Theme_Base
 */
?>


  <!-- <section class="section fp-auto-height"> -->
    
      <?php if ( is_active_sidebar( 'footer1-sidebar' ) || is_active_sidebar( 'footer2- sidebar' ) || is_active_sidebar( 'footer3-sidebar' ) || is_active_sidebar( 'footer4-sidebar' ) ) : ?>
    <div id="subfooter" class="sub-footer">
      <?php $count = 0;
      if ( is_active_sidebar('footer1-sidebar') ) : $count++; endif;
      if ( is_active_sidebar('footer2-sidebar') ) : $count++; endif;
      if ( is_active_sidebar('footer3-sidebar') ) : $count++; endif;
      if ( is_active_sidebar('footer4-sidebar') ) : $count++; endif;
      $row = 'col-lg-'. 12/$count .' col-md-'. 12/$count .' col-sm-'. 12/$count;
      ?>
      <div class="footer-top">
        <div class="container">
          <div class="row">
            <?php if ( is_active_sidebar('footer1-sidebar') ) : ?>
            <div class="<?php echo $row ?>">
              <?php dynamic_sidebar('footer1-sidebar'); ?>
            </div>
            <?php endif;
            if ( is_active_sidebar('footer2-sidebar') ) : ?>
            <div class="<?php echo $row ?>">
              <?php dynamic_sidebar('footer2-sidebar'); ?>
            </div>
            <?php endif;
            if ( is_active_sidebar('footer3-sidebar') ) : ?>
            <div class="<?php echo $row ?>">
              <?php dynamic_sidebar('footer3-sidebar'); ?>
            </div>
            <?php endif;
            if ( is_active_sidebar('footer4-sidebar') ) : ?>
            <div class="<?php echo $row ?>">
              <?php dynamic_sidebar('footer4-sidebar'); ?>
            </div>
            <?php endif; ?>
          </div>
        </div><!-- /.container -->
      </div>
    </div>
      <?php endif; ?>

    <footer id="footer" class="site-footer pt20" role="contentinfo">

<div class="container">
    <div class="row">
        <p class="muted text-center">Copyright &copy; <?php echo date('Y'); ?> <?php echo get_bloginfo('name'); ?>. All rights reserved.</p>
    </div>
  </div>
    </footer><!-- #colophon -->






















<!-- <div id="modalloadpost"></div> -->

<a href="#home" id="back-to-top" class="back-to-top" data-placement="top" title="" data-original-title="Go to top" aria-describedby="tooltip200161"><i class="fa fa-angle-double-up"></i></a>


<?php wp_footer();  ?>

   </body>
</html>



