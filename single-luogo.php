<?php
/**
 * Luogo template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Design_Comuni_Italia
 */

global $uo_id, $inline;

get_header();
?>

    <main>
        <?php 
        while ( have_posts() ) :
            the_post();
            $user_can_view_post = dci_members_can_user_view_post(get_current_user_id(), $post->ID);

            $prefix= '_dci_luogo_';
            $descrizione_breve = dci_get_meta("descrizione_breve", $prefix, $post->ID);
            $data_pubblicazione_arr = dci_get_data_pubblicazione_arr("data_pubblicazione", $prefix, $post->ID);
            $date = date_i18n('d F Y', mktime(0, 0, 0, $data_pubblicazione_arr[1], $data_pubblicazione_arr[0], $data_pubblicazione_arr[2]));
            $persone = dci_get_meta("persone", $prefix, $post->ID);
            $posizione_gps = dci_get_meta("posizione_gps", $prefix, $post->ID);
            $punti_contatto = dci_get_meta("struttura_responsabile", $prefix, $post->ID);
            $descrizione_estesa = dci_get_wysiwyg_field("descrizione_estesa", $prefix, $post->ID);
            $ulteriori_informazioni = dci_get_wysiwyg_field("ulteriori_informazioni", $prefix, $post->ID);
            $servizi = dci_get_wysiwyg_field("servizi", $prefix, $post->ID);
            $modalita_accesso = dci_get_wysiwyg_field("modalita_accesso", $prefix, $post->ID);
            $orario_pubblico = dci_get_wysiwyg_field("orario_pubblico", $prefix, $post->ID);
            $punti_contatto = dci_get_meta("punti_contatto", $prefix, $post->ID);
            $luoghi_collegati = dci_get_meta("luoghi_collegati", $prefix, $post->ID);
            $allegati = dci_get_meta("allegati", $prefix, $post->ID);
            $datasets = dci_get_meta("dataset", $prefix, $post->ID);
            $a_cura_di = dci_get_meta("a_cura_di", $prefix, $post->ID);
            $uo_id = dci_get_meta("sede_di");
            ?>
            <div class="container" id="main-container">
                <div class="row">
                    <div class="col px-lg-4">
                        <?php get_template_part("template-parts/common/breadcrumb"); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 px-lg-4 py-lg-2">
                        <h1 data-audio><?php the_title(); ?></h1>
                        <h2 class="visually-hidden" data-audio>Dettagli della notizia</h2>
                        <p data-audio>
                            <?php echo $descrizione_breve; ?>
                        </p>
                        <div class="row mt-5 mb-4">
                            <div class="col-6">
                                <small>Data:</small>
                                <p class="fw-semibold font-monospace">
                                    <?php echo $date; ?>
                                </p>
                            </div>
                            <div class="col-6">
                                <small>Tempo di lettura:</small><?php
                               
        
                            ?>
                                <p class="fw-semibold" id="readingTime"></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <?php
                        $inline = true;
                        get_template_part('template-parts/single/actions');
                        ?>
                    </div>
                </div>
            </div>
            <?php get_template_part('template-parts/single/image-large'); ?>
            <div class="container">
                <div class="row border-top border-light row-column-border row-column-menu-left">
                    <aside class="col-lg-4">
                        <div class="cmp-navscroll sticky-top" aria-labelledby="accordion-title-one">
                            <nav class="navbar it-navscroll-wrapper navbar-expand-lg" aria-label="Indice della pagina" data-bs-navscroll>
                                <div class="navbar-custom" id="navbarNavProgress">
                                    <div class="menu-wrapper">
                                        <div class="link-list-wrapper">
                                            <div class="accordion">
                                                <div class="accordion-item">
                                                    <span class="accordion-header" id="accordion-title-one">
                                                        <button
                                                            class="accordion-button pb-10 px-3 text-uppercase"
                                                            type="button"
                                                            aria-controls="collapse-one"
                                                            aria-expanded="true"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#collapse-one"
                                                        >INDICE DELLA PAGINA
                                                            <svg class="icon icon-sm icon-primary align-top">
                                                                <use xlink:href="#it-expand"></use>
                                                            </svg>
                                                        </button>
                                                    </span>
                                                    <div class="progress">
                                                        <div class="progress-bar it-navscroll-progressbar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <div id="collapse-one" class="accordion-collapse collapse show" role="region" aria-labelledby="accordion-title-one">
                                                        <div class="accordion-body">
                                                            <ul class="link-list" data-element="page-index">
                                                            
                                            
                                                                <li class="nav-item">
                                                                    <a class="nav-link" href="#descrizione">
                                                                    <span class="title-medium">Descrizione</span>
                                                                    
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" href="#servizi">
                                                                    <span class="title-medium">Servizi</span>
                                                                    
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" href="#accesso">
                                                                    <span class="title-medium">Modalità di accesso</span>
                                                                    
                                                                    </a>
                                                                </li>
                                                               
                                                                <li class="nav-item">
                                                                    <a class="nav-link" href="#indirizzo">
                                                                    <span class="title-medium">Indirizzo</span>
                                                                    
                                                                    </a>
                                                                </li>
                                                                <?php if (!empty($orario_pubblico)): ?>
                                                                    <li class="nav-item">
                                                                    <a class="nav-link" href="#orario">
                                                                    <span class="title-medium">Orari</span>
                                                                    
                                                                    </a>
                                                                </li>
                                                                <?php endif; ?>
                                                            

                                                                <li class="nav-item">
                                                                    <a class="nav-link" href="#contatti">
                                                                    <span class="title-medium">Contatti</span>
                                                                    
                                                                    </a>
                                                                </li>
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
                    </aside>
                    <section class="col-lg-8 it-page-sections-container border-light">
                    <article class="it-page-section anchor-offset" data-audio>
                        <h4 id="descrizione">Descrizione</h4>
                        <div class="richtext-wrapper lora">
                        <td><?= $descrizione_estesa ?></td>
                        </div>
                        
                        <br>
                        <h4 id="servizi">Servizi</h4>
                        <div class="richtext-wrapper lora">
                        <td><?= $servizi ?>
                        <a href="<?php echo get_home_url(); ?>/servizi/">Scopri di più sui servizi presenti</a>
                        </td>
                        </div>

                        <br>
                        <h4 id="accesso">Modalità di accesso</h4>
                        <div class="richtext-wrapper lora">
                        <td><?= $modalita_accesso ?></td>
                        </div>
   
                        <br>
                        <h4 id="indirizzo">Indirizzo</h4>
                        <div class="richtext-wrapper lora" style="padding-left:10px;">
                        <td><?php
                        $luogo = $sede_principale;
                        $with_map = true;
                        get_template_part("template-parts/single/luogo");
                        ?></td>
                        </div>

                        <br>
                        <?php if (!empty($orario_pubblico)): ?>
    <h4 id="orario">Orario pubblico</h4>
    <div class="richtext-wrapper lora">
        <td><?= $orario_pubblico ?></td>
    </div>
