<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Branch::class)
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate()
                ->nullable();
            $table->foreignIdFor(\App\Models\Barber::class)
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate()
                ->nullable();
            $table->dateTime('scheduled_time');
            $table->string('customer_name');
            $table->integer('customer_phone');
            $table->unsignedSmallInteger('payment_status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
