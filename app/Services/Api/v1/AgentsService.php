<?php

namespace App\Services\Api\v1;

use App\Agent;
use App\Photo;

class AgentsService extends TransformerService{


  protected $photoService;

  function __construct(PhotoService $photoService){
        $this->photoService = $photoService;
  }


	public function transform($agent){

		// $photos = Photo::where('agent_id',$agent->agent_id)->get();
		// $agent->photos = ($this->photoService->transformCollection($photos));

		// dd($agent->photos);
		$payload = [
			'id' => $agent->id,
			'agent_id' => $agent->agent_id,
			'name' => $agent->name,
			'logo' => $agent->logo,
			'location' => $agent->location,
			'phone_num_1' => $agent->phone_num_1,
			'phone_num_2' => $agent->phone_num_2,
			'email' => $agent->email,
			'company_name' => $agent->company_name,
			'about_the_company' => $agent->about_the_company,
			'company_address' => $agent->company_address,
			'client_testimonial' => $agent->client_testimonial,
			'year_of_exp' => $agent->year_of_exp,
			'person_recommended' => $agent->person_recommended,
			'pos_of_person_recommended' => $agent->pos_of_person_recommended,
			'personal_description' => $agent->personal_description,
			'quote' => $agent->quote,
			'photos' => $this->photoService->transformCollection($agent->photos),
			'photo' => $agent->photo
		];

		return $payload;
	}
}


