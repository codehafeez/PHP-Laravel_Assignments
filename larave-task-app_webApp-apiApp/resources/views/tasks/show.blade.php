<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            View a task
        </h2>
    </x-slot>


    <div class="container" style="margin-top:50px;">
        <div>
            <strong>ID:</strong> {{ $task->id }}
        </div>
        <div>
            <strong>Title:</strong> {{ $task->title }}
        </div>
        <div>
            <strong>Content:</strong> {{ $task->content }}
        </div>
        <div style="margin-top:20px;">
            <a href="{{ route('tasks.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
    
</x-app-layout>