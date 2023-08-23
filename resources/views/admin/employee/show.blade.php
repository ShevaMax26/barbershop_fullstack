@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $employee->name . $employee->surname}}</h1>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <a href="{{ route('employee.index') }}"><i class="fas fa-arrow-circle-left mr-5 text-white"></i></a>
                                <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-warning mr-3">Edit</a>
                                <form action="{{ route('employee.destroy', $employee->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </form>
                            </div>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tr>
                                    <th>Фото</th>
                                    <td>
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/' . $employee->image) }}" alt="preview_image" class="w-25">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Ім'я</th>
                                    <td>{{ $employee->name }}</td>
                                </tr>
                                <tr>
                                    <th>Прізвище</th>
                                    <td>{{ $employee->surname }}</td>
                                </tr>
                                <tr>
                                    <th>Телефон</th>
                                    <td>0{{ $employee->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Ранг</th>
                                    <td>{{ $employee->rank->title }}</td>
                                </tr>
                                <tr>
                                    <th>Філія</th>
                                    <td>{{ $employee->branch->title }}</td>
                                </tr>
                                <tr>
                                    <th>Початок роботи</th>
                                    <td>{{ $employee->created_at->format('d.m.Y') }}</td>
                                </tr>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
@endsection
