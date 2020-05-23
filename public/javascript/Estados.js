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
                console.log(ex);
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
            console.log(itm);
            var tabla;
                for (let index = 0; index < itm.length; index++) {
                    tabla+='<tr><th scope="row">'+itm[index].ID_ESTADO+'</th> <td>'
                    +itm[index].NOMBRE_ESTADO+'</td> <td>'
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