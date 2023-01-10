<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('group_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('state_code');
            $table->string('ppa');
            $table->string('batch');
            $table->string('stream');
            $table->boolean('penalty');
            $table->string('entry_date');
            $table->string('exit_date');
            $table->string('status');
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
