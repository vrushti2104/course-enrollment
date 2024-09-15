<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CourseController extends Controller
{
    public function index()
    {
       
        return view('courses.index');
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'cover_image' => 'nullable|image|max:2048',
        ]);

        try {
            $course = new Course();
            $course->user_id = Auth::id(); 
            $course->title = $request->title;
            $course->description = $request->description;

            if ($request->hasFile('cover_image')) {
                $course->cover_image = $request->file('cover_image')->store('cover_images', 'public');
            }

            if ($course->save()) {
                return redirect()->route('courses.index')->with('success', 'Course created successfully.');
            } else {
                Log::error('Failed to create course.');
                return redirect()->back()->with('error', 'Failed to create course.');
            }
        } catch (\Exception $e) {
            Log::error('Error creating course: ' . $e->getMessage());

            return redirect()->back()->with('error', 'An unexpected error occurred.');
        }
    }


    public function edit(Course $course)
    {
        $this->authorize('update', $course);

        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $this->authorize('update', $course);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'cover_image' => 'nullable|image|max:2048',
        ]);

        $course->title = $request->title;
        $course->description = $request->description;

        if ($request->hasFile('cover_image')) {
            $course->cover_image = $request->file('cover_image')->store('cover_images', 'public');
        }

        $course->save();

        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    public function destroy(Course $course)
    {
        $this->authorize('delete', $course);

        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}