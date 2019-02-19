<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{

	protected $table = 'agents';
	protected $fillable = ['agent_id','name','logo','location','phone_num_1','phone_num_2','email','company_name','about_the_company','company_address','client_testimonial','year_of_exp','person_recommended','pos_of_person_recommended','personal_description','photo','quote'];
    public function photos()
    {
        return $this->hasMany('App\Photo');
    }
}
 

