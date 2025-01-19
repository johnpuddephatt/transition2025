<?php

/**
 * Register custom post types
 */


add_action('after_setup_theme', function () {
    global $wp_rewrite;
    $wp_rewrite->author_base = "about";
    $wp_rewrite->author_structure =
        "/" . $wp_rewrite->author_base . "/%author%";
});

add_action("init", function () {



    register_post_type("projects", [
        "labels" => [
            "name" => __("Projects"),
            "singular_name" => __("Project"),
        ],
        "public" => true,
        "has_archive" => true,
        "rewrite" => [
            "slug" => "projects",
            "with_front" => false,
        ],
        "menu_icon" => "dashicons-camera-alt",
        "menu_position" => 4,
        "show_in_rest" => true,
        "supports" => ["title", "thumbnail", "excerpt", "editor", "revisions"],
    ]);

    register_post_type("scraps", [
        "labels" => [
            "name" => __("Sketchbook"),
            "singular_name" => __("Sketch"),
        ],
        "public" => true,
        "has_archive" => true,
        "rewrite" => [
            "slug" => "sketchbook",
            "with_front" => false,
        ],
        "menu_icon" => "dashicons-pressthis",
        "menu_position" => 4,
        "show_in_rest" => true,
        "supports" => ["title", "thumbnail", "author", "editor"],
    ]);

    register_taxonomy(
        "projectservices", // The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
        "projects", // post type name
        [
            "hierarchical" => false,
            "label" => "Services", // display name
            "query_var" => false,
            "show_ui" => true,
            "show_admin_column" => true,
            "show_in_rest" => true,
            "rewrite" => [
                "slug" => "service", // This controls the base slug that will display before each term
                "with_front" => false, // Don't display the category base before
            ],
        ]
    );
});


/*
* Add columns to project post list
*/

add_action(
    "manage_projects_posts_custom_column",
    function ($column, $post_id) {
        switch ($column) {
            case "project_name":
                echo get_post_meta($post_id, "project_name", true);
                break;
        }
    },
    -50,
    3
);


/**
 * Trying out gutenberg templates...
 */
add_action("init", function () {
    $post_type_object = get_post_type_object("projects");
    $post_type_object->template = [
        [
            "core/paragraph",
            [
                "placeholder" =>
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
            ],
        ],
        [
            "core/paragraph",
            [
                "placeholder" =>
                " Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
            ],
        ],
        [
            "core/separator",
            [
                "className" => "is-style-wide",
            ],
        ],
    ];
});
