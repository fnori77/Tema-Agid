<style>
    .contatto-title {
    font-weight: bold !important; /* Rende il testo in grassetto */
}

    .nav-item{text-align:left;}

    h3 {
    font-size: 1.2rem;
    line-height: 1.25;
    text-align: left;
    font-weight: lighter !important;
}
/* Stile di default per mobile */
.image-content img {
    width: 100%;
}

/* Stile per desktop (a partire da 768px di larghezza, che puoi adattare) */
@media screen and (min-width: 768px) {
    .image-content img {
        width: 40% !important;
    }
}

    </style>

<?php
/**
 * Template Name: Template PNRR Child
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Design_Comuni_Italia
 */

global $uo_id, $gallery, $video, $inline;

get_header();
?>

    <main>
        <?php 
        while ( have_posts() ) :
            the_post();
            $user_can_view_post = dci_members_can_user_view_post(get_current_user_id(), $post->ID);
            $atti_legislativi = get_post_meta(get_the_ID(), '_pnrr_atti_legislativi', true); // Verifica il nome corretto della chiave meta
            $altri_allegati = get_post_meta(get_the_ID(), '_pnrr_altri_allegati', true); // Verifica il nome corretto della chiave meta
            $prefix= '_dci_notizia_';
            $carlotta = get_post_meta( get_the_ID(), '_carlotta', true );
            $importo = get_post_meta( get_the_ID(), '_importo', true );
            $descrizione_breve = get_post_meta( get_the_ID(), '_descrizione_breve', true );
            $finanziamento = get_post_meta( get_the_ID(), '_finanziamento', true );
            $dettagli = get_post_meta( get_the_ID(), '_dettagli', true );
            $attfin = get_post_meta( get_the_ID(), '_attfin', true );
            $datapubbl = get_post_meta( get_the_ID(), '_datapubbl', true );
            $data_pubblicazione_arr = dci_get_data_pubblicazione_arr("data_pubblicazione", $prefix, $post->ID);
            $date = date_i18n('d F Y', mktime(0, 0, 0, $data_pubblicazione_arr[1], $data_pubblicazione_arr[0], $data_pubblicazione_arr[2]));
            $persone = dci_get_meta("persone", $prefix, $post->ID);
            $descrizione = dci_get_wysiwyg_field("testo_completo", $prefix, $post->ID);
            $documenti = dci_get_meta("documenti", $prefix, $post->ID);
            $allegati = dci_get_meta("allegati", $prefix, $post->ID);
            $datasets = dci_get_meta("dataset", $prefix, $post->ID);
            $a_cura_di = dci_get_meta("a_cura_di", $prefix, $post->ID);
            $gallery = dci_get_meta("multimedia", $prefix, $post->ID);
