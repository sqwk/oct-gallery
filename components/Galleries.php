<?php namespace Sqwk\Gallery\Components;

use Cms\Classes\ComponentBase;
use Cms\Classes\Page;
use Sqwk\Gallery\Models\Gallery as GalleryModel;

class Galleries extends ComponentBase
{
    public $galleries;
    public $galleryPage;

    public function componentDetails()
    {
        return [
            'name'        => 'sqwk.gallery::lang.galleriescomponent.name',
            'description' => 'sqwk.gallery::lang.galleriescomponent.description'
        ];
    }

    public function defineProperties()
    {
        return [
            'galleryOrder' => [
                'title'         => 'sqwk.gallery::lang.galleriescomponent.property.order',
                'description'   => 'sqwk.gallery::lang.galleriescomponent.property.orderDescription',
                'type'          => 'dropdown',
                'options'   => [
                    'idDesc'    => 'sqwk.gallery::lang.galleriescomponent.property.orderIddesc',
                    'idAsc'     => 'sqwk.gallery::lang.galleriescomponent.property.orderIdasc',
                    'nameDesc'  => 'sqwk.gallery::lang.galleriescomponent.property.orderNamedesc',
                    'nameAsc'   => 'sqwk.gallery::lang.galleriescomponent.property.orderNameasc',
                    'random'    => 'sqwk.gallery::lang.galleriescomponent.property.orderRandom'
                ],
                'default' => 'random'
            ],
            'results' =>[
                'title' => 'sqwk.gallery::lang.galleriescomponent.property.results',
                'type' => 'string',
                'default' => '10'
            ],
            'galleryPage' => [
                'title'         => 'sqwk.gallery::lang.galleriescomponent.property.page',
                'description'   => 'sqwk.gallery::lang.galleriescomponent.property.pageDescription',
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

    public function onRun()
    {
        $this->prepareVars();
        $this->galleries = $this->page['galleries'] = $this->listGalleries();
    }

    private function prepareVars()
    {
        $this->galleryPage = $this->page['galleryPage'] = $this->property('galleryPage');
    }

    private function sortOrder()
    {
        switch ($this->property('galleryOrder')) {
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

    protected function listGalleries()
    {
        $order = $this->sortOrder();

        $query = GalleryModel::take(1);

        if ($order == "random") {
            $query -> orderByRaw("RAND()");
        } else {
            foreach ($order as $key => $value) {
                $query->orderBy($key, $value);
            }
        }
        $query ->take($this->property('results'));

        $galleries = $query->get();

        $galleries->each(function ($gallery) {
            $gallery->setUrl($this->galleryPage, $this->controller);
        });

        return $galleries;
    }
}
