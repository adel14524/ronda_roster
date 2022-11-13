<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsRosterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rosters', function (Blueprint $table) {
            $table->string('pindaan')->nullable()->after('id');
            $table->string('position')->nullable()->after('pindaan');
            $table->timestamp('tarikh_mula')->nullable()->after('position');
            $table->timestamp('tarikh_habis')->nullable()->after('tarikh_mula');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rosters', function (Blueprint $table) {
            //
            $table->dropColumn('pindaan');
            $table->dropColumn('position');
            $table->dropColumn('tarikh_mula');
            $table->dropColumn('tarikh_habis');
        });
    }
}
