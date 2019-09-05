<?php


namespace App\Http\Controllers\Puzzles;


use App\Http\Controllers\PuzzleController;

class ImageDragController extends PuzzleController
{
    public function puzzle($difficulty = null)
    {
        $slices = 3;

        switch($difficulty){
            case 'easy':
                $this->rewardDollars = 1000;
                $slices = 3;
                break;
            case 'medium':
                $this->rewardDollars = 5000;
                $slices = 4;
                break;
            case 'hard':
                $this->rewardDollars = 10000;
                $slices = 5;
                break;
            case 'insane':
                $this->rewardDollars = 25000;
                $slices = 10;
                break;
            default:
                abort(404);
        }
        $this->difficulty = $difficulty;
        $this->puzzleName = 'ImageDrag';
        $this->initiatePuzzle();

        $this->addData('slices', $slices);
        $this->addData('reward', $this->getConvertedCurrency($this->rewardDollars, $this->getUser()->character->location->currency));
        $this->addData('difficulty', $difficulty);
        $this->addData('puzzleId', $this->uniqueId);
        return $this->buildView('puzzles.slidingPuzzle');
    }
}
