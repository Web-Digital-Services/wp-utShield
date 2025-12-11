<?php
/**
 * The template for displaying all single research studies and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

load_theme_design('header'); ?>
<?php 
	$UTH_featured_image = types_render_field("rs-featured-image", array("output" => "html"));
	$UTH_investigator = types_render_field("rs-investigator");
	$UTH_conditions = types_render_field("rs-conditions"); 
	$UTH_purpose = types_render_field("rs-purpose");
	$UTH_inclusion = types_render_field( "rs-inclusion");
	$UTH_exclusion = types_render_field( "rs-exclusion");
    $contact_title = types_render_field( "rs-contact-title");
    $contact_address = types_render_field( "rs-contact-address");
    $contact_email = types_render_field( "rs-contact-email");
    $contact_phone = types_render_field( "rs-contact-phone");
    $contact_fax = types_render_field( "rs-contact-fax");
?>
<div class="grid-container">
    <div class="grid-x grid-margin-x">
        <main class="main-content cell small-12 large-8 medium-8">
            <?php
                if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
                }
            ?>
            <h1 class="h3"><?php the_title(); ?></h1>
            <p><strong>Principal Investigator:</strong> <?= $UTH_investigator ?></p>
            <p><strong>Conditions:</strong> <?= $UTH_conditions ?></p>

            <!-- Purpose -->
            <?php if(!empty($UTH_purpose)): ?>
                <h2 class="h4 color">Purpose</h2>
                <p><?= $UTH_purpose ?></p>
            <?php endif; ?>

            <!-- Eligibility Criteria -->
            <!-- Check if data is missing for inclusion/exclusion, allows them some flexibility -->
            <?php if(!empty($UTH_inclusion) && empty($UTH_exclusion)): ?> 
                <h3 class="color">Eligibility Criteria</h3>
                <p style="margin-bottom: 1rem;"><strong>Inclusion Criteria:</strong></p>
                <div style="margin-bottom: 1rem;"><?= $UTH_inclusion ?></div>
            <?php elseif(empty($UTH_inclusion) && !empty($UTH_exclusion)): ?>
                <h3 class="color">Eligibility Criteria</h3>
                <p style="margin-bottom: 1rem;"><strong>Exclusion Criteria:</strong></p>
                <div style="margin-bottom: 1rem;"><?= $UTH_exclusion ?></div>
            <?php elseif(!empty($UTH_inclusion) && !empty($UTH_exclusion)): ?>
                <h3 class="color">Eligibility Criteria</h3>
                <p style="margin-bottom: 1rem;"><strong>Inclusion Criteria:</strong></p>
                <div style="margin-bottom: 1rem;"><?= $UTH_inclusion ?></div>
                <p style="margin-bottom: 1rem;"><strong>Exclusion Criteria:</strong></p>
                <div style="margin-bottom: 1rem;"><?= $UTH_exclusion ?></div>
            <?php else: ?>
            <?php endif; ?>

        </main>
        <!-- Featured image and contact block -->
        <aside class="cell small-12 medium-5 large-4">
           <?php if (!empty($UTH_featured_image)): ?>
                <div class="featured-image-wrapper">
                    <?= $UTH_featured_image ?>
                </div>
            <?php endif; ?>

            <!-- Check to see if entire contact block is empty, if truthy show contact block -->
            <?php
                $has_contact_info = 
                    !empty($contact_title) ||
                    !empty($contact_address) ||
                    !empty($contact_email) ||
                    !empty($contact_phone) ||
                    !empty($contact_fax);
            ?>
            <?php if($has_contact_info): ?>
                <div class="callout contact outline margin-top">
                    <h2 class="h5" style="margin-bottom: 1.125rem;">
                        <?= !empty($contact_title) ? $contact_title : 'Clinical Trial Inquiries' ?>
                    </h2>
                    
                    <?php if (!empty($contact_address)): ?>
                        <address style="margin-bottom: 1.125rem;"><?= $contact_address ?></address>
                    <?php endif; ?>

                    <ul class="fa-ul">
                        <!-- Check for email -->
                        <?php if (!empty($contact_email)): ?>
                            <li style="margin-bottom: 1.125rem;">
                                <a href="mailto:<?= $contact_email ?>">
                                    <span class="fa-li">
                                        <span class="fa-stack">
                                            <i class="fas fa-circle fa-stack-2x"></i>
                                            <i class="fas fa-envelope fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </span>
                                    <span><?= $contact_email ?></span>
                                </a>
                            </li>
                        <?php endif; ?>

                        <!-- Check for phone -->
                        <?php if (!empty($contact_phone)): ?>
                            <li style="margin-bottom: 1.125rem;">
                                <a href="tel:<?= $contact_phone ?>">
                                    <span class="fa-li">
                                        <span class="fa-stack">
                                            <i class="fas fa-circle fa-stack-2x"></i>
                                            <i class="fas fa-phone-alt fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </span> 
                                    <span><?= $contact_phone ?></span>
                                </a>
                            </li>
                        <?php endif; ?>

                        <!-- Check for fax -->
                        <?php if (!empty($contact_fax)): ?>
                            <li style="margin-bottom: 1.125rem;">
                                <a>
                                    <span class="fa-li">
                                        <span class="fa-stack">
                                            <i class="fas fa-circle fa-stack-2x"></i>
                                            <i class="fas fa-fax fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </span> 
                                    <span><?= $contact_fax ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>

                </div>
            <?php endif; ?>
        </aside>
    </div>
</div>
<?php load_theme_design('footer');