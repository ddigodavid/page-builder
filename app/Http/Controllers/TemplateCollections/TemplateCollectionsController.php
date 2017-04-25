<?php
namespace App\Http\Controllers\TemplateCollections;

use App\Entities\TemplatesCollection;
use App\Http\Controllers\BaseController;
use App\Services\TemplatesCollectionService;
use Auth;
use Illuminate\Http\Request;

class TemplateCollectionsController extends BaseController
{
    protected $resourcePrefix = 'template-collections';
    private $collectionService;

    function __construct(TemplatesCollectionService $collectionService)
    {

        $this->collectionService = $collectionService;
    }

    public function listTemplateCollections(Request $request)
    {
        $templateCollections = $this->collectionService->listTemplatesCollection($request);

        return response()->json(['templateCollections' => $templateCollections->get(), 'templateCollectionsAggregated' => $templateCollections->get()->chunk(4)]);
    }

    protected function newModel()
    {
        return new TemplatesCollection();
    }
}