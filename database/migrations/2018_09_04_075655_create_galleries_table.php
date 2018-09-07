<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleriesTable extends Migration
{
	protected $table = 'galleries';

	public function up() {
		Schema::create($this->table, function(Blueprint $table) {
			$table->increments('guid');

			$table
				->string('img')
				->comment('Url картинки');

			$table
				->string('description')
				->comment('Описание');
		});
	}


	public function down() {
		Schema::dropIfExists($this->table);
	}
}
