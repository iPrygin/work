<?php namespace App\Http\Controllers;

use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{

	/**
	 * Получение коллекции новостей
	 */
	public function index(Request $request) {
		return ( NewsResource::collection(News::orderBy('created_at', 'desc')
			// Фильтрация по дате создания с помощью флага get_created_date
			->when($request->has('get_created_date'), function($query) use ($request) {
				return $query->where('created_at', $request->input('get_created_date'));
			})
			// Фильтрация по заголовку с помощью флага get_header
			->when($request->has('get_header'), function($query) use ($request) {
				return $query->where('header', $request->input('get_header'));
			})->get()) );
	}

	/**
	 * Создание новости
	 */
	public function store(Request $request) {
		$request = $request->all();
		$news = News::create($request);

		return ( new NewsResource($news) );
	}

	/**
	 * Получение новости с помощью slug
	 *
	 * @param  string $slug
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function show($slug) {
		$news = News::whereSlug($slug)->firstOrFail();
		return ( new NewsResource($news) );
	}

	/**
	 * Обновление новости
	 *
	 * @param  string $slug
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function update(Request $request, $slug) {
		$news = News::whereSlug($slug)->firstOrFail();
		$news->update($request->all());

		return ( new NewsResource($news) );
	}

	/**
	 * Удаление новости
	 *
	 * @param  string $slug
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy($slug) {
		$news = News::whereSlug($slug)->firstOrFail();
		$news->delete();
	}

}