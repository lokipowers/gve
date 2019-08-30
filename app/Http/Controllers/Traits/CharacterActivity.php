<?php


namespace App\Http\Controllers\Traits;


use App\CharacterActivityLog;
use Illuminate\Support\Facades\Auth;

trait CharacterActivity
{

    public function __construct()
    {

    }

    protected function logCharacterActivity(int $userId, int $characterId, string $status, string $name, string $content, string $icon = null)
    {
        $activity = new CharacterActivityLog();

        $activity->user_id = $userId;
        $activity->character_id = $userId;
        $activity->status = $status;
        $activity->name = $name;
        $activity->content = $content;
        $activity->icon = $icon;

        $activity->save();
    }

}
