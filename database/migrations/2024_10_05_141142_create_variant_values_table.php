<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('variant_values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('variant_id');
            $table->string('price');
            $table->string('quantity');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('variant_values');
    }
};
