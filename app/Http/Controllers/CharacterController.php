<?php

namespace App\Http\Controllers;

use App\Character;
use App\Http\Controllers\Traits\CharacterActivity;
use App\Location;
use App\Rank;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CharacterController extends BaseController
{

    use CharacterActivity;

    public function index()
    {
        $characters = Character::all()->paginate(20);
        $this->addData('characters', $characters);

        return $this->buildView('character.index');
    }

    public function viewOwn()
    {
        $character = $this->getUser()->character;

        if($character===null){
            return redirect(route('character.create'));
        }

        $character->avatar_url = $this->getCharacterAvatar($character);
        $this->addData('character', $character);
        return $this->buildView('character.view');
    }

    public function view($id)
    {
        $character = Character::where('id', '=', $id)->firstOrFail();
        $character->avatar_url = $this->getCharacterAvatar($character);

        $this->addData('character', $character);
        return $this->buildView('character.view');
    }

    public function create()
    {
        if($this->getUser()->character !== null){
            return redirect(route('character.viewOwn'));
        }
        return $this->buildView('character.create');
    }

    public function store(Request $request)
    {
        $character = new Character();

        // Get Random location with population below 1000
        $request->request->add(['current_location_id' => Location::where('population', '>', 1000)->inRandomOrder()->first()->id]);
        $request->request->add(['rank_id' => Rank::where('side', $request->side)->where('experience_required', 0)->first()->id]);
        $request->request->add(['user_id' => $this->getUser()->id]);
        $request->request->add(['dollars' => 1000.00]);
        $request->request->add(['gve_coin' => 10]);

        $newCharacter = $character->create($request->except(['_token', '_method', 'character_avatar']));

        if(!empty($request->character_avatar)){
            $newCharacter->avatar = $this->handleAvatarUpload($request, $newCharacter->id);
        }

        $newCharacter->save();

        $this->logCharacterActivity($this->getUser()->id, $newCharacter->id, 'info', 'Character Created', $newCharacter->name . ' was born', 'child_care');

        return redirect()->route('character.view', ['id' => $newCharacter->id])->withStatus(__('Character successfully created.'));
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

    protected function handleAvatarUpload($request, $characterId)
    {
        $image = $request->file('character_avatar');
        return Storage::putFileAs(
            'public/avatars', $image, $characterId . '.' .$image->getClientOriginalExtension(), 'public'
        );
    }

    protected function getCharacterAvatar($character)
    {
        if(!empty($character->avatar)) {
            return Storage::url($character->avatar);
        }

        return null;
    }
}
