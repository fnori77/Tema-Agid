<?php
global $post;

$prefix = '_dci_evento_';
$img = dci_get_meta('immagine', $prefix, $post->ID);
$descrizione = dci_get_meta('descrizione_breve', $prefix, $post->ID);
$timestamp = dci_get_meta('data_orario_inizio', $prefix, $post->ID);
$arrdata = explode('-', date_i18n("j-F-Y", $timestamp));
$tipo_evento = get_the_terms($post->ID,'tipi_evento')[0];


?>

<div class="col-lg-6 col-xl-4">
    <div class="card-wrapper shadow-sm rounded cmp-list-card-img">
        <div class="card card-img no-after rounded">
            <div class="img-responsive-wrapper cmp-list-card-img__wrapper">
                <div class="img-responsive img-responsive-panoramic h-100">
                    <figure class="img-wrapper">
                        <?php dci_get_img($img, 'rounded-top img-fluid'); ?>
                    </figure>
                    <div class="card-calendar d-flex flex-column justify-content-center">
                        <span class="card-date"><?php echo $arrdata[0]; ?></span>
                        <span class="card-day"><?php echo $arrdata[1]; ?></span>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="category-top cmp-list-card-img__body">
                    <a class="text-decoration-none fw-bold cmp-list-card-img__body-heading-title"
                        href="/vivere-il-comune/eventi/?e=<?php echo $tipo_evento->slug; ?>"
                    >
                        <?php echo $tipo_evento->name; ?>
                    </a>
                </div>
                <h3 class="cmp-list-card-img__body-title u-main-primary">
                    <a class="text-decoration-none"
                        href="<?php echo get_permalink($post->ID); ?>"
                        data-element="live-category-link"
                    >
                        <?php echo $post->post_title ?>
                    </a>
                </h3>
                <p class="cmp-list-card-img__body-description">
                    <?php echo $descrizione; ?>
                </p>
                <a class="read-more t-primary text-uppercase cmp-list-card-img__body-link"
                    href="<?php echo get_permalink($post->ID); ?>"
                    aria-label="Leggi di più sulla pagina di <?php echo $post->post_title ?>"
                >
                    <span class="text">Leggi di più</span>
                    <span class="visually-hidden"></span>
                    <svg class="icon icon-primary icon-xs ml-10">
                        <use href="#it-arrow-right"></use>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>