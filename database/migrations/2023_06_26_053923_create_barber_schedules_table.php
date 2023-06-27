<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('barber_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Barber::class)
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate()
                ->nullable();
            $table->date('scheduled_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->boolean('is_available');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('barber_schedules');
    }
};
