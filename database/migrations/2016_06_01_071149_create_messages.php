<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('sender', 128)->nullable();
            $table->string('receiver', 128)->nullable();
            $table->text('content')->nullable();
            $table->string('source', 50)->nullable();
            $table->string('external_id', 128)->nullable();
            $table->text('meta_info')->nullable();
            $table->boolean('is_sent')->default(false);
            $table->boolean('is_incoming');
            $table->timestamp('received_at')->nullable();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('changed_by')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('messages');
    }
}
