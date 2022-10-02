<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_id')->unique();
            $table->unsignedBigInteger('campus_id')->nullable();
            $table->foreign('campus_id')->references('id')->on('campus')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('password');
            $table->string('fname');
            $table->string('lname');
            $table->string('email');
            $table->string('phone_num');
            $table->date('dob');
            $table->string('passport');
            $table->string('ikad');
            $table->text('add_id');
            $table->text('add_my');
            $table->string('cur_living');
            $table->string('status');

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
        Schema::dropIfExists('students');
    }
}