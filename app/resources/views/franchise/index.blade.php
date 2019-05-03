@extends('layout.template') 
@section('content')

<section class="content-header">
    <h1>
        Franchises
        <small>List</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboardPage') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Franchises</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">

        <section class="content-header">

            <div class="box">
                <div class="box-header">
                    {{--
                    <h3 class="box-title">List of franchises</h3> --}}

                    <div class="btn-group add-franchises pull-right">
                        <a href="{{ route('createFranchisePage') }}" class="btn btn-primary open-franchise-modal">Add Franchise(s)</a>
                    </div>

                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Franchise List</h3>
                        </div>

                        <table id="franchises" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Allow on Site</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="franchise-list">

                                @foreach ($franchises as $franchise)

                                <tr class="franchise-item-{{ $franchise->id }}">
                                    <td>
                                        {{ $franchise->name }}
                                        <p>
                                            <a class="btn btn-xs btn-success" href="{{ route('franchiseArenasPage', $franchise->id) }}"><i class="fa fa-dot-circle-o"></i> Arenas</a>
                                        </p>
                                    </td>
                                    <td>
                                        {{ $franchise->phone }}
                                    </td>
                                    <td>
                                        {{ ($franchise->status == 1) ? 'Active' : 'Inactive' }}
                                    </td>
                                    <td>
                                        {{ ($franchise->allow_on_site == 1) ? 'Yes' : 'No' }}
                                    </td>
                                    <td>
                                        <a href="{{ route('editFranchisePage', $franchise->id) }}" class="btn btn-primary btn-xs open-edit-franchise-modal" data-id="{{ $franchise->id }}"
                                            data-name="{{ $franchise->name }}"><i class="fa fa-edit"></i> Edit</a>
                                        <a href="javascript:void(0);" class="btn btn-danger btn-xs delete-franchise" data-id="{{ $franchise->id }}" data-title="{{ $franchise->name }}"><i class="fa fa-trash"></i> Delete</a>
                                    </td>
                                </tr>

                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Allow on Site</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>

                    </div>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>

    </div>
</section>

<div class="modal" id="franchise-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Title</h4>
            </div>
            <form>
                <div class="modal-body">

                </div>
                <div class="modal-footer" style="clear:left;">

                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection
 
@section('custom_styles')
<link rel="stylesheet" href="{{ URL::to('portal/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">

<style>
    .add-franchises>.dropdown-menu {
        right: 0;
    }
</style>
@endsection
 
@section('custom_scripts')
<script src="{{ URL::to('portal/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::to('portal/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript">
    $.ajaxSetup(
{
    headers:
    {
        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
    }
});

</script>
@endsection