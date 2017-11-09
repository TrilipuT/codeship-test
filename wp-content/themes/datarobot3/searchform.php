<form role="search" method="get" class="search-form form-inline" action="/">
    <label for="s">
        <i class="icon-magnify"></i>
        <input type="search" class="text transition" required value="<?= get_search_query() ?>" name="s"
               placeholder="<?= get_search_query() ?: 'Search' ?>"/>
    </label>
</form>