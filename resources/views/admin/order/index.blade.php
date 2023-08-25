@extends('admin.layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Замовлення</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Замовлення</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <a href="{{ route('order.create') }}" class="btn btn-primary mr-2">Створити</a>
                <div class="card-tools ml-auto d-flex align-items-center" style="gap: 20px">
                    <div>
                        <form action="{{ route('order.index') }}" method="get">
                            <input type="hidden" name="page" value="1">
                            <div class="input-group input-group-sm">
                                <input type="text" name="search" @if(request('search')) value="{{ request('search')  }}" @endif class="form-control float-right" placeholder="Search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive p-0" style="height: calc(100vh - 314px);">
                <table class="table table-head-fixed table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th style="width: 3%">
                            @include('admin.includes.sort', ['field' => 'id', 'name' => 'ID'])
                        </th>
                        <th style="width: 10%">
                            @include('admin.includes.sort', ['field' => 'customer_name', 'name' => 'Клієнт'])
                        </th>
                        <th style="width: 10%">
                            @include('admin.includes.sort', ['field' => 'branches', 'name' => 'Філія'])
                        </th>
                        <th style="width: 10%">
                            @include('admin.includes.sort', ['field' => 'employee_id', 'name' => 'Майстер'])
                        </th>
                        <th>
                            @include('admin.includes.sort', ['field' => 'services_count', 'name' => 'Послуги'])
                        </th>
                        <th style="width: 10%">
                            @include('admin.includes.sort', ['field' => 'date', 'name' => 'Запис'])
                        </th>
                        <th style="width: 8%">
                            @include('admin.includes.sort', ['field' => 'services_sum_order_servicesprice', 'name' => 'Ціна'])
                        </th>
                        <th style="width: 1%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <a href="#">
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>
                                    <span>
                                        {{ $order->customer_name }}
                                    </span>
                                    <br>
                                    <small>
                                        0{{ $order->customer_phone }}
                                    </small>
                                </td>
                                <td>{{ str_replace('GC barbershop ', '', $order->employee->branch->title) }}</td>
                                <td>
                                    <a href="{{ route('employee.show', $order->employee->id) }}">
                                        @if($order->employee->image)
                                            <img alt="{{ $order->employee->fullName }}" class="table-avatar rounded"
                                                 src="{{ asset('storage/' . $order->employee->image) }}"
                                                 style="width: 48px; height: 48px;">
                                        @else
                                            <div style="align-items: center; display: flex;">
                                                <i class="fas fa-user-tie"
                                                   style="font-size: 40px; color: grey; margin-left: 6px;"></i>
                                            </div>
                                        @endif
                                    </a>
                                </td>
                                <td class="text-wrap" style="padding-right: 2rem;">
                                    @foreach($order->services as $key => $service)
                                        {{ $service->title }}
                                        @if($key != count($order->services) - 1)
                                            , &nbsp;
                                        @endif
                                    @endforeach
                                </td>
                                <td class="project_progress" style="padding-right: 2rem;">
                                    <div class="progress progress-sm mb-2">
                                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="57"
                                             aria-valuemin="0" aria-valuemax="100" style="width: 57%">
                                        </div>
                                    </div>
                                    <span>
                                    {{ $order->formatted_start_time }}
                                </span>
                                </td>
                                <td class="project-state">
                                    <span class="badge badge-warning"
                                          style="font-size: 16px; height: 30px; width: 75px;">{{ $order->getTotalAmount() }} грн</span>
                                </td>
                                <td>
                                    <a class="btn btn-primary d-flex align-items-center justify-content-center"
                                       href="#">
                                        <i class="far fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        </a>

                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer pt-2 pb-2">
                <nav aria-label="Contacts Page Navigation">
                    <ul class="pagination justify-content-center m-0">
                        {{ $orders->withQueryString()->links() }}
                    </ul>
                </nav>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
