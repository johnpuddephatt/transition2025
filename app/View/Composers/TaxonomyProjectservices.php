<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class TaxonomyProjectservices extends Composer
{

    protected static $views = [
        'taxonomy-projectservices',
    ];

    public function with()
    {
        return [
            'page' => $this->page(),
            'projects' => $this->projects(),
        ];
    }

    public function page()
    {
        $service = new \stdClass();
        $service->description = term_description();
        return $service;
    }

    public function projects()
    {

        $projects = get_posts([
            'post_type' => 'Projects',
            'posts_per_page' => '12',
            'tax_query' => array(
                array(
                    'taxonomy' => 'projectservices',
                    'field'    => 'slug',
                    'terms'    => get_queried_object()->slug
                )
            )
        ]);

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
}
