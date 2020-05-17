@include('plantillas.header')
@include('plantillas.menu')
@include('plantillas.section')
<div class="alert alert-danger" role="alert" style="display:none;"></div>

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Registro de fraccionamientos</h5>

    <form>
        <div class="form-group">
            <label for="formGroupExampleInput">Nombre del Fraccionamientos</label>
            <input type="text" class="form-control" id="nombre_frac" placeholder="Example input">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Selecciona el Pais</label>
            <select name="pais" id="pais" class="form-control"></select>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Selecciona el Estado</label>
            <select name="estado" id="estado" class="form-control"></select>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Seleciona el Municipio</label>
            <select name="municipio" id="municipio" class="form-control"></select>
        </div>
        <button type="button" class="btn btn-success">Guardar</button>
    </form>
  </div>
</div>

@include('plantillas.Endsection')
@include('plantillas.footer')
<script src="javascript/Fracionamientos.js"></script>