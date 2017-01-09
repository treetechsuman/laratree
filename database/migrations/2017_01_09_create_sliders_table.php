<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up() {
		Schema::create('sliders', function (Blueprint $table) {
			$table->increments('id');
			$table->string('fdsf');
			$table->string('dsf');
			$table->string('df');
			$table->timestamps();
		});
	}
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function down() {
		Schema::drop('sliders');
	}
}