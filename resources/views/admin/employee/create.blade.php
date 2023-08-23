@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Створення працівника</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Працівники</li>
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
                <div class="col-12">
                    <form action="{{ route('employee.store') }}" method="post" class="w-25" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Ім'я:</label>
                            <input type="text" name="name" class="form-control mb-3" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="title">Прізвище:</label>
                            <input type="text" name="surname" class="form-control mb-3" value="{{ old('surname') }}">
                        </div>
                        <div class="form-group">
                            <label for="phone">Номер телефону:</label>
                            <input type="tel" name="phone" class="form-control mb-3" maxlength="9" value="{{ old('phone') }}">
                        </div>
                        <div class="form-group">
                            <label for="rank_id">Ранг працівника:</label>
                            <select name="rank_id" class="form-control">
                                <option selected="selected" disabled>-</option>
                                @foreach($ranks as $rank)
                                    <option value="{{ $rank->id }}" {{ $rank->id == old('rank_id') ? 'selected' : '' }}>{{ $rank->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="branch_id">Філія:</label>
                            <select name="branch_id" class="form-control">
                                <option selected="selected" disabled>-</option>
                                @foreach($branches as $branch)
                                    <option value="{{ $branch->id }}" {{ $branch->id == old('branch_id') ? 'selected' : '' }}>{{ $branch->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">Фото:</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input name="image" type="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="image">Виберіть файл</label>
                                </div>
                            </div>
                            @error('image')
                                <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex align-items-center">
                            <button type="submit" class="btn btn-success">Створити</button>
                            <a href="{{ route('employee.index') }}"><i class="fas fa-arrow-circle-left ml-3 text-white"></i></a>
                        </div>
                    </form>
                </div>
            </div>
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
@endsection
