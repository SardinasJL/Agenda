@extends("layouts.app")

@section("content")

    <div class="container">
        <div class="card">
            <div class="card-header">
                Tipos de redes sociales
            </div>
            <div class="card-body">

                @if(session("mensaje"))
                    <div class="alert alert-{{session("danger")?"danger":"success"}}">
                        {{session("mensaje")}}
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>nombre</th>
                            <th>
                                <a href="{{route("tiposredes.create")}}" class="btn btn-primary">Nuevo</a>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tiposredes as $tipored)
                            <tr>
                                <td>{{$tipored->id}}</td>
                                <td>{{$tipored->nombre}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{route("tiposredes.edit", [$tipored])}}"
                                           class="btn btn-secondary">Editar</a>
                                        <!-- Button trigger modal -->
                                        <button type='button' class='btn btn-danger' data-bs-toggle='modal'
                                                data-bs-target='#exampleModal{{$tipored->id}}'>Eliminar
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <div class='modal fade' id='exampleModal{{$tipored->id}}' tabindex='-1'
                                 aria-labelledby='exampleModalLabel'
                                 aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header bg-danger'><h5 class='modal-title'
                                                                                id='exampleModalLabel'>
                                                Eliminar</h5>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal'
                                                    aria-label='Close'></button>
                                        </div>
                                        <div class='modal-body'>¿Desea eliminar el tipo de
                                            red? {{$tipored->nombre}}</div>
                                        <div class='modal-footer'>
                                            <form action="{{route("tiposredes.destroy", [$tipored])}}" method="POST">
                                                @method("DELETE")
                                                @csrf
                                                <button type='submit' class='btn btn-danger'>Eliminar</button>
                                            </form>
                                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>
                                                Cancelar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

@endsection
