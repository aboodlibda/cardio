<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
            $table->decimal('amount',10,2);
            $table->string('payment_method');
            $table->enum('payment_status',['pending','completed','failed'])->default('pending');
            $table->string('currency')->default('USD');
            $table->string('transaction_id')->nullable();  // External payment gateway transaction ID
            $table->string('gateway')->nullable();  // External gateway used (e.g., Stripe, PayPal)
            $table->timestamp('paid_at')->nullable();  // When the payment was completed
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
