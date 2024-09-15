@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Course</h1>

        <form action="{{ route('courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Course Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $course->title }}" required>
            </div>

            <div class="form-group">
                <label for="description">Course Description</label>
                <textarea name="description" id="description" class="form-control" required>{{ $course->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="cover_image">Cover Image</label>
                <input type="file" name="cover_image" id="cover_image" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">Update Course</button>
        </form>
    </div>
@endsection
