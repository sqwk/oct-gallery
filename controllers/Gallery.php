<?php namespace Sqwk\Gallery\Controllers;

use Flash;
use Backend\Classes\Controller;
use Sqwk\Gallery\Models\Gallery as GalleryModel;
use BackendMenu;

class Gallery extends Controller
{
    public $implement = ['Backend.Behaviors.ListController','Backend.Behaviors.FormController'];
    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public $requiredPermissions = [
        'sqwk.gallery.manage_galleries'
    ];


    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Sqwk.Gallery', 'gallery', 'gallery');
    }
}
