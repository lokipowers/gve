<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends BaseController
{
    public function viewOwnProfile()
    {
        $this->addData('profileUser', $this->getUser());
        return $this->buildView('user.profile');
    }

    public function viewProfile($username)
    {
        $user = User::whereUsername($username)->firstOrFail();
        $this->addData('profileUser', $user);

        return $this->buildView('user.profile');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login?message=logout');
    }
}
