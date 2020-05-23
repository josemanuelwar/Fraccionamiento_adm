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


