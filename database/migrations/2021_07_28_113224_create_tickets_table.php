<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {

            $table->id();

            // $table->unsignedBigInteger('customer_id');
            // $table->unsignedBigInteger('agent_id')->nullable();

            // $table->dropForeign('tickets_department_id_foreign');
            $table->unsignedBigInteger('department_id')->nullable();

            $table->unsignedBigInteger('priority_id')->nullable();

            $table->string('title');

            $table->string('description')->nullable();

            $table->enum('status', ['OPEN', 'CLOSED'])->default('OPEN');

            $table->enum('reply_status', ['CLIENT REPLIED', 'ANSWERED'])->default('ANSWERED');

            //$table->integer('reply_status');

            $table->timestamps();
        });
        Schema::table('tickets', function ($table) {
            // $table->foreign('customer_id')
            //     ->references('id')
            //     ->on('customers')
            //     ->onDelete('cascade');

            // $table->foreign('agent_id')
            //     ->references('id')
            //     ->on('customers')
            //     ->onDelete('setNull');

            $table->foreign('department_id')
                ->references('id')
                ->on('departments')
                ->onDelete('cascade');

            $table->foreign('priority_id')
                ->references('id')
                ->on('priorities')
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
        Schema::dropIfExists('tickets');
    }
}