$sede_principale = get_post_meta( get_the_ID(), '_pnrr_contatti', true );	

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
                            <?php  if ( ! empty( $descrizione_breve ) ) {
    echo '<h3>' . esc_html( $descrizione_breve ) . '</h3>';
}; ?>
                        </p>
                        <p data-audio>
                            <?php if ( ! empty( $datapubbl ) ) {
    echo '<h3>Data di Pubblicazione: ' . esc_html( $datapubbl ) . '</h3>';
}; ?>
                        </p>
                        <div class="row mt-5 mb-4">
                            <div class="col-6">
                                <small>Data:</small>
                                <p class="fw-semibold font-monospace">
                                    <?php echo $date; ?>
                                </p>
                            </div>
                            <div class="col-6">
                                <small>Tempo di lettura:</small>
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
                                                                    <span class="title-medium">Descrizione e scopo</span>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" href="#dettagli">
                                                                    <span class="title-medium">Dettagli</span>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" href="#importo">
                                                                    <span class="title-medium">Importo finanziato</span>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" href="#accesso">
                                                                    <span class="title-medium">Modalità di accesso</span>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" href="#finanziate">
                                                                    <span class="title-medium">Attività finanziate</span>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" href="#avanzamento">
                                                                    <span class="title-medium">Avanzamento del progetto</span>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" href="#atti">
                                                                    <span class="title-medium">Atti legislativi e amministrativi</span>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" href="#allegati">
                                                                    <span class="title-medium">Altri allegati</span>
                                                                    </a>
                                                                </li>
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
    <h4 id="descrizione">Descrizione e scopo</h4>
    <div class="richtext-wrapper lora">
        <?php
        // Recupera e visualizza i metadati
    
        if ( ! empty( $carlotta ) ) {
            echo '<p>' . esc_html( $carlotta ) . '</p>';
        }
        ?>
    </div>

    <h4 id="dettagli">Dettagli</h4>
    <div class="richtext-wrapper lora">
    <?php
        // Ciclo per visualizzare i 7 campi di dettaglio
        for ($i = 1; $i <= 7; $i++) {
            $dettaglio = get_post_meta( get_the_ID(), '_dettaglio_' . $i, true );
            if ( ! empty( $dettaglio ) ) {
                // Se è il primo campo, aggiungi "Missione:" in grassetto
                if ($i == 1) {
                    echo '<p><strong>Missione:</strong> ' . esc_html( $dettaglio ) . '</p>';
                } 
                elseif ($i == 2) {
                    echo '<p><strong>Componente:</strong> ' . esc_html( $dettaglio ) . '</p>';
                }elseif ($i == 3) {
                    echo '<p><strong>Investimento:</strong> ' . esc_html( $dettaglio ) . '</p>';
                }elseif ($i == 4) {
                    echo '<p><strong>Intervento:</strong> ' . esc_html( $dettaglio ) . '</p>';
                }elseif ($i == 5) {
                    echo '<p><strong>Titolare:</strong> ' . esc_html( $dettaglio ) . '</p>';
                }elseif ($i == 6) {
                    echo '<p><strong>Soggetto attuatore:</strong> ' . esc_html( $dettaglio ) . '</p>';
                }elseif ($i == 7) {
                    echo '<p><strong>CUP:</strong> ' . esc_html( $dettaglio ) . '</p>';
                }else {
                    echo '<p>' . esc_html( $dettaglio ) . '</p>';
                }
            }
        }
        ?>
    </div>
</article>
<h4 id="importo">Importo finanziato</h4>
    <div class="richtext-wrapper lora">
    <?php
// Recupera e visualizza i metadati

if ( ! empty( $importo ) ) {
    echo '<p>' . esc_html( $importo ) . '</p>';

    // Aggiungi l'immagine con lo stile inline
    echo '<div class="image-content">';
    echo '<img src="https://demo.we-com.info/basesito/wp-content/uploads/2024/10/eu.png" alt="Logo EU" class="img-fluid" style="margin-left: -20px;">'; // Default 100%
    echo '</div>';
}
?>

    </div>
    <h4 style="text-align:left;" id="accesso">Modalità di accesso al finanziamento</h4>
    <div class="richtext-wrapper lora">
        <?php
        // Recupera e visualizza i metadati
    
        if ( ! empty( $finanziamento ) ) {
            echo '<p>' . esc_html( $finanziamento ) . '</p>';
        }
        ?>
    </div>

    <h4 id="finanziate">Attività finanziate</h4>
    <div class="richtext-wrapper lora">
    <?php
        // Ciclo per visualizzare i 7 Attività finanziate
        for ($i = 1; $i <= 7; $i++) {
            $attfin = get_post_meta( get_the_ID(), '_attfina_' . $i, true );
            if ( ! empty( $attfin ) ) {
                // Se è il primo campo, aggiungi punti elenco
                if ($i == 1) {
                    echo '<p><strong><li></strong> ' . esc_html( $attfin ) . '</li></p>';
                } 
                elseif ($i == 2) {
                    echo '<p><strong><li></strong> ' . esc_html( $attfin ) . '</li></p>';
                }elseif ($i == 3) {
                    echo '<p><strong><li></strong> ' . esc_html( $attfin ) . '</li></p>';
                }elseif ($i == 4) {
                    echo '<p><strong><li></strong> ' . esc_html( $attfin ) .  '</li></p>';
                }elseif ($i == 5) {
                    echo '<p><strong><li></strong> ' . esc_html( $attfin ) .  '</li></p>';
                }elseif ($i == 6) {
                    echo '<p><strong><li></strong> ' . esc_html( $attfin ) .  '</li></p>';
                }elseif ($i == 7) {
                    echo '<p><strong>CUP:</strong> ' . esc_html( $attfin ) .  '</li></p>';
                }else {
                    echo '<p><strong>CUP:</strong>' . esc_html( $attfin ) .  '</li></p>';
                }
            }
        }
        ?>
    </div>

    <h4 id="avanzamento">Avanzamento del progetto</h4>
