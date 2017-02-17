<?php

namespace App\Entities;

use Spatie\MediaLibrary\Media as SpatieMedia;

class Media extends SpatieMedia
{

    protected $appends = ['url'];

    public function getLabelAttribute()
    {
        return collect(config('cms.images_labels'))->get($this->key, 'Imagem');
    }

    public function getUrlAttribute()
    {
        return $this->getUrl();
    }

}