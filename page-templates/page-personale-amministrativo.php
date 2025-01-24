<?php
/* Template Name: Personale amministrativo
 *
 * amministrazione template file
 *
 * @package Design_Comuni_Italia
 */
global $post;
	$prefix = "_dci_unita_organizzativa_";
	$persone = dci_get_meta("persone_struttura", $prefix, 4957);
get_header();

?>
	<main>
		<style>
			@media (min-width: 992px){
.row.variable-gutters {
    margin-right: -12px;
    margin-left: 80px;
}}
		</style>
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<?php get_template_part("template-parts/hero/hero"); ?>

	 <div class="row justify-content-center">
                    <div class="col-12 col-lg-10">
	<?php if (is_array($persone) && count($persone)) { ?>
                                <section id="persone" class="it-page-section mb-4">
                                   
                                        <div class="row g-2">
											<?php foreach ($persone as $persona_id) { ?>
                                                <div class="col-lg-4 col-md-12">
													<?php get_template_part("template-parts/persona/card-no-foto");?>
                                             
											</div>
											<?php } ?>
                                        </div>
                                  
                                </section>
							<?php } ?>
		   </div>
			    </div>
		   </div>
			<?php get_template_part("template-parts/common/valuta-servizio"); ?>
			<?php get_template_part("template-parts/common/assistenza-contatti"); ?>
							
		<?php 
			endwhile; // End of the loop.
		?>
	</main>

<?php
get_footer();






