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
<footer class="mission">
    <section class="grid-container">
        <hr>
        <div class="grid-x grid-margin-x">
            <div class="cell large-12">
                <h2>UT Health San Antonio</h2>
                <h3>The University of Texas Health Science Center at San Antonio </h3>
            </div>
			<?php dynamic_sidebar( 'footer-widgets' ); ?>
            <div class="cell large-3 medium-4 small-10">
                <div class="contact">
                    <a href="#" class="fa-stack">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fas fa-phone fa-stack-1x fa-inverse"></i>
                    </a>
                    <a href="#">210-567-7000</a> 
                </div>
                <div class="contact">
                    <a href="#" class="fa-stack">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fas fa-map-marker-alt fa-stack-1x fa-inverse"></i>
                    </a> 
                
                    <address>
                        7703 Floyd Curl Drive<br>
                        San Antonio, TX 78226<br>
                        <a href="#">Map and directions</a>
                    </address>
                </div>
                <div class="status">
                    <i class="fas fa-check-circle"></i>
                    <div>
                        <p><strong>Status</strong></p>
                        <ul>
                            <li><a href="#">Campus Status: Normal</a></li>
                            <li><a href="#">IT Operations: Normal</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="cell large-3 medium-4 small-10">
                <p><strong>Connect with us</strong></p>
                <ul>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Contact us</a></li>
                    <li><a href="#">Faculty directory</a></li>
                    <li><a href="#">Job opernings</a></li>
                    <li><a href="#">Newsroom</a></li>
                </ul>

                <div class="social">
                    <ul>
                        <li><a href="#"><i class="fab fa-facebook-square fa-2x"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram-square fa-2x"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin fa-2x"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter-square fa-2x"></i></a></li>
                        <li><a href="#"><i class="fab fa-youtube-square fa-2x"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="cell large-5 medium-4 small-10">
                <p><strong>Resources</strong></p>
                <div class="columns">
                    <ul>
                        <li><a href="#">Accessibility</a></li>
                        <li><a href="#">Compact with Texans</a></li>
                        <li><a href="#">Compliance hotline</a></li>
                        <li><a href="#">Language assistance</a></li>
                        <li><a href="#">Legal</a></li>
                        <li><a href="#">Nondiscrimination and Title IX</a></li>
                        <li><a href="#">Patient right and responsibilities</a></li>
                        <li><a href="#">Policies</a></li>
                        <li><a href="#">Public/personal information</a></li>
                        <li><a href="#">Report fraud</a></li>
                        <li><a href="#">SACSCOC member</a></li>
                        <li><a href="#">Sexual misconduct policy and reporting</a></li>
                        <li><a href="#">State Auditor’s Office hotline</a></li>
                        <li><a href="#">State of Texas</a></li>
                        <li><a href="#">Student mental health resources</a></li>
                        <li><a href="#">Texas Homeland Security</a></li>
                        <li><a href="#">Texas records and information locator</a></li>
                        <li><a href="#">Veterans portal</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="bleed">
        <div class="grid-container">
            <div class="grid-x">
                <div class="cell">
                    <p>© Copyright 2014 - 2021 UT Health San Antonio</p>
                    <p><strong><a href="#">Web Privacy</a></strong> | Links from websites affiliated with UT Health's website (uthscsa.edu) to other websites do not constitute or imply university endorsement of those sites, their content, or products and services associated with those sites. The content on this website is intended to be used for informational purposes only. Health information on this site is not meant to be used to diagnose or treat conditions. Consult a health care provider if you are in need of treatment.</p>
                </div>
            </div>
        </div>
    </section>
</footer>
<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
	</div><!-- Close off-canvas content -->
<?php endif; ?>
    <!-- Off Canvas Quick Links Menu -->
    <?php UTH_render_quick_links_menu(); ?>
<?php wp_footer(); ?>
</body>
</html>
