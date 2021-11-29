<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExchangeRatesTable extends Migration
{
    public function up(): void
    {
        Schema::create('exchange_rates', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('base', 3);
            $table->string('currency', 3);
            $table->double('rate');
            $table->timestamps();

            $table->unique(['date', 'base', 'currency']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exchange_rates');
    }
}
