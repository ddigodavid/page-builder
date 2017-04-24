<?php
namespace App\Entities;

class TemplatesCollection extends BaseModel {
    protected $table = 'template_collections';
    protected $fillable = [
        'name',
        'description',
        'cssUrl',
        'status',
        'company_id'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}