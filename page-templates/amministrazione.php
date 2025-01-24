<?php
/* Template Name: amministrazione
 *
 * amministrazione template file
 *
 * @package Design_Comuni_Italia
 */
global $post;

$data_element = 'data-element="management-category-link"';
get_header();

?>
	<main>
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<?php 
            $data_element = 'data-element="page-name"';
            get_template_part("template-parts/hero/hero"); ?>
			<?php get_template_part("template-parts/amministrazione/evidenza"); ?>
			<?php get_template_part("template-parts/amministrazione/cards-list"); ?>
			<?php get_template_part("template-parts/common/valuta-servizio"); ?>
			<?php get_template_part("template-parts/common/assistenza-contatti"); ?>
							
		<?php 
			endwhile; // End of the loop.
		?>
	</main>

<?php
get_footer();