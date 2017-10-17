@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="title">
            <h1>Templates list</h1>
        </div>

        @if(Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif

        <div class="btn-create">
            <a href="{{ URL('templates/create') }}" class="btn btn-md btn-success">Create</a>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-responsive table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Content</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($templates as $key => $template)
                            <tr onclick="window.location='{{ route('templates.show', ['id' => $template->id]) }}'" class="table-row">
                                <td>{{ $template->name }}</td>
                                <td>{!! $template->content !!}</td>
                                <td width="25%">
                                    <form action="{{ URL('templates/'. $template->id) }}" method="POST">
                                    <a href="{{ URL('templates/'. $template->id) }}" class="btn btn-md btn-info">Info</a>
                                    <a href="{{ URL('templates/'. $template->id .'/edit') }}" class="btn btn-md btn-success">Edit</a>

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