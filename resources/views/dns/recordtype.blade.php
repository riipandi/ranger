@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            @include('layouts.sidemenu')
            <div class="col-md-9">
                @include('layouts.alert')
                <div class="card">
                    <div class="card-header">
                        DNS Record Type
                        {{-- <a href="javascript:;" class="btn btn-success btn-sm float-right">Add</a> --}}
                    </div>
                    <div class="card-body">
                        <table class="table table-sm m-0">
                            <thead class="">
                                <th class="text-center">#</th>
                                <th>Type</th>
                                <th class="text-left">Description</th>
                            </thead>
                            <tbody class="table-hover">
                                @foreach ($data as $rc)
                                <tr>
                                    <td class="text-center">{{ ($data ->currentpage()-1) * $data ->perpage() + $loop->index + 1 }}</td>
                                    <td>{{ $rc->name }}</td>
                                    <td class="text-muted">{{ $rc->description }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <nav aria-label="navigation" class="float-right">
                            {{ $data->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
