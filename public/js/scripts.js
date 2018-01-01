
$( "#selectTipoEntrega" ).change(function() {
  var ruta = $('#selectRuta').val();
  var tipo = $( "#selectTipoEntrega" ).val();
  var dataR= 'ruta='+ ruta+'&tipo='+tipo;
  
  $.ajax({
            type : 'post',
            url : 'fetch_record1.php', //Here you will fetch records 
            data :  dataR, //Pass $id
            success : function(data){
            $('#pop').html(data);//Show fetched data from database
            }
        });

  if(tipo == ''){
    $('#l').addClass('hidden');
    $('#master').addClass('hidden');  
     $('.fechasEn').addClass('hidden');    
  $('.fechasF').addClass('hidden');  
  }else{
    $('#l').removeClass('hidden');
  }
  
});



$( ".selectPeriodo" ).change(function() {
  $('#master').addClass('hidden');    
  var p= $( ".selectPeriodo" ).val();
  $('.fechasEn').addClass('hidden');    
  $('.fechasF').addClass('hidden');    
  
  
  if(p=='mensual' || p=='dia' || p=='intervalo'){
    $('.fechasEn').removeClass('hidden');    
  $('#master').removeClass('hidden');    
  }
  if(p=='intervalo'){
    $('.fechasF').removeClass('hidden');    
  } 
  
  
});


function mostrar(id) {        
$("#nombreCentro, #bD, #bI, #desJ, #fechaJ").attr('required', false);
$("#datosConcepto, #datos, #domicilio, #encargadas4, #contacto, #descripcion, #altaCentro, #ins").hide();  
$("#fecha, #nombreC, #rutaC, #apo, #directos, #indirectos").attr('required', false);
$("#calle, #colonia, #municipio").attr('required', false);
$("#euno, #eunot, #gen, #edos, #edost, #gen1, #etres, #etrest, #gen2, #ecuatro, #ecuatrot, #gen3").attr('required', false);
$("#conta, #contaTel, #gengen, #selectIns").attr('required', false);  


        if(id=="centro"){
          $("#datos, #domicilio, #encargadas4, #altaCentro, #unoE, .noIns").show(); 
          $("#euno, #eunot, #gen").attr('required', true);
          $("#fecha, #nombreC, #rutaC, #apo, #directos, #indirectos").attr('required', true);
          $("#calle, #colonia, #municipio").attr('required', true);
          $("#numeroEncargadas").attr('required', true);
          $("#nombreCentro, #bD, #bI, #desJ, #fechaJ").attr('required', false);
          
        }
        else if(id=="jornadas" || id=="otros"){
         $("#datosConcepto, #descripcion, #altaCentro").show();   
         $("#nombreCentro, #bD, #bI, #desJ, #fechaJ").attr('required', true);
        }
        else if(id=="ins"){
          $("#datos, #domicilio, #contacto, #altaCentro, #ins").show();
          $(".noIns").hide();

          $("#fecha, #nombreC, #rutaC, #apo, #directos, #selectIns").attr('required', true);  
        $("#conta, #contaTel, #gengen").attr('required', true);  
          
        }

}

function num(id) {
  
  $("#dosE, #tresE, #cuatroE").hide();  
$("#edos, #edost, #gen1, #etres, #etrest, #gen2, #ecuatro, #ecuatrot, #gen3").attr('required', false);
         if(id=="d"){
    $("#unoE, #dosE").show(); 
    $("#euno, #eunot, #gen, #edos, #edost, #gen1").attr('required', true);
        }else if(id=="t"){
    $("#unoE, #dosE, #tresE").show(); 
    $("#euno, #eunot, #gen, #edos, #edost, #gen1, #etres, #etrest, #gen2").attr('required', true);
        }else if(id=="c"){
    $("#unoE, #dosE, #tresE, #cuatroE").show();
    $("#euno, #eunot, #gen, #edos, #edost, #gen1, #etres, #etrest, #gen2, #ecuatro, #ecuatrot, #gen3").attr('required', true);
                }
}

$( document ).ready(function() {
  var tipo;
$( "#getCentros" ).click(function( event ) {
       event.preventDefault();
       tipo = 'centro';
       getCentros(tipo);
    });
$( "#getIns" ).click(function( event ) {
       event.preventDefault();
       tipo = 'ins';
       getCentros(tipo);
    });
$( "#getJor" ).click(function( event ) {
       event.preventDefault();
       tipo = 'jornadas';
       getCentros(tipo);
    });
$( "#getOtros" ).click(function( event ) {
       event.preventDefault();
       tipo = 'otros';
       getCentros(tipo);
    });




});
function getCentros(tipo){
  $.ajax({
            type : 'post',
            url : 'centrosTipo.php', //Here you will fetch records 
            data :  'tipo='+ tipo, //Pass $id
            success : function(data){
            $('#centrosTipo').html(data);//Show fetched data from database
            }
        });
}