<?php endif; ?>
                      
                       
                        
                        <br>
                        <section class="it-page-section">
              <?php if (is_array($punti_contatto) && count($punti_contatto)) { ?>
                <h4 id="contatti">Contatti</h4>
                <?php foreach ($punti_contatto as $pc_id) {
                  get_template_part('template-parts/single/punto-contatto');
                } ?>
              <?php } ?>
            </section>

            <br>
                 <!--      
              <?php if (is_array($luoghi_collegati) && count($luoghi_collegati)) { ?>
                
                <h4 id="contacts">Luoghi</h4>
                <?php foreach ($luoghi_collegati as $luos) {
                  get_template_part('template-parts/single/luogo');
                  echo($luoghi_collegati);
                } ?>
              <?php } ?>-->
          
                       <!-- <br>
                        <h4 id="orario">Contatti</h4>
                        <div class="richtext-wrapper lora">
                        <td><?php
                        $with_border = false;
                        get_template_part("template-parts/unita-organizzativa/card-full");
                         ?></td>
                        </div>-->
                   
                                                                
                     
                    </article>
                    <?php if( is_array($documenti) && count($documenti) ) { ?>
                    <article class="it-page-section anchor-offset mt-5">
                        <h4 id="documenti">Documenti</h4>
                        <div class="card-wrapper card-teaser-wrapper card-teaser-wrapper-equal">
                            <?php foreach ($documenti as $doc_id) {
                                $documento = get_post($doc_id);
                            ?>
                            <div class="card card-teaser shadow-sm p-4 mt-3 rounded border border-light flex-nowrap">
                                <svg class="icon" aria-hidden="true">
                                <use
                                    xlink:href="#it-clip"
                                ></use>
                                </svg>
                                <div class="card-body">
                                <h5 class="card-title">
                                    <a class="text-decoration-none" href="<?php echo get_permalink($doc_id); ?>" aria-label="Visualizza il documento <?php echo $documento->post_title; ?>" title="Visualizza il documento <?php echo $documento->post_title; ?>">
                                        <?php echo $documento->post_title; ?>
                                    </a>
                                </h5>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </article>
                    <?php } ?>
                    <?php if( is_array($allegati) && count($allegati) ) { ?>
                    <article class="it-page-section anchor-offset mt-5">
                        <h4 id="allegati">Allegati</h4>
                        <div class="card-wrapper card-teaser-wrapper card-teaser-wrapper-equal">
                            <?php foreach ($allegati as $all_url) {
                                $all_id = attachment_url_to_postid($all_url);
                                $allegato = get_post($all_id);
                            ?>
                            <div class="card card-teaser shadow-sm p-4 mt-3 rounded border border-light flex-nowrap">
                                <svg class="icon" aria-hidden="true">
                                <use
                                    xlink:href="#it-clip"
                                ></use>
                                </svg>
                                <div class="card-body">
                                <h5 class="card-title">
                                    <a class="text-decoration-none" href="<?php echo get_the_guid($allegato); ?>" aria-label="Scarica l'allegato <?php echo $allegato->post_title; ?>" title="Scarica l'allegato <?php echo $allegato->post_title; ?>">
                                        <?php echo $allegato->post_title; ?>
                                    </a>
                                </h5>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </article>
                    <?php } ?>
                        <?php if( is_array($datasets) && count($datasets) ) { ?>
                        <article class="it-page-section anchor-offset mt-5">
                            <h4 id="dataset">Dataset</h4>
                            <div class="card-wrapper card-teaser-wrapper card-teaser-wrapper-equal">
                                <?php foreach ($datasets as $dataset_id) {
                                    $dataset = get_post($dataset_id);
                                    ?>
                                    <div class="card card-teaser shadow-sm p-4 mt-3 rounded border border-light flex-nowrap">
                                        <svg class="icon" aria-hidden="true">
                                            <use
                                                    xlink:href="#it-clip"
                                            ></use>
                                        </svg>
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <a class="text-decoration-none" href="<?php echo get_permalink($dataset_id); ?>" aria-label="Visualizza il dataset <?php echo $dataset->post_title; ?>" title="Visualizza il dataset <?php echo $dataset->post_title; ?>">
                                                    <?php echo $dataset->post_title; ?>
                                                </a>
                                            </h5>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </article>
                        <?php } ?>
                        
                    <!-- <article
                        id="ulteriori-informazioni"
                        class="it-page-section anchor-offset mt-5"
                    >
                        <h4 class="mb-3">Ulteriori informazioni</h4>
                    </article> -->
                    <?php get_template_part('template-parts/single/page_bottom'); ?>
                    </section>
                </div>
            </div>


        <?php
        endwhile; // End of the loop.
        ?>
    </main>
    <script>
        const descText = document.querySelector('#descrizione')?.innerText;
        const wordsNumber = descText.split(' ').length

        document.querySelector('#readingTime').innerHTML = `${Math.ceil(wordsNumber / 200)} min`;
    </script>
<?php
get_footer();

