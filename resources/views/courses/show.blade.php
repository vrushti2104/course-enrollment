@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $course->title }}</h1>
        <p>{{ $course->description }}</p>

        @if ($course->cover_image)
            <img src="{{ asset('storage/' . $course->cover_image) }}" class="img-fluid mb-4" alt="{{ $course->title }}">
        @endif

        <h2>Lessons</h2>
        @if (Auth::user()->role =='instructor')
        <a href="{{ route('courses.lessons.create', $course->id) }}" class="btn btn-primary mb-3">Add New Lesson</a>
   
        @endif

        @if($course->lessons->count())
            <ul class="list-group">
                @foreach($course->lessons as $lesson)
                    <li class="list-group-item">
                        <h5>{{ $lesson->title }}</h5>
                        <p>{{ Str::limit($lesson->description, 100) }}</p>
                        @if (Auth::user()->role =='instructor')
                        <a href="{{ route('courses.lessons.edit', [$course->id, $lesson->id]) }}" class="btn btn-sm btn-warning">Edit Lesson</a>
                        <form action="{{ route('courses.lessons.destroy', [$course->id, $lesson->id]) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete Lesson</button>
                        </form>
                        @else  
                        @auth
                        @if (Auth::user()->enrollments->contains('course_id', $course->id))
                            <a href="{{ route('enrollments.progress', $course->id) }}" class="btn btn-secondary">View Progress</a>
                        @else
                            <form action="{{ route('enrollments.enroll', $course->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-primary">Enroll in Course</button>
                            </form>
                        @endif
                    @else
                        <p>Please <a href="{{ route('login') }}">login</a> to enroll in this course.</p>
                    @endauth
                        @endif
                    </li>
                @endforeach
            </ul>
        @else
            <p>No lessons available.</p>
        @endif
    </div>
@endsection
