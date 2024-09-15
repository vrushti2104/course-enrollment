@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Lesson in {{ $course->title }}</h1>

        <form action="{{ route('courses.lessons.update', [$course->id, $lesson->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Lesson Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $lesson->title }}" required>
            </div>

            <div class="form-group">
                <label for="description">Lesson Description</label>
                <textarea name="description" id="description" class="form-control">{{ $lesson->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="content">Lesson Content</label>
                <textarea name="content" id="content" class="form-control" required>{{ $lesson->content }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Update Lesson</button>
        </form>
    </div>
@endsection
