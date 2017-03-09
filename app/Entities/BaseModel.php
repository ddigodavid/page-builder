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

    public function scopeWithDrafts($query)
    {
        return $query->whereIn('status', [0, 1]);
    }

    public function isDraft()
    {
        return $this->status == 0;
    }
}