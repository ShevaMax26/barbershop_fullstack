@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ціни та час</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Ціни та час</li>
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
                        <div class="card-header d-flex align-items-center justify-content-between">
                            @foreach($ranks as $rank)
                                <a href="{{ route('service-detail.create', $rank->id) }}" class="btn btn-primary mr-2">Додати {{ $rank->title }}</a>
                            @endforeach
                            <div class="card-tools ml-auto">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0" style="height: calc(100vh - 266px);">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                <tr>
                                    <th>№</th>
                                    <th>Ранг</th>
                                    <th>Послуга</th>
                                    <th>Час</th>
                                    <th>Ціна</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($serviceDetails as $serviceDetail)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $serviceDetail->rank->title }}</td>
                                        <td>{{ $serviceDetail->service->title }}</td>
                                        <td>{{ $serviceDetail->formattedDuration }}</td>
                                        <td>{{ $serviceDetail->price }} грн</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="{{ route('service-detail.edit', $serviceDetail->id) }}"><i class="fas fa-pen text-warning mr-3"></i></a>
                                                <form action="{{ route('service-detail.destroy', $serviceDetail->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="bg-transparent border-0"><i class="fas fa-trash-alt text-danger"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
@endsection
