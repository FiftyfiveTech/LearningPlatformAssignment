<?php
class Member_Nav_Walker extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = [], $id = 0) {
        $icon_svg = '';

        // Check for icon class in $item->classes
        $classes = implode(' ', $item->classes);
        if (in_array('icon-learn', $item->classes)) {
            $icon_svg = '<svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M3 6l9-4 9 4-9 4-9-4zm0 7l9 4 9-4"/></svg>';
       } elseif (in_array('icon-algos', $item->classes)) {
            $icon_svg = '<svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M4 4h5v5H4V4zm11 0h5v5h-5V4zM4 15h5v5H4v-5zm11 0h5v5h-5v-5zM9 6h6M6.5 9.5l2 5M17.5 9.5l-2 5"/></svg>';


        } elseif (in_array('icon-portfolio', $item->classes)) {
            $icon_svg = '<svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/></svg>';
        } elseif (in_array('icon-charts', $item->classes)) {
            $icon_svg = '<svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><rect x="4" y="10" width="3" height="10"/><rect x="10" y="6" width="3" height="14"/><rect x="16" y="2" width="3" height="18"/></svg>';
        } elseif (in_array('icon-planer', $item->classes)) {
            $icon_svg = '<svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M3 4h18v2H3zm0 4h18v2H3zm0 4h12v2H3z"/></svg>';
        } elseif (in_array('icon-bonus', $item->classes)) {
            $icon_svg = '<svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3 6h6l-5 4 2 6-5-3-5 3 2-6-5-4h6z"/></svg>';
        
        } 

        
            $output .= '<li class="' . esc_attr($classes) . '">';
            $output .= '<a href="' . esc_url($item->url) . '">';
            $output .= $icon_svg;
            $output .= '<span class="label" style="margin-left:6px;">' . esc_html($item->title) . '</span>';

            if (in_array('menu-item-has-children', $item->classes)) {
                $output .= '<span class="menu-arrow" style="margin-left:4px;">&#9662;</span>'; // ▼ Downward arrow
            }

            if (in_array('has-arrow', $item->classes)) {
                $output .= '<span class="menu-arrow" style="margin-left:4px;">&#9662;</span>';
            }
            $output .= '</a>';

    }

    function end_el(&$output, $item, $depth = 0, $args = []) {
        $output .= "</li>\n";
    }
}
