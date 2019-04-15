<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admission', function (Blueprint $table) {
            $table->increments('id');
            $table->string('student_fname');
            $table->string('student_lname');
            $table->date('date_of_birth');
            $table->boolean('gender');
            $table->string('place_of_birth');
            $table->string('class_req');
            $table->string('monthly_fees');
            $table->string('annual_charges');
            $table->string('student_pic_path');

            $table->string('father_name');
            $table->string('mother_name');
            $table->string('guardian')->nullable();
            $table->string('father_occupation');
            $table->string('father_cnic');
            $table->string('address');
            $table->string('phone')->nullable();
            $table->string('mobile');

            $table->dateTime('admission_date');
            $table->boolean('is_approved')->default(0);
            $table->boolean('is_deleted')->default(0);

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
        Schema::dropIfExists('admission');
    }
}
