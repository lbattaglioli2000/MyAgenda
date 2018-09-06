@extends('layouts.master')

@section('title')
    Create a new assignment
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Create a new assignment
                    </div>
                    <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('user.new-assignment.post') }}" method="POST">

                            @csrf

                            <div class="form-group">
                                <label for="assignment">Assignment name</label>
                                <input name="name" type="text" class="form-control" id="assignment" placeholder="Example: Study abstract classes">
                            </div>

                            <div class="form-group">
                                <label for="type">Assignment type</label>
                                <select class="form-control" name="type" id="type">
                                    <option selected></option>
                                    <option value="homework">Homework assignment</option>
                                    <option value="test">Test</option>
                                    <option value="quiz">Quiz</option>
                                    <option value="project">Project</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="course">Course</label>
                                <select class="form-control" name="course_id" id="course">
                                    <option selected></option>

                                    @foreach(Auth::user()->courses as $course)

                                        <option value="{{ $course->id }}">{{ $course->name }}</option>

                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="due">When's this due?</label>
                                <input name="due" type="date" class="form-control" id="instructor" placeholder="Example: Josh Merlis">
                            </div>

                            <div class="form-group">
                                <label for="due">Have any important details to add?</label>

                                <textarea name="details" id="editor1" rows="10">
                                </textarea>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-outline-primary btn-lg">Create assignment!</button>
                            </div>

                        </form>

                    </div>
                </div>
                <hr>
                <a class="btn btn-block btn-outline-dark btn-lg" href="{{ route('user.home') }}">Go back to your dashboard</a>
            </div>

        </div>
    </div>
@endsection
