<?php get_header(); ?>
		<section> <?php
			if (is_user_logged_in()) {
	      if (current_user_can('edit_others_pages')) {
	        if ( have_posts() ) : while ( have_posts() ) : the_post();
	          include "character-info.php";
	        endwhile; endif;
	     } else { ?>
	       <h2>You must be an admin to access characters that are not your own</h2> <?php
	     }
	   } else { ?>
	     <h2>You must be logged in to access this page</h2> <?php
	   } ?>
		</section>
<?php get_footer(); ?>
