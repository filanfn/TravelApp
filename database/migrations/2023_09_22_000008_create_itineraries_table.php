<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('itineraries', function (Blueprint $table) {
            $table->id('itinerary_id');
            $table->foreignId('booking_id')->constrained('bookings', 'booking_id');
            $table->integer('day_number');
            $table->text('activity_description');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('itineraries');
    }
};