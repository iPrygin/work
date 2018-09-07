<?php namespace App\Http\Controllers;

use App\Http\Resources\TagResource;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

	public function index() {
		return (TagResource::collection(Tag::orderBy('name')->get()));
	}

	public function store(Request $request) {
		$tag = Tag::create($request->all());

		return (new TagResource($tag));
	}

	public function show(Tag $tag) {
		return (new TagResource($tag));
	}

	public function update(Request $request, Tag $tag) {
		$tag->update($request->all());

		return (new TagResource($tag));
	}

	public function destroy(Tag $tag) {
		$tag->delete();
	}

}