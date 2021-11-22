<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailingAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mailing_addresses', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('office_first_name');
            $table->string('office_last_name');
            $table->string('office_email');
            $table->string('office_phone');
            $table->string('office_address_1');
            $table->string('office_address_2');
            $table->string('office_zip_code');
            $table->string('office_city');
            $table->string('office_state');
            $table->string('office_country');
            $table->string('residence_first_name');
            $table->string('residence_last_name');
            $table->string('residence_email');
            $table->string('residence_phone');
            $table->string('residence_address_1');
            $table->string('residence_address_2');
            $table->string('residence_zip_code');
            $table->string('residence_city');
            $table->string('residence_state');
            $table->string('residence_country');
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
        Schema::dropIfExists('mailing_addresses');
    }
}
