$(document).ready(function(){
  $('#usuario').on('change',function(){
    if (this.checked) {
      $('.ultimos_estudios').show();
      $('.descripcion').show();
      $('.nombre').hide();
    }
  });

  $('#empresa').on('change',function(){
    if (this.checked) {
      $('.nombre').show();
      $('.descripcion').show();
      $('.ultimos_estudios').hide();
    }

  });
});