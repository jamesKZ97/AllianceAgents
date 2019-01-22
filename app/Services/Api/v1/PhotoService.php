<?php

namespace App\Services\Api\v1;

use App\Photo;

class PhotoService extends TransformerService{

	public function transform($photo){
		$payload = [
			'id' => $photo->id,
			'agent_id' => $photo->agent_id,
			'photo' => $photo->photo
		];

		return $payload;
	}

	// public function getPhotos(){
	// 	$photo = current_user()->photos()->get();
	// 	return $this->transformCollection($photo->all());
	// }
}

