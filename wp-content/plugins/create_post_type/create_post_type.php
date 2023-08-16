<?php

/*
Plugin Name: Post Type Management
Description: Plugin project management for manage member, task,...
Version: 1.0.0
Author: Pham My
License: Giấy phép sử dụng của plugin (ví dụ: GPL2)
*/

add_action('init', 'register_car_post_type');
function register_car_post_type()
{
    $args = array(
        'labels' => array(
            'name' => __('Car'),
            'singular_name' => __('Car')
        ),
        'has_archive' => true,
        'public' => true,
        'rewrite' => array('slug' => 'car'),
        'show_in_rest' => true,
        // 'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments',)
    );
    register_post_type('car', $args);
}


add_action('rest_api_init',  'register_custom_fields');
function register_custom_fields()
{
    //register post attachment url field
    register_rest_field(
        'post',
        'attachment_url',
        array(
            'get_callback'      => 'get_attchment_url',
            'update_callback'   => 'set_attchment_url',
            'show_in_rest'      => true,
            'auth_callback'     => true
        )
    );

    //register post thums_up and thums_down field
    register_rest_field(
        'post',
        'thums_up',
        array(
            'get_callback'      => 'get_thumbs_up',
            // 'update_callback'   => 'set_thumbs_up',
            'show_in_rest'      => true,
            'auth_callback'     => 'permission_check'
        )
    );

    //register suggestion up/down votes
    register_rest_field(
        'suggestion',
        'up_vote',
        array(
            'get_callback'      => 'get_up_vote',
            'update_callback'   => 'set_up_vote',
            'show_in_rest'      => true,
            'auth_callback'     => 'permission_check'
        )
    );

    register_rest_field(
        'suggestion',
        'down_vote',
        array(
            'get_callback'      => 'get_down_vote',
            'update_callbacl'   => 'set_down_vote',
            'show_in_rest'      => true,
            'auth_callback'     => 'permission_check'
        )
    );

    //register enpoint: domain.com/wp-json/powerapi/v1/siteinfomation
    register_rest_route(
        'powerapi/v1',
        '/siteinfomation',
        array(
            'methods'       => 'GET',
            'callback'      => 'get_site_information'
        )
    );

    //register endpoint: domain.com/wp-json/powerapi/v1/thingtoget
    register_rest_route(
        'powerapi/v1',
        'things',
        array(
            'methods'       => 'GET,POST,DELETE',
            'callback'      => 'get_the_things',
            'args'          => array(
                'id'        => array('validate_callback' => 'validate_id'),
                'title'     => array('validate_callback' => 'validate_id')
            ),
            'permission_callback'   => 'permission_check'
        )
    );

    //register endpoint: domain.com/wp-json/powerapi/v1/thingstoget
    register_rest_route(
        'powerapi/v1',
        'things/(?P<link_id>\d+)',
        array(
            'methods'       => 'GET, POST, PUT, PATCH, DELETE',
            'callback'      => 'get_one_thing',
            'args'          => array(
                'id'        => array('validate_callback' => 'validate_id'),
                'title'     => array('validate_callback' => 'validate_id')
            ),
            'permission_callback'   => 'permission_check'
        )
    );

    register_rest_field(
        'car',
        'list_image',
        array(
            'get_callback'      => 'get_list_image',
            'update_callback'   => null,
            'show_in_rest'      => true,
            'auth_callback'     => true
        )
    );

    register_rest_route(
        'car/v1',
        'list_image/(?P<link_id>\d+)',
        array(
            'methods'       => 'PUT',
            'callback'      => 'update_list_image',
            'args'          => array(
                'id'        => array('validate_callback' => 'validate_id'),
                'title'     => array('validate_callback' => 'validate_id')
            ),
            'permission_callback'   => 'permission_check'
        )
    );


    //examle
    register_rest_route('car/v1', '/list_image/(?P<post_id>\d+)', array(
        'methods' => 'POST',
        'callback' => 'update_list_image_media'
    ));
}

function update_list_image(WP_REST_Request $request)
{
    // $things_form_database = array(
    //     array('id' => 1, 'name' => 'Thing name'),
    //     array('id' => 2, 'name' => 'Thing name two'),
    //     array('id' => 3, 'name' => 'Thing name three')
    // );
    // if ($things_form_database) {
    //     return new WP_REST_Response($things_form_database);
    // }
    // return new WP_REST_Response(array('Nothing found'), 404);
    $data = $request;
    return new WP_REST_Response($data);
}

function update_list_image_media($req)
{

    $param = $req->get_params();
    $post_id = $param['post_id'];
    $list_image = $param['list_image'];
    update_post_meta($post_id, 'list_image', $list_image);
    $res = new WP_REST_Response($list_image);
    $res->set_status(200);
    return ['list_image' => $res];
}




function get_list_image($car, $field_name, $request = "")
{
    $list_image =   get_post_meta($car['id'], $field_name, false)[0];
    $data = [];
    if ($list_image != "" && count($list_image) > 0) {
        for ($i = 0; $i < count($list_image); $i++) {
            // array_push($data, $list_image[$i]);
            $image = get_post_meta($list_image[$i], '_wp_attachment_metadata', true);
            $image['id'] = $list_image[$i];
            array_push($data, $image);
        }
    }
    return $data;
}

function get_attchment_url($post)
{
    return get_the_post_thumbnail_url($post, 'large');
}

