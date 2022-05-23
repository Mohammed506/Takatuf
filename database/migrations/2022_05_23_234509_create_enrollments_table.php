<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrollmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('status')->default(2);
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('volunteer_id')->index('enrollments_volunteer_id_foreign');
            $table->unsignedBigInteger('user_id')->index('enrollments_user_id_foreign');
            $table->unsignedBigInteger('opportunity_id')->index('enrollments_opportunity_id_foreign');
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
}
