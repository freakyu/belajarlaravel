<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()    //metod untuk buat tabel
    {
        //Buat struktur tabel create
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()      //Untuk menghapus apa yang sudah kita buat. caranya pake php artisan migrate:rollback
    {
        Schema::dropIfExists('users');
    }
}

//php artisan migrate:fresh adalah gabungan dari migrate dan rollback.