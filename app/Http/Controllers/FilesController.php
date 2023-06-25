<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use App\Models\DocumentoCompartilhado;
use App\Models\AcoesDocumentosCompartilhados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    public function uploadDocument(Request $request)
    {
        if (request()->isMethod('POST')){
            $user_id = Auth::user()->id;

            $uploadedFile = $request->file('file');

            $filename = $uploadedFile->getClientOriginalName();

            $file = File::where('user_id', $user_id)
                        ->where('filename', $filename)
                        ->first();

            if ($file) {
                $uploadedFile->storeAs('public/' . $user_id, $filename);
                $file->update();
            } else {
                $path = $uploadedFile->storeAs('public/'.$user_id, $uploadedFile->getClientOriginalName());
                $file = new File();
                $file->filename = $filename;
                $file->path = dirname($path);
                $file->user_id = $user_id;
                $file->save();
            }

            return view('portal.uploadSuccess')->with('delay', 3);
        } else if (request()->isMethod('GET')){
            return view('portal.upload');
        }
    }

    public function shareDocument(Request $request)
    {
        if (request()->isMethod('GET')){
            $user = auth()->user();
        
            $documents = File::where('user_id', $user->id)->get();
            
            $otherUsers = User::where('id', '!=', $user->id)->get();

            return view('portal.share', compact('documents', 'otherUsers'));
        } else if (request()->isMethod('POST')) {

            $document_id = $request->input('document');
            $user_id = $request->input('user');
            $list_actions = $request->input('action');

            $share_document = DocumentoCompartilhado::firstOrCreate([
                'documento_id' => $document_id,
                'user_id' => $user_id,
            ]);

            $share_document_id = $share_document->id;

            AcoesDocumentosCompartilhados::where('documento_compartilhado_id', $share_document_id)->delete();

            foreach ($list_actions as $action) {
                $acoes_documentos_compartilhados = new AcoesDocumentosCompartilhados();
                $acoes_documentos_compartilhados->documento_compartilhado_id = $share_document_id;
                $acoes_documentos_compartilhados->acao = $action;
                $acoes_documentos_compartilhados->save();
            }

            return view('portal.shareSuccess')->with('delay', 3);
        }
    }

    public function searchDocument(Request $request)
    {
        if (request()->isMethod('GET')){
            $user_id = auth()->id();

            $files = File::where('user_id', $user_id)->get(['id', 'filename', 'path', 'user_id']);

            $storageFiles = [];

            foreach ($files as $file) {

                $user = $user = User::select('name', 'email')->where('id', $file->user_id)->first();

                $storageFiles[] = [
                    'id' => $file->id,
                    'name_user' => $user->name,
                    'email_user' => $user->email,
                    'filename' => $file->filename,
                    'url' => $file->path
                ];
            }

            return view('portal.search', ['files' => $storageFiles]);
        }
    }

    public function download($file)
    {
        $user_id = auth()->id();

        $filePath = storage_path('app/public/' . $user_id . '/' . $file);

        if (file_exists($filePath)) {
            return response()->download($filePath);
        }

        abort(404);
    }

}