function set_attchment_url($value, $post, $request)
{
    return get_the_post_thumbnail_url($post, 'large');
}


function get_thumbs_up($post, $field_name, $request)
{
    $thumbs = get_post_meta($post['id'], 'thumb_up', true);
    $thumbs = !empty($thumbs) ? $thumbs : 0;
    return $thumbs;
}

// function set_thumbs_up( $value, $post, $field_name ) {
//     $thumbs_up = get_thumbs_up( $post ) + $value;
//     return update_post_meta( $post['id'], $field_name, $thumbs_up );
// }


function permission_check($request)
{
    return true;
}

function get_up_vote($suggetion, $field_name, $request = "")
{
    $up_vote = get_post_meta($suggetion['id'], $field_name, true);
    $up_vote = $up_vote ? $up_vote : 0;
    return $up_vote;
}

function set_up_vote($value, $suggetion, $field_name)
{
    $up_vote = get_up_vote($suggetion, $field_name) + 1;
    return update_post_meta($suggetion['id'], $field_name, $up_vote);
}


function get_down_vote($suggetion, $field_name, $request = "")
{
    $up_vote = get_post_meta($suggetion['id'], $field_name, true);
    $up_vote = $up_vote ? $up_vote : 0;
    return $up_vote;
}


function set_down_vote($value, $suggetion, $field_name)
{
    $up_vote = get_down_vote($suggetion, $field_name) + 1;
    return update_post_meta($suggetion['id'], $field_name, $up_vote);
}


function get_site_information()
{
    return new WP_REST_Response(array(
        'page'      => wp_count_posts('page'),
        'posts'     => wp_count_posts('post'),
        'suggestion' => wp_count_posts('suggestion'),
    ));
}


function get_the_things($request)
{
    $things_form_database = array(
        array('id' => 1, 'name' => 'Thing name'),
        array('id' => 2, 'name' => 'Thing name two'),
        array('id' => 3, 'name' => 'Thing name three')
    );
    if ($things_form_database) {
        return new WP_REST_Response($things_form_database);
    }
    return new WP_REST_Response(array('Nothing found'), 404);
}


function get_one_thing($request)
{
    // get params from request.
    // get data from custom table using $wpdb
    // get item whose id is $request['id']

    $thing_from_database = array('id' => 1, 'name' => 'Thing name');

    if ($thing_from_database) {
        return new WP_Rest_Response($thing_from_database, 200);
    }

    return new WP_Rest_Response(array('Nothing found'), 404);
}


// add_action('init', 'register_custom_post_type');

// function register_custom_post_type()
// {
//     $args = array(
//         'labels' => array(
//             'name' => __('Car'),
//             'singular_name' => __('Car')
//         ),
//         'has_archive' => true,
//         'public' => true,
//         'rewrite' => array('slug' => 'car'),
//         'show_in_rest' => true,
//         // 'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments',)
//     );
//     register_post_type('car', $args);
// }



// add_action('rest_api_init',  'register_custom_fields');
// function register_custom_fields()
// {
//     register_rest_field(
//         'car',
//         'list_image',
//         array(
//             'get_callback'      => 'get_list_image',
//             'update_callback'   => null,
//             'show_in_rest'      => true,
//             'auth_callback'     => true
//         )
//     );

//     //register endpoint: domain.com/wp-json/powerapi/v1/things
//     register_rest_route(
//         'powerapi/v1',
//         'things',
//         array(
//             'methods'       => 'GET, POST, PUT, PATCH, DELETE',
//             'callback'      => 'get_one_thing',
//             'permission_callback'   => true
//         )
//     );
// }

// function get_one_thing($request)
// {
//     $thing_from_database = array('id' => 1, 'name' => 'Thing name');
//     if ($thing_from_database) {
//         return new WP_Rest_Response($thing_from_database, 200);
//     }
//     return new WP_Rest_Response(array('Nothing found'), 404);
// }

// function get_list_image($car, $field_name, $request = "")
// {
//     $list_image =   get_post_meta($car['id'], $field_name, false)[0];
//     $data = [];
//     if ($list_image != "" && count($list_image) > 0) {
//         for ($i = 0; $i < count($list_image); $i++) {
//             // array_push($data, $list_image[$i]);
//             $image = get_post_meta($list_image[$i], '_wp_attachment_metadata', true);
//             $image['id'] = $list_image[$i];
//             array_push($data, $image);
//         }
//     }
//     return $data;
// }


// add_filter('wp_update_core_button_args', function ($args) {
//     $args['button_text'] = 'Cập nhật ngay bây giờ!';
//     return $args;
// });

// add_filter('wp_update_core_button_args', function ($args) {
//     $args['button_color'] = 'red';
//     return $args;
// });



// function add_data_to_block($block)
// {
//     // Thêm dữ liệu vào khối.
//     $block->data['my_data'] = 'This is some data that I added to the block.';
//     // die("hello ca nha yeu");
// }

// // Đăng ký hàm xử lý với hook `block_added`.
// add_action('block_added', 'add_data_to_block');


if (!defined('PROJECT_MANAGEMENT_PATH')) {
    define('PROJECT_MANAGEMENT_PATH', plugin_dir_path(__FILE__));
}

require_once(PROJECT_MANAGEMENT_PATH . 'shortcode/shortcode_init.php');

new shortcodeInit();