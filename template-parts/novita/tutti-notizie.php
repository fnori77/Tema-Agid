<?php
global $the_query, $load_posts, $load_card_type, $taxonomy,$titolo;

$max_posts = isset($_GET['max_posts']) ? $_GET['max_posts'] : get_option( 'posts_per_page' );
$load_posts = get_option( 'posts_per_page' );
$query = isset($_GET['search']) ? $_GET['search'] : null;
$page = get_query_var("paged");
if(is_null($taxonomy)){
    $args = array(
        's'                 => $query,
        'posts_per_page'    => $max_posts,
        'post_type'         => 'notizia',
        'paged'             => $page,
        'orderby'   => 'publish_date',
        'order' => 'DESC',
    );
} else {
    $args = array(
        's'                 => $query,
        'posts_per_page'    => $max_posts,
        'post_type'         => 'notizia',
        'paged'             => $page,
        'orderby'   => 'publish_date',
        'order' => 'DESC',
        'tax_query' => array(
            array(
                'taxonomy' => 'tipi_notizia',
                'field' => 'slug',
                'terms' => $taxonomy,
            ),
        ),
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
                        <?php echo $the_query->found_posts; ?> notizie trovate <?php echo $query?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row g-4" id="load-more">
                <?php 
                    foreach ($posts as $post) {
                    $load_card_type = 'notizia';
                    get_template_part('template-parts/novita/card-list-mlabvda');
                }?>
            </div>
            <div class="row my-4">
                <nav class="pagination-wrapper justify-content-center" aria-label="Navigazione centrata">
                    <?php
                    echo bootstrap_pagination($the_query);
                    ?>
                </nav>
            </div>
        </form>
    </div>
</div>