<?php

// This code snippet displays custom taxonomies for a particular post with that post


// On the Home, Single, & Archives pages: display the product & the taxonomies for that product    
function display_post_taxonomy_list( $content ) {  
      if( is_home() || is_archive() || is_single() ) { 						//if the page displayed is the home, archive, or single post page
        
        // outputs the taxonomies associated with the post 
            $taxs = get_post_taxonomies($post->ID);  						//get the posts taxonomies for this particular post
            foreach ($taxs as $tax){
	        $before = $tax . ": "; 											//add a colon and a space between the taxonomy label and the taxonomy
	        echo get_the_term_list( $post->ID, $tax, $before, ' ', '' );	//list the taxonomy label, the colon and space, and the taxonmies
	        }
	   }  
          
        return $content;  
      
}        
    add_filter( 'the_content', 'display_post_taxonomy_list' ); 				//display the stuff to the post content
