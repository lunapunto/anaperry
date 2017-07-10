var $ = jQuery;
var ajaxurl;
var dir;
var hwindow;
var wwindow;
var lang;
var ises;
/*
* Helper () isset
* Devuelve si un elemento exista dada su clase
*/
function isset(selector){
  return ($(selector).length ? true : false);
}
/*
* Función onResize()
* Llamada al inicio y cuando la venta se vuelve a ajustar
*/
function onResize(){
   hwindow = $(window).height();
   wwindow = $(window).width();
   /*
   * Helper para clases .full
   * Asigna el alto de tamaño de la ventana
   */
   if(isset('.full')){
     $('.full').height(hwindow);
   }
   /*
   * Helper para clases .min_full
   * El tamaño mínimo del elemento será el alto de la ventana
   */
   if(isset('.min_full')){
     $('.min_full').css('min-height', hwindow+'px');
   }
}
function is_waypoint(e){
  var ot = $(window).scrollTop();
  var ob = ot + hwindow;
  var et = e.offset().top + e.outerHeight();
  if(ot <= et && et <= ob){
    return true;
  }else{
    return false;
  }
}
$(document).ready(function(){
  onResize();
  setDOM();
  /* Instancía las variables principales */
  ajaxurl = $('#ajaxurl').val();
  lang = $('#lang').val();
  ises = lang == 'es';
  if(isset('.bggradient')){
    //bgGradient();
  }




})
$(window).resize(function(){
  onResize();
})

function setDOM(){
  // Set datetimepicker
  if(isset('.datetimepicker')){
    var dateformat = ises ? 'd \\d\\e F \\d\\e\\l\\ Y, \\a\\ \\l\\\\a\\s H:i' : 'F d of Y, H:i';
    var opts = {
      minDate: new Date(),
      enableTime: true,
      altInput: true,
      altFormat: dateformat,
      time_24hr: true,
      disableMobile: "true"
    };
    if(ises){
      opts.locale = 'es';
    }
    $(".datetimepicker").flatpickr(opts);
    Materialize.updateTextFields();

  }

  if(isset('select')){
    $('select').material_select();
  }

  if(isset('.gallery')){
    $('a.gall_a').featherlightGallery({
		previousIcon: '<',     /* Code that is used as previous icon */
		nextIcon: '>',         /* Code that is used as next icon */
		galleryFadeIn: 0,          /* fadeIn speed when slide is loaded */
		galleryFadeOut: 0          /* fadeOut speed before slide is loaded */
	});
  }

}

function bgGradient(){
  var granimInstance = new Granim({
    element: '.bggradient',
    name: 'basic-gradient',
    direction: 'left-right',
    opacity: [1, 1],
    isPausedWhenNotInView: true,
    states : {
        "default-state": {
            gradients: [
                ['#AA076B', '#61045F'],
                ['#f4a4e0', '#c87cd7'],
                ['#ff227f', '#58104a']
            ]
        }
    }
});
}
var x = 0;
var currentPart = '';
$(document).on('click', '.getPart', function(){
  var time = 0;
  var self = $(this);
  var part = self.attr('data-part');
  if(x && (part !== currentPart)){
    resetCols();
    time = 1500;
  }else if(part == currentPart){
    return;
  }

  setTimeout(function(){
    $('#front').addClass('splitcols');
    $('.current_td').removeClass('current_td');
    self.find('.cmtd').addClass('current_td');
    var title = self.text() + ' - Ana Perry Makeup Artist';
    $('title').text(title);
    var obj = {
      action: 'getpart',
      part:   part
    };
    $.post(ajaxurl, obj, function(msg){
      msg = '<div id="fader">'+msg+'</div>';
      $('.seccol').html(msg);
      setTimeout(function(){
        console.log('loaded');
        $('#fader').css('opacity', 1);
      }, 500);
      x++;
      currentPart = part;
      setDOM();
    });
  }, time);



})
function resetCols(){
  x = 0;
  currentPart = '';
  $('#front').removeClass('splitcols');
  $('.current_td').removeClass('current_td');
  $('.seccol').html('');
  var title = 'Ana Perry Makeup Artist';
  $('title').text(title);
}

function parseForm(arr){
  var o = [];
  arr.forEach(function(item, index){
    o[item.name] = item.value;
  })
  return JSON.stringify(o);
}

function alertC(msg, extra){
  $.alert({
    title: msg,
    content: extra,
    theme: 'supervan',
    backgroundDismiss: true
  });
}

$(document).on('submit', '#appointmentForm', function(e){
  e.preventDefault();
  var f = $(this).serializeArray();
  console.log(f);
  var title = ises ? 'Muchas gracias beauty' : 'Thanks beauty';
  var extra = ises ? 'Me pondré en contacto contigo.' : "I'll be in touch with you.";
  setTimeout(function(){
    alertC(title, extra);
    resetCols();
  }, 500);
  var data = {
    action: 'sendAppointment',
    form: f
  };
  $.post(ajaxurl, data, function(msg){
  }, 'json').always(function(msg){
    console.log(msg);
  })
})
function onAppointmentSubmit(e){
  console.log(e);
  $('#appointmentForm').submit();
}
var lastScrollTop = 0;
$(window).scroll(function(){
  var dir = 'down';
  var st = $(this).scrollTop();
   if (st > lastScrollTop){
      dir = 'down';
   } else {
      dir = 'up';
   }
   lastScrollTop = st;
  if(isset('.redes-footer')){

    if(dir == 'down' && !$('.redes-footer').hasClass('show-redes-footer')){
      $('.redes-footer').addClass('show-redes-footer')
    }
    if(dir == 'up' && $('.redes-footer').hasClass('show-redes-footer')){
      $('.redes-footer').removeClass('show-redes-footer')

    }

  }
})
