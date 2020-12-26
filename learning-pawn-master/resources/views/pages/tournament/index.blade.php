@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Tournaments
                    @permission('tournaments-create')
                    <a href="{{ route('tournament.create') }}" class="btn btn-sm btn-secondary float-right">Create</a>
                    @endpermission
                </div>

                <div class="card-body">

                    @if (session('message'))
                    <x-alert :type="session('type')" :message="session('message')" />
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Posted By</th>
                                <th>Published</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tournaments as $tournament)
                            <tr>
                                <td>{{ $tournament->id }}</td>
                                <td>{{ $tournament->title }}</td>
                                <td>{{ $tournament->user->name }}</td>
                                <td>{{ $tournament->published ? 'Published' : 'Unpublished' }}</td>
                                <td>
                                    <form action="{{ route('tournament.destroy', $tournament->id) }}" method="post">
                                        @method('DELETE') @csrf
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                            @permission( 'tournaments-edit' )
                                            <a href="{{ route('tournament.edit', $tournament->id) }}" class="btn btn-info text-white">Edit</a>
                                            @endpermission
                                            @permission( 'tournaments-delete' )
                                            <button type="submit" class="btn btn-danger text-white">Delete</button>
                                            @endpermission
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $tournaments->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
