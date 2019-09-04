<?php

use App\Location;
use Illuminate\Database\Seeder;

class ActivitiesTableSeeder extends Seeder
{

    /**
     * @var array
     */
    protected $activitiesRaw = [];

    /**
     * @var array
     */
    protected $activitiesParsed = [];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->buildGoodActivities();
        $this->buildBadActivities();
        //$this->buildMiddleActivities();
        $this->buildActivities();
        DB::table('activities')->insert($this->activitiesParsed);
    }

    protected function buildGoodActivities()
    {
        $this->generateActivity(
            'Help an old lady cross the road',
            'You\'ve spotted Doris on the side of the road.',
            1,
            'EXP',
            100,
            1,
            'Nice! Now Doris can crack on with her day.',
            'You twat. You had one job, and now she\'s been hit by a car... nice one.',
            50,
            'GOOD'
        );
        $this->generateActivity(
            'Move on a drug pusher',
            'Some little shit is dealing in the street. Move him on and lighten his wallet',
            1,
            'DOLLARS',
            100,
            1,
            'Well, that scared the little shit. He\'s now someone else\'s problem.',
            'Oh come on. He\'s a kid for fuck sake. Put your big girl panties on and try again',
            50,
            'GOOD'
        );
        $this->generateActivity(
            'Read up on the law',
            'You need to know this inside and out. Get educated',
            2,
            'EXP',
            150,
            1,
            'Whaho! You learned something. What do you want a cookie?',
            'What are you a teenager? You don\'t know everything Einstein.',
            40,
            'GOOD'
        );
        $this->generateActivity(
            'Actually do your day job.',
            'Whilst no one knows what your day job is exactly. Just look busy... move some papers around. Shout some orders. Not that anyone will listen.',
            2,
            'DOLLARS',
            150,
            1,
            'Well, you\'ve managed to convince everyone that you do something. Good job?',
            'There are no words to describe my disappointment in you right now. Please remove your face from my eye line.',
            40,
            'GOOD'
        );
        /*$this->generateActivity(
            '',
            '',
            3,
            'EXP',
            0,
            3,
            '',
            '',
            0,
            'GOOD'
        );
        $this->generateActivity(
            '',
            '',
            3,
            'DOLLARS',
            0,
            3,
            '',
            '',
            0,
            'GOOD'
        );
        $this->generateActivity(
            '',
            '',
            4,
            'EXP',
            0,
            3,
            '',
            '',
            0,
            'GOOD'
        );
        $this->generateActivity(
            '',
            '',
            4,
            'DOLLARS',
            0,
            3,
            '',
            '',
            0,
            'GOOD'
        );
        $this->generateActivity(
            '',
            '',
            0,
            'EXP',
            0,
            5,
            '',
            '',
            0,
            'GOOD'
        );
        $this->generateActivity(
            '',
            '',
            0,
            'DOLLARS',
            0,
            5,
            '',
            '',
            0,
            'GOOD'
        );*/
    }

    protected function buildBadActivities()
    {
        $this->generateActivity(
            'Practice your angry stare',
            'No one will take you seriously with a baby face like that. Growl into the mirror',
            1,
            'EXP',
            100,
            1,
            'Much better. I can even see the stubble trying to break through.',
            'You\'re not supposed to scare yourself in the mirror. Grow a pair.',
            50,
            'BAD'
        );
        $this->generateActivity(
            'Mug a kid',
            'Pocket money is better than nothing. Crack on',
            1,
            'DOLLARS',
            100,
            1,
            'Boom, he had a bit of cash. Don\'t you feel good about yourself?',
            'It\'s ok, not every millennial with an iPhone has money in his pocket. Why did you let him keep his phone though?',
            50,
            'BAD'
        );
        $this->generateActivity(
            'Bully some random in the street',
            'Someone in your path is just... there. Shout at them. Call them names.',
            2,
            'EXP',
            150,
            1,
            'Sorted. Made them feel like shit. Nice one.',
            'You\'re quite useless really aren\'t you?',
            40,
            'BAD'
        );
        $this->generateActivity(
            'Sell some dodgy merch at a gig',
            'Just because you printed in your living room, doesn\'t mean it\'s "official"',
            2,
            'DOLLARS',
            150,
            1,
            'None noticed and you\'ve made a nice little sum there',
            'One of the band members spotted you and called the police. Run you fool!',
            40,
            'BAD'
        );
        // Steal candy from a baby EXP
    }

    protected function buildMiddleActivities()
    {

    }

    protected function generateActivity($name, $description, $difficulty, $rewardType, $rewardMultiplier, $rankRequired, $successMessage, $failMessage, $successPercentage, $side, $coolDown = 180)
    {
        $activity = new \stdClass();
        $activity->name = $name;
        $activity->description = $description;
        $activity->difficulty = $difficulty;
        $activity->rewardType = $rewardType;
        $activity->rewardMultiplier = $rewardMultiplier;
        $activity->side = $side;
        $activity->rankRequired = $rankRequired;
        $activity->successMessage = $successMessage;
        $activity->failMessage = $failMessage;
        $activity->successPercentage = $successPercentage;
        $activity->coolDown = $coolDown;

        $this->activitiesRaw[] = $activity;
    }

    protected function buildActivities()
    {
        foreach($this->activitiesRaw as $activity){
            $this->activitiesParsed[] = [
                'name' => $activity->name,
                'description' => $activity->description,
                'difficulty' => $activity->difficulty,
                'reward_type' => $activity->rewardType,
                'reward_multiplier' => $activity->rewardMultiplier,
                'side' => $activity->side,
                'rank_required' => $activity->rankRequired,
                'success_message' => $activity->successMessage,
                'fail_message' => $activity->failMessage,
                'success_percentage' => $activity->successPercentage,
                'cool_down' => $activity->coolDown,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
    }
}
