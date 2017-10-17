@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="title">
            @foreach($bunches as $key => $bunch)
                <h1>Bunch  "{{ $bunch->name }}"  (subscribers list)</h1>
            @endforeach
        </div>

        @if(Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif

        <div class="btn-create">
            <a href="{{ URL('bunches/'.$bunch_id.'/subscribers/create') }}" class="btn btn-md btn-success">Create</a>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-responsive table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($subscribers as $key => $subscriber)
                        <tr onclick="window.location='{{ route('bunches::subscribers.show', ['bunch_id' => $bunch_id, 'id' => $subscriber->id]) }}'" class="table-row">
                            <td>{{ $subscriber->name }}</td>
                            <td>{{ $subscriber->surname }}</td>
                            <td>{{ $subscriber->email }}</td>
                            <td width="20%">
                                <form action="{{ URL('bunches/'.$bunch_id.'/subscribers/'. $subscriber->id) }}" method="POST" class="confirm-delete">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                <a href="{{ URL('bunches/'.$bunch_id.'/subscribers/'. $subscriber->id) }}" class="btn btn-md btn-info">Info</a>
                                <a href="{{ URL('bunches/'.$bunch_id.'/subscribers/'. $subscriber->id .'/edit') }}" class="btn btn-md btn-success">Edit</a>
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