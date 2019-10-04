<?php
/*
 * Plugin Name: Os Share Page/Post Email
 * Plugin URI: bibliotecadeterminus.xyz
 * Description: Button for share page or post to friend in email
 * Version: 1.0.0
 * Author: Oscar Sanchez
 * Author URI: bibliotecadeterminus.xyz
 * Requires at least: 4.0
 * Tested up to: 4.3
 *
 * Text Domain: wpos-additional
 * Domain Path: /languages/
 */

use OsShareEmail\Mail\Mailer;
use OsShareEmail\Mail\SendToFriendMailer;
use OsShareEmail\Template\Template;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

require 'vendor/autoload.php';

add_action('wp_ajax_nopriv_send_friend', 'send_to_friend');
add_action('wp_ajax_send_friend', 'send_to_friend');

/**
 * Define the action and give functionality to the action.
 */
function add_form_send_to_friend() {
    do_action( 'add_form_send_to_friend' );
}

/**
 * Register the action with WordPress.
 */
add_action( 'add_form_send_to_friend', 'show_send_to_friend_form' );

/**
 * @return bool
 * @throws LoaderError
 * @throws RuntimeError
 * @throws SyntaxError
 */
function show_send_to_friend_form() {
    $idPost = get_the_ID();
    $post = get_post($idPost);

    if(!$post->show_share) {
        return false;
    }

    $templating  = new Template();
    $templating->render('form.twig',['id_post'=>  $idPost]);
}

add_action( 'wp_enqueue_scripts', 'my_script_files' );


function my_script_files()
{

    wp_enqueue_script('fixed-js',
        plugin_dir_url(__FILE__) . '/assets/js/share-email.js',
        array('jquery'),
        '1.0',
        true);

    wp_enqueue_style('shareemail', plugin_dir_url(__FILE__). '/assets/css/share-email.css', array(), 'all');

}

/**
 */
function send_to_friend()
{
    $idPost = filter_var($_POST['post'], FILTER_SANITIZE_NUMBER_INT);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    if(!$email || !$idPost) {
        wp_send_json(['message' => __('email post') , 'status' =>'error'], 500);
    }

    $post = get_post($idPost);

    if(!get_post($idPost)) {
        wp_send_json(['message' => __('id post') , 'status' =>'error'], 500);
    }

    $thumbID = get_post_thumbnail_id( $post->ID );
    $image = wp_get_attachment_url( $thumbID,'promo-thumb' );

    $url = get_post_permalink($post->ID);


    $mailing = new SendToFriendMailer();
    $mailing->sendEmail($post->post_title,$url,$email,$image);
    wp_send_json(['message' => __('Mensaje Enviado') , 'status' =>'ok'], 200);

}