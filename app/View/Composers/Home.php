<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Home extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'index',
    ];

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function override()
    {
        return [
            'hero' => $this->hero(),
            'projects' => $this->projects(),
            'research' => $this->research(),
            'writing' => $this->writing(),
            'updates' => $this->updates(),

        ];
    }

    public function hero()
    {
        $hero = get_post(get_theme_mod('home_hero_project'));
        $hero->link = get_the_permalink($hero->ID);
        $hero->excerpt = get_the_excerpt($hero->ID);
        $hero->image = get_theme_mod('home_hero_image');
        return $hero;
    }

    public function projects()
    {

        $projects = get_posts([
            'post_type' => 'Projects',
            'posts_per_page' => '6',
            'numberposts' => 6,
            'include' => get_theme_mod('homepage_projects') ? explode(',', get_theme_mod('homepage_projects')) : null
        ]);

        wp_reset_postdata();

        $loop_index = 0;

        return array_map(function ($project) use (&$loop_index) {
            $is_large = (($loop_index + 1) % 6 == 0) || ($loop_index % 6 == 0);
            $project->excerpt = get_the_excerpt($project->ID);
            $project->thumbnail = get_the_post_thumbnail($project->ID, $is_large ? 'wide' : 'tall');
            $project->link = get_the_permalink($project->ID);
            $project->client = get_field('project_name', $project->ID);
            $loop_index++;
            return $project;
        }, $projects);
    }

    public function research()
    {

        $latest_research = get_posts([
            'post_type' => 'post',
            'numberposts' => 1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'category',
                    'field'    => 'slug',
                    'terms'    => 'research'
                )
            )
        ]);

        wp_reset_postdata();

        if (count($latest_research)) {
            return array_map(function ($research) {
                $research->excerpt = get_the_excerpt($research->ID);
                $research->thumbnail = get_the_post_thumbnail($research->ID, 'wide_s');
                $research->link = get_the_permalink($research->ID);
                return $research;
            }, $latest_research)[0];
        }
    }

    public function writing()
    {
        $latest_writing = get_posts([
            'post_type' => 'post',
            'numberposts' => 1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'category',
                    'field'    => 'slug',
                    'terms'    => 'writing'
                )
            )
        ]);

        wp_reset_postdata();

        if (count($latest_writing)) {
            return array_map(function ($writing) {
                $writing->excerpt = get_the_excerpt($writing->ID);
                $writing->thumbnail = get_the_post_thumbnail($writing->ID, 'wide_s');
                $writing->link = get_the_permalink($writing->ID);
                return $writing;
            }, $latest_writing)[0];
        }
    }

    public function updates()
    {
        $latest_updates = get_posts([
            'post_type' => 'post',
            'numberposts' => 2,
            'tax_query' => array(
                array(
                    'taxonomy' => 'category',
                    'field'    => 'slug',
                    'terms'    => 'update'
                )
            )
        ]);

        wp_reset_postdata();

        if (count($latest_updates)) {
            return array_map(function ($update) {
                $update->excerpt = get_the_excerpt($update->ID);
                $update->link = get_the_permalink($update->ID);
                $update->date = get_the_date(null, $update->ID);
                return $update;
            }, $latest_updates);
        }
    }
}
