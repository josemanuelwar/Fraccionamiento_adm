$(document).ready(function () {
    llenar();    
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
                 +'<a href="javascript:;" style="width: 30%;" class="btn btn-block btn-danger" data="'+itm[index].ID_PAIS+'"><i class="fa fa-fw fa-remove"></i></a>'
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
$(function name(params) {
    $('.btn-warning').on('click',function(){
        var id_pais=$(this).attr('data');
        console.log(id_pais)
        $('#modal-info').modal('show');
    });
});
