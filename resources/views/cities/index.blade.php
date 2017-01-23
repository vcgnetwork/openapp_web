@extends('layouts.default')
@section('content')

    <div class="columns is-multiline">

        {{--{{ dd($cities) }}--}}

        @if(! isset($cities))

            <div>no records Found</div>

        @else

            @foreach($cities as $city)

                <div class="column is-half-tablet is-one-quarter-widescreen">

                    @include('shared.cardComponent')

                </div>

            @endforeach

        @endif

    </div><!-- columns -->

@endsection
