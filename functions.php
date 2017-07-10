<?php
require_once 'vendor/autoload.php';
use Postmark\PostmarkClient;
$dir = get_stylesheet_directory_uri();
$portID = 68;
/* Global variables */

define('dir', $dir);
define('asset', dir.'/assets');

/* Polylang*/
$cl = pll_current_language();
# ¿Es español?
$ises = $cl == 'es';

$redes = array();
$redes['instagram'] = 'https://www.instagram.com/anaperry_mua/';
$redes['youtube'] = 'https://www.youtube.com/channel/UC0muUahyuN-TbHyXe7F3Dyw';
$redes['facebook'] = 'https://www.facebook.com/anaperry.makeup/?fref=ts';
$redes['twitter'] = 'https://twitter.com/anaperry_mua';
$redes['pinterest'] = 'https://pinterest.com/anaperry_mua';
$redes['lunapunto'] = 'https://lunapunto.com';

function theme_title(){
    global $post;
    $subfix = get_bloginfo('name');
    $middle = '|';
    $name = $post->post_name;
    if($name == 'home'){
    return $subfix;
    }else{
    $prefix = $post->post_title.' '.$middle.' '.$subfix;
    return $prefix;
    }
}
function pdate($timestamp, $istime = false){
    $months = array();
    $months[] = 'enero';
    $months[] = 'febrero';
    $months[] = 'marzo';
    $months[] = 'abril';
    $months[] = 'mayo';
    $months[] = 'junio';
    $months[] = 'julio';
    $months[] = 'agosto';
    $months[] = 'septiembre';
    $months[] = 'octubre';
    $months[] = 'noviembre';
    $months[] = 'diciembre';
    $badtime = false;
    if($istime){
       $ts = $timestamp;
    }else{
      $ts = strtotime($timestamp);
    }

    if(!$ts){
      $badtime = true;
    }

    $month = date('n',$ts);
    $month = $months[$month-1];
    $day = date('j',$ts);
    $year = date('Y',$ts);

    $h = date('H:i',$ts).'hrs.';

    $rspns = $day.' de '.$month.' del '.$year.', '.$h;
    if($badtime){
      $rspns = 'Sin fecha';
    }
    return $rspns;
}
function scriptsstyles(){
    global $dir;
    wp_enqueue_style('font','https://fonts.googleapis.com/css?family=Montserrat:400,700');
    wp_enqueue_style('fonts','https://fonts.googleapis.com/css?family=Gruppo|Harmattan|Poiret+One');
    wp_enqueue_style('flatpick', $dir.'/bower_components/flatpickr/dist/flatpickr.css');
    wp_enqueue_style('feather', '//cdn.rawgit.com/noelboss/featherlight/1.7.6/release/featherlight.min.css');
    wp_enqueue_style('feather_gall', '//cdn.rawgit.com/noelboss/featherlight/1.7.6/release/featherlight.gallery.min.css');
    wp_enqueue_style('master', $dir.'/style.css');
    wp_enqueue_script('jquery');
    wp_enqueue_script('feather', '//cdn.rawgit.com/noelboss/featherlight/1.7.6/release/featherlight.min.js');
    wp_enqueue_script('feather_gall', '//cdn.rawgit.com/noelboss/featherlight/1.7.6/release/featherlight.gallery.min.js');
    wp_enqueue_style('jconfirm', $dir.'/bower_components/jquery-confirm2/dist/jquery-confirm.min.css');
    wp_enqueue_script('jconfirm', $dir.'/bower_components/jquery-confirm2/dist/jquery-confirm.min.js');
    wp_enqueue_script('granim', $dir.'/bower_components/granim/dist/granim.min.js');
    wp_enqueue_script('flatpick', $dir.'/bower_components/flatpickr/dist/flatpickr.min.js');
    wp_enqueue_script('flatpick_es', $dir.'/bower_components/flatpickr/dist/l10n/es.js');
    wp_enqueue_script('materialize', $dir.'/bower_components/materialize/dist/js/materialize.min.js');
    wp_enqueue_script('master',$dir.'/master.js');
}
add_action('wp_enqueue_scripts', 'scriptsstyles');

add_filter('show_admin_bar', '__return_false');
add_theme_support( 'post-thumbnails' );

add_action('wp_ajax_getpart', 'getpart');
add_action('wp_ajax_nopriv_getpart', 'getpart');
function getpart(){
  $part = $_POST['part'];
  echo get_template_part($part);
  wp_die();
}

function custom_san($text){
  $text = sanitize_text_field($text);
  $text = strtolower($text);
  $text = str_replace(array(' ', '-'), array('_', ''), $text);
  return $text;
}

add_action('wp_ajax_sendAppointment', 'sendAppointment');
add_action('wp_ajax_nopriv_sendAppointment', 'sendAppointment');
function sendAppointment(){
  $client = new PostmarkClient("2ae46789-c610-4428-9ef5-05c07e9b78a7");
  $p = $_POST;
  $f = $p['form'];
  $form = array(
    'name'      => $f[0]['value'],
    'email'     => $f[1]['value'],
    'option_1'  => $f[2]['value'],
    'option_2'  => $f[3]['value'],
    'at'        => $f[4]['value'] == 2 ? 'Estudio de AP' : 'Dirección particular',
  );
  $form['option_1'] = pdate($form['option_1']);
  $form['option_2'] = pdate($form['option_2']);

  $o = array();
  $p = $form;
  $tm = array(
    "nombre" => $p['name'],
    "email" => $p['email'],
    "opcion1" => $p['option_1'],
    "opcion2" => $p['option_2'],
    "lugar" => $p['at']
  );

  $msg = array(
      'TemplateId'    => 2393281,
      'TemplateModel' => $tm,
      'From'          => 'appointments@anaperrymakeup.com',
      'To'            => 'hello@anaperrymakeup.com'
  );

  $client->sendEmailBatch([$msg]);

  $o['post'] = $p;
  $o['postmarkRspns'] = $sendResult;

  $o['originalForm'] = $form;

  echo json_encode($o);
  wp_die();
}

function get_media($post){
  $small = get_the_post_thumbnail_url($post, 'post-thumbnail');
  $large = get_the_post_thumbnail_url($post, 'large');
  $o = array(
    'small' => $small,
    'large' => $large
  );
  $o = (object) $o;
  return $o;
}
function get_page_url($slug){
  $page = get_page_by_path($slug, OBJECT);
  $url = get_post_permalink($page->ID);
  return $url;
}
