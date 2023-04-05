<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string("doctor_name");
            $table->string("degree");
            $table->foreignId('specialist_id')->constrained('specialists')->onDelete('cascade');
            $table->string("mobile");
            $table->string("chamber");
            $table->foreignId('district_id')->constrained('districts')->onDelete('cascade');
            $table->foreignId('division_id')->constrained('divisions')->onDelete('cascade');
            $table->foreignId('upzila_id')->constrained('upzilas')->onDelete('cascade');
            $table->string("appoinment")->nullable();
            $table->string("fee");
            $table->string('photo');
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
        Schema::dropIfExists('doctors');
    }
}
