<div class="bg-color-light">
    <div class="container pt40 pb40">
     <p class="text-center">Welcome, registered user!</p>
     <h1 class="text-center color_blue"><?php _e("News Blocks", "ERW_Theme_Base"); ?> </h1>
        <div id="owl-demo" class="row news-v2">

      <?php query_posts('slug=blog_article'); ?>
        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>
            <div class="item">
                <div class="news-v2-badge">
                  <?php if (has_post_thumbnail()): ?>
                        <?php the_post_thumbnail('large', array('class' => 'full-width img-responsive')); ?>
                  <?php else: ?>
                        <img src="http://dummyimage.com/279x279/cccccc/fff.jpg" class="img-responsive" alt="Image">
                  <?php endif ?>
                  
                    <p><span><?php echo get_the_date( 'd' ); ?></span><small><?php echo get_the_date( 'F' ); ?></small></p>

                </div>
                <div class="news-v2-desc text-center">
                    <h3><?php the_title(); ?></h3>
                    <p><?php echo excerpt(15); ?></p>
                </div>
            </div>

        <?php endwhile;?>
        <?php wp_reset_query(); ?>
      <?php else: ?>
        <p>No future events scheduled.</p>
      <?php endif ?>

        </div>
    </div>        
</div>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $("#owl-demo").owlCarousel({ 
        autoPlay: 3000, //Set AutoPlay to 3 seconds 
        items : 4,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3] 
    });
  });
</script>

<style type="text/css">
/*News v2
------------------------------------*/
#owl-demo .item{
  margin: 3px;
}
#owl-demo .item img{
  display: block;
  width: 100%;
  height: auto;
}

.bg-color-light {
    background-color: #f7f7f7 !important;
}
.news-v2 .news-v2-badge {
  overflow: hidden;
  position: relative;
}

.news-v2 .news-v2-badge p {
  left: 0;
  top: 20px;
  background: rgba(105, 180, 7, 0.98);
  padding: 5px 15px;
  text-align: center;
  position: absolute;
}

.news-v2 .news-v2-badge span {
  color: #F7F7F7;
  display: block;
  font-size: 16px;
  line-height: 16px;
}

.news-v2 .news-v2-badge small {
  color: #555;
  display: block;
  font-size: 10px;
  text-transform: uppercase;
}

/*News Description*/
.news-v2 .news-v2-desc {
  padding: 20px;
  background: #FE5D00;
}

.news-v2 .news-v2-desc h3 {
  margin: 0 0 3px;
  font-size: 16px;
  color: #fff;
}

.news-v2 .news-v2-desc small {
  color: #555;
  display: block;
  margin-bottom: 15px;
  text-transform: uppercase;
}

.news-v2 .news-v2-desc p {
  color: #FDFDFD;
}

</style>