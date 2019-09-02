<?php


namespace App\Http\Controllers\Traits;


use App\CharacterActivityLog;
use Illuminate\Support\Facades\Auth;

trait CharacterActivity
{


    protected function logCharacterActivity(int $userId, int $characterId, string $status, string $name, string $content, string $icon = null)
    {
        $activity = new CharacterActivityLog();

        $activity->user_id = $userId;
        $activity->character_id = $characterId;
        $activity->status = $status;
        $activity->name = $name;
        $activity->content = $content;
        $activity->icon = $icon;

        $activity->save();
    }

}
