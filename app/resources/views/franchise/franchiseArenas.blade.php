@extends('layout.template') 
@section('content')

<section class="content-header">
    <h1>
        Franchises
        <small>Arenas</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboardPage') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('franchisesPage') }}"><i class="fa fa-industry"></i> Franchises</a></li>
        <li class="active">Franchises Arenas</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">

        <section class="content-header">

            <div class="box">
                <div class="box-header">
                    <div class="btn-group add-arena pull-right">
                        <a href="{{ route('createArenaPage', ['franchise' => $franchise->id]) }}" class="btn btn-primary open-franchise-modal">Add Arena(s)</a>
                    </div>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{ $franchise->name }} Arena List</h3>
                        </div>

                    </div>

                    <table id="franchiseArenas" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Arena Type Id</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="franchise-list">

                            @foreach ($franchise->arenas as $arena)

                            <tr class="arena-item-{{ $arena->id }}">
                                <td>
                                    {{ $arena->arena_type_id }}
                                </td>
                                <td>
                                    {{ $arena->description }}
                                </td>
                                <td>
                                    {{ ($franchise->status == 1) ? 'Active' : 'Inactive' }}
                                </td>
                                <td>
                                    <a href="{{ route('editArenaPage', ['franchise' => $franchise->id,'arena' => $arena->id]) }}" class="btn btn-primary btn-xs open-edit-franchise-modal"
                                        data-id="{{ $arena->id }}" data-name=""><i class="fa fa-edit"></i> Edit</a>
                                    <a href="javascript:void(0);" class="btn btn-danger btn-xs delete-franchise" data-id="{{ $arena->id }}" data-title=""><i class="fa fa-trash"></i> Delete</a>
                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Arena Type Id</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>

    </div>
</section>
@endsection