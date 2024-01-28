<?php

namespace App\Console\Commands;

use App\Services\MeteoService;
use Illuminate\Console\Command;
use Illuminate\Contracts\Queue\ShouldQueue;

class CollectMeteoDataCommand extends Command implements ShouldQueue
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'meteo:collect {latitude=28.50} {longitude=10.00} {--queue=default}';

    /**
     *Collecting meteo data for given latitude and longitude
     * @var string
     */
    protected $description = 'Collecting meteo data for given latitude and longitude';


    /**
     * Execute the console command.
     * @return void
     */
    public function handle(): void
    {
        $latitude = $this->argument('latitude');
        $longitude = $this->argument('longitude');
        $this->info("Collecting data for latitude: $latitude and longitude: $longitude");
        $data = app(MeteoService::class)->collect($latitude, $longitude);
        $this->info("Data collected: " . json_encode($data));
    }
}
