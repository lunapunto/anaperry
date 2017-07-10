<?php get_header();?>


<section class="full" id="front">
  <div class="cols loading">

    <div class="col maincol">
      <div class="col-header">
        <img src="<?= asset.'/logo.svg';?>">
      </div><!-- Colheader -->
      <div class="col-menu">
        <div class="cmtd notanimate">
          I'm coming<br />back Soon
        </div>

      </div><!-- Colmenu -->

      <div class="col-redes">
        <div class="redes-flex">
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
