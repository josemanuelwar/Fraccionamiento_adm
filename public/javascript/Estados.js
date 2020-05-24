$(document).ready(function(){
    pais();
    llenar();
    paginacion();
});
paginacion=()=>{
    $(document).ready(function () {
        $("#tabla").DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "stateSave": true,
            "responsive": true,
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por p&aacute;gina",
                "search": "Buscar: ",
                "zeroRecords": "No hay registros",
                "info": "Mostrando _START_ de _END_ de un total de _TOTAL_ registros",
                "infoFiltered": "(Fitltrando de un total de _MAX_ registros)",
                "paginate": {
                    "first": "Inicio",
                    "last": "&Uacte;ltimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "infoEmpty": "Sin Registros",
            },
        });
    });

}

pais=()=>{
    $.ajax({
        type:'ajax',
        method:'get',
        url:'recupear_pais',
        async:false,
        dataType:'json',
        success:function(itm){
            if(itm != null){
                var element;
                for (let index = 0; index < itm.length; index++) {
                    element += '<option value="'+itm[index].ID_PAIS+'">'+itm[index].NOMBRE_PAIS+'</option>'
                }
                $('#pais').html(element);
            }else{
                $('.alert-danger').html("error Comuniquese con el administrador").fadeIn().delay(4000).fadeOut('snow');
            }
        },
        error:function(error){
            $('.alert-danger').html("error en la comunicasion").fadeIn().delay(4000).fadeOut('snow');
        }
    });
}





guardar=()=>{
    var id_pais=$("#pais").val();
    var Estado=$("#Estado").val();
    if(Estado==""){
        $("#error").html("Campo Vasio de nombre Estado").fadeIn().delay(4000).fadeOut('snow');
    }else{
        var dato={
            'id_pais':id_pais,
            'Estado':Estado
        }
        $.ajax({
            type:'ajax',
            method:'post',
            url:'GuardarEstado',
            async:'false',
            dataType:'json',
            data:dato,
            success:function(itm)
            {
                llenar();
                $("#buena").html("Agragado Correctamente").fadeIn().delay(4000).fadeOut('snow');                
            },
            error:function(ex)
            {
                $('#error').html("Error  al conectarse al servidor").fadeIn().delay(4000).fadeOut('snow');
            }
        })
    }
    
}

llenar=()=>{
    var id_pais=$('#pais').val();
    $.ajax({
        type:"ajax",
        method:"get",
        url:'recuperar_estados/'+id_pais,
        async:false,
        dataType:'json',
        success:function (itm) {
            var tabla;
                for (let index = 0; index < itm.length; index++) {
                    tabla+='<tr><th scope="row">'+itm[index].ID_ESTADO+'</th> <td>'
                    +itm[index].NOMBRE_ESTADO+'</td> <td>'
                    +'<a href="javascript:;" style="width: 30%;" class="btn btn-block btn-warning" data="'+itm[index].ID_ESTADO+'"><i class="fa fa-fw fa-refresh"></i></a>'
                    +'<a href="javascript:;" style="width: 30%;" class="btn -blobtnck btn-danger" data="'+itm[index].ID_ESTADO+'"><i class="fa fa-fw fa-remove"></i></a>'
                    +'</td></tr>';
                }
            
            $('#contenido').html(tabla);
        },
        error:function(error){
            $('#error').html("Error en la cominicasion con el servidor").fadeIn().delay(4000).fadeOut('snow');
        }
    });    
}

$(function(){
    $('.btn-warning').on('click',function(){
        var id_estado=$(this).attr('data');
            $.ajax({
                type:"ajax",
                method:"get",
                url:"GetEstado/"+id_estado,
                async:'false',
                dataType:'json',
                success:function(itm){
                    $('#Estado_nombre').val(itm[0].NOMBRE_ESTADO);
                    $('#estado').val(itm[0].ID_ESTADO);
                },
                error:function(error){
                    $('#error').html("Error en la cominicasion con el servidor").fadeIn().delay(4000).fadeOut('snow');
                }
            });         
        $('#EditarEstado').modal('show');

    })
});

Editar=()=>{
    var id_estados=$('#estado').val();
    var Estado=$('#Estado_nombre').val();
    if(Estado==""){
        $('#error').html("Error falta el nombre").fadeIn().delay(4000).fadeOut('snow');
    }else
    {
        var dato={
            'id_estado':id_estados,
            'estado':Estado
        }
        $.ajax({
            type:'ajax',
            method:'put',
            url:'updateEstado/'+id_estados,
            async:'false',
            dataType:'json',
            data:dato,
            success:function(itm){
                if(itm==1){
                    llenar();
                    $("#buena").html("Se ha actualizado  Correctamente").fadeIn().delay(4000).fadeOut('snow');
                    $('#EditarEstado').modal('hide');                   
                }else{
                    $('#error').html("Error al actualizar").fadeIn().delay(4000).fadeOut('snow');                   
                }
            },
            error:function(erro){
                $('#error').html("Error  al conectarse al servidor").fadeIn().delay(4000).fadeOut('snow');
            }
        });
    }
    
}

$(function(){
    $('.btn-danger').on('click',function(){
        var id_estado=$(this).attr('data');
        $('#EsatadoElim').val(id_estado);
        $('#Eliminaresatado').modal('show');
    })
});

Eliminar=()=>{
    var id_esatdo=$('#EsatadoElim').val();
    
    $.ajax({
        type:'ajax',
        method:'delete',
        url:'deleEstado/'+id_esatdo,
        async:'false',
        dataType:'json',
        success:function(itm){
            if(itm==1){
                llenar();
                $("#buena").html("Se ha Eliminado  Correctamente").fadeIn().delay(4000).fadeOut('snow');
                $('#Eliminaresatado').modal('hide');               
            }else{
                $('#error').html("Error al Eliminar").fadeIn().delay(4000).fadeOut('snow');
                $('#Eliminaresatado').modal('hide');               
            }
        },erro:function(erroe){
            $('#error').html("Error  al conectarse al servidor").fadeIn().delay(4000).fadeOut('snow');
        }
    });
}