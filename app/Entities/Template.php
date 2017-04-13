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
        'html',
        'status'
    ];

    protected $appends = ['thumb'];

    public function templatesCollection()
    {
        return $this->belongsTo(TemplatesCollection::class, 'collection');
    }

    public function mediaField()
    {
        return "thumb";
    }

    public function thumb()
    {
        $mediaCollection = $this->getMedia($this->mediaField());

        if ($mediaCollection->isNotEmpty()) {
            return $mediaCollection->first()->url;
        }

        return "";
    }

    public function getThumbAttribute()
    {
        return $this->thumb();
    }
}