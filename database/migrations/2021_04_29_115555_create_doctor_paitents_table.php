<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorPaitentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_paitents', function (Blueprint $table) {
            $table->id();
            $table->integer('doctor_id');
            $table->integer('paitent_id');
            $table->integer('status')->comment('1=>active')->default(1);
            $table->integer('is_deleted')->commnet('1=>deleted')->default(0);
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
        Schema::dropIfExists('doctor_paitents');
    }
}
