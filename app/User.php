<?php

namespace App;

use App\Presenters\DefaultPresenter;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laracasts\Presenter\Contracts\PresentableInterface;
use Laracasts\Presenter\PresentableTrait;

class User extends Authenticatable implements PresentableInterface
{

    use PresentableTrait, Notifiable;

    protected $presenter = DefaultPresenter::class;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'super_admin', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isSuperAdmin()
    {
        return (bool) $this->super_admin;
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
