<!-- resources/views/posts/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <p><strong>Категория:</strong> {{ $post->category->name }}</p>
        <p><strong>Содержимое:</strong> {{ $post->content }}</p>

        <h3>Теги</h3>
        <ul>
            @foreach ($post->tags as $tag)
                <li>{{ $tag->name }}</li>
            @endforeach
        </ul>

        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Редактировать</a>

        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Удалить</button>
        </form>
    </div>
@endsection
