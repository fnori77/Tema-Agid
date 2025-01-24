<?php
global $the_query, $titolo, $taxonomy, $load_posts, $load_card_type;
$max_posts = isset($_GET['max_posts']) ? $_GET['max_posts'] : get_option( 'posts_per_page' );
$query = isset($_GET['search']) ? dci_removeslashes($_GET['search']) : null;
$page = get_query_var("paged");
$evento = $_REQUEST['e'];
if(empty($evento)){
    $args = array(
        's'                 => $query,
        'posts_per_page'    => $max_posts,
        'post_type'         => 'evento',
        'paged'             => $page,
        #'orderby'   => 'publish_date',
        'order' => 'DESC',
        'orderby' => 'meta_value', // We want to organize the events by date
        'meta_key' => '_dci_evento_data_orario_inizio', // Grab the "_dci_notizia_data_scadenza" meta field created
        'posts_per_page' => -1, // -1 restituisce tutti i risultati, rimuovi se vuoi un numero specifico

    );
} else {
    $args = array(
        's'                 => $query,
        'posts_per_page'    => $max_posts,
        'post_type'         => 'evento',
        'paged'             => $page,
        #'orderby'   => 'publish_date',
        'order' => 'DESC',
        'orderby' => 'meta_value', // We want to organize the events by date
        'meta_key' => '_dci_evento_data_orario_inizio', // Grab the "_dci_notizia_data_scadenza" meta field created
        'tax_query' => array(
                array(
                'taxonomy' => 'tipi_evento',
                'field' => 'slug',
                'terms' => $evento,
            ),
        )
	);
}

 

$the_query = new WP_Query( $args );
$posts = $the_query->posts;
?>
<div class='container'>
    <div class="row variable-gutters">
        <div class="col-lg-12">
            <?php
            the_content();
            ?>
        </div>
    </div>
</div>
<div class="bg-grey-card py-5">
    <form role="search" id="search-form" method="get" class="search-form">
    <button type="submit" class="d-none"></button>
        <div class="container">
            <h2 class="title-xxlarge mb-4">
                Esplora <?php echo $titolo?>
            </h2>
            <div>
                <div class="cmp-input-search">
                    <div class="form-group autocomplete-wrapper mb-0">
                        <div class="input-group">
                            <label for="autocomplete-two" class="visually-hidden"
                            >Cerca</label
                            >
                            <input
                            type="search"
                            class="autocomplete form-control"
                            placeholder="Cerca per parola chiave"
                            id="autocomplete-two"
                            name="search"
                            value="<?php echo $query; ?>"
                            data-bs-autocomplete="[]"
                            />
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" id="button-3">
                                    Invio
                                </button>
                            </div>
                            <span class="autocomplete-icon" aria-hidden="true"
                            ><svg
                                class="icon icon-sm icon-primary"
                                role="img"
                                aria-labelledby="autocomplete-label"
                            >
                                <use
                                href="#it-search"
                                ></use></svg>
                            </span>
                        </div>
                        <p
                        id="autocomplete-label"
                        class="u-grey-light text-paragraph-card mt-2 mb-30 mt-lg-3 mb-lg-40"
                        >
                        <?php echo $the_query->found_posts; ?> eventi trovati 
                        </p>
                    </div>
                </div>
            </div>
            <div class="row g-4" id="load-more">
                <?php 
                    foreach ($posts as $post_id) {
                    $post = get_post($post_id);
                    $load_card_type = 'evento';
                    get_template_part("template-parts/evento/card-full");
                }?>
            </div>

        </div>
    </form>
</div>
