<?php
/* Template Name: Tipologia Notizia
* NB: va tenuto nella root del sito altrimenti la add_rewrite_rule non trova la pagina
 *
  * notizie template file
 * nella pagina con questo templagte viene aggiunto un campio per scegliere la tassonomia voluta
 *
 * @package Design_Comuni_Italia
 */
 
global $post, $with_shadow,$taxonomy,$titolo;
$search_url = esc_url( home_url( '/' ));
/** prendo il tipo di notizia che si vuole visualizzare*/
$taxonomy = get_query_var( 'tipo', false );
$titolo = humanize($taxonomy, "-");
//imposto data-element
$data_element = 'data-element="news-category-link"';
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
			<?php get_template_part("template-parts/novita/tutti-notizie"); ?>
			<?php get_template_part("template-parts/common/valuta-servizio"); ?>
			<?php get_template_part("template-parts/common/assistenza-contatti"); ?>
		<?php 
			endwhile; // End of the loop.
		?>
	</main>

<?php
get_footer();