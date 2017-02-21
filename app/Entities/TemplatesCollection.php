<?php
namespace App\Entities;

class TemplatesCollection extends BaseModel {
    protected $table = 'template_collections';
    protected $fillable = [
        'name',
        'description',
        'cssUrl',
        'status'
    ];
}