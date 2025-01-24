<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Design_Comuni_Italia
 */

get_header();
?>
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <?php get_template_part("template-parts/common/breadcrumb"); ?>
                    <div class="cmp-hero text-center"> <!-- Aggiungi text-center per la centratura -->
                        <section class="bg-white align-items-start">
                            <!-- Div per l'immagine e il testo -->
                            <div class="centered-content">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/404.jpg" alt="Immagine non trovata" class="img-fluid mb-4">
                                <p class="text-black titillium text-paragraph"><?php _e( 'Oops! La pagina che cerchi non è stata trovata,<br> <a href="javascript:history.back();" title="Torna alla pagina precedente">torna indietro</a> o utilizza il menu per continuare la navigazione.', 'design_comuni_italia' ); ?></p>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php
get_footer();
?>
