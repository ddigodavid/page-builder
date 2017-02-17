<?php
namespace App\Http\Controllers\Photos;

use App\Entities\Gallery;
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
        $this->gallery->addMedia($request->file('file'))->toCollection('main');
    }

    public function listPhotos(Request $request)
    {
        $results = $this->gallery->media()
            ->where('model_id', '=', $this->gallery->id)
            ->where('model_type', '=', get_class($this->gallery))
            ->where('collection_name', '=', $request->get('collection_name', 'main'))
            ->orderBy('order_column')->paginate(10);

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
        $this->gallery->deleteMedia($request->get('photo_id'));
    }
}