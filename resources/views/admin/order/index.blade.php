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
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('order.index') }}" method="get">
                        <select name="sort" id="sort" onchange="this.form.submit()" style="height: 31px; border-radius: 0.2rem; padding: 0 10px 0 4px; font-size: 14px">
                            <option value="id" @if(request('sort') === 'id') selected @endif>За ID</option>
                            <option value="date" @if(request('sort') === 'date') selected @endif>За Date</option>
                        </select>
                    </form>
                </div>
            </div>
            <div class="card-body table-responsive p-0" style="height: calc(100vh - 314px);">
                <table class="table table-head-fixed table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th style="width: 2%">
                            ID
                        </th>
                        <th style="width: 10%">
                            Клієнт
                        </th>
                        <th style="width: 10%">
                            Філія
                        </th>
                        <th style="width: 10%">
                            Майстер
                        </th>
                        <th>
                            Послуги
                        </th>
                        <th style="width: 15%">
                            Запис
                        </th>
                        <th style="width: 6%">
                            Ціна
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
                                <td>{{ str_replace('GC barbershop ', '', $order->barber->branch->title) }}</td>
                                <td>
                                    <a href="{{ route('barber.show', $order->barber->id) }}">
                                        @if($order->barber->image)
                                            <img alt="{{ $order->barber->fullName }}" class="table-avatar rounded" src="{{ asset('storage/' . $order->barber->image) }}" style="width: 48px; height: 48px;">
                                        @else
                                            <div style="align-items: center; display: flex;">
                                                <i class="fas fa-user-tie" style="font-size: 40px; color: grey; margin-left: 6px;"></i>
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
                                <td class="project_progress">
                                    <div class="progress progress-sm mb-2">
                                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100" style="width: 57%">
                                        </div>
                                    </div>
                                    <span>
                                    {{ $order->formatted_start_time }}
                                </span>
                                </td>
                                <td class="project-state">
                                    <span class="badge badge-warning" style="font-size: 16px; height: 30px; width: 75px;">{{ $order->getTotalAmount() }} грн</span>
                                </td>
                                <td>
                                    <a class="btn btn-primary d-flex align-items-center justify-content-center" href="#">
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
                        {{ $orders->links() }}
                    </ul>
                </nav>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
