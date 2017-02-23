<?php
namespace App\Http\Controllers\Pages;

use App\Entities\Page;
use App\Entities\TemplatesCollection;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class PagesController extends BaseController
{
    protected $resourcePrefix = 'pages';

    public function newPage(Request $request)
    {
        return view('pages.build-page', ['templateCollectionId' => $request->get('id')]);
    }

    public function beforeCreate()
    {
        $templateCollectionsAggregated = TemplatesCollection::withDrafts()->orderBy('id', 'DESC')->get()->chunk(4);
        return view('pages.new', compact('templateCollectionsAggregated'));
    }

    protected function newModel()
    {
        return  new Page();
    }
}