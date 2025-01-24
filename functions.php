<?php

// Registrazione del Custom Post Type
// Registrazione del Custom Post Type
// Registrazione del Custom Post Type
function crea_custom_post_type_pagina_pnrr() {
    $labels = array(
        'name'               => 'PNRR',
        'singular_name'      => 'Pagina PNRR',
        'menu_name'          => 'PNRR',
        'add_new'            => 'Aggiungi Nuova',
        'add_new_item'       => 'Aggiungi Nuova Pagina PNRR',
        'edit_item'          => 'Modifica Pagina PNRR',
        'view_item'          => 'Visualizza Pagina PNRR',
        'all_items'          => 'Tutte le Pagine PNRR',
        'search_items'       => 'Cerca Pagine PNRR',
        'not_found'          => 'Nessuna pagina trovata',
        'not_found_in_trash' => 'Nessuna pagina trovata nel cestino',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'pnrr' ),
        'capability_type'    => 'page',
        'has_archive'        => false,
        'hierarchical'       => true,
        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-admin-page',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'revisions', 'page-attributes' ),
        'show_in_rest'       => true,
    );

    register_post_type( 'pnrr', $args );
}
add_action( 'init', 'crea_custom_post_type_pagina_pnrr' );






// Aggiungi il metabox con CMB2 per allegati
add_action( 'cmb2_admin_init', 'aggiungi_metabox_allegati_cmb2' );
function aggiungi_metabox_allegati_cmb2() {
    $prefix = '_pnrr_'; // Prefisso per i meta field

    // Crea il metabox per il CPT 'pnrr'
    $cmb_documenti = new_cmb2_box( array(
        'id'            => $prefix . 'documenti_metabox',
        'title'         => __( 'Documenti Allegati', 'design_comuni_italia' ),
        'object_types'  => array( 'pnrr' ), // Tipo di post a cui applicare il metabox
        'context'       => 'normal', // Posizione
        'priority'      => 'high', // Priorità
        'show_names'    => true, // Mostra i nomi dei campi
    ) );

    // Aggiungi il campo per la lista degli allegati
    $cmb_documenti->add_field( array(
        'id'           => $prefix . 'allegati',
        'name'         => __( 'Allegati', 'design_comuni_italia' ),
        'desc'         => __( 'Elenco di documenti allegati alla struttura', 'design_comuni_italia' ),
        'type'         => 'file_list', // Usa il tipo file_list per gli allegati
        'preview_size' => array( 100, 100 ), // Dimensioni dell'anteprima
        'text'         => array(
            'add_upload_files_text' => __( 'Aggiungi o Carica Allegati', 'design_comuni_italia' ), // Testo pulsante di caricamento
            'remove_image_text'     => __( 'Rimuovi Allegato', 'design_comuni_italia' ), // Testo per rimuovere
            'file_text'             => __( 'Allegato:', 'design_comuni_italia' ), // Testo per i file caricati
            'file_download_text'    => __( 'Scarica', 'design_comuni_italia' ), // Testo per scaricare
            'remove_text'           => __( 'Rimuovi', 'design_comuni_italia' ), // Testo per rimuovere
        ),
        'query_args' => array(
            'type' => array( 'application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'image/jpeg', 'image/png' ),
        ),
    ) );
    // Aggiungi il metabox per atti legislativi
$cmb_atti_legislativi = new_cmb2_box( array(
    'id'            => $prefix . 'atti_legislativi_metabox',
    'title'         => __( 'Atti Legislativi', 'design_comuni_italia' ),
    'object_types'  => array( 'pnrr' ), // Tipo di post a cui applicare il metabox
    'context'       => 'normal', // Posizione
    'priority'      => 'high', // Priorità
    'show_names'    => true, // Mostra i nomi dei campi
) );

// Aggiungi il campo per la lista degli atti legislativi
$cmb_atti_legislativi->add_field( array(
    'id'           => $prefix . 'atti_legislativi',
    'name'         => __( 'Allegati Atti Legislativi', 'design_comuni_italia' ),
    'desc'         => __( 'Elenco di documenti degli atti legislativi', 'design_comuni_italia' ),
    'type'         => 'file_list', // Usa il tipo file_list per gli allegati
    'preview_size' => array( 100, 100 ), // Dimensioni dell'anteprima
    'text'         => array(
        'add_upload_files_text' => __( 'Aggiungi o Carica Atti Legislativi', 'design_comuni_italia' ), // Testo pulsante di caricamento
        'remove_image_text'     => __( 'Rimuovi Allegato', 'design_comuni_italia' ), // Testo per rimuovere
        'file_text'             => __( 'Allegato:', 'design_comuni_italia' ), // Testo per i file caricati
        'file_download_text'    => __( 'Scarica', 'design_comuni_italia' ), // Testo per scaricare
        'remove_text'           => __( 'Rimuovi', 'design_comuni_italia' ), // Testo per rimuovere
    ),
    'query_args' => array(
        'type' => array( 'application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'image/jpeg', 'image/png' ),
    ),
) );

 // Aggiungi il metabox per altri allegati
 $cmb_altri_allegati = new_cmb2_box( array(
    'id'            => $prefix . 'altri_allegati_metabox',
    'title'         => __( 'Altri allegati', 'design_comuni_italia' ),
    'object_types'  => array( 'pnrr' ), // Tipo di post a cui applicare il metabox
    'context'       => 'normal', // Posizione
    'priority'      => 'high', // Priorità
    'show_names'    => true, // Mostra i nomi dei campi
) );

// Aggiungi il campo per la lista degli altri allegati
$cmb_altri_allegati->add_field( array(
    'id'           => $prefix . 'altri_allegati',
    'name'         => __( 'Allegati altri allegati', 'design_comuni_italia' ),
    'desc'         => __( 'Elenco degli altri allegati', 'design_comuni_italia' ),
    'type'         => 'file_list', // Usa il tipo file_list per gli allegati
    'preview_size' => array( 100, 100 ), // Dimensioni dell'anteprima
    'text'         => array(
        'add_upload_files_text' => __( 'Aggiungi o Carica altri allegati', 'design_comuni_italia' ), // Testo pulsante di caricamento
        'remove_image_text'     => __( 'Rimuovi altri allegato', 'design_comuni_italia' ), // Testo per rimuovere
        'file_text'             => __( 'Altri allegato:', 'design_comuni_italia' ), // Testo per i file caricati
        'file_download_text'    => __( 'Scarica', 'design_comuni_italia' ), // Testo per scaricare
        'remove_text'           => __( 'Rimuovi', 'design_comuni_italia' ), // Testo per rimuovere
    ),
    'query_args' => array(
        'type' => array( 'application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'image/jpeg', 'image/png' ),
    ),
) );


}




// Aggiungere un metabox solo per le pagine figlio
function aggiungi_metabox_pnrr() {
    global $post;

    // Controlla se il post ha un genitore
    if ( wp_get_post_parent_id( $post->ID ) ) {
        // Aggiungi il metabox Carlotta
        add_meta_box(
            'metabox_carlotta',          // ID del metabox
            'Informazioni Carlotta',     // Titolo del metabox
            'mostra_metabox_carlotta',   // Callback per visualizzare il contenuto
            'pnrr',                      // CPT a cui associare il metabox
            'normal',                   // Posizione
            'default'                   // Priorità
        );

        // Aggiungi il metabox Descrizione Breve
        add_meta_box(
            'metabox_descrizione_breve',          // ID del metabox
            'Descrizione Breve',                   // Titolo del metabox
            'mostra_metabox_descrizione_breve',   // Callback per visualizzare il contenuto
            'pnrr',                                // CPT a cui associare il metabox
            'normal',                              // Posizione
            'default'                              // Priorità
        );

        // Aggiungi il metabox Data di Pubblicazione
        add_meta_box(
            'metabox_datapubbl',                  // ID del metabox
            'Data di Pubblicazione',               // Titolo del metabox
            'mostra_metabox_datapubbl',           // Callback per visualizzare il contenuto
            'pnrr',                                // CPT a cui associare il metabox
            'normal',                              // Posizione
            'default'                              // Priorità
        );

        // Aggiungi il metabox Importo
        add_meta_box(
            'metabox_importo',                  // ID del metabox
            'Importo',               // Titolo del metabox
            'mostra_metabox_importo',           // Callback per visualizzare il contenuto
            'pnrr',                                // CPT a cui associare il metabox
            'normal',                              // Posizione
            'default'                              // Priorità
        );

        // Aggiungi il metabox Dettagli
        add_meta_box(
            'metabox_dettagli',                    // ID del metabox
            'Dettagli',                            // Titolo del metabox
            'mostra_metabox_dettagli',            // Callback per visualizzare il contenuto
            'pnrr',                                // CPT a cui associare il metabox
            'normal',                              // Posizione
            'default'                              // Priorità
        );


        // Aggiungi il metabox Attività finanziate
        add_meta_box(
            'metabox_attfin',                    // ID del metabox
            'Attività finanziate',                            // Titolo del metabox
            'mostra_metabox_attfin',            // Callback per visualizzare il contenuto
            'pnrr',                                // CPT a cui associare il metabox
            'normal',                              // Posizione
            'default'                              // Priorità
        );


          // Aggiungi il metabox Accesso ai finanziamenti
          add_meta_box(
            'metabox_finanziamento',                    // ID del metabox
            'Accesso ai finanziamenti',                            // Titolo del metabox
            'mostra_metabox_finanziamento',            // Callback per visualizzare il contenuto
            'pnrr',                                // CPT a cui associare il metabox
            'normal',                              // Posizione
            'default'                              // Priorità
        );
    }
}
add_action( 'add_meta_boxes', 'aggiungi_metabox_pnrr' );



// Aggiungi il metabox con CMB2 per 'pnrr'
add_action( 'cmb2_admin_init', 'aggiungi_metabox_contatti_cmb2' );
function aggiungi_metabox_contatti_cmb2() {
    $prefix = '_pnrr_'; // Prefisso per i meta field

    // Crea il metabox per il CPT 'pnrr'
    $cmb_contatti = new_cmb2_box( array(
        'id'            => $prefix . 'box_contatti',
        'title'         => __( 'Contatti', 'design_comuni_italia' ),
        'object_types'  => array( 'pnrr' ), // Modifica qui per associare il metabox al CPT 'pnrr'
        'context'       => 'normal',
        'priority'      => 'high',
    ) );

    // Aggiungi il campo per i contatti
    $cmb_contatti->add_field( array(
        'id' => $prefix . 'contatti',
        'name'        => __( 'Contatti *', 'design_comuni_italia' ),
        'desc' => __( 'Contatti dell\'Unità organizzativa' , 'design_comuni_italia' ),
        'type'    => 'pw_multiselect',
        'options' => dci_get_posts_options('punto_contatto'),
        'attributes'    => array(
            'required'    => 'required',
            'placeholder' =>  __( ' Seleziona i Punti di Contatto', 'design_comuni_italia' ),
        ),
    ) );
}



// Mostra metabox Carlotta
function mostra_metabox_carlotta( $post ) {
    $carlotta = get_post_meta( $post->ID, '_carlotta', true );
    echo '<label for="carlotta">Campo Carlotta:</label>';
    echo '<input type="text" id="carlotta" name="carlotta" value="' . esc_attr( $carlotta ) . '" />';
}

// Mostra metabox Finanziamento
function mostra_metabox_finanziamento( $post ) {
    $finanziamento = get_post_meta( $post->ID, '_finanziamento', true );
    echo '<label for="finanziamento">Accesso al finanziamento:</label>';
    echo '<textarea id="finanziamento" name="finanziamento" rows="4" style="width:100%;">' . esc_textarea( $finanziamento ) . '</textarea>';
}

// Mostra metabox Attività finanziate
function mostra_metabox_attfin( $post ) {
    $attfin = array();
    for ($i = 1; $i <= 7; $i++) {
        $attfin[$i] = get_post_meta( $post->ID, '_attfina_' . $i, true );
        echo '<label for="attfina_' . $i . '">Attività finanziata: ' . $i . ':</label>';
        echo '<input type="text" id="attfina_' . $i . '" name="attfin[' . $i . ']" value="' . esc_attr( $attfin[$i] ) . '" style="width:100%;" /><br/><br/>';
    }
}

// Mostra metabox Descrizione Breve
function mostra_metabox_descrizione_breve( $post ) {
    $descrizione_breve = get_post_meta( $post->ID, '_descrizione_breve', true );
    echo '<label for="descrizione_breve">Inserisci la Descrizione Breve:</label>';
    echo '<textarea id="descrizione_breve" name="descrizione_breve" rows="4" style="width:100%;">' . esc_textarea( $descrizione_breve ) . '</textarea>';
}

// Mostra metabox Data di Pubblicazione
function mostra_metabox_datapubbl( $post ) {
    $datapubbl = get_post_meta( $post->ID, '_datapubbl', true );
    echo '<label for="datapubbl">Inserisci la Data di Pubblicazione in formato GG-MM-AAA:</label>';
    echo '<input type="text" id="datapubbl" name="datapubbl" value="' . esc_attr( $datapubbl ) . '" />';
}

// Mostra metabox Importo finanziato
function mostra_metabox_importo( $post ) {
    $importo = get_post_meta( $post->ID, '_importo', true );
    echo '<label for="importo">Inserisci importo finanziato:</label>';
    echo '<input type="text" id="importo" name="importo" value="' . esc_attr( $importo ) . '" />';}


// Mostra metabox Dettagli come sette campi di input
function mostra_metabox_dettagli( $post ) {
    $dettagli = array();
    for ($i = 1; $i <= 7; $i++) {
        $dettagli[$i] = get_post_meta( $post->ID, '_dettaglio_' . $i, true );
        echo '<label for="dettaglio_' . $i . '">Dettaglio ' . $i . ':</label>';
        echo '<input type="text" id="dettaglio_' . $i . '" name="dettagli[' . $i . ']" value="' . esc_attr( $dettagli[$i] ) . '" style="width:100%;" /><br/><br/>';
    }
}
add_action( 'save_post', 'salva_dati_metabox_importo' );
// Salva dati metabox Importo
function salva_dati_metabox_importo( $post_id ) {
    if ( array_key_exists( 'importo', $_POST ) ) {
        update_post_meta(
            $post_id,
            '_importo',
            sanitize_text_field( $_POST['importo'] )
        );
    }
}

add_action( 'save_post', 'salva_dati_metabox_finanziamento' );
// Salva dati metabox Importo
function salva_dati_metabox_finanziamento( $post_id ) {
    if ( array_key_exists( 'finanziamento', $_POST ) ) {
        update_post_meta(
            $post_id,
            '_finanziamento',
            sanitize_text_field( $_POST['finanziamento'] )
        );
    }
}

add_action( 'save_post', 'salva_dati_metabox_carlotta' );
// Salva dati metabox Carlotta
function salva_dati_metabox_carlotta( $post_id ) {
    if ( array_key_exists( 'carlotta', $_POST ) ) {
        update_post_meta(
            $post_id,
            '_carlotta',
            sanitize_text_field( $_POST['carlotta'] )
        );
    }
}

// Salva dati metabox Descrizione Breve
function salva_dati_metabox_descrizione_breve( $post_id ) {
    if ( array_key_exists( 'descrizione_breve', $_POST ) ) {
        update_post_meta(
            $post_id,
            '_descrizione_breve',
            sanitize_textarea_field( $_POST['descrizione_breve'] )
        );
    }
}
add_action( 'save_post', 'salva_dati_metabox_descrizione_breve' );

// Salva dati metabox Data di Pubblicazione
function salva_dati_metabox_datapubbl( $post_id ) {
    if ( array_key_exists( 'datapubbl', $_POST ) ) {
        update_post_meta(
            $post_id,
            '_datapubbl',
            sanitize_text_field( $_POST['datapubbl'] )
        );
    }
}
add_action( 'save_post', 'salva_dati_metabox_datapubbl' );

// Salva dati metabox Dettagli
function salva_dati_metabox_dettagli( $post_id ) {
    if ( isset( $_POST['dettagli'] ) ) {
        foreach ($_POST['dettagli'] as $key => $value) {
            update_post_meta(
                $post_id,
                '_dettaglio_' . intval($key),
                sanitize_text_field($value)
            );
        }
    }
    
}
add_action( 'save_post', 'salva_dati_metabox_dettagli' );

// Salva dati metabox Attività finanziate
function salva_dati_metabox_attfin( $post_id ) {
    if ( isset( $_POST['attfin'] ) ) {
        foreach ($_POST['attfin'] as $key => $value) {
            update_post_meta(
                $post_id,
                '_attfina_' . intval($key),
                sanitize_text_field($value)
            );
        }
    }
    
}
add_action( 'save_post', 'salva_dati_metabox_attfin' );

// Visualizza i dettagli nel frontend
function mostra_dettagli_frontend( $content ) {
    global $post;

   // $content .= '<div class="dettagli">';
  //  $content .= '<h3>Dettagli</h3>';

    for ($i = 1; $i <= 7; $i++) {
        $dettaglio = get_post_meta($post->ID, '_dettaglio_' . $i, true);
        if (!empty($dettaglio)) {
            $content .= '<p>' . esc_html($dettaglio) . '</p>';
        }
    }

    $content .= '</div>';

    return $content; // Restituisci il contenuto modificato
}
add_filter( 'the_content', 'mostra_dettagli_frontend' );




// Modifica il template per le pagine figlio
function usa_template_figlio( $template ) {
    global $post;

    // Controlla se il post è di tipo 'pnrr' e ha un genitore
    if ( 'pnrr' === get_post_type( $post ) && $post->post_parent ) {
        // Ottieni il template specifico per le pagine figlio
        $custom_template = locate_template( 'single-pnrr-child.php' );

        // Se il template esiste, usalo
        if ( $custom_template ) {
            return $custom_template;
        }
    }

    return $template;
}
add_filter( 'template_include', 'usa_template_figlio' );




flush_rewrite_rules();
// Aggiungere il metabox per M1 (Digitalizzazione, innovazione, competitività, cultura e turismo)
function aggiungi_metabox_pnrr_m1() {
    add_meta_box(
        'sezione_m1',                     // ID del metabox
        'Digitalizzazione, innovazione, competitività, cultura e turismo (M1)',  // Titolo
        'mostra_metabox_pnrr_m1',         // Callback per visualizzare il contenuto
        'pnrr',                           // CPT a cui associare il metabox
        'normal',                         // Posizione
        'default'                         // Priorità
    );
}
add_action( 'add_meta_boxes', 'aggiungi_metabox_pnrr_m1' );

function mostra_metabox_pnrr_m1( $post ) {
    // Ottieni i valori salvati per M1
    $elementi_m1 = get_post_meta( $post->ID, '_elementi_m1', true );
    
    echo '<label for="elementi_m1">Inserisci gli elementi per la sezione M1, separati da una nuova riga:</label>';
    echo '<textarea id="elementi_m1" name="elementi_m1" rows="5" style="width:100%;">' . esc_textarea( $elementi_m1 ) . '</textarea>';
    echo '<p>Ogni riga deve contenere un titolo, un link e un sottotitolo in formato JSON. Es: {"bold_text": "Titolo", "url": "https://esempio.com", "subtitle": "Sottotitolo"}</p>';
}

// Salvare i dati del metabox M1
function salva_dati_metabox_pnrr_m1( $post_id ) {
    if ( array_key_exists( 'elementi_m1', $_POST ) ) {
        update_post_meta(
            $post_id,
            '_elementi_m1',
            sanitize_textarea_field( $_POST['elementi_m1'] )
        );
    }
}
add_action( 'save_post', 'salva_dati_metabox_pnrr_m1' );

// Aggiungere il metabox per M2 (Rivoluzione verde e transizione ecologica)
function aggiungi_metabox_pnrr_m2() {
    add_meta_box(
        'sezione_m2',                     // ID del metabox
        'Rivoluzione verde e transizione ecologica (M2)',  // Titolo
        'mostra_metabox_pnrr_m2',         // Callback per visualizzare il contenuto
        'pnrr',                           // CPT a cui associare il metabox
        'normal',                         // Posizione
        'default'                         // Priorità
    );
}


function mostra_metabox_pnrr_m2( $post ) {
    // Ottieni i valori salvati per M2
    $elementi_m2 = get_post_meta( $post->ID, '_elementi_m2', true );
    
    echo '<label for="elementi_m2">Inserisci gli elementi per la sezione M2, separati da una nuova riga:</label>';
    echo '<textarea id="elementi_m2" name="elementi_m2" rows="5" style="width:100%;">' . esc_textarea( $elementi_m2 ) . '</textarea>';
    echo '<p>Ogni riga deve contenere un titolo, un link e un sottotitolo in formato JSON. Es: {"bold_text": "Titolo", "url": "https://esempio.com", "subtitle": "Sottotitolo"}</p>';
}

// Salvare i dati del metabox M2
function salva_dati_metabox_pnrr_m2( $post_id ) {
    if ( array_key_exists( 'elementi_m2', $_POST ) ) {
        update_post_meta(
            $post_id,
            '_elementi_m2',
            sanitize_textarea_field( $_POST['elementi_m2'] )
        );
    }
}
add_action( 'add_meta_boxes', 'aggiungi_metabox_pnrr_m2' );
// Aggiungere il metabox per M3 (Infrastrutture per una mobilità sostenibile)
function aggiungi_metabox_pnrr_m3() {
    add_meta_box(
        'sezione_m3',                     // ID del metabox
        'Infrastrutture per una mobilità sostenibile (M3)',  // Titolo
        'mostra_metabox_pnrr_m3',         // Callback per visualizzare il contenuto
        'pnrr',                           // CPT a cui associare il metabox
        'normal',                         // Posizione
        'default'                         // Priorità
    );
}


function mostra_metabox_pnrr_m3( $post ) {
    // Ottieni i valori salvati per M3
    $elementi_m3 = get_post_meta( $post->ID, '_elementi_m3', true );
    
    echo '<label for="elementi_m3">Inserisci gli elementi per la sezione M3, separati da una nuova riga:</label>';
    echo '<textarea id="elementi_m3" name="elementi_m3" rows="5" style="width:100%;">' . esc_textarea( $elementi_m3 ) . '</textarea>';
    echo '<p>Ogni riga deve contenere un titolo, un link e un sottotitolo in formato JSON. Es: {"bold_text": "Titolo", "url": "https://esempio.com", "subtitle": "Sottotitolo"}</p>';
}

// Salvare i dati del metabox M3
function salva_dati_metabox_pnrr_m3( $post_id ) {
    if ( array_key_exists( 'elementi_m3', $_POST ) ) {
        update_post_meta(
            $post_id,
            '_elementi_m3',
            sanitize_textarea_field( $_POST['elementi_m3'] )
        );
    }
}

add_action( 'add_meta_boxes', 'aggiungi_metabox_pnrr_m3' );
// Aggiungere il metabox per M4 (Istruzione e ricerca (M4))
function aggiungi_metabox_pnrr_m4() {
    add_meta_box(
        'sezione_m4',                     // ID del metabox
        'Istruzione e ricerca (M4)',  // Titolo
        'mostra_metabox_pnrr_m4',         // Callback per visualizzare il contenuto
        'pnrr',                           // CPT a cui associare il metabox
        'normal',                         // Posizione
        'default'                         // Priorità
    );
}
add_action( 'add_meta_boxes', 'aggiungi_metabox_pnrr_m4' ); // Assicurati che questo sia presente

function mostra_metabox_pnrr_m4( $post ) {
    // Ottieni i valori salvati per M4
    $elementi_m4 = get_post_meta( $post->ID, '_elementi_m4', true );
    
    echo '<label for="elementi_m4">Inserisci gli elementi per la sezione M4, separati da una nuova riga:</label>';
    echo '<textarea id="elementi_m4" name="elementi_m4" rows="5" style="width:100%;">' . esc_textarea( $elementi_m4 ) . '</textarea>';
    echo '<p>Ogni riga deve contenere un titolo, un link e un sottotitolo in formato JSON. Es: {"bold_text": "Titolo", "url": "https://esempio.com", "subtitle": "Sottotitolo"}</p>';
}

// Salvare i dati del metabox M4
function salva_dati_metabox_pnrr_m4( $post_id ) {
    if ( array_key_exists( 'elementi_m4', $_POST ) ) {
        update_post_meta(
            $post_id,
            '_elementi_m4',
            sanitize_textarea_field( $_POST['elementi_m4'] )
        );
    }
}
add_action( 'save_post', 'salva_dati_metabox_pnrr_m4' ); // Questo aggancia la funzione di salvataggio
// Aggiungere il metabox per M5 (Inclusione e coesione)
function aggiungi_metabox_pnrr_m5() {
    add_meta_box(
        'sezione_m5',                     // ID del metabox
        'Inclusione e coesione (M5)',     // Titolo
        'mostra_metabox_pnrr_m5',         // Callback per visualizzare il contenuto
        'pnrr',                           // CPT a cui associare il metabox
        'normal',                         // Posizione
        'default'                         // Priorità
    );
}
add_action( 'add_meta_boxes', 'aggiungi_metabox_pnrr_m5' );

function mostra_metabox_pnrr_m5( $post ) {
    // Ottieni i valori salvati per M5
    $elementi_m5 = get_post_meta( $post->ID, '_elementi_m5', true );
    
    echo '<label for="elementi_m5">Inserisci gli elementi per la sezione M5, separati da una nuova riga:</label>';
    echo '<textarea id="elementi_m5" name="elementi_m5" rows="5" style="width:100%;">' . esc_textarea( $elementi_m5 ) . '</textarea>';
    echo '<p>Ogni riga deve contenere un titolo, un link e un sottotitolo in formato JSON. Es: {"bold_text": "Titolo", "url": "https://esempio.com", "subtitle": "Sottotitolo"}</p>';
}

// Salvare i dati del metabox M5
function salva_dati_metabox_pnrr_m5( $post_id ) {
    if ( array_key_exists( 'elementi_m5', $_POST ) ) {
        update_post_meta(
            $post_id,
            '_elementi_m5',
            sanitize_textarea_field( $_POST['elementi_m5'] )
        );
    }
}
add_action( 'save_post', 'salva_dati_metabox_pnrr_m5' );
// Aggiungere il metabox per M6 (Salute)
function aggiungi_metabox_pnrr_m6() {
    add_meta_box(
        'sezione_m6',                     // ID del metabox
        'Salute (M6)',                    // Titolo
        'mostra_metabox_pnrr_m6',         // Callback per visualizzare il contenuto
        'pnrr',                           // CPT a cui associare il metabox
        'normal',                         // Posizione
        'default'                         // Priorità
    );
}
add_action( 'add_meta_boxes', 'aggiungi_metabox_pnrr_m6' );

function mostra_metabox_pnrr_m6( $post ) {
    // Ottieni i valori salvati per M6
    $elementi_m6 = get_post_meta( $post->ID, '_elementi_m6', true );
    
    echo '<label for="elementi_m6">Inserisci gli elementi per la sezione M6, separati da una nuova riga:</label>';
    echo '<textarea id="elementi_m6" name="elementi_m6" rows="5" style="width:100%;">' . esc_textarea( $elementi_m6 ) . '</textarea>';
    echo '<p>Ogni riga deve contenere un titolo, un link e un sottotitolo in formato JSON. Es: {"bold_text": "Titolo", "url": "https://esempio.com", "subtitle": "Sottotitolo"}</p>';
}

// Salvare i dati del metabox M6
function salva_dati_metabox_pnrr_m6( $post_id ) {
    if ( array_key_exists( 'elementi_m6', $_POST ) ) {
        update_post_meta(
            $post_id,
            '_elementi_m6',
            sanitize_textarea_field( $_POST['elementi_m6'] )
        );
    }
}
add_action( 'save_post', 'salva_dati_metabox_pnrr_m6' );


function pagina_impostazioni_pnrr() {
    ?>
    <div class="wrap">
        <h1>Impostazioni PNRR</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields( 'impostazioni_pnrr' );
            do_settings_sections( 'impostazioni_pnrr' );
            submit_button();
            ?>
        </form>
    </div>
    <?php
}


/**
 * Design Comuni Italia functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Design_Comuni_Italia
 */

/**
 * Funzionalità Trasversali
 */
require get_template_directory() . '/inc/funzionalita_trasversali.php';

/**
 * Load more posts
 */
require get_template_directory() . '/inc/load_more.php';

/**
 * Vocabolario
 */
require get_template_directory() . '/inc/vocabolario.php';

/**
 * Extend User Taxonomy
 */
require get_template_directory() . '/inc/extend-tax-to-user.php';

/**
 * Implement Plugin Activations Rules
 */
require get_template_directory() . '/inc/theme-dependencies.php';

/**
 * Implement CMB2 Custom Field Manager
 */
if ( ! function_exists ( 'dci_get_tipologia_articoli_options' ) ) {
    require get_template_directory() . '/inc/cmb2.php';
    require get_template_directory() . '/inc/backend-template.php';
}

/**
 * Utils functions
 */
require get_template_directory() . '/inc/utils.php';

/**
 * Breadcrumb class
 */
require get_template_directory() . '/inc/breadcrumb.php';

/**
 * Activation Hooks
 */
require get_template_directory() . '/inc/activation.php';

/**
 * Actions & Hooks
 */
require get_template_directory() . '/inc/actions.php';

/**
 * Gutenberg editor rules
 */
require get_template_directory() . '/inc/gutenberg.php';

/**
 * Welcome page
 */
require get_template_directory() . '/inc/welcome.php';

/**
 * main menu walker
 */
require get_template_directory() . '/walkers/main-menu.php';

/**
 * menu header right walker
 */
require get_template_directory() . '/walkers/menu-header-right.php';

/**
 * footer info walker
 */
require get_template_directory() . '/walkers/footer-info.php';

/**
 * Filters
 */
require get_template_directory() . '/inc/filters.php';

if ( ! function_exists( 'dci_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function dci_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Design Comuni Italia, use a find and replace
         * to change 'design_comuni_italia' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'design_comuni_italia', get_template_directory() . '/languages' );


        load_theme_textdomain( 'easy-appointments', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        // image size
        if ( function_exists( 'add_image_size' ) ) {
            add_image_size( 'article-simple-thumb', 500, 384 , true);
            add_image_size( 'item-thumb', 280, 280 , true);
            add_image_size( 'item-gallery', 730, 485 , true);
            add_image_size( 'vertical-card', 190, 290 , true);

            add_image_size( 'banner', 600, 250 , false);
        }

    }
endif;
add_action( 'after_setup_theme', 'dci_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dci_widgets_init() {
}
add_action( 'widgets_init', 'dci_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function dci_scripts() {

    //wp_deregister_script('jquery');

    wp_enqueue_style( 'dci-wp-style', get_template_directory_uri()."/style.css" );
    wp_enqueue_style( 'dci-font', get_template_directory_uri() . '/assets/css/fonts.css');
    //load Bootstrap Italia latest css if exists in node_modules
    if (file_exists(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'node_modules/bootstrap-italia/dist/css/bootstrap-italia-comuni.min.css')) {
        wp_enqueue_style( 'dci-boostrap-italia-min', get_template_directory_uri() . '/node_modules/bootstrap-italia/dist/css/bootstrap-italia-comuni.min.css');
    }
    else {
        wp_enqueue_style( 'dci-boostrap-italia-min', get_template_directory_uri() . '/assets/css/bootstrap-italia.min.css');
    }
    wp_enqueue_style( 'dci-comuni', get_template_directory_uri() . '/assets/css/comuni.css');

    wp_enqueue_script( 'dci-modernizr', get_template_directory_uri() . '/assets/js/modernizr.custom.js');

    // print css
    wp_enqueue_style('dci-print-style',get_template_directory_uri() . '/print.css', array(),'20190912','print' );

    // footer
    //load Bootstrap Italia latest js if exists in node_modules
    if (file_exists(dirname(__FILE__) . DIRECTORY_SEPARATOR . '/node_modules/bootstrap-italia/dist/js/bootstrap-italia.bundle.min.js')) {
        wp_enqueue_script( 'dci-boostrap-italia-min-js', get_template_directory_uri() . '/node_modules/bootstrap-italia/dist/js/bootstrap-italia.bundle.min.js', array(), false, true);
    }
    else {
        wp_enqueue_script( 'dci-boostrap-italia-min-js', get_template_directory_uri() . '/assets/js/bootstrap-italia.bundle.min.js', array(), false, true);
    }
    wp_enqueue_script( 'dci-comuni', get_template_directory_uri() . '/assets/js/comuni.js', array(), false, true);
    wp_add_inline_script( 'dci-comuni', 'window.wpRestApi = "' . get_rest_url() . '"', 'before' );

    wp_enqueue_script( 'dci-jquery-easing', get_template_directory_uri() . '/assets/js/components/jquery-easing/jquery.easing.js', array(), false, true);
    wp_enqueue_script( 'dci-jquery-scrollto', get_template_directory_uri() . '/assets/js/components/jquery.scrollto/jquery.scrollTo.js', array(), false, true);
    wp_enqueue_script( 'dci-jquery-responsive-dom', get_template_directory_uri() . '/assets/js/components/ResponsiveDom/js/jquery.responsive-dom.js', array(), false, true);
    wp_enqueue_script( 'dci-jpushmenu', get_template_directory_uri() . '/assets/js/components/jPushMenu/jpushmenu.js', array(), false, true);
    wp_enqueue_script( 'dci-perfect-scrollbar', get_template_directory_uri() . '/assets/js/components/perfect-scrollbar-master/perfect-scrollbar/js/perfect-scrollbar.jquery.js', array(), false, true);
    wp_enqueue_script( 'dci-vallento', get_template_directory_uri() . '/assets/js/components/vallenato.js-master/vallenato.js', array(), false, true);
    wp_enqueue_script( 'dci-jquery-responsive-tabs', get_template_directory_uri() . '/assets/js/components/responsive-tabs/js/jquery.responsiveTabs.js', array(), false, true);
    wp_enqueue_script( 'dci-fitvids', get_template_directory_uri() . '/assets/js/components/fitvids/jquery.fitvids.js', array(), false, true);
    wp_enqueue_script( 'dci-sticky-kit', get_template_directory_uri() . '/assets/js/components/sticky-kit-master/dist/sticky-kit.js', array(), false, true);
    
    wp_enqueue_script( 'dci-jquery-match-height', get_template_directory_uri() . '/assets/js/components/jquery-match-height/dist/jquery.matchHeight.js', array(), false, true);

    if(is_singular(array("servizio", "struttura", "luogo", "evento", "scheda_progetto", "post", "circolare", "indirizzo")) || is_archive() || is_search() || is_post_type_archive("luogo")) {
        wp_enqueue_script( 'dci-leaflet-js', get_template_directory_uri() . '/assets/js/components/leaflet/leaflet.js', array(), false, true);
    }

    if(is_singular(array("evento","scheda_progetto")) || is_home() || is_archive() ){
        wp_enqueue_script( 'dci-clndr-json2', get_template_directory_uri() . '/assets/js/components/clndr/json2.js', array(), false, false);
        wp_enqueue_script( 'dci-clndr-moment', get_template_directory_uri() . '/assets/js/components/clndr/moment.js', array(), false, false);
        wp_enqueue_script( 'dci-clndr-underscore', get_template_directory_uri() . '/assets/js/components/clndr/underscore.js', array(), false, false);
        wp_enqueue_script( 'dci-clndr-clndr', get_template_directory_uri() . '/assets/js/components/clndr/clndr.js', array(), false, false);
        wp_enqueue_script( 'dci-clndr-it', get_template_directory_uri() . '/assets/js/components/clndr/it.js', array(), false, false);
    }

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'dci_scripts' );

function add_menu_link_class( $atts, $item, $args ) {
    if (property_exists($args, 'link_class')) {
      $atts['class'] = $args->link_class;
    }
    return $atts;
  }
  add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );

  function add_menu_list_item_class($classes, $item, $args) {
    if (property_exists($args, 'list_item_class')) {
        $classes[] = $args->list_item_class;
    }
    return $classes;
  }
  add_filter('nav_menu_css_class', 'add_menu_list_item_class', 1, 3);

  function max_nav_items($sorted_menu_items, $args){
    if (property_exists($args, 'li_slice')) {
        $slice = $args->li_slice;
        $items = array();
        foreach($sorted_menu_items as $item){
            if($item->menu_item_parent != 0) continue;
            $items[] = $item;
        }
        $items = array_slice($items, $slice[0], $slice[1]);
        foreach($sorted_menu_items as $key=>$one_item){
            if($one_item->menu_item_parent == 0 && !in_array($one_item,$items)){
                unset($sorted_menu_items[$key]);
            }
        }
    }
    return $sorted_menu_items;
}
add_filter("wp_nav_menu_objects","max_nav_items",10,2);

function console_log ($output, $msg = "log") {
    echo '<script> console.log("'. $msg .'",'. json_encode($output) .')</script>';
};

function get_parent_template () {
    return end(explode('/', get_page_template_slug(wp_get_post_parent_id(get_the_id()))));
}

function getPersoneDiOrgano(array $incarichi, $ordine_alfabetico = '') {
    
    $persone_pubbliche = []; // Array vuoto da riempire...
    
    $slug_incarichi = $incarichi; //es ['sindaco','vice-sindaco','assessore','consigliere'];
    //diversifico la chiamata per avere due output
    // 1) il primo è per ordine di incarico
    // 2) il secondo invece è per ordine alfabetico generale (caso ad esempio
    // della pagina dei politici)
    if($ordine_alfabetico == 'raggruppa'){ 
        // 1 ===========> ordine per come sono stati selezionati gli incarichi
        foreach($slug_incarichi as $slug_incarico){
            $args_incarico = array('post_type' => 'incarico',
                       'name' => $slug_incarico,
                       'post_status' => 'publish',
                       'orderby'   => 'post_title',
                       'order' => 'ASC',
                       'posts_per_page' => -1,
                      );
        
            $query_incarico = new WP_Query( $args_incarico );
            $incarico = $query_incarico->posts;
            $id_incarico = $slug_incarico;//$incarico["0"]->ID;
            //seconda query per ottenere le persone
            $args_persone = array('post_type' => 'persona_pubblica',
                                  'post_status' => 'publish',
                                  'meta_key' => '_dci_persona_pubblica_cognome',
                                  'orderby' => 'meta_value',
                                  'order' => 'ASC',
                                  'posts_per_page' => -1,
                                  'meta_query' => array(
                                      array(
                                          'key' => '_dci_persona_pubblica_incarichi',
                                          'value'   => serialize( strval( $id_incarico ) ),
                                          'compare' => 'LIKE'
                                      ),
                                  ),
                            );
            $query_persone = new WP_Query( $args_persone );
            //aggiungo a elenco array
            foreach ($query_persone->posts as $persona) {
                if (!array_key_exists($persona->ID, $persone_pubbliche)) $persone_pubbliche[$persona->ID] = $persona;
            }
        }
    } else {
        // 2 ===========> ordine alfabetico
        //creo l'array della meta_query
        $valori['relation'] = 'OR';
        foreach($slug_incarichi as $id_incarico){
            $valori[] = [
                'key' => '_dci_persona_pubblica_incarichi',
                'value'   => serialize( strval( $id_incarico ) ),
                'compare' => 'LIKE'
            ];
        }
        $args_persone = array('post_type' => 'persona_pubblica',
                              'post_status' => 'publish',
                              'meta_key' => '_dci_persona_pubblica_cognome',
                              'orderby' => 'meta_value',
                              'order' => 'ASC',
                              'posts_per_page' => -1,
                              'meta_query' => ($valori)
                        );
        $query_persone = new WP_Query( $args_persone );
        //aggiungo a elenco array
        foreach ($query_persone->posts as $persona) {
            if (!array_key_exists($persona->ID, $persone_pubbliche)) $persone_pubbliche[$persona->ID] = $persona;
        }
    };
    return $persone_pubbliche;

}
