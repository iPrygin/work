<?php namespace App\Http\Controllers;

use App\Http\Resources\GalleryResource;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{

	// Коллекция галлерей
	public function index() {
		return (GalleryResource::collection(Gallery::orderBy('guid')->get()));
	}

	// Создание галлереи
	public function store(Request $request) {
		/** @var Gallery $gallery */
		$gallery = Gallery::create($request->all());
		if ($request->has('tags')) {
			$gallery->tags()->attach($request->input('tags'));
		}

		return (new GalleryResource($gallery));
	}

	// Получение галлереи
	public function show(Gallery $gallery) {
		return (new GalleryResource($gallery));
	}

	// Обновление галлереи
	public function update(Request $request, Gallery $gallery) {
		$gallery->update($request->all());
		if ($request->has('tags')) {
			if (is_array($request->input('tags'))) {
				$gallery->tags()->sync($request->input('tags'));
			} else {
				$gallery->tags()->detach();
			}
		}

		return (new GalleryResource($gallery));
	}

	// Удаление галлереи
	public function destroy(Gallery $gallery) {
		$gallery->delete();
	}

}