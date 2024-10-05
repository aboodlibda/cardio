<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('product_tags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id');
            $table->foreignId('tag_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_tags');
    }
};
