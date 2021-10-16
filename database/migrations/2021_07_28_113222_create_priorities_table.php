<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrioritiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('priorities', function (Blueprint $table) {
            $table->id();

            // $table->unsignedBigInteger('admin_id');

            // $table->unsignedBigInteger('agent_id');

            $table->string('name');

            $table->string('bg_color');

            $table->string('text_color');

            $table->timestamps();
        });

        Schema::table('priorities', function ($table) {
            // $table->foreign('admin_id')
            //     ->references('id')
            //     ->on('admins')
            //     ->onDelete('cascade');

            // $table->foreign('agent_id')
            //     ->references('id')
            //     ->on('agents')
            //     ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('priorities');
    }
}
