<!-- resources/views/posts/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Все посты</h1>
        <a href="{{ route('posts.create') }}" class="btn btn-primary">Создать новый пост</a>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Заголовок</th>
                    <th>Категория</th>
                    <th>Теги</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td>
                            @foreach ($post->tags as $tag)
                                <span class="badge badge-secondary">{{ $tag->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info">Просмотр</a>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Редактировать</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
