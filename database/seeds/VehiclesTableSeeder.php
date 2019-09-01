<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class VehiclesTableSeeder extends Seeder
{

    protected $vehiclesRaw;

    protected $vehiclesParsed;

    protected $vehicles;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->vehicles();

    }


    protected function vehicles()
    {
        // Audi
        /*$this->generateVehicle(
            'Audi A1 Sportback',
            'Compact 5-door Sportback with LED headlights, Audi Smartphone interface and Audi Pre-sense front',
            '',
            21562.1800,
            3.5,
            4.4,
            3.8,
            137,
            7.5,
            147,
            ''
        );
        $this->generateVehicle(
            'Audi S3 Cabriolet',
            '-door performance cabriolet with automatic acoustic hood, distinctive ‘S’ styling, and Fine Nappa leather seats.',
            '',
            52206.3700,
            4.3,
            4.2,
            4.1,
            155,
            4.6,
            300,
            ''
        );
        $this->generateVehicle(
            'Audi RS 3 Saloon',
            '4-door performance saloon with quattro all-wheel drive and 2.5-litre turbocharged five-cylinder engine.',
            '',
            57489.0100,
            4.3,
            4.2,
            4.1,
            155,
            4.6,
            300,
            ''
        );
        $this->generateVehicle(
            'Audi RS 3 Sportback',
            '5-door performance hatchback with quattro all-wheel drive and 2.5-litre turbocharged five-cylinder engine.',
            '',
            56273.21,
            4.3,
            4.2,
            4.1,
            155,
            4.6,
            300,
            ''
        );

        $this->generateVehicle(
            'Audi S4 Saloon',
            '4-door performance Saloon with unique S4 exterior styling, enhanced brakes and suspension.',
            '',
            58358.30,
            4.4,
            4.6,
            4.2,
            155,
            5.7,
            347,
            ''
        );
        $this->generateVehicle(
            'Audi RS 4 Avant',
            '5-door high-performance sports estate with a 2.9 TFSI engine with quattro all-wheel drive, RS styling, RS Sport exhaust and and Audi Virtual Cockpit.',
            '',
            82169.71,
            4.4,
            4.6,
            4.2,
            155,
            5.7,
            347,
            ''
        );
        $this->generateVehicle(
            'Audi A5 Cabriolet',
            '2-door Cabriolet with fully automatic acoustic hood and Parking system plus.',
            '',
            47075.70,
            4.2,
            3.5,
            4.3,
            155,
            5.1,
            354,
            ''
        );
        $this->generateVehicle(
            'Audi RS 5 Coupe',
            '2-door high-performance sports Coupé with a 2.9 TFSI engine with quattro all-wheel drive, RS styling, RS Sport exhaust and and Audi Virtual Cockpit.',
            '',
            83871.83,
            4.4,
            5.0,
            3.5,
            174,
            3.9,
            354,
            ''
        );
        $this->generateVehicle(
            'Audi RS 5 Sportback',
            '5-door high-performance sports car with a 2.9 TFSI engine with quattro all-wheel drive, RS styling, RS Sport exhaust and and Audi Virtual Cockpit.',
            '',
            83871.83,
            4.4,
            5.0,
            3.5,
            174,
            3.9,
            354,
            ''
        );
        $this->generateVehicle(
            'Audi S6 Saloon',
            '4-door performance Saloon with a 4.0-litre V8 TFSI engine, quattro and S Super Sport front seats.',
            '',
            73215.36,
            4.4,
            4.4,
            4.6,
            255,
            5.0,
            349,
            ''
        );
        $this->generateVehicle(
            'Audi S7 Sportback',
            '5-door performance Sportback with Matrix LED headlights, Virtual Cockpit and heated Super Sport seats.',
            '',
            83501.01,
            4.4,
            4.4,
            4.6,
            255,
            5.0,
            349,
            ''
        );
        $this->generateVehicle(
            'Audi SQ5',
            '5-door performance SUV with distinctive \'S\' styling, Audi Virtual Cockpit and Fine Nappa leather seats.',
            '',
            66911.44,
            4.0,
            4.5,
            3.5,
            155,
            5.1,
            313,
            ''
        );
        $this->generateVehicle(
            'Audi Q8',
            'Luxury SUV with Matrix LED headlights, MMI Navigation and Parking System Plus.',
            '',
            81470.62,
            3.7,
            4.5,
            4.4,
            144,
            6.3,
            286,
            ''
        );
        $this->generateVehicle(
            'Audi TT RS Coupé',
            '2 door high-performance sports coupé with a 2.5-litre TFSI 5-cylinder engine, ‘RS’ styling and Audi virtual cockpit with a RS specific screen.',
            '',
            66741.23,
            4.5,
            4.0,
            4.0,
            174,
            3.7,
            395,
            ''
        );
        $this->generateVehicle(
            'Audi TT RS Roadster',
            '2 door high-performance sports coupé with a 2.5-litre TFSI 5-cylinder engine, ‘RS’ styling and Audi Virtual Cockpit with a RS specific screen',
            '',
            68868.88,
            4.5,
            4.0,
            4.0,
            155,
            3.9,
            395,
            ''
        );

        $this->generateVehicle(
            'Audi R8 Coupé',
            '2-door high-performance Audi Sport coupé with a 5.2 litre V10 engine, Audi Virtual Cockpit, dual-branch oval tailpipes and parking system plus.',
            '',
            155865.3000,
            4.7,
            4.3,
            4.7,
            205,
            3.2,
            610,
            null
        );
        $this->generateVehicle(
            'Audi R8 Spyder',
            '2-door high-performance Audi Sport convertible with a 5.2 litre V10 engine, Audi Virtual Cockpit, dual-branch oval tailpipes and parking system plus.',
            '',
            166430.59,
            4.9,
            3.5,
            4.7,
            200,
            3.2,
            620,
            null
        );
        $this->generateVehicle(
            'Audi E-Tron',
            'Fully electric, 5-door SUV with virtual door mirrors, Pre-sense Front and Basic, and a rear-view camera as standard.',
            '',
            166430.59,
            4.0,
            4.8,
            4.3,
            124,
            5.7,
            402,
            null
        );*/

        // Lambo

        // Porsche
        $this->generateVehicle(
            'Porsche 718 Cayman S',
            'The 718 models were made for the sport of it. They are mid-engined roadsters that unite the sporting spirit of the legendary Porsche 718 with the sports car of tomorrow – and transfer it to the roads of today’s world. With one goal: to take the everyday out of every day.',
            'https://files1.porsche.com/filestore/image/multimedia/none/982-718-c7s-modelimage-sideshot/model/c976d857-d7eb-11e6-a122-0019999cd470;;twebp/porsche-model.png',
            65344.28,
            4.8,
            4.6,
            4.9,
            177,
            4.9,
            345,
            [
                'https://files1.porsche.com/filestore/image/multimedia/none/jdp-2016-982-718-c7s-editorial-xl/normal/0d934731-4ddc-11e8-bbc5-0019999cd470;sF;twebp/porsche-normal.jpg',
                'https://files1.porsche.com/filestore/image/multimedia/none/jdp-2016-982-718-c7s-editorial-l/normal/28f2e623-6d97-11e9-80c4-005056bbdc38;sJ;twebp/porsche-normal.jpg',
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/jdp-2016-982-718-c7-gallery-exterior-25/zoom2/72226e2f-96d6-11e6-9f1b-0019999cd470;sN;twebp/porsche-zoom2.jpg'
            ]
        );
        $this->generateVehicle(
            'Porsche 718 Boxster GTS',
            'The 718 GTS models are never satisfied. They always crave more. More heart pounding from the start. More corners per kilometre. And more adrenaline with every metre. With an uprated midmounted engine and a chassis unfazed by any hairpin turn. Their power follows an upward path, their design looks forwards: with sharpened forms, honed lines, exquisite materials.',
            'https://files1.porsche.com/filestore/image/multimedia/none/982-718-bo-gts-modelimage-sideshot/model/e61bf85e-ae78-11e7-b591-0019999cd470;;twebp/porsche-model.png',
            76758.19,
            4.0,
            4.0,
            4.5,
            180,
            4.9,
            359,
            [
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/982-718-gts-gallery-04/zoom2/38e33008-6da1-11e9-80c4-005056bbdc38;sN;twebp/porsche-zoom2.jpg',
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/982-718-gts-gallery-01/zoom2/7d4a5027-f782-11e7-bbc5-0019999cd470;sN;twebp/porsche-zoom2.jpg',
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/982-718-gts-gallery-15/zoom2/69585a05-f782-11e7-bbc5-0019999cd470;sN;twebp/porsche-zoom2.jpg'
            ]
        );
        $this->generateVehicle(
            'Porsche 718 Cayman GT4',
            '718 Cayman GT4 is the perfect sports car for those who like to push the limits. For those who would rather ask ‘why not?’ than ‘why?’. For those who take fun seriously and who would rather sit in a sports seat than a leather armchair.',
            'https://files1.porsche.com/filestore/image/multimedia/none/982-718gt4-modelimage-sideshot/model/5b3fd684-85f2-11e9-80c4-005056bbdc38;sL;twebp/porsche-model.png',
            91607.95,
            4.0,
            4.0,
            4.5,
            188,
            4.4,
            414,
            [
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/modelseries-718gt4-interior-01/zoom2/cc9d4c28-878d-11e9-80c4-005056bbdc38;sN;twebp/porsche-zoom2.jpg',
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/modelseries-718gt4-indoor-01/zoom2/9ea29246-879a-11e9-80c4-005056bbdc38;sN;twebp/porsche-zoom2.jpg',
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/modelseries-718gt4-interior-04/zoom2/15c39fee-8795-11e9-80c4-005056bbdc38;sN;twebp/porsche-zoom2.jpg'
            ]
        );
        $this->generateVehicle(
            'Porsche 911 Carrera 4S',
            'The new 911 is the sum of its predecessors - a reflection of the past and a vision of the future. The silhouette: iconic. The design: timeless. The technology: inspired by great racing victories and always one step ahead. With the eighth generation of the 911, we’re driving into the future.',
            'https://files1.porsche.com/filestore/image/multimedia/none/992-c4s-modelimage-sideshot/model/c02b5f4d-e826-11e8-bec8-0019999cd470;;twebp/porsche-model.png',
            119656.41,
            5.0,
            5.0,
            5.0,
            190,
            3.6,
            443,
            [
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/en/modelseries-911carrera992-interieur-12/zoom2/68d27c9a-a6fc-11e9-80c4-005056bbdc38;sN;twebp/porsche-zoom2.jpg',
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/model-series-911carrera992-indoor-10/zoom2/eea87d8f-a6f8-11e9-80c4-005056bbdc38;sQ;twebp/porsche-zoom2.jpg',
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/modelseries-911carrera992-details-01/zoom2/68c55f32-e75a-11e8-bec8-0019999cd470;sN;twebp/porsche-zoom2.jpg'
            ]
        );
        $this->generateVehicle(
            'Porsche 911 Carrera 4S Cabriolet',
            'The new 911 is the sum of its predecessors - a reflection of the past and a vision of the future. The silhouette: iconic. The design: timeless. The technology: inspired by great racing victories and always one step ahead. With the eighth generation of the 911, we’re driving into the future.',
            'https://files1.porsche.com/filestore/image/multimedia/none/992-c4scab-modelimage-sideshot/model/c6ec382b-fc69-11e8-8373-0019999cd470;;twebp/porsche-model.png',
            131382.78,
            5.0,
            5.0,
            5.0,
            188,
            3.8,
            443,
            [
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/modelseries-911carrera992-indoor-08/zoom2/a748dda6-e75c-11e8-bec8-0019999cd470;sN;twebp/porsche-zoom2.jpg',
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/modelseries-911carrera992-interior-02/zoom2/e1346331-e75c-11e8-bec8-0019999cd470;sQ;twebp/porsche-zoom2.jpg',
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/modelseries-911carrera992-interior-06/zoom2/fba63fea-e75c-11e8-bec8-0019999cd470;sN;twebp/porsche-zoom2.jpg'
            ]
        );
        $this->generateVehicle(
            'Porsche 911 Speedster',
            'A single word encompasses everything the brand stands for: Speedster. The concept embodies the original Porsche virtues of purism, lightweight construction, efficiency and unadulterated driving pleasure. Limited to 1,948 units, the new 911 Speedster pays tribute to an idea that runs through the history of Porsche like a long winding road.',
            'https://files1.porsche.com/filestore/image/multimedia/none/991-2nd-speedster-modelimage-sideshot/model/39752d78-35e8-11e9-80c4-005056bbdc38;;twebp/porsche-model.png',
            257261.64,
            5.0,
            5.0,
            5.0,
            188,
            3.8,
            443,
            [
                'https://files1.porsche.com/filestore/wallpaper/multimedia/none/modelseries-911speedster-wallpaper-02/wallpaper/ba012bac-36a7-11e9-80c4-005056bbdc38;sO;twebp;l63692803798;w1920;h1080/porsche-wallpaper.jpg',
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/modelseries-911speedster-interior-01/zoom2/c7115f91-39cc-11e9-80c4-005056bbdc38;sN;twebp/porsche-zoom2.jpg',
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/modelseries-911speedster-interior-04/zoom2/2d1c72e8-39cd-11e9-80c4-005056bbdc38;sQ;twebp/porsche-zoom2.jpg'
            ]
        );
        $this->generateVehicle(
            'Porsche 911 GT3 RS',
            'Drivers. Fans. Lovers of the true motorsport. Brace yourselves. And get ready. The race track is calling. More loudly than ever before. And with an intensity not felt for quite some time. Defensive? Routine? As if. Better to go on the attack. A challenge awaits, one that will push you beyond your comfort zone for a change. Where unfiltered fascination feels at home: in the chicane, in the banked turn, on the long straights.',
            'https://files1.porsche.com/filestore/image/multimedia/none/991-2nd-gt3-rs-modelimage-sideshot/model/d446a760-17dc-11e8-bbc5-0019999cd470;;twebp/porsche-model.png',
            253240,
            5.0,
            5.0,
            5.0,
            193,
            3.2,
            512,
            [
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/991-2nd-gt3rs-gallery-outdoor-01/zoom2/9e03218a-fc65-11e7-bbc5-0019999cd470;sN;twebp/porsche-zoom2.jpg',
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/991-2nd-gt3rs-gallery-interior-04/zoom2/5a70c0a5-fc65-11e7-bbc5-0019999cd470;sQ;twebp/porsche-zoom2.jpg',
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/991-2nd-gt3rs-gallery-outdoor-02/zoom2/c165f4fc-1584-11e8-bbc5-0019999cd470;sN;twebp/porsche-zoom2.jpg'
            ]
        );
        $this->generateVehicle(
            'Porsche Panamera 4S Executive',
            'A few years ago, everything to do with the saloon suddenly changed. Large, cumbersome and thickly padded instantly seemed outmoded qualities. On the road, something happened – something rather fast and dynamic: a sports car came along. A sports car with four seats, an unmistakable silhouette and performance figures normally associated only with a Porsche.',
            'https://files1.porsche.com/filestore/image/multimedia/none/970-g2-4s-e-modelimage-sideshot/model/96643f1f-d7e2-11e6-a122-0019999cd470;;twebp/porsche-model.png',
            124515.95,
            4.5,
            4.0,
            4.0,
            179,
            4.5,
            433,
            [
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/970-g2-4s-st-gallery-outdoor-01/zoom2/0c98b233-562c-11e9-80c4-005056bbdc38;sN;twebp/porsche-zoom2.jpg',
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/970-g2-tu-gallery-interior-02/zoom2/86a25c0e-fd4a-11e8-8373-0019999cd470;sN;twebp/porsche-zoom2.jpg',
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/g2-4s-gallery-exterior-18/zoom2/7958fbc4-562b-11e9-80c4-005056bbdc38;sN;twebp/porsche-zoom2.jpg'
            ]
        );
        $this->generateVehicle(
            'Porsche Panamera GTS Sport Turismo',
            'If you set yourself ambitious goals in life, you have to approach them with courage and passion. The Panamera does just that, blazing a trail with no compromises, uniting apparent opposites: performance and comfort, dynamism and efficiency, work and family.',
            'https://files1.porsche.com/filestore/image/multimedia/none/970-g2-gts-st-modelimage-sideshot/model/8436fd3a-cad0-11e8-81d2-0019999cd470;;twebp/porsche-model.png',
            132918.33,
            4.5,
            4.0,
            4.0,
            179,
            4.1,
            453,
            [
                'https://files1.porsche.com/filestore/image/multimedia/none/970-g2-gts-st-editorial-xl/normal/03cf722e-b1ce-11e8-8f14-0019999cd470;sF;twebp/porsche-normal.jpg',
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/modelseries-panamera-gts-st-gallery-exterior-10/zoom2/13b5e363-bb46-11e8-8f14-0019999cd470;sN;twebp/porsche-zoom2.jpg',
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/modelseries-panamera-gts-st-gallery-exterior-04/zoom2/b5ce5dcd-bb45-11e8-8f14-0019999cd470;sN;twebp/porsche-zoom2.jpg'
            ]
        );
        $this->generateVehicle(
            'Porsche Panamera Turbo S E-Hybrid Executive',
            'Porsche E-Performance is everything that you expect from a Porsche. And more. It is goose bumps. G-forces. Adrenalin. Because we are not satisfied with merely boosting efficiency when we can take performance and driving pleasure to the limits at the same time. There is a good reason why all of our experience and successes in motor sports have a major influence on development.',
            'https://files1.porsche.com/filestore/image/multimedia/none/970-g2-tus-e-hy-e-modelimage-sideshot/model/82d9a7c2-6046-11e9-80c4-005056bbdc38;sL;twebp/porsche-model.png',
            181806.79,
            4.5,
            4.0,
            4.0,
            192,
            3.5,
            670,
            [
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/970-g2-tus-e-hy-st-gallery-exterior-03/zoom2/d3a7fec2-17cc-11e9-ae19-0019999cd470;sN;twebp/porsche-zoom2.jpg',
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/970-g2-4hy-gallery-interior-01/zoom2/7123fcf3-24de-11e7-9f74-0019999cd470;sQ;twebp/porsche-zoom2.jpg',
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/970-g2-4hy-gallery-exterior-36/zoom2/336bd990-198f-11e9-ae19-0019999cd470;sN;twebp/porsche-zoom2.jpg'
            ]
        );
        $this->generateVehicle(
            'Porsche Macan Turbo',
            'We have proven that we do not follow trends. Instead, we design our own adventures. A compact SUV that inextricably combines sportiness, design and everyday practicality: the Macan.',
            'https://files1.porsche.com/filestore/image/multimedia/none/pa-tu-modelimage-sideshot/model/0d290e38-c3da-11e9-80c4-005056bbdc38;sL;twebp/porsche-model.png',
            57036.73,
            4.6,
            4.0,
            4.7,
            167,
            4.3,
            433,
            [
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/pa-r4-modelseries-gallery-outdoor-02/zoom2/2013fd91-f7c7-11e8-8373-0019999cd470;sQ;twebp/porsche-zoom2.jpg',
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/pa-r4-model-series-gallery-image-05/zoom2/0f5846de-867d-11e8-8d30-0019999cd470;sQ;twebp/porsche-zoom2.jpg',
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/pa-r4-model-series-gallery-image-09/zoom2/e2c1167e-867d-11e8-8d30-0019999cd470;sN;twebp/porsche-zoom2.jpg'
            ]
        );
        $this->generateVehicle(
            'Porsche Cayenne Turbo S E-Hybrid Coupé',
            'This shape, it has been around for many years. Our iconic flyline, has been lengthened, heightened and lowered, but has remained the same. It is a shape that has won races. Everyone recognises it - at night, in the fog and even blindfolded. A shape that can only be achieved with training; sprints, physical exertion and stamina, just like building muscle. This shape stands for all that we are.',
            'https://files1.porsche.com/filestore/image/multimedia/none/9yb-e3c-tu-s-e-hy-modelimage-sideshot/model/7089f674-aedd-11e9-80c4-005056bbdc38;sL;twebp/porsche-model.png',
            152577.79,
            4.5,
            4.0,
            4.0,
            183,
            3.8,
            670,
            [
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/model-series-e3-cayenne-coupe-turbo-s-e-hybrid-gallery-image-01/zoom2/01236b4f-b84f-11e9-80c4-005056bbdc38;sN;twebp/porsche-zoom2.jpg',
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/model-series-e3-cayenne-coupe-gallery-image-23/zoom2/5fe6936f-35e6-11e9-80c4-005056bbdc38;sN;twebp/porsche-zoom2.jpg',
                'https://files1.porsche.com/filestore/galleryimagerwd/multimedia/none/model-series-e3-cayenne-coupe-gallery-image-36/zoom2/0d5f1dcd-4a32-11e9-80c4-005056bbdc38;sN;twebp/porsche-zoom2.jpg'
            ]
        );
        $this->generateVehicle(
            'Porsche 918 Spyder',
            '',
            'https://banner2.cleanpng.com/20180608/vl/kisspng-porsche-911-gt3-2017-porsche-911-porsche-911-gt2-p-porsche-918-spyder-5b1aa9d9bf5d88.5494302715284740737838.jpg',
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
        // Ferrari

        // Ford

        // Nissan
    }

    protected function generateVehicle($name, $description, $thumbnail, $salePrice, $performance, $safety, $handling, $topSpeed, $acc, $bhp, $images)
    {
        $vehicle = new \stdClass();
        $vehicle->name = $name;
        $vehicle->description = $description;
        $vehicle->thumbnail = $this->getImageUrl($thumbnail, $name, 'public/vehicles/thumbnail');
        $vehicle->costPrice = ($salePrice - ($salePrice / 2));
        $vehicle->salePrice = $salePrice;
        $vehicle->performance = $performance;
        $vehicle->safety = $safety;
        $vehicle->handling = $handling;
        $vehicle->topSpeed = $topSpeed;
        $vehicle->acc = $acc;
        $vehicle->bhp = $bhp;
        $vehicle->images = $this->getImagesUrls($images, $name, 'public/vehicles/gallery');

        dd($vehicle);


        $this->vehiclesRaw[] = $vehicle;
    }

    protected function buildVehicles()
    {
        foreach($this->vehiclesRaw as $vehicle){
            $this->vehiclesParsed[] = [
                'name' => $vehicle->name,
                'description' => $vehicle->description,
                'thumbnail' => $vehicle->thumbnail,
                'cost_price' => $vehicle->costPrice,
                'sale_price' => $vehicle->salePrice,
                'performance' => $vehicle->performance,
                'safety' => $vehicle->safety,
                'handling' => $vehicle->handling,
                'top_speed' => $vehicle->topSpeed,
                '0_62' => $vehicle->acc,
                'bhp' => $vehicle->bhp,
                'images' => $vehicle->images,
                'deleted_at' => null,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
    }

    protected function getImageUrl($url, $name, $after)
    {

        $info = pathinfo($url);
        $contents = file_get_contents($url);
        $imageName = str_slug($name, '-') . '.' .$info['extension'];
        $file = '/tmp/' . $name . '.' . $info['extension'];
        file_put_contents($file, $contents);
        $uploaded_file = new UploadedFile($file, $imageName);
        //dd($uploaded_file);
        Storage::putFileAs($after, $uploaded_file, $imageName, true);
        return $after . '/' . $imageName;
    }

    protected function getImagesUrls($images, $name, $after)
    {
        $parsedImages = [];
        $index = 0;
        if($images!==null) {
            foreach ($images as $image) {
                $parsedImages[] = $this->getImageUrl($image, $name . '-' .$index, $after);
                $index++;
            }
        }
        return $parsedImages;
    }
}
