@extends('layouts.app');
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {!! Form::open(['method'=>'POST', 'route' => 'campaigns.store']) !!}
                {!! Form::label('Name', 'Name') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                {!! Form::label('Template', 'Template') !!}
                {!! Form::select('template_id', $templates, null, ['class' => 'form-control']) !!}
                {!! Form::label('Bunch', 'Bunch') !!}
                {!! Form::select('bunch_id', $bunches, null, ['class' => 'form-control']) !!}
                {!! Form::label('Description', 'Description') !!}
                {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                {!! Form::button('Create', ['type' => 'submit', 'class' => 'btn btn-primary btn-form']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection