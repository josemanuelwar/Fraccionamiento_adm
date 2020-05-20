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
            <input type="text" class="form-control" id="pais" name="nombre" aria-describedby="emailHelp">
        </div>
        <button type="button" class="btn btn-primary" onclick="Guardar()">Guardar</button>
    </form>    
  </div>
</div>

<div class="card">
    <div class="card-body">
        <table class="table">
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
<div class="modal modal-info fade" id="modal-info">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Info Modal</h4>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>


@include('plantillas.Endsection')
@include('plantillas.footer')
<script src="javascript/Paiscrud.js"></script>