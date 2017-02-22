<?php
namespace App\Entities;

class Template extends BaseModel {
    protected $table = 'templates';
    protected $fillable = ['collection', 'name','thumb','html', 'status'];

    public function templatesCollection()
    {
        return $this->belongsTo(TemplatesCollection::class, 'collection');
    }
}