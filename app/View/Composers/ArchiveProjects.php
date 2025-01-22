<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class ArchiveProjects extends Composer

{
    protected static $views = [
        'archive-projects',
    ];

    public function with()
    {
        return [
            'title' => 'Projects',
            'projects' => $this->projects(),
        ];
    }

    public function projects()
    {

        $projects = get_posts([
            'post_type' => 'projects',
            'posts_per_page' => 999

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