<div class="richtext-wrapper lora">
<p>Consulta la documentazione per scoprire lo stato di avanzamento del progetto e il raggiungimento degli obiettivi.</p>
<?php
// Recupera gli allegati salvati nel post
$allegati = get_post_meta(get_the_ID(), '_pnrr_allegati', true); // Verifica il nome corretto della chiave meta

if (!empty($allegati)) {
    echo '<div>';

    // Ciclo per visualizzare gli allegati come card
    foreach ($allegati as $id => $url) {
       
        echo '<h5 class="card-title">' . esc_html($file_name) . '</h5>'; // Nome del file

    }

    echo '</div>'; // Chiusura div allegati-pnrr
}
?>
</div>



<?php if( is_array($allegati) && count($allegati) ) { ?>
                    <article class="it-page-section anchor-offset mt-5">
                       
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

                    <?php if( is_array($atti_legislativi) && count($atti_legislativi) ) { ?>
                    <article class="it-page-section anchor-offset mt-5">
                        <h4 id="atti">Atti legislativi e amministrativi</h4>
                        <div class="card-wrapper card-teaser-wrapper card-teaser-wrapper-equal">
                            <?php foreach ($atti_legislativi as $all_url) {
                                $all_id = attachment_url_to_postid($all_url);
                                $atto_legislativo = get_post($all_id);
                            ?>
                            <div class="card card-teaser shadow-sm p-4 mt-3 rounded border border-light flex-nowrap">
                                <svg class="icon" aria-hidden="true">
                                <use
                                    xlink:href="#it-clip"
                                ></use>
                                </svg>
                                
                                <div class="card-body">
                                <h5 class="card-title">
                                    <a class="text-decoration-none" href="<?php echo get_the_guid($atto_legislativo); ?>" aria-label="Scarica l'allegato <?php echo $atto_legislativo->post_title; ?>" title="Scarica l'allegato <?php echo $atto_legislativo->post_title; ?>">
                                        <?php echo $atto_legislativo->post_title; ?>
                                    </a>
                                </h5>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </article>
                    <?php } ?>
                    <?php if( is_array($altri_allegati) && count($altri_allegati) ) { ?>
                    <article class="it-page-section anchor-offset mt-5">
                        <h4 id="allegati">Altri allegati</h4>
                        <div class="card-wrapper card-teaser-wrapper card-teaser-wrapper-equal">
                            <?php foreach ($altri_allegati as $all_url) {
                                $all_id = attachment_url_to_postid($all_url);
                                $altro_allegat0 = get_post($all_id);
                            ?>
                            <div class="card card-teaser shadow-sm p-4 mt-3 rounded border border-light flex-nowrap">
                                <svg class="icon" aria-hidden="true">
                                <use
                                    xlink:href="#it-clip"
                                ></use>
                                </svg>
                                
                                <div class="card-body">
                                <h5 class="card-title">
                                    <a class="text-decoration-none" href="<?php echo get_the_guid($altro_allegat0); ?>" aria-label="Scarica l'allegato <?php echo $altro_allegat0->post_title; ?>" title="Scarica l'allegato <?php echo $altro_allegat0->post_title; ?>">
                                        <?php echo $altro_allegat0->post_title; ?>
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
                    <article class="it-page-section anchor-offset mt-5">
                    <?php if (is_array($gallery) && count($gallery)) {
                  get_template_part("template-parts/single/gallery");
              } ?>
              <?php if ($video) {
                  get_template_part("template-parts/single/video");
              } ?>
                        <h4 id="a-cura-di">A cura di</h4>
                        <div class="row">
                        <div class="col-12 col-sm-12">
                        <?php
// Recupera i dati di contatto associati all'ID del post corrente
$sede_principale = get_post_meta(get_the_ID(), '_pnrr_contatti', true);

// Controlla se $sede_principale è un array e se ha elementi
if (is_array($sede_principale) && count($sede_principale) > 0) {
    // Prendi il primo ID dal meta
    $first_pc_id = $sede_principale[0]; // Assumiamo che contenga almeno un ID

    // Imposta la variabile globale $pc_id per usarla nel template della card
    global $pc_id;
    $pc_id = $first_pc_id; 

    // Recupera i dettagli del contatto
    $prefix = '_dci_punto_contatto_';
    $full_contatto = dci_get_full_punto_contatto($pc_id);
    $contatto = get_post($pc_id);
    $voci = dci_get_meta('voci', $prefix, $pc_id);

    // Array di contatti alternativi
    $other_contacts = array(
        'linkedin',
        'skype',
        'telegram',
        'twitter',
        'whatsapp'
    );
    ?>

    <div id="contatti" class="card card-teaser card-teaser-info rounded shadow-sm p-4 me-3">
        <div class="card-body richtext-wrapper">
        <h3 class="contatto-title">
    <?php echo esc_html($contatto->post_title); // Mostra il titolo del contatto ?>
</h3>

            <div class="card-text">
                <?php if (is_array($full_contatto['indirizzo'] ?? null) && count($full_contatto['indirizzo'])) {
                    foreach ($full_contatto['indirizzo'] as $value) {
                        echo '<p>' . esc_html($value) . '</p>';
                    } 
                    echo '<p class="mt-3"></p>';
                } ?>
                <?php if (is_array($full_contatto['telefono'] ?? null) && count($full_contatto['telefono'])) {
                    foreach ($full_contatto['telefono'] as $value) {
                        echo '<p>Telefono: <a href="tel:' . esc_html($value) . '">' . esc_html($value) . '</a></p>';
                    }
                } ?>
                <?php if (is_array($full_contatto['url'] ?? null) && count($full_contatto['url'])) {
                    foreach ($full_contatto['url'] as $value) { ?>
                        <p>
                            <a 
                            target="_blank" 
                            aria-label="Scopri di più su <?php echo esc_html($value); ?> - link esterno - apertura nuova scheda" 
                            title="Vai sul sito <?php echo esc_html($value); ?>" 
                            href="<?php echo esc_url($value); ?>">
                                <?php echo esc_html($value); ?>
                            </a>
                        </p>
                   <?php }
                } ?>
                <?php if (is_array($full_contatto['email'] ?? null) && count($full_contatto['email'])) {
                    foreach ($full_contatto['email'] as $value) {
                        echo '<p>Email: ' ; ?>
                            <a
                            target="_blank" 
                            aria-label="Invia un\'email a <?php echo esc_html($value); ?>"
                            title="Invia un\'email a <?php echo esc_html($value); ?>" 
                            href="mailto:<?php echo esc_html($value); ?>">
                                <?php echo esc_html($value); ?>
                            </a>
                        </p>
                   <?php }
                } ?>
                <?php if (is_array($full_contatto['pec'] ?? null) && count($full_contatto['pec'])) {
                    foreach ($full_contatto['pec'] as $value) {
                        echo '<p>PEC: ' ; ?>
                        <a
                                target="_blank"
                                aria-label="Invia una PEC a <?php echo esc_html($value); ?>"
                                title="Invia una PEC a <?php echo esc_html($value); ?>"
                                href="mailto:<?php echo esc_html($value); ?>">
                            <?php echo esc_html($value); ?>
                        </a>
                        </p>
                    <?php }
                } ?>
                <?php foreach ($other_contacts as $type) {
                    if (is_array($full_contatto[$type] ?? null) && count($full_contatto[$type])) {
                        foreach ($full_contatto[$type] as $value) {
                            echo '<p>' . esc_html($type) . ': ' . esc_html($value) . '</p>';
                        }
                    } 
                } ?>
            </div>
        </div>
    </div>

    <?php
} else {
    // Messaggio nel caso in cui non ci siano contatti trovati
    echo '<p>Nessun contatto trovato.</p>';
}
?>



                       
                        </div>
                    </article>



                  

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
        const descText = document.querySelector('#descrizione')?.closest('article').innerText;
        const wordsNumber = descText.split(' ').length
        document.querySelector('#readingTime').innerHTML = `${Math.ceil(wordsNumber / 200)} min`;
    </script>
<?php
get_footer();

