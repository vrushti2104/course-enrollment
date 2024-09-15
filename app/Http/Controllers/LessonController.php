<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LessonController extends Controller
{
    public function create(Course $course)
    {
        return view('lessons.create', compact('course'));
    }

    public function store(Request $request, Course $course)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'content' => 'required|string',
            ]);

            $lesson = new Lesson();
            $lesson->course_id = $course->id;
            $lesson->title = $request->title;
            $lesson->description = $request->description;
            $lesson->content = $request->content;
            if ($lesson->save()) {
                return redirect()->route('courses.show', $course->id)->with('success', 'Lesson created successfully.');
            } else {
                Log::error('Unable to create Lesson');
                return redirect()->back()->with('error', 'Failed to create Lesson.');
            }
        } catch (\Exception $e) {
            Log::error('Error creating course: ' . $e->getMessage());

            return redirect()->back()->with('error', 'An unexpected error occurred.');
        }
    }

    public function edit(Course $course, Lesson $lesson)
    {
        return view('lessons.edit', compact('course', 'lesson'));
    }

    public function update(Request $request, Course $course, Lesson $lesson)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'content' => 'required|string',
        ]);

        $lesson->title = $request->title;
        $lesson->description = $request->description;
        $lesson->content = $request->content;
        $lesson->save();

        return redirect()->route('courses.show', $course->id)->with('success', 'Lesson updated successfully.');
    }



    public function destroy(Course $course, Lesson $lesson)
    {
        $lesson->delete();

        return redirect()->route('courses.show', $course->id)->with('success', 'Lesson deleted successfully.');
    }
}