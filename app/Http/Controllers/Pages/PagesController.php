<?php
namespace App\Http\Controllers\Pages;

use App\Entities\Page;
use App\Entities\TemplatesCollection;
use App\Http\Controllers\BaseController;
use App\Services\PageService;
use Illuminate\Http\Request;
use Response;

class PagesController extends BaseController
{

    protected $resourcePrefix = 'pages';
    private $pageService;

    public function __construct(PageService $pageService)
    {

        $this->pageService = $pageService;
    }

    public function newPage($templateCollectionId)
    {
        $templatesCollection = TemplatesCollection::find($templateCollectionId);

        return view('pages.build-page', [
                'templateCollectionId' => $templateCollectionId,
                'templatesCollection'  => $templatesCollection
            ]);
    }

    public function beforeCreate()
    {
        $templateCollectionsAggregated =
            TemplatesCollection::withDrafts()
                ->orderBy('id', 'DESC')
                ->get()
                ->chunk(4);

        return view('pages.new', compact('templateCollectionsAggregated'));
    }

    protected function newModel()
    {
        return new Page();
    }

    public function findPage($slug)
    {
        $page = Page::where('slug', '=', $slug)->first();

        if (! $page || $page->isDraft()) {
            return Response::json([
                'data' => null,
                'message' => 'Página não encontrada ou indiponível no momento'
            ]);
        }

        $page->html = $this->pageService->removeDirectives($page->html);

        return Response::json([
            'data' => $page,
            'message' => 'Página encontrada com sucesso'
        ]);
    }
}