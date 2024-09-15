@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $course->title }}</h1>
        <p>{{ $course->description }}</p>

        @if ($course->cover_image)
            <img src="{{ asset('storage/' . $course->cover_image) }}" class="img-fluid mb-4" alt="{{ $course->title }}">
        @endif

        <!-- Enrollment Button/Form -->
        @if (Auth::check())
            @if ($course->enrollments->contains('user_id', Auth::id()))
                <p>You are already enrolled in this course.</p>
                <a href="{{ route('enrollments.progress', $course->id) }}" class="btn btn-secondary">View Progress</a>
            @else
                <form action="{{ route('enrollments.enroll', $course->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Enroll in Course</button>
                </form>
            @endif
        @else
            <p>Please <a href="{{ route('login') }}">login</a> to enroll in this course.</p>
        @endif

        <h2>Lessons</h2>
        @if($course->lessons->count())
            <ul class="list-group">
                @foreach($course->lessons as $lesson)
                    <li class="list-group-item">
                        <h5>{{ $lesson->title }}</h5>
                        <p>{{ Str::limit($lesson->description, 100) }}</p>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No lessons available.</p>
        @endif
    </div>
@endsection
