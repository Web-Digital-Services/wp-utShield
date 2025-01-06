<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

load_theme_design('header'); ?>
<?php 
  $event_or_symposium = types_render_field("event-or-symposium"); 
  $event_date = types_render_field("event-date", array('format'=>'l, F j, Y'));
  $event_end_date = types_render_field("end-date");
  $event_start_time = types_render_field("event-start-time", array('output'=>'raw'));
  $event_end_time = types_render_field("event-end-time", array('output'=>'raw'));
  $event_time = types_render_field("time-events");
  $event_location = types_render_field("location-events");
  $event_reg_link = types_render_field("registration-link-events");
  $event_flyer_link = types_render_field("event-flyer", array('output'=>'raw'));
  $event_details = types_render_field("event-details-events");
  $event_speaker = types_render_field("about-the-speaker-events");
  $event_info_events = types_render_field("event-info-events");
?>
<?php
    //if the post is external, meta-refresh to the actual post URL.
  $post_extLink = get_post_meta( get_the_ID(), 'external-link-url-post', true );
  if(!empty($post_extlink)){
  echo '<meta http-equiv="refresh" content="0;url=' . $post_extlink . '" />';
  }
?>
<?php //get_template_part( 'template-parts/featured-image' ); ?>
    <section class="bleed">
      <div class="grid-container">
        <div class="grid-x grid-margin-x ">
          <main class="cell small-12 medium-7 large-8">
            <?php
              if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
              }
            ?>
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
            <?php echo $event_details; ?>
            <?php if (!empty($event_flyer_link) || !empty($event_reg_link )): ?>
              <div class="button-group">
                <?php if (!empty($event_reg_link)): ?>
                  <?php echo '<a class="button" href="' . $event_reg_link . '">Register</a>'; ?>
                <?php endif ?>
                <?php if (!empty($event_flyer_link)): ?>
                  <?php echo '<a class="button ghost" href="' . $event_flyer_link . '">Flyer</a>'; ?>
                <?php endif ?> 
              </div>
            <?php endif ?>
            <p class="bold margin-top">Share This Event</p>
            <div class="social">
            <?php echo do_shortcode('[addtoany]'); ?>
                </div>
        </main>
        <aside class="cell small-12 medium-5 large-4 flex-container small-4">
            <?php if (!empty($event_start_time) || !empty($event_end_time) || !empty($event_date) || !empty($event_time) || has_post_thumbnail()): ?>
              <div class="grid-container">
                <div class="callout light-beige">
                  <div>
                    <ul class="fa-ul outline">
                      <?php if (!empty($event_date)): ?>
                        <li>
									        <span class="fa-li">
										        <span class="fa-stack fa-1x">
											        <i class="far fa-circle fa-stack-2x"></i>
											        <i class="fas fa-calendar fa-stack-1x fa-inverse grey"></i>
									      	  </span>
									        </span>
									        <span><?php echo $event_date; ?></span>
                          <?php if (!empty($event_time)): ?>
                            <?php echo ' - ' . $event_time; ?>
                          <?php endif ?>
								        </li>
                      <?php endif ?>
                      <?php if (!empty($event_location)): ?>
                        <li>
									        <span class="fa-li">
										        <span class="fa-stack fa-1x">
											      <i class="far fa-circle fa-stack-2x"></i>
											      <i class="fas fa-map-marker-alt fa-stack-1x fa-inverse grey"></i>
										        </span>
									        </span>
									        <span><?php echo $event_location; ?></span>
                      </li>
                      <?php endif ?>
                      <?php if (!empty($event_info_events)): ?>
                        <li>
									        <span class="fa-li">
										        <span class="fa-stack fa-1x">
											      <i class="far fa-circle fa-stack-2x"></i>
											      <i class="fas fa-info fa-stack-1x fa-inverse grey"></i>
										        </span>
									        </span>
									        <span><?php echo $event_info_events; ?></span>
								        </li>
                      <?php endif ?>
                    </ul>
                    <?php


                      // Unix time = 1685491200
                      $unixTime = strtotime($event_date);
                      // Pass the new date format as a string and the original date in Unix time
                      $newDate = date("Y-m-d", $unixTime);
                      $eventName = get_the_title();
                      $calOptions = "'Apple','Google','iCal','Outlook.com','Yahoo', 'Microsoft365', 'MicrosoftTeams'";
                      $iCalFileName = str_replace(' ', '-', strtolower($eventName));
                      echo do_shortcode('[add-to-calendar-button name="' . $eventName . '" options="' . $calOptions .'" startDate="' . $newDate . '" startTime="' . $event_start_time . '" endTime="' . $event_end_time . '" iCalFileName="' . $iCalFileName . '" timeZone="America/Chicago"]');
                      ?>
                  </div>
                </div>
                <?php if ( has_post_thumbnail() ) { 
						  echo the_post_thumbnail('post-thumbnail', ['class' => 'margin-bottom', 'title' => 'Feature image']);
            } ?>
              </div>
            <?php endif ?>
          </aside>
        </div>
      </div>
    </section>
  <?php if (!empty($event_speaker)): ?>
    <section class="bleed light-grey">
      <div class="grid-container">
        <div class="grid-x grid-margin-x">
          <div class="cell large-12 medium-12">
          <h2>About the Speaker(s)</h2>
          <?php echo $event_speaker; ?>
  </div>
        </div>
      </div>
    </section>
  <?php endif ?>
<?php load_theme_design('footer');
