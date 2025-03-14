<?php
/*
 * aitech Action Hooks
 * =================
 * Designed to be used by a child theme, but they can also be used directly 
 * in your development of aitech. Example usage:
 *    -- See “Dimox Breadcrumbs Insertion” below.
 *    -- See “Mainbody Widgets 1 Insertion” below.
 */

// Navbar (in `header.php`)

function aitech_navbar_before()
{
    do_action('navbar_before');
}

function aitech_navbar_after()
{
    do_action('navbar_after');
}

function aitech_navbar_brand()
{
    if (!has_action('navbar_brand')) {
        ?>
        <a class="navbar-brand" href="<?php
        echo esc_url(home_url('/')); ?>"><?php
            bloginfo('name'); ?></a>
        <?php
    } else {
        do_action('navbar_brand');
    }
}

function aitech_navbar_search()
{
    if (!has_action('navbar_search')) {
        ?>
        <form class="ms-1 md-flex" role="search" method="get" id="searchform" action="<?php
        echo esc_url(home_url('/')); ?>">
            <div class="input-group">
                <input class="form-control border-secondary" type="text" value="<?php
                echo get_search_query(); ?>" placeholder="Search..." name="s" id="s">
                <button type="submit" id="searchsubmit" value="<?php
                esc_attr_x('Search', 'aitech') ?>" class="btn btn-outline-secondary">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </form>
        <?php
    } else {
        do_action('navbar_search');
    }
}

// Mainbody

function aitech_mainbody_before()
{
    do_action('mainbody_before');
}

function aitech_mainbody_after()
{
    do_action('mainbody_after');
}

function aitech_mainbody_start()
{
    do_action('mainbody_start');
}

function aitech_mainbody_end()
{
    do_action('mainbody_end');
}

/*
 * Dimox Breadcrumbs Insertion
 * ===========================
 * An example for how to insert something via an action hook -- 
 * but inserting it only on single posts, using `is_single()`.
 */

function aitech_dimox_single_post()
{
    if (is_single()) { ?>
        <?php
        if (function_exists('dimox_breadcrumbs')) { ?>
            <?php
            dimox_breadcrumbs(); ?>
        <?php
        } ?>
    <?php
    }
}

add_action('mainbody_before', 'aitech_dimox_single_post');

/*
 * Mainbody Widgets 1 Insertion
 * ============================
 * An example for how to insert something via an action hook -- 
 * this will appear on every page (if you have widgets in this area).
 */

function aitech_mainbody_widgets_1()
{
    if (is_active_sidebar('mainbody-widget-area-1')): ?>
        <section class="container-xxl my-5">
            <div class="row">
                <?php
                dynamic_sidebar('mainbody-widget-area-1'); ?>
            </div>
        </section>
    <?php
    endif;
}

add_action('mainbody_end', 'aitech_mainbody_widgets_1');

// Footer (in `footer.php`)

function aitech_footer_before()
{
    do_action('footer_before');
}

function aitech_footer_after()
{
    do_action('footer_after');
}

function aitech_bottomline()
{
    if (!has_action('bottomline')) {
        ?>
        <div class="container-xxl">
            <div class="row pt-3">
                <div class="col-sm">
                    <p class="text-center text-sm-start">&copy; <?php
                        echo date('Y'); ?> <a href="<?php
                        echo home_url('/'); ?>"><?php
                            bloginfo('name'); ?></a></p>
                </div>
                <div class="col-sm">
                    <p class="text-center text-sm-end"><a href="https://github.com/zenithcoder/aitech">aitech</a> theme
                        for WordPress</p>
                </div>
            </div>
        </div>
        <?php
    } else {
        do_action('bottomline');
    }
}
