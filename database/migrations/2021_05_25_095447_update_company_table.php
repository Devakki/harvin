<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company', function (Blueprint $table) {
            $table->double("tone_offset")->nullable()->after('summery');
            $table->string("company_level")->nullable()->after('summery');
            $table->integer("car_compair")->nullable()->after('summery');
            $table->dropColumn('city');
            $table->dropColumn('state');
            $table->dropColumn('industry');
            $table->foreignId('city_id')->nullable()->index()->after('slug');
            $table->foreignId('state_id')->nullable()->index()->after('slug');
            $table->foreignId('industry_id')->nullable()->index()->after('slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company', function (Blueprint $table) {
            $table->dropColumn("tone_offset");
            $table->dropColumn("company_level");
            $table->dropColumn("car_compair");
            $table->string('city');
            $table->string('state');
            $table->string('industry');
            $table->dropColumn("city_id");
            $table->dropColumn("state_id");
            $table->dropColumn("industry_id");
        });
    }
}
