<?php namespace Sqwk\Gallery\Models;

use Model;
use System\Classes\PluginManager;

/**
 * Gallery Model
 */
class Gallery extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'sqwk_gallery_galleries';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    public $rules = [
        'name' => 'required|between:3,64',
    ];

    public $attachMany = [
        'images' => ['System\Models\File', 'order' => 'sort_order'],
    ];

    public $belongsToMany = [];

    public function __construct(array $attributes = [])
    {
        if (PluginManager::instance()->hasPlugin('RainLab.Blog')) {
            $this->belongsToMany['post'] = [
                'RainLab\Blog\Models\Post',
                'table' => 'sqwk_gallery_galleries_posts'
            ];
        }
        parent::__construct($attributes);
    }

    public function setUrl($pageName, $controller)
    {
        $params = [
            'id' => $this->id,
            'slug' => $this->slug
        ];
        return $this->url = $controller->pageUrl($pageName, $params);
    }
}
