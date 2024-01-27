<?php

namespace App\Console\Commands;

use App\Actions\CollectMeteoData;
use Illuminate\Console\Command;
use Illuminate\Contracts\Queue\ShouldQueue;

class CollectMeteoDataCommand extends Command implements ShouldQueue
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'meteo:collect {latitude=52.52} {longitude=13.41} {--queue=default}';

    /**
     *
     *
     * @var string
     */
    protected $description = 'Collecting meteo data for given latitude and longitude';

    /**
     *
     */
    public function handle()
    {
        $latitude = $this->argument('latitude');
        $longitude = $this->argument('longitude');
        $this->info("Collecting data for latitude: $latitude and longitude: $longitude");
        $data = app(CollectMeteoData::class)->handle($latitude, $longitude);
        $this->info("Data collected: " . json_encode($data));
    }
}
