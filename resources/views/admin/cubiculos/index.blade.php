@extends('adminlte::page')
@csrf
@section('title', 'Admin - Cubiculos')

@section('content')

@section('content_header')
<h1>
    Cubiculo
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-cubiculos">
        Crear
    </button>
</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listado de cubiculos</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="categories" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cubiculos as $cubiculo)
                        <tr>
                            <td>{{$cubiculo ->id}}</td>
                            <td>{{$cubiculo ->nombre}}   </td>
                            <td>{{$cubiculo ->descripcion}}</td>
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-update-cubiculos-{{$cubiculo->id}}">
                                    Editar
                                </button>
                                <button class="btn btn-danger">Eliminar</button>
                            </td>
                        </tr>
                       @include('admin.cubiculos.modal-update-cubiculo')
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Opciones</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>

<!-- modal -->
<div class="modal fade" id="modal-create-cubiculos">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Crear Cubiculo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <form action="{{route('admin.cubiculos.store')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Nombre del Cubiculo</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" >
                        <label for="descripcion">Descripcion</label>
                        <input type="text" name="descripcion" class="form-control" id="descripcion" >
                    </div>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-outline-primary">Guardar</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


@stop


@section('js')
<script>
    $(document).ready(function () {
        $('#categories').DataTable({
            "order": [[3, "desc"]]
        });
    });
</script>
@stop

@endsection
