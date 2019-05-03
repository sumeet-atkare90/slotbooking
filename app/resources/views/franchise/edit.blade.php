@extends('layout.template') 
@section('content')

<section class="content-header">
    <h1>
        Franchises
        <small>Edit</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboardPage') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('franchisesPage') }}"><i class="fa fa-industry"></i> Franchises</a></li>
        <li class="active">Edit Franchises</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">

        <section class="content-header">

            <div class="box">
                <div class="box-header">


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
                        @endif @if (session()->has('status'))
                        <div class="callout callout-success">
                            {{ session()->get('status') }}
                        </div>
                        @endif

                        <!-- /.box-header -->
                        <!-- form start -->
                        <form class="form-horizontal" method="POST" action="{{ route('updateFranchisePage', $franchise->id) }}" enctype="multipart/form-data">
                            @method('PUT') @csrf
                            <input type="hidden" name="user_id" value="{{ session('user')->id }}" />

                            <div class="box-header with-border">
                                <h3 class="box-title">Franchise Details</h3>
                            </div>

                            <div class="box-body">
                                <div class="form-group col-md-6">
                                    <label for="name" class="col-sm-2 control-label">Name</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ $franchise->name }}">
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="tag_line" class="col-sm-2 control-label">Tag Line</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="tag_line" name="tag_line" placeholder="Tag Line" value="{{ $franchise->tag_line }}">
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="address" class="col-sm-2 control-label">Address</label>

                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="address" name="address" placeholder="Address">{{ $franchise->address }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="lat" class="col-sm-2 control-label">Latitude</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="lat" name="lat" placeholder="Latitude" value="{{ $franchise->lat }}">
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="lon" class="col-sm-2 control-label">Longitude</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="lon" name="lon" placeholder="Longitude" {{ $franchise->lon
                                        }}>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="phone" class="col-sm-2 control-label">Phone</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="phone" value="{{ $franchise->phone }}">
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="additional_phone" class="col-sm-2 control-label">Additional Phone</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="additional_phone" name="additional_phone" placeholder="Additional Phone" value="{{ $franchise->additional_phone }}">
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="email" class="col-sm-2 control-label">Email</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="email" value="{{ $franchise->email }}">
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="logo" class="col-sm-2 control-label">Logo</label>

                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" id="logo" name="logo" />

                                        <p class="help-block"></p>
                                        <img src="{{ route('logo_thumbnail_small', ['filename' => $franchise->logo]) }}" />
                                    </div>
                                </div>

                            </div>
                            <!-- /.box-body -->

                            <div class="box-header with-border">
                                <h3 class="box-title">Working Days</h3>
                            </div>

                            <div class="box-body">
                                <table id="franchises" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Monday</th>
                                            <th>Tuesday</th>
                                            <th>Wednesday</th>
                                            <th>Thursday</th>
                                            <th>Friday</th>
                                            <th>Saturday</th>
                                            <th>Sunday</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="checkbox icheck">
                                                    <label>
                                                        <input type="checkbox" name="monday" value="1" @if ($franchise->monday) checked @endif > 
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="checkbox icheck">
                                                    <label>
                                                        <input type="checkbox" name="tuesday" value="1" @if ($franchise->tuesday) checked @endif> 
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="checkbox icheck">
                                                    <label>
                                                        <input type="checkbox" name="wednesday" value="1" @if ($franchise->wednesday) checked @endif> 
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="checkbox icheck">
                                                    <label>
                                                        <input type="checkbox" name="thursday" value="1" @if ($franchise->thursday) checked @endif> 
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="checkbox icheck">
                                                    <label>
                                                        <input type="checkbox" name="friday" value="1" @if ($franchise->friday) checked @endif> 
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="checkbox icheck">
                                                    <label>
                                                        <input type="checkbox" name="saturday" value="1" @if ($franchise->saturday) checked @endif> 
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="checkbox icheck">
                                                    <label>
                                                        <input type="checkbox" name="sunday" value="1" @if ($franchise->sunday) checked @endif> 
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>


                            <div class="box-footer">
                                <a href="{{ route('franchisesPage') }}" class="btn btn-default">Cancel</a>
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