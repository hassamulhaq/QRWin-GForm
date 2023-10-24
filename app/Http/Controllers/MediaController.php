<?php

namespace App\Http\Controllers;


use App\Models\Document;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaController extends Controller
{
    public function secureDownload(Request $request, Media $mediaItem)
    {
        $request->validate([
            'module_name' => 'required|string',
            'module_id' => 'required|integer',
            'password' => 'sometimes|nullable|min:6',
        ]);

        $module_name = $request->module_name;
        $module_id = $request->module_id;


        $document = Document::query()->whereId($module_id)->firstOrFail();

        if (!is_null($document->secured_at) || !is_null($document->password)) {
            if (empty($request->password)) {
                return redirect()->back()->with('message', 'Please provide a password to download file!');
            }
            if (!\Hash::check($request->password, $document->password)) {
                return redirect()->back()->with('message', 'Invalid password!');
            }
        }

        return response()->download($mediaItem->getPath(), $mediaItem->file_name);
    }
}
