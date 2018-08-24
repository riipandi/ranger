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
                        DNS Zones
                        <button type="button" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#frmAddModal">Add Domain</button>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-sm m-0 table-condensed">
                            <thead class="">
                                <th class="text-center">#</th>
                                <th>Type</th>
                                <th class="text-left">Owner</th>
                                <th class="text-center">Records</th>
                                <th class="text-center">Action</th>
                            </thead>
                            <tbody class="table-hover">
                                @foreach ($data as $row)
                                <tr>
                                    <td class="text-center">{{ ($data ->currentpage()-1) * $data ->perpage() + $loop->index + 1 }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->user->realname }}</td>
                                    <td class="text-center">{{ $row->records->count() }}</td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Action">
                                            <a href="{{ route('dns.records', Hashids::encode($row->id)) }}" class="btn btn-sm btn-primary"><i class="fe fe-search mx-1"></i></a>
                                            <a href="{{ route('dns.zones.edit', Hashids::encode($row->id)) }}" class="btn btn-sm btn-success"><i class="fe fe-edit mx-1"></i></a>
                                            <a href="{{ route('dns.zones.delete', Hashids::encode($row->id)) }}" class="btn btn-sm btn-danger"><i class="fe fe-trash mx-1"></i></a>
                                        </div>
                                    </td>
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

    <div class="modal fade" id="frmAddModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add DNS Zone</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('dns.zones.add') }}">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Domain</label>
                            <div class="col-sm-8">
                                <input type="text" name="domain" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Owner</label>
                            <div class="col-sm-8">
                                <select name="owner" class="form-control" required>
                                    <option value=""></option>
                                    @foreach($user as $u)
                                        <option value="{{$u->id}}">{{$u->realname}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Default NS1</label>
                            <div class="col-sm-8">
                                <input type="text" name="ns1" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Default NS2</label>
                            <div class="col-sm-8">
                                <input type="text" name="ns2" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-4 col-form-label">Type</label>
                            <div class="col-sm-8 mt-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="type" id="inlineRadio1" value="Master">
                                    <label class="form-check-label" for="inlineRadio1">Master</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="Native">
                                    <label class="form-check-label" for="inlineRadio2">Native</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Domain</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script>
    $("#add").click(function() {
    $.ajax({
            type: 'post',
            url: '/addItem',
            data: {
                '_token': $('input[name=_token]').val(),
                'name': $('input[name=name]').val()
            },
            success: function(data) {
                if ((data.errors)) {
                    $('.error').removeClass('hidden');
                    $('.error').text(data.errors.name);
                } else {
                    $('.error').remove();
                    $('#table').append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
                }
            },
        });
        $('#name').val('');
    });
    </script>
@endpush
