@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>All Courses</h1>
        @php
        $courses = App\Models\Course::all();     
        @endphp
        @php
            $logged_in = Auth::user();
        @endphp
        @if ($logged_in && $logged_in->role == 'instructor')
        <a href="{{ route('courses.create') }}" class="btn btn-primary mb-3">Create New Course</a>

        @endif  

        <div class="row">
            @foreach($courses as $course)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ asset('storage/' . $course->cover_image) }}" class="card-img-top" alt="{{ $course->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $course->title }}</h5>
                            <p class="card-text">{{ Str::limit($course->description, 100) }}</p>
                            <a href="{{ route('courses.show', $course->id) }}" class="btn btn-primary">View Course</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
