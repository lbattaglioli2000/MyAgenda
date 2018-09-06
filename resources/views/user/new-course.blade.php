@extends('layouts.master')

@section('title')
    Create a new course
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Create a new course
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

                        <form action="{{ route('user.new-course.post') }}" method="POST">

                            @csrf

                            <div class="form-group">
                                <label for="course">Course name</label>
                                <input name="name" type="text" class="form-control" id="course" placeholder="Example: AP Computer Science A">
                            </div>

                            <div class="form-group">
                                <label for="instructor">Course instructor</label>
                                <input name="instructor" type="text" class="form-control" id="instructor" placeholder="Example: Josh Merlis">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-outline-primary btn-lg">Register course!</button>
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
