<?php
/* Template Name: Uffici elenco
 *
 * amministrazione template file
 *
 * @package Design_Comuni_Italia
 */
global $post;
	$prefix = "_dci_persona_pubblica_";
	$organizzazioni = dci_get_meta("organizzazioni", $prefix, 4958);
get_header();

?>
	<main>
		
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<?php get_template_part("template-parts/hero/hero"); ?>
			<!--<?php get_template_part("template-parts/amministrazione/evidenza"); ?>-->
	
		
		
		<div class="row justify-content-center">
                    <div class="col-12 col-lg-10">
	    <?php if (is_array($organizzazioni) && count($organizzazioni)) { ?>
                                <section id="persone" class="it-page-section mb-4">
                                   
                                        <div class="row g-2">
											<?php foreach ($organizzazioni as $uo_id) { ?>
                                                <div class="col-lg-4 col-md-12">
													<?php  get_template_part("template-parts/unita-organizzativa/card-full");?>
                                             
											</div>
											<?php } ?>
                                        </div>
                                  
                                </section>
							<?php } ?>
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






