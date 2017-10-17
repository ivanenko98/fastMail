@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="title">
            <h1>Bunches list</h1>
        </div>

        @if(Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif

        <div class="btn-create">
            <a href="{{ URL('bunches/create') }}" class="btn btn-md btn-success">Create</a>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-responsive table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Emails</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bunches as $key => $bunch)
                        <tr onclick="window.location='{{ route('bunches::subscribers.index', ['bunch_id' => $bunch->id]) }}'" class="table-row">
                            <td>{{ $bunch->name }}</td>
                            <td>{{ $bunch->description }}</td>
                            <td>{{ count($bunch->subscribers) }}</td>
                            <td width="25%">
                                <form action="{{ URL('bunches/'. $bunch->id) }}" method="POST">
                                <a href="{{ URL('bunches/'. $bunch->id .'/subscribers') }}" class="btn btn-md btn-info">Subscribers</a>
                                <a href="{{ URL('bunches/'. $bunch->id .'/edit') }}" class="btn btn-md btn-success">Edit</a>
                                <form action="{{ URL('bunches/'. $bunch->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-md btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection