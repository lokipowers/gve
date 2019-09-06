<?php

namespace App\Http\Controllers;

use App\PuzzleLog;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends BaseController
{
    protected $characterId;

    public function index()
    {
        $this->characterId = $this->getUser()->character->id;

        $this->buildWidgets();
        return $this->buildView('dashboard');
    }

    protected function buildWidgets()
    {
        $widgets = new \stdClass();
        $widgets->puzzles = $this->puzzlesWidgets();

        $this->addData('widgets', $widgets);
    }

    protected function puzzlesWidgets()
    {
        $puzzlesData = PuzzleLog::where('character_id', $this->characterId)->get();

        $puzzles = [];

        $today = Carbon::now();

        foreach($puzzlesData as $puzzle){

            $difficulty = $puzzle->difficulty;
            $attempted = count($puzzlesData->toArray());


            if(!isset($puzzles[$puzzle->name])){
                $puzzles[$puzzle->name] = new \stdClass();
            }
            if(!isset($puzzles[$puzzle->name]->$difficulty)){
                $puzzles[$puzzle->name]->$difficulty = 0;
            }
            if(!isset($puzzles[$puzzle->name]->reward_dollars)){
                $puzzles[$puzzle->name]->reward_dollars = 0;
            }
            if(!isset($puzzles[$puzzle->name]->total_played)){
                $puzzles[$puzzle->name]->total_played = 0;
            }
            if(!isset($puzzles[$puzzle->name]->completed)){
                $puzzles[$puzzle->name]->completed = 0;
            }

            if($puzzle->created_at->diffInDays($today) < 7){
                if(!isset($puzzles[$puzzle->name]->days_played[$puzzle->created_at->format('Y-m-d')])){
                    $puzzles[$puzzle->name]->days_played[$puzzle->created_at->format('Y-m-d')] = 0;
                }
                $puzzles[$puzzle->name]->days_played[$puzzle->created_at->format('Y-m-d')]++;
            }

            if($puzzle->is_complete === 1){
                $puzzles[$puzzle->name]->completed++;
            }

            $puzzles[$puzzle->name]->attempted = $attempted;
            $puzzles[$puzzle->name]->$difficulty++;
            $puzzles[$puzzle->name]->total_played++;
            $puzzles[$puzzle->name]->reward_dollars += $puzzle->reward_dollars;
            $puzzles[$puzzle->name]->last_played = $puzzle->updated_at;


        }

        return $puzzles;
    }
}
