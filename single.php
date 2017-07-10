<?php
global $post;
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
$media = get_media($post);
$next = get_next_post();
$prev = get_previous_post();
$next_url = get_post_permalink($next->ID);
$prev_url = get_post_permalink($prev->ID);
$fburl = 'http://www.facebook.com/sharer/sharer.php?u='.urlencode(get_post_permalink($post->ID));
$twurl = 'https://twitter.com/intent/tweet?text='.urlencode($post->post_title).'&hashtag=Ana+Perry&url='.urlencode(get_post_permalink($post->ID));
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
        <?= $post->post_title;?>
      </div>

      <div class="ph-sharers">
        <div class="main-sharers">
          <div class="share-title">
            <?= $ises ? 'Compartir' : 'Share';?>
          </div>
          <a href="<?= $fburl;?>" target="_blank">
          <div class="sharer fb">
            FB
          </div>
          </a>
          <a href="<?= $twurl;?>" target="_blank">
          <div class="sharer tw">
            TW
          </div>
          </a>

          <a href="<?= $prev_url;?>">
          <div class="sharer next-prev">
            <
          </div>
          </a>
          <a href="<?= $next_url;?>">
          <div class="sharer next-prev">
            >
          </div>
          </a>

        </div>
      </div>

    </div>
  </header>

  <div class="post-single">
    <div class="post-thumb">
      <div style="background-image: url(<?= $media->large;?>)">

      </div>
    </div>
    <div class="post-content">
      <?= apply_filters('the_content', $post->post_content);?>
    </div>

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
