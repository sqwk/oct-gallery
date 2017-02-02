<?php namespace PolloZen\SimpleGallery\Components;

use Cms\Classes\ComponentBase;
use Cms\Classes\Page;
use PolloZen\SimpleGallery\Models\Gallery as GalleryModel;


class Galleries extends ComponentBase
{
    public $galleries;
    public $galleryPage;

    public function componentDetails()
    {
        return [
            'name'        => 'pollozen.simplegallery::lang.listcomponent.name',
            'description' => 'pollozen.simplegallery::lang.listcomponent.description'
        ];
    }

    public function defineProperties()
    {
        return [
            'galleryOrder' => [
                'title'         => 'Gallery order',
                'description'   => 'Attribute in wich the galleries should be orderer',
                'type'          => 'dropdown',
                'options'   => [
                    'idDesc'    => 'Newers first',
                    'idAsc'     => 'Newers last',
                    'nameDesc'  => 'By name, desc',
                    'nameAsc'   => 'By name, asc',
                    'random'    => 'Randomize'
                ],
                'default' => 'random'
            ],
            'results' =>[
                'title' => 'Results per page',
                'type' => 'string',
                'default' => '10'
            ],
            'galleryPage' => [
                'title'         => 'Gallery page',
                'description'   => 'Page where the gallery is displayed',
                'default'       => '/galleries',
                'type'          => 'dropdown',
                'group'         => 'Links'
            ],
        ];
    }

    /**
     * [getPostPageOptions]
     * @return [array][Blog]
     */
    public function getGalleryPageOptions()
    {
        return Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');
    }

    public function onRun(){
        $this->prepareVars();
        $this->galleries = $this->page['galleries'] = $this->listGalleries();
    }

    private function prepareVars(){
        $this->galleryPage = $this->page['galleryPage'] = $this->property('galleryPage');
    }

    private function sortOrder(){
        switch($this->property('galleryOrder')){
            case 'idDesc':
                return ['id'=>'desc'];
            break;
            case 'idAsc':
                return ['id'=>'asc'];
            break;
            case 'nameAsc':
                return ['name'=>'asc'];

            break;
            case 'nameDesc':
                return ['name'=>'desc'];
            break;
            case 'random':
                return 'random';
            break;
            default:
                return 'random';
            break;
        }
    }

    protected function listGalleries(){
        $order = $this->sortOrder();

        $query = GalleryModel::take(1);

        if($order == "random"){
            $query -> orderByRaw("RAND()");
        } else {
            foreach ($order as $key => $value) {
                $query->orderBy($key, $value);
            }
        }
        $query ->take($this->property('results'));

        $galleries = $query->get();

        /* Agregamos el helper de la URL */
        $galleries->each(function($gallery)
        {
            $gallery->setUrl($this->galleryPage, $this->controller);
        });

        return $galleries;
    }

}
