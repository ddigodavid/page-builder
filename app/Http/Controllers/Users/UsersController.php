<?php
namespace App\Http\Controllers\Users;

use App\Http\Controllers\BaseController;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Redirect;

class UsersController extends BaseController
{

    protected $resourcePrefix = 'user';

    public function index(Request $request)
    {
        $results = User::withDrafts()->paginate(10);

        return view('user.list', [
            'results'        => $results,
            'resourcePrefix' => $this->resourcePrefix
        ]);
    }

    protected function newModel()
    {
        return new User();
    }

    public function save(Request $request)
    {
        $data = $request->all();

        $this->validator($data)->validate();

        $data['password'] = bcrypt($data['password']);
        $model = $this->newModel()
            ->find(array_get($data, 'id'));

        $model->update($data);
        return Redirect::route(sprintf('%s.edit', $this->resourcePrefix), [$model->id]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'password' => 'min:6|confirmed',
        ]);
    }
}