@extends('layouts.app')
@section('title', 'DNS Records')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            @include('layouts.sidemenu')
            <div class="col-md-9">
                @include('layouts.alert')
                <div class="card">
                    <div class="card-header">DNS Records</div>
                    <div class="card-body p-0">
                        <table class="table table-sm m-0 table-condensed">
                            <thead class="">
                                <th class="text-center">Type</th>
                                <th>Name</th>
                                <th>Content</th>
                                <th>TTL</th>
                                <th>Prio</th>
                                <th class="text-center">Action</th>
                            </thead>
                            <tbody class="table-hover">
                                @foreach ($data as $row)
                                    @if ($row->count() > 0)
                                    <tr>
                                        <td class="text-center text-muted">{{ $row->type }}</td>
                                        <td class="text-muted">{{ $row->name }}</td>
                                        <td class="text-muted">
                                            <input type="text" value="{{ $row->content }}" class="border-0 text-muted" readonly>
                                        </td>
                                        <td class="text-muted">{{ $row->ttl }}</td>
                                        <td class="text-muted">{{ $row->prio }}</td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Action">
                                                <a href="{{ route('dns.record.edit', Hashids::encode($row->id)) }}" class="btn btn-sm btn-success"><i class="fe fe-edit mx-1"></i></a>
                                                <a href="{{ route('dns.record.delete', Hashids::encode($row->id)) }}" class="btn btn-sm btn-danger"><i class="fe fe-trash mx-1"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @else
                                        {{ __('No data') }}
                                    @endif
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
