@extends('layouts.login')
@section('content')

    @include('shared.bigTitle')
    <div class="title is-4">Register an Account</div>

    <div class="box">

        <form method="post" action="/users">
            {{ csrf_field() }}
            {{ method_field('POST') }}

            <div class="column is-full">
                <label class="label" for="full_name">Full Name</label>
                <input class="input" type="text" id="full_name" name="full_name" placeholder="Full Name" required="required" value="{{ old('full_name') }}">
            </div>

            <div class="column is-full">
                <label class="label" for="email">Email Address</label>
                <input class="input" type="text" id="email" name="email" placeholder="Email Address" required="required" value="{{ old('email') }}">
            </div>

            <div class="column is-full">
                <label class="label" for="password1">Password</label>
                <input class="input" type="password" id="password1" name="password1" placeholder="Password" required="required">
            </div>

            <div class="column is-full">
                <label class="label" for="password2">Confirm Password</label>
                <input class="input" type="password" id="password2" name="password2" placeholder="Confirm Password" required="required">
            </div>

            <div class="column is-full has-text-centered">
                <button type="submit" class="button is-success">Register</button>
                <button class="button is-dark">Cancel</button>
            </div>

        </form>

    </div>
@endsection
