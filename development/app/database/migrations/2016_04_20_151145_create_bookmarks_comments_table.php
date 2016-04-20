<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookmarksCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookmarks_comments', function (Blueprint $table) {
            $table->integer('bookmark_id')->unsigned()->nullable();
            $table->foreign('bookmark_id')
                ->references('id')->on('bookmarks')
                ->onDelete('cascade');
            $table->integer('comment_id')->unsigned()->nullable()->unique();
            $table->foreign('comment_id')
                ->references('id')->on('comments')
                ->onDelete('cascade');
            $table->index(['bookmark_id', 'comment_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookmarks_comments');
    }
}
