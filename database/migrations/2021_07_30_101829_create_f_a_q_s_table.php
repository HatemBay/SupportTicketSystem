<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFAQSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('f_a_q_s', function (Blueprint $table) {
            $table->id();

            // $table->unsignedBigInteger('admin_id');

            $table->unsignedBigInteger('f_a_q_category_id')->nullable();

            $table->string('question');

            $table->string('answer');

            $table->timestamps();
        });

        Schema::table('f_a_q_s', function ($table) {
        //     $table->foreign('admin_id')
        //         ->references('id')
        //         ->on('admins')
        //         ->onDelete('cascade');

            $table->foreign('f_a_q_category_id')
                ->references('id')
                ->on('f_a_q_categories')
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
        Schema::dropIfExists('f_a_q_s');
    }
}
