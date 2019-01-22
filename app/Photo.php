<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

		protected $table = 'photos';
		protected $fillable = [
			'agent_id',
			'photo'
		];
    public function Agent()
    {
        return $this->belongsTo('App\Agent');
    }
}

//protected $table = 'agents';
	//protected $fillable = ['agent_id','name','logo','location','phone_num_1','phone_num_2','email','company_name','about_the_company'];