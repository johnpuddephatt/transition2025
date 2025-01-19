<?php

/**
 * Theme filters.
 */

namespace App;


/**
 * Add <body> classes
 */
add_filter('body_class', function (array $classes) {
    /** Add page slug if it doesn't exist */
    if (is_single() || is_page() && !is_front_page()) {
        if (!in_array(basename(get_permalink()), $classes)) {
            $classes[] = basename(get_permalink());
        }
    }

    if (($_SERVER['SERVER_NAME'] ?? '') === parse_url(($_SERVER['HTTP_REFERER'] ?? ''), PHP_URL_HOST)) {
        $classes[] = 'internal-referer';
    }

    if (isset($_SERVER['HTTP_X_BARBA'])) {
        $classes[] = 'barba-loaded';
    }

    /** Clean up class names for custom templates */
    $classes = array_map(function ($class) {
        return preg_replace(['/-blade(-php)?$/', '/^page-template-views/'], '', $class);
    }, $classes);

    return array_filter($classes);
});

/**
 * Add "… Continued" to the excerpt
 */
add_filter('excerpt_more', function () {
    return '&hellip;';
});

add_filter('excerpt_length', function ($length) {
    return 20;
});

add_filter("acf/settings/show_admin", "__return_false");

add_filter("manage_projects_posts_columns", function ($columns) {
    $position = 2;
    return array_slice($columns, 0, $position, true) + [
        "project_name" => __("Project name"),
    ] +
        array_slice($columns, $position, null, true);
});


/**
 * Image sizes
 */
add_image_size('wide', 1480, 800, true);
add_image_size('wide_m', 1110, 600, true);
add_image_size('wide_s', 740, 400, true);
add_image_size('wide_xs', 370, 200, true);

add_image_size('tall', 480, 648, true);
add_image_size('tall_m', 360, 486, true);
add_image_size('tall_s', 240, 324, true);

add_image_size('square_l', 640, 640, true);
add_image_size('square', 480, 480, true);
add_image_size('square_s', 240, 240, true);

add_filter('image_size_names_choose', function ($sizes) {
    $sizes['wide'] = 'Wide';
    $sizes['tall'] = 'Tall';
    $sizes['square'] = 'Square';
    return $sizes;
}, 11, 1);
