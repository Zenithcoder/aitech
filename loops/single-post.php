<?php
/*
 * The Single Post
 */

?>

<?php
if (have_posts()): while (have_posts()): the_post(); ?>
    <div class="container-fluid pt-5 bg-primary hero-header mb-5" id="post_<?php
    the_ID() ?>">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                    <div class="btn btn-sm border rounded-pill text-white px-3 mb-3 animated slideInRight"> <?php
                        the_title() ?></div>
                    <h1 class="display-4 text-white mb-4 animated slideInRight"><?php
                        the_title() ?></h1>
                    <p class="text-white mb-4 animated slideInRight"><?php
                        the_content() ?></p>
                    <a href="" class="btn btn-light py-sm-3 px-sm-5 rounded-pill me-3 animated slideInRight"><?php
                        //wp_link_pages(); ?></a>
                </div>
                <div class="col-lg-6 align-self-end text-center text-lg-end">
                    <img class="img-fluid" src="<?php
                    echo get_template_directory_uri(); ?>/img/hero-img.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->

    <article role="article" id="post_<?php
    the_ID() ?>" <?php
    post_class("entry-content") ?>>
        <header class="wrap-lg my-5 entry-header">
            <div class="index-post-category mb-5 text-center text-muted">
                <i class="bi bi-bookmark"></i>
                <span class="text-uppercase"><?php
                    the_category(', '); ?></span>
            </div>
            <h1 class="display-1 text-center fw-bolder"><?php
                the_title() ?></h1>
            <div class="header-metas d-flex justify-content-center align-items-center my-5 text-muted">

                <div class="pe-3 d-flex align-items-center">
                    <?php
                    # <i class="bi bi-person-circle"></i> ?>
                    <div class="me-1 border rounded-circle overflow-hidden">
                        <?php
                        //aitech_author_avatar(); ?>
                    </div>
                    <?php
                    _e('By', 'aitech');
                    echo '&nbsp;';
                    the_author_posts_link(); ?>
                </div>

                <div class="pe-3">
                    <i class="bi bi-calendar3"></i>
                    <?php
                    //aitech_post_date(); ?>
                </div>

                <div>
                    <i class="bi bi-chat-text"></i>
                    <a href="#post-comments"><?php
                        $comment_count = get_comments_number();
                        printf(
                        /* translators: 1: comment count number. */
                            esc_html(_nx('%1$s comment', '%1$s comments', $comment_count, 'aitech')),
                            number_format_i18n($comment_count)
                        );
                        ?></a>
                </div>
            </div>
        </header>
        <section class="container-xxl pb-6">
            <?php
            the_post_thumbnail(); ?>
        </section>

        <?php
        wp_link_pages(); ?>

        <section class="wrap-md my-5 long-read">
            <?php
            the_content(); ?>
        </section>

        <?php
        wp_link_pages(); ?>
    </article>

    <?php
    if (has_tag()) { ?>
        <div class="wrap-md footer-metas my-5 text-muted">
            <i class="bi bi-tag"></i>
            <?php
            the_tags('Tagged: ', ', '); ?>
        </div>
    <?php
    } ?>

    <section class="wrap-md author-bio d-flex border-top border-bottom py-5">
        <div class="border rounded-circle overflow-hidden">
            <?php
            //aitech_author_bio_avatar(); ?>
        </div>
        <div class="ms-3">
            <p class="h4 author-name"><?php
                _e('Author: ', 'aitech');
                the_author(); ?></p>
            <?php
            if (true) {
                ?>
                <div class="author-description"><?php
                    echo 'AB' ?></div>
                <?php
            } ?>
            <p class="author-other-posts mb-0"><?php
                _e('Other posts by ', 'aitech');
                the_author_posts_link(); ?></p>
        </div>
    </section><!-- /.author-bio -->

    <?php
    // This continues in the single post loop
    if (comments_open() || get_comments_number()) :

        //comments_template();
        comments_template('/loops/single-post-comments.php');

    endif;
    ?>

    <section class="container-xxl my-5">
        <div class="row g-2">
            <?php
            if (get_previous_post()) { ?>
                <div class="col-sm">
                    <div class="border rounded bg-light d-flex align-items-center">
                        <i class="bi bi-chevron-compact-left fs-1"></i>
                        <div>
                            Previous post<br>
                            <?php
                            previous_post_link('%link', '%title') ?>
                        </div>
                    </div>
                </div>
            <?php
            } ?>

            <?php
            if (get_next_post()) { ?>
                <div class="col-sm">
                    <div class="border rounded bg-light d-flex flex-row-reverse align-items-center">
                        <i class="bi bi-chevron-compact-right fs-1"></i>
                        <div class="text-end">
                            Next Post<br>
                            <?php
                            next_post_link('%link', '%title') ?>
                        </div>
                    </div>
                </div>
            <?php
            } ?>

            <?php
            /*
            <div class="col text-start">
              <?php previous_post_link('%link', '<i class="bi bi-arrow-left"></i> Previous post: '.'%title'); ?>
            </div>
            <div class="col text-end">
              <?php next_post_link('%link', 'Next post: '.'%title'.' <i class="bi bi-arrow-right"></i>'); ?>
            </div>
            */
            ?>
        </div>
    </section>

<?php
endwhile;
else :
    get_template_part('loops/404');
endif;
?>


