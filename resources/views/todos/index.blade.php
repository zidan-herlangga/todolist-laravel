@extends('layouts.app')

@section('content')

<div class="md:mx-10 py-10 px-4 sm:px-6 lg:px-8">

    <!-- Form tambah todo -->
    <div class="bg-white shadow-md rounded-lg p-6 mb-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-8">Daftar Todo</h2>
        <form action="{{ route('todos.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @csrf
            <input type="text" name="title" placeholder="Judul todo"
                class="col-span-1 md:col-span-1 px-4 py-2 border rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
            <input type="text" name="description" placeholder="Deskripsi (opsional)"
                class="col-span-1 md:col-span-1 px-4 py-2 border rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
            <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Tambah</button>
        </form>
        @error('title')
        <p class="text-red-500 mt-2">{{ $message }}</p>
        @enderror
    </div>

    <!-- Filter -->
    <div class="mb-4 flex items-center gap-2">
        @php
        $current = request('filter', 'all');
        @endphp
        <a href="{{ route('todos.index', ['filter' => 'all']) }}" class="px-4 py-2 rounded-full text-sm font-medium transition
                   {{ $current === 'all' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
            Semua
        </a>
        <a href="{{ route('todos.index', ['filter' => 'not_done']) }}"
            class="px-4 py-2 rounded-full text-sm font-medium transition
                   {{ $current === 'not_done' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
            Belum Selesai
        </a>
        <a href="{{ route('todos.index', ['filter' => 'done']) }}" class="px-4 py-2 rounded-full text-sm font-medium transition
                   {{ $current === 'done' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
            Selesai
        </a>
    </div>

    <!-- Daftar todo -->
    <div class="space-y-4">
        @forelse ($todos as $todo)
        <div
            class="flex justify-between items-center bg-white p-5 rounded-lg shadow hover:shadow-lg transition duration-300">
            <div class="flex items-start gap-4 w-full">
                <form action="{{ route('todos.toggle', $todo) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button>
                        <input type="checkbox" onchange="this.form.submit()" {{ $todo->is_done ? 'checked' : '' }}
                        class="w-5 h-5 text-blue-600 rounded focus:ring-0">
                    </button>
                </form>

                <div class="flex-1">
                    <h2
                        class="text-lg font-semibold {{ $todo->is_done ? 'line-through text-gray-500' : 'text-gray-900' }}">
                        {{ $todo->title }}
                    </h2>
                    @if ($todo->description)
                    <p class="text-sm text-gray-600 {{ $todo->is_done ? 'line-through' : '' }}">
                        {{ $todo->description }}
                    </p>
                    @endif
                    <p class="text-xs text-gray-400 mt-1">Dibuat: {{ $todo->created_at->format('d M Y') }}</p>
                </div>
            </div>

            <div class="flex gap-2 ml-4">
                <a href="{{ route('todos.edit', $todo) }}"
                    class="inline-flex items-center justify-center bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-medium px-3 py-1.5 rounded">
                    ✏️
                </a>
                <form action="{{ route('todos.destroy', $todo) }}" method="POST"
                    onsubmit="return confirm('Hapus todo ini?')">
                    @csrf
                    @method('DELETE')
                    <button
                        class="inline-flex items-center justify-center bg-red-600 hover:bg-red-700 text-white text-sm font-medium px-3 py-1.5 rounded">
                        🗑️
                    </button>
                </form>
            </div>
        </div>
        @empty
        <p class="text-gray-500 text-center">Belum ada todo. Yuk tambahkan satu!</p>
        @endforelse
    </div>
</div>
@endsection