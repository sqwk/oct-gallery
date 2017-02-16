<?php namespace PolloZen\SimpleGallery\Components;

use Cms\Classes\ComponentBase;
use PolloZen\SimpleGallery\Models\Gallery as GalleryModel;

class Gallery extends ComponentBase
{
    public $gallery;
    public $galleryMarkup;

    public function componentDetails()
    {
        return [
            'name'        => 'pollozen.simplegallery::lang.gallerycomponent.name',
            'description' => 'pollozen.simplegallery::lang.gallerycomponent.description'
        ];
    }

    public function defineProperties()
    {
        return [
            'idGallery' => [
                'title'         => 'pollozen.simplegallery::lang.gallerycomponent.property.gallery',
                'description'   => 'pollozen.simplegallery::lang.gallerycomponent.property.galleryDescription',
                'type'          => 'dropdown',
                'showExternalParam' => false
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
            'slug'  =>[
                'title' => 'pollozen.simplegallery::lang.gallerycomponent.property.slug',
                'description' => 'pollozen.simplegallery::lang.gallerycomponent.property.slugDescription',
                'type' => 'string',
                'default' => '{{ :slug }}'
            ]
        ];
    }

    public function getidGalleryOptions(){
        return array(0 => 'Using gallery slug') + GalleryModel::select('slug','name')->orderBy('name')->get()->lists('name','slug');
    }

    public function onRun(){
        $this->prepareMarkup();
        $this->gallery = $this->page['gallery'] = $this->getGallery();
    }



    private function prepareMarkup(){
        $this->galleryMarkup = $this->property('markup');
        if($this->property('markup')=='plugin'){
            $this->addCss('/plugins/pollozen/simplegallery/assets/css/owl.carousel.min.css');
            $this->addCss('/plugins/pollozen/simplegallery/assets/css/owl.theme.default.min.css');
            $this->addJs('/plugins/pollozen/simplegallery/assets/js/owl.awesome.carousel.min.js');
            $this->addJs('/plugins/pollozen/simplegallery/assets/js/pz.js');
        }
    }

    protected function getGallery(){
        $slug  = ($this->property('idGallery') == '0') ? $this->property('slug') : $this->property('idGallery');
        $query = GalleryModel::where('slug',$slug);
        $gallery = $query->first();
        return $gallery;
    }

}