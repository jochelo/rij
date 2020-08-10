@extends('layouts.font')
@section('content')
<a class="btn-plus btn btn-primary" href="{{ route("register") }}"><i class="ti-plus"></i></a>
<div class="animated fadeIn">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Cuentas</strong>
                </div>
<!--                <div class="card-body table-stats order-table ov-h">-->
                <div class="card-body">
                    <div class="table-stats t-responsive">
                        <!--<table id="bootstrap-data-table" class="table">-->
                        <table class="table">
                            <thead>
                            <tr>
                                <th></th>
                                <th class="text-primary">Nombre</th>
                                <th class="text-primary">Cuenta</th>
                                <th class="text-primary">Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td><a href=""><img class="avatar-i" src="{{ $user->foto }}" alt=""></a></td>
                                <td>{{ $user->nombre }}</td>
                                <td>{{ $user->cuenta }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn-border-none btn btn-sm btn-outline-primary" href="{{ url('users/'.$user->id) }}">
                                            <span class="ti-eye"></span>
                                        </a>
                                        <a class="btn btn-border-none btn-sm btn-outline-success" href="{{ url('users/'.$user->id.'/edit') }}">
                                            <span class="ti-pencil"></span>
                                        </a>
<!--
                                        <form class="" action="{{ route('users.destroy',$user->id)}}" method="POST" onclick="return confirm('Estas seguro de que desea eliminar?')">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-border-none btn-sm btn-outline-danger">
                                                <span class="ti ti-trash"></span>
                                            </button>
                                        </form>-->
                                    </div>
                                </td>

                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection