@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редагування</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Філії</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <form action="{{ route('service-detail.update', $serviceDetail->id) }}" method="post" class="w-25">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label>Час, хв:</label>
                        <input type="number" value="{{ $serviceDetail->duration }}" name="duration" class="form-control" min="0">
                    </div>
                    <div class="form-group">
                        <label>Ціна, грн:</label>
                        <input type="number" value="{{ $serviceDetail->price }}" name="price" class="form-control" min="0">
                    </div>
                    <div class="d-flex align-items-center">
                        <button type="submit" class="btn btn-warning">Update</button>
                        <a href="{{ route('service-detail.index') }}"><i class="fas fa-arrow-circle-left ml-3 text-white"></i></a>
                    </div>
                    <div class="form-group">
                        <input type="hidden" value="{{ $serviceDetail->rank_id }}" name="rank_id">
                    </div>
                    <div class="form-group">
                        <input type="hidden" value="{{ $serviceDetail->service_id }}" name="service_id">
                    </div>
                </form>
            </div>
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
@endsection
