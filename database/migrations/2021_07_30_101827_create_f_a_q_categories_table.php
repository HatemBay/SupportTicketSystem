<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFAQCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('f_a_q_categories', function (Blueprint $table) {
            $table->id();

            // $table->unsignedBigInteger('admin_id');

            $table->string('name');

            $table->timestamps();
        });

        // Schema::table('f_a_q_categories', function ($table) {
        //     $table->foreign('admin_id')
        //         ->references('id')
        //         ->on('admins')
        //         ->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('f_a_q_categories');
    }
}
