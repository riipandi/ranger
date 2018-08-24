@extends('layouts.app')
@section('title', 'DNS Records')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        @include('layouts.sidemenu')
        <div class="col-md-9">
            @include('layouts.alert')
            <div class="card">
                <div class="card-header">
                    DNS Records for {{ $domain->name }}
                    {{-- <button type="button" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#frmAddModal">Add Record</button> --}}
                </div>
                <div class="card-body p-0">
                    <div class="my-2 px-2">
                        <form method="POST" action="{{ route('dns.record.add') }}">
                            @csrf
                            <input type="hidden" name="domain_id" value="{{ $domain->id }}">
                            <div class="form-row">
                                <div class="col-sm-2">
                                    <select name="recordType" id="recordType" class="form-control text-muted" required>
                                        <option value="">Type</option>
                                        @foreach($type as $t)
                                            <option value="{{$t->name}}">{{$t->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="name" placeholder="Name">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="content" placeholder="Value">
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control text-center" name="ttl" value="3600" placeholder="TTL">
                                </div>
                                <div class="col-sm-1">
                                    <input type="text" class="form-control text-center" name="prio" value="" id="priority" placeholder="Prio" disabled>
                                </div>
                                <div class="col-sm-1">
                                    <button type="submit" class="form-control btn btn-primary btn-submit"><i class="fe fe-check"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
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
                                            <button data-url="{{ route('dns.record.delete', Hashids::encode($row->id)) }}" class="btn btn-sm btn-danger confirm-get"><i class="fe fe-trash mx-1"></i></button>
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
                    <a href="{{ route('dns.zones') }}" class="btn btn-primary btn-md">&larr; Back to domain list</a>
                    <nav aria-label="navigation" class="float-right">{{ $data->links() }}</nav>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script>
    $(document).ready(function() {
        $('#priority').attr('disabled','disabled');
        $('#recordType').on('change',function(){
        var val = $(this).val();
        if(val == "MX"){
            $('#priority').removeAttr('disabled');
        } else{
            $('#priority').attr('disabled','disabled');
        }});
    });
    </script>
@endpush
