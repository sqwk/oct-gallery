<?php namespace Sqwk\Gallery\Models;

use Model;

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

    public $belongsToMany = [
        'post' => [
                'RainLab\Blog\Models\Post',
                'table' => 'sqwk_gallery_galleries_posts'
            ]
        ];

    public function setUrl($pageName, $controller)
    {
        $params = [
            'id' => $this->id,
            'slug' => $this->slug
        ];
        return $this->url = $controller->pageUrl($pageName, $params);
    }
}
