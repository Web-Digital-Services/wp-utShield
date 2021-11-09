<?php
/**
 *
 * Template for About the Speaker
 *
 */
?>
<?php $UTH_speaker_details = get_post_meta( get_the_ID(), 'speaker_details', true ); ?>
<div class="bleed roomy panel single-border single-border-top close">
	<div class="row">
		<div class="columns large-12">
			<h2 class="emulate-h1">About the Speaker(s)</h2>
		</div>
	</div>
	<div class="row">
		<div class="columns large-8 medium-8 small-12">
			<?php if( !empty( $UTH_speaker_details ) ) { echo wpautop($UTH_speaker_details);} ?>
		</div>
	</div>
</div>