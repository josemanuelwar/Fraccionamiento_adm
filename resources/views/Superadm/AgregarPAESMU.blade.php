@include('plantillas.header')
@include('plantillas.menuSuperAdmin')
@include('plantillas.section')

<div class="alert alert-danger" id="error" role="alert" style="display:none;">
</div>
<div class="alert alert-primary" id="buena" role="alert" style="display:none;">

</div>

<div class="card">
  <div class="card-body">
  <h4 class="card-title">Paises</h4>
    <form id="formpais">
        <div class="form-group">
            <label for="exampleInputEmail1">Agregar pais</label>
            <input type="text" class="form-control" id="pais" name="pais">
        </div>
        <button type="button" class="btn btn-primary" onclick="Guardar()">Guardar</button>
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
<script src="javascript/Paiscrud.js"></script>
@include('plantillas.footer')
              <div class="modal" id="Editar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel1">Editar Pais</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div>
										        <fieldset class="form-group">
											        <label for="roundText">Pais</label>
											          <input type="text" id="pais_nom" class="form-control round" placeholder="">
										          </fieldset>
									        </div>
                          <input type="hidden" name="id_pais" id="paiss">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                          <button type="button" class="btn btn-outline-primary" onclick="Editar();">Guardar</button>
                        </div>
                      </div>
                    </div>
                  </div>



                  <div class="modal" id="Eliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel1">Editar Pais</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div>
                            Esta seguro de Eliminar el pais ?
										      </div>
                          <input type="hidden" name="id_pais" id="paisElim">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                          <button type="button" class="btn btn-outline-primary" onclick="Eliminar();">Eliminar</button>
                        </div>
                      </div>
                    </div>
                  </div>