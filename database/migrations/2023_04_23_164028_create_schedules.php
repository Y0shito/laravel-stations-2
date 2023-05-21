<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSchedules extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id()->comment('ID');
            $table->foreignId('movie_id')->constrained()->comment('列');
            $table->dateTime('start_time')->comment('上映開始時刻');
            $table->dateTime('end_time')->comment('上映終了時刻');
            $table->timestamps();
        });

        DB::statement('ALTER TABLE schedules MODIFY created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT "登録日時", MODIFY updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT "更新日時"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->dropForeign(['movie_id']);
        });
        Schema::dropIfExists('schedules');
    }
}
