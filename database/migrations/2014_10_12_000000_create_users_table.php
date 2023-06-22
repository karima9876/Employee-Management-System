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
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('usertype', ['employee', 'owner'])->default('employee');
            $table->rememberToken();
            $table->timestamps();
        });


        DB::table('users')->insert(
            array(
                array(
                    'name' => 'owner',
                    'email' => 'owner@gmail.com',
                    'password' => '$2y$10$96EUB6HsVNFLgrtUqpBqOeR3Z9S2q2.TAnT5TyLcZ47YNMjqZYY7C',
                    'usertype' => 'owner',
                    'created_at' => '2023-06-20 01:42:51',
                    'updated_at' => '2023-06-20 01:42:51'
                )
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
