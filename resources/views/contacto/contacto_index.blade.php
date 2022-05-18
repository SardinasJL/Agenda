@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="card">
            <div class="card-header">
                Contactos
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
                            <th>
                                id
                            </th>
                            <th>
                                nombre
                            </th>
                            <th>
                                <a href="{{route("contactos.create")}}" class="btn btn-primary">Nuevo</a>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contactos as $contacto)
                            <tr>
                                <td>
                                    {{$contacto->id}}
                                </td>
                                <td>
                                    {{$contacto->nombre}}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{route("contactos.edit", $contacto)}}"
                                           class="btn btn-secondary">Editar</a>
                                        <a href="{{route("contactos.redessociales.index", [$contacto])}}"
                                           class="btn btn-info">Redes sociales</a>
                                        <!-- Button trigger modal -->
                                        <button type='button' class='btn btn-danger' data-bs-toggle='modal'
                                                data-bs-target='#exampleModal{{$contacto->id}}'>Eliminar
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <div class='modal fade' id='exampleModal{{$contacto->id}}' tabindex='-1'
                                 aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header bg-danger'>
                                            <h5 class='modal-title' id='exampleModalLabel'>Eliminar contacto</h5>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal'
                                                    aria-label='Close'></button>
                                        </div>
                                        <div class='modal-body'>¿Desea eliminar el contacto
                                            seleccionado? {{$contacto->nombre}}</div>
                                        <div class='modal-footer'>
                                            <form action="{{route("contactos.destroy", [$contacto])}}" method="POST">
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
