<?php namespace PolloZen\SimpleGallery\Controllers;

use Flash;
use Backend\Classes\Controller;
use PolloZen\SimpleGallery\Models\Gallery as GalleryModel;
use BackendMenu;

class Gallery extends Controller
{
    public $implement = ['Backend.Behaviors.ListController','Backend.Behaviors.FormController'];
    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public $requiredPermissions = [
        'pollozen.simplegallery.manage_galleries'
    ];


    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('PolloZen.SimpleGallery', 'simplegallery', 'gallery');
    }
}