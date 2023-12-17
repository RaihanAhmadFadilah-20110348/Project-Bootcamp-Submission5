<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateBooks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_books', function (Blueprint $table) {
            $table->id('id_book');
            $table->string('author');
            $table->string('nama_book');
            $table->timestamps();
        });

        DB::table('tb_books')->insert([
            'author' => 'Raihan S.I',
            'nama_book' => 'Software Enginering',
        ]);

        DB::table('tb_books')->insert([
            'author' => 'Dr. Raihan',
            'nama_book' => 'Laravel 8',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_books');
    }
}