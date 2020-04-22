$(document).ready(function() {



  
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
        console.log(Paciente, url);
        $.post(url, Paciente, (response) => {
              
          Resultado(response)

          $('#FormularioPacientes').trigger('reset');
        });
});

//Rellenar Datatable
function fetchTasks() {
  $.ajax({
    url: '/Proyecto%20Gestion%20Agil/php/ListaPaciente.php.',
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
       <button class="btnEditar btn btn-warning">
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


$('#botonBuscarPacientes').click(function() {
  fetchTasks();
})


//Para Eliminar
$(document).on('click', '.btnEliminar', (e) => {
  $('#ListarPaciente').modal('hide');
  $('#EditarPaciente').modal('show');
  const element = $(this)[0].activeElement.parentElement.parentElement;
  const id = $(element).attr('rut');
  console.log(id);



});


//Para Editar
$(document).on('click', '.btnEditar', (e) => {
  $('#ListarPaciente').modal('hide');
  $('#EliminarPaciente').modal('show');
  const element = $(this)[0].activeElement.parentElement.parentElement;
  const id = $(element).attr('rut');
  console.log(id);

});


























//Resultado 
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


});



