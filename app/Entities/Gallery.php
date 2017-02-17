<?php
namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class Gallery extends Model implements HasMedia {
    use HasMediaTrait;

    protected $table = 'galleries';
    protected $fillable = [
        'title'
    ];
}