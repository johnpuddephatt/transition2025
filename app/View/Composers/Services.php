<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Services extends Composer
{
    protected static $views = [
        // "services",
    ];

    public function with()
    {
        return [
            "page" => $this->page(),

            "services" => $this->services(),
        ];
    }

    public function page()
    {
        $this->title = get_the_title();
        $this->thumbnail = get_the_post_thumbnail(null, "large");
        $this->content = get_the_content();
        return $this;
    }



    public function services()
    {
        return get_terms([
            "taxonomy" => "projectservices",
            "hide_empty" => false,
        ]);
    }
}
