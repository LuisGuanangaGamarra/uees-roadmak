<!-- Modal -->
<div class="modal fade" id="confirmar_cancelar_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Guardar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Seguro que desea guardar?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#confirmarModal" data-backdrop="static">Confirmar</button>

      </div>
    </div>
  </div>
</div>

<!-- Confirmar -->
<div class="modal " id="confirmarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Guardado!</h5>
       <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>-->
      </div>
      <div class="modal-body">
        Guardado con exito
      </div>
      <div class="modal-footer">
       <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        --><button type="button" class="btn btn-primary" onclick="direcconsul()">Aceptar</button>
      </div>
    </div>
  </div>
</div>

<script>
function direcconsul(){
    
//alert("guardado con exito!!");
window.location.href='../bandeja_mis_consultorias';
}
</script>


<!-- Cancelar  -->
<div class="modal fade" id="cancelarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cancelar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Seguro que desea cancelar?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#confirmarcancelacionModal" data-backdrop="static">Confirmar</button>

      </div>
    </div>
  </div>
</div>

<!-- Confirmar_cancelacion -->
<div class="modal " id="confirmarcancelacionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cancelado!</h5>
       <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>-->
      </div>
      <div class="modal-body">
        Proceso cancelado
      </div>
      <div class="modal-footer">
       <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        --><button type="button" class="btn btn-primary" onclick="direcconsul()">Aceptar</button>
      </div>
    </div>
  </div>
</div>









<!-- modal para formulario -->
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Confirmación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Esta segyudi+
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
        

        <input type=button onclick="pregunta()" value="Enviar"> 
       
      </div>
    </div>
  </div>
</div>

<!-- inicio de modal DE INACTIVACION DE CONSULTORIA-->
<div id="aceptarInactivar" class="modal fade" tabindex="-1" role="dialog">
   <div class="modal-dialog ">
     <!-- Modal content-->
     <form action="" id="deleteForm" method="post">
         <div class="modal-content">
             <div class="modal-header bg-danger">
             <h4 class="modal-title text-center">Confirmación</h4>
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body">
                 {{ csrf_field() }}
                 {{ method_field('DELETE') }}
                 <p class="text-center">¿Está seguro que quiere eliminar/desactivar la consultoría?</p>
             </div>
             <div class="modal-footer">
                 <center>
                     <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                     <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Si, Eliminar</button>
                 </center>
             </div>
         </div>
     </form>
   </div>
  </div>



<!-- inicio de modal DE INACTIVACION DE CONSULTORIA-->
<div id="aceptarModal" class="modal fade" tabindex="-1" role="dialog">
   <div class="modal-dialog ">
     <!-- Modal content-->
     <form action="" id="sendOnlyOffice" method="post">
         <div class="modal-content">



         <div class="modal-header">
         {{ csrf_field() }}
        {{ method_field('GET') }}
        <h5 class="modal-title" id="exampleModalLabel">Guardar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Seguro que desea guardar?
      </div>


             <div class="modal-footer">
                 <center>
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                     <button type="submit" name="" class="btn btn-primary" data-dismiss="modal" onclick="formSubmit_sendOnlyOffice()">Confirmar</button>
                 </center>
             </div>
         </div>
     </form>
   </div>
  </div>

<!-- inicio de modal DE |CONFIRMAR CERRAR INFORME|-->
<div id="cerrarInformeModal" class="modal fade" tabindex="-1" role="dialog">
   <div class="modal-dialog ">
     <!-- Modal content-->
     <form action="" id="sendEmailInforme" method="post">
         <div class="modal-content">



         <div class="modal-header">
         {{ csrf_field() }}
        {{ method_field('GET') }}
        <h5 class="modal-title" id="exampleModalLabel">Cerrar Informe</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Seguro que desea cerrar el Informe?
        <div><i>Al confirmar, se enviará un correo al cliente</i></div>
      </div>
             <div class="modal-footer">
                 <center>
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                     <button type="submit" name="" class="btn btn-primary" data-dismiss="modal" onclick="formSubmit_sendEmailInforme()">Confirmar</button>
                 </center>
             </div>
         </div>
     </form>
   </div>
  </div>


