@extends('layout.template') 
@section('content')

<section class="content-header">
    <h1>
        Franchises
        <small>Create</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboardPage') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('franchisesPage') }}"><i class="fa fa-industry"></i> Franchises</a></li>
        <li><a href="{{ route('franchiseArenasPage', $franchise->id) }}"><i class="fa fa-dot-circle-o"></i> Arenas</a></li>
        <li class="active">Create Arena</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">

        <section class="content-header">

            <div class="box">
                <div class="box-header">
                    {{--
                    <h3 class="box-title">Create franchise</h3> --}} {{--
                    <div class="btn-group add-franchises pull-right">
                        <a href="{{ route('franchisesPage') }}" class="btn btn-primary open-franchise-modal">View Franchises</a>
                    </div> --}}

                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <div class="box box-info">

                        @if (count($errors))
                        <div class="callout callout-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <!-- /.box-header -->
                        <!-- form start -->
                        <form class="form-horizontal" method="POST" action="{{ route('saveArenaPage', $franchise->id) }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ session('user')->id }}" />
                            <input type="hidden" name="franchise_id" value="{{ $franchise->id }}" />

                            <div class="box-header with-border">
                                <h3 class="box-title">Arena Details</h3>
                            </div>

                            <div class="box-body">
                                <div class="form-group col-md-6">
                                    <label for="name" class="col-sm-2 control-label">Arena Type</label>

                                    <div class="col-sm-10">
                                        <select class="form-control" id="arena_type_id" name="arena_type_id">
                                            <option value=''>Select</option>
                                            @foreach ($arena_types as $arena_type)
                                                <option value='{{ $arena_type->id }}' @if (old('arena_type_id') == $arena_type->id) selected @endif >{{ $arena_type->name }}</option>        
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="tag_line" class="col-sm-2 control-label">Description</label>

                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="description" name="description" placeholder="Description">{{ old('description') }}</textarea>
                                    </div>
                                </div>

                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <a href="{{ route('franchiseArenasPage', $franchise->id) }}" class="btn btn-default">Cancel</a>
                                <button type="submit" class="btn btn-success pull-right">Save</button>
                            </div>
                            <!-- /.box-footer -->
                        </form>
                    </div>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>

    </div>
</section>
@endsection
 
@section('custom_scripts')
<script>
    $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });

</script>
@endsection