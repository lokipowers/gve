<?php


namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{

    protected $currentUser;

    public function getUser()
    {
        return Auth::user()->first();
    }

    public function addData($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function buildView($view)
    {

        $this->addData('currentUser', $this->getUser());

        if(\View::exists($view)) {
            return view($view, $this->data);
        }else{
            return view(null);
        }
    }

}
