@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Створення замовлення</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Створення замовлення</li>
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
                    <form action="{{ route('order.store') }}" method="post" class="w-25" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Ім'я клієнта:</label>
                            <input type="text" name="customer_name" class="form-control mb-3" value="{{ old('customer_name') }}">
                            @error('customer_name')
                            <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Номер телефону клієнта:</label>
                            <input type="tel" name="customer_phone" class="form-control mb-3" maxlength="9" value="{{ old('customer_phone') }}">
                            @error('customer_phone')
                            <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="branch_id">Філія:</label>
                            <select name="branch_id" class="form-control">
                                <option selected="selected" disabled>-</option>
                                @foreach($branches as $branch)
                                    <option value="{{ $branch->id }}" {{ $branch->id == old('branch_id') ? 'selected' : '' }}>{{ $branch->title }}</option>
                                @endforeach
                            </select>
                            @error('branch_id')
                            <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Майстер:</label>
                            <select name="employee_id" class="form-control">
                                <option selected="selected" disabled>-</option>
                                @foreach($employees as $employee)
                                    <option value="{{ $employee->id }}" {{ $employee->id == old('employee_id') ? 'selected' : '' }}>{{ $employee->fullName }}</option>
                                @endforeach
                            </select>
                            @error('employee_id')
                            <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="scheduled_time">Дата:</label>
                            <input type="datetime-local" name="scheduled_time" value="{{ old('scheduled_time') }}">
                            @error('scheduled_time')
                                <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="services">Виберіть послугу:</label>
                            <select name="services[]" class="services" multiple="multiple" style="width: 100%;">
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->title }}</option>
                                @endforeach
                            </select>
                            @error('services')
                            <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex align-items-center">
                            <button type="submit" class="btn btn-success">Створити</button>
                            <a href="{{ route('order.index') }}"><i class="fas fa-arrow-circle-left ml-3 text-white"></i></a>
                        </div>
                    </form>
                </div>
            </div>
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
@endsection
