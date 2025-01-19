<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class About extends Composer
{
    protected static $views = [
        "about",
    ];

    public function with()
    {
        return [
            "page" => $this->page(),
            "team" => $this->team(),
            "associates" => $this->associates(),
            "services" => $this->services(),
        ];
    }

    public function page()
    {
        $this->title = get_the_title();
        $this->thumbnail = get_the_post_thumbnail(null, "large");

        $this->associates = $this->associates();

        return $this;
    }

    public function team()
    {
        $members = get_users([
            "exclude" => "1",
            "orderby" => "meta_value",
            "meta_key" => "last_name",
            "meta_query" => [
                [
                    "key" => "user_display_settings",
                    "value" => '"display_on_about"',
                    "compare" => "LIKE",
                ],
            ],
        ]);

        return array_map(function ($member) {
            $member->image = wp_get_attachment_image(
                get_field("image", "user_" . $member->ID),
                "thumbnail"
            );
            $member->role = get_field("position", $member->ID);
            return $member;
        }, $members);
    }

    public function associates()
    {
        $members = get_users([
            "exclude" => "1",
            "orderby" => "meta_value",
            "meta_key" => "last_name",
            "meta_query" => [
                [
                    "key" => "user_display_settings",
                    "value" => '"display_on_about_associate"',
                    "compare" => "LIKE",
                ],
            ],
        ]);

        return array_map(function ($member) {
            $member->image = wp_get_attachment_image(
                get_field("image", "user_" . $member->ID),
                "thumbnail"
            );
            $member->role = get_field("position", $member->ID);
            return $member;
        }, $members);
    }

    public function services()
    {
        return get_terms([
            "taxonomy" => "projectservices",
            "hide_empty" => false,
        ]);
    }
}
