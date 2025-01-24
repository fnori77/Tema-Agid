<?php
global $the_query, $load_posts, $load_card_type, $tax_query;

// Recupera il parametro di ricerca
$query = isset($_GET['search']) ? sanitize_text_field($_GET['search']) : null;

// Imposta il tipo di unità organizzativa e la descrizione in base al nome del post
switch ($post->post_name) {
    case 'aree-amministrative':
        $tipo_uo = 'area';
        $descrizione = 'tutte le aree';
        $max_posts = $_GET['max_posts'] ?? null;
        $load_posts = null;
        break;
    case 'uffici':
        $tipo_uo = 'ufficio';
        $descrizione = 'tutti gli uffici';
        $max_posts = 30;
        $load_posts = 30;
        break;
    case 'organi-di-governo':
        $tipo_uo = $post->post_name;
        $descrizione = 'tutti gli organi di governo'; 
        $max_posts = $_GET['max_posts'] ?? 30; 
        $load_posts = 30;
        break;
    case 'commissione':
        $tipo_uo = 'commissione';
        $descrizione = 'tutte le commissioni';
        $max_posts = $_GET['max_posts'] ?? 30;
        $load_posts = 30;
        break;
}

$query = isset($_GET['search']) ? $_GET['search'] : null;
$tax_query = array(
    array(
        'taxonomy' => 'tipi_unita_organizzativa',
        'field' => 'slug',
        'terms' => $tipo_uo
    )
);

$posts_per_page = 9; // Definisci il numero di post per pagina

$args = array(
    's'              => $query,                 // Query di ricerca
    'post_type'      => 'unita_organizzativa',   // Tipo di post personalizzato
    'post_status'    => 'publish',               // Solo post pubblicati
    'orderby'        => 'post_title',            // Ordina per titolo del post
    'order'          => 'ASC',                   // Ordina in modo ascendente
    'tax_query'      => $tax_query,              // Filtro tassonomico
    'posts_per_page' => $posts_per_page,         // Numero di post per pagina
    'paged'          => get_query_var('paged') ? get_query_var('paged') : 1 // Gestisci la paginazione
);

$the_query = new WP_Query($args);  // Crea la query

$posts = $the_query->posts;  // Ottieni i post
$total_pages = $the_query->max_num_pages;  // Calcola il numero totale di pagine


// URL base per la ricerca
$search_url = 'https://demo.we-com.info/caprarola/amministrazione/uffici/';
?>

<!-- Mostra gli articoli -->
<div class="bg-grey-card py-3">
    <form role="search" id="search-form" method="get" class="search-form" action="<?php echo esc_url($search_url); ?>">
        <div class="container">
            <h2 class="title-xxlarge mb-4 mt-5 mb-lg-10">
                Esplora <?= esc_html($descrizione) ?>
            </h2>
            <div class="cmp-input-search">
                <div class="form-group autocomplete-wrapper mb-2 mb-lg-4">
                    <div class="input-group">
                        <label for="autocomplete-two" class="visually-hidden">Cerca una parola chiave</label>
                        <input
                            type="search"
                            class="autocomplete form-control"
                            placeholder="Cerca una parola chiave"
                            id="autocomplete-two"
                            name="search"
                            value="<?php echo esc_attr($query); ?>"
                            data-bs-autocomplete="[]"
                        />
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" id="button-3">
                                Invio
                            </button>
                        </div>
                        <span class="autocomplete-icon" aria-hidden="true">
                            <svg class="icon icon-sm icon-primary" role="img" aria-labelledby="autocomplete-label">
                                <use href="#it-search"></use>
                            </svg>
                        </span>
                    </div>
                </div>
                <p id="autocomplete-label" class="mb-4">
                    <strong><?php echo $the_query->found_posts; ?></strong> risultati in ordine alfabetico
                </p>
            </div>

            <div class="row g-2" id="load-more">
                <?php foreach ($posts as $post) {
                    $load_card_type = 'unita-organizzativa';
                    get_template_part('template-parts/unita-organizzativa/cards-list');
                } ?>
            </div>

            <!-- Aggiungi la paginazione -->
            <div class="text-center" style="margin-top:20px;">
                <?php
                $pagination_args = array(
                    'base' => $search_url . '?search=' . urlencode($query) . '&paged=%#%',
                    'total' => $total_pages,
                    'prev_text' => __('&laquo; Indietro'),
                    'next_text' => __('Avanti &raquo;'),
                    'mid_size' => 1,
                    'end_size' => 1,
                    'type' => 'array'
                );

                $pagination = paginate_links($pagination_args);

                if (is_array($pagination)) {
                    foreach ($pagination as &$page_link) {
                        $page_link = str_replace('<a ', '<a class="btn btn-primary" style="margin-right: 10px; margin-left: 10px;" ', $page_link);
                    }
                    echo implode('', $pagination);
                } else {
                    echo "Nessuna pagina da visualizzare.";
                }
                ?>
            </div>
        </div>
    </form>
</div>
