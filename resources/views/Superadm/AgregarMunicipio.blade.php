@include('plantillas.header')
@include('plantillas.menuSuperAdmin')
@include('plantillas.section')
<meta name="csrf-token" content="{{ csrf_token() }}">


<div class="alert alert-danger" id="error" role="alert" style="display:none;">
</div>
<div class="alert alert-primary" id="buena" role="alert" style="display:none;">
</div>

<div class="card">
  <div class="card-body">
  <h4 class="card-title">Municipios</h4>
    <form id="formpais">
        <div class="form-group">
            <label for="">Selecionar Pais</label>
            <select name="pais" id="pais" class="form-control" onchange="funcionPais();">
                @foreach ($paises as $item)
                    <option value="{{$item->ID_PAIS}}">{{$item->NOMBRE_PAIS}}</option>
                @endforeach
                
            </select>
            <label for="">Selecionar Estado</label>
            <select name="estado" id="estado" class="form-control">
            </select>

            <label for="exampleInputEmail1">Agregar Municipio</label>
            <input type="text" class="form-control" id="municipio" name="municipio" aria-describedby="emailHelp">
        </div>
        <button type="button" class="btn btn-primary" onclick="GuardarMunicipo();">Guardar</button>
    </form>    
  </div>
</div>


<div class="card">
    <div class="card-body">
        <table class="table" id="tabla">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre del Municipio</th>
                    <th scope="col">Aciones</th>
                </tr>
            </thead>
            <tbody id="contenido">
            
            </tbody>
        </table>
    </div>
</div>




@include('plantillas.Endsection')
@include('plantillas.footer')
            <div class="modal" id="Editar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel1">Editar Municipio</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <fieldset class="form-group">
                                <label for="roundText">Municipio</label>
                                    <input type="text" id="Municipio_nombre" class="form-control round" placeholder="">
                            </fieldset>
                        </div>
                        <input type="hidden" name="id_muni" id="id_muni">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-outline-primary" onclick="Editar()">Guardar</button>
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

<script>
    $(document).ready(function () {
        funcionPais();
        MostrarMunicipios();
    });

    function MostrarMunicipios() {
        $.ajax({
            type:"ajax",
            method:"get",
            url:"TraerMunicipios",
            async:false,
            dataType:'json',
                    success: function(response){
                        // console.log(response);

                        var tabla;
                        for (let index = 0; index < response.length; index++) {
                            tabla+='<tr><th scope="row">'+response[index].ID_MUNICIPIO+'</th> <td>'
                            +response[index].NOMBRE_MUNICIPIO+'</td> <td>'
                            +'<a href="javascript:;" style="width: 30%;" onclick="Modal('+response[index].ID_MUNICIPIO+')" class="btn btn-block btn-warning" data="'+response[index].ID_MUNICIPIO+'"><i class="fa fa-fw fa-refresh"></i></a>'
                            +'<a href="javascript:;" style="width: 30%;" class="btn -blobtnck btn-danger" data="'+response[index].ID_MUNICIPIO+'"><i class="fa fa-fw fa-remove"></i></a>'
                            +'</td></tr>';
                        }
                        $('#contenido').html(tabla);
                    },
                beforeSend:function(){},
                error:function(objXMLHttpRequest){
                    $("#error").html("Ocurrio un error en el servidor").fadeIn().delay(4000).fadeOut('snow'); 
                }
            });
    }

    //modal que muestra los municipios para editar
    // $(function () {
    function Modal(id_municipio) {

            $.ajax({
                cache:false,
                dataType:"json",
                type: 'POST',
                url:'MunicipioGet',
                data: {id_municipio:id_municipio},
                success:function (response) {
                    $("#id_muni").val(response.municipios[0].ID_MUNICIPIO);
                    $("#Municipio_nombre").val(response.municipios[0].NOMBRE_MUNICIPIO);
                },
                error:function(ex){
                    console.log(ex);
                }                     
            });
            $('#Editar').modal('show');
    }


    //boton para editar los municipios
    function Editar() {
        var Municipio_nombre = document.getElementById('Municipio_nombre').value;
        var id_muni = document.getElementById('id_muni').value;
        // console.log("hola mund"+Municipio_nombre);
        // console.log("hola "+id_muni);

        $.ajax({
                cache:false,
                dataType:"json",
                type: 'POST',
                async:'false',
                url:'ActualizarMunicipio',
                data: {Municipio_nombre:Municipio_nombre, id_muni:id_muni},
                    success: function(response){
                        if(response.municipios==1) {

                            $("#buena").html("Se actualizo correctamente").fadeIn().delay(4000).fadeOut('snow');
                            $('#Editar').modal('hide'); 
                            MostrarMunicipios();
                        }else
                        {
                            $('#Editar').modal('hide');
                            $("#error").html("Ocurrio un error en el servidor").fadeIn().delay(4000).fadeOut('snow');
                        }
                    },
                beforeSend:function(){},
                error:function(objXMLHttpRequest){
                    $('#Editar').modal('hide');
                    $("#error").html("Ocurrio un error en el servidor").fadeIn().delay(4000).fadeOut('snow');
                }
            });
            
    }

    function GuardarMunicipo() {
        var id_estado = document.getElementById("estado").value;
        var municipio = document.getElementById("municipio").value;

        $.ajax({
                cache:false,
                dataType:"json",
                type: 'POST',
                url:'GuardarMunicipio',
                data: {id_estado:id_estado, municipio:municipio},
                    success: function(response){
                        MostrarMunicipios();
                        $("#buena").html("Agragado Correctamente").fadeIn().delay(4000).fadeOut('snow');
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
                },
                beforeSend:function(){},
                error:function(objXMLHttpRequest){
 
                }
            });
    }

    

</script>


