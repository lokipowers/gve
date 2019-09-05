<?php


namespace App\Http\Controllers\Puzzles;


use App\Character;
use App\PuzzleLog;
use Illuminate\Http\Request;
use App\Http\Controllers\PuzzleController;
use App\Helpers\WordListGenerator\WordListGenerator;

class WordSearchController extends PuzzleController
{

    public function wordSearch($difficulty = null)
    {
        $wordCount = 0;
        $columnsLetters = 0;
        $rowsLetters = 0;
        switch($difficulty){
            case 'easy':
                $this->rewardDollars = 5000;
                $wordCount = 6;
                $columnsLetters = 10;
                $rowsLetters = 10;
                break;
            case 'medium':
                $this->rewardDollars = 12000;
                $wordCount = 10;
                $columnsLetters = 15;
                $rowsLetters = 15;
                break;
            case 'hard':
                $this->rewardDollars = 25000;
                $wordCount = 20;
                $columnsLetters = 20;
                $rowsLetters = 20;
                break;
            default:
                abort(404);
        }

        $this->difficulty = $difficulty;

        $this->puzzleName = 'WordSearch';
        $this->initiatePuzzle();

        $this->addData('reward', $this->getConvertedCurrency($this->rewardDollars, $this->getUser()->character->location->currency));
        $this->addData('columns', $columnsLetters);
        $this->addData('rows', $rowsLetters);
        $this->addData('wordCount', $wordCount);
        $this->addData('difficulty', $difficulty);
        $this->addData('puzzleId', $this->uniqueId);
        return $this->buildView('puzzles.wordsearch');
    }

    public function wordSearchComplete(Request $request)
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
