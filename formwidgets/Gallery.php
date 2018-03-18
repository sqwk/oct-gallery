<?php namespace Pollozen\Simplegallery\FormWidgets;

use PolloZen\SimpleGallery\Models\Gallery as GalleryModel;
use Backend\Classes\FormWidgetBase;

/**
 * Gallery Form Widget
 */
class Gallery extends FormWidgetBase
{
    /**
     * @inheritDoc
     */
    protected $defaultAlias = 'pollozen_simplegallery_gallery';

    /**
     * @inheritDoc
     */
    public function init()
    {
        $this->data = GalleryModel::all();
    }

    /**
     * @inheritDoc
     */
    public function render()
    {
        $this->prepareVars();
        return $this->makePartial('gallery');
    }

    /**
     * Prepares the form widget view data
     */
    public function prepareVars()
    {
        $this->vars['name'] = $this->formField->getName();
        $this->vars['value'] = $this->getLoadValue();
        $this->vars['data'] = $this->data;
    }

    /**
     * @inheritDoc
     */
    public function loadAssets()
    {
        $this->addCss('css/gallery.css', 'pollozen.simplegallery');
        $this->addJs('js/gallery.js', 'pollozen.simplegallery');
    }

    /**
     * @inheritDoc
     */
    public function getSaveValue($value)
    {
        return $value;
    }
}
