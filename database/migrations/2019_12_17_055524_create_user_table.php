<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->bigIncrements('user_ID');
            $table->string('user_Role', 255);
            $table->string('user_Name', 255);
            $table->string('user_Surname', 255);
            $table->string('user_Nick', 255);
            $table->string('user_Email', 255);
            $table->string('user_Password', 255);
            $table->string('user_Image', 255);
            $table->timestamp('user_CreatedAt')->useCurrent();
            $table->timestamp('user_UpdatedAt')->useCurrent();
            $table->string('user_Remember_token', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
