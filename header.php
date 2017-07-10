<?php
$bg = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

$keywords = array(
  // Keywords cliente
  'Ana Perry',
  'Makeup',
  'Makeup Artist',
  'Artist',
  // Keywords Luna Punto
  'Luna Punto',
  'Diseño Mexicano',
  'Tecnología',
  'Tech and design',
  'LP Worldwide',
  'Mauricio Martínez Robles',
  'Luis Luna',
  'Nicolás Franky',
  'Carlos Nevarez',
  'tech',
  'design',
  'websites',
  'apps',
  'sitios web',
  'Ibero',
  'UNAM',
  'empresarios',
  'Nápoles',
  'Condesa',
  'Roma Norte',
  'Roma Sur',
  'Roma',
  'iOS',
  'Android',
  'Windows'
);
?>
<!DOCTYPE html>
<html>
<head lang="es">
<title><?php echo theme_title();?></title>
<link href="<?= asset;?>/favicon.png" rel="icon" type="image/png"/>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0"/>
<meta charset="utf-8"/>
<meta name="author" content="Luna Punto" />
<meta name="keywords" content="<?= implode(',', $keywords);?>" />
<?php if(is_single()):?>
<meta property="og:url"  content="<?php echo get_post_permalink($post->ID);?>" />
<meta property="og:type" content="article" />
<meta property="og:title" content="<?php echo $post->post_title.' - Ana Perry Makeup Artist';?>" />
<meta property="og:image" content="<?php echo $bg;?>" />
<?php else:?>
  <meta property="og:url"  content="<?php echo get_home_url();?>" />
  <meta property="og:type" content="article" />
  <meta property="og:title" content="<?php echo 'Ana Perry Makeup Artist';?>" />
  <meta property="og:image" content="<?php echo $bg;?>" />
<?php endif;?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-31040358-13', 'auto');
  ga('send', 'pageview');

</script>
<?php wp_head();?>
</head>
<body <?php echo body_class();?>>
<div id="wrapper">
  <div id="loader">

  </div>
<div id="container">
