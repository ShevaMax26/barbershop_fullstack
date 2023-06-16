@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Барбери</h1>
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
        <div class="card card-solid">
            <div class="card-body pb-0">
                <div class="row">
                    <div class="col-12 mb-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <a href="http://barbershop-fullstack/admin/barbers/create"
                               class="btn btn-primary">Створити</a>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" >
                                    <input type="text" name="table_search" class="form-control float-right"
                                           placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($barbers as $barber)
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                            <div class="card bg-light d-flex flex-fill">
                                <div class="card-header text-muted border-bottom-0">
                                    {{ $barber->rank->title }}
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="lead"><b>{{ $barber->name . ' ' . $barber->surname }}</b></h2>
                                            <p class="text-muted text-sm"><b>Відгуки: </b>
                                                <i class="fas fa-star" style="color: #ffcb00;"></i>
                                                <i class="fas fa-star" style="color: #ffcb00;"></i>
                                                <i class="fas fa-star" style="color: #ffcb00;"></i>
                                                <i class="fas fa-star" style="color: #ffcb00;"></i>
                                                <i class="far fa-star" style="color: #ffcb00;"></i>
                                                (201)
                                            </p>
                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                <li class="small mb-1"><span class="fa-li"><i
                                                            class="fas fa-lg fa-building"></i></span> Філія: {{ $barber->branch->title }}
                                                </li>
                                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>
                                                    Телефон: 0{{ $barber->phone }}
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-5 text-center">
                                            <img src="{{ $barber->image ? asset('storage/' . $barber->image) : asset('/5.png') }}" alt="{{ $barber->name . ' ' . $barber->surname }}" style="width: 128px; height: 128px;"
                                                 class="img-circle img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-right d-flex justify-content-end">
                                        <form action="{{ route('barber.destroy', $barber->id) }}" method="post" class="mr-1">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm bg-teal"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                        <a href="{{ route('barber.edit', $barber->id) }}" class="btn btn-sm bg-teal mr-1">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <a href="{{ route('barber.show', $barber->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-user"></i> Переглянути
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="card-footer">
                <nav aria-label="Contacts Page Navigation">
                    <ul class="pagination justify-content-center m-0">
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item"><a class="page-link" href="#">6</a></li>
                        <li class="page-item"><a class="page-link" href="#">7</a></li>
                        <li class="page-item"><a class="page-link" href="#">8</a></li>
                    </ul>
                </nav>
            </div>

        </div>

    </section>
    <!-- /.content -->
@endsection
