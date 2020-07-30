(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
 
  }, false);


})();





$( document ).ready(function() {
    console.log( "ready!" );
    function initMap(lat, log) {
       var lat= lat;//25.7273543;
       var long= log; // -100.2566506;
       map = new google.maps.Map(document.getElementById('map'), {         
                 zoom: 10,
                 center: new google.maps.LatLng(+lat, +long),
                 //mapTypeId: google.maps.MapTypeId.ROADMAP

                 mapTypeControl: true,
                 mapTypeControlOptions: {
                 style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
                 mapTypeIds: ['roadmap', 'satellite', 'hybrid', 'terrain',
                   'styled_map']
                 },
                 zoomControl: true,
                 zoomControlOptions: {
                     position: google.maps.ControlPosition.LEFT
                 },
                 scaleControl: true,
                 streetViewControl: true,
                 streetViewControlOptions: {
                     position: google.maps.ControlPosition.LEFT
                 },        
             });
    }

});


function get_municipios(estado,municipio){
  var id_estado = $("#"+estado).val();
  var parameters = {"id_estado":id_estado}

   $.ajax({
            data: parameters,
            url:   '/api/v1/get_municipios',
            dataType: 'json',
            type:  'get',
            success:  function (response) { 
              var len = response.length;
              $("#"+municipio).html('<option value="0">Seleccione una opción</option>');
              for (var i = 0; i < len; i++) {
                  $("#"+municipio).append("<option value='"+response[i].id+"'>"+response[i].municipio+"</option>");
              }      
            }
        }); 
}

function busca_medios(){
  var parameters =  {'estado':$("#estado").val(),
                     'municipios':$("#municipio").val(),
                     'medios':$("#medios").val()
                   }
  if($("#estado").val()=='' || $("#medios").val()==''){
    $.alert("Revise su busqueda");
  }else{
  $.blockUI({ message: '<h4><img src="assets/images/loading2.gif" style="width:40px;" /> Buscando medios, espere...</h4>' }); 
    setTimeout($.unblockUI, 5000); 
  }
    console.log(parameters);
  //$("#body_id").removeClass('menu-open');
  //$("#body_id").addClass('menu-hide');
}
