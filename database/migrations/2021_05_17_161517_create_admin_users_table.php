<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateAdminUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_users', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->string("email")->unique();
            $table->string('password');            
            $table->boolean('is_super')->default(0);
            $table->timestamps();
        });

        $insertArr = [
            [ "email" => "admin@greenplaces.com", "password" => \Hash::make("12345678"), "is_super" => 1],
        ];

        DB::table('admin_users')->insert($insertArr);
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_users');
    }
}
