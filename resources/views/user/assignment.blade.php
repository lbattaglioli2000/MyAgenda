@extends('layouts.master')

@section('title')
    {{ $assignment->type }}: {{ $assignment->name }}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ ucfirst($assignment->name) }} <span class="badge badge-success">{{ ucfirst($assignment->type) }}</span> <span class="badge badge-success">{{ ucfirst($assignment->course->name) }}</span>
                    </div>
                    <div class="card-body">

                        @if(\Carbon\Carbon::parse($assignment->due)->isPast())
                            <div class="alert alert-danger">
                                <h4>Hey, slacker!</h4>
                                <b>This assignment is late!</b>
                            </div>
                        @endif

                        <div class="alert alert-info">
                            This assignment is due on <b>{{ \Carbon\Carbon::parse($assignment->due)->toFormattedDateString() }}</b> which is <b>{{ \Carbon\Carbon::parse($assignment->due)->diffForHumans() }}</b>
                        </div>

                        @if($assignment->details != "")
                            {!! $assignment->details !!}
                        @else
                            <p>There is no description or additional details for this assignment.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
                <hr>
                <a class="btn btn-block btn-outline-dark btn-lg" href="{{ route('user.home') }}">Go back to your dashboard</a>
            </div>

        </div>
    </div>
@endsection
