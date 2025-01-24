<?php
global $persona_id;

$persona = get_post($persona_id);
$prefix = '_dci_persona_pubblica_';
$incarichi_id = dci_get_meta('incarichi', $prefix, $persona_id);

?>

<div class="card no-after card-bg card-vertical-thumb bg-white  h-100">
    <div class="row g-0">
        <div class="col-md-12">
            <div class="card-body">
                <h4 class="titillium title-large-semi-bold" style="font-size:22px;">
                    <a class="text-decoration-none" href="<?php echo get_permalink($persona); ?>"><?php echo get_the_title($persona); ?></a>
                </h4>
				<?php if ($incarichi_id) {
					foreach ($incarichi_id as $inc_id) {
						echo get_the_title($inc_id) . ' - ';
					}
				} ?>
            </div>
        </div>
       
    </div>
</div>