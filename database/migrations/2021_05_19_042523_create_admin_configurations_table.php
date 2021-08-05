<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_configurations', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->string("value")->nullable();
            $table->timestamps();
        });

        $insertArr = [
            [ "name" => "receive_notification_emails", "value" => 0],
        ];

        DB::table('admin_configurations')->insert($insertArr);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_configurations');
    }
}
