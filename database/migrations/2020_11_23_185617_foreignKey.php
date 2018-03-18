<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {

            $table->foreign('created_by')->references('id')->on('users');
            
        });
        Schema::table('sub_categories', function (Blueprint $table) {

            $table->foreign('fk_category_id')->references('id')->on('categories');
            $table->foreign('created_by')->references('id')->on('users');

        });
        Schema::table('posts', function (Blueprint $table) {

            $table->foreign('fk_sub_category_id')->references('id')->on('sub_categories');
            $table->foreign('fk_category_id')->references('id')->on('categories');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
            $table->foreign('approved_by')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }



}
