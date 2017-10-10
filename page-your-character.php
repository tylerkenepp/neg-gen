<?php get_header(); ?>

		<!-- section -->
    <section> <?php
      if (is_user_logged_in()) {
        $character = new WP_Query(array('post_type'=>'character',
                                        'meta_query' => array(
                                          array(
                                            'key'     => 'player',
                                            'value'   => get_current_user_id(),
                                            'compare' => '=',
                                            ),
                                          ),
                                       )
                                 );
        if ( $character->have_posts() ) : while ( $character->have_posts() ) : $character->the_post();
          include "character-info.php";
        endwhile; endif;
     } else { ?>
       <h2>You must be logged in to access this page</h2> <?php
     } ?>
    </section>
		<!-- /section -->

<?php get_footer(); ?>
