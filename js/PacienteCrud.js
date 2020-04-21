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
        const url ='../Php/AgregarPaciente.php';
        console.log(Paciente, url);
        $.post(url, Paciente, (response) => {
          console.log(response);
          $('#FormularioPacientes').trigger('reset');
        });
});  


});