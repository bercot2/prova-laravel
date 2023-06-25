<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcoesDocumentosCompartilhados extends Model
{
    protected $table = 'acoes_documentos_compartilhados';
    public $timestamps = false;

    protected $fillable = [
        'documento_compartilhado_id',
        'acao',
    ];

    public function documentoCompartilhado()
    {
        return $this->belongsTo(DocumentoCompartilhado::class, 'documento_compartilhado_id');
    }
}
