<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('employee_id')->default('');
            $table->string('first_name')->default('');
            $table->string('last_name')->default('');
            $table->enum('gender', ['Male','Female']);
            $table->string('nickname')->default('');
            $table->date('birthdate');
            $table->string('address_line')->default('');
            $table->string('address_city')->default('');
            $table->string('address_postcode')->default('');
            $table->string('address_province')->default('');
            $table->string('address_country')->default('');
            $table->string('telephone_number')->default('');
            $table->string('mobile_number')->default('');
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
        Schema::dropIfExists('profiles');
    }
}
