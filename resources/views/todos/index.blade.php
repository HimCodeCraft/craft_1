@if(session('success'))
    <div>{{ session('success') }}</div>
@endif

<h1>Todo List</h1>
    <a href="{{ route('todos.create') }}">Add New Todo</a>
    @foreach ($todos as $todo)
        <div>
            <h3>{{ $todo->title }}</h3>
            <p>{{ $todo->description }}</p>
            <form action="{{ route('todos.destroy', $todo->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
            <a href="{{ route('todos.edit', $todo->id) }}">Edit</a>
        </div>
    @endforeach