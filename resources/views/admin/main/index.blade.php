@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Home</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Home</li>
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
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $orderCount }}</h3>
                            <p>Замовлення</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <a href="#" class="small-box-footer">Детальніше <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>53<sup style="font-size: 20px">%</sup></h3>
                            <p>Products</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-tshirt"></i>
                        </div>
                        <a href="#" class="small-box-footer">Детальніше <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>44</h3>
                            <p>Барбери</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="#" class="small-box-footer">Детальніше <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>65</h3>
                            <p>Posts</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-comment-dots"></i>
                        </div>
                        <a href="#" class="small-box-footer">Детальніше <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <div class="row">
                <div class="col-md-6">
                    <!-- DONUT CHART -->
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Donut Chart</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
                @role('super-admin')
                    <div class="card" style="margin-right: 15px;">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>Топ послуг</div>
                            <div class="card-tools">
                                <a href="#" class="btn btn-primary">Тиждень</a>
                                <a href="#" class="btn btn-primary">Місяць</a>
                                <a href="#" class="btn btn-primary">Рік</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>№</th>
                                <th>Послуга</th>
                                <th>Кільксть</th>
                                <th>Сума</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($popularServices as $popularService)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $popularService->title }}</td>
                                    <td>{{ $popularService->order_count }}</td>
                                    <td>{{ $popularService->total_price }} ₴</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endrole
            </div>
        </div><!--/. container-fluid -->
    </section>
@endsection

@section('scripts') <!-- Вставте секцію для підключення скриптів -->
<script>
    $(function () {
        var orderStatuses = @json($orderStatuses);
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutData        = {
            // labels: orderStatuses.map(item => item.status),
            labels: ['В очікувані', 'Успішно', 'Скасовано'],
            datasets: [
                {
                    data: orderStatuses.map(item => item.count),
                    backgroundColor : ['#f39c12', '#00a65a', '#f56954'],
                }
            ]
        }
        var donutOptions     = {
            maintainAspectRatio : false,
            responsive : true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
        })

    })
</script>
@endsection
