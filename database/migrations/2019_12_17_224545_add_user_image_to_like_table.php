<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserImageToLikeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('like', function (Blueprint $table) {
            $table->unsignedBigInteger('like_User_ID')->nullable();
            $table->unsignedBigInteger('like_Image_ID')->nullable();
            $table->foreign('like_User_ID')->references('user_ID')->on('user')->onDelete('set null');
            $table->foreign('like_Image_ID')->references('image_ID')->on('image')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('like', function (Blueprint $table) {
            $table->dropForeign(['like_User_ID']);
            $table->dropForeign(['like_Image_ID']);

            $table->dropColumn('like_User_ID');
            $table->dropColumn('like_Image_ID');
        });
    }
}
