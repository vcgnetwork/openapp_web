<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Weather Station') }}</title>

    <link href="//fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.3.1/css/bulma.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="/css/app.css"/>

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>

@include('shared.navigation')

<section class="hero is-primary is-bold nav-adjustment">
    <div class="hero-body">
        <div class="container">
            <div class="content has-text-centered">
                @include('shared.bigTitle')
                <h2>Current weather conditions</h2>
            </div><!-- content -->
        </div><!-- container -->
    </div>
</section>
<section class="hero">
    <div class="hero-body">
        <div class="container is-fluid">
            <div class="content has-text-centered">
                @yield('content')
            </div>
        </div><!-- content -->
    </div><!-- container -->
</section>


@if (View::hasSection('footer'))
    @yield('footer')
@else
    @include('shared.footer')
@endif

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="/js/app.js"></script>

@yield('scripts')

</body>
</html>
