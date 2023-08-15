<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tasks
        </h2>
    </x-slot>


    <div class="table-container">
        <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Create Task</a>
        <table class="table" style="margin-top:20px;">
            <thead>
                <tr>
                    <th>S.No#</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $serialNumber = 1;
                @endphp
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $serialNumber }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->content }}</td>
                        <td>
                            @if (Auth::user()->can('manage', $task))
                                <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-primary">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            @else
                                <a href="{{ route('tasks.show', $task) }}" class="btn btn-primary">View</a>
                            @endif
                        </td>
                    </tr>
                    @php
                        $serialNumber++;
                    @endphp
                @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>
