@extends('layouts.master')

@section('title')
    {{ config('app.name', 'Laravel') }}
@endsection

@section('content')
    <div class="jumbotron">
        <h1><b>This is MyAgenda.</b> <small>(And it's yours too!)</small></h1>
        <p class="lead">MyAgenda is a web application that is meant for you, a student, to keep track of all of your
            homework, assignments, and reminders.</p>
        @guest
            <a class="btn btn-outline-primary" href="{{ route('register') }}" role="button">Register</a> or <a class="btn btn-outline-dark" href="{{ route('login') }}" role="button">Login</a>
        @else
            <h2>Welcome, {{ Auth::user()->name }}!</h2>
            <a class="btn btn-lg btn-outline-primary" href="{{ route('login') }}" role="button">Go to your dashboard</a>
        @endguest
    </div>

    <div class="container">
        <div class="row">

            <div class="col-md-3">
                <h1 style="text-align: center; font-size: 100px;"><i class="fas fa-graduation-cap"></i></h1>
            </div>

            <div class="col-md-9">
                <h1>Students</h1>
                <p>MyAgenda is targeted for students. It's simple, free, and works on any device from anywhere
                    in the world. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium adipisci
                    animi aspernatur consequuntur corporis dolorum eveniet expedita hic inventore, mollitia nemo
                    nesciunt numquam officia perspiciatis qui reiciendis tempora? Commodi, facere?</p>
            </div>
        </div>
        <hr>
        <div class="row">

            <div class="col-md-3">
                <h1 style="text-align: center; font-size: 100px;"><i class="fas fa-chalkboard-teacher"></i></h1>
            </div>

            <div class="col-md-9">
                <h1>Teachers and Schools <span class="badge badge-success">Coming soon!</span></h1>
                <p>MyAgenda also has a great feature that allows teachers to register and assign students work so
                    they don't forget to do it! Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ab
                    architecto asperiores commodi consectetur dolor dolores eius est, iste itaque laudantium minus
                    mollitia nam nihil non odio sit ullam vero!</p>
            </div>
        </div>
    </div>
@endsection