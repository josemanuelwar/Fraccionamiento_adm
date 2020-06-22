@include('plantillas.header')
@include('plantillas.menu')
@include('plantillas.section')
<div class="card">
    <div class="card-body">
        <h2 class="card-title">!Bienbenido Alministrador¡....</h2>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Fraccionamientos</h4>
            <table class="table">
                <thead class="thead-dark">
                    <th scope="col">Nombre</>
                    <th scope="col">Imagen</th>
                    <th scope="col">Aciones</th>
                </thead>
                <tbody>
                    @forelse($resutdo as $key)
                    <tr>
                        <td>
                            {{$key->NOMBRE_FRAC}}
                        </td>
                        <td>
                            <img src="data:image/{{$key->EXTENCION_IMG}};base64,{{$key->URL_IMG}}" alt="" width="150px"/>
                        </td>
                        <td>
                            <a href="#" class="btn btn-light">Ir al fracionamientos</a>
                            <a href="/Agregarplanoreglamento/{{encriptarid($key->ID_FRAC)}}" class="btn btn-light">Agregar Plano y Regalmento</a>
                            <a href="/Editar_fracionamiento/{{encriptarid($key->ID_FRAC)}}" class="btn btn-light">Editar</a>
                            <a href="/eliminar/{{encriptarid($key->ID_FRAC)}}" class="btn btn-danger">Eliminar</a>
                        </td>               
                    </tr>
                    @empty
                    <td>
                        No hay informacion
                    </td>                
                    @endforelse
                </tbody>  
             </table>
    </div>
</div>
@include('plantillas.Endsection')
@include('plantillas.footer')