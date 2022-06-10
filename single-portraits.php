<?php
/**
 * The template for displaying single portraits.
 *
 */

get_header(); ?>
  <div class="">
    <?php
    while ( have_posts() ) :

    the_post();
    ?>

    <div class=" w-full flex flex-col flex-nowrap justify-center items-center bg-blue-200 border-y-4 border-black ">
          <header class="text-4xl my-5">
            <?php the_title(); ?>
          </header>

          <div class="my-5">
            <?php the_content(); ?>
          </div>

          <div class="my-5">
            <p><?php echo get_post_meta( $post -> ID, 'About', true ) ?></p> 
          </div>
      </div>

      <div class="flex flex-row justify-end mr-10">
        <h3 class=" text-red-400"><a href="/dog-portraits"> BACK TO ALL PORTRAITS </a> </h3>
      </div>

    <?php
    // If comments are open or we have at least one comment, load up the comment template.
    // if ( comments_open() || get_comments_number() ) :
    //   comments_template();
    // endif;

  endwhile;
	?>
	</div><!-- .site-content -->
<?php
// get_sidebar();
get_footer();
