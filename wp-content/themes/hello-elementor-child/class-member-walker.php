<?php
class Member_Nav_Walker extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = [], $id = 0) {
        $icon_html = '';

        // Font Awesome icons based on class
        if (in_array('icon-learn', $item->classes)) {
            $icon_html = '<i class="fa-solid fa-graduation-cap"></i>';
        } elseif (in_array('icon-algos', $item->classes)) {
            $icon_html = '<i class="fa-solid fa-chart-line"></i>';
        } elseif (in_array('icon-portfolio', $item->classes)) {
            $icon_html = '';
        } elseif (in_array('icon-charts', $item->classes)) {
            $icon_html = '<i class="fa fa-bar-chart" aria-hidden="true"></i>';
        } elseif (in_array('icon-planer', $item->classes)) {
            $icon_html = '<i class="fa fa-bar-chart" aria-hidden="true"></i>';
        } elseif (in_array('icon-bonus', $item->classes)) {
            $icon_html = '<i class="fa-solid fa-user-group"></i>';
        }

        $classes = implode(' ', $item->classes);
        $output .= '<li class="' . esc_attr($classes) . '">';
        $output .= '<a href="' . esc_url($item->url) . '">';
        $output .= $icon_html;
        $output .= '<span class="label" style="margin-left:6px;">' . esc_html($item->title) . '</span>';

        if (in_array('menu-item-has-children', $item->classes) || in_array('has-arrow', $item->classes)) {
            $output .= '<span class="menu-arrow" style="margin-left:4px;">&#9662;</span>';
        }

        $output .= '</a>';
    }

    function end_el(&$output, $item, $depth = 0, $args = []) {
        $output .= "</li>\n";
    }
}