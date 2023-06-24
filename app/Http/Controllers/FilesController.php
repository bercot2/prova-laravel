<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilesController extends Controller
{
    public function uploadDocument(Request $request)
    {
        if ($request->hasFile('nome-do-campo')) {
            $file = $request->file('nome-do-campo');
            $file->store('uploads');
        }

        return response()->json(['message' => 'Documento enviado com sucesso']);
    }

    public function shareDocument(Request $request)
    {
        $documentId = $request->input('document_id');
        $recipientEmail = $request->input('recipient_email');

        return response()->json(['message' => 'Documento compartilhado com sucesso']);
    }

    public function searchDocument(Request $request)
    {
        $searchTerm = $request->input('search_term');

        return response()->json(['message' => 'Documento encontrado']);
    }
}
