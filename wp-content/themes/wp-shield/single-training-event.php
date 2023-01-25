<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

load_theme_design('header'); ?>
<?php 
  $training_date = types_render_field("training-date", array('format'=>'F j, Y g:ia','style'=>'text'));
  $training_end_date = types_render_field("training-event-end-time", array('format'=>'g:ia','style'=>'text'));
  $training_location = types_render_field("location");
  $training_event_link = types_render_field("training-event-link", array( 'output' => 'raw'));
?>

<?php //get_template_part( 'template-parts/featured-image' ); ?>
<section class="bleed">
    <div class="grid-container">
        <div class="grid-x grid-margin-x">
    <main class="main-content cell small-12 medium-7 large-8">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content-training-event', '' ); ?>
				<?php //the_post_navigation(); ?>
				<?php //comments_template(); ?>
			<?php endwhile; ?>




		<!-- AddThis Button BEGIN -->
          <p class="bold margin-top">Share This Training</p>
          <div class="addthis_toolbox addthis_default_style addthis_32x32_style social">
            <ul>
              <li><a class="addthis_button_facebook"><span class="fa-stack fa-lg">
                  <i class="fas fa-square fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
              </span></a></li>
              <li><a class="addthis_button_twitter"><span class="fa-stack fa-lg">
                  <i class="fas fa-square fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span></a></li>
              <li><a class="addthis_button_email"><span class="fa-stack fa-lg">
                  <i class="fas fa-square fa-stack-2x"></i>
                  <i class="fas fa-envelope fa-stack-1x "></i>
                </span></a></li>
            </ul>
          </div>
          <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53299c8514eca78a"></script>
          <!-- AddThis Button END -->
		</main>

    <aside class="cell small-12 medium-5 large-4">
                <div class="grid-container ">
                    <div class="callout light-beige">
                        <h2 class="h3">Training Info</h2>
                        <div>
                            <ul class="fa-ul outline">
                                <li>
                                    <span class="fa-li">
                                        <span class="fa-stack fa-1x">
                                            <i class="far fa-circle fa-stack-2x"></i>
                                            <i class="fas fa-calendar fa-stack-1x fa-inverse grey"></i>
                                        </span>
                                    </span>
                                    <?php 
                                      if (!empty ($training_date)){ 
                                        echo '<p>' . $training_date . ' - ' . $training_end_date . '</p>';
                                      }
                                    ?>
                                </li>
                                <li>
                                    <span class="fa-li">
                                        <span class="fa-stack fa-1x">
                                            <i class="far fa-circle fa-stack-2x"></i>
                                            <i class="fas fa-map-marker-alt fa-stack-1x fa-inverse grey"></i>
                                        </span>
                                    </span>
                                    <?php 
                                      if (!empty ($training_location)){ 
                                        echo '<p>' . $training_location . '</p>';
                                      }
                                    ?>
                                </li>

                            </ul>
                                                    <p>
                            <a class="arrow" href="<?php echo get_feed_link('training-calendar'); ?>?id=<?php echo get_the_ID(); ?>"> Add to Calendar</a>
                        </p>


                    </div>
                </div>
            </aside>


</div>
</div>
</section>
<?php load_theme_design('footer');
