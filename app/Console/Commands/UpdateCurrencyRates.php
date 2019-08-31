<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UpdateCurrencyRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gve:updateCurrencyRates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Currency Rates';

    protected $endpoint = "https://openexchangerates.org/api/latest.json";

    protected $client = null;

    protected $openExchangeAppId = null;

    protected $table = 'currency_rates';

    /**
     * @var array
     */
    protected $currencyRates = [];

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
        $this->setupClient();
        $this->getRates();
        $this->storeRates();
    }

    protected function setupClient()
    {
        $this->openExchangeAppId = env('OPEN_EXCHANGE_KEY');
        $this->client = new \GuzzleHttp\Client();
    }

    protected function getRates()
    {

        $response = $this->client->request('GET', $this->endpoint, ['query' => [
            'app_id' => $this->openExchangeAppId
        ]]);

        $statusCode = $response->getStatusCode();
        $content = json_decode($response->getBody(), true);

        if($statusCode===200){
            $this->currencyRates = $content['rates'];
        }
    }

    protected function storeRates()
    {
        foreach($this->currencyRates as $code => $rate){
            DB::table('currency_rates')->updateOrInsert(
                ['iso_code' => $code],
                ['rate' => $rate, 'updated_at' => now()]
            );
        }
    }

}
