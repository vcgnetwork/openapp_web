@extends('layouts.login')
@section('content')

    @include('shared.bigTitle')
    <div class="title is-4">Login</div>

    <div class="box">

        <form id="login" method="POST" action="/login">
            {{ csrf_field() }}
            {{ method_field('POST') }}

            <label class="label">Email</label>
            <p class="control">
                <input class="input" type="text" name="email" placeholder="Email Address">
            </p>
            <label class="label">Password</label>
            <p class="control">
                <input class="input" type="password" name="password" placeholder="Password">
            </p>
            <hr>
            <p class="control">
                <button type="submit" class="button is-success">Login</button>
                <button class="button is-dark">Cancel</button>
            </p>
        </form>

    </div>

@endsection
