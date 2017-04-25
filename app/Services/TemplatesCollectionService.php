<?php
namespace App\Services;

use App\Entities\TemplatesCollection;
use Auth;
use Illuminate\Http\Request;

class TemplatesCollectionService
{

    public function listTemplatesCollection()
    {
        $templateCollections = TemplatesCollection::withDrafts()->orderBy('id', 'DESC');

        if (! Auth::user()->hasMultiplePagesAccessPermissions()) {
            $templateCollections->where('company_id', '=', Auth::user()->company->id);
        }

        return $templateCollections;
    }
}