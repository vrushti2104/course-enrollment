<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Course;
use App\Models\User;

class CoursePolicy
{
    
    public function update(User $user, Course $course): bool
    {
        return $user->id === $course->user_id;

    }

    public function delete(User $user, Course $course): bool
    {
        return $user->id === $course->user_id;

    }

}