<?php
/* Template Name: Elenco di unità amministrative
 *
 * uffici template file
 *
 * @package Design_Comuni_Italia
 */
global $post, $persone, $unita_organizzative, $titolo;

$persone = dci_get_meta("persone", '_dci_aree_amministrative_', $post->ID);
$unita_organizzative = dci_get_meta("tipo_uo", '_dci_aree_amministrative_', $post->ID);
$titolo = dci_get_meta("titolo", '_dci_aree_amministrative_', $post->ID);
get_header();

?>
	<main>
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<?php $data_element = 'data-element="page-name"';
            get_template_part("template-parts/hero/hero"); ?>
			<?php get_template_part("template-parts/amministrazione/evidenza"); ?> 
			<?php get_template_part("template-parts/amministrazione/aree-amministrative/cards-list"); ?>
			<?php get_template_part("template-parts/common/valuta-servizio"); ?>
			<?php get_template_part("template-parts/common/assistenza-contatti"); ?>
		<?php 
			endwhile; // End of the loop.
		?>
	</main>

<?php
get_footer();