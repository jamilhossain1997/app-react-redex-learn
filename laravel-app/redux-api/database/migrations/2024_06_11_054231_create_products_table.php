<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->decimal('product_price', 8, 2);  // Changed to decimal for better precision
            $table->integer('quantity'); // Allow null values
            $table->text('description')->nullable();
            $table->integer('minimum_order_qty')->default(1);  // Removed 'after' clause
            $table->boolean('active')->default(true);
            $table->timestamps();
            $table->softDeletes();  // Added soft deletes
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
