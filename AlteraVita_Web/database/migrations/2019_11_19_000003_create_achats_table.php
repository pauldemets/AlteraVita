<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAchatsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'achats';

    /**
     * Run the migrations.
     * @table achats
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_achat');
            $table->integer('id_produit')->unsigned();
            $table->integer('id_utilisateur')->unsigned();
            $table->string('libelle');
            $table->dateTime('date');
            $table->decimal('prix', 13, 2);

            $table->index(["id_produit"], 'FK_ACHATS_PRODUITS');

            $table->index(["id_utilisateur"], 'FK_ACHATS_UTILISATEURS');


            $table->foreign('id_produit', 'FK_ACHATS_PRODUITS')
                ->references('id_produit')->on('produits')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('id_utilisateur', 'FK_ACHATS_UTILISATEURS')
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
