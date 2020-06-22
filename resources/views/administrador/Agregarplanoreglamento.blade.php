@include('plantillas.header')
<link rel="stylesheet" href="/javascript/jquery-ui/jquery-ui.min.css">
<link rel="stylesheet" href="/javascript/jquery-ui/jquery-ui.structure.min.css">
<link rel="stylesheet" href="/javascript/jquery-ui/jquery-ui.theme.min.css">
    
@include('plantillas.menu')
@include('plantillas.section')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Agregar Regalmento y plano del fracionamiento</h4>
        <input type="hidden" name="id" id='idfr' value="{{$id}}">
    </div>
</div>
<div class="alert alert-danger" role="alert" style="display:none;"></div>

<div class="alert alert-primary" id="buena" role="alert" style="display:none;"></div>

<div class="card" id="id_formularios">
    <div class="card-body">
        <form id="formulario"  action="/Guardar_archivos/" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id_frac" value="{{$id}}">
            <div class="form-group">
                <label for="regalmento">Selecione el Reglamento con extension pdf</label>
                <input type="file" name="Reglamento" id="Reglamento" class="form-control">
            </div>
            <div class="form-group">
                <label for="plano">Selecione el plano con extension pdf</label>
                <input type="file" name="plano" id="plano" class="form-control">
            </div>
            <input type="submit" value="Guardar" >
        </form>
        <div id="cargando" style="display:none;">
            cargando....<span id="porsentage"></span>
                <div id="barra">
                </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div id="Archivos">

        </div>
    </div>
</div>
@include('plantillas.Endsection')
@include('plantillas.footer')
<script src="/javascript/jquery-ui/jquery-ui.min.js"></script>
<script src="/javascript/subirArchivos.js"></script>