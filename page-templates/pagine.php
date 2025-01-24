<?php
/* Template Name: Pagine
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
        <?php
        while ( have_posts() ) :
            the_post();
            $description = dci_get_meta('descrizione','_dci_page_',$post->ID);
            ?>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-10">
                        <?php get_template_part("template-parts/common/breadcrumb"); ?>
                        <div class="cmp-hero">
                            <section class="it-hero-wrapper bg-white align-items-start">
                                <div class="it-hero-text-wrapper pt-0 ps-0 pb-4 pb-lg-60">
                                    <h1 class="text-black title-xxxlarge mb-2" data-element="page-name">
                                        <?php the_title()?>
                                    </h1>
                                    <p class="text-black titillium text-paragraph">
                                        <?php echo $description; ?>
                                    </p>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
                
                <div class="container ">
                    
                    <article class="article-wrapper">

                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-10">

                                <!--start card-->
                                <div class="card-wrapper card-space d-flex justify-content-center">
                                    <div class="card card-bg card-big border-bottom-card mx-auto">
                                        <div class="flag-icon"></div>
                                        <div class="etichetta"></div>
                                        <div class="card-body">
                                            <?php
                                            the_content();
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-->

                                <div class="row variable-gutters">
                                    <div class="col-lg-12">
                                        <?php
                                        if ( comments_open() || get_comments_number() ) :
                                            comments_template();
                                        endif;
                                        ?>
                                    </div>
                                </div>
                                <div class="row variable-gutters">
                                    <div class="col-lg-12">
                                        <?php get_template_part( "template-parts/single/bottom" ); ?>
                                    </div><!-- /col-lg-9 -->
                                </div><!-- /row -->

                            </div>
                        </div>
                    </article>
                </div>
            </div>
            <br>
            <br>
        <?php
        endwhile; // End of the loop.
        ?>
    </main>
<?php
get_footer();
