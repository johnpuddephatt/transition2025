<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Page extends Composer
{

    protected static $views = [
        'page',
    ];

    public function with()
    {
        return [
            'post' => $this->post(),
        ];
    }

    public function post()
    {
        $this->title = get_the_title();
        $this->thumbnail = get_the_post_thumbnail(null, 'large');
        return $this;
    }
}
