<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinePersonalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine_personal', function (Blueprint $table) {
            $table->id();
            $table->string('user');
            $table->string('client');
            $table->string('client_type');
            $table->dateTime('date')->format('Y-m-d H:i:s');
            $table->integer('duration');
            $table->string('type_of_call');
            $table->integer('external_call_score');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicine_personal');
    }
}
