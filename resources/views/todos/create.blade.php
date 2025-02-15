    <h1>{{ isset($todo) ? 'Edit Todo' : 'Create Todo' }}</h1>
    <form action="{{ isset($todo) ? route('todos.update', $todo->id) : route('todos.store') }}" method="POST">
        @csrf
        @if (isset($todo))
        @method('PUT')
        @endif
        <label>Title</label>
        <input type="text" name="title" value="{{ $todo->title ?? '' }}">
        <label>Description</label>
        <textarea name="description">{{ $todo->description ?? '' }}</textarea>
        <button type="submit">{{ isset($todo) ? 'Update' : 'Create' }}</button>
    </form>