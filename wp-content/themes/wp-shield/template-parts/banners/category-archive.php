<?php
/**
 * The default template for displaying the homepage banner
 *
 * The homepage banner features a full width image and text box with a call to action. 
 * The recommended image size is 1525x400px
 * 
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>	
<header>
	<section class="bleed hero">
		<div class="grid-container">
			<div class="grid-x margin-x">
				<div class="cell large-12">
					<?php         
						if(is_category()){
							single_cat_title('<h2>Category: ', '</h2>');
						}else{
							the_title('<h1 class="close">', '</h1>');
						}
					?>
			</div>
		</div>
	</section>
</header>