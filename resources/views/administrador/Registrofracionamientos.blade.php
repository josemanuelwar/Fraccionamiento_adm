@include('plantillas.header')
@include('plantillas.menu')
@include('plantillas.section')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="alert alert-danger" role="alert" style="display:none;"></div>

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Registro de fraccionamientos</h5>

    <form>
        <div class="form-group">
            <label for="formGroupExampleInput">Nombre del Fraccionamientos</label>
            <input type="text" class="form-control" name="nombre_frac" id="nombre_frac" placeholder="Fraccionamiento">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Selecciona el Pais</label>
            <select name="pais" id="pais" class="form-control" onchange="funcionPais()">
                @foreach ($paises as $item)
                    <option value="{{$item->ID_PAIS}}">{{$item->NOMBRE_PAIS}}</option>
                @endforeach
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
        <button type="button" class="btn btn-success" onclick="GuardarFraccionamiento()">Guardar</button>
    </form>
  </div>
</div>

@include('plantillas.Endsection')
@include('plantillas.footer')
{{-- <script src="javascript/Fracionamientos.js"></script> --}}

    <script>
        $(document).ready(function () {
        funcionPais();
        MostrarMunicipios();
    });


    // funcion para mostrar los municipios
    function MostrarMunicipios(id_estado) {
        var estado = document.getElementById('estado').value;
        // console.log("del estado "+estado);
        document.getElementById("municipio").length=0;
        // $('#contenido').empty();
        // console.log("id del estado "+id_estado);
        $.ajax({
            type:"ajax",
            method:"post",
            url:"TraerMunicipios",
            data: {estado:estado},
            async:false,
            dataType:'json',
                    success: function(response){
                        // console.log(response);

                        j=0;
                        for (let i = 0; i < response.length; i++) {

                            document.getElementById("municipio").innerHTML += "<option value='"+response[i].ID_MUNICIPIO+"'>"
                                                                                    +response[i].NOMBRE_MUNICIPIO+
                                                                            "</option>";

                        }
                        // console.log(response);
                    },
                beforeSend:function(){},
                error:function(objXMLHttpRequest){
                    $("#error").html("Ocurrio un error en el servidor").fadeIn().delay(4000).fadeOut('snow'); 
                }
            });
    }


    
    // funcion para cargar los estados de cada pais
    function funcionPais() {
        var id_pais = document.getElementById('pais').value;
        document.getElementById("estado").length=0;
        document.getElementById("municipio").length=0;
        
        // console.log(pais);

        $.ajax({
                cache:false,
                dataType:"json",
                type: 'POST',
                url:'TraerEstados',
                data: {id_pais:id_pais},
                success: function(response){
                    j=0;
                    for (let i = 0; i < response.estados.length; i++) {

                        document.getElementById("estado").innerHTML += "<option value='"+response.estados[i].ID_ESTADO+"'>"
                                                                                +response.estados[i].NOMBRE_ESTADO+
                                                                        "</option>";

                    }
                    var estado = document.getElementById("estado").value;
                    // console.log("estado "+estado);
                    MostrarMunicipios(estado);
                },
                beforeSend:function(){},
                error:function(objXMLHttpRequest){
 
                }
            });
    }


       


        function GuardarFraccionamiento() {
            var nombre_frac = document.getElementById('nombre_frac').value;
            var pais = document.getElementById('pais').value;
            var estado = document.getElementById('estado').value;
            var municipio = document.getElementById('municipio').value;
        }
    </script>