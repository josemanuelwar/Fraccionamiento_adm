$(document).ready(function(){
    checar_archivos();
    //subir los archivos 
   var subirarchivos=$("#formulario");
   subirarchivos.submit(function(e){
        e.preventDefault();
        var Archivos = new FormData(document.querySelector("#formulario"));
        if($("#Reglamento").val() == ""){
            $(".alert-danger").html("Error no selecione el archivo del Reglamento").fadeIn().delay(4000).fadeOut().show();
        }else if($("#plano").val() == ""){
            $(".alert-danger").html("Error no selecione el archivo del plano").fadeIn().delay(4000).fadeOut().show();
        }else{
            
            $.ajax({
                type:'ajax',
                method:'post',
                url:$(this).attr("action"),
                data:Archivos,
                dataType:"JSON",
                cache:false,
                contentType:false,
                processData:false,
                success:function(item){
                    //daclaramos la variable 
                    var x = 0;
                    $("#cargando").show();
                    //visualizacion de como carga los archivos
                    var progerso=setInterval(function(){
                        if(x == 100){
                            //denememos la barra
                            var cargpor=`${x} %
                                    `;
                            $("#porsentage").html(cargpor);
                            $("#barra").progressbar( {max:100, value:x} );
                            clearInterval(progerso);
                            console.log(item);
                            if(item == "true"){
                                $("#buena").html("Se han guardado correctamente").fadeIn().delay(4000).fadeOut().show();
                                $("#cargando").delay(4000).fadeOut();
                                checar_archivos();
                            }else{
                                $(".alert-danger").html("Error al subir los archivos").fadeIn().delay(4000).fadeOut().show();
                                $("#cargando").delay(4000).fadeOut();  
                            }
                            
                        }else{
                            var cargpor=`${x} %
                                    `;
                            $("#porsentage").html(cargpor);
                            $("#barra").progressbar( {max:100, value:x} );
                            x=10+x; 
                        }
        
                    },1000); 
                },
                error:function(error){
                        console.log("Erro de comunicasion ");
                        //clearInterval(progerso);        
                },
                timeout:10000
                
            });
        }
        return false;
   });
   
});




function checar_archivos() {
   var id= $("#idfr").val();
   var tex=$("#Archivos");
    $.ajax({
        type:'ajax',
        method:'get',
        url:'/MostrarArchivos/'+id,
        async:false,
        dataType:'JSON',
        beforeSend:function(){
            console.log("cargando");
            tex.html('<center> <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i></center>')
        },
        success:function(item){
             console.log(item);
             if(item.length != 0){
                 $("#id_formularios").fadeOut();
                var regalmento=`
                <button>EDITAR</button>
                <div class="row">
                    <div class=".col-md-6">
                        <center><h2>${item[0].NOMBRE_ARCHIVO}</h2></center>
                        <iframe src="${item[0].URL_ARCHIVO}" title="reglamento" width="500" height="500">
                        </iframe>
                    </div>
                    <div class=".col-md-6">
                        <center><h2>${item[1].NOMBRE_ARCHIVO}</h2></center>
                        <iframe src="${item[1].URL_ARCHIVO}" title="reglamento" width="500" height="500">
                        </iframe>
                    </div>
                </div>
                `;
                tex.html(regalmento);
             }else{
                 $("#id_formularios").show();
                 var texto=`<center><h1>No hay archivos que mostar</h1>
                 </center>`;
                 tex.html(texto);
             }
        },
        error:function(error){
            console.log("error ");
        }
      });    
}