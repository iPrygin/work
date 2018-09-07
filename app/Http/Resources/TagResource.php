<?php namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class TagResource extends Resource
{

	public function toArray($request) {

		// Поля
		$fields = [
			'id'   => $this->id,
			'name' => $this->name,
		];

		return $fields;

	}

}