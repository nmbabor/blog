<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('link',50)->unique();
            $table->string('feature_photo')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->longText('description');
            $table->integer('fk_category_id')->unsigned();
            $table->integer('fk_sub_category_id')->unsigned();
            $table->integer('approved_by')->unsigned()->nullable();
            $table->integer('visiting_count')->nullable();
            $table->string('tags')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('is_approved')->default(0);
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned()->nullable();
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
        Schema::dropIfExists('posts');
    }
}
