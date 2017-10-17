@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="title">
            <h1>Campaigns list</h1>
        </div>

        @if(Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif

        <div class="btn-create">
            <a href="{{ URL('campaigns/create') }}" class="btn btn-md btn-success">Create</a>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-responsive table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Template</th>
                        <th>Bunch</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($campaigns as $key => $campaign)
                        <tr onclick="window.location='{{ route('campaigns.show', ['id' => $campaign->id]) }}'" class="table-row">
                            <td>{{ $campaign->name }}</td>
                            <td>{{ $campaign->description }}</td>
                            <td>{{ $campaign->template->name }}</td>
                            <td>{{ $campaign->bunch->name }}</td>
                            <td width="27%">
                                <form action="{{ URL('campaigns/'. $campaign->id) }}" method="POST">
                                <a href="{{ URL('campaigns/'. $campaign->id . '/preview') }}" class="btn btn-md btn-warning">Preview</a>
                                <a href="{{ URL('campaigns/'. $campaign->id) }}" class="btn btn-md btn-info">Info</a>
                                <a href="{{ URL('campaigns/'. $campaign->id .'/edit') }}" class="btn btn-md btn-success">Edit</a>
                                <form action="{{ URL('campaigns/'. $campaign->id) }}" method="POST">
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