<?php namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class GalleryResource extends Resource
{

	public function toArray($request) {

		$tags = $this->tags->map(function($item) {
			$item = $item->toArray();
			unset($item['pivot']);
			return $item;
		});
		// Поля
		$fields = [
			'guid'        => $this->guid,
			'tags'        => $tags,
			'img'         => $this->img,
			'description' => $this->description
		];

		return $fields;

	}

}