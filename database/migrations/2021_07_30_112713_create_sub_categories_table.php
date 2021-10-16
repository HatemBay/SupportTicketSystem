<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id();

            // $table->unsignedBigInteger('admin_id');

            $table->unsignedBigInteger('category_id')->nullable();

            $table->string('name');

            $table->timestamps();
        });

        Schema::table('sub_categories', function ($table) {
            // $table->foreign('admin_id')
            //     ->references('id')
            //     ->on('admins')
            //     ->onDelete('cascade');

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
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
        Schema::dropIfExists('sub_categories');
    }
}
