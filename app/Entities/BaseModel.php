<?php
namespace App\Entities;

use App\Presenters\DefaultPresenter;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\Contracts\PresentableInterface;
use Laracasts\Presenter\PresentableTrait;

class BaseModel extends Model implements PresentableInterface
{

    use PresentableTrait;

    protected $presenter = DefaultPresenter::class;

    public function scopePublished($query)
    {
        return $query->where('status', '=', 1);
    }
}