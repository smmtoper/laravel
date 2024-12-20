@extends('layouts.app')

@section('content')
    <h2>Submit Data</h2>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="/form" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}">
        @error('name') <p>{{ $message }}</p> @enderror

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}">
        @error('email') <p>{{ $message }}</p> @enderror

        <button type="submit">Submit</button>
    </form>
@endsection
