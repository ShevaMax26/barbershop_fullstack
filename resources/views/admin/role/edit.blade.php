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
                <div class="col-12">
                    <form action="{{ route('user.role.update', $role->id) }}" method="post" class="w-25">
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

                        <div class="form-group">
                            <select id="permissions" data-route="{{ route('get-permissions') }}"  data-selected-permissions="{{ json_encode($selectedPermissions) }}" multiple="multiple" data-placeholder="Виберіть дозволи" class="w-100" name="permissions[]"></select>
                        </div>

                        <div class="d-flex align-items-center">
                            <button type="submit" class="btn btn-warning">Update</button>
                            <a href="{{ route('user.role.index') }}"><i class="fas fa-arrow-circle-left ml-3 text-white"></i></a>
                        </div>
                    </form>
                </div>
            </div>
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('scripts')
    <script>
        var selectedPermissions = @json($selectedPermissions);
    </script>
    <script src="{{ asset('assets/js/getPermission.js') }}"></script>
@endsection
