<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
	protected $table = 'news';

	public function up() {
		Schema::create($this->table, function(Blueprint $table) {
			$table->increments('id');

			$table
				->string('slug')
				->index()
				->unique()
				->comment('Строка идентификатор');

			$table
				->string('preview')
				->comment('Url для картинки-превью');

			$table
				->string('header')
				->comment('Заголовок');

			$table
				->string('content')
				->comment('Контент');

			$table->timestamps();
		});
	}


	public function down() {
		Schema::dropIfExists($this->table);
	}
}