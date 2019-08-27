<?php

namespace App\Http\Controllers;

use App\Character;
use App\User;
use Illuminate\Http\Request;

class CharacterController extends BaseController
{


    public function index()
    {
        $characters = Character::all()->paginate(20);
        $this->addData('characters', $characters);

        return $this->buildView('character.index');
    }

    public function viewOwn()
    {
        $this->addData('character', $this->getUser()->character);
        return $this->buildView('character.view');
    }

    public function view($id)
    {
        $character = Character::find($id)->first();
        $this->addData('character', $character);
        return $this->buildView('character.view');
    }

    public function create()
    {
        return $this->buildView('character.create');
    }

    public function store(Request $request)
    {
        $character = new Character();
        $character->create($request->all());
        return redirect()->route('character.view')->withStatus(__('Character successfully created.'));
    }

    public function edit($id)
    {
        $character = Character::find($id)->first();
        $this->addData('character', $character);
        return $this->buildView('character.edit');
    }

    public function update(Request $request, $id)
    {
        $character = Character::find($id);
        $character->update($request->all());
        $character->save();
        return redirect()->back()->withStatus(__('Character successfully updated.'));
    }
}
