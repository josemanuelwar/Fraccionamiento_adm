@include('plantillas.header')
@include('plantillas.menuSuperAdmin')
@include('plantillas.section')
<div class="alert alert-danger" id="error" role="alert" style="display:none;">
</div>
<div class="alert alert-primary" id="buena" role="alert" style="display:none;">
</div>

<div class="card">
  <div class="card-body">
  <h4 class="card-title">Estados</h4>
    <form id="formpais">
        <div class="form-group">
            <label for="">Selecionar Pais</label>
            <select name="" id="pais" class="form-control" onchange="llenar();">
            </select>
            <label for="exampleInputEmail1">Agregar Estado</label>
            <input type="text" class="form-control" id="Estado" name="Estado" aria-describedby="emailHelp">
        </div>
        <button type="button" class="btn btn-primary" onclick="guardar();">Guardar</button>
    </form>    
  </div>
</div>


<div class="card">
    <div class="card-body">
        <table class="table" id="tabla">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre del pais</th>
                    <th scope="col">Aciones</th>
                </tr>
            </thead>
            <tbody id="contenido">
            
            </tbody>
        </table>
    </div>
</div>




@include('plantillas.Endsection')
<script src="javascript/Estados.js"></script>
@include('plantillas.footer')


                <div class="modal" id="EditarEstado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel1">Editar Estado</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div>
										        <fieldset class="form-group">
											        <label for="roundText">Estado</label>
											          <input type="text" id="Estado_nombre" class="form-control round" placeholder="">
										          </fieldset>
									        </div>
                          <input type="hidden" name="id_estado" id="estado">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                          <button type="button" class="btn btn-outline-primary" onclick="Editar();">Guardar</button>
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="modal" id="Eliminaresatado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel1">Eliminar Estado</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div>
                            Esta seguro de Eliminar el Estado ?
										      </div>
                          <input type="hidden" name="Esatado" id="EsatadoElim">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                          <button type="button" class="btn btn-outline-primary" onclick="Eliminar();">Eliminar</button>
                        </div>
                      </div>
                    </div>
                  </div>