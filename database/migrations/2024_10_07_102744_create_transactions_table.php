<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payment_id')->constrained()->cascadeOnDelete();  // Reference to the payment
            $table->string('transaction_type');  // Type of transaction (e.g., payment, refund)
            $table->enum('transaction_status',['pending','completed','failed'])->default('pending');  // Status (e.g., pending, completed, failed)
            $table->decimal('amount', 10, 2);  // Amount for this transaction (could be negative for refunds)
            $table->string('gateway_transaction_id')->nullable();  // Transaction ID from the payment gateway
            $table->string('error_message')->nullable();  // Error message, if the transaction failed
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
