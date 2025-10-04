<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('guide_assignments', function (Blueprint $table) {
            $table->id('assignment_id');
            $table->foreignId('booking_id')->constrained('bookings', 'booking_id');
            $table->foreignId('guide_id')->constrained('guides', 'guide_id');
            $table->string('status')->default('pending');
            $table->date('assigned_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('guide_assignments');
    }
};
