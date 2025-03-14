<?php
/*
 * Split Post Pagination
 */

add_filter('wp_link_pages', 'aitech_split_post_pagination');

function aitech_split_post_pagination($args)
{
    global $post;
    $postbase = trailingslashit(get_site_url(null, $post->post_name));
    $args = trim(str_replace(array('<p class="post-nav-links">Pages: ', '</p>'), '', $args));

    if (empty($args)) {
        return '';
    }

    $defaults = array(
        'before' => '<nav aria-label="Page navigation"><ul class="pagination mt-5">',
        'after' => '</ul></nav>',
        'text_before' => '',
        'text_after' => '',
        'link_class' => 'page-link',
        'next_or_number' => 'number',
        'pagelink' => '%',
        'echo' => 1
    );
    $r = wp_parse_args($args, $defaults);
    $r = apply_filters('wp_link_pages_args', $r);
    extract($r, EXTR_SKIP);
    global $page, $numpages, $multipage, $more, $pagenow;
    $output = '';
    if ($multipage) {
        if ('number' == $next_or_number) {
            $output .= $before;

            // Page status
            $output .= '<li class="page-item disabled"><a class="page-link">Page ' . $page . ' of ' . $numpages . '</a></li>';

            // Page numbering
            for ($i = 1; $i < ($numpages + 1); $i = $i + 1) {
                $j = str_replace('%', $i, $pagelink);
                $output .= ' ';
                if ($i != $page || ((!$more) && ($page == 1))) {
                    $output .= '<li class="page-item"><a class="page-link" href="' . get_post_page_url($i) . '">';
                } else {
                    $output .= '<li class="page-item active"><a class="page-link" href="#">';
                }
                $output .= $text_before . $j . $text_after;
                if ($i != $page || ((!$more) && ($page == 1))) {
                    $output .= '</li></a>';
                } else {
                    $output .= '</li></a>';
                }
            }

            // Finalize
            $output .= $after;
        }
    }
    return $output;
}

// Extract link from string
function get_post_page_url($i)
{
    if (preg_match('/href="([^"]+)"/', _wp_link_page($i), $match)) {
        return $match[1];
    }
}
