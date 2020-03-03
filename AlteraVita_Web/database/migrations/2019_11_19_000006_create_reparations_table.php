<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReparationsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'reparations';

    /**
     * Run the migrations.
     * @table reparations
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_reparation');
            $table->integer('id_utilisateur')->unsigned();
            $table->integer('id_produit')->unsigned();
            $table->tinyInteger('estvalidee')->default('0');
            $table->decimal('prix', 13, 2);
            $table->dateTime('date');

            $table->index(["id_produit"], 'FK_REPARATIONS_PRODUITS');

            $table->index(["id_utilisateur"], 'FK_REPARATIONS_UTILISATEURS');


            $table->foreign('id_produit', 'FK_REPARATIONS_PRODUITS')
                ->references('id_produit')->on('produits')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('id_utilisateur', 'FK_REPARATIONS_UTILISATEURS')
                ->references('id_utilisateur')->on('utilisateurs')
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
