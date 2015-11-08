<?php 
if ( in_category(array( portfolio )) ) {
	get_template_part('single-portfolio' );
} elseif ( in_category( news )) {
	get_template_part('single-news' );
} else {
	get_template_part('single-news' );
}
?>
