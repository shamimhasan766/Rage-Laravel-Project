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
        Schema::create('stripe_pays', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->integer('total');
            $table->integer('charge');
            $table->integer('discount');
            $table->integer('billing_id');
            $table->integer('shipping_id')->nullable();
            $table->string('transaction_id');
            $table->string('currency');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stripe_pays');
    }
};
