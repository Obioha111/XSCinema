<form role="search" method="get" class="searchform" action="<?php echo esc_url(home_url( '/' )); ?>">
    <label>
        <input type="text" class="search"
            placeholder="<?php esc_attr_e( 'Search here..', 'picorama' ) ?>"
            value="<?php echo get_search_query() ?>" name="s"
            title="<?php esc_attr_e( 'Search for:', 'picorama' ) ?>" />
    </label>
   
</form>