<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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

            $table->bigIncrements('id');
            //$table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('last_user_id');
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->text('content');
            $table->string('description_img')->nullable();
            $table->string('description_txt')->nullable();
            $table->boolean('is_original')->default(false);
            $table->boolean('is_draft')->default(false);
            $table->integer('comment_count')->unsigned()->default(0)->index();
            $table->integer('view_count')->unsigned()->default(0)->index();
            $table->timestamp('published_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('tags', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('tag')->unique();
            $table->string('title');
            $table->string('description_txt');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {

            $table->bigIncrements('id');
            //$table->unsignedBigInteger('parent_id')->default(0);
            $table->string('name');
            $table->string('path');
            $table->string('description_img')->nullable();
            $table->string('description_txt')->nullable();
            $table->timestamps();
        });

        Schema::create('post_has_tags', function (Blueprint $table) {

            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('tag_id');
            
            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onDelete('cascade');

            $table->foreign('tag_id')
                ->references('id')
                ->on('tags')
                ->onDelete('cascade');

            $table->primary(['tag_id', 'post_id'], 'post_has_tags_tag_id_post_id_primary');
        });

        Schema::create('category_has_posts', function (Blueprint $table) {

            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('post_id');
            
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');

            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onDelete('cascade');

            $table->primary(['category_id', 'post_id'], 'category_id_has_post_id_post_id_category_id_primary');
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
        Schema::dropIfExists('tags');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('post_has_tags');
    }
}
