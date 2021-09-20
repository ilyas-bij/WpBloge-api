<?php
/**
 * @package WpApi
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


add_theme_support('post-thumbnails', array ('post','work','custom_post'));
set_post_thumbnail_size( 140, 140, true );


		add_action( 'rest_api_init', function () {
			register_rest_route( 'api/v1', '/posts', array(
			'methods' => 'GET',
			'callback' => 'All_posts',
			) );
		} );

function All_posts(){
			$args = array(
				'post_type' => 'post',
				'posts_per_page'	=> -1,
				'post_status'	=> array('publish'),
			);

	$Tposts = array();
		$the_query = new WP_Query( $args );
	
		if($the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
					$postBlock	    = get_post();
					$categories 	= wp_get_post_terms($postBlock->ID, 'category', array( 'parent' => 0 ));//$post->I
					$ID				= $postBlock->ID;
					$titleBLoc 		= $postBlock->post_title;
					$imgBloc 		= get_the_post_thumbnail_url($postBlock->ID,'swissdelight_core_image_size_square');
					$date 			= get_the_date('d M Y',$postBlock->ID);
					$type           = $postBlock->post_type;
					$desc 			= get_field('post_description', $postBlock->ID);
					$cate = array();

					foreach($categories as $categop){
						$cate[] = array( 
							'id'=> $categop->term_id,
							'cat' => $categop->slug,
						);
					}
					$Tposts[] = array(
						'id'  => $ID,
						'name' => $titleBLoc,
						'image'  => $imgBloc,
						'description' =>  strip_tags($desc),
						'date'  => $date,
						'type' => $type,
						'categories' => $cate,
					);

			endwhile;
		endif;
		echo json_encode($Tposts);
}



add_action( 'rest_api_init', function () {
	register_rest_route( 'api/v1', '/postById', array(
	'methods' => 'GET',
	'callback' => 'postsById',
	) );
} );
/* get posts by id */
function postsById()  {
	$post_id  = $_REQUEST['id'];
	$post = get_post($post_id );
	$Tposts = array();
	if($post) {
					$categories 	= wp_get_post_terms($post->ID, 'category', array( 'parent' => 0 ));//$post->I
					$ID				= $post->ID;
					$titleBLoc 		= $post->post_title;
					$imgBloc 		= get_the_post_thumbnail_url($post->ID,'swissdelight_core_image_size_square');
					$date 			= get_the_date('d M Y',$post->ID);
					$type           = $post->post_type;
					$desc 			= get_field('post_description', $post->ID);
					$cate = array();

					foreach($categories as $categop){
						$cate[] = array( 
							'id'=> $categop->term_id,
							'cat' => $categop->slug,
						);
					}
					$Tposts[] = array(
						'id'  => $ID,
						'name' => $titleBLoc,
						'image'  => $imgBloc,
						'description' =>  strip_tags($desc),
						'date'  => $date,
						'type' => $type,
						'categories' => $cate,
					);
	}
		echo json_encode($Tposts);
}


add_action( 'rest_api_init', function () {
	register_rest_route( 'api/v1', '/postByCat', array(
	'methods' => 'GET',
	'callback' => 'postsByCat',
	) );
} );
/* get posts by categorie */
function postsByCat()  {

	$args = array(
		'post_type' => 'post',
		'posts_per_page'	=> -1,
		'post_status'	=> array('publish'),
	);

$Tposts = array();
$the_query = new WP_Query( $args );

if($the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
			$postBlock	    = get_post();
			$categories 	= wp_get_post_terms($postBlock->ID, 'category', array( 'parent' => 0 ));

			foreach($categories as $categop){
				if ($categop->slug ===  $_REQUEST['cat']) {
					$ID				= $postBlock->ID;
					$titleBLoc 		= $postBlock->post_title;
					$imgBloc 		= get_the_post_thumbnail_url($postBlock->ID,'swissdelight_core_image_size_square');
					$date 			= get_the_date('d M Y',$postBlock->ID);
					$type           = $postBlock->post_type;
					$desc 			= get_field('post_description', $postBlock->ID);

					$Tposts[] = array(
						'id'  => $ID,
						'name' => $titleBLoc,
						'image'  => $imgBloc,
						'description' =>  strip_tags($desc),
						'date'  => $date,
						'type' => $type,
						'categories' =>$_REQUEST['cat'],
					);
				}
			}
	
	endwhile;
endif;
echo json_encode($Tposts);


}


// http://localhost/WpBlog/wp-json/api/v1/posts
// http://localhost/WpBlog/wp-json/api/v1/postById?id=14
// http://localhost/WpBlog/wp-json/api/v1/postByCat?cat=sport
  ?>