<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduitsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'produits';

    /**
     * Run the migrations.
     * @table produits
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_produit');
            $table->integer('id_type')->unsigned();
            $table->string('nom');
            $table->string('description');
            $table->string('etat');
            $table->string('marque')->nullable()->default(null);
            $table->string('annee')->nullable()->default(null);

            $table->index(["id_type"], 'FK_PRODUITS_TYPES');


            $table->foreign('id_type', 'FK_PRODUITS_TYPES')
                ->references('id_type')->on('types')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
