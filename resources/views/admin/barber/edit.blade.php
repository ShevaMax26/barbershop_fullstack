@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редагування барбера</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Барбери</li>
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
                <form action="{{ route('barber.update', $barber->id) }}" method="post" enctype="multipart/form-data" class="w-25">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="name">Ім'я:</label>
                        <input type="text" name="name" value="{{ $barber->name }}" class="form-control mb-3">
                    </div>
                    <div class="form-group">
                        <label for="surname">Прізвище:</label>
                        <input type="text" name="surname" value="{{ $barber->surname }}" class="form-control mb-3">
                    </div>
                    <div class="form-group">
                        <label for="phone">Номер телефону:</label>
                        <input type="tel" name="phone" class="form-control mb-3" maxlength="9" value="{{ $barber->phone }}">
                    </div>
                    <div class="form-group">
                        <label for="rank_id">Ранг барбера:</label>
                        <select name="rank_id" class="form-control">
                            @foreach($ranks as $rank)
                                <option value="{{ $rank->id }}" {{ $rank->id == $barber->rank->id ? 'selected' : '' }}>{{ $rank->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="branch_id">Філія:</label>
                        <select name="branch_id" class="form-control">
                            @foreach($branches as $branch)
                                <option value="{{ $branch->id }}" {{ $branch->id == $barber->branch->id ? 'selected' : '' }}>{{ $branch->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Фото:</label>
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $barber->image) }}" alt="{{ $barber->name }}" class="w-50">
                        </div>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image">
                                <label class="custom-file-label">Змінити фото</label>
                            </div>
                        </div>
                        @error('preview_image')
                        <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex align-items-center">
                        <button type="submit" class="btn btn-warning">Редагувати</button>
                        <a href="{{ route('barber.index') }}"><i class="fas fa-arrow-circle-left ml-3 text-white"></i></a>
                    </div>
                </form>
            </div>
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
@endsection
