<?php
$url = 'https://www.youtube.com/feeds/videos.xml?user=anacq19';
$xml_string = file_get_contents($url);
$xml = simplexml_load_string($xml_string);
$json = json_encode($xml);
$array = json_decode($json,TRUE);
$entries = $array['entry'];
$entries = array_slice($entries, 0, 3);
$x = 0;
$limit = 3;
$author_uri = $array['author']['uri'];
$page_uri = get_page_by_path('channel', OBJECT);
$page_uri = get_post_permalink($page_uri->ID);
$cl = pll_current_language();
$ises = $cl == 'es';
?>
<div id="blog">
  <?php
    foreach($entries as $entry):
      $uri = $entry['link']['@attributes']['href'];
      $url = 'http://img.youtube.com/vi/'.substr($entry['id'], 9).'/0.jpg';
  ?>
    <div class="blog_td two-size">
      <a href="<?= $uri;?>">
      <div class="post_thumb">
        <div class="center_info">
          <div class="title">
            <?= $entry['title'];?>
          </div>
          <div class="date">
            <?= date('d.m.Y', strtotime($entry['published']));?>
          </div>
        </div>
        <div class="post_img" style="background-image: url(<?= $url;?>)">

        </div>
      </div>
      </a>
    </div>
  <?php endforeach;?>

  <div class="blog_td">
    <a href="https://www.youtube.com/user/anacq19" class="simple_button cxy" target="_blank">
      <?= $ises ? 'Ver más' : 'View more';?>
    </a>
  </div>

</div>
