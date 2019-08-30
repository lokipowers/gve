<?php

use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{

    /**
     * @var array
     */
    protected $locations;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->europeanLocations();
        $this->americasLocations();
        $this->africanLocations();
        $this->asianLocations();
        $this->australianLocations();
        $this->oceaniaicLocations();
        DB::table('locations')->insert($this->locations);
    }

    protected function buildLocations($locations)
    {

        $index = 0;
        foreach($locations as $location) {
            $this->locations[] = [
                'name' => $location->name,
                'description' => $location->description,
                'latitude' => $location->latitude,
                'longitude' => $location->longitude,
                'country' => $location->country,
                'population' => $location->population,
                'currency' => $location->currency,
                'deleted_at' => null,
                'created_at' => now(),
                'updated_at' => now()
            ];
            $index++;
        }
        return true;
    }

    protected function europeanLocations()
    {

        $mariehamn = $this->generateLocation(
            'Mariehamn',
            'Mariehamn is the capital of Åland, an autonomous territory under Finnish sovereignty. Mariehamn is the seat of the Government and Parliament of Åland, and 40% of the population of Åland live in the city. Like all of Åland, Mariehamn is unilingually Swedish-speaking and around 88% of the inhabitants speak it as their native language.',
            '60.0945498', '19.9076797',
            'Aland Islands',
            11521,
        'EUR'

        );
        $tirana = $this->generateLocation(
            'Tirana',
            'Tirana is located in the center of Albania and is enclosed by mountains and hills with Mount Dajt elevating on the east and a slight valley on the northwest overlooking the Adriatic Sea in the distance. Due to its location within the Plain of Tirana and the close proximity to the Mediterranean Sea, the city is particularly influenced by a Mediterranean seasonal climate. It is among the wettest and sunniest cities in Europe, with 2,544 hours of sun per year.',
            '41.327545', '19.818699',
            'Albania',
            811649,
            'ALL'
        );
        $andorraLaVella = $this->generateLocation(
            'Andorra la Vella',
            'Andorra la Vella, is the capital of the Principality of Andorra. It is located high in the east Pyrenees, between France and Spain. It is also the name of the parish that surrounds the capital.',
            '42.507530', '1.521820',
            'Andorra',
            22128,
            'EUR'
        );
        $vienna = $this->generateLocation(
            'Vienna',
            'Vienna is the federal capital, largest city and one of nine states of Austria. Vienna is Austria\'s primate city, with a population of about 1.9 million[3] (2.6 million within the metropolitan area,[6] nearly one third of the country\'s population), and its cultural, economic, and political centre. It is the 7th-largest city by population within city limits in the European Union. Until the beginning of the 20th century, it was the largest German-speaking city in the world, and before the splitting of the Austro-Hungarian Empire in World War I, the city had 2 million inhabitants.[13] Today it is the second largest German-speaking city after Berlin and just before Hamburg.[14][15] Vienna is host to many major international organizations, including the United Nations and OPEC. The city is located in the eastern part of Austria and is close to the borders of Czechia, Slovakia, and Hungary. These regions work together in a European Centrope border region. Along with nearby Bratislava, Vienna forms a metropolitan region with 3 million inhabitants.[citation needed] In 2001, the city centre was designated a UNESCO World Heritage Site. In July 2017 it was moved to the list of World Heritage in Danger.',
            '48.208176', '16.373819',
            'Austria',
            1867582,
            'EUR'
        );
        $minsk = $this->generateLocation(
            'Minsk',
            'Minsk is the capital and largest city of Belarus, situated on the Svislač and the Nyamiha Rivers. As the national capital, Minsk has a special administrative status in Belarus and is the administrative centre of Minsk Region (voblasć) and Minsk District (rajon). The population in January 2018 was 1,982,444,[1] (not including suburbs) making Minsk the 11th most populous city in Europe. Minsk is the administrative capital of the Commonwealth of Independent States (CIS) and seat of its Executive Secretary.',
            '53.904541', '27.561523',
            'Belarus',
            1921807,
            'BYR'
        );
        $brussels = $this->generateLocation(
            'Brussels',
            'Brussels is a region of Belgium comprising 19 municipalities, including the City of Brussels, which is the capital of Belgium. The Brussels-Capital Region is located in the central portion of the country and is a part of both the French Community of Belgium and the Flemish Community, but is separate from the Flemish Region (in which it forms an enclave) and the Walloon Region. Brussels is the most densely populated and the richest region in Belgium in terms of GDP per capita. It covers 161 km2 (62 sq mi), a relatively small area compared to the two other regions, and has a population of 1.2 million. The metropolitan area of Brussels counts over 2.1 million people, which makes it the largest in Belgium. It is also part of a large conurbation extending towards Ghent, Antwerp, Leuven and Walloon Brabant, home to over 5 million people.',
            '50.850346', '4.351721',
            'Belgium',
            1175173,
            'EUR'
        );
        $sarajevo = $this->generateLocation(
            'Sarajevo',
            'Sarajevo is the capital and largest city of Bosnia and Herzegovina, with a population of 275,524 in its administrative limits. The Sarajevo metropolitan area, including Sarajevo Canton, East Sarajevo and nearby municipalities, is home to 555,210 inhabitants. Nestled within the greater Sarajevo valley of Bosnia, it is surrounded by the Dinaric Alps and situated along the Miljacka River in the heart of the Balkans.',
            '43.856258', '18.413076',
            'Bosnia and Herzegovina',
            275524,
            'BAM'
        );
        $sofia = $this->generateLocation(
            'Sofia',
            'Sofia is the capital and largest city of Bulgaria. The city is at the foot of Vitosha Mountain in the western part of the country. Being in the centre of the Balkans, it is midway between the Black Sea and the Adriatic Sea, and closest to the Aegean Sea.',
            '42.697708', '23.321867',
            'Bulgaria',
            1260120,
            'LEV'
        );
        $zagreb = $this->generateLocation(
            'Zagreb',
            'Zagreb is the capital and the largest city of Croatia. It is located in the northwest of the country, along the Sava river, at the southern slopes of the Medvednica mountain. Zagreb lies at an elevation of approximately 122 m (400 ft) above sea level. The estimated population of the city in 2018 was 820 678. The population of the Zagreb urban agglomeration is about 1.2 million, approximately a quarter of the total population of Croatia.',
            '45.815010', '15.981919',
            'Croatia',
            792875,
            'HRK'
        );
        $prague = $this->generateLocation(
            'Prague',
            'Prague is the capital and largest city in the Czech Republic, the 14th largest city in the European Union[9] and the historical capital of Bohemia. Situated in the northwest of Czechia on the Vltava river, Prague is home to about 1.3 million people, while its metropolitan area is estimated to have a population of 2.6 million. The city has a temperate climate, with warm summers and chilly winters.',
            '50.075539', '14.437800',
            'Czechia',
            1301132,
            'CZK'
        );
        $copenhagen = $this->generateLocation(
            'Copenhagen',
            'Copenhagen is the capital and most populous city of Denmark. As of July 2018, the city has a population of 777,218 (616,098 in Copenhagen Municipality, 103,914 in Frederiksberg Municipality, 43,005 in Tårnby Municipality, and 14,201 in Dragør Municipality). It forms the core of the wider urban area of Copenhagen (population 1,320,629) and the Copenhagen metropolitan area (population 2,057,737). Copenhagen is situated on the eastern coast of the island of Zealand; another small portion of the city is located on Amager, and it is separated from Malmö, Sweden, by the strait of Øresund. The Øresund Bridge connects the two cities by rail and road.',
            '55.676098', '12.568337',
            'Denmark',
            1295686,
            'DKK'
        );
        $tallinn = $this->generateLocation(
            'Tallinn',
            'Tallinn is the capital, primate and the most populous city of Estonia. Located in the northern part of the country, on the shore of the Gulf of Finland of the Baltic Sea, it has a population of 434,562. Administratively a part of Harju maakond (county), Tallinn is a major financial, industrial, cultural, educational and research centre of Estonia. Tallinn is located 80 kilometres (50 mi) south of Helsinki, Finland, 320 kilometres (200 mi) west of Saint Petersburg, Russia, and 380 kilometres (240 mi) east of Stockholm, Sweden. It has close historical ties with these three cities. From the 13th century until the first half of the 20th century Tallinn was known in most of the world by its historical German name Reval.',
            '59.436962', '24.753574',
            'Estonia',
            426538,
            'EUR'
        );
        $torshaven = $this->generateLocation(
            'Torshaven',
            'Torshaven is the capital and largest city of the Faroe Islands. Tórshavn is in the southern part on the east coast of Streymoy. To the northwest of the city lies the 347-meter-high (1,138 ft) mountain Húsareyn, and to the southwest, the 350-meter-high (1,150 ft) Kirkjubøreyn. They are separated by the Sandá River. The city itself has a population of 19,165 (2019), and the greater urban area a population of 21,078',
            '55.925831', '11.655420',
            'Faroe Islands',
            12648,
            'FOK'
        );
        $helsinki = $this->generateLocation(
            'Helsinki',
            'Helsinki is the capital and most populous city of Finland. Located on the shore of the Gulf of Finland, it is the seat of the region of Uusimaa in southern Finland, and has a population of 650,058. The city\'s urban area has a population of 1,268,296, making it by far the most populous urban area in Finland as well as the country\'s most important center for politics, education, finance, culture, and research. Helsinki is located 80 kilometres (50 mi) north of Tallinn, Estonia, 400 km (250 mi) east of Stockholm, Sweden, and 300 km (190 mi) west of Saint Petersburg, Russia. It has close historical ties with these three cities.',
            '60.169857', '24.938379',
            'Finland',
            629512,
            'EUR'
        );
        $paris = $this->generateLocation(
            'Paris',
            'Paris is the capital and most populous city of France, with an area of 105 square kilometres (41 square miles) and an official estimated population of 2,140,526 residents as of 1 January 2019. Since the 17th century, Paris has been one of Europe\'s major centres of finance, diplomacy, commerce, fashion, science, and the arts. The City of Paris is the centre and seat of government of the Île-de-France, or Paris Region, which has an estimated official 2019 population of 12,213,364, or about 18 percent of the population of France. The Paris Region had a GDP of €709 billion ($808 billion) in 2017. According to the Economist Intelligence Unit Worldwide Cost of Living Survey in 2018, Paris was the second most expensive city in the world, after Singapore, and ahead of Zürich, Hong Kong, Oslo and Geneva. Another source ranked Paris as most expensive, on a par with Singapore and Hong Kong, in 2018.',
            '48.856613', '2.352222',
            'France',
            2220445,
            'EUR'
        );
        $berlin = $this->generateLocation(
            'Berlin',
            'Berlin is the capital and largest city of Germany by both area and population. Its 3,748,148 (2018) inhabitants make it the second most populous city proper of the European Union after London. The city is one of Germany\'s 16 federal states. It is surrounded by the state of Brandenburg, and contiguous with Potsdam, Brandenburg\'s capital. The two cities are at the center of the Berlin-Brandenburg capital region, which is, with about six million inhabitants and an area of more than 30,000 km², Germany\'s third-largest metropolitan region after the Rhine-Ruhr and Rhine-Main regions.',
            '52.520008', '13.404954',
            'Germany',
            3748148,
            'EUR'
        );
        $gibraltar = $this->generateLocation(
            'Gibraltar',
            'Gibraltar is a British Overseas Territory located at the southern tip of the Iberian Peninsula. It has an area of 6.7 km2 (2.6 sq mi) and is bordered to the north by Spain. The landscape is dominated by the Rock of Gibraltar at the foot of which is a densely populated town area, home to over 30,000 people, primarily Gibraltarians.',
            '36.140751', '-5.353585',
            'Gibraltar',
            32194,
            'GIP'
        );
        $athens = $this->generateLocation(
            'Athens',
            'Athens is the capital and largest city of Greece. Athens dominates the Attica region and is one of the world\'s oldest cities, with its recorded history spanning over 3,400 years and its earliest human presence starting somewhere between the 11th and 7th millennium BC.',
            '37.983810', '23.727539',
            'Greece',
            664046,
            'EUR'
        );
        $stPeterPort = $this->generateLocation(
            'Saint Peter Port',
            'Saint Peter Port is the capital of Guernsey as well as the main port. The population in 2014 was 18,207. In Guernésiais and in French, historically the official language of Guernsey, the name of the town and its surrounding parish is St Pierre Port. The "port" distinguishes this parish from Saint Pierre Du Bois.',
            '49.458858', '-2.534750',
            'Guernsey',
            18207,
            'GGP'
        );
        $budapest = $this->generateLocation(
            'Budapest',
            'Budapest is the capital and the most populous city of Hungary, and the tenth-largest city in the European Union by population within city limits. The city has an estimated population of 1,752,286 over a land area of about 525 square kilometres (203 square miles). Budapest is both a city and county, and forms the centre of the Budapest metropolitan area, which has an area of 7,626 square kilometres (2,944 square miles) and a population of 3,303,786, comprising 33% of the population of Hungary.',
            '47.497913', '19.040236',
            'Hungary',
            1759407,
            'HUF'
        );
        $reykjavik = $this->generateLocation(
            'Reykjavik',
            'Reykjavík is the capital and largest city of Iceland. It is located in southwestern Iceland, on the southern shore of Faxaflói bay. Its latitude is 64°08\' N, making it the world\'s northernmost capital of a sovereign state. With a population of around 128,793 (and 228,231 in the Capital Region), it is the center of Iceland\'s cultural, economic and governmental activity, and is a popular tourist destination.',
            '64.126518', '-21.817438',
            'Iceland',
            123246,
            'ISK'
        );
        $dublin = $this->generateLocation(
            'Dublin',
            'Dublin is the capital and largest city of Ireland. Situated on a bay on the east coast, at the mouth of the River Liffey, it lies within the province of Leinster. It is bordered on the south by the Dublin Mountains, a part of the Wicklow Mountains range. It has an urban area population of 1,173,179, while the population of the Dublin Region (formerly County Dublin) as of 2016 was 1,347,359. The population of the Greater Dublin Area was 1,904,806 per the 2016 census.',
            '53.349804', '-6.260310',
            'Ireland',
            553165,
            'EUR'
        );
        $douglas = $this->generateLocation(
            'Douglas',
            'Douglas is the capital and largest town of the Isle of Man, with a population of 27,938 (2011). It is located at the mouth of the River Douglas, and on a sweeping bay of two miles. The River Douglas forms part of the town\'s harbour and main commercial port.',
            '31.508869', '-82.850388',
            'Isle of Man',
            27938,
            'IMP'
        );
        $rome = $this->generateLocation(
            'Rome',
            'Rome is the capital city and a special comune of Italy (named Comune di Roma Capitale). Rome also serves as the capital of the Lazio region. With 2,872,800 residents in 1,285 km2 (496.1 sq mi), it is also the country\'s most populated comune. It is the fourth most populous city in the European Union by population within city limits. It is the centre of the Metropolitan City of Rome, which has a population of 4,355,725 residents, thus making it the most populous metropolitan city in Italy. Rome is located in the central-western portion of the Italian Peninsula, within Lazio (Latium), along the shores of the Tiber. The Vatican City (the smallest country in the world) is an independent country inside the city boundaries of Rome, the only existing example of a country within a city: for this reason Rome has been often defined as capital of two states.',
            '41.902782', '12.496365',
            'Italy',
            2973494,
            'EUR'
        );
        $stHelier = $this->generateLocation(
            'Saint Helier',
            'Saint Helier is one of the twelve parishes of Jersey, the largest of the Channel Islands in the English Channel. St Helier has a population of about 33,500, roughly 34.2% of the total population of Jersey, and is the capital of the Island (although Government House is situated in St Saviour). The urban area of the parish of St Helier makes up most of the largest town in Jersey, although some of the town area is situated in adjacent St Saviour, with suburbs sprawling into St Lawrence and St Clement. The greater part of St Helier is rural.',
            '49.183529', '-2.106930',
            'Jersey',
            33500,
            'JEP'
        );
        $pristina = $this->generateLocation(
            'Pristina',
            'Pristina is the capital and largest city of Kosovo. The city has a majority Albanian population, alongside other smaller communities. With a municipal population of 204,721 inhabitants (2016), Pristina is the second-largest city in the world with a predominantly Albanian-speaking population, after Albania\'s capital, Tirana. Within Serbia, it would be the 4th largest. Geographically, it is located in the north-eastern part of Kosovo close to the Goljak mountains.',
            '42.665440', '21.165319',
            'Kosovo',
            211129,
            'EUR'
        );
        $riga = $this->generateLocation(
            'Riga',
            'Riga is the capital of Latvia and is home to 632,614 inhabitants (2019), which is a third of Latvia\'s population. Being significantly larger than other cities of Latvia, Riga is the country\'s primate city. It is also the largest city in the three Baltic states and is home to one tenth of the three Baltic states\' combined population. The city lies on the Gulf of Riga at the mouth of the Daugava river where it meets the Baltic Sea. Riga\'s territory covers 307.17 km2 (118.60 sq mi) and lies 1–10 m (3 ft 3 in–32 ft 10 in) above sea level, on a flat and sandy plain.',
            '56.949650', '24.105186',
            'Latvia',
            641423,
            'EUR'
        );
        $vaduz = $this->generateLocation(
            'Vaduz',
            'Vaduz is the capital of Liechtenstein and also the seat of the national parliament. The town, which is located along the Rhine River, has 5,450 residents.',
            '47.141029', '9.520928',
            'Leichtenstein',
            5429,
            'CHF'
        );
        $vilnius = $this->generateLocation(
            'Vilnius',
            'Vilnius is the capital of Lithuania and its largest city, with a population of 570,806 as of 2019. The population of Vilnius functional urban area, that stretches beyond the city limits, is estimated at 697,691 (as of 2017), while according to statistics of Vilnius territorial health insurance fund, there are 723,016 permanent inhabitants (as of June 2019) in Vilnius city and Vilnius district municipalities combined. Vilnius is in the southeast part of Lithuania and is the second largest city in the Baltic states. Vilnius is the seat of the main government institutions of Lithuania and the Vilnius District Municipality.',
            '54.687157', '25.279652',
            'Lithuania',
            570806,
            'EUR'
        );
        $luxembourg = $this->generateLocation(
            'Luxembourg',
            'Luxembourg, officially the Grand Duchy of Luxembourg, is a small landlocked country in western Europe. It is bordered by Belgium to the west and north, Germany to the east, and France to the south. Its capital, Luxembourg City, is one of the four official capitals of the European Union (together with Brussels, Frankfurt, and Strasbourg) and the seat of the European Court of Justice, the highest judicial authority in the EU. Its culture, people, and languages are highly intertwined with its neighbours, making it essentially a mixture of French and German cultures, as evident by the nation\'s three official languages: French, German, and the national language of Luxembourgish. The repeated invasions by Germany, especially in World War II, resulted in the country\'s strong will for mediation between France and Germany and, among other things, led to the foundation of the European Union.',
            '49.815273', '6.129583',
            'Luxembourg',
            107247,
            'EUR'
        );
        $valletta = $this->generateLocation(
            'Valletta',
            'Valletta is the capital city of Malta. Located in the south east of the island, between Marsamxett Harbour to the west and the Grand Harbour to the east, its population in 2014 was 6,444, while the metropolitan area around it has a population of 393,938. Valletta is the southernmost capital of Europe.',
            '35.898907', '14.514553',
            'Malta',
            6444,
            'EUR'
        );
        $chisinau = $this->generateLocation(
            'Chisinau',
            'Chisinau, also known as Kishinev (Russian: Кишинёв, tr. Kishinjóv [kʲɪʂɨˈnʲɵf]), and referred to as Kishineu (Кишинэу, [kʲɪʂɨˈnɛʊ]) in Russian-language media in Moldova, is the capital and largest city[9] of the Republic of Moldova. The city is Moldova\'s main industrial and commercial center, and is located in the middle of the country, on the river Bâc, a tributary of Dniester. According to the results of the 2014 census, the city proper had a population of 532,513, while the population of the Municipality of Chișinău (which includes the city itself and other nearby communities) was 662,836. Chișinău is the most economically prosperous locality in Moldova and its largest transportation hub.',
            '47.010452', '28.863810',
            'Moldova',
            492894,
            'MDL'
        );
        $monaco = $this->generateLocation(
            'Monaco',
            'Monaco, officially the Principality of Monaco (French: Principauté de Monaco), is a sovereign city-state, country, and microstate on the French Riviera in Western Europe. France borders the country on three sides while the other side borders the Mediterranean Sea. Monaco is about 15 km from the state border with Italy.',
            '43.738419', '7.424616',
            'Monaco',
            37308,
            'EUR'
        );
        $podgorica = $this->generateLocation(
            'Podgorica',
            'Podgorica is the capital and largest city of Montenegro. Between 1946 and 1992 – in the period that Montenegro formed, as the Socialist Republic of Montenegro, part of the Socialist Federal Republic of Yugoslavia (SFRY) – the city was known as Titograd in honour of Josip Broz Tito.',
            '42.438061', '19.265551',
            'Montenegro',
            187085,
            'EUR'
        );
        $amsterdam = $this->generateLocation(
            'Amsterdam',
            'Amsterdam is the capital and most populous city of the Netherlands, with a population of 866,737 within the city proper, 1,380,872 in the urban area, and 2,410,960 in the metropolitan area. Amsterdam is in the province of North Holland.',
            '52.370216', '4.895168',
            'Netherlands',
            851223,
            'EUR'
        );
        $skopje = $this->generateLocation(
            'Skopje',
            'Skopje is the capital and largest city of North Macedonia. It is the country\'s political, cultural, economic, and academic center.',
            '41.997345', '21.427996',
            'North Macedonia',
            506926,
            'MKD'
        );
        $oslo = $this->generateLocation(
            'Oslo',
            'Oslo is the capital and most populous city of Norway. It constitutes both a county and a municipality. Founded in the year 1040 as Ánslo, and established as a kaupstad or trading place in 1048 by Harald Hardrada, the city was elevated to a bishopric in 1070 and a capital under Haakon V of Norway around 1300. Personal unions with Denmark from 1397 to 1523 and again from 1536 to 1814 reduced its influence. After being destroyed by a fire in 1624, during the reign of King Christian IV, a new city was built closer to Akershus Fortress and named Christiania in the king\'s honour. It was established as a municipality on 1 January 1838. The city functioned as a co-official capital during the 1814 to 1905 Union between Sweden and Norway. In 1877, the city\'s name was respelled Kristiania in accordance with an official spelling reform – a change that was taken over by the municipal authorities only in 1897. In 1925 the city, after incorporating the village retaining its former name, was renamed Oslo.',
            '59.913868', '10.752245',
            'Norway',
            658390,
            'NOK'
        );
        $warsaw = $this->generateLocation(
            'Warsaw',
            'Warsaw is the capital and largest city of Poland. The metropolis stands on the Vistula River in east-central Poland and its population is officially estimated at 1.78 million residents within a greater metropolitan area of 3.1 million residents, which makes Warsaw the 8th most-populous capital city in the European Union. The city limits cover 516.9 square kilometres (199.6 sq mi), while the metropolitan area covers 6,100.43 square kilometres (2,355.39 sq mi). Warsaw is an alpha global city, a major international tourist destination, and a significant cultural, political and economic hub. Its historical Old Town was designated a UNESCO World Heritage Site.',
            '52.229675', '21.012230',
            'Poland',
            1764615,
            'PLN'
        );
        $lisbon = $this->generateLocation(
            'Lisbon',
            'Lisbon is the capital and the largest city of Portugal, with an estimated population of 505,526 within its administrative limits in an area of 100.05 km2. Lisbon\'s urban area extends beyond the city\'s administrative limits with a population of around 2.8 million people, being the 11th-most populous urban area in the European Union. About 3 million people live in the Lisbon metropolitan area, including the Portuguese Riviera (which represents approximately 27% of the country\'s population). It is mainland Europe\'s westernmost capital city and the only one along the Atlantic coast. Lisbon lies in the western Iberian Peninsula on the Atlantic Ocean and the River Tagus. The westernmost portions of its metro area form the westernmost point of Continental Europe, which is known as Cabo da Roca, located in the Sintra Mountains.',
            '38.722252', '-9.139337',
            'Portugal',
            545245,
            'EUR'
        );
        $bucharest = $this->generateLocation(
            'Bucharest',
            'Bucharest is the capital and largest city of Romania, as well as its cultural, industrial, and financial centre. It is located in the southeast of the country, at 44°25′57″N 26°06′14″ECoordinates: 44°25′57″N 26°06′14″E, on the banks of the Dâmbovița River, less than 60 km (37.3 mi) north of the Danube River and the Bulgarian border.',
            '44.426765', '26.102537',
            'Romania',
            2106144,
            'RON'
        );
        $moscow = $this->generateLocation(
            'Moscow',
            'Moscow  is the capital and most populous city of Russia, with 13.2 million residents within the city limits, 17 million within the urban area and 20 million within the metropolitan area. Moscow is one of Russia\'s federal cities.',
            '55.755825', '37.617298',
            'Russia',
            13197596,
            'RUB'
        );
        $sanMarino = $this->generateLocation(
            'San Marino',
            'San Marino officially the Republic of San Marino, also known as the Most Serene Republic of San Marino, is a Southern European microstate[6] on the northeastern side of the Apennine Mountains, completely surrounded by Italy.',
            '43.942360', '12.457777',
            'San Marino',
            33285,
            'EUR'
        );
        $belgrade = $this->generateLocation(
            'Belgrade',
            'Belgrade is the capital and largest city of Serbia. It is located at the confluence of the Sava and Danube rivers and the crossroads of the Pannonian Plain and the Balkan Peninsula. The urban area of Belgrade has a population of 1.23 million, while within administrative limits of the City of Belgrade (which encompasses almost all of its metropolitan area) live nearly 1.7 million people, a quarter of total population of Serbia.',
            '44.786568', '20.448921',
            'Serbia',
            1166763,
            'RSD'
        );
        $bratislava = $this->generateLocation(
            'Bratislava',
            'Bratislava is the capital of Slovakia. With a population of about 430,000, it is one of the smaller capitals of Europe but still the country\'s largest city. The greater metropolitan area is home to more than 650,000 people. Bratislava is in southwestern Slovakia, occupying both banks of the River Danube and the left bank of the River Morava. Bordering Austria and Hungary, it is the only national capital that borders two sovereign states.',
            '48.148598', '17.107748',
            'Slovakia',
            432801,
            'EUR'
        );
        $ljubijana = $this->generateLocation(
            'Ljubljana',
            'Ljubljana is the capital and largest city of Slovenia. It has been the cultural, educational, economic, political, and administrative centre of independent Slovenia since 1991.',
            '46.056946', '14.505752',
            'Slovenia',
            279756,
            'EUR'
        );
        $madrid = $this->generateLocation(
            'Madrid',
            'Madrid is the capital and most populous city of Spain. The city has almost 3.3 million inhabitants and a metropolitan area population of approximately 6.5 million. It is the third-largest city in the European Union (EU), surpassed only by London and Berlin, and its monocentric metropolitan area is the third-largest in the EU, smaller only than those of London and Paris. The municipality covers 604.3 km2 (233.3 sq mi).',
            '40.416775', '-3.703790',
            'Spain',
            3182981,
            'EUR'
        );
        $longyearbyen = $this->generateLocation(
            'Longyearbyen',
            'Longyearbyen is the largest settlement and the administrative centre of Svalbard, Norway. As of December 2015, the town had a population of 2,144. Longyearbyen is located in the Longyear Valley and on the shore of Adventfjorden, a bay of Isfjorden located on the west coast of Spitsbergen. Since 2002, Longyearbyen Community Council has had many of the same responsibilities of a municipality, including utilities, education, cultural facilities, fire brigade, roads and ports. The town is the seat of the Governor of Svalbard. It is the world\'s northernmost settlement of any kind with more than 1,000 permanent residents. Since 2011 it has been governed by Mayor Christin Kristoffersen.',
            '78.223175', '15.626723',
            'Svalbard',
            2144,
            'NOK'
        );
        $stockholm = $this->generateLocation(
            'Stockholm',
            'Stockholm is the capital of Sweden and the most populous urban area in the Nordic countries;[a] 965,232 people live in the municipality, approximately 1.6 million in the urban area, and 2.4 million in the metropolitan area. The city stretches across fourteen islands where Lake Mälaren flows into the Baltic Sea. Outside the city to the east, and along the coast, is the island chain of the Stockholm archipelago. The area has been settled since the Stone Age, in the 6th millennium BC, and was founded as a city in 1252 by Swedish statesman Birger Jarl. It is also the county seat of Stockholm County.',
            '59.329323', '18.068581',
            'Sweden',
            935619,
            'SEK'
        );
        $bern = $this->generateLocation(
            'Bern',
            'Bern is the de facto capital of Switzerland, referred to by the Swiss as their "federal city", in German Bundesstadt, French ville fédérale, and Italian città federale. With a population of about 140,000 (as of 2019), Bern is the fifth-most populous city in Switzerland. The Bern agglomeration, which includes 36 municipalities, had a population of 406,900 in 2014. The metropolitan area had a population of 660,000 in 2000. Bern is also the capital of the canton of Bern, the second-most populous of Switzerland\'s cantons.',
            '46.947975', '7.447447',
            'Switzerland',
            133071,
            'CHF'
        );
        $kiev = $this->generateLocation(
            'Kiev',
            'Kiev is the capital and most populous city of Ukraine, located in the north-central part of the country on the Dnieper. The population in July 2015 was 2,887,974 (though higher estimated numbers have been cited in the press), making Kiev the 7th most populous city in Europe.',
            '50.450100', '30.523399',
            'Ukraine',
            2900920,
            'UAH'
        );
        $london = $this->generateLocation(
            'London',
            'London is the capital of and largest city in England and the United Kingdom, with the largest municipal population in the European Union. Standing on the River Thames in the south-east of England, at the head of its 50-mile (80 km) estuary leading to the North Sea, London has been a major settlement for two millennia. Londinium was founded by the Romans. The City of London, London\'s ancient core − an area of just 1.12 square miles (2.9 km2) and colloquially known as the Square Mile − retains boundaries that follow closely its medieval limits, The City of Westminster is also an Inner London borough holding city status. Greater London is governed by the Mayor of London and the London Assembly.',
            '51.528308', '-0.381768',
            'United Kingdom',
            8673713,
            'GBP'
        );


        $this->buildLocations(
            [
                $mariehamn,
                $tirana,
                $andorraLaVella,
                $vienna,
                $minsk,
                $brussels,
                $sarajevo,
                $sofia,
                $zagreb,
                $prague,
                $copenhagen,
                $tallinn,
                $torshaven,
                $helsinki,
                $paris,
                $berlin,
                $gibraltar,
                $athens,
                $stPeterPort,
                $budapest,
                $reykjavik,
                $dublin,
                $douglas,
                $rome,
                $stHelier,
                $pristina,
                $riga,
                $vaduz,
                $vilnius,
                $luxembourg,
                $valletta,
                $chisinau,
                $monaco,
                $podgorica,
                $amsterdam,
                $skopje,
                $oslo,
                $warsaw,
                $lisbon,
                $bucharest,
                $moscow,
                $sanMarino,
                $belgrade,
                $bratislava,
                $ljubijana,
                $madrid,
                $longyearbyen,
                $stockholm,
                $bern,
                $kiev,
                $london
            ]
        );
    }

    protected function americasLocations()
    {
        $theValley = $this->generateLocation(
            'The Valley',
            'The Valley is the capital of the Caribbean island of Anguilla. A small town in the centre of the island, it’s known for its colonial buildings. Wallblake House is a restored 1787 plantation house with period details, kitchens and a stable. Nearby, the ruins of the Old Court House, on Crocus Hill, offer panoramic coastal views. The original church bell hangs outside the Ebenezer Methodist Church, rebuilt in 1830.',
            '18.2151963,', '-63.0685178',
            'Anguilla',
            1067,
            'XCD'
        );
        $stJohns = $this->generateLocation(
            'Saint Johns',
            'St. John’s is the capital and key port of the Caribbean island nation of Antigua and Barbuda. The city is home to the Museum of Antigua and Barbuda, with exhibits on indigenous tribes and plantation life. St. John’s Cathedral, a 19th-century Anglican church, is on a hill near the 17th-century Government House. A monument to the nation’s founder, V.C. Bird, is next to the Public Market, which sells crafts and produce.',
            '17.1255118', '-61.8624044',
            'Antigua and Barbuda',
            81799,
            'XCD'
        );
        $buenosAries = $this->generateLocation(
            'Buenos Aries',
            'Buenos Aires is Argentina’s big, cosmopolitan capital city. Its center is the Plaza de Mayo, lined with stately 19th-century buildings including Casa Rosada, the iconic, balconied presidential palace. Other major attractions include Teatro Colón, a grand 1908 opera house with nearly 2,500 seats, and the modern MALBA museum, displaying Latin American art.',
            '-34.6158037', '-58.5033379',
            'Argentina',
            2890151,
            'ARS'
        );
        $oranjestad = $this->generateLocation(
            'Oranjestad',
            'Oranjestad is the capital of the Dutch island of Aruba, in the Caribbean Sea. Near the marina, the 18th-century Fort Zoutman and the Willem III Tower, formerly a lighthouse, house the Historical Museum, which chronicles the island’s past. The Archaeological Museum displays indigenous artifacts dating back as far as 2500 B.C. Along the waterfront, L.G. Smith Boulevard is dotted with boutiques and shopping malls.',
            '12.5082876', '-70.0482591',
            'Aruba',
            34980,
            'AWG'
        );
        $nassau = $this->generateLocation(
            'Nassau',
            'Nassau is the capital of the Bahamas. It lies on the island of New Providence, with neighboring Paradise Island accessible via Nassau Harbor bridges. A popular cruise-ship stop, the city has a hilly landscape and is known for beaches as well as its offshore coral reefs, popular for diving and snorkeling. It retains many of its typical pastel-colored British colonial buildings, like the pink-hued Government House.',
            '25.0324949', '-77.5471757',
            'The Bahamas',
            274400,
            'BSD'
        );
        $bridgetown = $this->generateLocation(
            'Bridgetown',
            'Bridgetown, the capital of Barbados, is a port city on the island’s southwest coast. It\'s known for its British colonial architecture, 17th-century Garrison and horseracing track. Near the central National Heroes Square, which fringes the Constitution River, Nidhe Israel Synagogue and its museum explore the island’s Jewish history. Carlisle Bay is home to 6 shipwreck dive sites, Browne’s Beach and a yacht club.',
            '13.1013093', '-59.631557',
            'Barbados',
            110000,
            'BBD'
        );
        $belmopan = $this->generateLocation(
            'Belmopan',
            'Belmopan is the capital city of Belize. Its population in 2010 was 16,451. Although the smallest capital city in the continental Americas by population, Belmopan is the third-largest settlement in Belize, behind Belize City and San Ignacio.',
            '17.2548368', '-88.8001089',
            'Belize',
            16451,
            'BZD'
        );
        $hamilton = $this->generateLocation(
            'Hamilton',
            'Hamilton is the capital city of Bermuda, a British island territory in the North Atlantic. Along the harbour, Front Street features pastel-coloured colonial buildings and high-end shops. The stone Cathedral of the Most Holy Trinity has a tower with city views. The Bermuda Underwater Exploration Institute offers ocean discovery exhibits. Northeast is the Bermuda Aquarium, Museum and Zoo, home to sharks and turtles.',
            '32.2951057', '-64.7931787',
            'Bermuda',
            1010,
            'BMD'
        );
        $sucre = $this->generateLocation(
            'Sucre',
            'Sucre is a city in the southern highlands of Bolivia. The whitewashed Casa de la Libertad, where Bolivia’s Declaration of Independence was signed, houses galleries related to the city\'s past as the national capital. Also on Plaza 25 de Mayo, the main square, is the Catedral Metropolitana, an ornate colonial church. Nearby is the Museo Universitario Charcas USFXCH, featuring religious artifacts and contemporary art.',
            '-19.0206372', '-65.3298318',
            'Bolivia',
            300000,
            'BOB'
        );
        $brasilia = $this->generateLocation(
            'Brasilia',
            'Brasília, inaugurated as Brazil’s capital in 1960, is a planned city distinguished by its white, modern architecture, chiefly designed by Oscar Niemeyer. Laid out in the shape of an airplane, its “fuselage” is the Monumental Axis, 2 wide avenues flanking a massive park. In the “cockpit” is Praça dos Três Poderes, named for the 3 branches of government surrounding it.',
            '-15.7217175', '-48.0774409',
            'Brazil',
            2570160,
            'BRL'
        );
        $roadTown = $this->generateLocation(
            'Road Town',
            'Road Town, located on Tortola, is the capital of the British Virgin Islands. It is situated on the horseshoe-shaped Road Harbour in the centre of the island\'s south coast.',
            '18.4243245', '-64.6333623,',
            'British Virgin Islands',
            12603,
            'USD'
        );
        $ottawa = $this->generateLocation(
            'Ottawa',
            'Ottawa is Canada’s capital, in the east of southern Ontario, near the city of Montréal and the U.S. border. Sitting on the Ottawa River, it has at its centre Parliament Hill, with grand Victorian architecture and museums such as the National Gallery of Canada, with noted collections of indigenous and other Canadian art. The park-lined Rideau Canal is filled with boats in summer and ice-skaters in winter.',
            '45.2487864,', '-76.3606405',
            'Canada',
            934243,
            'CAD'
        );
        $georgeTown = $this->generateLocation(
            'George Town',
            'George Town is the capital of the Cayman Islands. It lies in the west of the largest island, Grand Cayman. It’s known as a financial hub and a port of call for cruise ships. Tax-free shops cluster around Cardinal Avenue. The Cayman Islands National Museum is housed in a 19th-century building on Harbour Drive. It contains displays on local history, culture and wildlife.',
            '19.2901656', '-81.3870243',
            'Cayman Islands',
            28836,
            'KYD'
        );
        $santiago = $this->generateLocation(
            'Santiago',
            'Santiago, Chile’s capital and largest city, sits in a valley surrounded by the snow-capped Andes and the Chilean Coast Range. Plaza de Armas, the grand heart of the city’s old colonial core, is home to 2 neoclassical landmarks: the 1808 Palacio de la Real Audiencia, housing the National History Museum, and the 18th-century Metropolitan Cathedral. La Chascona is the home-turned-museum of poet Pablo Neruda.',
            '-33.4727092', '-70.7699133',
            'Chile',
            4325647,
            'CLP'
        );
        $bogota = $this->generateLocation(
            'Bogota',
            'Bogotá is Colombia’s sprawling, high-altitude capital. La Candelaria, its cobblestoned center, features colonial-era landmarks like the neoclassical performance hall Teatro Colón and the 17th-century Iglesia de San Francisco. It\'s also home to popular museums including the Museo Botero, showcasing Fernando Botero\'s art, and the Museo del Oro, displaying pre-Columbian gold pieces.',
            '4.6482837', '-74.2478904',
            'Colombia',
            8080734,
            'COP'
        );
        $sanJose = $this->generateLocation(
            'San Jose',
            'San José is a province of Costa Rica. It is located in the central part of the country, and borders the provinces of Alajuela, Heredia, Limón, Cartago and Puntarenas. The provincial and national capital is San José. The province covers an area of 4,965.9 km². and has a population of 1,404,242.',
            '9.935607,', '-84.1833848',
            'Costa Rica',
            1404242,
            'CRC'
        );
        $havana = $this->generateLocation(
            'Havana',
            'Havana is Cuba’s capital city. Spanish colonial architecture in its 16th-century Old Havana core includes the Castillo de la Real Fuerza, a fort and maritime museum. The National Capitol Building is an iconic 1920s landmark. Also in Old Havana is the baroque Catedral de San Cristóbal and Plaza Vieja, whose buildings reflect the city’s vibrant architectural mix.',
            '23.0504398', '-82.6131819',
            'Cuba',
            2106146,
            'CUP'
        );
        $willemstad = $this->generateLocation(
            'Willemstad',
            'Willemstad is the capital city of Curaçao, a Dutch Caribbean island. It’s known for its old town center, with pastel-colored colonial architecture. The floating Queen Emma Bridge connects the Punda and Otrobanda neighborhoods across Sint Anna Bay. By the water is the 19th-century Rif Fort, now housing a shopping center. City restaurants serve dishes influenced by the island\'s mostly Dutch and Afro-Caribbean cuisines.',
            '12.128438', '-68.9685542',
            'Curacao',
            150000,
            'ANG'
        );
        $roseau = $this->generateLocation(
            'Roseau',
            'Roseau is the capital of the Caribbean island nation of Dominica. It\'s on the southwest coast and known for its 18th-century Creole architecture. Its cobblestone Old Market, formerly a slave auction site, sells crafts and fruit. It’s next to the Dominica Museum, with exhibits on the country’s natural and cultural history. The Dominica Botanic Gardens showcase tropical flora and native Sisserou parrots.',
            '15.3060796', '-61.3948393',
            'Dominica',
            16582,
            'DOP'
        );
        $santoDomingo = $this->generateLocation(
            'Santo Domingo',
            'Santo Domingo is the capital of the Dominican Republic and one of the Caribbean\'s oldest cities. Its walled, cobblestoned historic core, the Zona Colonial, has buildings that date to the 1500s, including the cathedral, which was the first built in the New World. On the cafe-lined Plaza de España is the Alcázar de Colón palace. It’s now one of the city’s many museums, displaying notable medieval and Renaissance art.',
            '18.4800103', '-70.0170512',
            'Dominican Republic',
            965040,
            'DOP'
        );
        $quito = $this->generateLocation(
            'Quito',
            'Quito, Ecuador\'s capital, sits high in the Andean foothills at an altitude of 2,850m. Constructed on the foundations of an ancient Incan city, it’s known for its well-preserved colonial center, rich with 16th- and 17th-century churches and other structures blending European, Moorish and indigenous styles. These include the cathedral, in the Plaza Grande square, and ultra-ornate Compañia de Jesús Jesuit church.',
            '-0.1865938', '-78.5706216',
            'Ecuador',
            2239191,
            'USD'
        );
        $sanSalvador = $this->generateLocation(
            'San Salvador',
            'San Salvador is the capital and the most populous city of El Salvador and its eponymous department. It is the country\'s political, cultural, educational and financial center. The Metropolitan Area of San Salvador which comprises the capital itself and 13 of its municipalities has a population of 2,404,097.',
            '13.6914757', '-89.2502711',
            'El Salvador',
            2404097,
            'SVC'
        );
        $stanley = $this->generateLocation(
            'Stanley',
            'Stanley is the capital of the Falkland Islands (Islas Malvinas), a remote South Atlantic archipelago. The Historic Dockyard Museum has galleries devoted to maritime exploration, natural history, the 1982 Falklands War and Antarctic heritage. By the waterfront, a whalebone arch stands near the entrance of Christ Church Cathedral, which was built in the late 1800s. Magellanic penguins gather at nearby Gypsy Cove.',
            '-51.6966287', '-57.8800968',
            'Falkland Islands',
            2121,
            'FKP'
        );
        $cayenne = $this->generateLocation(
            'Cayenne',
            'Cayenne is the capital of French Guiana, on the northeast coast of South America. Its 17th-century old town district blends influences from France, the Caribbean and Brazil. Tropical-colored Creole-style houses sit beside hilltop ruins of the French colonial Fort Cépérou, which overlooks the Cayenne River. Shops and cafes can be found on the main commercial thoroughfare, Avenue du Général de Gaulle.',
            '4.91969', '-52.3464315',
            'French Guiana',
            55198,
            'EUR'
        );
        $nuuk = $this->generateLocation(
            'Nuuk',
            'Nuuk, Greenland\'s capital, is a small city on the country\'s southwest coast. Its large fjord system is known for waterfalls, humpback whales and icebergs. The waterfront is dotted with brightly colored houses against the backdrop of Sermitsiaq mountain. Greenland National Museum has mummies and Inuit skin boats, while the Nuuk Art Museum displays local works. The Katuaq cultural center offers films, concerts and art.',
            '64.1791025', '-51.7418291',
            'Greenland',
            17316,
            'DKK'
        );
        $saintGeorges = $this->generateLocation(
            'Saint George\'s',
            'St. George’s is the capital city of the Caribbean island of Grenada. In the town center, the 18th-century Fort George offers panoramic views of the island and St. George’s Bay. Nearby, Fort Matthew was formerly a battleground and, later, an asylum, and has underground tunnels. The Grenada National Museum hosts exhibits about the history of the region, including the plantation economy and the whaling industry.',
            '12.0539679', '-61.7588454',
            'Grenada',
            33734,
            'XCD'
        );
        $basseTerre = $this->generateLocation(
            'Basse-Terre',
            'Basse-Terre is a French commune in the Guadaloupe department of France in the Lesser Antilles. It is also the prefecture of Guadeloupe. The city of Basse-Terre is located on Basse-Terre Island, the western half of Guadeloupe.',
            '16.0101736', '-61.7489567',
            'Guadeloupe',
            11395,
            'EUR'
        );
        $guatemalaCity = $this->generateLocation(
            'Guatemala City',
            'Guatemala City is the capital of Guatemala, in Central America. It’s known for its Mayan history, high-altitude location and nearby volcanoes. On central Plaza Mayor, also known as Parque Central, the Metropolitan Cathedral is full of colonial paintings and religious carvings. The National Palace of Culture has a balcony overlooking the square. South of the city, trails lead up to the active Pacaya Volcano.',
            '14.6262096', '-90.5626001',
            'Guatemala',
            2110100,
            'GTQ'
        );
        $georgeTown = $this->generateLocation(
            'Georgetown',
            'Georgetown is Guyana’s capital, on South America’s North Atlantic coast. The city is culturally connected to the English-speaking Caribbean region and home to British colonial architecture, including the tall, Gothic-style St. George\'s Anglican Cathedral. A clock tower rises above Stabroek Market, popular for local goods. The Guyana National Museum traces the country\'s history, while the Bourda hosts cricket matches.',
            '6.787627', '-58.1865528',
            'Guyana',
            131395,
            'GYD'
        );
        $portAuPrince = $this->generateLocation(
            'Port-au-Prince',
            'Port-au-Prince, Haiti’s capital city, sits on the Gulf of Gonâve. The Musée du Panthéon National Haïtien honors the nation’s history and founding fathers. The Iron Market, a large 1891 covered bazaar, has produce and handicraft vendors. Nearby is the immense Notre Dame de l\'Assomption Cathedral, reduced to a ruin by a 2010 earthquake. Colorful gingerbread-style houses from the turn of the 19th century dot the city.',
            '18.5790242', '-72.3544997',
            'Haiti',
            987310,
            'USD'
        );
        $tegucigalpa = $this->generateLocation(
            'Tegucigalpa',
            'Tegucigalpa is the capital city of Honduras. Set in a central valley surrounded by mountains, it’s known for its well-preserved Spanish colonial architecture. The main Plaza Morazán is dominated by the 18th-century Cathedral of St. Michael the Archangel, with its baroque interior. The Museum of National Identity traces the country’s history. It includes a virtual tour of the Copán Mayan ruins of western Honduras.',
            '14.0839053', '-87.2750124',
            'Honduras',
            1157509,
            'HNL'
        );
        $kingston = $this->generateLocation(
            'Kingston',
            'Kingston is the capital of the island of Jamaica, lying on its southeast coast. In the city center, the Bob Marley Museum is housed in the reggae singer’s former home. Nearby, Devon House is a colonial-era mansion with period furnishings. Hope Botanical Gardens & Zoo showcases native flora and fauna. Northeast of the city, the Blue Mountains are a renowned coffee-growing region with trails and waterfalls.',
            '18.0179237', '-76.870696',
            'Jamaica',
            584627,
            'JMD'
        );
        $fortDeFrance = $this->generateLocation(
            'Fort-de-France',
            'Fort-de-France is the capital of the Caribbean island of Martinique, a French overseas territory. It’s known for colonial architecture, ornate iron balconies, tropical flowers and beaches. La Savane park has a statue of Napoleon I’s wife Joséphine, a native of the island. Exhibits at the Martinique Museum of Archaeology and Prehistory focus on the island’s history, especially the pre-Columbian period. .',
            '14.6486969', '-61.1038117',
            'Martinique',
            85295,
            'EUR'
        );
        $mexicoCity = $this->generateLocation(
            'Mexico City',
            'Mexico City, or the City of Mexico, is the capital of Mexico and the most populous city in North America. It is one of the most important cultural and financial centres in the Americas. It is located in the Valley of Mexico (Valle de México), a large valley in the high plateaus in the center of Mexico, at an altitude of 2,240 meters (7,350 ft). The city has 16 boroughs.',
            '19.3204434', '-99.2926964',
            'Mexico',
            8918653,
            'MXN'
        );
        $brades = $this->generateLocation(
            'Brades',
            'Brades is a town and the de facto capital of Montserrat since 1998 with an approximate population of 1,000.',
            '16.7909807', '-62.2154904',
            'Montserrat',
            449,
            'XCD'
        );
        $managua = $this->generateLocation(
            'Managua',
            'Managua, on the south shore of Lake Managua, is the capital city of Nicaragua. Its cathedral, a shell since a 1972 earthquake, is on the Plaza of the Revolution. Nearby is the tomb of Sandinista leader Carlos Fonseca. The 1935 National Palace of Culture houses the National Museum. Hilltop Parque Histórico Nacional Loma de Tiscapa is known for its crater lake and huge statue of revolutionary Augusto Sandino.',
            '12.0976239', '-86.3985438',
            'Nicaragua',
            1033622,
            'NIO'
        );
        $panamaCity = $this->generateLocation(
            'Panama City',
            'Panama City, the capital of Panama, is a modern city framed by the Pacific Ocean and man-made Panama Canal. Casco Viejo, its cobblestoned historic center, is famed for colonial-era landmarks like the neoclassical Palacio Presidencial and bougainvillea-filled plazas lined with cafes and bars. The Miraflores Locks offers views of ships traversing the canal, an essential shipping route linking the Atlantic and Pacific.',
            '9.0813885', '-79.5932206',
            'Panama',
            880691,
            'PAB'
        );
        $asuncion = $this->generateLocation(
            'Asuncion',
            'Asunción is the capital city of Paraguay, bordered by the Paraguay River. It’s known for its grand López Palace, the seat of government housing the president’s offices. Nearby, the National Pantheon of Heroes has a mausoleum and plaques commemorating Paraguayan historical figures. The Independence House Museum is marked by its colonial architecture and features artifacts documenting emancipation from Spanish rule.',
            '-25.2968361', '-57.6681287',
            'Paraguay',
            525294,
            'PYG'
        );
        $lima = $this->generateLocation(
            'Lima',
            'Lima, the capital of Peru, lies on the country\'s arid Pacific coast. Though its colonial center is preserved, it\'s a bustling metropolis and one of South America’s largest cities. It\'s home to the Museo Larco collection of pre-Columbian art and the Museo de la Nación, tracing the history of Peru’s ancient civilizations. The Plaza de Armas and the 16th-century cathedral are the heart of old Lima Centro.',
            '-12.0266034', '-77.1278624',
            'Peru',
            10852210,
            'PEN'
        );
        $sanJuan = $this->generateLocation(
            'San Juan',
            'San Juan, Puerto Rico\'s capital and largest city, sits on the island\'s Atlantic coast. Its widest beach fronts the Isla Verde resort strip, known for its bars, nightclubs and casinos. Cobblestoned Old San Juan features colorful Spanish colonial buildings and 16th-century landmarks including El Morro and La Fortaleza, massive fortresses with sweeping ocean views, as well as the Paseo de la Princesa bayside promenade.',
            '18.3892246', '-66.1305121',
            'Puerto Rico',
            395326,
            'USD'
        );
        $gustavia = $this->generateLocation(
            'Gustavia',
            'Gustavia is the main town and capital of the island of Saint Barthélemy. Originally called Le Carénage, it was renamed in honor of King Gustav III of Sweden.',
            '17.8966456', '-62.8548887',
            'Saint Barthelemy',
            2300,
            'EUR'
        );
        $basseterre = $this->generateLocation(
            'Basseterre',
            'Basseterre is the capital of the Caribbean island federation of Saint Kitts and Nevis. It’s the gateway to popular Saint Kitts beaches like South Friars Bay. At the city’s heart, Independence Square has an Italian-inspired fountain. Just off the Circus traffic circle, with its Victorian Berkeley Memorial Clock Tower, is the National Museum. In the stately Old Treasury Building, it explores the islands’ colonial past.',
            '17.3021931', '-62.732344',
            'Saint Kitts and Nevis',
            13000,
            'XCD'
        );
        $castries = $this->generateLocation(
            'Castries',
            'Castries is the capital of the island nation of St. Lucia, in the Caribbean Sea. It’s known for palm-lined Vigie Beach and as a port of call for cruise lines, with duty-free shopping near the harbor. The Cathedral Basilica of the Immaculate Conception, with its colorful murals, sits by leafy Derek Walcott Square park. Lively Castries Market is nearby. In the south, Morne Fortune hill offers views of the city.',
            '14.0104826', '-60.9951591',
            'Saint Lucia',
            70000,
            'XCD'
        );
        $marigot = $this->generateLocation(
            'Marigot',
            'Marigot is the main town and capital in the French Collectivity of Saint Martin.',
            '18.0691248', '-63.1003834',
            'Saint Martin',
            5700,
            'EUR'
        );
        $saintPierre = $this->generateLocation(
            'Saint-Pierre',
            'Saint Pierre and Miquelon is a French archipelago south of the Canadian island of Newfoundland. Sparsely populated Miquelon-­Langlade island contains the Grand Barachois lagoon, home to seabirds and seals. The busier Saint Pierre island has a distinct French atmosphere, with a cathedral and the Musée Heritage, which celebrates regional history. An island nearby, Île-aux-Marins, features an abandoned fishing village.',
            '46.9577083', '-56.5330714',
            'Saint Pierre and Miguelon',
            5888,
            'EUR'
        );
        $kingstown = $this->generateLocation(
            'Kingstown',
            'Kingstown is the capital of Saint Vincent and the Grenadines. The port city is known for its Botanical Gardens, founded in 1765 and home to tropical plants and aviaries. On a ridge above the bay, the 1806 Fort Charlotte offers panoramic views of the archipelago. The city center has 19th-century churches such as St. Mary’s Cathedral. The lively Kingstown Market sells local produce. Popular Villa Beach is nearby.',
            '13.1567579', '-61.2290382',
            'Saint Vincent and the Grenadines',
            16500,
            'XCD'
        );
        $philipsburg = $this->generateLocation(
            'Philipsburg',
            'Philipsburg is the capital of Sint Maarten, the Dutch side of the Caribbean island Saint Martin. Beachfront bars line the boardwalk along Great Bay. Voorstraat, or Front Street, has duty-free shops and casinos. The St. Maarten Zoo is home to parrots, monkeys and a playground. Sint Maarten Museum displays artifacts from the indigenous Arawak people. The ruins of 17th-century Fort Amsterdam stand on a nearby peninsula.',
            '18.0289033', '-63.0561859',
            'Sint Maarten',
            1327,
            'ANG'
        );
        $kingEdwardPoint = $this->generateLocation(
            'King Edward Point',
            'King Edward Point is a permanent British Antarctic Survey research station on South Georgia island and is the capital of the British Overseas Territory of South Georgia and the South Sandwich Islands, on the northeastern coast of the island of South Georgia',
            '-54.2833289', '-36.493735',
            'South Georgia and South Sandwich Islands',
            18,
            'USD'
        );
        $paramaribo = $this->generateLocation(
            'Paramaribo',
            'Paramaribo is the capital city of Suriname on the banks of the Suriname River. It’s known for ornate wooden Dutch colonial buildings in its center. On the banks of the river, the 17th-century Fort Zeelandia houses the Surinaams Museum, with exhibits on the region\'s history. Nearby, the wood-and-stone Presidential Palace faces Independence Square and is backed by the Garden of Palms, a public park.',
            '5.8483205', '-55.2478865',
            'Suriname',
            240924,
            'SRD'
        );
        $portOfSpain = $this->generateLocation(
            'Port-of-Spain',
            'Port of Spain, on Trinidad’s northwest coast, is the capital city of Trinidad and Tobago. It’s known for its huge Carnival, with calypso and Caribbean soca music. Bordering the expansive Queen’s Park Savannah, the Royal Botanic Gardens displays plants from all over the world. The gardens also encompass Emperor Valley Zoo. The “Magnificent Seven,” near Queen\'s Park, is a row of extravagant mansions from around 1900.',
            '10.6688807', '-61.5490583',
            'Trinidad and Tobago',
            165100,
            'TTD'
        );
        $cockburnTown = $this->generateLocation(
            'Cockburn Town',
            'Cockburn Town, the capital of the Turks and Caicos Islands, lies on Grand Turk Island. Along the shore, Duke and Front streets are lined with old Bermudian-style buildings. The colonial-era Her Majesty’s Prison retains its cells and exercise yard. Island history exhibits at the Turks and Caicos National Museum include artefacts from a 16th-century shipwreck. Seawalls and jetties break up sandy Cockburn Town Beach.',
            '21.4623532', '-71.1594061',
            'Turks and Caicos Islands',
            3700,
            'USD'
        );
        $washingtonDC = $this->generateLocation(
            'Washington, D.C.',
            'Washington, DC, the U.S. capital, is a compact city on the Potomac River, bordering the states of Maryland and Virginia. It’s defined by imposing neoclassical monuments and buildings – including the iconic ones that house the federal government’s 3 branches: the Capitol, White House and Supreme Court. It\'s also home to iconic museums and performing-arts venues such as the Kennedy Center.',
            '38.8935755', '-77.0846153',
            'United States',
            681170,
            'USD'
        );
        $montevideo = $this->generateLocation(
            'Montevideo',
            'Montevideo, Uruguay’s capital, is a major city along Montevideo Bay. It revolves around the Plaza de la Independencia, once home to a Spanish citadel. This plaza leads to Ciudad Vieja (the old town), with art deco buildings, colonial homes and landmarks including the towering Palacio Salvo and neoclassical performance hall Solís Theatre. Mercado del Puerto is an old port market filled with many steakhouses.',
            '-34.8058832', '-56.3546453',
            'Uruguay',
            1305082,
            'UYU'
        );
        $caracas = $this->generateLocation(
            'Caracas',
            'Caracas, Venezuela\'s capital, is a commercial and cultural center located in a northern mountain valley. Independence leader Simón Bolívar is buried at the National Pantheon of Venezuela, established in the 19th century in the city\'s old town. Caracas Cathedral, a landmark of Romanesque architecture, dates to the 17th century. Parque Central\'s 225m-high twin towers are the signature of the skyline.',
            '10.4683612', '-67.0304491',
            'Venezuela',
            1943901,
            'VEF'
        );
        $charlotteAmalie = $this->generateLocation(
            'Charlotte Amalie',
            'Charlotte Amalie is a city and cruise ship port on the Caribbean island of St. Thomas. It is the capital of the U.S. Virgin Islands. Its Danish colonial architecture includes Blackbeard’s Castle, a 1600s watchtower. The 99 Steps ascend to the tower, which has panoramic views. The 17th-century Fort Christian is now a museum with art and artifacts. East of town, the Skyride aerial tram climbs to Paradise Point.',
            '18.3412761', '-64.9479362',
            'Virgin Islands',
            18481,
            'USD'
        );

        $this->buildLocations(
            [
                $theValley,
                $stJohns,
                $buenosAries,
                $oranjestad,
                $nassau,
                $bridgetown,
                $belmopan,
                $hamilton,
                $sucre,
                $brasilia,
                $roadTown,
                $ottawa,
                $georgeTown,
                $santiago,
                $bogota,
                $sanJose,
                $havana,
                $willemstad,
                $roseau,
                $santoDomingo,
                $quito,
                $sanSalvador,
                $stanley,
                $cayenne,
                $nuuk,
                $saintGeorges,
                $basseTerre,
                $guatemalaCity,
                $georgeTown,
                $portAuPrince,
                $tegucigalpa,
                $kingston,
                $fortDeFrance,
                $mexicoCity,
                $brades,
                $managua,
                $panamaCity,
                $asuncion,
                $lima,
                $sanJuan,
                $gustavia,
                $basseterre,
                $castries,
                $marigot,
                $saintPierre,
                $kingstown,
                $philipsburg,
                $kingEdwardPoint,
                $paramaribo,
                $portOfSpain,
                $cockburnTown,
                $washingtonDC,
                $montevideo,
                $caracas,
                $charlotteAmalie
            ]
        );
    }

    protected function asianLocations()
    {

        $kabul = $this->generateLocation(
            'Kabul',
            'Kabul is the capital and largest city of Afghanistan, located in the eastern section of the country. It is also a municipality, forming part of the greater Kabul Province. According to estimates in 2019, the population of Kabul is 5.266 million, which includes all the major ethnic groups of Afghanistan.',
            '34.553387', '68.9175546',
            'Afghanistan',
            3678033,
            'AFN'
        );
        $yerevan = $this->generateLocation(
            'Yerevan',
            'Yerevan, Armenia\'s capital, is marked by grand Soviet-era architecture. The Matenadaran library, housing thousands of ancient Greek and Armenian manuscripts, dominates its main avenue. Republic Square is the city\'s core, with musical water fountains and colonnaded government buildings. The 1920s History Museum of Armenia on the square\'s eastern side contains archaeological objects like a circa-3500-B.C. leather shoe.',
            '40.153306', '44.3484857',
            'Armenia',
            1075800,
            'AMD'
        );
        $baku = $this->generateLocation(
            'Baku',
            'Baku, the capital and commercial hub of Azerbaijan, is a low-lying city with coastline along the Caspian Sea. It\'s famed for its medieval walled old city, which contains the Palace of the Shirvanshahs, a vast royal complex, and the iconic stone Maiden Tower. Contemporary landmarks include the Zaha Hadid–designed Heydar Aliyev Center, and the Flame Towers, 3 pointed skyscrapers covered with LED screens.',
            '40.394508', '49.7148782',
            'Azerbaijan',
            3202300,
            'AZN'
        );
        $manama = $this->generateLocation(
            'Manama',
            'Manama, the modern capital of the Arabian Gulf island nation of Bahrain, has been at the center of major trade routes since antiquity. Its acclaimed Bahrain National Museum showcases artifacts from the ancient Dilmun civilization that flourished in the region for millennia. The city\'s thriving Bab el-Bahrain Souq offers wares from colorful handwoven fabrics and spices to pearls.',
            '26.2266124', '50.5540069',
            'Bahrain',
            157474,
            'BHD'
        );
        $dhaka = $this->generateLocation(
            'Dhaka',
            'Dhaka is the capital city of Bangladesh, in southern Asia. Set beside the Buriganga River, it’s at the center of national government, trade and culture. The 17th-century old city was the Mughal capital of Bengal, and many palaces and mosques remain. American architect Louis Khan’s National Parliament House complex typifies the huge, fast-growing modern metropolis.',
            '23.7806207', '90.3492862',
            'Bangladesh',
            14543124,
            'BDT'
        );
        $thimphu = $this->generateLocation(
            'Thimphu',
            'Thimphu, Bhutan’s capital, occupies a valley in the country’s western interior. In addition to being the government seat, the city is known for its Buddhist sites. The massive Tashichho Dzong is a fortified monastery and government palace with gold-leaf roofs. The Memorial Chorten, a whitewashed structure with a gold spire, is a revered Buddhist shrine dedicated to Bhutan’s third king, Jigme Dorji Wangchuck.',
            '27.4793977', '89.603376',
            'Bhutan',
            104000,
            'INR'
        );
        $bandarSeriBegawan = $this->generateLocation(
            'Bandar Seri Begawan',
            'Bandar Seri Begawan is the capital of Brunei, a tiny nation on the island of Borneo. It’s known for the opulent Sultan Omar Ali Saifuddien Mosque, adorned with chandeliers, stained glass and Italian marble, and surrounded by a lagoon. Nearby, the Royal Regalia Building showcases a gold carriage and lavish gifts presented to the sultan. To the northwest is the Jame’Asr Hassanil Bolkiah Mosque, with 29 golden domes.',
            '4.9061376', '114.8680506',
            'Brunei',
            50000,
            'BND'
        );
        $nayPyiTaw = $this->generateLocation(
            'Nay Pyi Taw',
            'Naypyitaw is the modern capital of Myanmar (Burma), north of former capital, Yangon. Traditional tiered roofs crown the buildings of its Parliament (Hluttaw) complex. Exhibits at the National Museum include Burmese art and ancient artifacts. The golden stupa of Uppatasanti Pagoda has an interior carved with stories from Buddhist literature. In a nearby enclosure are white elephants, once prized by Burmese royalty.',
            '19.7469963', '96.0533898',
            'Burma',
            924608,
            'MMK'
        );
        $phnomPenh = $this->generateLocation(
            'Phnom Penh',
            'Phnom Penh, Cambodia’s busy capital, sits at the junction of the Mekong and Tonlé Sap rivers. It was a hub for both the Khmer Empire and French colonialists. On its walkable riverfront, lined with parks, restaurants and bars, are the ornate Royal Palace, Silver Pagoda and the National Museum, displaying artifacts from around the country. At the city’s heart is the massive, art deco Central Market.',
            '11.5793306', '104.7501035',
            'Cambodia',
            1505725,
            'KHR'
        );
        $beijing = $this->generateLocation(
            'Beijing',
            'Beijing, China’s sprawling capital, has history stretching back 3 millennia. Yet it’s known as much for modern architecture as its ancient sites such as the grand Forbidden City complex, the imperial palace during the Ming and Qing dynasties. Nearby, the massive Tiananmen Square pedestrian plaza is the site of Mao Zedong’s mausoleum and the National Museum of China, displaying a vast collection of cultural relics.',
            '39.9385466', '116.1172845',
            'China',
            21700000,
            'CNY'
        );
        $nicosia = $this->generateLocation(
            'Nicosia',
            'Nicosia is the largest city, capital, and seat of government of the island of Cyprus. It is located near the centre of the Mesaoria plain, on the banks of the River Pedieos. Nicosia is the southeasternmost of all EU member states\' capitals.',
            '35.1922324,', '33.3273628',
            'Cyprus',
            116392,
            'EUR'
        );
        $dili = $this->generateLocation(
            'Dili',
            'Dili is the capital city of Timor-Leste, or East Timor, on the country\'s north coast. The large Cristo Rei de Dili statue is on a hilltop east of the city, with views of the bay. Landmarks in the city recall the nation\'s struggles for independence from Portugal and then Indonesia. Exhibits on the conflicts feature at the Timorese Resistance Museum and the Chega! Exhibition, the latter of which is in a former prison.',
            '-8.5564101', '125.499887',
            'East Timor',
            222323,
            'USD'
        );
        $tbilisi = $this->generateLocation(
            'Tbilisi',
            'Tbilisi is the capital of the country of Georgia. Its cobblestoned old town reflects a long, complicated history, with periods under Persian and Russian rule. Its diverse architecture encompasses Eastern Orthodox churches, ornate art nouveau buildings and Soviet Modernist structures. Looming over it all are Narikala, a reconstructed 4th-century fortress, and Kartlis Deda, an iconic statue of the “Mother of Georgia.”',
            '41.7323742', '44.6987716',
            'Georgia',
            1108717,
            'GEL'
        );
        $hongKong = $this->generateLocation(
            'Hong Kong',
            'Hong Kong, officially the Hong Kong Special Administrative Region of the People\'s Republic of China, is a special administrative region on the eastern side of the Pearl River estuary in southern China.',
            '22.3524825', '113.8475199',
            'Hong Kong',
            1253417,
            'HKD'
        );
        $newDelhi = $this->generateLocation(
            'New Delhi',
            'New Delhi is an urban district of Delhi which serves as the capital of India and seat of all three branches of the Government of India. The foundation stone of the city was laid by Emperor George V during the Delhi Durbar of 1911. It was designed by British architects, Sir Edwin Lutyens and Sir Herbert Baker.',
            '28.5272181,', '77.0689027,',
            'India',
            257803,
            'INR'
        );
        $jakarta = $this->generateLocation(
            'Jakarta',
            'Jakarta, Indonesia\'s massive capital, sits on the northwest coast of the island of Java. A historic mix of cultures – Javanese, Malay, Chinese, Arab, Indian and European – has influenced its architecture, language and cuisine. The old town, Kota Tua, is home to Dutch colonial buildings, Glodok (Jakarta’s Chinatown) and the old port of Sunda Kelapa, where traditional wooden schooners dock.',
            '-6.229728', '106.6894346',
            'Indonesia',
            10042200,
            'IDR'
        );
        $tehran = $this->generateLocation(
            'Tehran',
            'Tehran Province is one of the 31 provinces of Iran. It covers an area of 18,909 square kilometres and is located to the north of the central plateau of Iran.',
            '35.6964895', '51.0696426',
            'Iran',
            8846782,
            'IRR'
        );
        $baghdad = $this->generateLocation(
            'Baghdad',
            'Baghdad is the capital of Iraq. Located along the Tigris River, the city was founded in the 8th century and became the capital of the Abbasid Caliphate. Within a short time of its inception, Baghdad evolved into a significant cultural, commercial, and intellectual center for the Islamic world.',
            '33.3116075', '44.215823',
            'Iraq',
            8765000,
            'IQD'
        );
        $jerusalem = $this->generateLocation(
            'Jerusalem',
            'Jerusalem is a city in the Middle East, located on a plateau in the Judaean Mountains between the Mediterranean and the Dead Sea. It is one of the oldest cities in the world, and is considered holy to the three major Abrahamic religions—Judaism, Christianity, and Islam.',
            '31.7962994', '35.1053195',
            'Israel',
            865721,
            'ILS'
        );
        $tokyo = $this->generateLocation(
            'Tokyo',
            'Tokyo, Japan’s busy capital, mixes the ultramodern and the traditional, from neon-lit skyscrapers to historic temples. The opulent Meiji Shinto Shrine is known for its towering gate and surrounding woods. The Imperial Palace sits amid large public gardens. The city\'s many museums offer exhibits ranging from classical art (in the Tokyo National Museum) to a reconstructed kabuki theater (in the Edo-Tokyo Museum).',
            '35.5040553', '138.6488122',
            'Japan',
            9508776,
            'JPY'
        );
        $amman = $this->generateLocation(
            'Amman',
            'Amman, the capital of Jordan, is a modern city with numerous ancient ruins. Atop Jabal al-Qala’a hill, the historic Citadel includes the pillars of the Roman Temple of Hercules and the 8th-century Umayyad Palace complex, known for its grand dome. Built into a different downtown hillside, the Roman Theater is a 6,000-capacity, 2nd-century stone amphitheater offering occasional events.',
            '31.8354534', '35.6674535',
            'Jordan',
            1812059,
            'JOD'
        );
        $nursultan = $this->generateLocation(
            'Nur-Sultan',
            'Astana is the capital city of Kazakhstan, straddling the Ishim River in the north of the country. Along the left bank, the ultramodern, 97m-tall Bayterek tower offers panoramic views from its observation deck. The Ak Orda Presidential Palace is topped with a massive blue-and-gold dome. The giant, tentlike Khan Shatyr Entertainment Center houses a shopping mall and indoor beach resort.',
            '51.1476111', '71.1992202',
            'Kazakhstan',
            1029556,
            'KZT'
        );
        $kuwaitCity = $this->generateLocation(
            'Kuwait City',
            'Kuwait City is the capital of the Arabian Gulf nation of Kuwait. At its heart sits the Grand Mosque, known for its vast interior and chandeliered dome. On the waterfront, the late-19th-century Seif Palace features a neo-Arabic watchtower and manicured gardens. Nearby, the Kuwait National Museum explores history and features science shows at its planetarium. Souk Al-Mubarakiya is a vast food and handicraft market.',
            '29.3760641', '47.9643572',
            'Kuwait',
            2779000,
            'KWD'
        );
        $bishkek = $this->generateLocation(
            'Bishkek',
            'Bishkek, the capital of Kyrgyzstan, borders Central Asia\'s Tian Shan range. It’s a gateway to the Kyrgyz Ala-Too mountains and Ala Archa National Park, with glaciers and wildlife trails. The city’s arts scene encompasses the monumental State Museum of Fine Arts and the colonnaded Opera and Ballet Theater. The vast, central Ala-Too Square features the Manas monument, honoring the hero of the Kyrgyz Epic of Manas.',
            '42.8767897', '74.4517798',
            'Kyrgyzstan',
            937400,
            'KGS'
        );
        $vientiane = $this->generateLocation(
            'Vientiane',
            'Vientiane, Laos\' national capital, mixes French-colonial architecture with Buddhist temples such as the golden, 16th-century Pha That Luang, which is a national symbol. Along broad boulevards and tree-lined streets are many notable shrines including Wat Si Saket, which features thousands of Buddha images, and Wat Si Muang, built atop a Hindu shrine.',
            '17.960427', '102.5357259',
            'Laos',
            783000,
            'LAK'
        );
        $beirut = $this->generateLocation(
            'Beirut',
            'Beirut is the capital and largest city of Lebanon. No recent population census has been conducted, but 2007 estimates ranged from slightly more than 1 million to 2.2 million as part of Greater Beirut.',
            '33.8892133', '35.469263',
            'Lebanon',
            361366,
            'LBP'
        );
        $kualaLumpur = $this->generateLocation(
            'Kuala Lumpur',
            'Kuala Lumpur officially the Federal Territory of Kuala Lumpur and commonly known as KL, is the national capital and largest city in Malaysia. As the global city of Malaysia, it covers an area of 243 km2 (94 sq mi) and has an estimated population of 1.73 million as of 2016. Greater Kuala Lumpur, also known as the Klang Valley, is an urban agglomeration of 7.25 million people as of 2017. It is among the fastest growing metropolitan regions in Southeast Asia, in both population and economic development.',
            '3.1385036', '101.6169497',
            'Malaysia',
            1768000,
            'MYR'
        );
        $male = $this->generateLocation(
            'Male',
            'Malé is the densely populated capital of the Maldives, an island nation in the Indian Ocean. It\'s known for its mosques and colorful buildings. The Islamic Centre (Masjid-al-Sultan Muhammad Thakurufaanu Al Auzam) features a mosque, a library and a distinctive gold dome. Near the harbor, a popular fish market offers the day\'s catch, and a produce market is stocked with local fruit.',
            '4.1962505', '73.4794847',
            'Maldives',
            133412,
            'MVR'
        );
        $ulaanbaatar = $this->generateLocation(
            'UlaanBaatar',
            'Ulaanbaatar is the capital of Mongolia. It’s in the Tuul River valley, bordering the Bogd Khan Uul National Park. Originally a nomadic Buddhist center, it became a permanent site in the 18th century. Soviet control in the 20th century led to a religious purge. Soviet-era buildings, museums within surviving monasteries, and a vibrant conjunction of traditional and 21st-century lifestyles typify the modern city.',
            '47.8915649', '106.7617907',
            'Mongolia',
            1462973,
            'MNT'
        );
        $kathmandu = $this->generateLocation(
            'Kathmandu',
            'Kathmandu is the capital and largest city of Nepal, with a population of around 3 million. The Kathmandu Metropolitan area, which includes Lalitpur, Bhaktapur, Kirtipur, and a few other towns, has population of around 5-6 million people. Kathmandu is also the largest metropolis in the Himalayan Mountain region.',
            '27.7089559', '85.2911135',
            'Nepal',
            975543,
            'NPR'
        );
        $pyongyang = $this->generateLocation(
            'Pyongyang',
            'Pyongyang, P\'yŏngyang or Pyeongyang, is the capital and largest city of North Korea. Pyongyang is located on the Taedong River about 109 kilometres upstream from its mouth on the Yellow Sea. According to the 2008 population census, it has a population of 3,255,288.',
            '39.0290544', '125.6020303',
            'North Korea',
            3222000,
            'KPW'
        );
        $muscat = $this->generateLocation(
            'Muscat',
            'Muscat, Oman’s port capital, sits on the Gulf of Oman surrounded by mountains and desert. With history dating back to antiquity, it mixes high-rises and upscale shopping malls with clifftop landmarks such as the 16th-century Portuguese forts, Al Jalali and Mirani, looming over Muscat Harbor. Its modern, marble-clad Sultan Qaboos Grand Mosque, with 50m dome and prodigious Persian carpet, can accommodate 20,000 people.',
            '23.583946', '58.2835835',
            'Oman',
            630000,
            'OMR'
        );
        $islamabad = $this->generateLocation(
            'Islamabad',
            'Islamabad is the capital city of Pakistan, and is federally administered as part of the Islamabad Capital Territory. Built as a planned city in the 1960s to replace Karachi as Pakistan\'s capital, Islamabad is noted for its high standards of living, safety, and abundant greenery.',
            '33.6158004', '72.8059313',
            'Pakistan',
            2006572,
            'PKR'
        );
        $ramallah = $this->generateLocation(
            'Ramallah',
            'Ramallah is a Palestinian city in the central West Bank located 10 km north of Jerusalem at an average elevation of 880 meters above sea level, adjacent to al-Bireh. It currently serves as the de facto administrative capital of the Palestinian National Authority. Ramallah was historically an Arab Christian town.',
            '31.9073496', '35.1883725',
            'Palestine',
            27092,
            'ILS'
        );
        $manila = $this->generateLocation(
            'Manila',
            'Manila, the capital of the Philippines, is a densely populated bayside city on the island of Luzon, which mixes Spanish colonial architecture with modern skyscrapers. Intramuros, a walled city in colonial times, is the heart of Old Manila. It’s home to the baroque 16th-century San Agustin Church as well as Fort Santiago, a storied citadel and former military prison.',
            '14.5677544', '120.8805604',
            'Philippines',
            1780148,
            'PHP'
        );
        $doha = $this->generateLocation(
            'Doha',
            'Doha is the capital and most populous city of the State of Qatar. Doha has a population of 1,850,000 in the city proper with the population close to 2.4 million. The city is located on the coast of the Persian Gulf in the east of the country.',
            '25.283943', '51.371914',
            'Qatar',
            1351000,
            'QAR'
        );
        $riyadh = $this->generateLocation(
            'Riyadh',
            'Riyadh, Saudi Arabia’s capital and main financial hub, is on a desert plateau in the country’s center. Business district landmarks include the 302m-high Kingdom Centre, with a sky bridge connecting 2 towers, and 267m-high Al Faisaliah Centre, with a glass-globe summit. In the historical Deira district, Masmak Fort marks the site of the 1902 raid that gave the Al Sauds control of Riyadh.',
            '24.7241506', '46.2621116',
            'Saudi Arabia',
            6506700,
            'SAR'
        );
        $singapore = $this->generateLocation(
            'Singapore',
            'Singapore, an island city-state off southern Malaysia, is a global financial center with a tropical climate and multicultural population. Its colonial core centers on the Padang, a cricket field since the 1830s and now flanked by grand buildings such as City Hall, with its 18 Corinthian columns. In Singapore\'s circa-1820 Chinatown stands the red-and-gold Buddha Tooth Relic Temple, said to house one of Buddha\'s teeth.',
            '1.3139843', '103.5640672',
            'Singapore',
            5607300,
            'SGD'
        );
        $seoul = $this->generateLocation(
            'Seoul',
            'Seoul, the capital of South Korea, is a huge metropolis where modern skyscrapers, high-tech subways and pop culture meet Buddhist temples, palaces and street markets. Notable attractions include futuristic Dongdaemun Design Plaza, a convention hall with curving architecture and a rooftop park; Gyeongbokgung Palace, which once had more than 7,000 rooms; and Jogyesa Temple, site of ancient locust and pine trees.',
            '37.5650172', '126.8494683',
            'South Korea',
            10290000,
            'KRW'
        );
        $colombo = $this->generateLocation(
            'Colombo',
            'Colombo, the capital of Sri Lanka, has a long history as a port on ancient east-west trade routes, ruled successively by the Portuguese, Dutch and British. That heritage is reflected in its its architecture, mixing colonial buildings with high-rises and shopping malls. The imposing Colombo National Museum, dedicated to Sri Lankan history, borders sprawling Viharamahadevi Park and its giant Buddha.',
            '6.9218374', '79.8211861',
            'Sri Lanka',
            752993,
            'LKR'
        );
        $damascus = $this->generateLocation(
            'Damascus',
            'Damascus is the capital of the Syrian Arab Republic; it is also the country\'s largest city, following the decline in population of Aleppo due to the battle for the city. It is colloquially known in Syria as aš-Šām and titled the "City of Jasmine".',
            '33.5074558', '36.212856',
            'Syria',
            1711000,
            'SYP'
        );
        $taipei = $this->generateLocation(
            'Taipei',
            'Taipei, the capital of Taiwan, is a modern metropolis with Japanese colonial lanes, busy shopping streets and contemporary buildings. The skyline is crowned by the 509m-tall, bamboo-shaped Taipei 101 skyscraper, with upscale shops at the base and a rapid elevator to an observatory near the top. Taipei is also known for its lively street-food scene and many night markets, including expansive Shilin market.',
            '25.0169639', '121.2261986',
            'Taiwan',
            2704974,
            'TWD'
        );
        $dushanbe = $this->generateLocation(
            'Dushanbe',
            'Dushanbe, on the Varzob River, is the capital of Tajikistan. On the east bank of the river is Rudaki Park, named for the classical poet. A statue of him stands under an ornate mosaic arch. Nearby is a massive Tajik flag, flying from a towering flagpole. The ancient Tajik warrior Ismoili Somoni is commemorated with a statue and gilded arch. Archaeological finds are displayed at the National Museum of Tajikistan',
            '38.561303', '68.7115416',
            'Tajikistan',
            778500,
            'TJS'
        );
        $bangkok = $this->generateLocation(
            'Bangkok',
            'Bangkok, Thailand’s capital, is a large city known for ornate shrines and vibrant street life. The boat-filled Chao Phraya River feeds its network of canals, flowing past the Rattanakosin royal district, home to opulent Grand Palace and its sacred Wat Phra Kaew Temple. Nearby is Wat Pho Temple with an enormous reclining Buddha and, on the opposite shore, Wat Arun Temple with its steep steps and Khmer-style spire.',
            '13.7244417', '100.352929',
            'Thailand',
            5686646,
            'THB'
        );
        $ankara = $this->generateLocation(
            'Ankara',
            'Ankara, Turkey’s cosmopolitan capital, sits in the country’s central Anatolia region. It’s a center for the performing arts, home to the State Opera and Ballet, the Presidential Symphony Orchestra and several national theater companies. Overlooking the city is Anitkabir, the enormous hilltop mausoleum of Kemal Atatürk, modern Turkey’s first president, who declared Ankara the capital in 1923.',
            '39.9030394', '32.4825904',
            'Turkey',
            5445026,
            'TRY'
        );
        $ashgabat = $this->generateLocation(
            'Ashgabat',
            'Ashgabat is the capital of Turkmenistan. It’s known for its white marble buildings and grandiose national monuments. To the northwest, the sprawling Ruhy Mosque has a vast gilt dome. The central Artogrul Gazi Mosque is modeled on Istanbul’s Blue Mosque. Examples of traditional weaving are displayed at Turkmen Carpet Museum. The Wedding Palace is a series of star-shaped tiers topped by a giant golden globe.',
            '37.9628753', '57.970109',
            'Turkmenistan',
            860000,
            'TMT'
        );
        $abuDhabi = $this->generateLocation(
            'Abu Dhabi',
            'Abu Dhabi, the capital of the United Arab Emirates, sits off the mainland on an island in the Persian (Arabian) Gulf. Its focus on oil exports and commerce is reflected by the skyline’s modern towers and shopping megacenters such as Abu Dhabi and Marina malls. Beneath white-marble domes, the vast Sheikh Zayed Grand Mosque features an immense Persian carpet, crystal chandeliers and capacity for 41,000 worshipers.',
            '24.3865729', '54.2784409',
            'United Arab Emirates',
            1145000,
            'AED'
        );
        $tashkent = $this->generateLocation(
            'Tashkent',
            'Tashkent is the capital city of Uzbekistan. It’s known for its many museums and its mix of modern and Soviet-era architecture. The Amir Timur Museum houses manuscripts, weapons and other relics from the Timurid dynasty. Nearby, the huge State Museum of History of Uzbekistan has centuries-old Buddhist artifacts. The city’s skyline is distinguished by Tashkent Tower, which offers city views from its observation deck.',
            '41.2825125', '69.1392854',
            'Uzbekistan',
            2371300,
            'UZS'
        );
        $hanoi = $this->generateLocation(
            'Hanoi',
            'Hanoi is the capital and one of the five municipalities of Vietnam. It covers an area of 3,328.9 square kilometres (1,285 sq mi). With an estimated population of 7.7 million as of 2018, it is the second largest city in Vietnam. The metropolitan area, encompassing nine additional neighbouring provinces, has an estimated population of 16 million. Located in the central area of the Red River Delta, Hanoi is the commercial, cultural, and educational centre of Northern Vietnam. Having an estimated nominal GDP of US$32.8 billion, it is the second most productive economic centre of Vietnam, following Ho Chi Minh City.',
            '20.9734461', '105.3724955',
            'Vietnam',
            2316772,
            'VND'
        );
        $sanaa = $this->generateLocation(
            'Sanaa',
            'Sanaʽa, also spelled Sanaa or Sana, is the largest city in Yemen and the centre of Sanaʽa Governorate. The city is not part of the Governorate, but forms the separate administrative district of "Amanat Al-Asemah".',
            '15.3830336', '44.1412409',
            'Yemen',
            1937451,
            'YER'
        );

        $this->buildLocations(
            [
                $kabul,
                $yerevan,
                $baku,
                $manama,
                $dhaka,
                $thimphu,
                $bandarSeriBegawan,
                $nayPyiTaw,
                $phnomPenh,
                $beijing,
                $nicosia,
                $dili,
                $tbilisi,
                $hongKong,
                $newDelhi,
                $jakarta,
                $tehran,
                $baghdad,
                $jerusalem,
                $tokyo,
                $amman,
                $nursultan,
                $kuwaitCity,
                $bishkek,
                $vientiane,
                $beirut,
                $kualaLumpur,
                $male,
                $ulaanbaatar,
                $kathmandu,
                $pyongyang,
                $muscat,
                $islamabad,
                $ramallah,
                $manila,
                $doha,
                $riyadh,
                $singapore,
                $seoul,
                $colombo,
                $damascus,
                $taipei,
                $dushanbe,
                $bangkok,
                $ankara,
                $ashgabat,
                $abuDhabi,
                $tashkent,
                $hanoi,
                $sanaa
            ]
        );
    }

    protected function australianLocations()
    {
        $canberra = $this->generateLocation(
            'Canberra',
            'Canberra is Australia’s capital, inland from the country\'s southeast coast. Surrounded by forest, farmland and nature reserves, it earns its nickname, the "Bush Capital.” The city\'s focal point is Lake Burley Griffin, filled with sailboats and kayaks. On the lakeshore is the massive, strikingly modern Parliament House, as well as museums including the National Gallery, known for its indigenous art collections.',
            '-35.313899', '148.9897006',
            'Australia',
            381488,
            'AUD'
        );
        $flyingFishCove = $this->generateLocation(
            'Flying Fish Cove',
            'Flying Fish Cove is the capital city and main settlement of Australia\'s Christmas Island. Although it was originally named after British survey-ship Flying-Fish, many maps simply label it “The Settlement”. It was the first British settlement on the island, established in 1888.',
            '-10.4327148', '105.6533434',
            'Christmas Island',
            1600,
            'AUD'
        );
        $westIsland = $this->generateLocation(
            'West Island',
            'West Island is the capital of the Cocos (Keeling) Islands. The population is roughly 120 and consists mainly of Europeans. It is the less populous of the two inhabited islands (the other is Home Island). It was part of the Clunies-Ross plantation and an airstrip was built here during World War II. As well as all the government buildings, it contains the airport, a general store and tourist accommodation. In November 2013 it was revealed that the Australian Signals Directorate operates a listening station on West Island. Wullenweber and Adcock antenna systems as well as two satellite dish antennae are clearly visible via Google satellite view.',
            '-12.1456781', '96.810079',
            'Cocos Islands',
            134,
            'AUD'
        );
        $wellington = $this->generateLocation(
            'Wellington',
            'Wellington, the capital of New Zealand, sits near the North Island’s southernmost point on the Cook Strait. A compact city, it encompasses a waterfront promenade, sandy beaches, a working harbour and colourful timber houses on surrounding hills. From Lambton Quay, the iconic red Wellington Cable Car heads to the Wellington Botanic Gardens. Strong winds through the Cook Strait give it the nickname "Windy Wellington."',
            '-41.2442852', '174.6217733',
            'New Zealand',
            412500,
            'NSD'
        );
        $kingston = $this->generateLocation(
            'Kingston',
            'Kingston is the capital of the Australian South Pacific Territory of Norfolk Island. The vice-regal, legislative, administrative and judicial offices are all located in Kingston.',
            '-29.0567131', '167.9531264',
            'Norfolk Island',
            880,
            'AUD'
        );

        $this->buildLocations(
            [
                $canberra,
                $flyingFishCove,
                $westIsland,
                $wellington,
                $kingston
            ]
        );

    }

    protected function africanLocations()
    {

        $algiers = $this->generateLocation(
            'Algiers',
            'Algiers is a province in Algeria, named after its capital, Algiers, which is also the national capital. It is adopted from the old French département of Algiers and has a population of about 3 million. It is the most densely populated province of Algeria, and also the smallest by area.',
            '36.7018128', '2.8077522',
            'Algeria',
            3415811,
            'DZD'
        );
        $luanda = $this->generateLocation(
            'Luanda',
            'Luanda, the capital of Angola, is a port city on the west coast of Southern Africa. A seafront promenade known as the Marginal runs alongside Luanda Bay. Nearby is the well-preserved 16th-century Fortress of São Miguel, which now contains the Museum of the Armed Forces. The fort has views of the harbor and the Ilha do Cabo, a long, thin peninsula in the bay that’s home to beaches, bars and restaurants.',
            '-8.8535063', '13.1440212',
            'Angola',
            2825311,
            'AOA'
        );
        $portoNovo = $this->generateLocation(
            'Porto-Novo',
            'Porto-Novo is a port city and the capital of Benin, in West Africa. It’s known for colonial buildings like the Brazilian-style Great Mosque, formerly a church. The Ethnographic Museum displays ceremonial masks, musical instruments and costumes. The Musée da Silva recounts Benin’s history and celebrates Afro-Brazilian culture. Just east, the Honmé Museum was King Toffa’s 19th-century royal palace.',
            '6.4959502', '2.5872798',
            'Benin',
            267191,
            'XOF'
        );
        $gaborone = $this->generateLocation(
            'Gaborone',
            'Gaborone is the capital city of Botswana. It’s known for the Gaborone Game Reserve, sheltering native animals like wildebeest and impala, plus resident and migratory birds. To the city’s southwest, rhinos and giraffes inhabit the Mokolodi Nature Reserve. Footpaths lead to city views at the summit of Kgale Hill. In the city center, the National Museum and Art Gallery displays art and cultural artifacts.',
            '-24.609291', '25.8604649',
            'Botswana',
            231626,
            'BWP'
        );
        $ouagadougou = $this->generateLocation(
            'Ouagadougou',
            'Ouagadougou, also Vagaga, is the capital of Burkina Faso and the administrative, communications, cultural, and economic centre of the nation. It is also the country\'s largest city, with a population of 2,200,000 in 2015. The city\'s name is often shortened to Ouaga. The inhabitants are called ouagalais.',
            '12.3584562', '-1.6769265',
            'Burkina Faso',
            2388700,
            'XOF'
        );
        $bujumbura = $this->generateLocation(
            'Bujumbura',
            'Bujumbura, formerly Usumbura, is the former capital, largest city and main port of Burundi. It ships most of the country\'s chief export, coffee, as well as cotton and tin ore.',
            '-3.3752982', '29.2853431',
            'Burundi',
            497166,
            'BIF'
        );
        $yaounde = $this->generateLocation(
            'Yaounde',
            'Yaoundé, spread over 7 hills, is the capital city of Cameroon. It is in the southern part of the country. The 20th-century Notre Dame des Victoires cathedral has a striking triangular roof. Nearby, in the Lake Quarter, the former presidential palace is home to the National Museum, with cultural exhibits such as masks and sculptures. Farther west, Mvog-Betsi Zoo is home to primates rescued from the bushmeat trade.',
            '3.8303023', '11.4404134',
            'Cameroon',
            2440462,
            'XAF'
        );
        $praia = $this->generateLocation(
            'Praia',
            'Praia is the capital city of Cape Verde, which is off the coast of West Africa. The city is on the southern coast of Santiago Island. The old town center, called the “Plateau” by locals, is on a raised area overlooking the Atlantic Ocean. Around the bay, beaches include Quebra Canela and Praínha, both near the Praínha neighborhood. Shops and restaurants cluster in the Achada de Santo António quarter.',
            '14.9364449', '-23.5417489',
            'Cape Verde',
            130271,
            'CVE'
        );
        $bangui = $this->generateLocation(
            'Bangui',
            'Bangui is the capital and largest city of the Central African Republic. As of 2012 it had an estimated population of 734,350.',
            '4.378219', '18.5071594',
            'Central African Republic',
            734350,
            'XAF'
        );
        $nDjamena = $this->generateLocation(
            'N\'Djamena',
            'N’Djamena is the capital and largest city of Chad. A port on the Chari River, near the confluence with the Logone River, it directly faces the Cameroonian town of Kousséri, to which the city is connected by a bridge. It is also a special statute region, divided into 10 districts or arrondissements.',
            '12.1202095', '14.9874192',
            'Chad',
            1092066,
            'XAF'
        );
        $moroni = $this->generateLocation(
            'Moroni',
            'Moroni is the capital city of the volcanic Comoros archipelago off Africa\'s east coast. It is on the island of Grande Comore (Ngazidja), which is ringed by beaches and old lava from the active Mount Karthala Volcano. Around the port, carved doors and the colonnaded Old Friday Mosque recall the city’s Arab heritage. The National Museum of the Comoros has exhibitions on the nation’s cultural and natural history.',
            '-11.7009483', '43.2411225',
            'Comoros',
            54000,
            'KMF'
        );
        $kinshasa = $this->generateLocation(
            'Kinshasa',
            'Kinshasa is the capital and the largest city of the Democratic Republic of the Congo. The city is situated alongside the Congo River. Once a site of fishing and trading villages, Kinshasa is now a megacity with an estimated population of more than 11 million.',
            '-4.4012906', '15.1826613',
            'Democratic Republic of the Congo',
            10125000,
            'CDF'
        );
        $djibouti = $this->generateLocation(
            'Djibouti',
            'Djibouti, on the Horn of Africa, is a mostly French- and Arabic-speaking country of dry shrublands, volcanic formations and Gulf of Aden beaches. It\'s home to one of the saltiest bodies of water in the world, the low-lying Lake Assal, in the Danakil Desert. The nomadic Afar people have settlements along Lake Abbe, a body of saltwater featuring chimneylike mineral formations.',
            '11.8127759','42.0669437',
            'Djibouti',
            219000,
            'DJF'
        );
        $cairo = $this->generateLocation(
            'Cairo',
            'Cairo, Egypt’s sprawling capital, is set on the Nile River. At its heart is Tahrir Square and the vast Egyptian Museum, a trove of antiquities including royal mummies and gilded King Tutankhamun artifacts. Nearby, Giza is the site of the iconic pyramids and Great Sphinx, dating to the 26th century BC. In Gezira Island’s leafy Zamalek district, 187m Cairo Tower affords panoramic city views.',
            '30.0594838', '31.223445',
            'Egypt',
            9500000,
            'EGP'
        );
        $malabo = $this->generateLocation(
            'Malabo',
            'Malabo, on Bioko island, is a port city and the capital of Equatorial Guinea. Spanish colonial architecture includes the neo-Gothic, twin-towered Santa Isabel Cathedral. The dark green Casa Verde is a 19th-century house that was prefabricated in Belgium. The Equatoguinean Cultural Centre has gallery and performance spaces. To the south, densely forested Parque Nacional del Pico Basilé surrounds Pico Basilé Volcano.
',
            '3.7554442', '8.6716379',
            'Equatorial Guinea',
            187302,
            'XAF'
        );
        $asmara = $this->generateLocation(
            'Asmara',
            'Asmara is the capital city of Eritrea, a country in the Horn of Africa. It\'s known for its Italian colonial buildings, like the Catholic Cathedral. The city\'s eclectic architecture ranges from art deco cinemas to the Futurist, airplane-shaped Fiat Tagliero service station. The grand former governor\'s palace dates from the 19th century. Close by is the ornate Opera House, built in the early 1900s in a mix of styles.',
            '15.3258061', '38.8466888',
            'Eritrea',
            804000,
            'ERN'
        );
        $addisAbaba = $this->generateLocation(
            'Addis Ababa',
            'Addis Ababa, Ethiopia’s sprawling capital in the highlands bordering the Great Rift Valley, is the country’s commercial and cultural hub. Its National Museum exhibits Ethiopian art, traditional crafts and prehistoric fossils, including replicas of the famous early hominid, "Lucy." The burial place of the 20th-century emperor Haile Selassie, copper-domed Holy Trinity Cathedral, is a neo-baroque architectural landmark.',
            '8.9631505', '38.6380615',
            'Ethiopia',
            3353000,
            'ETB'
        );
        $libreville = $this->generateLocation(
            'Libreville',
            'Libreville is the capital city of Gabon, a country on the coast of Central Africa. Its seafront boulevard has parks and sculptures. The National Museum of Arts and Tradition exhibits tribal crafts such as masks and wood-carved artifacts. Nearby, the colossal Presidential Palace dates from the 1970s. Mont-Bouët open-air market sells a wide range of goods, from household items and local produce to traditional medicine.',
            '0.41121', '9.3645898',
            'Gabon',
            703904,
            'XAF'
        );
        $banjul = $this->generateLocation(
            'Banjul',
            'Banjul is the capital city of the Gambia, a small West African country bordered by Senegal. The city sits on an island where the Gambia River meets the Atlantic Ocean. Its colonial buildings include the National Museum, dedicated to Gambian culture and history. Vendors at the lively Albert Market sell colorful textiles and local produce. The city\'s main entrance is marked by the immense, columned Arch 22 gateway.',
            '13.452349', '-16.5892536',
            'Gambia',
            34828,
            'GMD'
        );
        $accra = $this->generateLocation(
            'Accra',
            'Accra is the capital of Ghana, on the Atlantic coast of West Africa. Kwame Nkrumah Memorial Park honors Ghana’s first president, who helped lead the country to independence. The park contains Nkrumah’s mausoleum and a museum charting his life. Makola Market is the city’s vast, colorful bazaar. Popular seafront spots Labadi Beach and Kokrobite Beach offer golden sand and high-energy nightlife.',
            '5.5911921', '-0.3198128',
            'Ghana',
            2291352,
            'GHS'
        );
        $conakry = $this->generateLocation(
            'Conakry',
            'Conakry is the capital of Guinea, a country in West Africa. The city sits on the slender Kaloum Peninsula, which extends into the Atlantic Ocean. Just offshore, the Loos Islands are known for their beaches, dense palm forests and water sports. In town, the enormous Grand Mosque has 4 tall, elegant minarets. Next to the mosque, the large Botanical Garden features kapok trees and tropical flowers.',
            '9.634197', '-13.7194144',
            'Guinea',
            1660973,
            'GNF'
        );
        $bissau = $this->generateLocation(
            'Bissau',
            'Bissau is the capital city of Guinea-Bissau, on the coast of West Africa. It\'s near the point where the Geba River meets the Atlantic Ocean. Bissau Velho, the old city center, is filled with decaying Portuguese colonial buildings. Nearby, Fortaleza d’Amura is an old fort still used by the country\'s military. Up the road, the war-damaged former Presidential Palace has a neoclassical facade.',
            '11.8695383', '-15.6823631',
            'Guinea-Bissau',
            395954,
            'XOF'
        );
        $yamaussoukro = $this->generateLocation(
            'Yamoussoukro',
            'Yamoussoukro is the capital city of Côte d\'Ivoire, in West Africa. It\'s inland, northwest of the country’s economic and cultural hub, the coastal city of Abidjan. It\'s known for the enormous Basilica of Our Lady of Peace of Yamoussoukro, with its stained-glass windows and towering dome. The city is the birthplace of 20th-century president Félix Houphouët-Boigny, whose former palace has a crocodile-filled lagoon.',
            '6.8160619', '-5.3511756',
            'Ivory Coast',
            281735,
            'XOF'
        );
        $nairobi = $this->generateLocation(
            'Nairobi',
            'Nairobi is Kenya’s capital city. In addition to its urban core, the city has Nairobi National Park, a large game reserve known for breeding endangered black rhinos and home to giraffes, zebras and lions. Next to it is a well-regarded elephant orphanage operated by the David Sheldrick Wildlife Trust. Nairobi is also often used as a jumping-off point for safari trips elsewhere in Kenya.',
            '-1.3032051', '36.7073134',
            'Kenya',
            4004400,
            'KES'
        );
        $maseru = $this->generateLocation(
            'Maseru',
            'Maseru is the capital city of Lesotho, a landlocked country encircled by South Africa. The city is on the Caledon River. Traditional crafts feature at the cone-shaped Basotho Hat, a shop and information center. On the Thaba Bosiu plateau, east of the city, are ruins dating from the 19th-century reign of King Moshoeshoe. Thaba Bosiu overlooks Mount Qiloane, a conical mountain that is one of the nation\'s symbols.',
            '-29.3367978', '27.4470318',
            'Lesotho',
            227880,
            'LSL'
        );
        $monrovia = $this->generateLocation(
            'Monrovia',
            'Monrovia is the capital city of the West African country of Liberia. Located on the Atlantic Coast at Cape Mesurado, Monrovia had a population of 1,010,970 as of the 2008 census. With 29% of the total population of Liberia, Monrovia is the country\'s most populous city.',
            '6.2954507', '-10.8046973',
            'Liberia',
            1010970,
            'LRD'
        );
        $tripolo = $this->generateLocation(
            'Tripoli',
            'Tripoli is the capital city and the largest city of Libya, with a population of about 1.158 million people in 2018. It is located in the northwest of Libya on the edge of the desert, on a point of rocky land projecting into the Mediterranean Sea and forming a bay',
            '32.882932', '13.1533165',
            'Libya',
            1126000,
            'LYD'
        );
        $antananarivo = $this->generateLocation(
            'Antananarivo',
            'Antananarivo is the capital city of Madagascar, in the island’s Central Highlands. Overlooking the city, the Rova of Antananarivo palace complex was the center of the Merina kingdom from the 17th century. It features wooden houses and royal tombs. The pink baroque Andafiavaratra Palace sits in the nearby Haute Ville neighborhood. In the city center, heart-shaped Lake Anosy is ringed by jacaranda trees.',
            '-18.8876654', '47.4424743',
            'Madagascar',
            1816000,
            'MGA'
        );
        $lilongwe = $this->generateLocation(
            'Lilongwe',
            'Lilongwe is the capital city of Malawi, on the Lilongwe River. At its heart, woodland trails weave through the Lilongwe Wildlife Centre. This sanctuary shelters rescued and injured animals, including lions, monkeys and crocodiles. Shops, bars and restaurants dot the Old Town district. The Capital City district, also called City Centre, is home to the 21st-century, Chinese-built Parliament building.',
            '-13.9551909', '33.7225258',
            'Malawi',
            1077116,
            'MWK'
        );
        $bamako = $this->generateLocation(
            'Bamako',
            'Bamako is the capital and largest city of Mali, with a population of 2,009,109. In 2006, it was estimated to be the fastest-growing city in Africa and sixth-fastest in the world. It is located on the Niger River, near the rapids that divide the upper and middle Niger valleys in the southwestern part of the country.',
            '12.6125547', '-8.1355963',
            'Mali',
            1809106,
            'XOF'
        );
        $nouakchott = $this->generateLocation(
            'Nouakchott',
            'Nouakchott is the capital and largest city of Mauritania. It is one of the largest cities in the Sahel. The city also serves as the administrative and economic center of Mauritania. Nouakchott was a mid size village of little importance until 1958, when it was chosen as the capital of the nascent nation of Mauritania.',
            '18.0671579', '-16.0236006',
            'Mauritania',
            958399,
            'MRU'
        );
        $portLous = $this->generateLocation(
            'Port Louis',
            'Port Louis is the capital city of Mauritius, in the Indian Ocean. It\'s known for its French colonial architecture and the 19th-century Champ de Mars horse-racing track. The Caudan Waterfront is a lively dining and shopping precinct. Nearby, vendors sell local produce and handicrafts at the huge Central Market. The Blue Penny Museum focuses on the island’s colonial and maritime history, along with its culture.',
            '-20.1629672', '57.4267369',
            'Mauritius',
            149194,
            'MUR'
        );
        $mamoudzou = $this->generateLocation(
            'Mamoudzou',
            'Mamoudzou is the coastal capital city of the French overseas region of Mayotte, an archipelago in the Indian Ocean. Boats dot its harbor, and the nearby Marché Couvert sells fresh produce and handicrafts. Local landmarks include Mtsapéré Mosque, with its white minaret, and the 1957 Notre-Dame de Fatima church. Nearby beaches include Trévani, to the north, and the small Plage du Phare, to the south.',
            '-12.7805543', '45.2185082',
            'Mayotte',
            57281,
            'EUR'
        );
        $rabat = $this->generateLocation(
            'Rabat',
            'Rabat, Morocco\'s capital, rests along the shores of the Bouregreg River and the Atlantic Ocean. It\'s known for landmarks that speak to its Islamic and French-colonial heritage, including the Kasbah of the Udayas. This Berber-era royal fort is surrounded by formal French-designed gardens and overlooks the ocean. The city\'s iconic Hassan Tower, a 12th-century minaret, soars above the ruins of a mosque.',
            '33.969199', '-6.9273022',
            'Morocco',
            573895,
            'MAD'
        );
        $maputo = $this->generateLocation(
            'Maputo',
            'Maputo, capital of East Africa’s Mozambique, is an Indian Ocean port with preserved Portuguese colonial architecture. Many turn-of-the-century buildings are in the downtown jacaranda-lined Baixa neighborhood. The bronze-domed CFM Maputo Railway Station, for example, was completed in 1916. The Baixa also has an expansive Municipal Market. The neoclassical City Hall is in the nearby Praça da Independência square.',
            '-25.8962418', '32.540644,',
            'Mozembique',
            1766184,
            'MZN'
        );
        $windhoek = $this->generateLocation(
            'Windhoek',
            'Windhoek is the capital of Namibia, in the country’s central highlands. South of the city, the sprawling Heroes’ Acre war memorial commemorates Namibia’s 1990 independence. On a hilltop in the city center are the 1890s Alte Feste, a former military headquarters with historical exhibits, and Independence Memorial Museum. Colonial influences are visible in nearby buildings like the sandstone Lutheran Christus Church.',
            '-22.5637411', '16.9921864',
            'Namibia',
            325858,
            'NAD'
        );
        $niamey = $this->generateLocation(
            'Niamey',
            'Niamey is the capital and largest city of the West African country of Niger. Niamey lies on the Niger River, primarily situated on the east bank. It is an administrative, cultural and economic centre.',
            '13.5127591', '2.048993,',
            'Niger',
            1302910,
            'XOF'
        );
        $abuja = $this->generateLocation(
            'Abuja',
            'Abuja is the capital city of Nigeria, in the middle of the country. The skyline of the city, which was built largely in the 1980s, is dominated by Aso Rock, an enormous monolith. It rises up behind the Presidential Complex, which houses the residence and offices of the Nigerian president in the Three Arms Zone on the eastern edge of the city. Nearby are the National Assembly and the Supreme Court of Nigeria.',
            '9.0543071', '7.2542734',
            'Nigeria',
            1235880,
            'NGN'
        );
        $brazzaville = $this->generateLocation(
            'Brazzaville',
            'Brazzaville is the capital of the Republic of the Congo, in central Africa. It\'s on the Congo River, opposite Kinshasa, capital of the Democratic Republic of the Congo. Just outside the city are the Congo Rapids. The cylindrical Nabemba Tower overlooks the river in the city center. The marble Pierre Savorgnan de Brazza Memorial contains the remains of the city’s founder. Nearby is the Modernist Basilique Sainte-Anne.',
            '-4.2471919', '15.1571827',
            'Republic of the Congo',
            1827000,
            'CDF'
        );
        $saintDenis = $this->generateLocation(
            'Saint-Denis',
            'Saint-Denis is the capital city of Réunion Island, a French department in the Indian Ocean. It’s known for the Creole-style mansions that reflect its colonial heritage. On Rue de Paris, which is lined with 19th-century buildings, Maison Carrère is a house museum with period furnishings. The Musée Léon Dierx, in a former bishop’s palace, shows works of modern art by artists including Picasso and Gauguin.',
            '-20.8965415', '55.4350018',
            'Reunion',
            145238,
            'EUR'
        );
        $kigali = $this->generateLocation(
            'Kigali',
            'Kigali is the capital city of Rwanda, roughly in the center of the country. It sprawls across numerous hills, ridges and valleys, and has a vibrant restaurant and nightlife scene. The Kigali Genocide Memorial documents the 1994 mass killings in Rwanda, associated with the country’s civil war. The city’s Caplaki Crafts Village has stalls selling traditional handicrafts, including woodcarvings and woven baskets.',
            '-1.9547974', '30.0345071',
            'Rwanda',
            745261,
            'RWF'
        );
        $jamestown = $this->generateLocation(
            'Jamestown',
            'Jamestown is the capital of the British Overseas Territory of Saint Helena, Ascension and Tristan da Cunha, located on the island of Saint Helena in the South Atlantic Ocean. It is also the historic main settlement of the island and is on its north-western coast.',
            '-15.9288412', '-5.7195613',
            'Saint Helena, Ascension and Tristan da Cunha',
            629,
            'SHP'
        );
        $saoTome = $this->generateLocation(
            'Sao Tome',
            'São Tomé is the capital and largest city of São Tomé and Príncipe. Its name is Portuguese for "Saint Thomas". It had an estimated population of 71,868 in 2015, accounting for over a third of the total population of the country.',
            '0.3419788', '6.7100354',
            'Sao Tome and Principle',
            56945,
            'STN'
        );
        $dakar = $this->generateLocation(
            'Dakar',
            'Dakar is the capital of Senegal, in West Africa. It’s an Atlantic port on the Cap-Vert peninsula. Its traditional Médina quarter is home to the Grande Mosquée, marked by a towering minaret. The Musée Théodore Monod displays cultural artifacts including clothing, drums, carvings and tools. The city’s vibrant nightlife is inspired by the local mbalax music.',
            '14.7110139', '-17.5358647',
            'Senegal',
            1146053,
            'XOF'
        );
        $victoria = $this->generateLocation(
            'Victoria',
            'Victoria, on Mahé Island, is the capital city of the Seychelles archipelago in the Indian Ocean. Seychelles National Botanical Gardens showcases endemic palms and orchids, as well as giant tortoises and fruit bats. The colorful Sir Selwyn Clarke Market sells spices, fruit, art and souvenirs. Near the Cathedral of Our Lady of Immaculate Conception is the imposing La Domus, built in 1934 to house Catholic missionaries.',
            '-4.6176354', '55.4476602',
            'Seychelles',
            26450,
            'SCR'
        );
        $freetown = $this->generateLocation(
            'Freetown',
            'Freetown is a port city and the capital of Sierra Leone, in West Africa. It’s known for its beaches and historical role in the transatlantic slave trade. The old town’s centuries-old Cotton Tree is a symbol of emancipation. On the waterfront is the King’s Yard Gate, through which former slaves walked to freedom. The Sierra Leone National Museum includes exhibits relating to the 19th-century military leader Bai Bureh.',
            '8.4553522', '-13.294322',
            'Sierra Leone',
            1050000,
            'SLL'
        );
        $mogadishu = $this->generateLocation(
            'Mogadishu',
            'Mogadishu, locally known as Xamar or Hamar, is the capital and most populous city of Somalia. Located in the coastal Banadir region on the Somali Sea, the city has served as an important port for millennia. As of 2017, it had a population of 2,425,000 residents.',
            '2.0591993', '45.2366251',
            'Somalia',
            2425000,
            'SOS'
        );
        $pretoria = $this->generateLocation(
            'Pretoria',
            'Pretoria is the administrative capital of South Africa. It straddles the Apies River and has spread eastwards into the foothills of the Magaliesberg mountains. It is one of the country\'s three capital cities, serving as the seat of the administrative branch of government, and of foreign embassies to South Africa.',
            '-25.7583818', '27.9177713',
            'South Africa',
            741651,
            'ZAR'
        );
        $juba = $this->generateLocation(
            'Juba',
            'Juba is the capital and largest city of South Sudan. The city is situated on the White Nile and also serves as the capital of Jubek State',
            '4.8606905', '31.5421698',
            'South Sudan',
            492970,
            'SSP'
        );
        $khartoum = $this->generateLocation(
            'Khartoum',
            'Khartoum or Khartum is the capital and largest city of Sudan. The city is also the capital of the state of Khartoum. It is located at the confluence of the White Nile, flowing north from Lake Victoria, and the Blue Nile, flowing west from Ethiopia.',
            '15.501501', '32.4325134',
            'Sudan',
            1974647,
            'SDG'
        );
        $mbabane = $this->generateLocation(
            'Mbabane',
            'Mbabane is the capital city of Swaziland, though parliament and the royal compound, Ludzidzini, are in nearby Lobamba. Surrounded by the Mdimba Mountains, it’s a gateway to Sibebe Rock, a huge granite mound with trails, caves and waterfalls. South, Ezulwini Valley has hot springs and craft markets. In Mantenga Nature Reserve, Mantenga Cultural Village re-creates 19th-century life with traditional huts and dances.',
            '-26.3153566', '31.1021658',
            'Swaziland',
            94874,
            'SZL'
        );
        $dodoma = $this->generateLocation(
            'Dodoma',
            'Dodoma, officially Dodoma City, is the national capital of Tanzania and the capital of Dodoma Region, with a population of 410,956',
            '-6.172943', '35.7031105',
            'Tanzania',
            410956,
            'TZS'
        );
        $lome = $this->generateLocation(
            'Lome',
            'Lomé is the capital of Togo, in West Africa. It\'s known for its palm-lined Atlantic coastline. The central Independence Monument is in a landscaped traffic circle. The nearby Congressional Palace houses the National Museum, exhibiting West African jewelry, masks, musical instruments and pottery. To the northeast, the Akodésséwa Fetish Market sells voodoo items like animal skins and skulls.',
            '6.1823034', '1.1066074',
            'Togo',
            837437,
            'XOF'
        );
        $tunis = $this->generateLocation(
            'Tunis',
            'Tunis is the sprawling capital of Tunisia, a country in North Africa. It sits along Lake Tunis, just inland from the Mediterranean Sea’s Gulf of Tunis. It’s home to a centuries-old medina and the Bardo, an archaeology museum where celebrated Roman mosaics are displayed in a 15th-century palace complex. The parklike ruins of ancient Carthage sit in the city’s northern suburbs.',
            '36.7948008', '10.0031959',
            'Tunisia',
            1056247,
            'TND'
        );
        $kampala = $this->generateLocation(
            'Kampala',
            'Kampala is Uganda\'s national and commercial capital bordering Lake Victoria, Africa\'s largest lake. Hills covered with red-tile villas and trees surround an urban centre of contemporary skyscrapers. In this downtown area, the Uganda Museum explores the country\'s tribal heritage through an extensive collection of artefacts. On nearby Mengo Hill is Lubiri Palace, the former seat of the Buganda Kingdom.',
            '0.3130291', '32.5290857',
            'Uganda',
            1507080,
            'UGX'
        );
        $elAaiun = $this->generateLocation(
            'El-Aaiun',
            'Laâyoune or El Aaiún is the largest city of the disputed territory of Western Sahara and de facto administered by Morocco. The modern city is thought to have been founded by the Spanish colonizer Antonio de Oro in 1938. In 1940, Spain designated it as the capital of the Spanish Sahara.',
            '27.1164429', '-13.250601',
            'Western Sahara',
            196331,
            'MAD'
        );
        $lusaka = $this->generateLocation(
            'Lusaka',
            'Lusaka is the capital of Zambia. In the center, sprawling Lusaka City Market sells clothing, produce and other goods. The National Museum exhibits archaeological finds and contemporary art. Nearby, the Freedom Statue commemorates Zambia\'s struggle for independence. South of the city, Munda Wanga Environmental Park has a wildlife sanctuary and botanical garden. The Lilayi Elephant Nursery cares for orphaned elephants.',
            '-15.416786', '28.2036699',
            'Zambia',
            1742979,
            'ZMW'
        );
        $harare = $this->generateLocation(
            'Harare',
            'Harare is the capital of Zimbabwe. On the edge of landscaped Harare Gardens, the National Gallery of Zimbabwe has a large collection of African contemporary art and traditional pieces like baskets, textiles, jewelry and musical instruments. The unusual granite formation Epworth Balancing Rocks is southeast of the city. Wildlife such as zebras and giraffes roam Mukuvisi Woodlands, which has bike paths and a bird park.',
            '-17.8165877', '30.9167752',
            'Zimbabwe',
            1606000,
            'ZWL'
        );

        $this->buildLocations(
            [
                $algiers,
                $luanda,
                $portoNovo,
                $gaborone,
                $ouagadougou,
                $bujumbura,
                $yaounde,
                $praia,
                $bangui,
                $nDjamena,
                $moroni,
                $kinshasa,
                $djibouti,
                $cairo,
                $malabo,
                $asmara,
                $addisAbaba,
                $libreville,
                $banjul,
                $accra,
                $conakry,
                $bissau,
                $yamaussoukro,
                $nairobi,
                $maseru,
                $monrovia,
                $tripolo,
                $antananarivo,
                $lilongwe,
                $bamako,
                $nouakchott,
                $portLous,
                $mamoudzou,
                $rabat,
                $maputo,
                $windhoek,
                $niamey,
                $abuja,
                $brazzaville,
                $saintDenis,
                $kigali,
                $jamestown,
                $saoTome,
                $dakar,
                $victoria,
                $freetown,
                $mogadishu,
                $pretoria,
                $juba,
                $khartoum,
                $mbabane,
                $dodoma,
                $lome,
                $tunis,
                $kampala,
                $elAaiun,
                $lusaka,
                $harare
            ]
        );
    }

    protected function oceaniaicLocations()
    {
        $pagoPago = $this->generateLocation(
            'Pago Pago',
            'Pago Pago is the territorial capital of American Samoa. It is in Maoputasi County on the main island of American Samoa, Tutuila. It is home to one of the best and deepest natural deepwater harbors in the South Pacific Ocean, sheltered from wind and rough seas, and strategically located. The harbor is also one of the best protected in the South Pacific, which gives American Samoa a natural advantage with respect to landing fish for processing. Tourism, entertainment, food, and tuna canning are its main industries. Pago Pago was the world\'s fourth largest tuna processor as of 1993.[9] It was home to two of the largest tuna companies in the world: Chicken of the Sea and StarKist, which exported an estimated $445 million in canned tuna to the U.S. mainland.',
            '-14.2777617', '-170.7127699',
            'American Samoa',
            3656,
            'USD'
        );
        $avarua = $this->generateLocation(
            'Avarua',
            'Avarua is a town and district in the north of the island of Rarotonga, and is the national capital of the Cook Islands. The town is served by Rarotonga International Airport and Avatiu Harbour.',
            '-21.2184158', '-159.8151545',
            'Cook Islands',
            13100,
            'NZD'
        );
        $suva = $this->generateLocation(
            'Suva',
            'Suva is the capital of the South Pacific island nation of Fiji. It\'s a city of broad avenues, lush parks and grand British colonial buildings, such as the Suva City Library. Suva\'s colorful, lively Municipal Market offers a range of local fruit and vegetables. Fiji Museum, set within the Victorian-era Thurston Gardens, contains examples of traditional canoes, war clubs and tattooing tools.',
            '-18.1236158', '178.427969',
            'Fiji',
            88271,
            'FJD'
        );
        $papeete = $this->generateLocation(
            'Papeete',
            'Papeete, on Tahiti, is the capital of French Polynesia, a group of islands in the South Pacific. Beside the port, busy Place Vai’ete fills with roulottes, or food carts, in the evenings. Nearby, the large Marché de Papeete market sells local produce, fish and handicrafts. The Robert Wan Pearl Museum focuses on the local pearl industry and sells jewelry. A red spire tops the 19th-century Notre Dame Cathedral.',
            '-17.5594211', '-149.5907884',
            'French Polynesia',
            25769,
            'XPF'
        );
        $hagatna = $this->generateLocation(
            'Hagatna',
            'Hagåtña is the capital village of the United States territory of Guam. From the 18th through mid-20th century, it was Guam\'s population center, but today it is the second smallest of the island\'s 19 villages in both area and population.',
            '13.4741452', '144.7305365',
            'Guam',
            1051,
            'USD'
        );
        $tarawa = $this->generateLocation(
            'Tarawa',
            'Tarawa is an atoll and the capital of the Republic of Kiribati, in the central Pacific Ocean. It comprises North Tarawa, which has much in common with other, more remote islands of the Gilberts group; and South Tarawa, which is home to 56,284 people as of 2010 – half of the country\'s total population.',
            '1.4832053', '172.891195',
            'Kiribati',
            56284,
            'AUD'
        );
        $majuro = $this->generateLocation(
            'Majuro',
            'Majuro is the capital and largest city of the Marshall Islands. It is also a large coral atoll of 64 islands in the Pacific Ocean. It forms a legislative district of the Ratak (Sunrise) Chain of the Marshall Islands. The atoll has a land area of 9.7 square kilometres (3.7 sq mi) and encloses a lagoon of 295 square kilometres (114 sq mi). As with other atolls in the Marshall Islands, Majuro consists of narrow land masses.',
            '7.1388324', '171.065885',
            'Marshall Islands',
            27797,
            'USD'
        );
        $yaren = $this->generateLocation(
            'Yaren',
            'The district was created in 1968. Its original name, Makwa (or Moqua), refers to Moqua Well, an underground lake and primary source of drinking water for Nauruan people.',
            '-0.5465293', '166.9101225',
            'Nauru',
            747,
            'AUD'
        );
        $noumea = $this->generateLocation(
            'Noumea',
            'Nouméa is the capital of the South Pacific archipelago and overseas French territory New Caledonia. Situated on the main island, Grand Terre, it\'s known for beaches and its blend of French and native Kanak influences. The Jean-Marie Tjibaou Cultural Centre showcases Kanak heritage, and the Musée de Nouvelle-Calédonie has exhibits from across the Pacific region. The Aquarium des Lagons introduces local marine life.',
            '-22.2643423', '166.3748271',
            'New Caldedonia',
            100237,
            'XPF'
        );
        $alofi = $this->generateLocation(
            'Alofi',
            'Alofi is the capital of the Pacific Ocean island nation of Niue. With a population of less than 1,000, Alofi has the distinction of being the second smallest national capital city in terms of population. It consists of the two villages: Alofi North and Alofi South where the government headquarters are located.',
            '-19.0530604', '-169.941609',
            'Niue',
            639,
            'NZD'
        );
        $saipan = $this->generateLocation(
            'Saipan',
            'Capitol Hill is a settlement on the island of Saipan in the Northern Mariana Islands. It has a population of just over 1,000. Capitol Hill has been the territory\'s seat of government since 1962. It lies on the cross-island road between Tanapag and San Vicente.',
            '15.147777', '145.6111014',
            'Northern Mariana Islands',
            48220,
            'USD'
        );
        $portMoresby = $this->generateLocation(
            'Port Moresby',
            'Port Moresby is the sprawling capital of Papua New Guinea, a country north of Australia. The vast anthropological collection at the PNG National Museum and Art Gallery includes masks and carved wooden poles. Nearby, Parliament House is modeled on a traditional house of worship. Its entrance is dominated by a large, colorful mosaic featuring national motifs. There are views over Port Moresby Harbour from Paga Hill.',
            '-9.4375208', '147.15524',
            'Papua New Guinea',
            410954,
            'PGK'
        );
        $adamstown = $this->generateLocation(
            'Adamstown',
            'Adamstown is the capital of, and only settlement on, the Pitcairn Islands.',
            '-25.0670381', '-130.10602',
            'Pitcairn Islands',
            49,
            'NZD'
        );
        $apia = $this->generateLocation(
            'Apia',
            'Apia is the capital city of the South Pacific island nation of Samoa. Offshore, near Vaiala beach, Palolo Deep Marine Reserve is a stretch of reef with a deep, coral-lined hole. The Robert Louis Stevenson Museum is housed in the writer’s restored home. Nearby, at the top of Mount Vaea, is his grave. In the city center, the country’s natural history and cultural heritage are the focus of the Museum of Samoa.',
            '-13.8599098', '-171.8031743',
            'Samoa',
            36735,
            'WST'
        );
        $honiara = $this->generateLocation(
            'Honiara',
            'Honiara, on the island of Guadalcanal, is the capital city of the Solomon Islands. Its buzzing Central Market sells local produce and handicrafts. Traditional frescoes adorn the conical National Parliament building. The National Museum has WWII relics and cultural artifacts. The Botanical Gardens includes an orchid house. Outside the city, the waters of the Mataniko Falls thunder down a rocky cliff into a canyon.',
            '-9.434315', '159.9032503',
            'Soloman Islands',
            84520,
            'SBD'
        );
        $nukualofa = $this->generateLocation(
            'Nuku`alofa',
            'Nukuʻalofa is the capital of Tonga. It is located on the north coast of the island of Tongatapu, in the southernmost island group of Tonga.',
            '-21.1419283', '-175.2326206',
            'Tonga',
            24571,
            'TOP'
        );
        $funafuti = $this->generateLocation(
            'Funafuti',
            'Funafuti is an atoll and the capital of the island nation of Tuvalu. It has a population of 6,025 people, making it the country\'s most populated atoll, with 56.6 percent of Tuvalu\'s population. It is a narrow sweep of land between 20 and 400 metres wide, encircling a large lagoon 18 km long and 14 km wide.',
            '-8.5361618', '179.0415247',
            'Tuvalu',
            6025,
            'AUD'
        );
        $portVilla = $this->generateLocation(
            'Port-Vila',
            'Port Vila is the harborside capital and main hub of Vanuatu, on Efate island. Its small downtown is home to colorful market stalls selling produce and local handicrafts. The National Museum of Vanuatu, inside the Vanuatu Cultural Centre, displays artifacts such as slit-gong drums and outrigger canoes. The town is a base for diving and trips to Mele Cascades, a multi-tiered waterfall with rock pools in a rainforest.',
            '-17.7369402', '168.2873144',
            'Vanuatu',
            44040,
            'VUV'
        );
        $matautu = $this->generateLocation(
            'Mata-Utu',
            'Mata Utu is the capital of Wallis and Futuna, an overseas collectivity of France. It is located on the island of Uvéa, in the district of Hahake, of which it is also the capital. Its population is 1,191. It is one of two ports in Wallis and Futuna, the other being at Leava on Futuna.',
            '-13.283314', '-176.1844504',
            'Wallis and Futuna',
            1191,
            'XPF'
        );

        $this->buildLocations(
            [
                $pagoPago,
                $avarua,
                $suva,
                $papeete,
                $hagatna,
                $tarawa,
                $majuro,
                $yaren,
                $noumea,
                $alofi,
                $saipan,
                $portMoresby,
                $adamstown,
                $apia,
                $honiara,
                $nukualofa,
                $funafuti,
                $portVilla,
                $matautu
            ]
        );
    }


    /**
     * @param $name string
     * @param $description string
     * @param $lat string
     * @param $lng string
     * @param $country string
     * @param $population
     * @param null $currency
     * @return stdClass
     */
    protected function generateLocation($name, $description, $lat, $lng, $country, $population, $currency = null)
    {
        $location = new stdClass();
        $location->name = $name;
        $location->description = $description;
        $location->latitude = $lat;
        $location->longitude = $lng;
        $location->country = $country;
        $location->population = $population;
        $location->currency = $currency;

        return $location;
    }
}
