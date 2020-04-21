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