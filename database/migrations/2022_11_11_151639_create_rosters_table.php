<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRostersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rosters', function (Blueprint $table) {
            $table->id();
            $table->string('title',512)->nullable();
            $table->string('leave',512)->nullable();
            $table->string('leave_sick',512)->nullable();
            $table->string('control_room',512)->nullable();
            $table->string('sv_mpv',512)->nullable();
            $table->string('departure_sv_mpv',512)->nullable();
            $table->string('other_task',1024)->nullable();
            $table->string('departure',512)->nullable();
            $table->string('zone_AB',1024)->nullable();
            $table->string('zone_CD',1024)->nullable();
            $table->string('zone_EF',1024)->nullable();
            $table->string('depot_unit',512)->nullable();
            $table->string('remarks',512)->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('rosters');
    }
}
