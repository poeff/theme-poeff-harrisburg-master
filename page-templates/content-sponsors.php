<?php
/**
 * Template Name: Page - Sponsors
 */
 get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
<!--                
                < ?php if(function_exists('upbootwp_breadcrumbs')) upbootwp_breadcrumbs(); ?>
-->
                <header class="entry-header page-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header><!-- .entry-header -->
                
                <div class="entry-content">
                    <?php 
                    $groups = get_field('sponsor_group');
                    foreach ($groups as $group) {
                        $level   = $group['sponsor_level']; 
                        $desktop = $group['columns_desktop'];
                        $mobile  = $group['columns_mobile'];

                        if( $level->count > 0 ) {
                            echo do_shortcode( '[sponsors level="'.$level->name.'" columns="'.$desktop.'" mobile="'.$mobile.'"]' );
                            echo '<hr>';
                        }
                    }
                    the_content();
                    ?>
                    <?php endwhile; // end of the loop. ?>
                    <?php
                        wp_link_pages(array(
                            'before' => '<div class="page-links">'.__('Pages:', 'upbootwp'),
                            'after'  => '</div>',
                        ));
                    ?>
                </div><!-- .entry-content -->

                <!-- ?php edit_post_link( __( 'Edit', 'upbootwp' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ? -->
    
            </div><!-- .col-md-12 -->
        </div><!-- .row -->
    </div><!-- .container -->
<?php get_footer(); ?>