<?php

/**
 * Gets all products which have a common category or tag
 * TODO: Add stock check?
 *
 * @return  array
 */
public function get_related( $limit = 5 ) {

    // Get the tags & categories
    $tags = wp_get_post_terms($this->ID, 'product_tag', array('fields' => 'ids'));

    // No queries if we don't have any tags -and- categories (one -or- the other should be queried)
    if( empty( $tags ) )
        return array();

    // Only get related posts that are in stock & visible
    $query = array(
        'posts_per_page' => $limit,
        'post__not_in'   => array( $this->ID ),
        'post_type'      => 'product',
        'fields'         => 'ids',
        'orderby'        => 'rand',
        'meta_query'     => array(
            array(
                'key'       => 'visibility',
                'value'     => array( 'catalog', 'visible' ),
                'compare'   => 'IN',
            ),
        ),
        'tax_query'       => array(
            'relation'       => 'OR',
            array(
                'taxonomy'   => 'product_cat',
                'field'      => 'id',
                'terms'      => $cats
            ),
            array(
                'taxonomy'   => 'product_tag',
                'field'      => 'id',
                'terms'      => $tags
            ),
        ),
    );

    // Run the query
    $q = get_posts( $query );
    wp_reset_postdata();

    return $q;
}