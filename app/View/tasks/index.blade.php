<x-layouts.app :title="'Tasks'">
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Listado de tareas</h1>

        @can('task.create')
            <a href="{{ route('tasks.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
                Nueva tarea
            </a>
        @endcan

        <table class="w-full mt-4 border">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->status }}</td>
                        <td>
                            <a href="{{ route('tasks.show', $task) }}">Ver</a>

                            @can('task.edit')
                                | <a href="{{ route('tasks.edit', $task) }}">Editar</a>
                            @endcan

                            @can('task.delete')
                                <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Eliminar</button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.app>