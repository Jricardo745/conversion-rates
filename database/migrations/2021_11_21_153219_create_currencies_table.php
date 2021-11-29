<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrenciesTable extends Migration
{
    public function up(): void
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->char('alphabetic_code', 3)->unique();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('currencies');
    }
}
