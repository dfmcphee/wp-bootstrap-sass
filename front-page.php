<?php get_header(); ?>
  <div class="row">
    <div class="span8">
    	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
    		<div class="post" id="post-<?php the_ID(); ?>">
    
    			<h1><?php the_title(); ?></h1>
    
    			<div class="entry">
    
    				<?php the_content(); ?>
    
    				<?php wp_link_pages( array( 'before' => 'Pages: ', 'next_or_number' => 'number' ) ); ?>
    
    			</div>
    
    		</div>
    
    		<?php endwhile; endif; ?>
      </div>
      <?php get_sidebar(); ?>
  </div>

<?php get_footer(); ?>
