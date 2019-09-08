<?php

namespace App\Console\Commands;

use App\Vehicle;
use Illuminate\Console\Command;
use Spatie\Image\Manipulations;

class GenerateVehicles extends Command
{
    protected $vehiclesRaw = [];

    protected $progressBar;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gve:generateVehicles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh and create all Vehicles';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->line('Refreshing Vehicles Table');
        \Artisan::call('migrate:refresh --path=/database/migrations/2019_09_01_145204_create_vehicles_table.php');
        //$this->line('Seeding Vehicles Table');
        //\Artisan::call('db:seed --class=VehiclesTableSeeder');
        //$this->info('Done');
        $this->line('Gathering Vehicle Data');
        $this->vehicles();
        $this->line('Adding Vehicles...');

        $this->processVehicle();

        $this->info('Complete');

    }

    protected function vehicles()
    {
        // All dimensions are in mm.
        // All weights are in kg

        // Audi
        $this->generateVehicle(
            'Audi A1 Sportback',
            'Compact 5-door Sportback with LED headlights, Audi Smartphone interface and Audi Pre-sense front',
            'https://www.audi.co.uk/content/dam/audiadaptive/car-images/Web-Tablet/Side-Images/A1/new_a1sb_sport_side.png',
            21562.1800,
            3.5,
            4.4,
            3.8,
            137,
            7.5,
            147,
            1409,
            1740,
            4029,
            1260,
            [
                'https://www.audi.co.uk/content/dam/audiadaptive/Campaign-Pages/sbs/eos/a1/A1_1.jpg',
                'https://www.audi.co.uk/content/dam/audiadaptive/Campaign-Pages/sbs/eos/a1/A1_2.jpg',
                'https://www.audi.co.uk/content/dam/audiadaptive/Campaign-Pages/sbs/eos/a1/Hero_desktop.jpg'
            ]
        );

        $this->generateVehicle(
            'Audi S3 Cabriolet',
            '-door performance cabriolet with automatic acoustic hood, distinctive ‘S’ styling, and Fine Nappa leather seats.',
            'https://www.audi.co.uk/content/dam/audiadaptive/car-images/Web-Tablet/Side-Images/A3/A3-Cabriolet-Side.png',
            52206.3700,
            4.3,
            4.2,
            4.1,
            155,
            4.6,
            300,
            1409,
            1793,
            4423,
            1635,
            [
                'https://www.audi.co.uk/content/dam/audiadaptive/Campaign-Pages/sbs/eos/a3/A3_1.jpg',
                'https://www.audi.co.uk/content/dam/audiadaptive/Campaign-Pages/sbs/eos/a3/A3_2.jpg',
            ]
        );
        $this->generateVehicle(
            'Audi RS 3 Saloon',
            '4-door performance saloon with quattro all-wheel drive and 2.5-litre turbocharged five-cylinder engine.',
            'https://www.audi.co.uk/content/dam/audiadaptive/car-images/Web-Tablet/Side-Images/A3/a3_rs3_saloon_side_19.png',
            57489.0100,
            4.3,
            4.2,
            4.1,
            155,
            4.6,
            300,
            1397,
            1802,
            4479,
            1535,
            [
                'https://www.audi.co.uk/content/dam/audiadaptive/Campaign-Pages/sbs/eos/a3/A3_Hero_desktop.jpg',
                'https://www.audi.co.uk/content/dam/audiadaptive/Campaign-Pages/sbs/eos/a3/A3_2.jpg',
                'https://www.audi.co.uk/content/dam/audiadaptive/Campaign-Pages/sbs/eos/a3/A3_3.jpg'
            ]
        );
        $this->generateVehicle(
            'Audi RS 3 Sportback',
            '5-door performance hatchback with quattro all-wheel drive and 2.5-litre turbocharged five-cylinder engine.',
            'https://www.audi.co.uk/content/dam/audiadaptive/car-images/Web-Tablet/Side-Images/A3/rs3_sportback_side_19.png',
            56273.21,
            4.3,
            4.2,
            4.1,
            155,
            4.6,
            300,
            1411,
            1800,
            4335,
            1530,
            [
                'https://www.audi.co.uk/content/dam/audiadaptive/trim-features/Web-Tablet/A3/Seats/RS3_Sportback_seats.jpeg',
                'https://www.audi.co.uk/content/dam/audiadaptive/Campaign-Pages/sbs/eos/a3/A3_1.jpg'
            ]
        );

        $this->generateVehicle(
            'Audi S4 Saloon',
            '4-door performance Saloon with unique S4 exterior styling, enhanced brakes and suspension.',
            'https://www.audi.co.uk/content/dam/audiadaptive/MY20/A4/S4-Saloon/S4-Saloon/s4saloon-side-d1.png',
            58358.30,
            4.4,
            4.6,
            4.2,
            155,
            5.7,
            347,
            1369,
            1854,
            4640,
            1750,
            [
                'https://www.audi.co.uk/content/dam/audiadaptive/MY20/A4/S4-Saloon/S4-Saloon/s4saloon_headlights.jpg',
                'https://www.audi.co.uk/content/dam/audiadaptive/MY20/A4/S4-Saloon/S4-Saloon/s4saloon_seats.jpg',
                'https://www.audi.co.uk/content/dam/audiadaptive/MY20/A4/S4-Saloon/S4-Saloon/s4saloon_auditech.jpg'
            ]
        );
        $this->generateVehicle(
            'Audi RS 4 Avant',
            '5-door high-performance sports estate with a 2.9 TFSI engine with quattro all-wheel drive, RS styling, RS Sport exhaust and and Audi Virtual Cockpit.',
            'https://www.audi.co.uk/content/dam/audiadaptive/MY20/A4/RS4/rs_4_avant--side.png',
            82169.71,
            4.4,
            4.6,
            4.2,
            155,
            5.7,
            347,
            1434,
            1842,
            4725,
            1620,
            [
                'https://www.audi.co.uk/content/dam/audiadaptive/MY20/A4/S4-Saloon/S4-Saloon/s4saloon_headlights.jpg',
                'https://www.audi.co.uk/content/dam/audiadaptive/MY20/A4/S4-Saloon/S4-Saloon/s4saloon_seats.jpg',
                'https://www.audi.co.uk/content/dam/audiadaptive/MY20/A4/S4-Saloon/S4-Saloon/s4saloon_auditech.jpg'
            ]
        );
        $this->generateVehicle(
            'Audi A5 Cabriolet',
            '2-door Cabriolet with fully automatic acoustic hood and Parking system plus.',
            'https://www.audi.co.uk/content/dam/audiadaptive/car-images/Web-Tablet/Side-Images/A5/a5-cab-sline-19-side.png',
            47075.70,
            4.2,
            3.5,
            4.3,
            155,
            5.1,
            354,
            1383,
            1846,
            4673,
            1760,
            [
                'https://www.audi.co.uk/content/dam/audiadaptive/trim-features/Web-Tablet/A5/Headlights/a5-coupe-sport-headlights-19.jpeg',
                'https://www.audi.co.uk/content/dam/audiadaptive/trim-features/Web-Tablet/A5/Seats/Front-Sport-seats.jpeg'
            ]
        );
        $this->generateVehicle(
            'Audi RS 5 Coupe',
            '2-door high-performance sports Coupé with a 2.9 TFSI engine with quattro all-wheel drive, RS styling, RS Sport exhaust and and Audi Virtual Cockpit.',
            'https://www.audi.co.uk/content/dam/audiadaptive/MY20/A5/RS5-Coupe/RS5-Coupe-Side.png',
            83871.83,
            4.4,
            5.0,
            3.5,
            174,
            3.9,
            354,
            1360,
            1861,
            4723,
            1685
        );
        $this->generateVehicle(
            'Audi RS 5 Sportback',
            '5-door high-performance sports car with a 2.9 TFSI engine with quattro all-wheel drive, RS styling, RS Sport exhaust and and Audi Virtual Cockpit.',
            'https://www.audi.co.uk/content/dam/audiadaptive/MY20/A5/RS5-Sportback/RS5-Sportback-Side.png',
            83871.83,
            4.4,
            5.0,
            3.5,
            174,
            3.9,
            354,
            1386,
            1843,
            4733,
            1720
        );
        $this->generateVehicle(
            'Audi S6 Saloon',
            '4-door performance Saloon with a 4.0-litre V8 TFSI engine, quattro and S Super Sport front seats.',
            'https://www.audi.co.uk/content/dam/audiadaptive/MY20/A6/S6-Saloon/s6_saloon--side.png',
            73215.36,
            4.4,
            4.4,
            4.6,
            255,
            5.0,
            349,
            1435,
            1803,
            4892,
            1730
        );
        $this->generateVehicle(
            'Audi S7 Sportback',
            '5-door performance Sportback with Matrix LED headlights, Virtual Cockpit and heated Super Sport seats.',
            'https://www.audi.co.uk/content/dam/audiadaptive/MY20/A7/S7-Sportback/s7_sportback--side.png',
            83501.01,
            4.4,
            4.4,
            4.6,
            255,
            5.0,
            349,
            1422,
            1908,
            4969,
            2010
        );
        $this->generateVehicle(
            'Audi SQ5',
            '5-door performance SUV with distinctive \'S\' styling, Audi Virtual Cockpit and Fine Nappa leather seats.',
            'https://www.audi.co.uk/content/dam/audiadaptive/MY20/Q5/SQ5/sq5--side.png',
            66911.44,
            4.0,
            4.5,
            3.5,
            155,
            5.1,
            313,
            1635,
            1893,
            4671,
            2055
        );
        $this->generateVehicle(
            'Audi Q8',
            'Luxury SUV with Matrix LED headlights, MMI Navigation and Parking System Plus.',
            'https://www.audi.co.uk/content/dam/audiadaptive/MY20/Q8/s-line/q8_sline_side.png',
            81470.62,
            3.7,
            4.5,
            4.4,
            144,
            6.3,
            286,
            1708,
            1995,
            4986,
            2365,
            [
                'https://www.audi.co.uk/content/dam/audiadaptive/trim-features/Web-Tablet/Q8/Headlights/Q8-Sline-Headlights.jpeg',
                'https://www.audi.co.uk/content/dam/audiadaptive/MY20/Q8/s-line/q8-sline-seats.jpeg',
                'https://www.audi.co.uk/content/dam/audiadaptive/MY20/Q8/s-line/q8-sline-auditech.jpeg'
            ]
        );
        $this->generateVehicle(
            'Audi TT RS Coupé',
            '2 door high-performance sports coupé with a 2.5-litre TFSI 5-cylinder engine, ‘RS’ styling and Audi virtual cockpit with a RS specific screen.',
            'https://www.audi.co.uk/content/dam/audiadaptive/MY20/TT/TTRS-Coupe/TTRS/ttrs_coupe_ttrs-coupe_side.png',
            66741.23,
            4.5,
            4.0,
            4.0,
            174,
            3.7,
            395,
            1343,
            1832,
            4201,
            1450
        );
        $this->generateVehicle(
            'Audi TT RS Roadster',
            '2 door high-performance sports coupé with a 2.5-litre TFSI 5-cylinder engine, ‘RS’ styling and Audi Virtual Cockpit with a RS specific screen',
            'https://www.audi.co.uk/content/dam/audiadaptive/MY20/TT/TTRS-Roadster/TTRS/ttrs_roadster_side_new.png',
            68868.88,
            4.5,
            4.0,
            4.0,
            155,
            3.9,
            395,
            1343,
            1832,
            4201,
            1510
        );

        $this->generateVehicle(
            'Audi R8 Coupé',
            '2-door high-performance Audi Sport coupé with a 5.2 litre V10 engine, Audi Virtual Cockpit, dual-branch oval tailpipes and parking system plus.',
            'https://www.audi.co.uk/content/dam/audiadaptive/car-images/Web-Tablet/Side-Images/R8/r8_coupev10-quattro_side_19.png',
            155865.3000,
            4.7,
            4.3,
            4.7,
            205,
            3.2,
            610,
            1240,
            1940,
            4426,
            1555,
            [
                'https://www.audi.co.uk/content/dam/audiadaptive/trim-features/Web-Tablet/R8/Headlights/r8_v10_quattro-headlights.jpeg',
                'https://www.audi.co.uk/content/dam/audiadaptive/trim-features/Web-Tablet/R8/Seats/r8_v10_quattro-seats.jpeg',
                'https://www.audi.co.uk/content/dam/audiadaptive/trim-features/Web-Tablet/R8/Suspension/r8_v10_quattro-performance.jpeg'
            ]
        );
        $this->generateVehicle(
            'Audi R8 Spyder',
            '2-door high-performance Audi Sport convertible with a 5.2 litre V10 engine, Audi Virtual Cockpit, dual-branch oval tailpipes and parking system plus.',
            'https://www.audi.co.uk/content/dam/audiadaptive/car-images/Web-Tablet/Side-Images/R8/r8_spyder10-quattro_side_19.png',
            166430.59,
            4.9,
            3.5,
            4.7,
            200,
            3.2,
            620,
            1240,
            1940,
            4426,
            1695,
            [
                'https://www.audi.co.uk/content/dam/audiadaptive/trim-features/Web-Tablet/R8/Headlights/r8_v10_quattro-headlights.jpeg',
                'https://www.audi.co.uk/content/dam/audiadaptive/trim-features/Web-Tablet/R8/Seats/r8_v10_quattro-seats.jpeg',
                'https://www.audi.co.uk/content/dam/audiadaptive/trim-features/Web-Tablet/R8/AudioCommunication/r8_v10_quattro-audiotech.jpg'
            ]
        );
        $this->generateVehicle(
            'Audi E-Tron',
            'Fully electric, 5-door SUV with virtual door mirrors, Pre-sense Front and Basic, and a rear-view camera as standard.',
            'https://www.audi.co.uk/content/dam/audiadaptive/car-images/Web-Tablet/Side-Images/e-tron/e-tron-launch-edition-side.png',
            166430.59,
            4.0,
            4.8,
            4.3,
            124,
            5.7,
            402,
            1629,
            1935,
            4901,
            2560,
            [
                'https://www.audi.co.uk/content/dam/audiadaptive/trim-features/e-tron/Desktop/e-tron-headlight.jpeg',
                'https://www.audi.co.uk/content/dam/audiadaptive/trim-features/e-tron/Desktop/e-tron-seats.jpeg',
                'https://www.audi.co.uk/content/dam/audiadaptive/trim-features/e-tron/Desktop/e-tron-suspension.jpg'
            ]
        );

        // Lambo
        $this->generateVehicle(
            'Lamborghini Huracan Evo Spyder',
            'Driving a Spyder is a thrill in itself, but the Huracán Evo Spyder was created to amplify your driving experience to the max. Color, scent, and sound become one with the car’s compelling design and ultra-lightweight materials.
The power of the 640 CV V10 engine vibrates into a roar, and the supersport exhaust sound fills your ears. The car’s perfectly sleek, aerodynamic body slices through the air, and you race along with it; the thrill of your desire, lifting you higher',
            'https://www.lamborghini.com/sites/it-en/files/DAM/lamborghini/model/huracan/evo-slider/NEW/huracan-evo-spyder.png',
            265210.53,
            4.9,
            4.8,
            4.7,
            202,
            2.9,
            629,
            1180,
            1933,
            4520,
            1542,
            [
                'https://www.lamborghini.com/sites/it-en/files/DAM/lamborghini/model/huracan/evo-slider/int_right.jpg',
                'https://www.lamborghini.com/sites/it-en/files/DAM/lamborghini/model/huracan/evo-slider/design-left.jpg',
                'https://www.lamborghini.com/sites/it-en/files/DAM/lamborghini/model/huracan/evo-slider/RP---Huracan-Evo-20.jpg'
            ]
        );
        $this->generateVehicle(
            'Lamborghini Huracan Evo',
            'The Huracán EVO represents the natural evolution of the most successful V10 in Lamborghini history. It is the result of fine-tuning and consolidation which involves the already existing features and performance of Huracán, combined with the development of new solutions in terms of efficiency and design. But overall this vehicle stands out for its ability to anticipate the moves and satisfy the desires of the driver, in harmony with the Lamborghini DNA.',
            'https://www.lamborghini.com/sites/it-en/files/DAM/lamborghini/gateway-family/huracan/car/huracan-evo.png',
            250454.39,
            4.9,
            4.8,
            4.7,
            202,
            2.9,
            629,
            1180,
            1933,
            4520,
            1542,
            [
                'https://www.lamborghini.com/sites/it-en/files/DAM/lamborghini/model/huracan/Evo/restyle/upgrade/overview-right.jpg',
                'https://www.lamborghini.com/sites/it-en/files/DAM/lamborghini/model/huracan/Evo/restyle/upgrade/design-right.jpg',
                'https://www.lamborghini.com/sites/it-en/files/DAM/lamborghini/model/huracan/Evo/restyle/RP---Huracan-Evo-3.jpg',
            ]
        );
        $this->generateVehicle(
            'Lamborghini Huracan Performante Spyder',
            'The Huracán Performante has decided to lower its roof and transform itself into the Spyder with the highest performance that the Huracán family has ever seen. Its lines are designed to thrill at first sight and its state-of-the-art technology has been developed to provide a one-of-a-kind driving experience. Weighing in at 35 kg less than the Huracán 4WD Spyder and with 30 HP more, this newest addition to the House of the Raging Bull vaunts the best power-to-weight ratio in the Huracán Spyder range. It uses Forged Composites® material and the new ALA (Lamborghini Active Aerodynamics) technology. The Huracán Performante Spyder: power has become breathtakingly beautiful.',
            'https://www.lamborghini.com/sites/it-en/files/DAM/lamborghini/gateway-family/huracan/car/hps-carousel-family.png',
            289359.92,
            4.9,
            4.8,
            4.7,
            201,
            3.1,
            629,
            1180,
            1924,
            4506,
            1507,
            [
                'https://www.lamborghini.com/sites/it-en/files/DAM/lamborghini/model/huracan/huracan-performante-spyder/overview-right.jpg',
                'https://www.lamborghini.com/sites/it-en/files/DAM/lamborghini/model/huracan/huracan-performante-spyder/intern2.jpg',
                'https://www.lamborghini.com/sites/it-en/files/DAM/lamborghini/model/huracan/huracan-performante-spyder/design-left.jpg'
            ]
        );
        $this->generateVehicle(
            'Lamborghini Huracan Performante',
            'The Huracán Performante has reworked the concept of super sports cars and taken the notion of performance to levels never seen before. The vehicle has been re-engineered in its entirety, as regards its weight, engine power, chassis and above all by introducing an innovative system of active aerodynamics: ALA. The use of the awarded Forged Composites®, a shapable forged carbon fiber material patented by Automobili Lamborghini, is a real nice touch and it contributes to make the vehicle even lighter in weight. Besides its extraordinary technological properties, it also conveys a new idea of beauty.',
            'https://www.lamborghini.com/sites/it-en/files/DAM/lamborghini/model/huracan/car-slider/huracan-performante/performante-carousel-family.png',
            261396.57,
            4.9,
            4.8,
            4.7,
            201,
            2.9,
            629,
            1165,
            1924,
            4506,
            1382,
            [
                'https://www.lamborghini.com/sites/it-en/files/DAM/lamborghini/model/huracan/huracan-performante/intern2-huracan-performante.jpg',
                'https://www.lamborghini.com/sites/it-en/files/DAM/lamborghini/model/configuratore%20nuovo/huracan-performante-configuratore.jpg',
            ]
        );
        $this->generateVehicle(
            'Lamborghini Aventador SVJ Roadster',
            'There’s only one adjective to describe SVJ Roadster: unrivaled.
Produced in just 800 units, it is the most iconic model of the Aventador family, thanks to its aerodynamic lines that slice through the air, and its breathtaking design, the expression of the most refined Italian taste and craftsmanship.',
            'https://www.lamborghini.com/sites/it-en/files/DAM/lamborghini/model/aventador/aventador-svj-roadster/car/SVJ_Roadster_gateway%20Aventador.png',
            467043.94,
            4.9,
            4.7,
            4.6,
            217,
            2.9,
            758,
            1136,
            2098,
            4943,
            1575,
            [
                'https://www.lamborghini.com/sites/it-en/files/DAM/lamborghini/model/aventador/aventador-svj-roadster/header.jpg',
                'https://www.lamborghini.com/sites/it-en/files/DAM/lamborghini/model/aventador/aventador-svj/PAGINA%20MODELLO_DEF/compressed/freni-avendator-svj-3.jpg',
                'https://www.lamborghini.com/sites/it-en/files/DAM/lamborghini/model/aventador/aventador-svj-roadster/intern2.jpg'
            ]
        );
        $this->generateVehicle(
            'Lamborghini Aventador SVJ',
            'The future is unknown. It is a journey, an adventure. And above all, it is a challenge.
Lamborghini has never shied away from challenges, which is precisely why it created the new Aventador SVJ. To combine cutting-edge technology with extraordinary design, without ever coming to compromises.
In a future driven by technology, it’s easy to lose track of emotions. But in the future we are shaping, real emotions won’t be left behind. Because at the wheel, there will always be a person.
Aventador SVJ. Real emotions shape the future.',
            'https://www.lamborghini.com/sites/it-en/files/DAM/lamborghini/gateway-family/aventador/aventador%20svj/aventador-svj-coup%C3%A8/car.png',
            425529.30,
            4.9,
            4.7,
            4.6,
            217,
            2.9,
            758,
            1136,
            2098,
            4943,
            1575,
            [
                'https://www.lamborghini.com/sites/it-en/files/DAM/lamborghini/model/aventador/aventador-svj/Restyling/Lamborghini_Aventador_SVJ_Green_Track_09.jpg',
                'https://www.lamborghini.com/sites/it-en/files/DAM/lamborghini/model/aventador/aventador-svj/Restyling/design-left.jpg',
                'https://www.lamborghini.com/sites/it-en/files/DAM/lamborghini/model/aventador/aventador-svj/Restyling/white_interior_final.jpg'
            ]
        );
        $this->generateVehicle(
            'Lamborghini Aventador S Roadster',
            'The icon that inherited the legacy of the historic S models of the Miura, Islero, Countach, and Urraco returns to outdo itself in its most exciting version: the Aventador S Roadster.
The new V12 engine with a whopping 740 HP and the exclusiveness of Lamborghini design, unparalleled in this open top version, are joined in the Aventador S Roadster by the most sophisticated technology of the range, including the new LDVA (Lamborghini Dinamica Veicolo Attiva), which provides an incomparable driving experience, all of this able to feed the ego even of those who constantly seek the most powerful and adrenaline-pumping sensations.',
            'https://www.lamborghini.com/sites/it-en/files/DAM/lamborghini/gateway-family/aventador/cars/aventador-s-roadster-car.png',
            460247,
            4.9,
            4.7,
            4.6,
            217,
            2.9,
            758,
            1136,
            2098,
            4943,
            1575,
            [
                'https://www.lamborghini.com/sites/it-en/files/DAM/lamborghini/model/aventador/aventador-s-roadster/04_12_Restyling/header.jpg',
                'https://www.lamborghini.com/sites/it-en/files/DAM/lamborghini/model/aventador/aventador-s-roadster/04_12_Restyling/intern2.jpg',
                'https://www.lamborghini.com/sites/it-en/files/DAM/lamborghini/model/aventador/aventador-s-roadster/04_12_Restyling/design-right.jpg'
            ]
        );
        $this->generateVehicle(
            'Lamborghini Aventador S',
            'An icon cannot be reinvented, it can only be challenged. And only Aventador could surpass itself. Following Miura, Islero, Countach, and Urraco, Lamborghini’s most iconic model now reaps the inheritance of the historic S models and evolves into the new Aventador S. Exclusive Lamborghini design and the new V12 engine with a whopping 740 HP now join the most sophisticated technology of the range, featuring the new LDVA (Lamborghini Dinamica Veicolo Attiva/Lamborghini Active Vehicle Dynamics), which offers an unparalleled driving experience to all those who honour their egos by challenging themselves every day.',
            'https://www.lamborghini.com/sites/it-en/files/DAM/lamborghini/gateway-family/aventador/cars/aventador-s/aventador-s-auto-carousel-family.png',
            417826,
            4.9,
            4.7,
            4.6,
            217,
            2.9,
            758,
            1136,
            2098,
            4943,
            1575,
            [
                'https://www.lamborghini.com/sites/it-en/files/DAM/lamborghini/model/aventador/aventador-s/Restyling/overview-right.jpg',
                'https://www.lamborghini.com/sites/it-en/files/DAM/lamborghini/model/aventador/aventador-s/Restyling/design-right.jpg',
                'https://www.lamborghini.com/sites/it-en/files/DAM/lamborghini/model/aventador/aventador-s/Restyling/intern2.jpg'
            ]
        );
        $this->generateVehicle(
            'Lamborghini Centenario',
            'The new Lamborghini Centenario represents a new, extremely precious piece in Lamborghini\'s one-off strategy. It is a perfect example of the innovative design and the engineering skills of the bull-branded manufacturer.',
            'https://www.lamborghini.com/sites/it-en/files/DAM/lamborghini/gateway-family/one-off/cars/centenario.png',
            1900000,
            5.0,
            5.0,
            5.0,
            217,
            2.7,
            758,
            1143,
            2062,
            4924,
            1520,
            [
                'https://www.lamborghini.com/sites/it-en/files/DAM/lamborghini/model/one-off/centenario/bg-huracan-right-skew.jpg'
            ]

        );


        // Porsche
        $this->generateVehicle(
            'Porsche 718 Cayman S',
            'The 718 models were made for the sport of it. They are mid-engined roadsters that unite the sporting spirit of the legendary Porsche 718 with the sports car of tomorrow – and transfer it to the roads of today’s world. With one goal: to take the everyday out of every day.',
            'https://files1.porsche.com/filestore/image/multimedia/none/982-718-c7s-modelimage-sideshot/model/c976d857-d7eb-11e6-a122-0019999cd470;;twebp/porsche-model.webp',
            65344.28,
            4.8,
            4.6,
            4.9,
            177,
            4.9,
            345,
            1295,
            1801,
            4379,
            1355,
            [
                'https://files1.porsche.com/filestore/image/multimedia/none/jdp-2016-982-718-c7s-editorial-xl/normal/0d934731-4ddc-11e8-bbc5-0019999cd470;sF;twebp/porsche-normal.jpg',
                'https://files1.porsche.com/filestore/image/multimedia/none/jdp-2016-982-718-c7s-editorial-l/normal/28f2e623-6d97-11e9-80c4-005056bbdc38;sJ;twebp/porsche-normal.jpg',
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/jdp-2016-982-718-c7-gallery-exterior-25/zoom2/72226e2f-96d6-11e6-9f1b-0019999cd470;sN;twebp/porsche-zoom2.jpg'
            ]
        );
        $this->generateVehicle(
            'Porsche 718 Boxster GTS',
            'The 718 GTS models are never satisfied. They always crave more. More heart pounding from the start. More corners per kilometre. And more adrenaline with every metre. With an uprated midmounted engine and a chassis unfazed by any hairpin turn. Their power follows an upward path, their design looks forwards: with sharpened forms, honed lines, exquisite materials.',
            'https://files1.porsche.com/filestore/image/multimedia/none/982-718-bo-gts-modelimage-sideshot/model/e61bf85e-ae78-11e7-b591-0019999cd470;;twebp/porsche-model.webp',
            76758.19,
            4.0,
            4.0,
            4.5,
            180,
            4.9,
            359,
            1272,
            1801,
            4379,
            1450,
            [
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/982-718-gts-gallery-04/zoom2/38e33008-6da1-11e9-80c4-005056bbdc38;sN;twebp/porsche-zoom2.jpg',
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/982-718-gts-gallery-01/zoom2/7d4a5027-f782-11e7-bbc5-0019999cd470;sN;twebp/porsche-zoom2.jpg',
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/982-718-gts-gallery-15/zoom2/69585a05-f782-11e7-bbc5-0019999cd470;sN;twebp/porsche-zoom2.jpg'
            ]
        );
        $this->generateVehicle(
            'Porsche 718 Cayman GT4',
            '718 Cayman GT4 is the perfect sports car for those who like to push the limits. For those who would rather ask ‘why not?’ than ‘why?’. For those who take fun seriously and who would rather sit in a sports seat than a leather armchair.',
            'https://files1.porsche.com/filestore/image/multimedia/none/982-718gt4-modelimage-sideshot/model/5b3fd684-85f2-11e9-80c4-005056bbdc38;sL;twebp/porsche-model.webp',
            91607.95,
            4.0,
            4.0,
            4.5,
            188,
            4.4,
            414,
            1269,
            1994,
            4456,
            1495,
            [
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/modelseries-718gt4-interior-01/zoom2/cc9d4c28-878d-11e9-80c4-005056bbdc38;sN;twebp/porsche-zoom2.jpg',
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/modelseries-718gt4-indoor-01/zoom2/9ea29246-879a-11e9-80c4-005056bbdc38;sN;twebp/porsche-zoom2.jpg',
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/modelseries-718gt4-interior-04/zoom2/15c39fee-8795-11e9-80c4-005056bbdc38;sN;twebp/porsche-zoom2.jpg'
            ]
        );
        $this->generateVehicle(
            'Porsche 911 Carrera 4S',
            'The new 911 is the sum of its predecessors - a reflection of the past and a vision of the future. The silhouette: iconic. The design: timeless. The technology: inspired by great racing victories and always one step ahead. With the eighth generation of the 911, we’re driving into the future.',
            'https://files1.porsche.com/filestore/image/multimedia/none/992-c4s-modelimage-sideshot/model/c02b5f4d-e826-11e8-bec8-0019999cd470;;twebp/porsche-model.webp',
            119656.41,
            5.0,
            5.0,
            5.0,
            190,
            3.6,
            443,
            1298,
            1852,
            4499,
            1490,
            [
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/en/modelseries-911carrera992-interieur-12/zoom2/68d27c9a-a6fc-11e9-80c4-005056bbdc38;sN;twebp/porsche-zoom2.jpg',
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/model-series-911carrera992-indoor-10/zoom2/eea87d8f-a6f8-11e9-80c4-005056bbdc38;sQ;twebp/porsche-zoom2.jpg',
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/modelseries-911carrera992-details-01/zoom2/68c55f32-e75a-11e8-bec8-0019999cd470;sN;twebp/porsche-zoom2.jpg'
            ]
        );
        $this->generateVehicle(
            'Porsche 911 Carrera 4S Cabriolet',
            'The new 911 is the sum of its predecessors - a reflection of the past and a vision of the future. The silhouette: iconic. The design: timeless. The technology: inspired by great racing victories and always one step ahead. With the eighth generation of the 911, we’re driving into the future.',
            'https://files1.porsche.com/filestore/image/multimedia/none/992-c4scab-modelimage-sideshot/model/c6ec382b-fc69-11e8-8373-0019999cd470;;twebp/porsche-model.webp',
            131382.78,
            5.0,
            5.0,
            5.0,
            188,
            3.8,
            443,
            1299,
            1852,
            4519,
            1710,
            [
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/modelseries-911carrera992-indoor-08/zoom2/a748dda6-e75c-11e8-bec8-0019999cd470;sN;twebp/porsche-zoom2.jpg',
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/modelseries-911carrera992-interior-02/zoom2/e1346331-e75c-11e8-bec8-0019999cd470;sQ;twebp/porsche-zoom2.jpg',
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/modelseries-911carrera992-interior-06/zoom2/fba63fea-e75c-11e8-bec8-0019999cd470;sN;twebp/porsche-zoom2.jpg'
            ]
        );
        $this->generateVehicle(
            'Porsche 911 Speedster',
            'A single word encompasses everything the brand stands for: Speedster. The concept embodies the original Porsche virtues of purism, lightweight construction, efficiency and unadulterated driving pleasure. Limited to 1,948 units, the new 911 Speedster pays tribute to an idea that runs through the history of Porsche like a long winding road.',
            'https://files1.porsche.com/filestore/image/multimedia/none/991-2nd-speedster-modelimage-sideshot/model/39752d78-35e8-11e9-80c4-005056bbdc38;;twebp/porsche-model.webp',
            257261.64,
            5.0,
            5.0,
            5.0,
            188,
            3.8,
            443,
            1250,
            1852,
            4562,
            1615,
            [
                'https://files1.porsche.com/filestore/wallpaper/multimedia/none/modelseries-911speedster-wallpaper-02/wallpaper/ba012bac-36a7-11e9-80c4-005056bbdc38;sO;twebp;l63692803798;w1920;h1080/porsche-wallpaper.jpg',
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/modelseries-911speedster-interior-01/zoom2/c7115f91-39cc-11e9-80c4-005056bbdc38;sN;twebp/porsche-zoom2.jpg',
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/modelseries-911speedster-interior-04/zoom2/2d1c72e8-39cd-11e9-80c4-005056bbdc38;sQ;twebp/porsche-zoom2.jpg'
            ]
        );
        $this->generateVehicle(
            'Porsche 911 GT3 RS',
            'Drivers. Fans. Lovers of the true motorsport. Brace yourselves. And get ready. The race track is calling. More loudly than ever before. And with an intensity not felt for quite some time. Defensive? Routine? As if. Better to go on the attack. A challenge awaits, one that will push you beyond your comfort zone for a change. Where unfiltered fascination feels at home: in the chicane, in the banked turn, on the long straights.',
            'https://files1.porsche.com/filestore/image/multimedia/none/991-2nd-gt3-rs-modelimage-sideshot/model/d446a760-17dc-11e8-bbc5-0019999cd470;;twebp/porsche-model.webp',
            253240,
            5.0,
            5.0,
            5.0,
            193,
            3.2,
            512,
            1297,
            1880,
            2453,
            1445,
            [
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/991-2nd-gt3rs-gallery-outdoor-01/zoom2/9e03218a-fc65-11e7-bbc5-0019999cd470;sN;twebp/porsche-zoom2.jpg',
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/991-2nd-gt3rs-gallery-interior-04/zoom2/5a70c0a5-fc65-11e7-bbc5-0019999cd470;sQ;twebp/porsche-zoom2.jpg',
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/991-2nd-gt3rs-gallery-outdoor-02/zoom2/c165f4fc-1584-11e8-bbc5-0019999cd470;sN;twebp/porsche-zoom2.jpg'
            ]
        );
        $this->generateVehicle(
            'Porsche Panamera 4S Executive',
            'A few years ago, everything to do with the saloon suddenly changed. Large, cumbersome and thickly padded instantly seemed outmoded qualities. On the road, something happened – something rather fast and dynamic: a sports car came along. A sports car with four seats, an unmistakable silhouette and performance figures normally associated only with a Porsche.',
            'https://files1.porsche.com/filestore/image/multimedia/none/970-g2-4s-e-modelimage-sideshot/model/96643f1f-d7e2-11e6-a122-0019999cd470;;twebp/porsche-model.webp',
            124515.95,
            4.5,
            4.0,
            4.0,
            179,
            4.5,
            433,
            1428,
            1937,
            5199,
            2055,
            [
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/970-g2-4s-st-gallery-outdoor-01/zoom2/0c98b233-562c-11e9-80c4-005056bbdc38;sN;twebp/porsche-zoom2.jpg',
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/970-g2-tu-gallery-interior-02/zoom2/86a25c0e-fd4a-11e8-8373-0019999cd470;sN;twebp/porsche-zoom2.jpg',
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/g2-4s-gallery-exterior-18/zoom2/7958fbc4-562b-11e9-80c4-005056bbdc38;sN;twebp/porsche-zoom2.jpg'
            ]
        );
        $this->generateVehicle(
            'Porsche Panamera GTS Sport Turismo',
            'If you set yourself ambitious goals in life, you have to approach them with courage and passion. The Panamera does just that, blazing a trail with no compromises, uniting apparent opposites: performance and comfort, dynamism and efficiency, work and family.',
            'https://files1.porsche.com/filestore/image/multimedia/none/970-g2-gts-st-modelimage-sideshot/model/8436fd3a-cad0-11e8-81d2-0019999cd470;;twebp/porsche-model.webp',
            132918.33,
            4.5,
            4.0,
            4.0,
            179,
            4.1,
            453,
            1422,
            1937,
            5053,
            2100,
            [
                'https://files1.porsche.com/filestore/image/multimedia/none/970-g2-gts-st-editorial-xl/normal/03cf722e-b1ce-11e8-8f14-0019999cd470;sF;twebp/porsche-normal.jpg',
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/modelseries-panamera-gts-st-gallery-exterior-10/zoom2/13b5e363-bb46-11e8-8f14-0019999cd470;sN;twebp/porsche-zoom2.jpg',
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/modelseries-panamera-gts-st-gallery-exterior-04/zoom2/b5ce5dcd-bb45-11e8-8f14-0019999cd470;sN;twebp/porsche-zoom2.jpg'
            ]
        );
        $this->generateVehicle(
            'Porsche Panamera Turbo S E-Hybrid Executive',
            'Porsche E-Performance is everything that you expect from a Porsche. And more. It is goose bumps. G-forces. Adrenalin. Because we are not satisfied with merely boosting efficiency when we can take performance and driving pleasure to the limits at the same time. There is a good reason why all of our experience and successes in motor sports have a major influence on development.',
            'https://files1.porsche.com/filestore/image/multimedia/none/970-g2-tus-e-hy-e-modelimage-sideshot/model/82d9a7c2-6046-11e9-80c4-005056bbdc38;sL;twebp/porsche-model.webp',
            181806.79,
            4.5,
            4.0,
            4.0,
            192,
            3.5,
            670,
            1432,
            1937,
            5199,
            2485,
            [
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/970-g2-tus-e-hy-st-gallery-exterior-03/zoom2/d3a7fec2-17cc-11e9-ae19-0019999cd470;sN;twebp/porsche-zoom2.jpg',
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/970-g2-4hy-gallery-interior-01/zoom2/7123fcf3-24de-11e7-9f74-0019999cd470;sQ;twebp/porsche-zoom2.jpg',
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/970-g2-4hy-gallery-exterior-36/zoom2/336bd990-198f-11e9-ae19-0019999cd470;sN;twebp/porsche-zoom2.jpg'
            ]
        );
        $this->generateVehicle(
            'Porsche Macan Turbo',
            'We have proven that we do not follow trends. Instead, we design our own adventures. A compact SUV that inextricably combines sportiness, design and everyday practicality: the Macan.',
            'https://files1.porsche.com/filestore/image/multimedia/none/pa-tu-modelimage-sideshot/model/0d290e38-c3da-11e9-80c4-005056bbdc38;sL;twebp/porsche-model.webp',
            57036.73,
            4.6,
            4.0,
            4.7,
            167,
            4.3,
            433,
            1624,
            2098,
            4684,
            1925,
            [
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/pa-r4-modelseries-gallery-outdoor-02/zoom2/2013fd91-f7c7-11e8-8373-0019999cd470;sQ;twebp/porsche-zoom2.jpg',
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/pa-r4-model-series-gallery-image-05/zoom2/0f5846de-867d-11e8-8d30-0019999cd470;sQ;twebp/porsche-zoom2.jpg',
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/pa-r4-model-series-gallery-image-09/zoom2/e2c1167e-867d-11e8-8d30-0019999cd470;sN;twebp/porsche-zoom2.jpg'
            ]
        );
        $this->generateVehicle(
            'Porsche Cayenne Turbo S E-Hybrid Coupé',
            'This shape, it has been around for many years. Our iconic flyline, has been lengthened, heightened and lowered, but has remained the same. It is a shape that has won races. Everyone recognises it - at night, in the fog and even blindfolded. A shape that can only be achieved with training; sprints, physical exertion and stamina, just like building muscle. This shape stands for all that we are.',
            'https://files1.porsche.com/filestore/image/multimedia/none/9yb-e3c-tu-s-e-hy-modelimage-sideshot/model/7089f674-aedd-11e9-80c4-005056bbdc38;sL;twebp/porsche-model.webp',
            152577.79,
            4.5,
            4.0,
            4.0,
            183,
            3.8,
            670,
            1573,
            1983,
            4926,
            2565,
            [
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/model-series-e3-cayenne-coupe-turbo-s-e-hybrid-gallery-image-01/zoom2/01236b4f-b84f-11e9-80c4-005056bbdc38;sN;twebp/porsche-zoom2.jpg',
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/model-series-e3-cayenne-coupe-gallery-image-23/zoom2/5fe6936f-35e6-11e9-80c4-005056bbdc38;sN;twebp/porsche-zoom2.jpg',
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/model-series-e3-cayenne-coupe-gallery-image-36/zoom2/0d5f1dcd-4a32-11e9-80c4-005056bbdc38;sN;twebp/porsche-zoom2.jpg'
            ]
        );
        /*
        $this->generateVehicle(
            'Porsche 918 Spyder',
            '/var/www/dev.gve.world/resources/graphics/cars/porsche-918.png',
            'https://png2.cleanpng.com/sh/980941764631322deed36c1bce087230/L0KzQYm3WMA0N5lrjpH0aYP2gLBuTcIxOWkyiNH7c3PrdX6CUcEueJD3i9VxZT28QYm0kCB6bJZ3ReJ4coPmeLa0WcMxNZRmRd94ZHXvf373jCJ0a5lqRas6OD32gMrrhgIueJD3i9VxZT3mdbB7hgIueKZqiuZ4LUXlRoW8WfZlaWk7TNM9LkG8R4qCUsE3OWY4S6U5M0K8Q4eBWcgveJ9s/kisspng-2018-porsche-911-porsche-918-spyder-porsche-930-ca-modelo-porsche-918-spyder-porsche-center-puerto-5b6459fda864a4.1979921615333032936898.png',
            1276587.90,
            5.0,
            5.0,
            5.0,
            214,
            2.6,
            874,
            [
                'https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/dsc-6340-1540488225.jpg',
                'https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/dsc-6479-1540486710.jpg',
                'https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/800-7411-1540489318.jpg'
            ]
        );
        */
        // Ferrari

        // Volkswagen
        $this->generateVehicle(
            'Volkswagen up!',
            'THe smallest Volkswagen is more colourful and sharper with newly designed body panels, new colours, new wheels, a completely redesigned interior and a new infotainment system.',
            'https://imagecom.volkswagen.co.uk/api/image/2.1/360s/car/vw/30101/hero/480/0.png',
            12163.63,
            4.3,
            4.5,
            4.3,
            101,
            14.4,
            60,
            1504,
            1645,
            3600,
            940,
            [
                'https://www.volkswagen.co.uk/assets/common/content/mlp/up-pa/gallery/Upfullsize8.jpg',
                'https://www.volkswagen.co.uk/assets/common/content/mlp/up-pa/gallery/Upfullsize2.jpg',
                'https://www.volkswagen.co.uk/assets/common/content/mlp/up-pa/gallery/Upfullsize5.jpg'
            ]
        );
        $this->generateVehicle(
            'Volkswagen Polo GTI',
            'The Polo with an exterior designed to turn heads which is matched by an interior that\'s totally at home in the digital age.',
            'https://imagecom.volkswagen.co.uk/api/image/2.1/360s/car/vw/30200/30200-2974/480/0.png',
            26137.32,
            3.0,
            5.0,
            3.0,
            148,
            6.7,
            197,
            1461,
            1751,
            4067,
            1355
        );
        $this->generateVehicle(
            'Volkswagen T-Roc R-Line',
            'Born confident',
            'https://imagecom.volkswagen.co.uk/api/image/2.1/360s/car/vw/30361/30361-3040/480/0.png',
            41884.87,
            4.3,
            4.6,
            4.7,
            134,
            7.2,
            187,
            1573,
            1819,
            4234,
            1505
        );
        $this->generateVehicle(
            'Volkswagen Golf GTI TCR',
            'The iconic GTI, but with the DNA of a race car. The GTI TCR with its uniquely shaped front and rear bumpers and rear spoiler, as well as unique GTI TCR badging, this car is not one for blending in.',
            'https://imagecom.volkswagen.co.uk/api/image/2.1/360s/car/vw/30316/30316-10436/480/0.png',
            45450.69,
            4.5,
            5.0,
            4.5,
            155,
            5.6,
            286,
            1492,
            1790,
            4258,
            1430
        );
        $this->generateVehicle(
            'Volkswagen Tiguan R-Line Tech',
            'Turn heads with the ultimate Tiguan that includes the ultimate in luxury and refinement with a dynamic sporty look.',
            'https://imagecom.volkswagen.co.uk/api/image/2.1/360s/car/vw/31105/31105-10422/480/0.png',
            50144.79,
            4.0,
            4.4,
            4.0,
            143,
            6.2,
            237,
            1673,
            1859,
            4490,
            2360
        );
        $this->generateVehicle(
            'Volkswagen Passat Saloon R-Line',
            'Turn heads with the ultimate Passat that includes the ultimate in luxury and refinement with a dynamic sporty look.',
            'https://imagecom.volkswagen.co.uk/api/image/2.1/360s/car/vw/31300/31300-3040/480/0.png',
            49197.53,
            4.0,
            5.0,
            4.0,
            153,
            6.4,
            237,
            1456,
            1832,
            4767,
            1367,
            [
                'https://www.volkswagen.co.uk/assets/common/content/mlp/passat-saloon/passat-saloon-gallery-1.jpg',
                'https://www.volkswagen.co.uk/assets/common/content/mlp/passat-saloon/passat-saloon-gallery-4.jpg',
                'https://www.volkswagen.co.uk/assets/common/content/mlp/passat-saloon/passat-saloon-gallery-6.jpg'
            ]
        );
        $this->generateVehicle(
            'Volkswagen Touran R-Line',
            'Our top of the range R-Line is the ultimate in style and quality, with a bespoke R-Line body kit, tinted glass and 18" Marseille alloy wheels. Attractive R-Line design cues are continued inside with bespoke R-Line upholstery and steering wheel.',
            'https://imagecom.volkswagen.co.uk/api/image/2.1/360s/car/vw/31005/hero/480/0.png',
            36508.98,
            4.4,
            4.8,
            4.0,
            130,
            9.3,
            148,
            1659,
            1829,
            4527,
            1454,
            [
                'https://www.volkswagen.co.uk/assets/common/content/mlp/touran-nf/gallery/1d.jpg',
                'https://www.volkswagen.co.uk/assets/common/content/mlp/touran-nf/gallery/2c.jpg',
                'https://www.volkswagen.co.uk/assets/common/content/mlp/touran-nf/gallery/1b.jpg'
            ]
        );
        $this->generateVehicle(
            'Volkswagen Arteon R-Line',
            'The Arteon is a newly developed premium Volkswagen model. A fastback saloon with cutting-edge design and predictive driver assistance systems, the Arteon is a true driver of innovation.',
            'https://imagecom.volkswagen.co.uk/api/image/2.1/360s/car/vw/31505/31505-3040/480/0.png',
            49662.11,
            4.1,
            4.5,
            3.8,
            155,
            5.6,
            268,
            1450,
            1871,
            4862,
            1565,
            [
                'https://www.volkswagen.co.uk/assets/common/content/mlp/arteon/gallery_full_1.jpg',
                'https://www.volkswagen.co.uk/assets/common/content/mlp/arteon/gallery_full_7.jpg',
                'https://www.volkswagen.co.uk/assets/common/content/mlp/arteon/gallery_full_2_v2.jpg'
            ]
        );
        $this->generateVehicle(
            'Volkswagen Touareg V6 R-Line',
            'For a sportier style, the R-Line has unique front & rear bumpers, side skirts, 20" \'Braga\' diamond turned alloy wheels and keyless start',
            'https://imagecom.volkswagen.co.uk/api/image/2.1/360s/car/vw/31705/31705-4664/480/0.png',
            67786.88,
            4.2,
            4.5,
            3.9,
            155,
            5.9,
            335,
            1709,
            2208,
            4801,
            2110,
            [
                'https://www.volkswagen.co.uk/assets/content/new-cars/touareg-gallery-recrop.jpg',
                'https://www.volkswagen.co.uk/assets/content/new-cars/touareg-imageneww.jpg',
                'https://www.volkswagen.co.uk/assets/content/new-cars/touareg-new-img.jpg'
            ]
        );

        $this->generateVehicle(
            'Challenger',
            '',
            'https://dev.gve.world/images/vehicles/Challenger-2.png',
            5180394.74,
            2,
            5.0,
            3.8,
            37,
            0,
            1200,
            25000,
            35000,
            115000,
            62500,
            [
                'https://dev.gve.world/images/vehicles/45158851.jpg',
                'https://dev.gve.world/images/vehicles/_AJW4020-2.jpg'
            ],
            100,
            100,
            true
        );
    }

    protected function generateVehicle($name, $description, $thumbnail, $salePrice, $performance, $safety, $handling, $topSpeed, $acc, $bhp, $height, $width, $length, $weight, $images = null, $attack = 0, $defence = 0, $flipThumbnail = false, $flipImages = false)
    {
        $vehicle = new \stdClass();
        $vehicle->name = $name;
        $vehicle->description = $description;
        $vehicle->cost_price = ($salePrice - ($salePrice / 2));
        $vehicle->sale_price = $salePrice;
        $vehicle->performance = $performance;
        $vehicle->safety = $safety;
        $vehicle->handling = $handling;
        $vehicle->top_speed = $topSpeed;
        $vehicle->zero_sixty = $acc;
        $vehicle->bhp = $bhp;
        $vehicle->height = $height;
        $vehicle->width = $width;
        $vehicle->length = $length;
        $vehicle->weight = $weight;
        $vehicle->attack = $attack;
        $vehicle->defence = $defence;
        $vehicle->thumbnail = $thumbnail;
        $vehicle->images = $images;
        $vehicle->flipThumbnail = $flipThumbnail;
        $vehicle->flipImages = $flipImages;

        $this->vehiclesRaw[] = $vehicle;

        /*$thumbnailFile = pathinfo($thumbnail);
        $vehicle->addMediaFromUrl($thumbnail)
            ->usingName($name . '.' . $thumbnailFile['extension'])
            ->usingFileName($name . '.' . $thumbnailFile['extension'])
            ->withResponsiveImages()
            ->toMediaCollection('thumbnails');

        if($images !== null){
            $i=0;
            foreach($images as $image){
                $imageFile = pathinfo($image);
                $vehicle->addMediaFromUrl($thumbnail)
                    ->usingFileName($name . '-' . $i . '.' . $imageFile['extension'])
                    ->usingName($name . '-' . $i . '.' . $imageFile['extension'])
                    ->withResponsiveImages()
                    ->toMediaCollection('gallery');
                $i++;
            }
        }*/

        //$vehicle->save();
    }

    protected function processVehicle()
    {
        $this->progressBar = $this->output->createProgressBar(count($this->vehiclesRaw));

        $this->progressBar->start();

        foreach($this->vehiclesRaw as $vehicle){

            $vehicleModel = new Vehicle();
            $vehicleModel->name = $vehicle->name;
            $vehicleModel->description = $vehicle->description;
            $vehicleModel->cost_price = $vehicle->cost_price;
            $vehicleModel->sale_price = $vehicle->sale_price;
            $vehicleModel->performance = $vehicle->performance;
            $vehicleModel->safety = $vehicle->safety;
            $vehicleModel->handling = $vehicle->handling;
            $vehicleModel->top_speed = $vehicle->top_speed;
            $vehicleModel->zero_sixty = $vehicle->zero_sixty;
            $vehicleModel->bhp = $vehicle->bhp;
            $vehicleModel->height = $vehicle->height;
            $vehicleModel->width = $vehicle->width;
            $vehicleModel->length = $vehicle->length;
            $vehicleModel->weight = $vehicle->weight;
            $vehicleModel->attack = $vehicle->attack;
            $vehicleModel->defence = $vehicle->defence;

            $thumbnailFile = pathinfo($vehicle->thumbnail);

                //->withResponsiveImages()
                //->toMediaCollection('thumbnail');
            $vehicleModel->addMediaFromUrl($vehicle->thumbnail)
                ->usingName($vehicle->name . '.' . $thumbnailFile['extension'])
                ->usingFileName($vehicle->name . '.' . $thumbnailFile['extension'])
                ->toMediaCollection('thumbnail');


            if($vehicle->images !== null){
                $i=0;
                foreach($vehicle->images as $image){
                    $imageFile = pathinfo($image);
                    $vehicleModel->addMediaFromUrl($image)
                        ->usingFileName($vehicle->name . '-' . $i . '.' . $imageFile['extension'])
                        ->usingName($vehicle->name . '-' . $i . '.' . $imageFile['extension'])
                        ->withResponsiveImages()
                        ->toMediaCollection('gallery');
                    $i++;
                }
            }

            $vehicleModel->save();
            $this->progressBar->advance();

        }

        $this->progressBar->finish();
    }
}
