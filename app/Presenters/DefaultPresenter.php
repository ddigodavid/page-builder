<?php

namespace App\Presenters;

use Carbon\Carbon;
use Laracasts\Presenter\Presenter;

class DefaultPresenter extends Presenter
{

    protected $defaultDateFormat = 'd/m/Y \à\s H:i\h';

    public function created_at()
    {
        return $this->formatDate($this->entity->created_at);
    }

    public function updated_at()
    {
        return $this->formatDate($this->entity->updated_at);
    }

    public function starts_at()
    {
        return $this->formatDate($this->entity->starts_at);
    }

    public function expiration_at()
    {
        return $this->formatDate($this->entity->expiration_at);
    }

    public function status()
    {
        switch ($this->entity->status) {
            case 0:
                return 'Rascunho';
                break;
            case 1:
                return 'Publicado';
                break;
            case 9:
                return 'Publicado';
                break;
        }
    }

    public function status_html()
    {
        switch($this->entity->status) {
            case 0:
                return '<span class="text-info"><i class="glyphicon glyphicon-edit"></i> Rascunho</span>';
                break;

            case 1:
                return '<span class="text-success"><i class="glyphicon glyphicon-ok"></i> Publicado</span>';
                break;

            case 9:
                return '<span class="text-danger"><i class="glyphicon glyphicon-trash"></i> Deletado</span>';
                break;
        }
    }

    protected function formatDate(Carbon $date, $format = null)
    {
        $format = $format !== null ? $format : $this->defaultDateFormat;

        return $date->format($format);
    }
}