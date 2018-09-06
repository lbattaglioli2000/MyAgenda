@extends('layouts.master')

@section('title')
    Home
@endsection

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Your classes
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @if(Auth::user()->courses->count() > 0)
                            @foreach(Auth::user()->courses as $course)
                                <a href="{{ route('user.get.course', $course->id) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">{{ $course->name }}</h5>
                                        <small>{{ $course->instructor }}</small>
                                    </div>
                                </a>
                            @endforeach
                        @else
                            <div class="alert alert-warning">You have no classes created</div>
                        @endif
                    </ul>
                    <br>
                    <a class="btn btn-block btn-outline-primary" href="{{ route('user.new-course') }}">Add a class</a>
                </div>
            </div>
            <br>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Here are <b>all</b> of your assignments <a href="{{ route('user.new-assignment') }}" class="btn btn-sm btn-outline-primary"><i class="fas fa-plus-circle"></i> New Assignment</a>
                </div>
                <div class="card-body">

                    @if(Auth::user()->assignments->count() > 0)

                        @foreach(Auth::user()->assignments as $assignment)

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
                                    <!-- IMPLEMENT LATER <a href="{{ route('user.get.assignment', $assignment->id) }}" class="btn btn-outline-dark"><i class="fas fa-edit"></i></i></a> -->
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
                            <b>Sweet! Nice job!</b> You have no assignments!
                        </div>

                    @endif

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
