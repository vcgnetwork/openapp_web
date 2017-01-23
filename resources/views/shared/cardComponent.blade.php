<div class="card">
    <header class="card-header">
        <div class="card-header-title">
            {{ $city->city }}, {{ $city->state }} {{ $city->country }} ({{ $city->zipcode }})
        </div>
        <div class="card-header-icon">
            <p class="control has-addons">
                <a class="button" title="Edit" href="/cities/{{ $city->id }}/edit"><span class="icon is-small"><i class="fa fa-edit"></i></span></a>
                <a class="button" title="Delete" href="/cities/{{ $city->id }}/delete"><span class="icon is-small"><i class="fa fa-trash"></i></span></a>
            </p>
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
            <small>ViewURL: {{ $city->wuiurl }}</small>
            <div class="clear"></div>
        </div>
    </div>
</div>
