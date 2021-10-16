<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCannedMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('canned_messages', function (Blueprint $table) {
            $table->id();

            // $table->unsignedBigInteger('admin_id')->nullable();

            // $table->unsignedBigInteger('agent_id')->nullable();

            $table->string('title');

            $table->text('body');

            $table->text('status');

            $table->timestamps();
        });

        // Schema::table('canned_messages', function ($table) {
        //     $table->foreign('admin_id')
        //         ->references('id')
        //         ->on('admins')
        //         ->onDelete('cascade');

        //     $table->foreign('agent_id')
        //         ->references('id')
        //         ->on('agents')
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
        Schema::dropIfExists('canned_messages');
    }
}
