<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RanksTableSeeder extends Seeder
{

    /**
     * @var array
     */
    protected $ranks;

    protected $imageLocation = '/images/icons/ranks/';

    protected $expLevels = [
        0,
        100,
        250,
        500,
        1000,
        2000,
        3500,
        5000,
        8000,
        12000,
        18000,
        25000,
        30000,
        40000,
        55000,
        70000,
        90000,
        120000,
        150000,
        200000,
        300000,
        450000,
        600000,
        800000,
        1000000,
        2000000,
        4000000,
        6000000,
        10000000,
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->goodRanks();
        $this->badRanks();
        $this->middleRanks();
        DB::table('ranks')->insert($this->ranks);
    }

    protected function buildRanks($ranks, $side)
    {

        $index = 0;
        foreach($ranks as $rank) {
            $this->ranks[] = [
                'name' => $rank->name,
                'description' => $rank->description,
                'side' => $side,
                'icon' => $rank->icon,
                'experience_required' => $this->expLevels[$index],
                'deleted_at' => null,
                'created_at' => now(),
                'updated_at' => now()
            ];
            $index++;
        }
        return true;
    }

    /**
     *
     */
    protected function goodRanks()
    {

        $private = new stdClass();
        $private->name = 'Private';
        $private->description = '';
        $private->icon = 'private.png';

        $privateSecond = new stdClass();
        $privateSecond->name = 'Private Second Class';
        $privateSecond->description = '';
        $privateSecond->icon = 'private-second-class.png';

        $privateFirst = new stdClass();
        $privateFirst->name = 'Private First Class';
        $privateFirst->description = '';
        $privateFirst->icon = 'private-first-class.png';

        $specialist = new stdClass();
        $specialist->name = 'Specialist';
        $specialist->description = '';
        $specialist->icon = 'specialist.png';

        $corporal = new stdClass();
        $corporal->name = 'Corporal';
        $corporal->description = '';
        $corporal->icon = 'corporal.png';

        $sergeant = new stdClass();
        $sergeant->name = 'Sergeant';
        $sergeant->description = '';
        $sergeant->icon = 'sergeant.png';

        $staffSergeant = new stdClass();
        $staffSergeant->name = 'Staff Sergeant';
        $staffSergeant->description = '';
        $staffSergeant->icon = 'staff-sergeant.png';

        $sergeantFirst = new stdClass();
        $sergeantFirst->name = 'Sergeant First Class';
        $sergeantFirst->description = '';
        $sergeantFirst->icon = 'sergeant-first-class.png';

        $masterSergeant = new stdClass();
        $masterSergeant->name = 'Master Sergeant';
        $masterSergeant->description = '';
        $masterSergeant->icon = 'master-sergeant.png';

        $firstSergeant = new stdClass();
        $firstSergeant->name = 'First Sergeant';
        $firstSergeant->description = '';
        $firstSergeant->icon = 'first-sergeant.png';

        $sergeantMajor = new stdClass();
        $sergeantMajor->name = 'Sergeant Major';
        $sergeantMajor->description = '';
        $sergeantMajor->icon = 'sergeant-major.png';

        $commandSergeant = new stdClass();
        $commandSergeant->name = 'Command Sergeant Major';
        $commandSergeant->description = '';
        $commandSergeant->icon = 'command-sergeant-major.png';

        $sergeantMajorW = new stdClass();
        $sergeantMajorW->name = 'Sergeant Major of the World';
        $sergeantMajorW->description = '';
        $sergeantMajorW->icon = 'sergeant-major-of-the-world.png';

        $warrantOfficer = new stdClass();
        $warrantOfficer->name = 'Warrant Officer';
        $warrantOfficer->description = '';
        $warrantOfficer->icon = 'warrant-officer.png';

        $chiefWarrantOfficer1 = new stdClass();
        $chiefWarrantOfficer1->name = 'Chief Warrant Officer 1';
        $chiefWarrantOfficer1->description = '';
        $chiefWarrantOfficer1->icon = 'chief-warrant-officer-1.png';

        $chiefWarrantOfficer2 = new stdClass();
        $chiefWarrantOfficer2->name = 'Chief Warrant Officer 2';
        $chiefWarrantOfficer2->description = '';
        $chiefWarrantOfficer2->icon = 'chief-warrant-officer-2.png';

        $chiefWarrantOfficer3 = new stdClass();
        $chiefWarrantOfficer3->name = 'Chief Warrant Officer 3';
        $chiefWarrantOfficer3->description = '';
        $chiefWarrantOfficer3->icon = 'chief-warrant-officer-3.png';

        $chiefWarrantOfficer4 = new stdClass();
        $chiefWarrantOfficer4->name = 'Chief Warrant Officer 4';
        $chiefWarrantOfficer4->description = '';
        $chiefWarrantOfficer4->icon = 'chief-warrant-officer-4.png';

        $secondLieutenant = new stdClass();
        $secondLieutenant->name = 'Second Lieutenant';
        $secondLieutenant->description = '';
        $secondLieutenant->icon = 'second-lieutenant.png';

        $firstLieutenant = new stdClass();
        $firstLieutenant->name = 'First Lieutenant';
        $firstLieutenant->description = '';
        $firstLieutenant->icon = 'first-lieutenant.png';

        $captain = new stdClass();
        $captain->name = 'Captain';
        $captain->description = '';
        $captain->icon = 'captain.png';

        $major = new stdClass();
        $major->name = 'Major';
        $major->description = '';
        $major->icon = 'major.png';

        $lieutenantColonel = new stdClass();
        $lieutenantColonel->name = 'Lieutenant Colonel';
        $lieutenantColonel->description = '';
        $lieutenantColonel->icon = 'lieutenant-colonel.png';

        $colonel = new stdClass();
        $colonel->name = 'Colonel';
        $colonel->description = '';
        $colonel->icon = 'colonel.png';

        $brigadierGeneral = new stdClass();
        $brigadierGeneral->name = 'Brigadier General';
        $brigadierGeneral->description = '';
        $brigadierGeneral->icon = 'brigadier-general.png';

        $majorGeneral = new stdClass();
        $majorGeneral->name = 'Major General';
        $majorGeneral->description = '';
        $majorGeneral->icon = 'major-general.png';

        $lieutenantGeneral = new stdClass();
        $lieutenantGeneral->name = 'Lieutenant General';
        $lieutenantGeneral->description = '';
        $lieutenantGeneral->icon = 'lieutenant-general.png';

        $general = new stdClass();
        $general->name = 'General';
        $general->description = '';
        $general->icon = 'general.png';

        $generalW = new stdClass();
        $generalW->name = 'General of the World';
        $generalW->description = '';
        $generalW->icon = 'general-of-the-world.png';

        $this->buildRanks(
            [
                $private,
                $privateFirst,
                $privateSecond,
                $specialist,
                $corporal,
                $sergeant,
                $staffSergeant,
                $sergeantFirst,
                $masterSergeant,
                $firstSergeant,
                $sergeantMajor,
                $commandSergeant,
                $sergeantMajorW,
                $warrantOfficer,
                $chiefWarrantOfficer1,
                $chiefWarrantOfficer2,
                $chiefWarrantOfficer3,
                $chiefWarrantOfficer4,
                $secondLieutenant,
                $firstLieutenant,
                $captain,
                $major,
                $lieutenantColonel,
                $colonel,
                $brigadierGeneral,
                $majorGeneral,
                $lieutenantGeneral,
                $general,
                $generalW
            ],
            'GOOD'
        );

    }

    /**
     *
     */
    protected function badRanks()
    {
        $nobody = new stdClass();
        $nobody->name = 'Nobody';
        $nobody->description = '';
        $nobody->icon = 'nobody.png';

        $streetThug = new stdClass();
        $streetThug->name = 'Street Thug';
        $streetThug->description = '';
        $streetThug->icon = 'street-thug.png';

        $this->buildRanks(
            [
                $nobody,
            ],
            'BAD'
        );
    }

    /**
     *
     */
    protected function middleRanks()
    {
        $pusher = new stdClass();
        $pusher->name = 'Pusher';
        $pusher->description = '';
        $pusher->icon = 'pusher.png';

        $goToGuy = new stdClass();
        $goToGuy->name = 'Go to Guy';
        $goToGuy->description = '';
        $goToGuy->icon = 'go-to-guy.png';

        $streetTrader = new stdClass();
        $streetTrader->name = 'Street Trader';
        $streetTrader->description = '';
        $streetTrader->icon = 'street-trader.png';

        $shopOwner = new stdClass();
        $shopOwner->name = 'Shop Owner';
        $shopOwner->description = '';
        $shopOwner->icon = 'shop-owner.png';

        $franchiseOwner = new stdClass();
        $franchiseOwner->name = 'Franchise Owner';
        $franchiseOwner->description = '';
        $franchiseOwner->icon = 'franchise-owner.png';

        $internetSeller = new stdClass();
        $internetSeller->name = 'Internet Seller';
        $internetSeller->description = '';
        $internetSeller->icon = 'internet-seller.png';

        $this->buildRanks(
            [
                $pusher,
                $goToGuy,
                $streetTrader,
                $shopOwner,
                $franchiseOwner,
                $internetSeller
            ],
            'MIDDLE'
        );
    }
}
