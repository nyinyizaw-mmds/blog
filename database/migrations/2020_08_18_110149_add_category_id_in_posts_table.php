<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdInPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            if (!Schema::hasColumn('posts', 'category_id')) {
                $table->unsignedBigInteger('category_id')->after('content');
                $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            } 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            if(Schema::hasColumn('postss','category_id')){
               $table->dropColumn('category_id'); 
            }
        });
    }
}
