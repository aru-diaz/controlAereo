@extends('index')
<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="#" style="margin-left: 3%;">
        <i class="fas fa-plane-departure"></i>
        AERONAVES S.A. de C.V.
    </a>
</nav>

<!-- Validacion de campos -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7 mt-5">
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)

                    <li> {{ $error }} </li>

                    @endforeach
                </ul>
            </div>
            @endif
            <form method="POST" action="{{ route('editar', $aeronave->AERONAVE_ID) }}">
                @csrf @method('PATCH')
                <div class="mb-3">
                    <label for="aeronave_tipo" class="form-label">Tipo aeronave:</label>
                    <select class="form-control" name="aeronave_tipo" required>
                        <option value="-1" disabled>Selecciona una opcion...</option>
                        <option value="1" @if ($aeronave->AERONAVE_TIPO === "1")
                            selected
                            @endif
                            >EMERGENCIA</option>
                        <option value="2" @if ($aeronave->AERONAVE_TIPO === "2")
                            selected
                            @endif
                            >VIP</option>
                        <option value="3" @if ($aeronave->AERONAVE_TIPO === "3")
                            selected
                            @endif
                            >PASAJERO</option>
                        <option value="4" @if ($aeronave->AERONAVE_TIPO === "4")
                            selected
                            @endif
                            >CARGO</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="aeronave_tipo" class="form-label">Tamaño aeronave:</label>
                    <select class="form-control" name="aeronave_tamanio" required>
                        <option value="-1" disabled> Selecciona una opcion...</option>
                        <option value="grande" @if ($aeronave->AERONAVE_TAMANIO === "grande")
                            selected
                            @endif
                            >GRANDE</option>
                        <option value="chico" @if ($aeronave->AERONAVE_TAMANIO === "chico")
                            selected
                            @endif>CHICO</option>
                    </select>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                    <div class="d-grid gap-2 col-2 mx-auto">
                        <a href="{{ url('/') }}"><button type="button" class="btn btn-danger" data-bs-dismiss="modal">Regresar</button></a>
                    </div>
                    <div class="d-grid gap-2 col-4 mx-auto">
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </div>

            </form>
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


@if(session('aeronaveAccion'))
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        document.getElementById("completo").click();
    });
</script>
@endif