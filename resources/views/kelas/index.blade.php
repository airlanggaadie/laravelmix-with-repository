@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Kelas</div>
                <div class="card-body">
                    @if ($message = Session::get('message'))                        
                    <div class="alert alert-success alert-dismissible">
                        <button class="close" data-dismiss="alert">&times;</button>
                        <strong>Success!</strong> {{$message}}
                    </div>
                    @endif
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Nomor</th>
                                <th scope="col">Nama Kelas</th>
                                <th scope="col">#</th>
                                <th scope="col">##</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($room as $key => $item)
                            <tr>
                                <th scope="row">{{$key + 1}}</th>
                                <td>{{$item->name}}</td>
                                <td>
                                        
                                    {!! Form::open(['url'=>'kelas/edit/'.$item->id,'method'=>'get'])!!}
                                        {!! Form::submit('Edit',['class'=>'btn btn-primary']) !!}
                                    {!! Form::close() !!}
                                </td>
                                <td>
                                    {!! Form::open(['url'=>'kelas/delete/'.$item->id,'method'=>'delete'])!!}
                                        {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$room->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
