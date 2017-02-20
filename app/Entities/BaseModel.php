<?php
namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model {

    public function scopePublished($query)
    {
        return $query->where('status', '=', 1);
    }
}