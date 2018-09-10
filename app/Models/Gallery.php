<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
	public $timestamps = false;
	protected $primaryKey = 'guid';

	protected $fillable = [
		'img',
		'description'
	];
	protected $casts = [
		'guid'        => 'integer',
		'img'         => 'string',
		'description' => 'string'
	];


	// Тэги
	public function tags() {
		return $this->belongsToMany(Tag::class, 'gallery_tag', 'gallery_guid', 'tag_id');
	}


	protected static function boot() {
		parent::boot();

		self::deleting(function(self $gallery) {
			$gallery->tags()->detach();
		});

	}
}