<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
	protected $table = 'tags';

	public function up() {
		Schema::create($this->table, function(Blueprint $table) {
			$table->increments('id');

			$table
				->string('name')
				->index()
				->comment('Название тэга');

		});
	}


	public function down() {
		Schema::dropIfExists($this->table);
	}
}
