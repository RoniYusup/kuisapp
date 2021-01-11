<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMatakuliahDosen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matakuliah_dosen', function (Blueprint $table) {
            $table->integer('id_dosen')->unsigned()->index();
            $table->integer('id_matakuliah')->unsigned()->index();
            $table->timestamps();

        //set PK
            $table->primary(['id_dosen', 'id_matakuliah']);
        //set FK hobi 
            $table->foreign('id_dosen')
                  ->references('id')
                  ->on('dosen')
                  ->onDelelet('cascade')
                  ->onUpdate('cascade');
        //set PK hobi
            $table->foreign('id_matakuliah')
                  ->references('id')
                  ->on('matakuliah')
                  ->onDelelet('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matakuliah_dosen');
    }
}
