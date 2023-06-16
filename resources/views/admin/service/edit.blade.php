@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редагування послуги</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Послуги</li>
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
                <form action="{{ route('service.update', $service->id) }}" method="post" class="w-25">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="title">Назва:</label>
                        <input type="text" name="title" value="{{ $service->title }}" class="form-control mb-3">
                    </div>
                    <div class="form-group">
                        <label for="description">Опис:</label>
                        <input type="text" name="description" value="{{ $service->description }}" class="form-control mb-3">
                    </div>
                    <div class="d-flex align-items-center">
                        <button type="submit" class="btn btn-warning">Редагувати</button>
                        <a href="{{ route('service.index') }}"><i class="fas fa-arrow-circle-left ml-3 text-white"></i></a>
                    </div>
                </form>
            </div>
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
@endsection
