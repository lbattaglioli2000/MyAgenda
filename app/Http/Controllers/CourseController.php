<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use Auth;

class CourseController extends Controller
{
    public function index()
    {
        return view('user.new-course');
    }

    public function post(Request $request)
    {
        $this->validate($request, [
            'name' => 'string|required',
            'instructor' => 'string|required'
        ]);

        $course = Course::create([
            'name' => $request->name,
            'instructor' => $request->instructor,
            'user_id' => Auth::user()->id
        ]);

        return redirect(route('user.home'));
    }

    public function get(Course $course)
    {
        return view('user.course', compact('course'));
    }

    public function delete(Course $course)
    {
        $course->delete();
        return redirect(route('user.home'));
    }
}
