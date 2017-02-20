<?php
namespace App\Http\Controllers\Pages;

use App\Entities\Page;
use App\Http\Controllers\BaseController;

class PagesController extends BaseController
{
    protected $resourcePrefix = 'pages';

    protected function newModel()
    {
        return  new Page();
    }
}