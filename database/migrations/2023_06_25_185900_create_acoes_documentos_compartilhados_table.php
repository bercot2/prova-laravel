<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcoesDocumentosCompartilhadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acoes_documentos_compartilhados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('documento_compartilhado_id');
            $table->string('acao');

            $table->foreign('documento_compartilhado_id', 'fk_acoes_doc_comp_doc_comp_id')->references('id')->on('documentos_compartilhados')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acoes_documentos_compartilhados');
    }
}
