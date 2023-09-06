<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('store_products_section', function (Blueprint $table): void {
            $table->id();
            $table->unsignedInteger('store_product_id');
            $table->unsignedInteger('section_id');
            $table->integer('position');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('store_products_section');
    }
};
