<?php


namespace App\Http\Controllers\Puzzles;


use App\Http\Controllers\PuzzleController;

class CrossButtonController extends PuzzleController
{
    public function puzzle($difficulty = null)
    {
        $rows = 3;
        $columns = 3;

        switch($difficulty){
            case 'easy':
                $this->rewardDollars = 1000;
                break;
            case 'medium':
                $this->rewardDollars = 5000;
                break;

            case 'hard':
                $this->rewardDollars = 10000;
                break;
            default:
                abort(404);
        }
        $this->difficulty = $difficulty;
        $this->puzzleName = 'CrossButton';
        $this->initiatePuzzle();

        $this->addData('reward', $this->getConvertedCurrency($this->rewardDollars, $this->getUser()->character->location->currency));
        $this->addData('columns', $columns);
        $this->addData('rows', $rows);
        $this->addData('difficulty', $difficulty);
        $this->addData('puzzleId', $this->uniqueId);
        return $this->buildView('puzzles.slidingPuzzle');
    }
}
