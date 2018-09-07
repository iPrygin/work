<?php namespace App\Models;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
	use Sluggable;

	/**
	 * @return array
	 */
	public function sluggable()
	{
		return [
			'slug'
		];
	}

	public function getCreatedAtAttribute($date)
	{
		return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
	}


	protected $fillable = [
		'slug',
		'preview',
		'header',
		'content'
	];
	protected $casts = [
		'id'         => 'int',
		'slug'       => 'string',
		'preview'    => 'string',
		'created_at' => 'date',
		'header'     => 'string',
		'content'    => 'string'
	];

}