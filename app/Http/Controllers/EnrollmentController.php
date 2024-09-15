<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    public function enroll(Course $course)
    {
        $enrollment = Enrollment::firstOrCreate([
            'course_id' => $course->id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('courses.show', $course->id)->with('success', 'Enrolled in course successfully.');
    }

    public function progress(Course $course)
    {
        $enrollment = Enrollment::where('course_id', $course->id)
                                ->where('user_id', Auth::id())
                                ->firstOrFail();
        
        $progress = explode(',', $enrollment->progress ?? '');    
    
        return view('enrollments.progress', compact('course', 'progress'));
    }

    public function updateProgress(Course $course, Request $request)
    {
        $enrollment = Enrollment::where('course_id', $course->id)
                                ->where('user_id', Auth::id())
                                ->firstOrFail();
       
        $progress = $request->input('progress', []);
        $enrollment->progress = $progress[0];
        
        $enrollment->save();

        return redirect()->route('enrollments.progress', $course->id)->with('success', 'Progress updated successfully.');
    }
}