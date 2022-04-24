<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCBInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currency', function (Blueprint $table) {
            $table->id();
            $table->string('valuteID');
            $table->string('numCode');
            $table->string('сharCode');
            $table->integer('nominal');
            $table->string('name');
            $table->decimal('value',8,5);
            $table->integer('from')->nullable();
            $table->date('when');
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
        Schema::dropIfExists('c_b_infos');
    }
}
