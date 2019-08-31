<?php

use Illuminate\Database\Seeder;

class CurrencyRatesTableSeeder extends Seeder
{

    protected $currencies = [];
    protected $currenciesRaw = [];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->worldCurrencies();
        $this->buildCurrencies();
        DB::table('currency_rates')->insert($this->currencies);
    }

    protected function buildCurrencies()
    {
        foreach($this->currenciesRaw as $currency) {
            $this->currencies[] = [
                'name' => $currency->name,
                'symbol' => $currency->symbol,
                'iso_code' => $currency->isoCode,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
    }

    protected function generateCurrency($name, $symbol, $isoCode)
    {
        $currency = new \stdClass();
        $currency->name = $name;
        $currency->symbol = $symbol;
        $currency->isoCode = $isoCode;

        $this->currenciesRaw[] = $currency;
    }

    protected function worldCurrencies()
    {
        $this->generateCurrency(
            'Albania Lek',
            'Lek',
            'ALL'
        );
        $this->generateCurrency(
            'Afghanistan Afghani',
            '؋',
            'AFN'
        );
        $this->generateCurrency(
            'Argentina Peso',
            '$',
            'AFN'
        );
        $this->generateCurrency(
            'Aruba Guilder',
            'ƒ',
            'AWG'
        );
        $this->generateCurrency(
            'Australia Dollar',
            '$',
            'AUD'
        );
        $this->generateCurrency(
            'Azerbaijan New Manat',
            'ман',
            'AZN'
        );
        $this->generateCurrency(
            'Bahamas Dollar',
            '$',
            'BSD'
        );
        $this->generateCurrency(
            'Barbados Dollar',
            '$',
            'BBD'
        );
        $this->generateCurrency(
            'Belarus Ruble',
            'Br',
            'BYN'
        );
        $this->generateCurrency(
            'Belize Dollar',
            'BZ$',
            'BZD'
        );
        $this->generateCurrency(
            'Bermuda Dollar',
            '$',
            'BMD'
        );
        $this->generateCurrency(
            'Bolivia Bolíviano',
            '$b',
            'BOB'
        );
        $this->generateCurrency(
            'Bosnia and Herzegovina Convertible Marka',
            'KM',
            'BAM'
        );
        $this->generateCurrency(
            'Botswana Pula',
            'P',
            'BWP'
        );
        $this->generateCurrency(
            'Bulgaria Lev',
            'лв',
            'BGN'
        );
        $this->generateCurrency(
            'Brazil Real',
            'R$',
            'BRL'
        );
        $this->generateCurrency(
            'Brunei Darussalam Dollar',
            '$',
            'BND'
        );
        $this->generateCurrency(
            'Cambodia Riel',
            '៛',
            'KHR'
        );
        $this->generateCurrency(
            'Canada Dollar',
            '$',
            'CAD'
        );
        $this->generateCurrency(
            'Cayman Islands Dollar',
            '$',
            'KYD'
        );
        $this->generateCurrency(
            'Chile Peso',
            '$',
            'CLP'
        );
        $this->generateCurrency(
            'China Yuan Renminbi',
            '¥',
            'CNY'
        );
        $this->generateCurrency(
            'Colombia Peso',
            '$',
            'COP'
        );
        $this->generateCurrency(
            'Costa Rica Colon',
            '₡',
            'CRC'
        );
        $this->generateCurrency(
            'Croatia Kuna',
            'kn',
            'HRK'
        );
        $this->generateCurrency(
            'Cuba Peso',
            '₱',
            'CUP'
        );
        $this->generateCurrency(
            'Czech Republic Koruna',
            'Kč',
            'CZK'
        );
        $this->generateCurrency(
            'Denmark Krone',
            'kr',
            'DKK'
        );
        $this->generateCurrency(
            'Dominican Republic Peso',
            'RD$',
            'DOP'
        );
        $this->generateCurrency(
            'East Caribbean Dollar',
            '$',
            'XCD'
        );
        $this->generateCurrency(
            'Egypt Pound',
            '£',
            'EGP'
        );
        $this->generateCurrency(
            'El Salvador Colon',
            '$',
            'SVC'
        );
        $this->generateCurrency(
            'Euro Member Countries',
            '€',
            'EUR'
        );
        $this->generateCurrency(
            'Falkland Islands (Malvinas) Pound',
            '£',
            'FKP'
        );
        $this->generateCurrency(
            'Fiji Dollar',
            '$',
            'FJD'
        );
        $this->generateCurrency(
            'Ghana Cedi',
            '¢',
            'GHS'
        );
        $this->generateCurrency(
            'Gibraltar Pound',
            '£',
            'GIP'
        );
        $this->generateCurrency(
            'Guatemala Quetzal',
            'Q',
            'GTQ'
        );
        $this->generateCurrency(
            'Guernsey Pound',
            '£',
            'GGP'
        );
        $this->generateCurrency(
            'Guyana Dollar',
            '$',
            'GYD'
        );
        $this->generateCurrency(
            'Honduras Lempira',
            'L',
            'HNL'
        );
        $this->generateCurrency(
            'Hong Kong Dollar',
            '$',
            'HKD'
        );
        $this->generateCurrency(
            'Hungary Forint',
            'Ft',
            'HUF'
        );
        $this->generateCurrency(
            'Iceland Krona',
            'kr',
            'ISK'
        );
        $this->generateCurrency(
            'India Rupee',
            '₹',
            'INR'
        );
        $this->generateCurrency(
            'Indonesia Rupiah',
            'Rp',
            'IDR'
        );
        $this->generateCurrency(
            'Iran Rial',
            '﷼',
            'IRR'
        );
        $this->generateCurrency(
            'Isle of Man Pound',
            '£',
            'IMP'
        );
        $this->generateCurrency(
            'Israel Shekel',
            '₪',
            'ILS'
        );
        $this->generateCurrency(
            'Jamaica Dollar',
            'J$',
            'JMD'
        );
        $this->generateCurrency(
            'Japan Yen',
            '¥',
            'JPY'
        );
        $this->generateCurrency(
            'Jersey Pound',
            '£',
            'JEP'
        );
        $this->generateCurrency(
            'Kazakhstan Tenge',
            'лв',
            'KZT'
        );
        $this->generateCurrency(
            'Korea (North) Won',
            '₩',
            'KPW'
        );
        $this->generateCurrency(
            'Korea (South) Won',
            '₩',
            'KRW'
        );
        $this->generateCurrency(
            'Kyrgyzstan Som',
            'лв',
            'KGS'
        );
        $this->generateCurrency(
            'Laos Kip',
            '₭',
            'LAK'
        );
        $this->generateCurrency(
            'Lebanon Pound',
            '£',
            'LBP'
        );
        $this->generateCurrency(
            'Liberia Dollar',
            '$',
            'LRD'
        );
        $this->generateCurrency(
            'Macedonia Denar',
            'ден',
            'MKD'
        );
        $this->generateCurrency(
            'Malaysia Ringgit',
            'RM',
            'MYR'
        );
        $this->generateCurrency(
            'Mauritius Rupee',
            '₨',
            'MUR'
        );
        $this->generateCurrency(
            'Mexico Peso',
            '$',
            'MXN'
        );
        $this->generateCurrency(
            'Mongolia Tughrik',
            '₮',
            'MNT'
        );
        $this->generateCurrency(
            'Mozambique Metical',
            'MT',
            'MZN'
        );
        $this->generateCurrency(
            'Namibia Dollar',
            '$',
            'NAD'
        );
        $this->generateCurrency(
            'Nepal Rupee',
            '₨',
            'NPR'
        );
        $this->generateCurrency(
            'Netherlands Antilles Guilder',
            'ƒ',
            'ANG'
        );
        $this->generateCurrency(
            'New Zealand Dollar',
            '$',
            'NZD'
        );
        $this->generateCurrency(
            'Nicaragua Cordoba',
            'C$',
            'NIO'
        );
        $this->generateCurrency(
            'Nigeria Naira',
            '₦',
            'NGN'
        );
        $this->generateCurrency(
            'Norway Krone',
            'kr',
            'NOK'
        );
        $this->generateCurrency(
            'Oman Rial',
            '﷼',
            'OMR'
        );
        $this->generateCurrency(
            'Pakistan Rupee',
            '₨',
            'PKR'
        );
        $this->generateCurrency(
            'Panama Balboa',
            'B/.',
            'PAB'
        );
        $this->generateCurrency(
            'Paraguay Guarani',
            'Gs',
            'PYG'
        );
        $this->generateCurrency(
            'Peru Sol',
            'S/.',
            'PEN'
        );
        $this->generateCurrency(
            'Philippines Peso',
            '₱',
            'PHP'
        );
        $this->generateCurrency(
            'Poland Zloty',
            'zł',
            'PLN'
        );
        $this->generateCurrency(
            'Qatar Riyal',
            '﷼',
            'QAR'
        );
        $this->generateCurrency(
            'Romania New Leu',
            'lei',
            'RON'
        );
        $this->generateCurrency(
            'Russia Ruble',
            'руб',
            'RUB'
        );
        $this->generateCurrency(
            'Saint Helena Pound',
            '£',
            'SHP'
        );
        $this->generateCurrency(
            'Saudi Arabia Riyal',
            '﷼',
            'SAR'
        );
        $this->generateCurrency(
            'Serbia Dinar',
            'Дин.',
            'RSD'
        );
        $this->generateCurrency(
            'Seychelles Rupee',
            '₨',
            'SCR'
        );
        $this->generateCurrency(
            'Singapore Dollar',
            '$',
            'SGD'
        );
        $this->generateCurrency(
            'Solomon Islands Dollar',
            '$',
            'SBD'
        );
        $this->generateCurrency(
            'Somalia Shilling',
            'S',
            'SOS'
        );
        $this->generateCurrency(
            'South Africa Rand',
            'R',
            'ZAR'
        );
        $this->generateCurrency(
            'Sri Lanka Rupee',
            '₨',
            'LKR'
        );
        $this->generateCurrency(
            'Sweden Krona',
            'kr',
            'SEK'
        );
        $this->generateCurrency(
            'Switzerland Franc',
            'CHF',
            'CHF'
        );
        $this->generateCurrency(
            'Suriname Dollar',
            '$',
            'SRD'
        );
        $this->generateCurrency(
            'Syria Pound',
            '£',
            'SYP'
        );
        $this->generateCurrency(
            'Taiwan New Dollar',
            'NT$',
            'TWD'
        );
        $this->generateCurrency(
            'Thailand Baht',
            '฿',
            'THB'
        );
        $this->generateCurrency(
            'Trinidad and Tobago Dollar',
            'TT$',
            'TTD'
        );
        $this->generateCurrency(
            'Turkey Lira',
            '&#;',
            'TRY'
        );
        $this->generateCurrency(
            'Tuvalu Dollar',
            '$',
            'TVD'
        );
        $this->generateCurrency(
            'Ukraine Hryvnia',
            '₴',
            'UAH'
        );
        $this->generateCurrency(
            'United Kingdom Pound',
            '£',
            'GBP'
        );
        $this->generateCurrency(
            'United States Dollar',
            '$',
            'USD'
        );
        $this->generateCurrency(
            'Uruguay Peso',
            '$U',
            'UYU'
        );
        $this->generateCurrency(
            'Uzbekistan Som',
            'лв',
            'UZS'
        );
        $this->generateCurrency(
            'Venezuela Bolivar',
            'Bs',
            'VEF'
        );
        $this->generateCurrency(
            'Viet Nam Dong',
            '₫',
            'VND'
        );
        $this->generateCurrency(
            'Yemen Rial',
            '﷼',
            'YER'
        );
        $this->generateCurrency(
            'Zimbabwe Dollar',
            'Z$',
            'ZWD'
        );
        $this->generateCurrency(
            'United Arab Emirates Dirham',
            ' د.إ',
            'AED'
        );
        $this->generateCurrency(
            'Armenian Dram',
            '֏',
            'AMD'
        );
        $this->generateCurrency(
            'Angolan Kwanza',
            'Kz',
            'AOA'
        );
        $this->generateCurrency(
            'Argentine Peso',
            '$',
            'ARS'
        );
        $this->generateCurrency(
            'Bangladeshi Taka',
            '৳',
            'BDT'
        );
        $this->generateCurrency(
            'Bahraini Dinar',
            '.د.ب',
            'BHD'
        );
        $this->generateCurrency(
            'Burundian Franc',
            'FBu',
            'BIF'
        );
        $this->generateCurrency(
            'Bitcoin',
            '₿',
            'BTC'
        );
        $this->generateCurrency(
            'Congolese Franc',
            'FC',
            'CDF'
        );
        $this->generateCurrency(
            'Unidad de Fomento',
            'UF',
            'CLF'
        );
        $this->generateCurrency(
            'Chinese Yuan Renminbi',
            '¥',
            'CNH'
        );
        $this->generateCurrency(
            'Cuban Convertible Peso',
            '$',
            'CUC'
        );
        $this->generateCurrency(
            'Cape Verdean Escudo',
            '$',
            'CVE'
        );
        $this->generateCurrency(
            'Djiboutian Franc',
            'Fdj',
            'DJF'
        );
        $this->generateCurrency(
            'Algerian Dinar',
            'دج',
            'DZD'
        );
        $this->generateCurrency(
            'Eritrean Nakfa',
            'نافكا',
            'ERN'
        );
        $this->generateCurrency(
            'Ethiopian Birr',
            'ብር',
            'ETB'
        );
        $this->generateCurrency(
            'Georgian Lari',
            'ლ',
            'GEL'
        );
        $this->generateCurrency(
            'Gambian Dalasi',
            'D',
            'GMD'
        );
        $this->generateCurrency(
            'Guinean Franc',
            'FG',
            'GNF'
        );
        $this->generateCurrency(
            'Haitian Gourde',
            'G',
            'HTG'
        );
        $this->generateCurrency(
            'Iraqi Dinar',
            'ع.د',
            'IQD'
        );
        $this->generateCurrency(
            'Jordanian Dinar',
            'د.ا',
            'JOD'
        );
        $this->generateCurrency(
            'Kenyan Shilling',
            'Ksh',
            'KES'
        );
        $this->generateCurrency(
            'Comorian Franc',
            'CF',
            'KMF'
        );
        $this->generateCurrency(
            'Kuwaiti Dinar',
            'KD',
            'KWD'
        );
        $this->generateCurrency(
            'Lesotho Loti',
            'M',
            'LSL'
        );
        $this->generateCurrency(
            'Libyan Dinar',
            'ل.د',
            'LYD'
        );
        $this->generateCurrency(
            'Moroccan Dirham',
            'MAD',
            'MAD'
        );
        $this->generateCurrency(
            'Moldovan Leu',
            'L',
            'MDL'
        );
        $this->generateCurrency(
            'Malagasy ariary',
            'Ar',
            'MGA'
        );
        $this->generateCurrency(
            'Burmese Kyat',
            'K',
            'MMK'
        );
        $this->generateCurrency(
            'Macanese Pataca',
            'MOP$',
            'MOP'
        );
        $this->generateCurrency(
            'Mauritanian Ouguiya',
            'UM',
            'MRO'
        );
        $this->generateCurrency(
            'Mauritanian Ouguiya',
            'UM',
            'MRU'
        );
        $this->generateCurrency(
            'Maldivian Rufiyaa',
            'Rf',
            'MVR'
        );
        $this->generateCurrency(
            'Malawian Kwacha',
            'MK',
            'MWK'
        );
        $this->generateCurrency(
            'Papua New Guinean Kina',
            'K',
            'PGK'
        );
        $this->generateCurrency(
            'Rwandan Franc',
            'FRw',
            'RWF'
        );
        $this->generateCurrency(
            'Sudanese Pound',
            'ج.س',
            'SDG'
        );
        $this->generateCurrency(
            'Sierra Leonean Leone',
            'Le',
            'SLL'
        );
        $this->generateCurrency(
            'South Sudanese Pound',
            '£',
            'SSP'
        );
        $this->generateCurrency(
            'São Tomé and Príncipe Dobra',
            'Db',
            'STD'
        );
        $this->generateCurrency(
            'São Tomé and Príncipe Dobra',
            'Db',
            'STN'
        );
        $this->generateCurrency(
            'Swazi Lilangeni',
            'E',
            'SZL'
        );
        $this->generateCurrency(
            'Tajikistani Somoni',
            'SM',
            'TJS'
        );
        $this->generateCurrency(
            'Turkmenistan Manat',
            'T',
            'TMT'
        );
        $this->generateCurrency(
            'Tunisian Dinar',
            'د.ت,',
            'TND'
        );
        $this->generateCurrency(
            'Tongan Pa\'anga',
            'T$',
            'TOP'
        );
        $this->generateCurrency(
            'Tanzanian Shilling',
            'TSh',
            'TZS'
        );
        $this->generateCurrency(
            'Ugandan Shilling',
            'USh',
            'UGX'
        );
        $this->generateCurrency(
            'Venezuelan Bolívar',
            'Bs',
            'VES'
        );
        $this->generateCurrency(
            'Vanuatu vatu',
            'VT',
            'VUV'
        );
        $this->generateCurrency(
            'Samoan Tālā',
            'SAT',
            'WST'
        );
        $this->generateCurrency(
            'Central African CFA Franc',
            'FCFA',
            'XAF'
        );
        $this->generateCurrency(
            'Troy Ounce of Silver',
            'XAG',
            'XAG'
        );
        $this->generateCurrency(
            'Troy Ounce of Gold',
            'XAU',
            'XAU'
        );
        $this->generateCurrency(
            'Special Drawing Rights',
            'SDR',
            'XDR'
        );
        $this->generateCurrency(
            'West African CFA Franc',
            'CFA',
            'XOF'
        );
        $this->generateCurrency(
            'Palladium Ounce',
            'XPD',
            'XPD'
        );
        $this->generateCurrency(
            'CFP Franc',
            '₣',
            'XPF'
        );
        $this->generateCurrency(
            'Platinum Ounce',
            'XPT',
            'XPT'
        );
        $this->generateCurrency(
            'Zambian Kwacha',
            'ZK',
            'ZMW'
        );
        $this->generateCurrency(
            'Zimbabwean Dollar',
            '$',
            'ZWL'
        );
        $this->generateCurrency(
            'Bhutanese Ngultrum',
            'Nu',
            'BTN'
        );
    }
}
