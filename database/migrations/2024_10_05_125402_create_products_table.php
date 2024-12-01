<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->json('description');
            $table->string('price');
            $table->enum('status',['published','unpublished','draft'])->default('draft');
            $table->foreignId('user_id');
            $table->string('slug')->unique();
            $table->string('quantity');
            $table->string('discounted_price');
            $table->string('vat_amount')->nullable();
            $table->enum('discount_type',['no_discount','percentage','fixed_price']);
            $table->enum('tax_type',['free','taxable_goods','downloadable_product']);
            $table->string('SKU')->unique()->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
