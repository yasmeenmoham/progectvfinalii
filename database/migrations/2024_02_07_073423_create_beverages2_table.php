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
        Schema::create('beverages2', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->date('beverage_date')->nullable();
            $table->string('title');
            $table->decimal('price', 8, 2);
            $table->boolean('published');
            $table->boolean('special')->default(false);
            $table->text('content');
            $table->timestamps(); // This line will automatically add `created_at` and `updated_at` columns
            
            // Define foreign key constraint
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beverages2');
    }
};
