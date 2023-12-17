<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_user', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('nama_user');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('level');
            $table->timestamps();
        });

        DB::table('tb_user')->insert([
            'nama_user' => 'RaihanAhmadFadilah',
            'email' => 'raihan@gmail.com',
            'password' => 'raihan',
            'level' => 'admin',
        ]);

        DB::table('tb_user')->insert([
            'nama_user' => 'Ahmad',
            'email' => 'ahmad@gmail.com',
            'password' => 'ahmad',
            'level' => 'user',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_user');
    }
}