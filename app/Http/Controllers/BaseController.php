<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

abstract class BaseController extends Controller
{
    protected $resourcePrefix;

    public function index()
    {
        $results = $this->newModel()
            ->published()
            ->orderBy('id', 'DESC')
            ->paginate(10);

        return view(sprintf('%s.list', $this->resourcePrefix), compact('results'));
    }

    public function create()
    {
        return view(sprintf('%s.new', $this->resourcePrefix));
    }

    public function edit()
    {
        return view(sprintf('%s.edit', $this->resourcePrefix));
    }

    public function save(Request $request)
    {

    }

    abstract protected function newModel();
}