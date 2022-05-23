<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpportunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opportunities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description');
            $table->date('start');
            $table->date('finish');
            $table->integer('seats');
            $table->string('location');
            $table->enum('gender', ['male', 'female']);
            $table->unsignedBigInteger('user_id')->index('opportunities_user_id_foreign');
            $table->unsignedBigInteger('category_id');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->string('image')->nullable();
            $table->integer('duration')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opportunities');
    }
}
