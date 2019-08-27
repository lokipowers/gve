<?php

namespace App\Http\Controllers;

use Faker\Provider\Base;

class HomeController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        //return view('dashboard');
        if($this->getUser()->character === null){
            return redirect('/character/create');
        }

        return $this->buildView('dashboard');
    }
}
