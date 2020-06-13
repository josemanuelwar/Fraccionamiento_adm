'use strict'
$(document).ready(()=>{
    estados();
    municipio();
})

var estados=()=>{
    var idpais=$("#paiss").val();
    var idestado=$("#idestado").val();
    $.ajax({
        type:'ajax',
        method:'get',
        url:'/recuperar_estados/'+idpais,
        async:false,
        dataType:'json',
        success:function (itm) {
            var estados="";
            itm.forEach((elemento) => {
                if(elemento.ID_ESTADO == idestado){
                    estados+='<option value="'+elemento.ID_ESTADO+'" select>'+elemento.NOMBRE_ESTADO+'</option>';
                }else{
                    estados += '<option value="'+elemento.ID_ESTADO+'">'+elemento.NOMBRE_ESTADO+'</option>';
                }
            });
            $("#estado").html(estados);
        },
        error:function (Error) {
            console.log("Error");   
        }
    });
}

var municipio=()=>{
    var idestado=$("#estado").val();
    console.log(idestado);
    var idmunicipio=$("#idmunicipio").val();   
    $.ajax({
        type:'ajax',
        method:'get',
        url:'/recuperar_municipios/'+idestado,
        async:false,
        dataType:'json',
        success:function(itm){
            var elemeto;
            itm.forEach((municipio)=>{
                if(municipio.ID_MUNICIPIO == idmunicipio){
                    elemeto += '<option value="'+municipio.ID_MUNICIPIO+'" select>'+municipio.NOMBRE_MUNICIPIO+'</option>';
                }else{
                    elemeto +='<option value="'+municipio.ID_MUNICIPIO+'">'+municipio.NOMBRE_MUNICIPIO+'</option>';
                }
            });
            $("#municipio").html(elemeto);
        },
        error:function(Error){
            console.log(Error);
        }
    });
}

var selectorpais=document.querySelector("#paiss");

selectorpais.addEventListener('click',()=>{
    estados();
    municipio();
});

var selectorEstado=document.querySelector("#estado");

selectorEstado.addEventListener('click',()=>{
    municipio();
});