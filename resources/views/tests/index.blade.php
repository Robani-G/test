@foreach ($tests as $test)
    <p>{{ $test->title }} <form action="{{ route('tests.destroy', $test->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
        <a href="{{ route('tests.edit', $test->id) }}">Edit</a>

    </form></p>
@endforeach