<?php

get_header();
?>

    <main id="primary" class="site-main">
        <header class="page-header">
            <h1 class="page-title"><?php
                echo get_the_title(get_option('page_for_posts')); ?></h1>
        </header>

        <?php
        if (have_posts()) :
            echo '<div class="post-grid">';
            while (have_posts()) :
                the_post();
                ?>
                <article id="post-<?php
                the_ID(); ?>" <?php
                post_class(); ?>>
                    <header class="entry-header">
                        <?php
                        the_title(
                            '<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '">',
                            '</a></h2>'
                        ); ?>
                        <div class="entry-meta">
                            <?php
                            the_date(); ?> | <?php
                            the_author(); ?>
                        </div>
                    </header>

                    <div class="entry-content">
                        <?php
                        the_excerpt(); ?>
                    </div>
                </article>
            <?php
            endwhile;
            echo '</div>';

            // Pagination
            the_posts_pagination();
        else :
            get_template_part('template-parts/content', 'none');
        endif;
        ?>
    </main>

<?php
//get_sidebar();
get_footer();
?>