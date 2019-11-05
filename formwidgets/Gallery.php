<?php namespace Sqwk\Gallery\FormWidgets;

use Sqwk\Gallery\Models\Gallery as GalleryModel;
use Backend\Classes\FormWidgetBase;

/**
 * Gallery Form Widget
 */
class Gallery extends FormWidgetBase
{
    /**
     * @inheritDoc
     */
    protected $defaultAlias = 'sqwk_gallery_gallery';

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
    public function getSaveValue($value)
    {
        return $value;
    }
}
