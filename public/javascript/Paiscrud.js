$(document).ready(function () {
    llenar();
    paginacion();    
});

llenar=()=>{
    $.ajax({
        type:"ajax",
        method:"get",
        url:"recupear_pais",
        async:false,
        dataType:'json',
        success:function (itm) {
            var tabla;
            for (let index = 0; index < itm.length; index++) {
                 tabla+='<tr><th scope="row">'+itm[index].ID_PAIS+'</th> <td>'
                 +itm[index].NOMBRE_PAIS+'</td> <td>'
                 +'<a href="javascript:;" style="width: 30%;" class="btn btn-block btn-warning" data="'+itm[index].ID_PAIS+'"><i class="fa fa-fw fa-refresh"></i></a>'
                 +'<a href="javascript:;" style="width: 30%;" class="btn -blobtnck btn-danger" data="'+itm[index].ID_PAIS+'"><i class="fa fa-fw fa-remove"></i></a>'
                 +'</td></tr>';
            }
            $('#contenido').html(tabla);
        },
        error:function(error){
            $('#error').html("Error en la cominicasion con el servidor").fadeIn().delay(4000).fadeOut('snow');
        }
    });    
}

Guardar=()=>{    
    var pais=$('#pais').val();
    if(pais=="")
    {
        $("#error").html("Campo Vasio de nombre pais").fadeIn().delay(4000).fadeOut('snow');
    }
    else
    {
        var json={
            'pais':pais
        }

        $.ajax({
            type:'ajax',
            method:'post',
            url:'/agregarpais',
            async:false,
            dataType:'json',
            data:json,
            success:function(itm)
            {
        
                    llenar();
                    $("#buena").html("Agragado Correctamente").fadeIn().delay(4000).fadeOut('snow');
                
            },
            error:function(error) 
            {
                $("#error").html("Ocurrio un error en el servidor").fadeIn().delay(4000).fadeOut('snow');    
            }
        });

    }
}
$(function () {
    $('.btn-warning').on('click',function(){
        var id_pais=$(this).attr('data');
        $.ajax({
            type:'ajax',
            method:'get',
            url:'GetPais/'+id_pais,
            async:'false',
            dataType:'json',
            success:function (itm) {
                $("#paiss").val(itm[0].ID_PAIS);
                $("#pais_nom").val(itm[0].NOMBRE_PAIS);
            },
            error:function(ex){
                console.log(ex);
            }                     
        });
        $('#Editar').modal('show');
    });
});

Guardar=()=>{
    var id_pais=$('#paiss').val();
    var pais=$('#pais_nom').val();
    if(id_pais==""){
        console.log("error");
    }else if(pais==""){
        console.log("ERROR");
    }else{
        var json={
            ID_PAIS:id_pais,
            PAIS:pais,
        }
        $.ajax({
            type:'ajax',
            method:'put',
            url:'/actualizarpais/'+id_pais,
            async:'false',
            dataType:'json',
            data:json,
            success:function(itm){
                if(itm==1){
                    llenar();
                    $("#buena").html("Se ha actualizado  Correctamente").fadeIn().delay(4000).fadeOut('snow');
                    $('#Editar').modal('hide');      
                }else
                {
                    $('#Editar').modal('hide');
                    $("#error").html("Ocurrio un error en el servidor").fadeIn().delay(4000).fadeOut('snow');
                }
            },
            error:function(ex){
                console.log(ex);
            }
        });    
    }    
}

$(function(){
   $('.btn-danger').on('click',function(){
            var idEliminar=$(this).attr('data');
            $('#paisElim').val(idEliminar);   
            $('#Eliminar').modal('show')
   });
});

Eliminar=()=>{
    var eli=$('#paisElim').val();
    console.log(eli);
    $.ajax({
        type:'ajax',
        method:'delete',
        url:'eliminarpais/'+eli,
        async:'false',
        dataType:'json',
        success:function(itm)
        {
            if(itm==0){
                    llenar();
                    $("#buena").html("Se ha Eliminado  Correctamente").fadeIn().delay(4000).fadeOut('snow');
                    $('#Eliminar').modal('hide');               
            }else
            {
                $('#Eliminar').modal('hide');
                $("#error").html("Ocurrio un error en el servidor").fadeIn().delay(4000).fadeOut('snow');               
            }
        },
        error:function(error)
        {
            console.log(error);
        }

    });
}


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