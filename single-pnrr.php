<?php
/* Template Name: PNRR
*
 * Generic Page Template
 *
 * @package Design_Comuni_Italia
 */
global $post;
get_header();

?>
    <main>
        <style>
            @media (min-width: 992px){
                .row.variable-gutters {
                    margin-right: -12px;
                    margin-left: 80px;
                }
            }
        </style>
        
        <div class="container-fluid px-0 position-relative">
    <!-- Div per l'immagine di sfondo a tutta larghezza -->
    <div class="background-image-wrapper"></div>

    <!-- Inizio contenuto sovrapposto -->
    <div class="container content-overlay">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 px-0 px-lg-2 drop-shadow" style="background-color:#fff;">
                <div class="it-hero-card it-hero-bottom-overlapping rounded hero-p pb-lg-80">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-10">
                            <div class="row sport-wrapper justify-content-between mt-lg-2">
                                <div class="col-12 col-lg-5">
                                <?php get_template_part("template-parts/common/breadcrumb"); ?>
                                    <h1 class="mb-3 mb-lg-4 title-xxlarge">
                                        
                                        <?php echo $post->post_title; ?>
                                    </h1>
                                    <h2 class="visually-hidden" id="news-details">Dettagli dell'argomento</h2>
                                    <p class="u-main-black text-paragraph-regular-medium mb-60">
                                        <?php echo ('Scopri tutti i progetti finanziati dal Piano Nazionale di Ripresa e Resilienza con i fondi europei Next Generation EU.'); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fine contenuto sovrapposto -->
</div>

<style>
@media (min-width: 992px) {
    .col-lg-5 {
        flex: 0 0 auto;
        width: 61.666667%;
    }
}

/* Stile per l'immagine di sfondo a tutta larghezza */
.background-image-wrapper {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 320px;
    background-image: url('https://demo.we-com.info/sutri/wp-content/uploads/2024/09/sutri.jpg'); /* Inserisci il percorso dell'immagine */
    background-size: cover;
    background-position: center;
    z-index: 1; /* Posiziona l'immagine dietro il contenuto */
}

/* Sovrapposizione del contenuto in modalità desktop */
.content-overlay {
    position: relative;
    z-index: 2; /* Contenuto sopra l'immagine */
    margin-top: 10px; /* Sovrapposizione sull'immagine */
}

/* Modalità mobile: immagine sopra e contenuto sotto */
@media (max-width: 992px) {
    .background-image-wrapper {
        height: 150px; /* Altezza ridotta per mobile */
    }

    .content-overlay {
        margin-top: 0; /* Rimuovi margine per mobile */
        padding-top: 170px; /* Sposta il contenuto sotto l'immagine */
    }
}

.sezione-m {
    width: 150% !important;
}

@media (max-width: 768px) {
    .sezione-m {
    width: 100% !important;
}
}

/* Layout principale con immagine a destra */
.content-with-image {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: flex-start;
}

/* Stile per il contenuto di testo */
.text-content {
    flex: 1; /* Testo prende più spazio possibile */
    padding-right: 20px; /* Padding a destra per desktop */
}

/* Modifiche per l'immagine */
.image-content {
    flex: 0 0 300px; /* L'immagine ha larghezza fissa */
    display: flex;
    justify-content: center; /* Centra l'immagine */
}

/* Stile per l'immagine */
.image-content img {
    width: auto; /* Larghezza automatica per mantenere le proporzioni */
    max-width: 100%; /* Limita la larghezza massima */
    height: auto; /* Mantiene l'altezza automatica per mantenere le proporzioni */
    max-height: 90px; /* Limita l'altezza massima per evitare il stretching */
}

