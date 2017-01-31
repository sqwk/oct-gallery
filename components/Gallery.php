<?php namespace PolloZen\SimpleGallery\Components;

use Cms\Classes\ComponentBase;
use PolloZen\SimpleGallery\Models\Gallery as GalleryModel;

class Gallery extends ComponentBase
{
    public $simpleGallery;
    public $galleryMarkup;

    public function componentDetails()
    {
        return [
            'name'        => 'pollozen.simplegallery::lang.simplecomponent.name',
            'description' => 'pollozen.simplegallery::lang.simplecomponent.description'
        ];
    }

    public function defineProperties()
    {
        return [
            'idGallery' => [
                'title' => 'pollozen.simplegallery::lang.property.title',
                'type' => 'dropdown'
            ],
            'markup' =>[
                'title' => 'pollozen.simplegallery::lang.property.markuptitle',
                'type' => 'dropdown',
                'default' => 'user',
                'options' => [
                    'plugin' => 'pollozen.simplegallery::lang.property.markupdefault',
                    'user' => 'pollozen.simplegallery::lang.property.markupuser'
                ]
            ]
        ];
    }

    public function getidGalleryOptions(){
        return GalleryModel::select('id','name')->orderBy('name')->get()->lists('name','id');
    }

    public function onRun(){
        if($this->property('markup')=='plugin'){
            $this->addCss('/plugins/pollozen/simplegallery/assets/css/owl.carousel.min.css');
            $this->addCss('/plugins/pollozen/simplegallery/assets/css/owl.theme.default.min.css');
            $this->addJs('/plugins/pollozen/simplegallery/assets/js/owl.awesome.carousel.min.js');
            $this->addJs('/plugins/pollozen/simplegallery/assets/js/pz.js');
        }
        $simpleGallery = new GalleryModel;
        $this->simpleGallery = $simpleGallery->where('id',$this->property('idGallery'))->first();
        $this->galleryMarkup = $this->property('markup');
    }
}