<?php
// database/migrations/2025_09_12_000000_create_brands_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->boolean('is_active')->default(true);
            $table->timestamps(); // Cria `created_at` e `updated_at` automaticamente
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};
