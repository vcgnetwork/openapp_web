<form class="searchForm" method="POST" action="/search">
    {{ csrf_field() }}
    {{ method_field('POST') }}
    <div class="control is-grouped">
        <p class="control is-expanded">
            <input class="input" type="text" name="search_value" placeholder="Add City By Zipcode" autofocus>
        </p>
        <p class="control">
            <input type="submit" class="button is-primary" value="Add City">
        </p>
    </div>
</form>
