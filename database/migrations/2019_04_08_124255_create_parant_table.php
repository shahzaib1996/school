<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parant', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('guardian')->nullable();
            $table->string('father_occupation');
            $table->string('father_cnic');
            $table->string('address');
            $table->string('phone')->nullable();
            $table->string('mobile');

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
        Schema::dropIfExists('parant');
    }
}
