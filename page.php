<?php get_header(); ?>
<div class="row">
	<section id="main" role="main" class="span8">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'templates/partials/content', 'page' ); ?>

		<?php endwhile; ?>

	</section> <!-- /#main -->

  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
