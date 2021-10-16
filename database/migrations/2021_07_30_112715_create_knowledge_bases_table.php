<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKnowledgeBasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('knowledge_bases', function (Blueprint $table) {
            $table->id();

            // $table->unsignedBigInteger('admin_id');

            $table->unsignedBigInteger('sub_category_id')->nullable();

            $table->string('title');

            $table->string('status');

            $table->text('description');

            $table->timestamps();
        });

        Schema::table('knowledge_bases', function ($table) {
            // $table->foreign('admin_id')
            //     ->references('id')
            //     ->on('admins')
            //     ->onDelete('cascade');
            $table->foreign('sub_category_id')
                ->references('id')
                ->on('sub_categories')
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
        Schema::dropIfExists('knowledge_bases');
    }
}
