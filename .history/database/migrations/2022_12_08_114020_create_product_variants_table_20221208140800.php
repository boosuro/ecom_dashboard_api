<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateProductVariantsTable.
 */
class CreateProductVariantsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_variants', function (Blueprint $table) {
			$table->increments('id');
			$table->string('variant_name');
			$table->string('variant_group_id');
			$table->timestamps();
			$table->foreign('variant_group_id')->references('id')->on('variantgroup');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_variants');
	}
}
