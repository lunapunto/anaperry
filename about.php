<?php
  $cl = pll_current_language();
  $ises = $cl == 'es';
  $slug = $ises ? 'about' : 'about-me';
  $about = get_page_by_path($slug, OBJECT);
?>

<div id="about">

  <div class="gif-center">
    <div class="gif">
      <video autoplay loop>
        <source src="<?= asset.'/videoAbout2.mp4';?>" type="video/mp4">
      </video>
    </div>


  </div>
  <div class="content">
    <?= apply_filters('the_content',$about->post_content);?>
  </div>


</div>
