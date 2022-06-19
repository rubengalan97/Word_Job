$(document).ready(function(){
  $('#usuario').on('change',function(){
    if (this.checked) {
      $("#ultimos_estudios").show();
      $("#descripcion").show();
    } else {
      $("#ultimos_estudios").hide();
      $("#descripcion").hide();
    }
  });

    $('#empresa').on('change',function(){
      if (this.checked) {
        $("#nombre").show();
        $("#descripcion").show();
      } else {
        $("#ultimos_estudios").hide();
        $("#descripcion").hide();
      }

  });
});