@extends("layouts.app")

@section("content")

    <div class="container">
        <div class="card">
            <div class="card-header">
                Editar tipo de red
            </div>
            <div class="card-body">

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{route("tiposredes.update", $tipored)}}" method="POST">
                    @method("PUT")
                    @csrf
                    <div class="mb-3">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" value="{{old("nombre", $tipored->nombre)}}"
                               class="form-control" autofocus>
                    </div>
                    <center>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{route("tiposredes.index")}}" class="btn btn-secondary">Cancelar</a>
                    </center>
                </form>


            </div>
        </div>
    </div>

@endsection
