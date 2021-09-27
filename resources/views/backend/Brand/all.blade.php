@extends('admin.admin_master')

@section('css')

<style>
  .dark-skin .table-bordered > tbody > tr > td {
    padding: 5px !important;
  }
</style>

@endsection

@section('admin')
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Brands</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>SN</th>
                  <th>Brand name En</th>
                  <th>Brnad name Bn</th>
                  <th>Banad slug En</th>
                  <th>Banad slug Bn</th>
                  <th>image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach( $brands as $brand)
                <tr>
                  <td>{{ $brand->id }}</td>
                  <td>{{ $brand->brand_name_en }}</td>
                  <td>{{ $brand->brand_slug_en }}</td>
                  <td>{{ $brand->brand_name_bn }}</td>
                  <td>{{ $brand->brand_slug_bn }}</td>
                  <td style="text-align: center;"><img style="width: 40px; " src="{{ asset($brand->brand_photo) }}" alt=""></td>
                  <td>
                    <a class="btn btn-info btn-sm" href="{{ route('edit.brand', $brand->id) }}">Edit</a>
                    <a class="btn btn-danger btn-sm" href="{{ route('delete.brand', $brand->id) }}">Delete</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </div>
  </div>
</section>
<!-- /.content -->
@endsection

@section('js')
<script src="{{asset('assets/vendor_components/datatable/datatables.min.js')}}"></script>
<script src="{{asset('backend/js/pages/data-table.js')}}"></script>
@endsection