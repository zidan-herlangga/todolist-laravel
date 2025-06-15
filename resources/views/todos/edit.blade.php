@extends('layouts.app')

@section('content')
<div class="md:mx-10 py-10 px-4 sm:px-6 lg:px-8">
  <div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-8">Edit Todo</h2>

    <form action="{{ route('todos.update', $todo) }}" method="POST" class="space-y-4">
      @csrf
      @method('PUT')

      <div>
        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
        <input type="text" name="title" id="title" value="{{ old('title', $todo->title) }}"
          class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        @error('title')
        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
        <textarea name="description" id="description" rows="4"
          class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('description', $todo->description) }}</textarea>
      </div>

      <div class="flex items-center justify-between">
        <a href="{{ route('todos.index') }}" class="text-sm text-gray-600 hover:underline">← Kembali</a>
        <button type="submit"
          class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
          Simpan Perubahan
        </button>
      </div>
    </form>
  </div>
</div>
@endsection