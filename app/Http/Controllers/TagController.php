<?php namespace App\Http\Controllers;

use App\Http\Resources\TagResource;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

	/**
	 * Получение коллекции тэгов
	 */
	public function index() {
		return (TagResource::collection(Tag::orderBy('name')->get()));
	}

	/**
	 * Создание тэга
	 */
	public function store(Request $request) {
		$tag = Tag::create($request->all());

		return (new TagResource($tag));
	}

	/**
	 * Получение тэга
	 */
	public function show(Tag $tag) {
		return (new TagResource($tag));
	}

	/**
	 * Обновление тэга
	 */
	public function update(Request $request, Tag $tag) {
		$tag->update($request->all());

		return (new TagResource($tag));
	}

	/**
	 * Удаление тэга
	 */
	public function destroy(Tag $tag) {
		$tag->delete();
	}

}