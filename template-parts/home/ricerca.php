<?php
    $links = dci_get_option('link','link_utili');
?>

<section id="novita" class="useful-links-section">
    <div class="section section-muted p-0 py-5">
        <div class="container">
            <div class="row">
                <div class="col col-sm-12 offset-sm-1 col-md-12 offset-md-0 px-0">
                <form role="search" id="search-form" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <div class="cmp-input-search">
                        <div class="form-group autocomplete-wrapper mb-2 mb-lg-4">
                            <div class="input-group">
                                <label for="autocomplete-three" class="visually-hidden">Cerca una parola chiave</label>
                                <input type="search" class="autocomplete form-control" placeholder="Cerca una parola chiave" id="autocomplete-three" name="s" value="<?php echo get_search_query(); ?>" data-bs-autocomplete="[]">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit" id="button-3">Invio</button>
                                </div>
                                <span class="autocomplete-icon" aria-hidden="true">
                                    <svg class="icon icon-sm icon-primary"><use href="#it-search"></use></svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>
                <?php if ($links) { ?>
                <div class="link-list-wrapper">
                    <div
                    class="link-list-heading text-uppercase mt-2 mt-lg-4 mb-3 ps-0"
                    >
                    Link utili
                    </div>
                  
                        <?php foreach ($links as $link) { ?>
                        
                            <button class="btn btn-primary btn-icon btn-me" style="margin-bottom: 20px; padding:12px;">
  <span>      <a  href="<?php echo $link['url']; ?>" style="color:#fff;"></style><?php echo $link['testo']; ?></span>
</button>

                                </span>
                                </a>
                                
                        <?php } ?>
                 
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
