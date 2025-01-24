<?php
/**
 * The template for displaying archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#archive
 *
 * @package Design_Comuni_Italia
 */

$class = "petrol";

get_header();
?>

    <main id="main-container" class="main-container <?php echo $class; ?>">
	

        <section class="section bg-white py-2 py-lg-3 py-xl-5">
            <div class="container">
                <div class="row variable-gutters">
						<?php get_template_part("template-parts/common/breadcrumb"); ?>
                    <div class="col-lg-10 col-md-8 offset-lg-1">
                        <div class="section-title">
							<?php the_archive_title( '<h2 class="mb-0">', '</h2>' ); ?>
							<?php the_archive_description("<p>","</p>"); ?>
                        </div><!-- /title-section -->
                    </div><!-- /col-lg-5 col-md-8 offset-lg-2 -->

                    
                </div><!-- /row -->
            </div><!-- /container -->
        </section><!-- /section -->



        <section class="bg-white border-top border-bottom d-block d-lg-none">
         
        </section>
        <section class="bg-gray-light"  style="padding:30px;">
            <div class="container">
                <div class="row variable-gutters sticky-sidebar-container">
                 
                    <div class="col-lg-7 offset-lg-1 pt84">
						<?php if ( have_posts() ) : ?>
							<?php
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();
								get_template_part( 'template-parts/list/article', get_post_type() );

							endwhile;
							?>
                            <nav class="pagination-wrapper justify-content-center col-12">
								<?php echo dci_bootstrap_pagination(); ?>
                            </nav>
						<?php
						else :

							get_template_part( 'template-parts/content', 'none' );

						endif;
						?>
                    </div><!-- /col-lg-8 -->
                </div><!-- /row -->
            </div><!-- /container -->
        </section>
    </main>

<?php
get_footer();
