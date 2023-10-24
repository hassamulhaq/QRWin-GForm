<x-admin-layout>
    <div class="py-3 w-full">
        <div class="max-w-7xl px-2 mx-auto sm:px-2 lg:px-3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex justify-end p-2">
                    <a href="{{ route('admin.documents.create') }}">
                        <x-secondary-button>
                            Create Document
                        </x-secondary-button>
                    </a>
                </div>
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <div class="p-2">
                                    <div>Title: {{ $document->name }}</div>
                                    <div>Description: {{ $document->description ?? 'N/A' }}</div>
                                    <div>Comments: {{ $document->comments ?? 'N/A' }}</div>
                                    <div class="py-2 bg-gray-100"></div>
                                    <div>
                                        @foreach($document->getMedia('documents') as $file)
                                            <div>File name: {{$file->name}}</div>
                                            <div>File type: {{$file->mime_type}}</div>
                                            <div>File visibility: {{!is_null($document->secured_at) ? '(password-protected)' : '(open)'}}</div>
                                            <div class="pb-3 flex space-x-2">
                                                Download: /
                                            </div>
                                            <div>
                                                <form action="{{route('admin.media.download', $file->id)}}" method="get">
                                                    <input type="hidden" id="module_name" name="module_name" value="document">
                                                    <input type="hidden" id="module_id" name="module_id" value="{{$document->id}}">
                                                    <div class="sm:col-span-6">
                                                        @if(!is_null($document->secured_at) && !is_null($document->password))
                                                            <label for="password" class="block text-sm font-medium text-gray-700"> File Password </label>
                                                            <div class="mt-1">
                                                                <x-input type="text"
                                                                         id="password"
                                                                         name="password"
                                                                         class="block w-full border border-gray-400" />
                                                            </div>
                                                            @error('password') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                                                        @endif
                                                        <div class="sm:col-span-6 pt-5">
                                                            <x-button type="submit">
                                                                Download
                                                            </x-button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-admin-layout>
