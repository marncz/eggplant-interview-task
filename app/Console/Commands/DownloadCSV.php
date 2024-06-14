<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class DownloadCSV extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'csv:download';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        ini_set('memory_limit', '-1');
        $url = 'https://download.db-ip.com/free/dbip-city-lite-2024-06.csv.gz';
        $this->info('Downloading CSV file');
        $contents = file_get_contents($url);

        Storage::put('public/'.'csv-import.csv', gzdecode($contents));
        $this->info('CSV file downloaded');
    }
}
