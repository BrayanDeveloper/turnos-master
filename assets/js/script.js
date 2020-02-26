$(document).ready(function(){
      // envio a guardar pacientes
      $('#envio-patient').click(function(){
      var datos = $('#datos').serialize();
      $.post({
        type: 'POST',
        url: 'models/add',
        data: datos,
          success: function(r){
          $('#success').html(r);                                   
                                     
          }

        });
                                
        return false;

        });

      // envio a editar pacientes
      $("#update-patient").click(function(){
            var datos = $("#datos-edit-patient").serialize();
            $.post({
              type: "POST",
              url: "models/update",
              data: datos,
                success: function(r){
                  $("#success").html(r);                                                          
                }

              });
                                      
              return false;

              });


      // digitador de cedula para expedir turno
      $('#sacando-turno').click(function(){
      var datos = $('#datos').serialize();
      $.post({
        type: 'POST',
        url: 'models/add',
        data: datos,
          success: function(r){
          $('#success').html(r);                                   
                     
          }

        });
        $('#cedulaTurno').val('');                        
        return false;

        });

      // nuevo medico
      $('#envio-medic').click(function(){
      var datos = $('#datos-new-medic').serialize();
      $.post({
        type: 'POST',
        url: 'models/add',
        data: datos,
          success: function(r){
          $('#success').html(r);                                   
                     
          }

        });
                              
        return false;

        });

      // editar medico
      $('#update-medic').click(function(){
      var datos = $('#datos-edit-medic').serialize();
      $.post({
        type: 'POST',
        url: 'models/update',
        data: datos,
          success: function(r){
          $('#success').html(r);                                   
                     
          }

        });
                              
        return false;

        });

      // traer informacion de disponibilidad de medico
      $('#medico').click(function(){
      var datos = $('#datos-edit-medic').serialize();
      $.post({
        type: 'POST',
        url: 'models/vitas',
        data: datos,
          success: function(r){
          $('#success').html(r);                                   
                     
          }

        });
                              
        return false;

        });

      // nueva Secretaria
      $('#envio-secretary').click(function(){
      var datos = $('#datos-new-secretary').serialize();
      $.post({
        type: 'POST',
        url: 'models/add',
        data: datos,
          success: function(r){
          $('#success').html(r);                                   
                     
          }

        });
                              
        return false;

        });
      
      // editar Secretaria
      $('#update-secretary').click(function(){
      var datos = $('#datos-edit-secretary').serialize();
      $.post({
        type: 'POST',
        url: 'models/update',
        data: datos,
          success: function(r){
          $('#success').html(r);                                   
                     
          }

        });
                              
        return false;

        });

      $("#llamando-paciente button").click(function(){
        //alert($(this).val());
        var datos = $(this).val();
        var id_boton = 'btn-'+ datos;
        var acciones = "turn-call-secretary";
        //alert(datos);
        
        $.post({
        type: 'POST',
        url: 'models/update',
        data: {
          "accion": acciones,
          "dato": datos,
          "id_boton": id_boton,
          "sonido": 'sonido.mp3'
        },
          success: function(r){
          $('#success').html(r);  
          // $('#success').addClass('btn-success');
             //alert("Se ha llamado al paciente");        
          }

        });
                           
        return false;
      });


      $("#atendiendo-paciente button").click(function(){
        var dato = $(this).val();
        var accion = "turn-attended-secretary";
        
        
        $.post({
        type: 'POST',
        url: 'models/vistas',
        data: {
          "accion": accion,
          "dato": dato,
        },
          success: function(r){
          $('#success').html(r);                                   
             //alert("Hagale mija");        
          }

        });
                           
        return false;
      });


      $("#medico").click(function(){
        var accion = "new-citation-turn";
         var id_medico = $('select[id=medico]').val();
         $.post({
          type: 'POST',
          url: 'models/vistas',
          data: {
            "accion": accion,
            "id_medico": id_medico,
          },
            success: function(r){
            $('#success').html(r);                                   
               $('#campos_date').hide();
                    
            }

        });
         return false;
      });

      

      


});