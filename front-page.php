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
?>


<section class="full" id="front">

  <div id="closecols" onclick="resetCols()">
    X
  </div>

  <div class="cols loading">
    <div class="col maincol">
      <div class="col-header">
        <img src="<?= asset.'/logo.svg';?>">
      </div><!-- Colheader -->
      <div class="col-menu">
        <a href="javascript:void(0)" class="getPart" data-part="blog">
        <div class="cmtd">
          Blog
        </div>
        </a>
        <a href="javascript:void(0)" class="getPart" data-part="about">
        <div class="cmtd">
          Bio
        </div>
        </a>
        <a href="javascript:void(0)" class="getPart" data-part="channel">
        <div class="cmtd">
          <?= $ises ? 'Canal' : 'Channel';?>
        </div>
        </a>
        <a href="<?= get_page_url('portfolio');?>">
        <div class="cmtd">
          <?= $ises ? 'Portafolio' : 'Portfolio';?>
        </div>
        </a>

        <a href="javascript:void(0)" class="getPart" data-part="appointments">
          <div class="cmtd highlight">
            <?= $ises ? 'Citas' : 'Appointments';?>
          </div>
        </a>

      </div><!-- Colmenu -->

      <div class="col-redes">
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
      </div><!--Col Redes-->

    </div><!-- Main Col-->

    <div class="col seccol">
      <div class="loadingcol">
        <div class="rotatebinder">
          <div class="circle"></div>
          <div class="circle"></div>
          <div class="circle"></div>
        </div>
      </div>
    </div>

  </div>

  <div class="bg bgimg">

  </div>
  <canvas class="bg bggradient">

  </canvas>
</section>

<?php get_footer();?>
