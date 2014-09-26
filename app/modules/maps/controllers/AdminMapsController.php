<?php namespace App\Modules\Maps\Controllers;

use App\Modules\Maps\Models\Map;
use Hover, HTML, BackController;

class AdminMapsController extends BackController {

    protected $icon = 'world.png';

    public function __construct()
    {
        $this->modelName = 'Map';

        parent::__construct();
    }

    public function index()
    {
        $this->indexPage([
            'tableHead' => [
                trans('app.id')     => 'id', 
                trans('app.title')  => 'title',
                trans('Game')       => 'game_id'
            ],
            'tableRow' => function($map)
            {
                $icon = null;
                if ($map->image) {
                    Hover::image($map->uploadPath().$map->image);
                    $icon = HTML::image($map->uploadPath().'16/'.$map->image, $map->title) ;
                }

                Hover::modelAttributes($map, ['creator']);

                return [
                    $map->id,
                    Hover::pull().$icon.' '.$map->title,
                    $map->game->title,
                ];            
            }
        ]);
    }

}