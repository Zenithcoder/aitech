<?php

/*
 * Bootstrap Navbar Walker_Nav_menu
 */

class aitech_walker_nav_menu extends Walker_Nav_Menu
{

    // Start the level (for submenus)
    function start_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth); // Indent the HTML
        $output .= "\n$indent<div class=\"dropdown-menu bg-light mt-2\">\n"; // Bootstrap dropdown menu
    }

    // End the level (for submenus)
    function end_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</div>\n";
    }

    // Start the element (for each menu item)
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        // Add classes to the <li> element
        $li_classes = array('nav-item');
        if ($args->walker->has_children) {
            $li_classes[] = 'dropdown';
        }
        if ($item->current || $item->current_item_ancestor) {
            $li_classes[] = 'active';
        }
        $li_class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($li_classes), $item, $args));
        $li_class_names = ' class="' . esc_attr($li_class_names) . '"';

        // Add ID to the <li> element
        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

        // Start the <li> element
        $output .= $indent . '<li' . $id . $li_class_names . '>';

        // Add attributes to the <a> element
        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

        // Add classes to the <a> element
        $a_classes = array('nav-link');
        if ($args->walker->has_children) {
            $a_classes[] = 'dropdown-toggle';
            $attributes .= ' data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"';
        }
        if ($depth > 0) {
            $a_classes[] = 'dropdown-item';
        }
        $a_class_names = join(' ', $a_classes);
        $attributes .= ' class="' . esc_attr($a_class_names) . '"';

        // Build the <a> element
        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        // Append the <a> element to the output
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    // End the element (for each menu item)
    function end_el(&$output, $item, $depth = 0, $args = array())
    {
        $output .= "</li>\n";
    }
}

/*
 * Register Navbar
 */

register_nav_menu('navbar', __('Navbar', 'aitech'));
