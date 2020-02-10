<?php 

function pre_publish_social_content( $content ) {
  // get the post you are on 
  global $post;
  // if post is set and post type is a 'post' run this
  PC::debug($content);
  if( isset($post) && get_post_type( $post->ID ) == 'post' ){
    // take the 'post_content' and change the data
    // $content['post_content'] = 'changed content here!!!AGAIN!';
  }
  return $content;
}
add_filter( 'wp_insert_post_data', 'pre_publish_social_content' );

