@extends("layouts.app")

@section("content")

    <div class="container">
        <div class="card">
            <div class="card-header">
                Editar red social
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

                <form action="{{route("contactos.redessociales.store", [$contacto])}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="tipored_id">Tipo red social</label>
                        <select name="tipored_id" id="tipored_id" class="form-select">
                            @foreach($tiposredes as $tipored)
                                <option value="{{$tipored->id}}" {{$tipored->id==old("tipored_id")?"selected":""}}>
                                    {{$tipored->nombre}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="url">Url</label>
                        <input type="text" id="url" name="url" value="{{old("url")}}" class="form-control">
                    </div>
                    <center>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{route("contactos.redessociales.index", [$contacto])}}" class="btn btn-secondary">
                            Cancelar
                        </a>
                    </center>
                </form>

            </div>
        </div>
    </div>

@endsection
