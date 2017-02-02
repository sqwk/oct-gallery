<?php namespace PolloZen\SimpleGallery\Components;

use Cms\Classes\ComponentBase;
use Cms\Classes\Page;
use PolloZen\SimpleGallery\Models\Gallery as GalleryModel;


class Galleries extends ComponentBase
{
    public $galleries;
    public $galleryPage;
    public $galleryMarkup;

    public function componentDetails()
    {
        return [
            'name'        => 'pollozen.simplegallery::lang.galleriescomponent.name',
            'description' => 'pollozen.simplegallery::lang.galleriescomponent.description'
        ];
    }

    public function defineProperties()
    {
        return [
            'galleryOrder' => [
                'title'         => 'pollozen.simplegallery::lang.galleriescomponent.property.order',
                'description'   => 'pollozen.simplegallery::lang.galleriescomponent.property.orderDescription',
                'type'          => 'dropdown',
                'options'   => [
                    'idDesc'    => 'pollozen.simplegallery::lang.galleriescomponent.property.orderIddesc',
                    'idAsc'     => 'pollozen.simplegallery::lang.galleriescomponent.property.orderIdasc',
                    'nameDesc'  => 'pollozen.simplegallery::lang.galleriescomponent.property.orderNamedesc',
                    'nameAsc'   => 'pollozen.simplegallery::lang.galleriescomponent.property.orderNameasc',
                    'random'    => 'pollozen.simplegallery::lang.galleriescomponent.property.orderRandom'
                ],
                'default' => 'random'
            ],
            'results' =>[
                'title' => 'pollozen.simplegallery::lang.galleriescomponent.property.results',
                'type' => 'string',
                'default' => '10'
            ],
            'markup' =>[
                'title'         => 'pollozen.simplegallery::lang.gallerycomponent.property.style',
                'description'   => 'pollozen.simplegallery::lang.gallerycomponent.property.styleDescription',
                'type'          => 'dropdown',
                'default'       => 'user',
                'options' => [
                    'plugin'    => 'pollozen.simplegallery::lang.gallerycomponent.property.styleComponent',
                    'user'      => 'pollozen.simplegallery::lang.gallerycomponent.property.styleUser'
                ],
            'showExternalParam' => false
            ],
            'galleryPage' => [
                'title'         => 'pollozen.simplegallery::lang.galleriescomponent.property.page',
                'description'   => 'pollozen.simplegallery::lang.galleriescomponent.property.pageDescription',
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
        $this->prepareMarkup();
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
    private function prepareMarkup(){
        $this->galleryMarkup = $this->property('markup');
        if($this->property('markup')=='plugin'){
            $this->addCss('/plugins/pollozen/simplegallery/assets/css/galleries.css');
            $this->addJs('/plugins/pollozen/simplegallery/assets/js/imagesloaded.pkgd.min.js');
            $this->addJs('/plugins/pollozen/simplegallery/assets/js/isotope.pkgd.min.js');
            $this->addJs('/plugins/pollozen/simplegallery/assets/js/isotope.pkgd.min.js');
            $this->addJs('/plugins/pollozen/simplegallery/assets/js/pz.js');
        }
    }

}
