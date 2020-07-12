@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{url('kelas')}}" class="btn btn-link mb-4"><--Back</a>
            <div class="card">
                <div class="card-header">Kelas</div>
                <div class="card-body">
                    {!! Form::open(['url'=> isset($kelas) ? 'kelas/edit/'.$kelas->id : 'kelas/save','method'=> isset($kelas) ? 'put' : 'post'])!!}
                        <div class="form-group">
                            {!! Form::label('name', 'Nama Kelas', ['class' => 'control-label'])!!}
                            {!! Form::text('name', isset($kelas) ? $kelas->name : null, ['class' => 'form-control', 'placeholder'=>'Nama Kelas'])!!}
                        </div>
                        {!! Form::submit('Submit',['class'=>'btn btn-success w-100']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
