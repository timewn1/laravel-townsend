<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sections', function (Blueprint $table): void {
            $table->id();
            $table->unsignedInteger('store_id')->index();
            $table->string('description', 50);
            $table->integer('order');
            $table->unsignedInteger('parent')->default(0);
            $table->smallInteger('ppr_override')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};
