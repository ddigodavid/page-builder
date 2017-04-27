<?php
namespace App\Http\Controllers\Photos;

use App\Entities\Gallery;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PhotosController extends Controller
{

    protected $gallery;

    function __construct()
    {
        $this->gallery = Gallery::first();
    }

    public function save(Request $request)
    {
        $this->getGallery($request->get('company_id', 1))->addMedia($request->file('file'))->toCollection('main');
    }

    public function listPhotos(Request $request)
    {
        $gallery = $this->getGallery($request->get('company_id', 1));

        $results = $gallery->media()
            ->where('model_id', '=', $gallery->id)
            ->where('model_type', '=', get_class($gallery))
            ->where('collection_name', '=', $request->get('collection_name', 'main'))
            ->orderBy('id', 'DESC')->limit(30)->paginate(10);

        return response()->json([
            'results'    => $results->jsonSerialize(),
            'links'      => $results->links()->toHtml(),
            'pagination' => [
                'total'        => $results->total(),
                'per_page'     => $results->perPage(),
                'current_page' => $results->currentPage(),
                'last_page'    => $results->lastPage(),
                'from'         => $results->firstItem(),
                'to'           => $results->lastItem()
            ]
        ]);
    }

    public function delete(Request $request)
    {
        $this->getGallery($request->get('company_id', 1))->deleteMedia($request->get('photo_id'));
    }

    public function getGallery($companyId)
    {
        if (Auth::user()->hasMultiplePagesAccessPermissions()) {
            return Gallery::where('company_id', '=', $companyId)->first();
        }

        return Gallery::where('company_id', '=', Auth::user()->company->id)->first();
    }
}