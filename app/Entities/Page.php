<?php
namespace App\Entities;

use Cviebrock\EloquentSluggable\Sluggable;

class Page extends BaseModel
{
    use Sluggable;

    protected $table = 'pages';
    protected $fillable = [
        'name',
        'collection',
        'slug',
        'html',
        'status'
    ];

    protected $appends = ['url'];

    public function templateCollection()
    {
        return $this->belongsTo(TemplatesCollection::class, 'collection');
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function url()
    {
        return url(sprintf('%s/%s', 'especial', $this->slug));
    }

    public function getUrlAttribute()
    {
        return $this->url();
    }
}