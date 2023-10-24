<?php

namespace App\Livewire\Document;

use App\Models\Document;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class DocumentCreate extends Component
{
    use WithFileUploads;

    #[Rule('required|string|max:50')]
    public $name = '';

    #[Rule('nullable|string|max:500')]
    public $description = '';

    #[Rule('nullable|string|min:6')]
    public $password = null;

    #[Rule('required|mimes:png,jpeg,jpg,webp,docs,docx,xls,xml,pdf,svg|max:6000')]
    public $document;

    /**
     * @throws FileIsTooBig
     * @throws FileDoesNotExist
     */
    public function save()
    {
        $validated = $this->validate();

        $document = Document::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'secured_at' => !empty($validated['password']) ? now() : null,
            'password' => !empty($validated['password']) ? \Hash::make($validated['password']) : null,
        ]);
        $document->addMedia($this->document->getRealPath())
            ->usingName($this->document->getClientOriginalName())
            ->toMediaCollection('documents');

        return redirect()->route('admin.documents.create')->with('message', 'Document saved!');
    }

    public function render()
    {
        return view('livewire.document.document-create');
    }
}
