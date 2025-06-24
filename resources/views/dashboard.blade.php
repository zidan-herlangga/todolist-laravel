<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>    
        
        <div class="py-10 px-6 md:max-w  bg-white shadow rounded ">
            <h2 class="text-2xl font-semibold mb-6">Statistic</h2>
        
            <div class="flex flex-1 md:grid-cols-3 gap-6 text-center">
                <div class="bg-blue-100 p-4 rounded">
                    <p class="text-gray-600">Total Todo's</p>
                    <p class="text-2xl font-bold text-blue-700">{{ $total }}</p>
                </div>
                <div class="bg-green-100 p-4 rounded">
                    <p class="text-gray-600">Completed</p>
                    <p class="text-2xl font-bold text-green-700">{{ $done }}</p>
                </div>
                <div class="bg-red-100 p-4 rounded">
                    <p class="text-gray-600">Not Completed</p>
                    <p class="text-2xl font-bold text-red-700">{{ $notDone }}</p>
                </div>
            </div>
        
            <h3 class="text-xl font-semibold mt-10 mb-4">Recent Todo</h3>
            <ul class="space-y-2">
                @forelse ($recentTodos as $todo)
                <li class="border p-3 rounded flex justify-between items-center hover:bg-blue-100 transition">
                    <a href="{{ route('todos.edit', $todo) }}" class="flex items-center gap-4 w-full ">
                        <div>
                            <p class="font-semibold {{ $todo->is_done ? 'line-through text-gray-500' : '' }}">
                                {{ $todo->title }}
                            </p>
                            @if ($todo->description)
                            <p class="text-sm text-gray-600 {{ $todo->is_done ? 'line-through' : '' }}">
                                {{ $todo->description }}
                            </p>
                            @endif
                            <p class="text-sm text-gray-500">{{ $todo->created_at->format('d M Y') }}</p>
                        </div>
                    </a>
                    <span class="text-sm font-medium ms-4 {{ $todo->is_done ? 'text-green-600' : 'text-red-600' }}">
                        {{ $todo->is_done ? 'DONE' : 'NOT' }}
                    </span>
                </li>
                @empty
                <li class="text-gray-500">Not found todo.</li>
                @endforelse
            </ul>
        </div>
    </x-slot>
</x-app-layout>


