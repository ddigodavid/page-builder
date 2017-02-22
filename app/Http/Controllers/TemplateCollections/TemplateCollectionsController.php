<?php
namespace App\Http\Controllers\TemplateCollections;

use App\Entities\TemplatesCollection;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class TemplateCollectionsController extends BaseController
{
    protected $resourcePrefix = 'template-collections';


    public function listTemplateCollections(Request $request)
    {
        $templateCollections = TemplatesCollection::all();

        return response()->json(['templateCollections' => $templateCollections, 'templateCollectionsAggregated' => $templateCollections->chunk(4)]);
    }

    protected function newModel()
    {
        return new TemplatesCollection();
    }
}