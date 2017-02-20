<?php
namespace App\Entities;

class TemplatesCollection extends BaseModel {
    protected $table = 'template_colletions';
    protected $fillable = [
        'title',
        'description',
        'status'
    ];
}