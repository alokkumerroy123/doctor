<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpzilasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upzilas', function (Blueprint $table) {
            $table->id();
            $table->string('upzila_name');
            $table->foreignId('district_id')->constrained('districts')->onDelete('cascade');
            $table->foreignId('division_id')->constrained('divisions')->onDelete('cascade');
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
        Schema::dropIfExists('upzilas');
    }
}
