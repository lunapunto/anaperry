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

$ppost = get_post(68);
$gallery = get_post_gallery_images(68);
?>

<section id="blog-type" class="min_full portfolio">
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
        <?= $ises ? 'Portafolio' : 'Portfolio';?>
      </div>

    </div>
  </header>

  <div class="gallery mason-type" data-featherlight-gallery data-featherlight-filter="a">
    <?php
    foreach($gallery as $gall):
    ?>
      <div class="mason-post post-gallery">

        <div class="post_thumb ">
          <a href="<?= $gall;?>" class="gall_a">
          <div class="post_img post-gallery" style="background-image: url(<?= $gall;?>)">

          </div>
          </a>
        </div>

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
