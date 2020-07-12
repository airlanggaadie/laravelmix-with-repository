@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    {!! Form::open(['url'=>'foo/bar','method'=>'delete'])!!}
                    
                    {{-- {!! Form::open(['route'=>'dono',])!!} --}}
                        <div class="form-group">
                            {!! Form::label('email', 'E-Mail Address', ['class' => 'control-label'])!!}
                            {!! Form::text('email', null, ['class' => 'form-control', 'placeholder'=>'Enter Username'])!!}
                        </div>
                    {!! Form::close()!!}
                </div>
            </div>
            @role('administrator')
            <div class="card">
                <div class="card-header">Administrator Card</div>
                <div class="card-body">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure possimus nesciunt, unde impedit delectus labore tenetur magnam dolore quam incidunt, provident cum laudantium dignissimos voluptatibus ut minima totam natus. Officia?
                </div>
            </div>
            @endrole
            @role(['administrator','admin'])
            <div class="card mt-3">
                <div class="card-header">Admin Card</div>
                <div class="card-body">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit fuga voluptatem, laboriosam aut earum ipsum. At blanditiis delectus consectetur voluptatem velit sequi quidem itaque dolor excepturi cum eius, eaque voluptatum.
                </div>
            </div>
            @endrole
            @role(['administrator','admin','client'])
            <div class="card mt-3">
                <div class="card-header">Client Card</div>
                <div class="card-body">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit fuga voluptatem, laboriosam aut earum ipsum. At blanditiis delectus consectetur voluptatem velit sequi quidem itaque dolor excepturi cum eius, eaque voluptatum.
                </div>
            </div>
            @endrole
        </div>
    </div>
</div>
@endsection
