<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->id('id_rapat');
            $table->integer('id_opt');
            $table->integer('maker')->default(0);
            $table->char('kode_rapat', 10);
            $table->string('nama_kegiatan');
            $table->date('tanggal');
            $table->time('waktu');
            $table->string('tempat');
            $table->string('pimpinan_rapat');
            $table->string('notulis');
            $table->string('status');
            $table->string('notulen')->default('-');
            $table->string('kesimpulan')->default('-');
            $table->time('started_at')->nullable($value = true);
            $table->time('ended_at')->nullable($value = true);
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
        Schema::dropIfExists('meetings');
    }
}
