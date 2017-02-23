<?php
namespace App\Entities;

class Page extends BaseModel {
    protected $table = 'pages';
    protected $fillable = [
        'name',
        'collection',
        'slug',
        'html',
        'status'
    ];

    public function templateCollection()
    {
        return $this->belongsTo(TemplatesCollection::class, 'collection');
    }
}