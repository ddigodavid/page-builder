<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Redirect;

abstract class BaseController extends Controller
{
    protected $resourcePrefix;

    public function index()
    {
        $results = $this->newModel()
            ->published()
            ->orderBy('id', 'DESC')
            ->paginate(10);

        return view(sprintf('%s.list', $this->resourcePrefix), ['results' => $results, 'resourcePrefix' => $this->resourcePrefix]);
    }

    public function create()
    {
        return view(sprintf('%s.new', $this->resourcePrefix), ['resourcePrefix' => $this->resourcePrefix]);
    }

    public function edit($modelId)
    {
        $model = $this->newModel()->where('id', '=', $modelId)->first();

        return view(sprintf('%s.edit', $this->resourcePrefix), ['model' => $model, 'resourcePrefix' => $this->resourcePrefix]);
    }

    public function save(Request $request)
    {
        $data = $request->all();

        if($request->has('id')) {
            $model = $this->newModel()
                ->find(array_get($data, 'id'));

            $model->update($data);
            return Redirect::route('template-collections.edit', [$model->id]);
        }

        $model = $this->newModel()->create($data);
        return Redirect::route('template-collections.edit', [$model->id]);
    }

    public function delete(Request $request)
    {
        $modelId = $request->get('id');
    }

    abstract protected function newModel();
}