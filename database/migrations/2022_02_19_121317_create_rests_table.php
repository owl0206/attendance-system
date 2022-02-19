<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rests', function (Blueprint $table) {
            $table->id()->nullable(false);
            $table->unsignedBigInteger('attendance_id')->nullable(false);
            $table->foreign('attendance_id')->references('id')->on('attendances')->onDelete('cascade');
            $table->date('date')->nullable(false);
            $table->time('rest_in');
            $table->time('rest_out');
            $table->timestamp('created_at')->useCurrent()->nullable();
            $table->timestamp('update_at')->useCurrent()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rests');
    }
}
