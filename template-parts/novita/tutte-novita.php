<?php
global $the_query, $load_posts, $load_card_type;

    $query = isset($_GET['search']) ? dci_removeslashes($_GET['search']) : null;
   
   if(isset($_GET['tipo'])){
        $args = array(
            's'         => $query,
            'post_type' => 'notizia',
            'tax_query' => array(
                array(
                    'taxonomy' => 'tipi_notizia',
                    'field'    => 'slug',
                    'terms'    => (isset($_GET['tipo']) ? $_GET['tipo'] : 'notizie'),
                ),
            ),
            
            'posts_per_page' => -1,
            'relation' => 'OR', // Use 'OR' to get records that match any of the conditions
                array(
                    'key'     => '_dci_notizia_data_pubblicazione',
                    'value'   => '',
                    'compare' => '==',
                ),
                array(
                    'key'     => '_dci_notizia_data_pubblicazione',
                    'compare' => 'NOT EXISTS', // Include records where the key does not exist
                ),
            'order'          => 'DESC'
        );

   }else{
        $args = array(
            's'         => $query,
            'post_type' => 'notizia',
            
            'posts_per_page' => -1,
            'relation' => 'OR', // Use 'OR' to get records that match any of the conditions
                array(
                    'key'     => '_dci_notizia_data_pubblicazione',
                    'value'   => '',
                    'compare' => '==',
                ),
                array(
                    'key'     => '_dci_notizia_data_pubblicazione',
                    'compare' => 'NOT EXISTS', // Include records where the key does not exist
                ),
            'order'          => 'DESC'
        );


   }
    


  

    $the_query = new WP_Query( $args );
    $posts = $the_query->posts;

	$max_posts = $the_query->found_posts;
?>


<div class="bg-grey-card py-5">
    <form role="search" id="search-form" method="get" class="search-form">
    <button type="submit" class="d-none"></button>
        <div class="container">
            <h2 class="title-xxlarge mb-4">
                Esplora tutte le novità
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
                        <?php echo $the_query->found_posts; ?> notizie trovate in ordine di pubblicazione
                        </p>
                    </div>
                </div>
            </div>
            <div class="row g-4" id="load-more">
                <?php 
                    foreach ($posts as $post) {
                    	$load_card_type = 'notizia';
                    get_template_part('template-parts/novita/cards-list');
                }?>
            </div>
            <?php get_template_part("template-parts/search/more-results"); ?>
        </div>
    </form>
</div>
