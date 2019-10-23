@extends('alertas.info_alumno')
<!-- Modal -->
<div class="modal fade" id="reg_alumno" tabindex="-1" role="dialog" aria-labelledby="inicio_serv" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Para agregar un nuevo alumno, ingrese el numero de control.</p>
                <form action="">
                  <input type="text" class="form-control form-control-sm" name="num_control" id="num_control" placeholder="Numero de control" required autofocus>
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-success" data-target="#info_alumno" data-toggle="modal" data-dismiss="modal">Iniciar</button>
            </div>
          </div>
        </div>
      </div>  
