<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Http\Request;

class ActivityController extends BaseController
{
    public function index()
    {
        dd($this->currentUser);
        $activities = Activity::where('side', $this->currentUser->character->side)->paginate($this->perPage);

        $this->addData('activities', $activities);
        $this->buildView('activity.index');
    }

    public function doActivity($id)
    {
        $activity = Activity::where('id', $id)->first();
        dd($activity);
    }
}
