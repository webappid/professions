<?php
/**
 * @author Dyan Galih <dyan.galih@gmail.com>
 * @copyright 2018 WebAppId
 */
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessionsTable extends Migration
{
/**
 * Run the migrations.
 *
 * @return void
 */
    public function up()
    {
        Schema::create('professions', function (Blueprint $table) {
            $table->increments('id')
                ->comment('Table professions references');
            $table->integer('profession_category_id')
                ->unsigned()
                ->comment('relation to categories');
            $table->string('code')
                ->index()
                ->unique()
                ->comment('Professions code');
            $table->string('name')
                ->index()
                ->comment('Professions name');
            $table->string('description')
                ->index()
                ->comment('Professions description');
            $table->timestamps();

            $table->foreign('profession_category_id')
                ->references('id')
                ->on('profession_categories')
                ->onUpdate('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professions');
    }
}
