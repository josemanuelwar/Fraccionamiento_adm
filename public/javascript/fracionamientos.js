$(document).ready(function(){
    pais();
    Estado();
    municipio();
});

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

Estado=()=>{
    var id_pais=$('#pais').val();
    $.ajax({
        type:'ajax',
        method:'get',
        url:'recuperar_estados/'+id_pais,
        async:false,
        dataType:'json',
        success:function(itm){
            if(itm!=null)
            {
                var estados;
                for (let index = 0; index < itm.length; index++) {
                    estados += '<option value="'+itm[index].ID_ESTADO+'">'+itm[index].NOMBRE_ESTADO+'</option>'
                }
                $('#estado').html(estados);
            }else
            {
                $('.alert-danger').html('error de no se encontro nada').fadeIn().delay(4000).fadeOut('snow');
            }
        },
        error:function(error){
            $('.alert-danger').html('error de comunicasion').fadeIn().delay(4000).fadeOut('snow');
        }
    });
}

municipio=()=>{
    var id_estado=$('#estado').val();
    $.ajax({
        type:'ajax',
        method:'get',
        url:'recuperar_municipios/'+id_estado,
        async:false,
        dataType:'JSON',
        success:function(itm)
        {
            if(itm != null)
            {
                var mun;
                for (let index = 0; index < itm.length; index++) {
                    mun += '<option value="'+itm[index].ID_MUNICIPIO+'">'+itm[index].NOMBRE_MUNICIPIO+'</option>';
                }
                $('#municipio').html(mun);
            }
            else
            {
                $(".alert-danger").html("no se encontro nada").fadeIn().delay(4000).fadeOut('snow');
            }
        },
        error:function(error)
        {
            $('.alert-danger').html('Error de comunicasion').fadeIn().delay(4000).fadeOut('snow');
        }
    });
}