@extends('layouts.default')
@section('content')
    <section class="hero is-orange has-text-centered nav-adjustment">
        <div class="hero-body">
            <div class="container">
                <div class="column">
                    <div class="title is-1 has-text-centered">Partner <strong>Dashboard</strong></div>
                    <div class="subtitle is-5 has-text-centered">Select an partner to edit.
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="hero is-fullheight has-text-centered">
        <div class="container is-fluid">
            @include('shared.message-alert')
            <div class="columns is-multiline">
                @forelse ($users as $user)
                    <div class="column is-half-tablet is-one-third-desktop is-one-quarter-widescreen">
                        @include('shared.user.user-card')
                    </div>
                @empty
                    <div class="column has-text-centered">
                        <div class="title">No Partners</div>
                        <div class="subtitle"><a href="/user/create">Add Partner</a></div>
                    </div>
                @endforelse
            </div><!-- columns -->
        </div>
    </section>
@endsection
