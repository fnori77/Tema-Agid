<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>

<?php
global $gallery;
?>
<div class="it-carousel-wrapper it-carousel-landscape-abstract-three-cols splide" data-bs-carousel-splide>
    <div class="it-header-block">
        <div class="it-header-block-title">
            <h3 class="h4">Galleria multimediale</h3>
        </div>
    </div>
    <div class="splide__track">
        <ul class="splide__list it-carousel-all">
        <?php
            foreach ($gallery as $ida => $urlg){
                $attach = get_post($ida);
                $imageatt = wp_get_attachment_image_src($ida, "item-gallery");

                // Verifica l'estensione del file
                $file_extension = pathinfo($urlg, PATHINFO_EXTENSION);

                // Se l'estensione è .mp4, usa l'immagine audio.jpg come thumbnail
                if (strtolower($file_extension) == 'mp4') {
                    $thumb_url = get_home_url() . '/wp-content/uploads/2024/08/audio.jpg';
                    $data_type = "video";
                } else {
                    $thumb_url = $urlg; // Usa l'URL dell'immagine se non è un video
                    $data_type = "image";
                }
                ?>
                <li class="splide__slide">
                    <div class="it-single-slide-wrapper">
                        <figure>
                            <!-- Rimuovo fancybox per ora -->
                            <a href="<?php echo $urlg; ?>" class="fancybox-trigger" data-type="<?php echo $data_type; ?>" >
                                <img src="<?php echo $thumb_url; ?>"  class="img-fluid">
                            </a>
                        </figure>
                    </div>
                </li>
        <?php } ?>
        </ul>
    </div>
</div>

<!-- Inizializzazione esplicita di Fancybox su click -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Seleziona tutti i trigger Fancybox
        const fancyboxTriggers = document.querySelectorAll('.fancybox-trigger');
        
        // Aggiungi l'evento click per inizializzare Fancybox al click, una sola volta
        fancyboxTriggers.forEach(function(trigger) {
            trigger.addEventListener('click', function(event) {
                event.preventDefault();
                
                Fancybox.show([{
                    src: this.href,
                    type: this.getAttribute('data-type'),
                    caption: this.getAttribute('data-caption')
                }]);
            });
        });
    });
</script>
