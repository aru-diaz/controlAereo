@extends('index')
<!-- Image and text -->
<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="#" style="margin-left: 3%;">
        <i class="fas fa-plane-departure"></i>
        AERONAVES S.A. de C.V.
    </a>
</nav>

<!-- Lista de aeronaves -->

<div class="container mt-7">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 class="text-center mb-5">Aeronaves listadas</h2>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success" id="agregar" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Agregar aeronave
            </button>

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>TIPO</th>
                        <th>TAMAÑO</th>
                        <th>ESTATUS</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($aeronaves as $aeronave)
                    @if(!$aeronave->AERONAVE_STATUS)
                    <tr>
                        <th>{{ $aeronave->AERONAVE_ID}}</th>
                        <th>{{ $aeronave->AERONAVE_TIPO}}</th>
                        <th>{{ $aeronave->AERONAVE_TAMANIO}}</th>
                        <th>
                            @if($aeronave->AERONAVE_STATUS)
                            ACTIVO
                            @ELSE
                            INACTIVO
                            @ENDIF
                        </th>
                        <th>
                            <i class="fas fa-plane icons-personal" title="Liberar"></i>
                            <i class="fas fa-edit icons-personal" title="Editar"></i>
                            <form method="POST" action="{{ route('eliminar', $aeronave->AERONAVE_ID) }}" style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Desea borrar esta aeronave?');"><i class="fas fa-trash-alt icons-personal" title="Borrar"></i></button>
                            </form>

                        </th>
                    </tr>
                    @ENDIF
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

<!-- Modal para agregar una nueva aeronave -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title col-11 text-center" id="exampleModalLabel">Agregar aeronave</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Validacion de campos -->
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)

                        <li> {{ $error }} </li>

                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="POST" action="{{ route('guardar') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="aeronave_tipo" class="form-label">Tipo aeronave:</label>
                        <select class="form-control" name="aeronave_tipo" required>
                            <option value="-1">Selecciona una opcion...</option>
                            <option value="emergencia">EMERGENCIA</option>
                            <option value="vip">VIP</option>
                            <option value="pasajero">PASAJERO</option>
                            <option value="cargo">CARGO</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="aeronave_tipo" class="form-label">Tamaño aeronave:</label>
                        <select class="form-control" name="aeronave_tamanio" required>
                            <option value="-1">Selecciona una opcion...</option>
                            <option value="grande">GRANDE</option>
                            <option value="chico">CHICO</option>
                        </select>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                        <div class="d-grid gap-2 col-2 mx-auto">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                        <div class="d-grid gap-2 col-4 mx-auto">
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal succes! -->
<a data-bs-toggle="modal" data-bs-target="#modalSucces" id="completo"></a>
<!-- Modal -->
<div class="modal fade" id="modalSucces" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Accion realizada!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{session('aeronaveAccion')}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Continuar</button>
            </div>
        </div>
    </div>
</div>

<!-- Validacion de modales -->
@if($errors->any())
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        document.getElementById("agregar").click();
    });
</script>
@endif
@if(session('aeronaveAccion'))
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        document.getElementById("completo").click();
    });
</script>
@endif