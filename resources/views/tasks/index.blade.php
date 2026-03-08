<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de tareas') }}
        </h2>
    </x-slot>

    <div class="p-6">
        @if(session('success'))
            <div class="mb-4 rounded bg-green-100 p-3 text-green-800">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-4">
            @can('task.create')
                <a href="{{ route('tasks.create') }}"
                   class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 transition">
                    Nueva tarea
                </a>
            @endcan
        </div>

        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-3 py-2">ID</th>
                        <th class="border px-3 py-2">Título</th>
                        <th class="border px-3 py-2">Estado</th>
                        <th class="border px-3 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tasks as $task)
                        <tr>
                            <td class="border px-3 py-2">{{ $task->id }}</td>
                            <td class="border px-3 py-2">{{ $task->title }}</td>
                            <td class="border px-3 py-2">{{ $task->status }}</td>
                            <td class="border px-3 py-2">
                                <a href="{{ route('tasks.show', $task) }}" class="text-blue-600 hover:underline">Ver</a>

                                @can('task.edit')
                                    | <a href="{{ route('tasks.edit', $task) }}" class="text-yellow-600 hover:underline">Editar</a>
                                @endcan

                                @can('task.delete')
                                    | 
                                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('¿Eliminar tarea?')">
                                            Eliminar
                                        </button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="border px-3 py-2 text-center">
                                No hay tareas registradas.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $tasks->links() }}
        </div>
    </div>
</x-app-layout>