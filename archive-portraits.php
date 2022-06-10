<?php
/**
 * The template for displaying archive pages.
 */

get_header(); ?>
  <div class=" flex flex-row flex-wrap justify-evenly items-center bg-blue-200 border-y-4 border-black" >
    <?php
      if ( have_posts() ) :

        while ( have_posts() ) :

        the_post();
    ?>      
        <div class=" text-center flex flex-col m-5">
			       <h1> <?php the_title( '<h2 class="text-4xl m-3"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); ?> </h1>
              <?php the_content(); ?>
        </div>

        <?php
        // If comments are open or we have at least one comment, load up the comment template.
        // if ( comments_open() || get_comments_number() ) :
        //   comments_template();
        // endif;

      endwhile;

	  // the_posts_navigation();

    else :
      get_template_part( 'content-none' );
    endif;
    ?>
   


	</div><!-- .site-content -->
<?php
// get_sidebar();
get_footer();
