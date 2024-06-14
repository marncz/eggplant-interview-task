<?php

namespace Database\Seeders;

use App\Models\LookupEntry;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        ini_set('memory_limit', '-1');
        $file = Storage::get('public/'.'csv-import.csv');
        $lines = explode(PHP_EOL, $file);

        foreach ($lines as $line) {
            $values = explode(',', $line);

            if ($values[0] === '0.0.0.0') {
                continue;
            }

            LookupEntry::create([
                'range_start' => $values[0],
                'range_end' => $values[1],
                'city' => str_replace('"', '', $values[5]),
                'region' => str_replace('"', '', $values[4]),
                'country_code' => $values[3],
            ]);
        }
    }
}
