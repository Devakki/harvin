<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->id();
            $table->string("slug")->unique()->nullable();
            $table->string("name")->nullable();
            $table->string("image")->nullable();
            $table->string("industry")->nullable();
            $table->string("state")->nullable();
            $table->string("city")->nullable();
            $table->string("weblink")->nullable();
            $table->string("careerlink")->nullable();
            $table->text("summery")->nullable();
            $table->enum('status', array('0','1'))->default('0');
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
        Schema::dropIfExists('company');
    }
}
