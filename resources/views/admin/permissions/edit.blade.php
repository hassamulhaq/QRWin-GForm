<x-admin-layout>

    <div class="py-3 w-full">
        <div class="max-w-7xl px-2 mx-auto sm:px-2 lg:px-3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex p-2">
                    <a href="{{ route('admin.permissions.index') }}">
                        <x-button>Permission Index</x-button>
                    </a>
                </div>
                <div class="flex flex-col p-2 bg-slate-100">
                    <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                        <form method="POST" action="{{ route('admin.permissions.update', $permission) }}">
                            @csrf
                            @method('PUT')
                            <div class="sm:col-span-6">
                                <label for="name" class="block text-sm font-medium text-gray-700"> Permission name</label>
                                <div class="mt-1">
                                    <input type="text" id="name" name="name"
                                           class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                           value="{{ $permission->name }}" />
                                </div>
                                @error('name')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="sm:col-span-6 pt-5">
                                <x-button type="submit">Update</x-button>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="mt-6 p-2 bg-slate-100">
                    <h2 class="text-2xl font-semibold">Roles</h2>
                    <div class="flex space-x-2 mt-4 p-2">
                        @if ($permission->roles)
                            @foreach ($permission->roles as $permission_role)
                                <form method="POST"
                                      action="{{ route('admin.permissions.roles.remove', [$permission->id, $permission_role->id]) }}"
                                      onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <x-danger-button type="submit" class="flex items-center justify-center justify-items-center space-x-2 mt-1 text-sm whitespace-nowrap">
                                        {{ $permission_role->name }}
                                        <span class="ml-1">x</span>
                                    </x-danger-button>
                                </form>
                            @endforeach
                        @endif
                    </div>
                    <form method="POST" action="{{ route('admin.permissions.roles', $permission->id) }}">
                        @csrf
                        <div class="sm:col-span-6">
                            <label for="role" class="block text-sm font-medium text-gray-700">Roles</label>
                            <select id="role" name="role" autocomplete="role-name"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('role')
                        <span class="text-red-400 text-sm">{{ $message }}</span>
                        @enderror
                        <div class="max-w-xl mt-6">
                    </div>
                    <div class="sm:col-span-6 pt-5">
                        <x-button type="submit">Assign</x-button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
