<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;

use App\Assignment;

class AssignmentController extends Controller
{
    /**
     * Create a new controller instance that is protected by the Auth middleware.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.new-assignment');
    }

    public function post(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'type' => 'required|string',
            'course_id' => 'required|integer',
            'due' => 'required|date',
            'details' => 'nullable'
        ]);

        $assignment = Assignment::create([
            'name' => $request->name,
            'type' => $request->type,
            'course_id' => $request->course_id,
            'due' => Carbon::parse($request->due),
            'user_id' => Auth::user()->id,
            'details' => $request->details
        ]);

        return redirect(route('user.home'));

    }

    public function delete(Assignment $assignment)
    {
        $assignment->delete();
        return back();
    }

    public function get(Assignment $assignment)
    {
        return view('user.assignment', compact('assignment'));
    }
}
