@include('plantillas.header')
@include('plantillas.menu')
@include('plantillas.section')

<div class="card">
    <div class="card-body">
        <h2 class="card-title">Editar Fraccionamiento</h2>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="/actulizar" method="post" enctype="multipart/form-data">
            @csrf
            <p>
                <label for="imagen">SELECIONAR IMAGEN</label>
                <input type="file" name="imagen" id="imagen" class="form-control">
            </p>
            <p>
                <label for="nombre">NOMBRE DEL FRACCIONAMIENTOS</label>
                <input type="text"  name="nombre" id="nombre" class="form-control" value="{{$resultado[0]->NOMBRE_FRAC}}">
                    {{$errors->first('nombre')}}
                <input type="hidden" name="idestado" id="idestado" value="{{$resultado[0]->ID_ESTADO}}">
                <input type="hidden" name="idmunicipio" id="idmunicipio" value="{{$resultado[0]->ID_MUNICIPIO}}">
                <input type="hidden" name="id_imagen" id="idimagen" value="{{$resultado[0]->ID_IMAGEN}}">
                <input type="hidden" name="id_fracionamiento" id="id_fracionamiento" value="{{$resultado[0]->ID_FRAC}}"> 
            </p>
            <div class="form-group">
                <label for="pais">Selecciona el Pais</label>
                <select name="pais" id="paiss" class="form-control">
                    @foreach($pais as $key)
                        @if($resultado[0]->ID_PAIS == $key->ID_PAIS)
                            <option value="{{$key->ID_PAIS}}" select>{{$key->NOMBRE_PAIS}}</option>
                        @else
                            <option value="{{$key->ID_PAIS}}">{{$key->NOMBRE_PAIS}}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput2">Selecciona el Estado</label>
                <select name="estado" id="estado" class="form-control"></select>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Seleciona el Municipio</label>
                <select name="" id="municipio" class="form-control"></select>
                {{$errors->first('municipio')}}
            </div>
            <input type="submit" value="Actulizar">
        </form>
    </div>
</div>
@include('plantillas.Endsection')
@include('plantillas.footer')
<script src="/javascript/Editarfarcionamiento.js"></script>
