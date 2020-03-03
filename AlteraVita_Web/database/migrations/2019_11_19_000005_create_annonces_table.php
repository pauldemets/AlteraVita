<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnoncesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'annonces';

    /**
     * Run the migrations.
     * @table annonces
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_annonce');
            $table->integer('id_produit')->unsigned();
            $table->integer('id_utilisateur')->unsigned();
            $table->dateTime('date');
            $table->string('description');
            $table->string('type_annonce', 128);
            $table->decimal('prix', 13, 2)->nullable()->default(null);

            $table->index(["id_utilisateur"], 'FK_ANNONCES_UTILISATEURS');

            $table->index(["id_produit"], 'FK_ANNONCES_PRODUITS');


            $table->foreign('id_produit', 'FK_ANNONCES_PRODUITS')
                ->references('id_produit')->on('produits')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('id_utilisateur', 'FK_ANNONCES_UTILISATEURS')
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
