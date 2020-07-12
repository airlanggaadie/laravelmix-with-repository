@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{url('siswa')}}" class="btn btn-link mb-4"><--Back</a>
            <div class="card">
                <div class="card-header">Siswa</div>
                <div class="card-body">
                    {!! Form::open(['url'=> isset($siswa) ? 'siswa/edit/'.$siswa->id : 'siswa/save','method'=> $siswa ? 'put' : 'post'])!!}
                        <div class="form-group">
                            {!! Form::label('name', 'Nama Siswa', ['class' => 'control-label'])!!}
                            {!! Form::text('name', isset($siswa) ? $siswa->name : null, ['class' => 'form-control', 'placeholder'=>'Nama Siswa'])!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('name', 'Kelas', ['class' => 'control-label'])!!}
                            <select name="kelas">
                                <option value="">Pilih Kelas</option>
                                @foreach ($room as $item)
                                    <option value="{{$item->id}}" {{isset($siswa) && $siswa->kelas->id == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        {!! Form::submit('Submit',['class'=>'btn btn-success w-100']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
