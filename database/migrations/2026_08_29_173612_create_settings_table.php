<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {

            $table->id();

            $table->string('restaurant_name')
                ->default('Sarkar Eats');

            $table->string('restaurant_phone')
                ->nullable();

            $table->string('restaurant_email')
                ->nullable();

            $table->text('restaurant_address')
                ->nullable();

            $table->string('opening_hours')
                ->nullable();

            $table->string('currency', 5)
                ->default('৳');

            $table->decimal('delivery_charge', 10, 2)
                ->default(50);

            $table->decimal('minimum_order', 10, 2)
                ->default(200);

            $table->boolean('restaurant_open')
                ->default(true);

            $table->boolean('maintenance_mode')
                ->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};