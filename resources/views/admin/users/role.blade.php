<x-admin-layout>
    <div class="py-3 w-full">
        <div class="max-w-7xl px-2 mx-auto sm:px-2 lg:px-3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex p-2">
                    <a href="{{ route('admin.users.index') }}">
                        <x-button>Users Index</x-button>
                    </a>
                </div>
                <div class="flex flex-col p-2 bg-slate-100">
                    <div>User Name: {{ $user->name }}</div>
                    <div>User Email: {{ $user->email }}</div>
                </div>
                <div class="mt-6 p-2 bg-slate-100">
                    <h2 class="text-2xl font-semibold">Roles</h2>
                    <div class="flex flex-wrap space-x-2 space-y-1 mt-4 p-2">
                        @if ($user->roles)
                            @foreach ($user->roles as $user_role)
                                <form class="mt-1" method="POST"
                                      action="{{ route('admin.users.roles.remove', [$user->id, $user_role->id]) }}"
                                      onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <x-danger-button type="submit">
                                        <span>{{ $user_role->name }}</span>
                                        <span class="ml-1">x</span>
                                    </x-danger-button>
                                </form>
                            @endforeach
                        @endif
                    </div>
                    <form method="POST" action="{{ route('admin.users.roles', $user->id) }}">
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
                        <x-button type="submit">
                            Assign
                        </x-button>
                    </div>
                    </form>
                </div>
                <div class="mt-6 p-2 bg-slate-100">
                    <h2 class="text-2xl font-semibold">Permissions</h2>
                    <div class="flex flex-wrap space-x-2 space-y-1 mt-4 p-2">
                        @if ($user->permissions)
                            @foreach ($user->permissions as $user_permission)
                                <form class="mt-1" method="POST"
                                      action="{{ route('admin.users.permissions.revoke', [$user->id, $user_permission->id]) }}"
                                      onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="flex space-x-2 items-center justify-center justify-items-center px-4 py-1 bg-red-800 hover:bg-red-900 text-white rounded-md text-sm whitespace-nowrap">
                                        <span>{{ $user_permission->name }}</span>
                                        <span class="ml-1">x</span>
                                    </button>
                                </form>
                            @endforeach
                        @endif
                    </div>
                    <form method="POST" action="{{ route('admin.users.permissions', $user->id) }}">
                        <div class="max-w-xl mt-6">
                            @csrf
                                <div class="sm:col-span-6">
                                    <label for="permission"
                                           class="block text-sm font-medium text-gray-700">Permission</label>
                                    <select id="permission" name="permission" autocomplete="permission-name"
                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        @foreach ($permissions as $permission)
                                            <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('name')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="sm:col-span-6 pt-5">
                            <x-button type="submit">
                                Assign
                            </x-button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</x-admin-layout>