/* Layout per dispositivi mobili */
@media (max-width: 768px) {
    .content-with-image {
        flex-direction: column; /* Disposizione a colonna per mobile */
    }

    .image-content {
        margin-bottom: 20px; /* Spazio sotto l'immagine */
        flex: 1 0 100%; /* Occupare tutta la larghezza */
        order: -1; /* Posiziona l'immagine sopra il testo */
        justify-content: center; /* Centra l'immagine orizzontalmente */
    }

    .text-content {
        padding-right: 0; /* Rimuovi padding laterale su mobile */
        flex: 1 0 100%; /* Occupare tutta la larghezza */
    }
}
</style>



        
<?php
while ( have_posts() ) :
    the_post();
    $description = dci_get_meta('descrizione','_dci_page_',$post->ID);
    ?>
    <div class="container">
        <div class="row justify-content-center">
        </div>
        
        <div class="container ">
            <article class="article-wrapper">
                <div class="row justify-content-center" style="margin-top: 30px;">
                    <div class="col-12 col-lg-10">
                        <!--start card-->
                        <div class="card-wrapper card-space d-flex justify-content-center">
                            <div class="card card-big border-bottom-card mx-auto">
                                <div class="card-body">
                                    <div class="content-with-image">
                                        <!-- Contenuto di testo -->
                                        <div class="text-content">
                                            <?php
                                            the_content();

                                            // Sezione M1
                                            $elementi_m1 = get_post_meta( get_the_ID(), '_elementi_m1', true );
                                            $elementi_m1 = !empty( $elementi_m1 ) ? json_decode( $elementi_m1, true ) : array();
                                            if ( !empty( $elementi_m1 ) ) {
                                                echo '<div class="sezione-m">';
                                                echo '<h2>Digitalizzazione, innovazione, competitività, cultura e turismo (M1)</h2>';
                                                foreach ( $elementi_m1 as $elemento ) {
                                                    echo '<p><a href="' . esc_url( $elemento['url'] ) . '" style="color: #0059b3; font-weight: bold;">' . esc_html( $elemento['bold_text'] ) . '</a></p>';
                                                    echo '<p>' . esc_html( $elemento['subtitle'] ) . '</p>';
                                                    echo '<hr>';
                                                }
                                                echo '</div>';
                                            }

                                            // Sezione M2
                                            $elementi_m2 = get_post_meta( get_the_ID(), '_elementi_m2', true );
                                            $elementi_m2 = !empty( $elementi_m2 ) ? json_decode( $elementi_m2, true ) : array();
                                            if ( !empty( $elementi_m2 ) ) {
                                                echo '<div class="sezione-m">';
                                                echo '<h2>Rivoluzione verde e transizione ecologica (M2)</h2>';
                                                foreach ( $elementi_m2 as $elemento ) {
                                                    echo '<p><a href="' . esc_url( $elemento['url'] ) . '" style="color: #0059b3; font-weight: bold;">' . esc_html( $elemento['bold_text'] ) . '</a></p>';
                                                    echo '<p>' . esc_html( $elemento['subtitle'] ) . '</p>';
                                                    echo '<hr>';
                                                }
                                                echo '</div>';
                                            }

                                            // Sezione M3
                                            $elementi_m3 = get_post_meta( get_the_ID(), '_elementi_m3', true );
                                            $elementi_m3 = !empty( $elementi_m3 ) ? json_decode( $elementi_m3, true ) : array();
                                            if ( !empty( $elementi_m3 ) ) {
                                                echo '<div class="sezione-m">';
                                                echo '<h2>Infrastrutture per una mobilità sostenibile (M3)</h2>';
                                                foreach ( $elementi_m3 as $elemento ) {
                                                    echo '<p><a href="' . esc_url( $elemento['url'] ) . '" style="color: #0059b3; font-weight: bold;">' . esc_html( $elemento['bold_text'] ) . '</a></p>';
                                                    echo '<p>' . esc_html( $elemento['subtitle'] ) . '</p>';
                                                    echo '<hr>';
                                                }
                                                echo '</div>';
                                            }

                                            // Sezione M4
                                            $elementi_m4 = get_post_meta( get_the_ID(), '_elementi_m4', true );
                                            $elementi_m4 = !empty( $elementi_m4 ) ? json_decode( $elementi_m4, true ) : array();
                                            if ( !empty( $elementi_m4 ) ) {
                                                echo '<div class="sezione-m">';
                                                echo '<h2>Istruzione e ricerca (M4)</h2>';
                                                foreach ( $elementi_m4 as $elemento ) {
                                                    echo '<p><a href="' . esc_url( $elemento['url'] ) . '" style="color: #0059b3; font-weight: bold;">' . esc_html( $elemento['bold_text'] ) . '</a></p>';
                                                    echo '<p>' . esc_html( $elemento['subtitle'] ) . '</p>';
                                                    echo '<hr>';
                                                }
                                                echo '</div>';
                                            }

                                            // Sezione M5
                                            $elementi_m5 = get_post_meta( get_the_ID(), '_elementi_m5', true );
                                            $elementi_m5 = !empty( $elementi_m5 ) ? json_decode( $elementi_m5, true ) : array();
                                            if ( !empty( $elementi_m5 ) ) {
                                                echo '<div class="sezione-m">';
                                                echo '<h2>Inclusione e coesione (M5)</h2>';
                                                foreach ( $elementi_m5 as $elemento ) {
                                                    echo '<p><a href="' . esc_url( $elemento['url'] ) . '" style="color: #0059b3; font-weight: bold;">' . esc_html( $elemento['bold_text'] ) . '</a></p>';
                                                    echo '<p>' . esc_html( $elemento['subtitle'] ) . '</p>';
                                                    echo '<hr>';
                                                }
                                                echo '</div>';
                                            }

                                                  // Sezione M6
                                                  $elementi_m6 = get_post_meta( get_the_ID(), '_elementi_m6', true );
                                                  $elementi_m6 = !empty( $elementi_m6 ) ? json_decode( $elementi_m6, true ) : array();
                                                  if ( !empty( $elementi_m6 ) ) {
                                                      echo '<div class="sezione-m">';
                                                      echo '<h2>Salute (M6)</h2>';
                                                      foreach ( $elementi_m6 as $elemento ) {
                                                          echo '<p><a href="' . esc_url( $elemento['url'] ) . '" style="color: #0059b3; font-weight: bold;">' . esc_html( $elemento['bold_text'] ) . '</a></p>';
                                                          echo '<p>' . esc_html( $elemento['subtitle'] ) . '</p>';
                                                          echo '<hr>';
                                                      }
                                                      echo '</div>';
                                                  }
                                            ?>
                                        </div>

                                        <!-- Logo EU -->
                                        <div class="image-content">
                                            <img src="https://demo.we-com.info/basesito/wp-content/uploads/2024/10/eu.png" alt="Logo EU" class="img-fluid">
                                        </div>
                                    </div>
                                    <!--end card-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
<?php endwhile; ?>

    </main>
<?php
get_footer();
