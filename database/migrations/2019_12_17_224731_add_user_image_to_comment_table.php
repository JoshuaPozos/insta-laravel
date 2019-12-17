<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserImageToCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comment', function (Blueprint $table) {
            $table->unsignedBigInteger('comment_User_ID')->nullable();
            $table->unsignedBigInteger('comment_Image_ID')->nullable();
            $table->foreign('comment_User_ID')->references('user_ID')->on('user')->onDelete('set null');
            $table->foreign('comment_Image_ID')->references('image_ID')->on('image')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comment', function (Blueprint $table) {
            $table->dropForeign(['comment_User_ID']);
            $table->dropForeign(['comment_Image_ID']);

            $table->dropColumn('comment_User_ID');
            $table->dropColumn('comment_Image_ID');
        });
    }
}
