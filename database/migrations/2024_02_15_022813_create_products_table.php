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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->integer('brand_id')->nullable();
            $table->string('sku');
            $table->string('slug');
            $table->string('product_name');
            $table->integer('discount')->default(0);
            $table->string('short_desc');
            $table->longText('long_desc');
            $table->longText('additional_info')->nullable();
            $table->string('tags')->nullable();
            $table->string('preview_img');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
