<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('company_id');
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->text('roles');
            $table->text('requirements');
            $table->integer('minimum_salary');
            $table->integer('maximum_salary');
            $table->integer('category_id');
            $table->string('position');
            $table->string('address');
            $table->string('city');
            $table->string('province');
            $table->string('type');
            $table->string('status');
            $table->date('last_date');
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
        Schema::dropIfExists('jobs');
    }
}
