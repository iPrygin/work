<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleryTagTable extends Migration
{
	protected $table = 'gallery_tag';

	public function up() {
		Schema::create($this->table, function(Blueprint $table) {
			$table
				->integer('gallery_guid')
				->index();
			$table
				->integer('tag_id')
				->index();

			$table->index(['gallery_guid', 'tag_id']);
		});
	}


	public function down() {
		Schema::dropIfExists($this->table);
	}
}
