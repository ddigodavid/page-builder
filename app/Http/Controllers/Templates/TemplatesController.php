<?php
namespace App\Http\Controllers\Templates;

use App\Entities\Template;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TemplatesController extends BaseController
{
    protected $resourcePrefix = 'templates';

    public function listTemplates(Request $request)
    {
        $templates = Template::all();

        return response()->json(['templates' => $templates]);
    }

    protected function newModel()
    {
        return new Template();
    }
}