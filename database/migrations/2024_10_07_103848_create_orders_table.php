<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained()->cascadeOnDelete(); // Reference to the user who created the order
            $table->string('order_number')->unique();  // A unique order number for reference
            $table->decimal('total_amount', 10, 2);  // Total amount for the order
            $table->enum('status',['pending','processing','completed','canceled']);
            $table->foreignId('coupon_id')->nullable()->constrained()->nullOnDelete();  // Link to the coupon used
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
