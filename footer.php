</div><!-- End Container-->
</div><!-- End Wrapper-->
<?php wp_footer();?>
<input type="hidden" id="ajaxurl" value="<?php echo admin_url( 'admin-ajax.php' );?>"/>
<input type="hidden" id="lang" value="<?= pll_current_language();?>">

<script type="text/javascript">
  $(window).on('load', function(){
    $('#loader').fadeOut(200);
    $('body').addClass('loaded');

  });
</script>

</body>
</html>
