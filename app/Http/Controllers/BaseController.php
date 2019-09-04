<?php


namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{

    public $currentUser;

    protected $perPage = 10;

    public function __construct()
    {
        $this->currentUser = Auth::user();
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

        if(\View::exists($view)) {
            return view($view, $this->data);
        }else{
            return view(null);
        }
    }

}
