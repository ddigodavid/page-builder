<?php
namespace App\Entities;

use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class Template extends BaseModel implements HasMedia
{
    use HasMediaTrait;

    protected $table = 'templates';
    protected $fillable = [
        'collection',
        'name',
        'thumb',
        'html',
        'status'
    ];

    public function templatesCollection()
    {
        return $this->belongsTo(TemplatesCollection::class, 'collection');
    }

    public function mediaField()
    {
        return "thumb";
    }
}