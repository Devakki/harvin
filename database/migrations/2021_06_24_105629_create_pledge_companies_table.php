<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePledgeCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pledge_companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pledge_id')->nullable()->index();
            $table->foreignId('company_id')->nullable()->index();
            $table->timestamps();
        });
        Schema::table('pledge', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pledge_companies');
    }
}
