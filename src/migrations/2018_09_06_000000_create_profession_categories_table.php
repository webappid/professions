<?php
/**
 * @author Dyan Galih <dyan.galih@gmail.com>
 * @copyright 2018 WebAppId
 */
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessionCategoriesTable extends Migration
{
/**
 * Run the migrations.
 *
 * @return void
 */
    public function up()
    {
        Schema::create('profession_categories', function (Blueprint $table) {
            $table->increments('id')
                ->comment('Table profession categories references');
            $table->string('code')
                ->index()
                ->unique()
                ->comment('Profession categories code');
            $table->string('name')
                ->index()
                ->comment('Profession categories name');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profession_categories');
    }
}
