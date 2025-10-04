<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tour_packages', function (Blueprint $table) {
            $table->id('package_id');
            $table->foreignId('destination_id')->constrained('destinations', 'destination_id');
            $table->string('title', 150);
            $table->integer('max_pax');
            $table->text('description');
            $table->decimal('base_price', 10, 2);
            $table->integer('duration_days');
            $table->string('status', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tour_packages');
    }
};