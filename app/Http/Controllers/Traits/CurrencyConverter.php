<?php


namespace App\Http\Controllers\Traits;

use Illuminate\Support\Facades\DB;

trait CurrencyConverter
{

    /**
     * @var |null
     */
    protected $characterCurrency = null;

    /**
     * @var string
     */
    public $currencySymbol = '';

    /**
     * @var int
     */
    public $currencyRate = 1;


    public function getConvertedCurrency($dollars, $convertISOCode)
    {
        $currency = $this->getCurrency($convertISOCode);
        $currency->converted = $this->convertCurrency($dollars, $currency->rate);

        return $currency;

    }

    private function getCurrency($convertISOCode)
    {
        return DB::table('currency_rates')->where('iso_code', $convertISOCode)->first();
    }

    private function convertCurrency($dollars, $rate)
    {
        return \bcmul($dollars, $rate, 2);
    }

}
