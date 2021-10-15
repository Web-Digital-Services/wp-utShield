<?php

/**
 * From genesis/lib/classes/class-genesis-search-form.php.
 */

/** This filter is documented in wp-includes/general-template.php */
$search_query = apply_filters( 'the_search_query', get_search_query() ); // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound -- Duplicated WordPress filter

/**
 * Search form text.
 *
 * A bit of text that describes the search form or provides instruction for use.
 * It might be used as the input placeholder, or the form label (if a11y is on, and no label is provided).
 *
 * @since 1.0.0
 *
 * @param string The search text.
 */
$search_text = '';

$search_query_or_text = $search_query ?: $search_text;

?>

<form action="#" method="get" data-swpparentel="#menu__foot">
	<label for="find" class="hidden"></label>
<!--	<input type="text" placeholder="Browse Providers by name, specialty or location" name="find" id="find" value="" class="search__field js-find"/>-->
	<input type="text" placeholder="Browse Providers by name, specialty or location" name="s" id="s" value="<?= esc_attr( $search_query_or_text ); ?>" class="search__field js-find" data-swpparentel="#menu__foot"/>
	<input type="submit" value="GO" class="search__btn"/>
</form>
