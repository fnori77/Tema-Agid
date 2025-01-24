<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
.circle-container {
    width: 300px;
    height: 300px;
    overflow: hidden;
    border-radius: 50%;
    position: relative;
    margin: 0 auto; /* Centra orizzontalmente */
}

.circle-container img {
    width: 100%; /* Adatta l'immagine alla larghezza del contenitore */
    height: 100%; /* Adatta l'immagine all'altezza del contenitore */
    object-fit: cover; /* Mantiene l'immagine centrata e riempie il contenitore senza distorcerla */
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%); /* Centra l'immagine */
    border: 5px solid #0073b3; /* Bordo dell'immagine */
}

/* Regole specifiche per mobile */
@media (max-width: 768px) {
    .circle-container {
        width: 290px; /* Riduci la dimensione del contenitore per mobile */
        height: 300px;
        
    }

    .circle-container img {
        width: 100% !important; /* Mantiene le proporzioni al 100% del contenitore */
        height: 100% !important; /* Mantiene le proporzioni al 100% del contenitore */
        object-fit: cover; /* Mantiene l'immagine centrata e riempie il contenitore senza distorcerla */
        border: 5px solid #0073b3 !important; /* Mantiene il bordo anche sui dispositivi mobili */
    }
}

/* Regole per schermi più grandi */
/* Regole generali per tutte le dimensioni */
.figure.img-full img {
    height: 100px !important; /* Dimensione per dispositivi mobili */
}

/* Media query per schermi più grandi */
@media (min-width: 992px) {
    .figure.img-full img {
        height: 200px !important; /* Dimensione per schermi più grandi */
    }
}


</style>
<?php
/**
 * Servizio template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Design_Comuni_Italia
 * Developer : Campanile Domenico Giacomo (dcampanile@nextimelabs.com)
 */
global $post;
$img_url = dci_get_meta('foto');
$img = get_post(attachment_url_to_postid($img_url));
$image_alt = get_post_meta($img->ID, '_wp_attachment_image_alt', true);

if ($img_url) {
?>

<div class="container-fluid my-3">
    <div class="row">
        <figure class="figure px-0 img-full">
            <div class="circle-container">
                <img
                    src="<?php echo $img_url; ?>"
                    class="figure-img img-fluid rounded-circle"
                    alt="<?php echo $image_alt; ?>"
                />
            </div>
            <?php if ($img->post_excerpt) {?>
            <figcaption class="figure-caption text-center pt-6">
                <?php echo $img->post_excerpt; ?>
            </figcaption>
            <?php } ?>
        </figure>
    </div>
</div>

<?php } ?>
