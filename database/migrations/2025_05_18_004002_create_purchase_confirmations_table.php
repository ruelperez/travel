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
        Schema::create('purchase_confirmations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('resort_name')->nullable();
            $table->string('package')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('status')->nullable();
            $table->string('amount')->nullable();
            $table->string('us_time')->nullable(); // U.S. timezone formatted string
            $table->string('purchased_date')->nullable();
            $table->string('certificate_expire')->nullable();
            $table->string('invoice_number')->nullable();
            $table->string('card_type')->nullable();
            $table->string('card_number')->nullable();
            $table->string('sign_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_confirmations');
    }
};
