@extends('layouts.master')

@section('title')
    {{ ucwords($course->instructor) }}'s {{ ucwords($course->name) }}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ ucwords($course->instructor) }}'s <b>{{ ucwords($course->name) }}</b>
                    </div>
                    <div class="card-body">

                        @if(Auth::user()->assignments->where('course_id', $course->id)->count() > 0)

                            @foreach(Auth::user()->assignments->where('course_id', $course->id) as $assignment)

                                <div class="card text-center">
                                    <div class="card-header">
                                        <h1 class="card-title">{{ ucfirst($assignment->name) }}</h1>
                                        <h4><span class="badge badge-success">{{ ucfirst($assignment->type) }}</span> for <span class="badge badge-success">{{ ucfirst($assignment->course->name) }}</span></h4>
                                    </div>
                                    <div class="card-body">

                                        @if(\Carbon\Carbon::parse($assignment->due)->isPast())
                                            <div class="alert alert-danger">
                                                <h4>Hey, slacker!</h4>
                                                <b>This assignment is late!</b>
                                            </div>
                                        @endif

                                        <a href="{{ route('user.get.assignment', $assignment->id) }}" class="btn btn-outline-primary"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('user.get.assignment', $assignment->id) }}" class="btn btn-outline-dark"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('user.delete.assignment', $assignment->id) }}" class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>

                                    </div>
                                    <div class="card-footer text-muted">
                                        This was created {{ $assignment->created_at->diffForHumans() }} and is due {{ \Carbon\Carbon::parse($assignment->due)->diffForHumans() }}
                                    </div>
                                </div>

                                <br>

                            @endforeach

                        @else

                            <div class="alert alert-success">
                                <b>Sweet! Nice job!</b> You have no assignments for {{ $course->name }}!
                            </div>

                        @endif

                    </div>
                </div>
            </div>
        </div>
        <hr>
        <a class="btn btn-block btn-outline-dark btn-lg" href="{{ route('user.home') }}">Go back to your dashboard</a>
        <br>
        <a class="btn btn-block btn-outline-danger btn-lg" href="{{ route('user.delete.course', $course->id) }}">Delete this class</a>
        <br>
    </div>
@endsection
