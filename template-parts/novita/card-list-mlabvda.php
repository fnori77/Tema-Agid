<?php 
global $post;

$description = dci_get_meta('descrizione_breve');
$data_notizia = strtolower(get_the_date("d F Y",$post->ID));//dci_get_data_pubblicazione_arr("data_pubblicazione", '_dci_notizia_', $post->ID);
$img = dci_get_meta('immagine');
$tipo = get_the_terms($post->term_id, 'tipi_notizia')[0];
if ($img) {
    ?>
    <div class="col-md-6 col-xl-4">
        <div class="card-wrapper border border-light rounded shadow-sm cmp-list-card-img cmp-list-card-img-hr">
            <div class="card no-after rounded">
            <div class="row g-2 g-md-0 flex-md-column">
                <div class="col-12 order-2 order-md-1">
                    <?php dci_get_img($img, 'rounded-top img-fluid img-responsive'); ?>
                </div>
                <div class="col-12 order-1 order-md-2">
                <div class="card-body">
                    <div class="category-top cmp-list-card-img__body">
                    <span class="category cmp-list-card-img__body-heading-title underline">
                        <a href='<?php echo get_site_url()?>/novita/tipologia/<?php echo $tipo->slug?>'><?php echo strtoupper($tipo->name); ?></a>
                    </span>
                    <span class="data"><?php echo $data_notizia ?></span>
                    </div>
                    <a class="text-decoration-none" href="<?php echo get_permalink(); ?>">
                        <h3 class="h5 card-title u-grey-light"><?php echo the_title(); ?></h3>
                    </a>
                    <p class="card-text d-none d-md-block">
                        <?php echo $description; ?>
                    </p>
                    <p class='mt-5'>
                        <a class="read-more mt-5" href="<?php echo get_permalink($post->ID); ?>" aria-label="Vai alla pagina <?php echo $post->post_title ?>" title="Vai alla pagina <?php echo $post->post_title ?>">
                            <span class="text">Ulteriori dettagli</span>
                            <svg class="icon ms-0">
                                <use xlink:href="#it-arrow-right"></use>
                            </svg>
                        </a>
                    </p>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div class="col-md-6 col-xl-4">
        <div class="card-wrapper border border-light rounded shadow-sm cmp-list-card-img cmp-list-card-img-hr">
            <div class="card no-after rounded">
                <div class="row g-2 g-md-0 flex-md-column">
                    <div class="col-12 order-1 order-md-2">
                        <div class="card-body card-img-none rounded-top">
                            <div class="category-top cmp-list-card-img__body">
                                <span class="category cmp-list-card-img__body-heading-title underline">
                                    <a href='<?php echo get_site_url()?>/novita/tipologia/<?php echo $tipo->slug?>'><?php echo strtoupper($tipo->name); ?></a>
                                </span>
                                <span class="data"><?php echo $data_notizia ?></span>
                            </div>
                            <a class="text-decoration-none" href="<?php echo get_permalink(); ?>">
                                <h3 class="h5 card-title u-grey-light"><?php echo the_title(); ?></h3>
                            </a>
                            <p class="card-text d-none d-md-block">
                                <?php echo $description; ?>
                            </p>
                            <p class='mt-5'>
                                <a class="read-more mt-5" href="<?php echo get_permalink($post->ID); ?>" aria-label="Vai alla pagina <?php echo $post->post_title ?>" title="Vai alla pagina <?php echo $post->post_title ?>">
                                    <span class="text">Ulteriori dettagli</span>
                                    <svg class="icon ms-0">
                                        <use xlink:href="#it-arrow-right"></use>
                                    </svg>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>