$(document).ready(function(){
    $('#modal1').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        $.ajax({
            type : 'post',
            url : 'fetch_record.php', 
            data :  'rowid='+ rowid, //Pasa el $id
            success : function(data){
            $('.fetched-data').html(data);//muestra los datos
            }
        });

     });

});

$(document).ready(function(){
    $('#modalCentros').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        var type = $(e.relatedTarget).data('type');
        var d= 'rowid='+ rowid+'&tipo='+type;

        $.ajax({
            type : 'post',
            url : 'fetch_Centros.php', 
            data :  d, //Pasa el $id
            success : function(data){
            $('.fetched-data1').html(data);//muestra los datos
            }
        });

     });
});

$(document).ready(function() {
  $(".search").keyup(function () {
    var searchTerm = $(".search").val();
    var listItem = $('.results tbody').children('tr');
    var searchSplit = searchTerm.replace(/ /g, "'):containsi('")
    
  $.extend($.expr[':'], {'containsi': function(elem, i, match, array){
        return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
    }
  });
    
  $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e){
    $(this).attr('visible','false');
  });

  $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e){
    $(this).attr('visible','true');
  });

  var count = $('.results tbody tr[visible="true"]').length;
    $('.counter').text(count + ' item');

  if(count == '0') {$('.no-result').show();}
    else {$('.no-result').hide();}
      });
});


$('#conActual, #conNueva, #confirmar').keyup('input',function(e){
    if($('#conActual').val().length!=0 && $('#conNueva').val().length!=0 && $('#confirmar').val().length!=0 && $('#conNueva').val() == $('#confirmar').val()){
     $("#changePass").removeClass("disabled").animate({ left: '250px' });
     $('#check').html("");
    }else{
      $("#changePass").addClass("disabled").animate({ left: '250px' });
      $('#check').html("");
    }
    if($('#conNueva').val() != $('#confirmar').val() && $('#conNueva').val().length!=0 && $('#confirmar').val().length!=0){
      $('#check').html("<p> Las contraseñas no coinciden.</p>");
    }
    
  });

function updateContacto(string){
  
  $.ajax({
            type : 'post',
            url : 'attr.php', //Here you will fetch records 
            data : string, //Pass $id
            success : function(data){
            event.preventDefault();
        $(".showCon").removeClass('hidden');
        $("#editCon").removeClass('hidden');
        $(".hidCon").addClass('hidden');
        $("#saveCon").addClass('hidden');
            $('#modalCentros').modal('hide');
            }
        });
} 

