<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('cname');
            $table->string('slug');
            $table->string('address');
            $table->string('street');
            $table->string('housenumber');
            $table->string('postalcode');
            $table->string('city');
            $table->string('province');
            $table->string('phone');
            $table->string('email');
            $table->string('website');
            $table->string('logo');
            $table->string('cover_photo');
            $table->string('slogan');
            $table->string('description');
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
        Schema::dropIfExists('companies');
    }
}
