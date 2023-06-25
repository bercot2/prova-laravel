<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentoCompartilhado extends Model
{
    protected $table = 'documentos_compartilhados';

    public $timestamps = false;

    protected $fillable = [
        'documento_id',
        'user_id',
    ];

    public function documento()
    {
        return $this->belongsTo(Files::class, 'documento_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
