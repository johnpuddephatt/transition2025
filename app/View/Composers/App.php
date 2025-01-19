<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class App extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '*',
        'partials.page-header'
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'siteName' => $this->siteName(),
            'meta' => $this->meta(),
            'title' => $this->title(),
            'baseName' => $this->baseName(),
        ];
    }

    public static function baseName()
    {
        return basename(get_permalink());
    }


    /**
     * Returns the site name.
     *
     * @return string
     */
    public function siteName()
    {
        return get_bloginfo('name', 'display');
    }

    public function meta()
    {
        $post_id = get_queried_object_id();

        $meta = new \stdClass();
        $meta->url = $post_id ? get_permalink($post_id) : get_site_url();
        $project_name = get_field('project_name', $post_id);
        if ($post_id && $project_name) {
            $meta->title = $project_name . ': ' . $this->title();
        } elseif (is_author()) {
            $meta->title = get_queried_object()->display_name;
        } else {
            $meta->title = $this->title();
        }


        $meta->site_name = get_bloginfo('name');
        $meta->image = get_the_post_thumbnail_url($post_id, 'wide_m') ? (get_the_post_thumbnail_url($post_id, 'wide_m')) : (asset('images/opengraph.jpg'));
        $meta->locale = get_locale();

        if (is_author()) {
            $meta->description = get_queried_object()->description;
        } else {
            $meta->description = $post_id ? wp_trim_words(get_the_excerpt($post_id), 25) : get_bloginfo('description');
        }
        return $meta;
    }

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return get_bloginfo('name');
        }
        if (is_archive()) {

            return get_queried_object()->label ?? single_term_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }
        return get_the_title();
    }
}
