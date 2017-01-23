@extends('layouts.default')
@section('content')
    <section class="hero">
        <div class="hero-body">

            <div class="container">
                @if( isset($message) )
                    <div class="column is-6 is-offset-3 notification is-{{ $alert }}">
                        <button class="delete"></button>
                        {{ $message }}
                    </div>
                @endif

                <div class="title is-1">Hello, add a city by zipcode</div>

                <div class="column is-half is-offset-3">
                    <form id="searchForm" method="POST" action="/search">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}
                        <div class="control is-grouped">
                            <p class="control is-expanded">
                                <input class="input" type="text" name="search_value" placeholder="Search for a city by Zip">
                            </p>
                            <p class="control">
                                <a class="button is-primary">Search</a>
                            </p>
                        </div>
                    </form>
                </div>

            </div><!-- container -->

            <div class="columns is-multiline">
                {{--{{ dd($cities) }}--}}
                @if(! isset($cities))
                    <div>no records Found</div>
                @else
                    @foreach( $cities as $city )
                        <div class="column is-half-tablet is-one-quarter-widescreen">

                            <div class="card">
                                <header class="card-header">
                                    <div class="card-header-title">
                                        <span class="tag is-light">{{ $city->id }}</span>
                                        {{ $city->city }}, {{ $city->state }} {{ $city->country }} ({{ $city->zipcode }})
                                    </div>
                                    <div class="card-header-icon">
                                        <div class="control has-addons">

                                            <div class="button edit-partner" title="Edit" href="/cities/{{ $city->id }}/edit"><span class="icon is-small"><i class="fa fa-edit"></i></span></div>

                                            <div id="edit-modal" class="modal">
                                                <div class="modal-background"></div>
                                                <div class="modal-content has-text-left">
                                                    <div class="box">
                                                        <div class="title is-3"><strong>Edit City: {{ $city->city }}</strong></div>
                                                        <div class="subtitle is-6">Make your changes and click on update.</div>
                                                        <form id="editCity" method="post">
                                                            <div class="columns is-multiline">
                                                                {{ method_field('put') }}
                                                                {{ csrf_field() }}

                                                                <div class="column is-full has-text-right">
                                                                    <button class="button is-danger" type="submit" formaction="/cities/{{ $city->id }}">Update City</button>
                                                                    <button class="button cancel-modal">Cancel</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <button class="modal-close"></button>
                                            </div>

                                            <div class="button destroy-partner" title="Delete" href="/cities/{{ $city->id }}/delete"><span class="icon is-small"><i class="fa fa-trash"></i></span></div>

                                            <div id="destroy-modal" class="modal">
                                                <div class="modal-background"></div>
                                                <div class="modal-content">
                                                    <div class="box">
                                                        <div class="title is-2"><strong>Are You Really Sure?</strong></div>
                                                        <div class="subtitle is-3">There is no undo!</div>
                                                        <form id="destroyPartner" method="post">
                                                            {{ method_field('put') }}
                                                            {{ csrf_field() }}
                                                            <input type="submit" class="button is-danger" value="Delete City {{ $city->city }} ? (click me)" formaction="/user/{{ $city->id }}">
                                                            <button class="button cancel-modal">Cancel</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <button class="modal-close"></button>
                                            </div>

                                        </div>
                                    </div>
                                </header>
                                <div class="card-content">
                                    <div class="content">
                                        <img src="{{ $city->icon_url }}" alt="image" class="weather-icon">
                                        <p>Today: {{ $city->forecast }}</p>
                                        <p>Currently: {{ $city->weather }}</p>
                                        <p>Temperature: {{ $city->temperature_string }}</p>
                                        <p>Winds: {{ $city->wind_string }}</p>
                                        <small>{{ $city->observation_time }}</small>
                                        <small>Lat: {{ $city->lat }} Long: {{ $city->long }}</small>
                                        <small>ViewURL: <a target="_blank" href="{{ $city->wuiurl }}">View URL</a></small>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                @endif
            </div><!-- columns -->

        </div>
    </section>
@endsection
@section('scripts')
    <script>
        // GENERAL MODAL
        $(".modal-close").click(function () {
            $("#edit-modal").removeClass("is-active");
            $("#destroy-modal").removeClass("is-active");
        });

        // CLOSE EDIT MODAL
        $(".cancel-modal").click(function (event) {
            event.preventDefault();
            $("#edit-modal").removeClass("is-active");
            $("#destroy-modal").removeClass("is-active");
            return false;
        });

        // EDIT PARTNER
        $(".edit-partner").click(function () {
            $("#edit-modal").addClass("is-active");
        });

        // EDIT PARTNER
        $("#edit-partner").submit(function (event) {
            event.preventDefault();
            $.ajax({
                type: 'put',
                data: $('#edit-partner').serialize(), // Remember that you need to have your csrf token included
                success: function (result) {
                    $("#edit-modal").removeClass("is-active");
                    location.reload(true);
                    $('body').animate({scrollTop: 0}, 10);
                },
                error: function (result) {
                    $("#edit-modal").removeClass("is-active");
                }
            });
        });

        // DESTROY PARTNER
        $(".destroy-partner").click(function () {
            $("#destroy-modal").addClass("is-active");
        });

        // DESTROY PARTNER
        $("#destroy-partner").submit(function (event) {
            event.preventDefault();
            $.ajax({
                type: 'delete',
                data: $('#destroy-partner').serialize(), // Remember that you need to have your csrf token included
                success: function (result) {
                    $("#destroy-modal").removeClass("is-active");
                    window.location = '/users';
                    //location.reload(true);
                    //$('body').animate({scrollTop: 0}, 10);
                },
                error: function (result) {
                    $("#destroy-modal").removeClass("is-active");
                }
            });
        });
    </script>
@endsection