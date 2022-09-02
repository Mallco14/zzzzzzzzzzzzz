@extends('layouts.layout')
@section('content')
<div class="row">
    <section class="content">
        <div class="col-md-8 col-md-offset-2"> 
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="pull-left"><h3>Lista de Agendas</h3></div>
                    <div class="pull-right">
                        <div class="btn-group">
                            <a href="{{ route('agenda.create') }}" class="btn btn-info" >Añadir Contacto</a>
                        </div>
                    </div>
                    <div class="table-container">
                        <table id="mytable" class="table table-bordred table-striped">
                            <thead>
                                <th>id</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Numero</th>
                                <th>Direccion</th>
                                <th>Editar</th>
                                <th>Eliminar</th>   
                            </thead>
                            <tbody>
                                @if($agendas->count())
                                @foreach($agendas as $data)
                                <tr>
                                   
                                    <td>{{$data->id}}</td>
                                    <td>{{$data->nombre}}</td>
                                    <td>{{$data->apellido}}</td>
                                    <td>{{$data->numero}}</td>
                                    <td>{{$data->direccion}}</td>
                                    <td><a class="btn btn-primary btn-xs" href="{{action('App\Http\Controllers\AgendaController@edit', $data->id)}}"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                    <td>
                                        <form action="{{action('App\Http\Controllers\AgendaController@destroy', $data->id)}}" method="post">{{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                                        </form>
                                    </td> 
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="8">No hay Contactos !!</td>
                                </tr>
                                @endif   
                            </tbody>
                    </div>
                </div> 
            </div>
        </div>         
    </section>
</div>
@endsection