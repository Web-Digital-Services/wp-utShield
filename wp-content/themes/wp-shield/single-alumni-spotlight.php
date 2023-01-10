<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

load_theme_design('header'); ?>
<?php 
  $spotlight_featured_quote = types_render_field("featured-quote"); 
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
          <main class="cell medium-12 large-8">
            <?php
              if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
              }
            ?>
            <?php the_content(); ?>
                

        </main>


          <aside class="cell medium-12 large-4">
            <blockquote class="fancy">
                <?php 
                  if (!empty ($spotlight_featured_quote)){ 
                    echo '<p>' . $spotlight_featured_quote  . '</p>';
                  }
                ?>

                <cite><?php the_title(); ?></cite>

            </blockquote>
          </aside>

      </div>



      </div>
    </section>
<?php load_theme_design('footer');
