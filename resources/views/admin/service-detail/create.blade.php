@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Створення зв'язку для {{ $rank->title }}</h1>
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
                    <form action="{{ route('service-detail.store', $rank->id) }}" method="post" class="w-25">
                        @csrf
{{--                        <div class="form-group">--}}
{{--                            <label for="rank_id">Ранг барбера: {{ $rank->title }}</label>--}}
{{--                            <select name="rank_id" class="form-control">--}}
{{--                                @foreach($ranks as $rank)--}}
{{--                                    <option value="{{ $rank->id }}" {{ $rank->id == old('rank_id') ? 'selected' : '' }}>{{ $rank->title }}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                            @error('rank_id')--}}
{{--                                <div>{{ $message }}</div>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
                        <div class="form-group">
                            <label>Виберіть послугу:</label>
                            <select name="service_id" class="form-control select2" style="width: 100%;">
                                <option selected="selected" disabled>-</option>
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->title }}</option>
                                @endforeach
                            </select>
                            @error('service_id')
                              <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Час, хв:</label>
                            <input type="number" name="duration" class="form-control" min="0" value="{{ old('duration') }}">
                            @error('duration')
                            <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Ціна, грн:</label>
                            <input type="number" name="price" class="form-control" min="0" value="{{ old('price') }}">
                            @error('price')
                            <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <input type="hidden" name="rank_id" value="{{ $rank->id }}">
                        <div class="d-flex align-items-center">
                            <button type="submit" class="btn btn-success">Створити</button>
                            <a href="{{ route('service-detail.index') }}"><i class="fas fa-arrow-circle-left ml-3 text-white"></i></a>
                        </div>
                    </form>
                </div>
            </div>
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
@endsection
