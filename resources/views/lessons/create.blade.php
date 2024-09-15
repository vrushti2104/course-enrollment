@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add New Lesson to {{ $course->title }}</h1>

        <form action="{{ route('courses.lessons.store', $course->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Lesson Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Lesson Description</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="content">Lesson Content</label>
                <textarea name="content" id="content" class="form-control" required></textarea>
            </div>

            <button type="submit" class="btn btn-success">Add Lesson</button>
        </form>
    </div>
@endsection
