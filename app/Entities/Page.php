<?php
namespace App\Entities;

class Page extends BaseModel {
    protected $table = 'pages';
    protected $fillable = [
        'name',
        'slug',
        'html',
        'status'
    ];
}