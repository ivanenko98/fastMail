@extends('layouts.app')

@section('content')
<div class="container">
    <div class="form-group">
        <div class="centered-child col-md-9 col-sm-7 col-xs-6">
            <h1>Subscriber: <b>{{$subscriber->name}}</b></h1>
        </div>
        <div class="col-md-2 col-sm-3 col-xs-4">
            <div class="pull-right">
                {{Form::open(['class' => 'confirm-delete', 'route' => ['bunches::subscribers.destroy', $bunch_id, $subscriber->id], 'method' => 'DELETE'])}}
                {{link_to_route('bunches::subscribers.edit', 'Edit', [$bunch_id, $subscriber->id], ['class' => 'btn btn-primary btn-md']) }}
                {{Form::button('Delete', ['class' => 'btn btn-danger btn-md', 'type' => 'submit'])}}
                {{Form::close()}}
            </div>
        </div>
    </div>
    <table class="table table-bordered table-responsive">
        <tr>
            <th width="25%">Attribute</th>
            <th width="75%">Value</th>
        </tr>
        @foreach ($subscriber->getAttributes() as $attribute => $value)
            <tr>
                <td>{{$attribute}}</td>
                <td>{{$value}}</td>
            </tr>
        @endforeach
    </table>
    <a class="btn btn-info btn-md col-md-1 col-sm-2 col-xs-2" href="{{route('bunches::subscribers.index', $bunch_id)}}"><i class="fa fa-backward" aria-hidden="true"></i>Back</a>
</div>
@endsection