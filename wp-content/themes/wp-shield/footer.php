<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
?>
<?php 
    $uth_footer_phone = get_theme_mod( 'uth_footer_phone' );
    $uth_footer_address = get_theme_mod( 'uth_footer_address' );
    $uth_footer_email = get_theme_mod( 'uth_footer_email' );
    $uth_footer_map = get_theme_mod( 'uth_footer_map' );
    
    $site_title = get_bloginfo ( 'description' );

	$disable_alamo_footer_Page_setting = get_post_meta( get_the_ID(), 'disable_alamo_footer', true );
	$UTH_speaker_details = get_post_meta( get_the_ID(), 'speaker_details', true );
	$UTH_footer_grant_info = get_theme_mod( 'UTH_footer_grant_info');
	$uth_disable_alamo_footer = get_theme_mod( 'uth_disable_alamo_footer' );
	$news_events_status = get_post_meta( get_the_ID(), 'my_key', true ); //my_key is a meta_key. Change it to whatever you want
	$uth_enable_related_posts = get_theme_mod( 'uth_enable_related_posts');
	if ( ( isset( $uth_disable_alamo_footer ) && $uth_disable_alamo_footer == true ) || (is_single() && isset( $uth_enable_related_posts ) && $uth_enable_related_posts == true) ||$disable_alamo_footer_Page_setting == 'yes' || $news_events_status == 'tan-news-events' || $news_events_status == 'colorized-news-events' || $news_events_status == 'news-only-tan' || $news_events_status == 'events-only-tan' || ( is_singular( 'events' ) && !empty( $UTH_speaker_details))) {
		$uth_disable_alamo_status = true;
		$footer_class = 'class="flatten"'; 
		$alamo_code = '';
	}else{
		$uth_disable_alamo_status = false;
		$footer_class = ''; 
		$alamo_code = '<div class="alamo">
        <!--<img src="../../images/logo-alamo-only.svg">-->
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 116.256 47.344" enable-background="new 0 0 116.256 47.344" xml:space="preserve">
        <path id="never-forget" d="M0.116,47.344l116.069-0.002V44.05v-10.1v-4.303h-14.539v-5.724h-3.418c0,0-7.529,0.29-13.178-3.052 c-5.586-3.306-6.625-6.449-6.641-6.464V9.806h-7.446C69.692,4.193,64.675,0,58.674,0c-6.003,0-11.02,4.193-12.29,9.806h-7.579v4.601c-0.029,0.03-1.068,3.165-6.639,6.464c-5.649,3.342-13.179,3.052-13.179,3.052h-4.449v5.724H0v4.303v10.1v3.228"></path>
        </svg>
    </div>';
	}
?>
<footer <?php echo $footer_class;?>>
	<?php echo $alamo_code; ?>
    <div class="shield">
        <section class="grid-container">
            <div class="grid-x grid-margin-x align-center">
                <div class="cell large-12">
                    <h2>UT Health San Antonio</h2>
                    <?php 
                        if (!empty($site_title)){
                            echo '<h3>' . $site_title . '</h3>';
                        }
                    ?>
                </div>
				<?php dynamic_sidebar( 'footer-widgets' ); ?>

                <div class="cell large-3 medium-4 small-10">
                    <?php 
                        if (!empty($uth_footer_phone)){
                            echo '
                                <div class="contact">
                                    <a href="tel:' . $uth_footer_phone . '" class="fa-stack">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fas fa-phone fa-stack-1x fa-inverse"></i>
                                    </a>
                                    <a href="tel:' . $uth_footer_phone . '">' . $uth_footer_phone . '</a>
                                </div>';
                        }
                    ?>    
                    <div class="contact">
                        <?php if (empty($uth_footer_map)){
                                $map_url = 'https://www.uthscsa.edu/university/campus-maps';
                            }else{
                                $map_url = $uth_footer_map;
                            }
                        ?>
                        <a href="<?php echo $map_url; ?>" class="fa-stack">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fas fa-map-marker-alt fa-stack-1x fa-inverse"></i>
                        </a> 
                        <?php 
                        if (empty($uth_footer_address)){
                            echo '<address>7703 Floyd Curl Drive<br>San Antonio, TX 78229<br>
                            <a href="' . $map_url . '" class="arrow">Map and directions</a>
                        </address>';
                        }else{
                            echo '<address>' . $uth_footer_address . '<br>
                            <a href="' . $map_url . '" class="arrow">Map and directions</a>
                        </address>';
                        }
                        ?>
                    </div>
                    <?php if(!empty($uth_footer_email)) {
                    echo '<div class="contact">
                        <a href="mailto:' . $uth_footer_email . '" class="fa-stack">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fas fa-envelope fa-stack-1x fa-inverse"></i>
                        </a>
                        <a href="mailto:' . $uth_footer_email . '">' . $uth_footer_email . '</a> 
                    </div>';
                    }
                    ?>
                    
                </div>
                <div class="cell large-3 medium-4 small-10">
                <?php 
                    if ( has_nav_menu( 'footer_menu' ) ) {
                        wp_nav_menu( array( 'theme_location' => 'footer_menu', 'menu_class' => 'arrow-list' ) );
                    } else {
                        echo '<ul>
                        <li><a href="https://www.uthscsa.edu/university/about-us" class="arrow">About us</a></li>
                        <li><a href="https://www.uthscsa.edu/university/contact-us" class="arrow">Contact us</a></li>
                        <li><a href="https://directory.uthscsa.edu/" class="arrow">Faculty directory</a></li>
                        <li><a href="https://wp.uthscsa.edu/careers/" class="arrow">Job openings</a></li>
                        <li><a href="https://news.uthscsa.edu/" class="arrow">Newsroom</a></li>
                    </ul>';
                    }
                ?>
                    

                    <div class="social">
                        <?php echo do_shortcode('[UTH_social_links]'); ?>
                    </div>
                </div>
                <div class="cell large-5 medium-4 small-10">
                    <p class="large-text">We make lives better ??</p>
                    <p>The University of Texas Health Science Center at San Antonio, also called <a href="https://uthscsa.edu">UT Health San Antonio</a>, is a leading academic health center with a mission to make lives better through excellence in <a href="https://uthscsa.edu/academics/">advanced academics</a>, <a href="https://www.uthscsa.edu/research/">life-saving research</a> and comprehensive clinical care including <a href="https://everythingittakes.org/">health</a>, <a href="https://www.uthscsa.edu/patient-care/dental">dental</a> and <a href="https://cancer.uthscsa.edu/">cancer services</a>.</p>
                </div>
                <div class="cell large-1 medium-0 small-0"></div>
            </div>    
        </section>
    </div>
    <section class="bleed">
        <div class="grid-container">
            <div class="grid-x">
                <div class="cell">
                    <p><strong><a href="https://uthscsa.edu/university/web-privacy">Web Privacy</a></strong> | Links from websites affiliated with UT Health's website (uthscsa.edu) to other websites do not constitute or imply university endorsement of those sites, their content, or products and services associated with those sites. The content on this website is intended to be used for informational purposes only. Health information on this site is not meant to be used to diagnose or treat conditions. Consult a health care provider if you are in need of treatment.</p>
                </div>
            </div>
        </div>
    </section>
    <?php shield_quicklinks_view(); ?>
</footer>
<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
	</div><!-- Close off-canvas content -->
<?php endif; ?>
<?php wp_footer(); ?>
</body>
</html>
