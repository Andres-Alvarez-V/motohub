<form class="w-50 mx-auto mb-3" action="" method="GET">
    @csrf
    <div class="input-group">
        <input type="text" class="form-control search-bar-app" name="search" placeholder="{{ trans('messages.search') }}..."/>
        <button type="submit" class="btn btn-primary-app">{{ trans('messages.search') }}</button>
    </div>
</form>