<!-- inicio de modal DE |CONFIRMAR ABRIR INFORME|-->
<div id="abrirInformeModal" class="modal fade" tabindex="-1" role="dialog">
   <div class="modal-dialog ">
     <!-- Modal content-->
     <form action="" id="sendOpenInforme" method="post">
         <div class="modal-content">



         <div class="modal-header">
         {{ csrf_field() }}
        {{ method_field('GET') }}
        <h5 class="modal-title" id="exampleModalLabel">Abrir Informe</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Seguro que desea Re-abrir el Informe?
        <div><i>Al confirmar, podrá editar el informe</i></div>
      </div>
             <div class="modal-footer">
                 <center>
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                     <button type="submit" name="" class="btn btn-primary" data-dismiss="modal" onclick="formSubmit_sendOpenInforme()">Confirmar</button>
                 </center>
             </div>
         </div>
     </form>
   </div>
  </div>









<!-- inicio de modal DE ELIMINAR ARCHIVO CONSULTOR-->
<div id="modal_deleteArchivo" class="modal fade" tabindex="-1" role="dialog">
   <div class="modal-dialog ">
     <!-- Modal content-->
     <form action="" id="form_deleteArchivo" method="post">
         <div class="modal-content">
             <div class="modal-header bg-danger">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h4 class="modal-title text-center">Confirmacion</h4>
             </div>
             <div class="modal-body">
                 {{ csrf_field() }}
                 {{ method_field('DELETE') }}
                 <p class="text-center">Esta seguro que desea eliminar EL ARCHIVO?</p>
             </div>
             <div class="modal-footer">
                 <center>
                     <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                     <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit_deleteArchivo()">Sí, eliminar</button>
                 </center>
             </div>
         </div>
     </form>
   </div>
  </div>









<script type="text/javascript">
     function deleteData(id)
     {
         var id = id;
         var url = '{{ route("consultorias.destroy", ":id") }}';
         url = url.replace(':id',id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit(); 
     }
  </script>


<script type="text/javascript">
     function sendOnlyOffice(id)
     {
         var id = id;
         var url = '{{ route("bandeja.office_file", ":id") }}';
         url = url.replace(':id',id);
         $("#sendOnlyOffice").attr('action', url);
     }

     function formSubmit_sendOnlyOffice()
     {
         $("#sendOnlyOffice").submit(); 
     }
  </script>


<script type="text/javascript">
     function sendEmailInforme(id)
     {
         var id = id;
         var url = '{{ route("informe.close", ":id") }}';
         url = url.replace(':id',id);
         $("#sendEmailInforme").attr('action', url);
     }

     function formSubmit_sendEmailInforme()
     {
         $("#sendEmailInforme").submit(); 
     }
  </script>

<script type="text/javascript">
     function sendOpenInforme(id)
     {
         var id = id;
         var url = '{{ route("informe.open", ":id") }}';
         url = url.replace(':id',id);
         $("#sendOpenInforme").attr('action', url);
     }

     function formSubmit_sendOpenInforme()
     {
         $("#sendOpenInforme").submit(); 
     }
  </script>


<script type="text/javascript">
     function deleteReporte(id)
     {
         var id = id;
         var url = '{{ route("consultoria_comprada.destroy", ":id") }}';
         url = url.replace(':id',id);
         $("#form_deleteArchivo").attr('action', url);
     }

     function formSubmit_deleteArchivo()
     {
         $("#form_deleteArchivo").submit(); 
     }
  </script>


<!-- fin de modal  DE INACTIVACION DE CONSULTORIA-->


<!--ejemplo-->
<div class="modal fade" id="progress_bar_Modal" tabindex="-1" role="dialog" aria-labelledby="progress_bar_Modal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="progress_bar_ModalTitle">Procesando archivo</h5>
      </div>
      <div class="modal-body">
        <!--progress bar-->
        <div class="container">
          <h2></h2>
          <p>Por favor espere.</p> 
          <div class="progress mb-2" style="height: 30px;">
            <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:100% ;font-size: 15px"  >
            CARGANDO ...
            </div>
          </div>
        </div>
        <!-- fin  progress bar-->
      </div>
    </div>
  </div>
</div>
<!--end ejemplo-->

<!--ejemplo-->
<div class="modal fade" id="compra_Modal" tabindex="-1" role="dialog" aria-labelledby="compra_Modal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="compra_ModalTitle">Guardando compra</h5>
      </div>
      <div class="modal-body">
        <!--progress bar-->
        <div class="container">
          <h2></h2>
          <p>Por favor espere.</p> 
          <div class="progress" style="height: 30px;">
            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:100% ;font-size: 25px"  >
            GUARDANDO ...
            </div>
          </div>
        </div>
        <!-- fin  progress bar-->
      </div>
    </div>
  </div>
</div>
<!--end ejemplo-->