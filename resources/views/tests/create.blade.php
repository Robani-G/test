<form method="POST" action="{{ route('tests.store') }}" accept-charset="UTF-8>
    @csrf
    <label for="name">Name:</label>
    <input type="text" name="title" id="name">
    <button type="submit">Submit</button>
</form>