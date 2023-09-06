<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('store_products', function (Blueprint $table): void {
            $table->id();
            $table->integer('store_id');
            $table->integer('artist_id');
            $table->enum('type', ['music','merch','ticket','download','multi','external','linked','box','free']);
            $table->dateTime('launch_date')->nullable();
            $table->dateTime('remove_date')->nullable();
            $table->date('release_date')->nullable();
            $table->text('description');
            $table->boolean('available');
            $table->decimal('price', 8, 2);
            $table->decimal('euro_price', 8, 2);
            $table->decimal('dollar_price', 8, 2);
            $table->string('image_format', 10);
            $table->boolean('deleted')->default(0);
            $table->text('disabled_countries');
            $table->string('display_name');
            $table->string('name');
            $table->smallInteger('position')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('store_products');
    }
};
