<?php

namespace App\Http\Controllers;

use App\Character;
use App\Http\Controllers\Traits\CurrencyConverter;
use App\PuzzleLog;
use Illuminate\Http\Request;

class PuzzleController extends BaseController
{

    use CurrencyConverter;

    protected $puzzleName;
    protected $uniqueId;
    protected $rewardDollars;
    protected $difficulty;

    protected function initiatePuzzle()
    {

        $this->uniqueId = uniqid($this->puzzleName);

        $puzzle = new PuzzleLog();
        $puzzle->unique_id = $this->uniqueId;
        $puzzle->name = $this->puzzleName;
        $puzzle->character_id = $this->getUser()->character->id;
        $puzzle->reward_dollars = $this->rewardDollars;
        $puzzle->difficulty = $this->difficulty;
        $puzzle->save();

    }

    public function completePuzzle(Request $request)
    {

        $puzzle = PuzzleLog::where([
            ['unique_id', $request->unique_id],
            ['is_complete', 0]
        ])->firstOrFail();

        $puzzle->is_complete = 1;
        $puzzle->save();

        $character = Character::where('id', $this->getUser()->character->id)->first();
        $character->dollars += $puzzle->reward_dollars;
        $character->save();

        return response()->json([
            'message' => 'Smashed it!',
            'earnings' => $puzzle->reward_dollars
        ]);
    }

}
