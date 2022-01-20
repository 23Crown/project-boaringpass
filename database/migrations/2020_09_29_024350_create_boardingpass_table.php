<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardingpassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boardingpass', function (Blueprint $table) {
            $table->bigIncrements('id_bp');
            $table->string('nama_mapel');
            $table->string('kode_mapel',10)->unique();
            $table->string('nama_pengajar');
            $table->char('nip',10)->unique();
            $table->char('kode_guru',6)->unique();
            $table->string('nama_siswa');
            $table->char('nisn',10)->unique();
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
        Schema::dropIfExists('boardingpass');
    }
}
