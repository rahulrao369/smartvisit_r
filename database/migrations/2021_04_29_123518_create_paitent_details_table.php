<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaitentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paitent_details', function (Blueprint $table) {
            $table->id();
            $table->integer('paitent_id');
            $table->string('address');
            $table->string('city');
            $table->string('zip_code');
            $table->string('state');
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
        Schema::dropIfExists('paitent_details');
    }
}
