<?php
/* Template Name: Amministrativo elenco
 *
 * amministrativo template file
 *
 * @package Design_Comuni_Italia
 */
global $post;
$filtro = array(
'post_type' => 'persona_pubblica',
'meta_query' => array(
    array(
        'key' => '_dci_persona_pubblica_tipo_incarico',
        'value' => 'Amministrativo',
        'compare' => '='
    ),
    array(
        'key' => '_dci_persona_pubblica_cognome', // Assicurati di sostituire questo con il corretto nome del campo meta per il cognome
        'compare' => 'EXISTS', // Verifica se il campo esiste
    )
),
'orderby' => 'meta_value', // Ordina per il valore dei metadati
'meta_key' => '_dci_persona_pubblica_cognome', // Campo meta contenente il cognome
'order' => 'ASC', // Ordine ascendente (alfabetico)
'posts_per_page' => -1, // -1 restituisce tutti i risultati, rimuovi se vuoi un numero specifico
);


$persone=new WP_Query($filtro);

get_header();
?>
<main>
    
    <?php
    while (have_posts() ) :
        the_post();
        ?>
        <?php get_template_part("template-parts/hero/hero"); ?>
    
    <div class="container py-5">
    <div class="row g-4">
        <div class="col-12 col-md-6 col-lg-12">
            <?php if($persone->have_posts()) { ?>
                                <section id="persone" class="it-page-section mb-4">
                                  
                                        <div style="margin-bottom:30px;" class="row g-10"></div>
                                        <div class="row g-2">
                                            
                                            <?php foreach($persone->posts as $persona_id){
                                            ?>
                                                <div class="col-lg-6 col-md-12">
                                                    <?php get_template_part("template-parts/persona/card-vertical-thumb-uo");?>
                                            </div>
                                            <?php }?>
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
