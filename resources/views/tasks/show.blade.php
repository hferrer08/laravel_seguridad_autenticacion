<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ver tarea
        </h2>
    </x-slot>

    <div class="p-6">
        <div class="max-w-2xl mx-auto bg-white shadow rounded-lg p-6">
            <div class="mb-4">
                <h3 class="text-lg font-bold text-gray-900">{{ $task->title }}</h3>
            </div>

            <div class="mb-4">
                <p class="text-sm font-semibold text-gray-700">Descripción</p>
                <p class="text-gray-800">
                    {{ $task->description ?: 'Sin descripción' }}
                </p>
            </div>

            <div class="mb-4">
                <p class="text-sm font-semibold text-gray-700">Estado</p>
                <p class="text-gray-800">{{ $task->status }}</p>
            </div>

            <div class="mb-6">
                <p class="text-sm font-semibold text-gray-700">Fecha de creación</p>
                <p class="text-gray-800">{{ $task->created_at }}</p>
            </div>

            <div class="flex items-center gap-3">
                @can('task.edit')
                    <a
                        href="{{ route('tasks.edit', $task) }}"
                        class="inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-600 transition"
                    >
                        Editar
                    </a>
                @endcan

                <a href="{{ route('tasks.index') }}" class="text-gray-600 hover:text-gray-900">
                    Volver
                </a>
            </div>
        </div>
    </div>
</x-app-layout>