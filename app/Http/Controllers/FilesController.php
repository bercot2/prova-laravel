<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FilesController extends Controller
{
    public function uploadDocument(Request $request)
    {
        if (request()->isMethod('POST')){
            
            $user_id = Auth::user()->id;

            $uploadedFile = $request->file('file');

            $path = 'storage/'.$uploadedFile->storeAs('public/'.$user_id, $uploadedFile->getClientOriginalName());

            // Crie um novo registro de arquivo no banco de dados
            $file = new File();
            $file->filename = $uploadedFile->getClientOriginalName();
            $file->path = $path;

            // Atribua o ID do usuário atual como chave estrangeira
            $file->user_id = $user_id;

            // Salve o arquivo no banco de dados
            $file->save();

            return response()->json(['message' => 'Documento enviado com sucesso']);
        } else if (request()->isMethod('GET')){
            return view('portal.upload');
        }
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
