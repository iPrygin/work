<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

	public $timestamps = false;
	protected $fillable = [
		'name',
	];
	protected $casts = [
		'id'   => 'integer',
		'name' => 'string',
	];


	public function galleries() {
		return $this->belongsToMany(Gallery::class, 'gallery_tag', 'tag_id', 'gallery_guid');
	}


	protected static function boot() {
		parent::boot();

		self::deleting(function(self $tag) {
			$tag->galleries()->detach();
		});

	}
}