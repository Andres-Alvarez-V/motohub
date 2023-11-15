<form class="w-50 m-auto mb-3" action="" method="GET">
    @csrf
    <div class="input-group">
        <input type="text" class="form-control search-bar-app" name="search" placeholder="{{ trans('messages.search') }}..."/>
        <button type="submit" class="btn btn-primary-app">{{ trans('messages.search') }}</button>
    </div>
    @if(Route::currentRouteName() == 'user.motorcycle.index' || Route::currentRouteName() == 'admin.motorcycle.index')
        <select class="form-select w-25 m-auto mt-2 filter-app input-app" name="sortBy">
            <option value="" selected>No filter</option>
            <option value="desc">Descending price</option>
            <option value="asc">Ascending price</option>
        </select>
    @endif
</form>
