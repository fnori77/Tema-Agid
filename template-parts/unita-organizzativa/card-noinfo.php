<?php
    global $uo_id, $with_border;
    $ufficio = get_post( $uo_id );

    $prefix = '_dci_unita_organizzativa_';
    $competenze = dci_get_meta('competenze', $prefix, $uo_id);

    $img = dci_get_meta('immagine', $prefix, $uo_id);
    $contatti = dci_get_meta('contatti', $prefix, $uo_id);

    $prefix = '_dci_punto_contatto_';
    $indirizzi = array();
    foreach ($contatti ?? null as $punto_contatto_id) {
        $voci = dci_get_meta('voci', $prefix, $punto_contatto_id);
        foreach ($voci as $voce) {
            if ($voce[$prefix.'tipo_punto_contatto'] == 'indirizzo')
                array_push($indirizzi, $voce[$prefix.'valore']);
        }
    }
    
    if($with_border) {
?>

<div class="card card-teaser card-teaser-info rounded shadow-sm p-3 m-1" style="width: fit-content;">
    <div class="card-body pe-3">
        <h6 class="mb-3 titillium">
            <a class="text-decoration-none" href="<?php echo get_permalink($ufficio->ID); ?>" data-element="service-area">
            <?php echo $ufficio->post_title; ?>
            </a>
        </h6>
        
    <?php if ($img) { ?>
    <div class="avatar size-xl">
        <?php dci_get_img($img); ?>
    </div>
    <?php } ?>
</div>
<?php } 
$with_border = false;
?>