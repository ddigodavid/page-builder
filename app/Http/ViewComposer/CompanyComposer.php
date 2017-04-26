<?php

namespace App\Http\ViewComposer;

use App\Entities\Company;
use Illuminate\View\View;

class CompanyComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('companies', Company::all()->pluck('name', 'id'));
    }
}
