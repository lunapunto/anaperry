<?php
$cl = pll_current_language();
$ises = $cl == 'es';
$slug = $ises ? 'blog' : 'blog-2';
?>
<div id="blog">

  <?php
    $args = array(
      'posts_per_page'  => 3,
      'post_type'       => 'post',
      'order'           => DESC,
      'order_by'        => 'date'
    );
    $posts = get_posts($args);
    foreach($posts as $post):
      if($post->ID == 68){
        break;
      }
      $media = get_media($post);
  ?>
    <div class="blog_td two-size">
      <a href="<?= get_post_permalink($post->ID);?>">
      <div class="post_thumb">
        <div class="center_info">
          <div class="title">
            <?= $post->post_title;?>
          </div>
          <div class="date">
            <?= date('d.m.Y', strtotime($post->post_date));?>
          </div>
        </div>
        <div class="post_img" style="background-image: url(<?= $media->small;?>)">

        </div>
      </div>
      </a>
    </div>
  <?php endforeach;?>

  <div class="blog_td">
    <a href="<?= get_page_url($slug);?>" class="simple_button cxy">
      <?= $ises ? 'Ver más' : 'View more';?>
    </a>
  </div>

</div>
