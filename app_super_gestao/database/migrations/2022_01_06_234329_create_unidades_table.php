<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidade', 5);
            $table->string('descricao', 30);
            $table->timestamps();
        });

        Schema::table('produtos', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });

        Schema::table('produtos_detalhes', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()


    {

        Schema::table('produtos_detalhes', function (Blueprint $table) {

            $table->dropForeignKey('produtos_detalhes_unidade_id_foreign'); //[table]_[coluna]
            
            $table->dropColumn('unidade_id'); 
        });


        
        Schema::table('produtos', function (Blueprint $table) {

            $table->dropForeignKey('produtos_unidade_id_foreign'); //[table]_[coluna]
            
            $table->dropColumn('unidade_id'); 
        });


        Schema::dropIfExists('unidades');
    }
}
