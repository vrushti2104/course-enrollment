@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $course->title }} - Progress</h1>

        <!-- Progress Form -->
        <form action="{{ route('enrollments.updateProgress', $course->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="progress">Select Completed Lessons:</label>
                <select name="progress[]" id="progress" class="form-control" multiple>
                    @foreach($course->lessons as $lesson)
                        <option value="{{ $lesson->id }}" {{ in_array($lesson->id, $progress) ? 'selected' : '' }}>
                            {{ $lesson->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Progress</button>
        </form>

        <!-- Display Course Progress -->
        <h2>Course Progress</h2>
        <ul class="list-group">
            @foreach($course->lessons as $lesson)
                <li class="list-group-item">
                    {{ $lesson->title }} - 
                    @if(in_array($lesson->id, $progress))
                        <span class="badge badge-success">Completed</span>
                    @else
                        <span class="badge badge-secondary">Pending</span>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
@endsection
