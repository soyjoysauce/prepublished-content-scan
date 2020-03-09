<?php 
function pre_publish_social_content( $data, $post ) {
  // get the post and set it to global var
  global $post;
    // if post is set and post type is a 'post' run this
  if( isset($post) && get_post_type( $post->ID ) == 'post' ){
    // take the 'post_content' and change the data
    //REGEX to look for in post_content
    $pattern_yelp = '/<div[^>]*social=\\\\"yelp\\\\"[^>]*>[^~]*?<\/div>/'; // <div social="yelp"></div>
    $pattern_facebook = '/<div[^>]*social=\\\\"facebook\\\\"[^>]*>[^~]*?<\/div>/'; // <div social="facebook"></div>
    $pattern_twitter = '/<div[^>]*social=\\\\"twitter\\\\"[^>]*>[^~]*?<\/div>/'; // <div social="yelp"></div>
    // $pattern_array stores regex patterns in array
    $pattern_array = [ $pattern_yelp, $pattern_facebook, $pattern_twitter];

    // Retrieve Social Media URL from .env file
    $yelp_url = getenv('YELP_URL');
    $facebook_url = getenv('FACEBOOK_URL');
    $twitter_url = getenv('TWITTER_URL');

    // HTML to replace REGEX search 
    $replace_yelp = '<div social="yelp" class="social-yelp"><a href=\"'.$yelp_url.'\">Visit Yelp For More Info</a></div>';
    $replace_facebook = '<div social="facebook" class="social-facebook"><a href=\"'.$facebook_url.'\">Visit Facebook For More Info</a></div>';
    $replace_twitter = '<div social="twitter" class="social-twitter"><a href=\"'.$twitter_url.'\">Visit Twitter For More Info</a></div>';
    // $replace_array stores HTML patters that will replace REGEX
    $replace_array = [ $replace_yelp, $replace_facebook, $replace_twitter];

    // preg_replace : Take pattern array and replace it with its content and then place inside $data['post_content']
    $data['post_content'] = preg_replace($pattern_array, $replace_array, $data['post_content']);

  }
  return $data;
}
add_filter( 'wp_insert_post_data', 'pre_publish_social_content', 99, 2 );