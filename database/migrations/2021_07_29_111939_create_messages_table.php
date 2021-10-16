<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('ticket_id');

            // $table->unsignedBigInteger('customer_id')->nullable();

            // $table->unsignedBigInteger('agent_id')->nullable();

            $table->text('body');

            $table->timestamps();
        });

        Schema::table('messages', function ($table) {
            $table->foreign('ticket_id')
                ->references('id')
                ->on('tickets')
                ->onDelete('cascade');

        //     $table->foreign('agent_id')
        //         ->references('id')
        //         ->on('agents')
        //         ->onDelete('cascade');

        //     $table->foreign('customer_id')
        //         ->references('id')
        //         ->on('customers')
        //         ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
