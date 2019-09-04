<?php

namespace App\Http\Controllers;

use App\Character;
use Illuminate\Http\Request;

class PuzzleController extends BaseController
{
    public function wordSearch()
    {
        return $this->buildView('puzzles.wordsearch');
    }

    public function wordSearchComplete()
    {

        $character = Character::where('id', $this->getUser()->character->id)->first();

        $character->dollars += 25000;

        $character->save();

        return response()->json([
            'message' => 'Smashed it!',
            'earnings' => 25000
        ]);
    }
}
