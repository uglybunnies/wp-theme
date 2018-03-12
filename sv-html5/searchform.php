<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/" >
    <fieldset>
        <legend class="none">Search SerpentVenom</legend>
        <label class="hidden" for="s">Search for:</label>
        <input id="s" type="text" value="<?php the_search_query(); ?>" name="s" />
        <button type="submit" id="searchsubmit" name="searchsubmit">Search</button>
    </fieldset>
</form>