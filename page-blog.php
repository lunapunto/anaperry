<?php
get_header();
$args = array(
  'raw'   => 1,
  'echo'  => 0,
  'hide_current' => 1
);
$langs = pll_the_languages($args);
$langs = reset($langs);
$url = $langs['url'];
$locale = $langs['locale'];

$postargs = array(
  'posts_per_page'  => 30,
  'post_type'       => 'post',
  'order'           => DESC,
  'order_by'        => 'date'
);
$posts = get_posts($postargs);
?>

<section id="blog-type" class="min_full">
  <header class="post-header">
    <div class="ph-col">
      <a href="<?= get_home_url();?>">
      <div class="ph-img">
        <img src="<?= asset.'/logo.svg';?>">
      </div>
      </a>
    </div>
    <div class="ph-col">

      <div class="ph-post-title">
        Blog
      </div>

    </div>
  </header>

  <div class="posts-section mason-type">
    <?php
    foreach($posts as $post):
      if($post->ID == 68){
        break;
      }
      $media = get_media($post);
    ?>
      <div class="mason-post">

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
  </div>

  <div class="redes-footer show-redes-footer">
      <div class="redes-flex">
        <?php if(!$ises):?>
        <div class="red-td">
          <a href="<?= $url;?>" title="Español" hreflang="" lang="<?= $locale;?>">
            <img src="<?= asset.'/mexico.svg';?>">
          </a>
        </div>
      <?php else:?>
        <div class="red-td">
          <a href="<?= $url;?>" title="English" hreflang="" lang="<?= $locale;?>">
            <img src="<?= asset.'/usa.svg';?>">
          </a>
        </div>
      <?php endif;?>
        <?php foreach($redes as $slug=>$url):?>
          <div class="red-td">
            <a href="<?= $url;?>" target="_blank">
              <img src="<?= asset.'/'.$slug.'.svg';?>">
            </a>
          </div>
        <?php endforeach;?>
      </div>
  </div>
</section>


<?php get_footer();?>
