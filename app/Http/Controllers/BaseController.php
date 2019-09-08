<?php


namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class BaseController extends Controller
{

    //public $currentUser;

    public $user;
    public $character;
    protected $perPage = 10;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            $this->character = $this->user->character;
            return $next($request);
        });
    }

    public function getUser()
    {
        return Auth::user();
    }

    public function addData($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function buildView($view)
    {

        $this->addData('currentUser', $this->getUser());
        $this->addData('character', $this->character);

        if(\View::exists($view)) {
            return view($view, $this->data);
        }else{
            return view(null);
        }
    }

}
