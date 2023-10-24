<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentRequest;
use App\Http\Resources\DocumentResource;
use App\Models\Document;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::all();

        return view('admin.documents.index', compact('documents'));
    }

    public function create()
    {
        return view('admin.documents.create');
    }

    public function store(DocumentRequest $request)
    {
        $request->validate([
            'name' => 'required|string|max:120',
            'description' => 'required|string|max:400',
        ]);

        Document::create($request->validated());

        return redirect()->route('admin.documents.index')->with('message', 'Document created!');
    }

    public function show(Document $document)
    {
    	if(!auth()->user()->can('CAN_VIEW_FILE')) {
        	abort(403);
        }
    
        return view('admin.documents.show', compact('document'));
    }

    public function update(DocumentRequest $request, Document $document)
    {
      $document->update($request->validated());

        return new DocumentResource($document);
    }

    public function destroy(Document $document)
    {
    	if(!auth()->user()->can('CAN_DELETE_FILE')) {
        	abort(403);
        }
    
        $document->delete();

        return redirect()->route('admin.documents.index')->with('message', 'Document deleted!');
    }
}

