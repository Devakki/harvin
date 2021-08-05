<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMetaSlugToPledgeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pledge', function (Blueprint $table) {
            $table->string("slug")->unique()->nullable()->after('title');
            $table->string("author_name")->nullable();
            $table->integer('reading_time')->nullable();
            $table->string("full_image")->nullable()->after('image');
            $table->string("meta_title")->nullable();
            $table->text("meta_keyword")->nullable();
            $table->text("meta_description")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pledge', function (Blueprint $table) {
            $table->dropColumn('meta_title');
            $table->dropColumn('meta_keyword');
            $table->dropColumn('meta_description');
            $table->dropColumn('slug');
            $table->dropColumn('author_name');
            $table->dropColumn('reading_time');
            $table->dropColumn('full_image');
        });
    }
}
