@include('plantillas.header')
@include('plantillas.menu')
@include('plantillas.section')
<div class="alert alert-danger" role="alert" style="display:none;"></div>

<div class="alert alert-primary" id="buena" role="alert" style="display:none;"></div>


<div class="card">
  <div class="card-body">
    <h5 class="card-title">Registro de fraccionamientos</h5>

    <form method="post" id="formulario" enctype="multipart/form-data" onsubmit="return false">
        <div>
            <label for="imagen">Selecionar imagen</label>
            <input type="file" name="imagen" id="imagen" class="form-control">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Nombre del Fraccionamientos</label>
            <input type="text" class="form-control" name="nombre_frac" id="nombre_frac" placeholder="Fraccionamiento">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Selecciona el Pais</label>
            <select name="pais" id="pais" class="form-control" onchange="funcionPais()">
            </select>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Selecciona el Estado</label>
            <select name="estado" id="estado" class="form-control" onchange="MostrarMunicipios()"></select>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Seleciona el Municipio</label>
            <select name="municipio" id="municipio" class="form-control"></select>
        </div>
        <input type="submit" value="Guardar">
    </form>
  </div>
</div>
@include('plantillas.Endsection')
@include('plantillas.footer')
<script src="javascript/Fracionamientos.js"></script>
