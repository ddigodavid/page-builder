<?php
namespace App\Entities;

class Template extends BaseModel {
    protected $table = 'templates';
    protected $fillable = ['name','thumb','html'];
}