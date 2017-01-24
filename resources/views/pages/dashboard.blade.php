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
                <div class="columns is-multiline">
                    @if( $cities->isEmpty() )
                        <div class="column is-full">
                            <div class="title is-3">Sorry, No records Found</div>
                            <div class="column is-6 is-offset-3">
                                @include('shared.searchForm')
                            </div>
                        </div>
                    @else
                        <div class="column is-full">
                            @include('shared.searchForm')
                        </div>
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
                                                <div class="button destroy-city" title="Delete">
                                                    <span class="icon is-small"><i class="fa fa-trash"></i></span>
                                                </div>
                                                <div id="destroy-modal" class="modal">
                                                    <div class="modal-background"></div>
                                                    <div class="modal-content">
                                                        <div class="box">
                                                            <div class="title is-2"><strong>Are You Really Sure?</strong></div>
                                                            <div class="subtitle is-3">There is no undo!</div>
                                                            <form id="destroyCity" method="post">
                                                                {{ method_field('delete') }}
                                                                {{ csrf_field() }}
                                                                <input type="hidden" id="city_id" data-name="city_id" value="{{ $city->id }}">
                                                                <input type="submit" class="button is-danger" value="Delete City {{ $city->id }}/{{ $city->city }} ? (click me)" formaction="/cities/{{ $city->id }}">
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
            </div><!-- container -->
        </div><!-- hero-body -->
    </section>
@endsection
@section('scripts')
    <script>
        // DESTROY CITY
        $(".destroy-city").click(function () {
            $("#destroy-modal").addClass("is-active");
        });

        // DESTROY CITY
        $("form#destroyCity").submit(function (e) {
            var city_id = $('#city_id').val();
            $.ajax({
                url: '/cities/' + city_id,
                type: 'delete',
                data: $('form#destroyCity').serialize(), // Remember that you need to have your csrf token included
                success: function (response) {
                    $("#destroy-modal").removeClass("is-active");
                    if (response.response === 'success') {
                        location.href = '/';
                    } else {
                        //$("article.message").toggle().addClass('is-danger');
                        //$(".message-header-text").html(response.messageHeader);
                        //$(".message-text").html(response.message);
                    }
                },
                error: function (response) {
                    console.log(response);
                    $("#destroy-modal").removeClass("is-active");
                    console.log('XHR Request Failed');
                }
            });
            e.preventDefault();
            return false;
        });
    </script>
@endsection