$('#modalCentros').on('shown.bs.modal', function(){

$("#saveCon").click(function( event ) {
var id = [];
var names = [];
var gen=[];
var tel = [];
$.each($('.idC'), function() {
id.push($(this).val());
}); 
$.each($('.nom'), function() {
names.push($(this).val());
});                       
$.each($('.gen'), function() {
gen.push($(this).val());
});
$.each($('.tel'), function() {
tel.push($(this).val());
});
for(i= 0; i<names.length; i++){
  var string = 'rowid='+id[i]+'&attr=upCon&nom='+names[i]+"&tel="+tel[i]+"&gen="+gen[i];
  updateContacto(string);
}
                });


  $( "#saveDes" ).click(function( event ) {
       event.preventDefault();
       var rowid = $('#idHidden').val();
       var s= $( "#d" ).val();
       var a = 'des';
 
$.ajax({
            type : 'post',
            url : 'attr.php', //Here you will fetch records 
            data :  'rowid='+rowid+'&attr='+a+'&des='+s, //Pass $id
            success : function(data){
            $("#d").addClass('hidden');
            $("#saveDes").addClass('hidden');
            $("#originalD").removeClass('hidden');
            $("#editDes").removeClass('hidden');
            $("#originalD").html(s);
            }
        });

    });

  $( "#editDes" ).click(function( event ) {
       event.preventDefault();
       $("#d").removeClass('hidden');
       $("#saveDes").removeClass('hidden');
       $("#originalD").addClass('hidden');
       $("#editDes").addClass('hidden');
       
    });


  $( "#cambiarStatus" ).click(function( event ) {
       event.preventDefault();
       var rowid = $('#idHidden').val();
       var s= $( "#status" ).val();
       var m= $( "#motivo" ).val();
       var d= $( "#fechaS" ).val();
       var a = 'stat';
 
$.ajax({
            type : 'post',
            url : 'attr.php', //Here you will fetch records 
            data :  'rowid='+rowid+'&attr='+a+'&status='+s+'&motivo='+m+'&fecha='+d, //Pass $id
            success : function(data){
            $('#centrosTipo').html(data);//Show fetched data from database
            $(".motivo").addClass('hidden');
            $("#cambiarStatus").addClass('hidden');
            $("#editarStatus").removeClass('hidden');
            }
        });

    });

  $( "#editarStatus" ).click(function( event ) {
       event.preventDefault();
       $("#cambiarStatus").removeClass('hidden');
       $(".motivo").removeClass('hidden');
       $("#editarStatus").addClass('hidden');
       
    });

    $( "#editDirectos" ).click(function( event ) {
       event.preventDefault();
        $("#showDir, #showIn, #showRoute, #showApo").addClass('hidden');
        $("#editDirectos").addClass('hidden');
        $("#hidDir, #hidIn").removeClass('hidden');
        $("#saveDirectos").removeClass('hidden');
    });


    $( "#saveDirectos" ).click(function( event ) {
       event.preventDefault();
       var rowid = $('#idHidden').val();
       var b= $('.benDir').val();
       var i= $('.benIn').val();
       var apo= $('.apo').val();
       var ruta= $('.ruta').val();
       var dat='rowid='+ rowid+'&attr=ben&benDir='+b+'&benIn='+i+'&apo='+apo+'&ruta='+ruta;
        $.ajax({
            type : 'post',
            url : 'attr.php', 
            data :  dat, //Pasa el $id
            success : function(data){
              $( '#showDir' ).html("Beneficiarios directos: "+b+"</p>");
              $( '#showIn' ).html("Beneficiarios indirectos: "+i+"</p>");
              $( '#showRoute' ).html("Ruta: "+ruta+"</p>");
              $( '#showApo' ).html("Aportación: "+apo+"</p>");
            $("#showDir, #showIn, #showRoute, #showApo").removeClass('hidden');
        $("#editDirectos").removeClass('hidden');
        $("#hidDir, #hidIn").addClass('hidden');
        $("#saveDirectos").addClass('hidden');
            }
        });

       
    });


    $( "#editDom" ).click(function( event ) {
      //street, col, mun
       event.preventDefault();
        $("#showDom").addClass('hidden');
        $("#editDom").addClass('hidden');
        $("#hidDom").removeClass('hidden');
        $("#saveDom").removeClass('hidden');
    });
    

    $( "#saveDom" ).click(function( event ) {
       event.preventDefault();

        var rowid = $('#idHidden').val();
       var s= $('.street').val();
       var c= $('.colEdit').val();
       var m=$('.mun').val();
       var dat='rowid='+ rowid+'&attr=dom&s='+s+'&c='+c+'&m='+m;
        $.ajax({
            type : 'post',
            url : 'attr.php', 
            data :  dat, //Pasa el $id
            success : function(data){
              $( '#s' ).html("Calle: "+s+"</p>");
              $( '#c' ).html("Colonia: "+c+"</p>");
              $( '#m' ).html("Municipio: "+m+"</p>");
              $("#showDom").removeClass('hidden');
        $("#editDom").removeClass('hidden');
        $("#hidDom").addClass('hidden');
        $("#saveDom").addClass('hidden');
            }
        });


    });
    

    $( ".editCon" ).click(function( event ) {
       event.preventDefault();
        $(".showCon").addClass('hidden');
        $("#editCon").addClass('hidden');
        $(".hidCon").removeClass('hidden');
        $("#saveCon").removeClass('hidden');
    });
     


});


$( ".master" ).click(function( event ) {
       event.preventDefault();

var p = $( ".selectPeriodo" ).val();
var input = $( ".fechaE" ).val().split('-');
var d = new Date(input);
    var year = d.getFullYear();
    var month = d.getMonth()+1;
    var day = d.getDate();
    var dataM = '';
    var id= $( "#selection" ).val();

if(id=="todos"){
  if(p=='mensual'){ dataM='mes='+month+'&year='+year+'&c=todos'; }
  if(p=='dia'){ dataM ='date='+input+'&c=diaT';}
  if(p=='intervalo'){
  var it = $( ".fechaF" ).val()
  var i = new Date(it);
  dataM= 'date='+input+'&c=interT&d='+it;}

}else{

if(p=='mensual'){ dataM='mes='+month+'&year='+year+'&c=uno&id='+id;}
if(p=='dia'){dataM ='date='+input+'&c=diaU&id='+id; }
if(p=='intervalo'){
  var it = $( ".fechaF" ).val()
  var i = new Date(it);
dataM= 'date='+input+'&c=interU&d='+it+'&id='+id;}
}

  $.ajax({
            type : 'post',
            url : 'resumenMaestro.php', //Here you will fetch records 
            data :  dataM,
            success : function(data){
            $('#popr').html(data);//Show fetched data from database
            }
        });

});



 $( document ).ajaxComplete(function() {
          var p = $('#selection');
          var a = '';
      p.change(function(){
        var a = $('#selection').val();
        var panC = $('#panc').val();
        getAportacion(a, panC);
      });

 $("#panc").keyup(function () {
    var a = $('#selection').val();
    var panC = $('#panc').val();
    getAportacion(a, panC);
  });


});

 function getAportacion(a, panC){
  $.ajax({
            type : 'post',
            url : 'getAportacion.php', //Here you will fetch records 
            data :  "idCentro="+a,
            success : function(data){
              var r = Number(data*panC).toFixed(2);
            $('#ap').html("<p style='color:#490b06;'>Estimacion: $"+r+"</p> <input type='hidden' value='"+r+"' name='est'>");  
            }
        });
 }
     
   