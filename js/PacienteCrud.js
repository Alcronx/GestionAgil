$(document).ready(function() {
//Resultado de las queris
function Resultado(response){
  if(response==1){
    Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'Exito',
      confirmButtonText: 'Aceptar'
    })
  }

  if(response==0){
    Swal.fire({
      position: 'center',
      icon: 'error',
      title: 'Error',
      confirmButtonText: 'Aceptar'
    })
  }
}

//Cuando abro el modal se activa esto
$('#ListarPaciente').on('shown.bs.modal', function (e) {
  console.log("Se Mostro el Modal")
    fetchTasks();
})

 //Agrega Pacientes 
$('#FormularioPacientes').submit(e => {
        e.preventDefault();
        const Paciente = {
          rut: $('#Rut').val(),
          nombre: $('#Nombre').val(),
          apellido: $('#Apellido').val(),
          direccion: $('#Direccion').val(),
          doctor: $('#Doctor').val(),
          remedios: $('#Remedios').val(),
          problemas: $('#Problemas').val(),
          numero: $('#Numero').val()
        };
        const url ='/Proyecto%20Gestion%20Agil/php/AgregarPaciente.php';
        $.post(url,Paciente, (response) => {
              
          Resultado(response)

          $('#FormularioPacientes').trigger('reset');
        });
});

//Rellenar Datatable Con datos Pacientes
function fetchTasks() {
  $.ajax({
    url: '/Proyecto%20Gestion%20Agil/php/ListaPaciente.php',
    type: 'GET',
    success: function(response) {
      console.log(response);
      const paciente = JSON.parse(response);
      let template = '';
      paciente.forEach(paciente => {
        template += `
        <tr rut=${paciente.rut}>
        <td> 
        <button class="btnEliminar btn btn-danger">
        Borrar 
       </button>
       <button class="btnEditar btn btn-warning" data-dismiss="modal" data-toggle="modal" href="#EditarPaciente">
        Editar 
       </button>
        </td>
        <td>${paciente.rut}</td>
        <td>${paciente.nombre}</td>
        <td>${paciente.apellido}</td>
        <td>${paciente.direccion}</td>
        <td>${paciente.doctor}</td>
        <td>${paciente.remedios}</td>
        <td>${paciente.problemas}</td>
        <td>${paciente.Numero}</td>
        </tr>
              `
      });
      $('#TbodyTablaPacientes').html(template);
    }
  });
}

//Buscar Pacientes Boton
$('#botonBuscarPacientes').click(function() {
  fetchTasks();
})


//Para Eliminar---------------------------------------------------------------------
$(document).on('click', '.btnEliminar', (e) => {
  $('#ListarPaciente').modal('hide');
  
  const element = $(this)[0].activeElement.parentElement.parentElement;
  const rut = $(element).attr('rut');
  const Paciente = {
    rutt: rut
  };
  const url ='/Proyecto%20Gestion%20Agil/php/Eliminar.php';
        $.post(url,Paciente, (response) => {
          console.log(response);
          if(response==1){
            Swal.fire({
              position: 'center',
              icon: 'success',
              title: 'Eliminado Correctamente',
              confirmButtonText: 'Aceptar'
            })
          }
        
          if(response==0){
            Swal.fire({
              position: 'center',
              icon: 'error',
              title: 'Error Al Eliminar',
              confirmButtonText: 'Aceptar'
            })
          }

        });
  
});


//Para Editar Muestra Los Documentos
$(document).on('click', '.btnEditar', (e) => {
  const element = $(this)[0].activeElement.parentElement.parentElement;
  const rut = $(element).attr('rut');
  console.log(rut);
  const Paciente = {
    rutt: rut
  };
  const url ='/Proyecto%20Gestion%20Agil/php/Editar.php';
        $.post(url,Paciente, (response) => {
          console.log(response);
          const paciente = JSON.parse(response);
          let template = '';
          paciente.forEach(paciente => {
            template += `
            
            <input type="hidden" id="Rut1" value="${paciente.rut}">
                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                            <input class="form-control" id="Nombre1" type="text" placeholder="${paciente.nombre}" required="required" data-validation-required-message="Por Favor Ingrese Dato" />
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                            <input class="form-control" id="Apellido1" type="text" placeholder="${paciente.apellido}" required="required" data-validation-required-message="Por Favor Ingrese Dato" />
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                            <input class="form-control" id="Numero1" type="number" placeholder="${paciente.Numero}" required="required" data-validation-required-message="Por Favor Ingrese Dato" />
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                            <input class="form-control" id="Direccion1" type="text" placeholder="${paciente.direccion}" required="required" data-validation-required-message="Por Favor Ingrese Dato" />
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                            <input class="form-control" id="Doctor1" type="text" placeholder="${paciente.doctor}" required="required" data-validation-required-message="Por Favor Ingrese Dato" />
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                            <input class="form-control" id="Remedios1" type="text" placeholder="${paciente.remedios}" required="required" data-validation-required-message="Por Favor Ingrese Dato" />
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                            <textarea class="form-control" id="Problemas1" rows="5" placeholder="${paciente.problemas}" required="required" data-validation-required-message="Porfavor Ingrese Datos"></textarea>
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                    <br />
                                    <div id="success"></div>
                                    <div class="form-group"><button class="btn btn-primary btn-xl" id="sendMessageButton" type="submit">Editar</button></div>
                               
                  `
          });
          console.log(template);
          $('#FormularioEditaPacientes').html(template);
        
      });




});

//Edita al paciente

$('#FormularioEditaPacientes').submit(e => {
  e.preventDefault();
  const Paciente = {
    rut: $('#Rut1').val(),
    nombre: $('#Nombre1').val(),
    apellido: $('#Apellido1').val(),
    direccion: $('#Direccion1').val(),
    doctor: $('#Doctor1').val(),
    remedios: $('#Remedios1').val(),
    problemas: $('#Problemas1').val(),
    numero: $('#Numero1').val()
  };
  const url ='/Proyecto%20Gestion%20Agil/php/Editarv2.php';
  console.log(Paciente);
  $.post(url,Paciente, (response) => {
        
    Resultado(response)

    $('#FormularioEditaPacientes').trigger('reset');
  });
});


});











