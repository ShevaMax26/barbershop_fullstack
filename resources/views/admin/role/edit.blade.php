@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редагування ролі</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Ролі</li>
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
                <form action="{{ route('role.update', $role->id) }}" method="post" class="w-25">
                    @csrf
                    @method('patch')
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-group">
                        <input type="text" name="name" value="{{ $role->name }}" class="form-control mb-2" placeholder="Назва">
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    @foreach($permissions as $permission)
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="permissions[]"
                                       @if($role->hasPermissionTo($permission->name)) checked @endif
                                       id="{{ 'permissions' . $permission->id }}" value="{{ $permission->id }}"
                                >
                                <label for="{{ 'permissions' . $permission->id }}" class="custom-control-label">{{ $permission->name }}</label>
                            </div>
                        </div>
                    @endforeach
                    <div class="d-flex align-items-center">
                        <button type="submit" class="btn btn-warning">Update</button>
                        <a href="{{ route('role.index') }}"><i class="fas fa-arrow-circle-left ml-3 text-white"></i></a>
                    </div>
                </form>
            </div>
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
@endsection
