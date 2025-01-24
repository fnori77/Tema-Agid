<?php
/**
 * Ufficio template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Design_Comuni_Italia
 */
//global $uo_id, $file_url, $hide_arguments;

get_header();
global $post;
$compensi = get_post_meta($post->ID, "_dci_incarico_compensi", true);
$importi = get_post_meta($post->ID, "_dci_incarico_importi_viaggi_servizi", true);
$id_persona = get_post_meta($post->ID, "_dci_incarico_persona", true);
$id_unita_organizzativa = get_post_meta($post->ID, "_dci_incarico_unita_organizzativa", true);
$id_responsabile = get_post_meta($post->ID, "_dci_incarico_responsabile_struttura", true);
$id_atto_nomina = get_post_meta($post->ID, "_dci_incarico_atto_nomina", true);
$ulteriori_informazioni = get_post_meta($post->ID, "_dci_incarico_ulteriori_informazioni", true);
$tipo_incarico = get_the_terms( $post->ID, 'tipi_incarico' );
//AGGIUNTA ANDREA BERSI
$persone_pubbliche = getPersoneDiOrgano([$post->ID]);
setlocale(LC_ALL, 'it_IT');
$data_inizio_incarico = strftime("%d %B %Y", dci_get_meta("data_inizio_incarico", "_dci_incarico_", $post->ID) );
$data_conclusione_incarico = dci_get_meta("data_conclusione_incarico", "_dci_incarico_", $post->ID);
if($data_conclusione_incarico) {
    $data_conclusione_incarico = strftime("%d %B %Y",  $data_conclusione_incarico);
}
$data_insediamento = dci_get_meta("data_insediamento", "_dci_incarico_", $post->ID);
if($data_insediamento)  {
    $data_insediamento = strftime("%d %B %Y",  $data_insediamento);
}
//FINE AGGIUNTA
$tipo_incarico = ucfirst($tipo_incarico["0"]->name);
        
