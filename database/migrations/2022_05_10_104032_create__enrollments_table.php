<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->integer('status')->default(2);
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('volunteer_id')->references('id')->on('users')
                ->onDelete('cascade');;

            $table->foreignId('user_id')->references('id')->on('users')
                ->onDelete('cascade');;

            $table->foreignId('opportunity_id')->references('id')->on('opportunities')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enrollments');
    }
};
