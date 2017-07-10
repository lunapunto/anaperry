<?php
$cl = pll_current_language();
$ises = $cl == 'es';
$fields = array(
  /*
  array(
    'es'    => '',
    'en'    => '',
    'type'  => '',
    'class' => '',
    'icon'  => '',
  ),
  */
  array(
    'es'    => 'Nombre',
    'en'    => 'Name',
    'type'  => 'text',
    'class' => '',
    'icon'  => '',
  ),
  array(
    'es'    => 'E-mail',
    'en'    => 'E-mail',
    'type'  => 'email',
    'class' => '',
    'icon'  => '',
  ),
  array(
    'es'    => 'Fecha #1',
    'en'    => 'Date #1',
    'type'  => 'text',
    'class' => 'datetimepicker',
    'icon'  => '',
  ),
  array(
    'es'    => 'Fecha #2',
    'en'    => 'Date #2',
    'type'  => 'text',
    'class' => 'datetimepicker',
    'icon'  => '',
  )
);


?>

<div id="mainform">
  <div id="theform">
    <form id="appointmentForm">
    <div id="contentForm">
      <div class="row row-title">
        <div class="title">
          <?= $ises ? 'Hola Beauty' : 'Hi, Beauty';?>
        </div>
      </div>
      <?php foreach($fields as $field):?>
        <div class="row">
          <div class="input-field">
            <input name="<?= custom_san($field['en']);?>" id="<?= custom_san($field['en']);?>" type="text" class="validate <?= $field['class'];?>" required>
            <label for="<?= custom_san($field['en']);?>"><?= $ises ? $field['es'] : $field['en'];?><span class="required">*</span></label>
          </div>
        </div>
      <?php endforeach;?>

      <div class="row">
        <div class="input-field">
          <select name="at">
            <option value="1"><?= $ises ? 'En mi casa' : 'My place';?></option>
            <option value="2"><?= $ises ? 'El estudio de Ana Perry' : 'The studio';?></option>
          </select>
          <label><?= $ises ? '¿Dónde?' : 'At';?><span class="required">*</span></label>
        </div>
      </div>

      <div class="row responsive-button buttonsubmit" style="text-align: right">
        <button
          class="g-recaptcha btn"
          data-sitekey="6Lds7CcUAAAAACuwrUABMEbE3rB77xYTsWzSi2Pn"
          data-callback="onAppointmentSubmit"
          class="btn"
        >
        <?= $ises? 'Agendar' : 'Book';?>
        </button>
      </div>

    </div>


    <div class="row" id="buttonsubmit" style="text-align: right">
      <button
        class="g-recaptcha btn"
        data-sitekey="6Lds7CcUAAAAACuwrUABMEbE3rB77xYTsWzSi2Pn"
        data-callback="onAppointmentSubmit"
        class="btn"
      >
      <?= $ises? 'Agendar' : 'Book';?>
      </button>
    </div>

    </form>



  </div>
</div>
