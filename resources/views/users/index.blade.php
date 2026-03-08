<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Listado de usuarios
        </h2>
    </x-slot>

    <div class="p-6">
        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-3 py-2">ID</th>
                        <th class="border px-3 py-2">Nombre</th>
                        <th class="border px-3 py-2">Correo</th>
                        <th class="border px-3 py-2">Rol</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td class="border px-3 py-2">{{ $user->id }}</td>
                            <td class="border px-3 py-2">{{ $user->name }}</td>
                            <td class="border px-3 py-2">{{ $user->email }}</td>
                            <td class="border px-3 py-2">
                                {{ $user->roles->pluck('name')->join(', ') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="border px-3 py-2 text-center">
                                No hay usuarios registrados.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>
</x-app-layout>