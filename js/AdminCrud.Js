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
    $('#ListarUsuarios').on('shown.bs.modal', function (e) {
      console.log("Se Mostro el Modal");
        fetchTasks();
    })
    
     //Agrega Pacientes 
    $('#FormularioUsuarios').submit(e => {
            e.preventDefault();
            const Usuario = {
              Usuario: $('#NombreUsuario').val(),
              Contraseña: $('#Contraseña').val(),
              Rol: $('#Rol').find('option:selected').val()
            };
            console.log(Usuario)
            const url ='php/Admin/Agregar.php';
            $.post(url,Usuario, (response) => {
                 console.log(response)
              Resultado(response)
    
              $('#FormularioUsuarios').trigger('reset');
            });
    });
    
    //Rellenar Datatable Con datos Pacientes
    function fetchTasks() {
      $.ajax({
        url: 'php/Admin/ListaPaciente.php',
        type: 'GET',
        success: function(response) {
          console.log(response);
          const paciente = JSON.parse(response);
          let template = '';
          var rol;
          paciente.forEach(paciente => {
            
            if(paciente.Rol==1){
                rol="admin";
            }
            if(paciente.Rol==2){
                rol="Centro Medico";
            }
            console.log(rol);
            template += `
            <tr idRol=${paciente.IdUsuario}>
            <td> 
            <button class="btnEliminar btn btn-danger">
            Borrar 
           </button>
           <button class="btnEditar btn btn-warning" data-dismiss="modal" data-toggle="modal" href="#EditarPaciente">
            Editar 
           </button>
            </td>
            <td>${paciente.Usuario}</td>
            <td>${paciente.Contraseña}</td>
            <td>${rol}</td>
            </tr>
                  `
          });
          $('#TbodyTablaUsuarios').html(template);
        }
      });
    }
    
    //Buscar Pacientes Boton
    $('#botonBuscarPacientes').click(function() {
      fetchTasks();
    })
    
    
    //Para Eliminar---------------------------------------------------------------------
    $(document).on('click', '.btnEliminar', (e) => {
      $('#ListarUsuarios').modal('hide');
      
      const element = $(this)[0].activeElement.parentElement.parentElement;
      const rut = $(element).attr('idRol');
      const Paciente = {
        rutt: rut
      };
      const url ='php/Admin/Eliminar.php';
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
      const rut = $(element).attr('idRol');
      console.log(rut);
      const Paciente = {
        rutt: rut
      };
      const url ='php/Admin/Editar.php';
            $.post(url,Paciente, (response) => {
              console.log(response);
              const paciente = JSON.parse(response);
              let template = '';
              paciente.forEach(paciente => {
                template += `           
                <input type="hidden" id="Rut2" value="${paciente.id}">
                <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                    <input class="form-control" id="NombreUsuario2" type="text" placeholder="${paciente.Nombre}" required="required" data-validation-required-message="Por Favor Ingrese Dato" />
                    <p class="help-block text-danger"></p>
                </div>
              </div>

              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                    <input class="form-control" id="Contraseña2" type="text" placeholder="${paciente.Contraseña}" required="required" data-validation-required-message="Por Favor Ingrese Dato" />
                    <p class="help-block text-danger"></p>
                </div>
              </div>

              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <select class="browser-default custom-select" name="Rol" id="Rol2">
                        <option value="1">Admin</option>
                        <option value="2">CentroMedico</option>                                                                                           
                </select>
                    <p class="help-block text-danger"></p>
                </div>
              </div>
                                        
    
                                        <br />
                                        <div id="success"></div>
                                        <div class="form-group"><button class="btn btn-primary btn-xl" id="sendMessageButton" type="submit">Editar</button></div>
                                   
                      `
              });
              console.log(template);
              $('#FormularioEditarUsuarios').html(template);
            
          });
    
    
    
    
    });
    
    //Edita al paciente
    
    $('#FormularioEditarUsuarios').submit(e => {
      e.preventDefault();
      const Paciente = {
        id: $('#Rut2').val(),
        Nombre: $('#NombreUsuario2').val(),
        Contraseña: $('#Contraseña2').val(),
        IdRol: $('#Rol2').val()
      };
      const url ='php/Admin/Editarv2.php';
      console.log(Paciente);
      $.post(url,Paciente, (response) => {
        console.log(response);
        Resultado(response)
    
        $('#FormularioEditaPacientes').trigger('reset');
      });
    });
    
    
    });
    
    
    
    
    
    