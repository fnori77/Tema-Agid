<?php
global $persona_id;

$persona = get_post($persona_id);
$prefix = '_dci_persona_pubblica_';
$imgurl = get_post_meta($persona->ID, '_dci_persona_pubblica_foto', true);
$incarichi_id = dci_get_meta('incarichi', $prefix, $persona_id);
?>

<div class="card no-after card-bg card-vertical-thumb bg-white  h-100">
    <div class="row g-0">
        <div class="col-md-12">
            <div class="card-body">
                <h6 class="titillium">
                    <a class="text-decoration-none" href="<?php echo get_permalink($persona); ?>"><?php echo get_the_title($persona); ?></a>
                </h6>
			
            </div>
        </div>
     
    </div>
</div>