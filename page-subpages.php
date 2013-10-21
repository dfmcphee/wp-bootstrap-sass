<?php
/*
Template Name: Subpages
*/

//get current page ID
$the_id = get_the_ID();

$args = array(
'child_of'     => $the_id,
'title_li'     => '',
'depth'			=> 0,
'sort_order'	=> 'ASC',
'sort_column'	=> 'menu_order'
);

$subpages = get_pages($args);
?>

<?php get_header(); ?>
<div class="row">
	<section id="main" role="main" class="col-xs-12">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'templates/partials/content', 'page' ); ?>

		<?php endwhile; ?>

	</section> <!-- /#main -->
</div>
<div class="row">
  <?php for($i = 0; $i < count($subpages); $i++) { ?>
    <div class="col-sm-4">
      <?php $thumb = get_the_post_thumbnail( $subpages[$i]->ID, array(100,100), $attr = '' ); ?>
      <?php $link = get_permalink( $subpages[$i]->ID); ?>
      <a href="<?= $link ?>"><?= $thumb ?></a><br />
      <a href="<?= $link ?>"><?= $subpages[$i]->post_title ?></a>
    </div>
  <?php } ?>
</div>
<?php get_footer(); ?> 