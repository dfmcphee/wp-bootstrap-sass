<?php get_header(); ?>
  <div class="row">
    <div class="col-xs-12">
    	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
    		<div class="post" id="post-<?php the_ID(); ?>">
    
    			<div class="entry">
    
    				<?php the_content(); ?>
    
    				<?php wp_link_pages( array( 'before' => 'Pages: ', 'next_or_number' => 'number' ) ); ?>
    
    			</div>
    
    		</div>
    
    		<?php endwhile; endif; ?>
      </div>
  </div>

<?php get_footer(); ?>