?>
<main>
  <?php
    while (have_posts()) :
        the_post();
    ?>
    <div class="container" id="main-container">
      <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
          <?php get_template_part("template-parts/common/breadcrumb"); ?>
        </div>
      </div>
    </div>
    
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
          <div class="cmp-heading pb-3 pb-lg-4">
            <div class="row">
              <div class="col-lg-8">
                <div class="titolo-sezione">
                  <h1><?php the_title(); ?></h1>
                </div>
              </div>
              <div class="col-lg-3 offset-lg-1 mt-5 mt-lg-0">
                <?php
                $inline = true;
                get_template_part('template-parts/single/actions');
                ?>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="container">
          <div class="row justify-content-center">
            <?php get_template_part('template-parts/single/foto-large'); ?>

          </div>
        </div>
         <div class="container">
            <div class="row border-top border-light row-column-border row-column-menu-left">
                <div class="col-12 col-lg-3 mb-4 border-col">
                    <div class="cmp-navscroll sticky-top" aria-labelledby="accordion-title-one">
                        <nav class="navbar it-navscroll-wrapper navbar-expand-lg" aria-label="Indice della pagina" data-bs-navscroll>
                            <div class="navbar-custom" id="navbarNavProgress">
                                <div class="menu-wrapper">
                                    <div class="link-list-wrapper">
                                        <div class="accordion">
                                            <div class="accordion-item">
                                            <span class="accordion-header" id="accordion-title-one">
                                                <button class="accordion-button pb-10 px-3 text-uppercase" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-one" aria-expanded="true" aria-controls="collapse-one">
                                                    Indice della pagina
                                                    <svg class="icon icon-xs right">
                                                        <use href="#it-expand"></use>
                                                    </svg>
                                                </button>
                                            </span>
                                                <div class="progress">
                                                    <div class="progress-bar it-navscroll-progressbar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div id="collapse-one" class="accordion-collapse collapse show" role="region" aria-labelledby="accordion-title-one">
                                                    <div class="accordion-body">
                                                        <ul class="link-list" data-element="page-index">

                                                            <?php if ($tipo_incarico) { ?>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" href="#tipo_incarico">
                                                                        <span class="title-medium">Tipo di incarico</span>
                                                                    </a>
                                                                </li>
                                                            <?php } ?>
                                                            
                                                            <?php if ($compensi) { ?>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" href="#compensi">
                                                                        <span class="title-medium">Compensi</span>
                                                                    </a>
                                                                </li>
                                                            <?php } ?>
                                                            
                                                            <?php if ($data_inizio_incarico) { ?>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" href="#data_inizio_incarico">
                                                                        <span class="title-medium">Data inizio incarico</span>
                                                                    </a>
                                                                </li>
                                                            <?php } ?>
                                                            
                                                            <?php if ($data_conclusione_incarico) { ?>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" href="#data_fine_incarico">
                                                                        <span class="title-medium">Data conclusione incarico</span>
                                                                    </a>
                                                                </li>
                                                            <?php } ?>

                                                            <?php if ($data_insediamento) { ?>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" href="#data_conclusione">
                                                                        <span class="title-medium">Data insediamento</span>
                                                                    </a>
                                                                </li>
                                                            <?php } ?>

                                                            <?php if ( $importi ) { ?>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" href="#importi">
                                                                        <span class="title-medium">Importi di viaggio e/o servizio</span>
                                                                    </a>
                                                                </li>
                                                            <?php } ?>

                                                            <?php if ( $id_persona ) { ?>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" href="#persona">
                                                                        <span class="title-medium">Persona che ha la carica/incarico</span>
                                                                    </a>
                                                                </li>
                                                            <?php } ?>

                                                            <?php if ( $id_unita_organizzativa ) { ?>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" href="#unita_organizzativa">
                                                                        <span class="title-medium">Unità organizzativa</span>
                                                                    </a>
                                                                </li>
                                                            <?php } ?>

                                                            <?php if ( $id_responsabile ) { ?>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" href="#responsabile">
                                                                        <span class="title-medium">Responsabile della struttura</span>
                                                                    </a>
                                                                </li>
                                                            <?php } ?>

                                                            <?php if ( $id_atto_nomina ) { ?>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" href="#atto_nomina">
                                                                        <span class="title-medium">Atto nomina</span>
                                                                    </a>
                                                                </li>
                                                            <?php } ?>

                                                            <?php if ( $ulteriori_informazioni ) { ?>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" href="#ulteriori_informazioni">
                                                                        <span class="title-medium">Ulteriori informazioni</span>
                                                                    </a>
                                                                </li>
                                                            <?php } ?>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>

                <div class="col-12 col-lg-8">
                    <div class="it-page-sections-container">
                       <?php if ( $tipo_incarico ) { ?>
                       <section id="tipo_incarico" class="it-page-section mb-4">
                        <h2 class="my-2 title-large-semi-bold">Tipo di incarico</h2>
                            <div class="richtext-wrapper lora" data-element="service-addressed">
                                <?php echo $tipo_incarico; ?>
                            </div>
                        </section>
                    <?php } ?>


                    <?php if ( $compensi ) { ?>
                        <section id="compensi" class="it-page-section mb-4">
                            <h2 class="my-2 title-large-semi-bold">Compensi</h2>
                            <div class="richtext-wrapper lora" data-element="service-addressed">
                                <?php echo $compensi; ?>
                            </div>
                        </section>
                    <?php } ?>

                    <?php if ( $data_inizio_incarico ) { ?>
                        <section id="data_inizio_incarico" class="it-page-section mb-4" data-audio>
                            <h2 class="my-2 title-large-semi-bold">Data inizio incarico</h2>
                            <div class="richtext-wrapper lora" data-element="service-addressed">
                                <?php echo $data_inizio_incarico; ?>
                            </div>
                        </section>
                    <?php } ?>
                    
                    <?php if ( $data_conclusione_incarico ) { ?>
                        <section id="data_fine_incarico" class="it-page-section mb-4" data-audio>
                            <h2 class="my-2 title-large-semi-bold">Data conclusione incarico</h2>
                            <div class="richtext-wrapper lora" data-element="service-addressed">
                                <?php echo $data_conclusione_incarico; ?>
                            </div>
                        </section>
                    <?php } ?>
                    
                                        
                    <?php if ( $data_insediamento ) { ?>
                        <section id="data_conclusione" class="it-page-section mb-4" data-audio>
                            <h2 class="my-2 title-large-semi-bold">Data insediamento</h2>
                            <div class="richtext-wrapper lora" data-element="service-addressed">
                                <?php echo $data_insediamento; ?>
                            </div>
                        </section>
                    <?php } ?>

                    <?php if ( $importi ) { ?>
                        <section id="importi" class="it-page-section mb-4" data-audio>
                            <h2 class="my-2 title-large-semi-bold">Importi di viaggio e/o servizio</h2>
                            <div class="richtext-wrapper lora" data-element="service-addressed">
                                <?php echo $importi; ?>
                            </div>
                        </section>
                    <?php } ?>

                    <?php if ( $id_persona ) {
                        $persona = get_post($id_persona);
                        ?>
                        <section id="persona" class="it-page-section mb-4" data-audio>
                            <h2 class="my-2 title-large-semi-bold">Persona che ha la carica/incarico</h2>
                            <?php 
                                //VARIAZIONE ANDREA BERSI
                                foreach ($persone_pubbliche as $id_persona) { 
                                $persona = get_post($id_persona);
                                ?>
                                <div class="col-md-12 col-xl-12">
                                    <div class="card card-teaser shadow-sm p-4 mt-3 rounded border border-light flex-nowrap">
                                        <div class="card-body">
                                            <h2 class="card-title text-paragraph-medium u-grey-light"><?php echo $persona->post_title; ?></h2>
                                            <br />
                                            <a class="read-more" href="<?php echo get_permalink($persona->ID); ?>" title="Vai al contenuto di <?php echo $persona->post_title; ?>" data-focus-mouse="false">
                                                <span class="text">Ulteriori dettagli</span>
                                                <svg class="icon ms-0"><use xlink:href="#it-arrow-right"></use></svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </section>
                    <?php } ?>

                    <?php if ( $id_unita_organizzativa ) {
                        $unita_organizzativa = get_post($id_unita_organizzativa);
                        $unita_organizzativa_descrizione_breve = get_post_meta($unita_organizzativa->ID, "_dci_unita_organizzativa_descrizione_breve", true);
                        ?>
                        <section id="unita_organizzativa" class="it-page-section mb-4" data-audio>
                            <h2 class="my-2 title-large-semi-bold">Unità organizzativa</h2>
                            <p>Organizzazione presso la quale svolge l'incarico</p>
                            <div class="col-md-12 col-xl-12">
                                <div class="cmp-card-simple card-wrapper pb-0 rounded border border-light">
                                    <div class="card shadow-sm rounded">
                                        <div class="card-body">
                                            <a href="<?php echo get_permalink($unita_organizzativa->ID); ?>" class="text-decoration-none" data-element="topic-element" title="Vai al contenuti di <?php echo $unita_organizzativa->post_title; ?>">
                                                <h2 class="card-title t-primary title-xlarge"><?php echo $unita_organizzativa->post_title; ?></h2>
                                            </a>
                                            <p class="titillium text-paragraph mb-0 description"><?php echo $unita_organizzativa_descrizione_breve; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    <?php } ?>

                    <?php if ( $id_responsabile ) {
                        $responsabile = get_post($id_responsabile);
                        ?>
                        <section id="responsabile" class="it-page-section mb-4" data-audio>
                            <h2 class="my-2 title-large-semi-bold">Responsabile della struttura</h2>
                            <p>Organizzazione della quale è responsabile in base all'incarico</p>
                            <div class="col-md-12 col-xl-12">
                                <div class="card card-teaser shadow-sm p-4 mt-3 rounded border border-light flex-nowrap">
                                    <div class="card-body">
                                        <h2 class="card-title text-paragraph-medium u-grey-light"><?php echo $responsabile->post_title; ?></h2>
                                        <br />
                                        <a class="read-more" href="<?php echo get_permalink($responsabile->ID); ?>" title="Vai al contenuto di <?php echo $responsabile->post_title; ?>" data-focus-mouse="false">
                                            <span class="text">Ulteriori dettagli</span>
                                            <svg class="icon ms-0"><use xlink:href="#it-arrow-right"></use></svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </section>
                    <?php } ?>

                    <?php if ( $id_atto_nomina ) {
                        $atto_nomina = get_post($id_atto_nomina);
                        $allegato = get_post($atto_nomina);
                        $allegato_num_protocollo = get_post_meta($allegato->ID, '_dci_documento_pubblico_numero_protocollo', true);
                        $allegato_data_protocollo = get_post_meta($allegato->ID, '_dci_documento_pubblico_data_protocollo', true);
                        $allegato_url = get_post_meta($allegato->ID, '_dci_documento_pubblico_file_documento', true);
                        $allegato_tipo = wp_get_object_terms($allegato->ID, 'tipi_documento');
                        ?>
                        <section id="atto_nomina" class="it-page-section mb-5" data-audio>
                            <h2 class="my-2 title-large-semi-bold">Atto di nomina</h2>
                            <div class="cmp-card-latest-messages mb-3 mb-30">
                                <div class="card card-teaser shadow-sm p-4 mt-3 rounded border border-light flex-nowrap">
                                    <svg class="icon" aria-hidden="true"><use xlink:href="#it-clip"></use></svg>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <a class="text-decoration-none" href="<?php echo $allegato_url; ?>" aria-label="Scarica il documento <?php echo $allegato->post_title; ?>" title="Scarica il documento <?php echo $allegato->post_title; ?>" target="_blank">
                                                <?php echo $atto_nomina->post_title; ?> (<?php echo getFileSize($allegato_url);?>)
                                            </a>
                                        </h5>
                                        <br />
                                        <a class="read-more" href="<?php echo get_permalink($atto_nomina->ID); ?>" title="Vai al contenuto di <?php echo $atto_nomina->post_title; ?>" data-focus-mouse="false">
                                            <span class="text">Ulteriori dettagli</span>
                                            <svg class="icon ms-0"><use xlink:href="#it-arrow-right"></use></svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </section>
                    <?php } ?>

                    <?php if ( $ulteriori_informazioni ) { ?>
                        <section id="ulteriori_informazioni" class="it-page-section mb-4" data-audio>
                            <h2 class="my-2 title-large-semi-bold">Ulteriori informazioni</h2>
                            <div class="richtext-wrapper lora" data-element="service-addressed">
                                <?php echo $ulteriori_informazioni; ?>
                            </div>
                        </section>
                    <?php } ?>
 
                    <?php get_template_part('template-parts/single/page_bottom', "simple"); ?>
                </div>
            </div>
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