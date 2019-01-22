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
			'photos' => $this->photoService->transformCollection($agent->photos)
		];

		return $payload;
	}
}


// function __construct(AgentsService $agentsService){
//             $this->agentsService = $agentsService;
//     }

//     public function index(Request $request)
//     {
//         if ($request->has('agent_id')) {
//             $agentID = $request->agent_id;
//         }
    
//         $agent = Agent::where('agent_id',$agentID)->get();
//         // dd($agent);

//         return $this->agentsService->transformCollection($agent);
//     