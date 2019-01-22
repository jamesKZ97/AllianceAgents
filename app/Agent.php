<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{

	protected $table = 'agents';
	protected $fillable = ['agent_id','name','logo','location','phone_num_1','phone_num_2','email','company_name','about_the_company'];
    public function photos()
    {
        return $this->hasMany('App\Photo');
    }
}
 

/* $table->increments('id');
            $table->string('agent_id');
            $table->string('name');
            $table->string('logo')->nullable();
            $table->string('location');
            $table->string('phone_num_1');
            $table->string('phone_num_2')->nullable();
            $table->string('email');
            $table->string('company_name');
            $table->string('about_the_company')->nullable(