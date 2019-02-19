<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('agent_id');
            $table->string('name');
            $table->string('logo')->nullable();
            $table->string('location');
            $table->string('phone_num_1');
            $table->string('phone_num_2')->nullable();
            $table->string('email');
            $table->string('company_name');
            $table->text('about_the_company')->nullable();
            $table->string('company_address');
            $table->text('client_testimonial');
            $table->integer('year_of_exp');
            $table->string('person_recommended');
            $table->string('pos_of_person_recommended');
            $table->text('personal_description');
        
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
        Schema::dropIfExists('agents');
    }
}
