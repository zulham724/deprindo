<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use App\Land;

class Lands extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = Land::count();
        $string = trans_choice('Lahan', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-pie-graph',
            'title'  => "{$count} {$string}",
            'text'   => '',//__('voyager::dimmer.user_text', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => 'Lahan',
                'link' => route('voyager.lands.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/03.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        $land = new Land;
        return Auth::user()->can('browse', $land);
    }
}
