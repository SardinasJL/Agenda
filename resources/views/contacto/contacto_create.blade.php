@extends("layouts.app")

@section("content")

    <div class="container">
        <div class="card">
            <div class="card-header">
                Nuevo contacto
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

                <form action="{{route("contactos.store")}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" value="{{old("nombre")}}" autofocus>
                    </div>
                    <center>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{route("contactos.index")}}" class="btn btn-secondary">Cancelar</a>
                    </center>
                </form>

            </div>
        </div>
    </div>

@endsection
