<?php
namespace App\Http\Controllers\TemplateCollections;

use App\Entities\TemplatesCollection;
use App\Http\Controllers\BaseController;

class TemplateCollectionsController extends BaseController
{
    protected $resourcePrefix = 'template-collections';

    protected function newModel()
    {
        return new TemplatesCollection();
    }
}