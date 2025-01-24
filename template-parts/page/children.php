<?php
//creo i box delle sottopagine

if(has_children()){
    ?>
    <section id='<?php echo strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', get_the_title())));?>'>
        <div class="container py-5 bg-grey-card">
            <div class="row g-4">
            <?php
            $args = array(
                'post_parent' => $post->ID,
                'post_type' => 'page',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC'
            );
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) {
                while ($the_query->have_posts()) {
                    $the_query->the_post();
                    $descrizione = dci_get_meta("descrizione", "_dci_page_", get_the_ID());
                    ?>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="cmp-card-simple card-wrapper pb-0 rounded border border-light">
                        <div class="card shadow-sm rounded">
                            <div class="card-body">
                            <a class="text-decoration-none" href="<?php the_permalink() ?>"
                                data-element="management-category-link"
                            >
                                <h3 class="card-title t-primary title-xlarge"><?php the_title() ?></h3>
                            </a>
                            <p class="titillium text-paragraph mb-0">
                                <?php echo $descrizione; ?>
                            </p>
                            </div>
                        </div>
                        </div>
                    </div>
                    <?php
                }
            }
            wp_reset_postdata();
            ?>
            </div>
        </div>
    </section>
<?php
}
?>