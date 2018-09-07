<?php namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class NewsResource extends Resource
{

	public function toArray($request) {

		// Поля
		$fields = [
			'id'         => $this->id,
			'slug'       => $this->slug,
			'preview'    => $this->preview,
			'created_at' => $this->created_at,
			'header'     => $this->header,
			'content'    => $this->content,
		];

		return $fields;

	}

}