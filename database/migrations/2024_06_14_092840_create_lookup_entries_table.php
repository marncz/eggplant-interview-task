<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lookup_entries', function (Blueprint $table) {
            $table->id();
            $table->string('range_start');
            $table->string('range_end');
            $table->string('city');
            $table->string('region');
            $table->string('country_code');
            $table->timestamps();
        });

        DB::statement('ALTER TABLE lookup_entries ADD INDEX idx_range ((INET_ATON(range_start)), (INET_ATON(range_end)))');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lookup_entries');
    }
};
