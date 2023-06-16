@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Створення зв'язку</h1>
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
                    <form action="{{ route('service-detail.store') }}" method="post" class="w-25">
                        @csrf
                        <div class="form-group">
                            <label for="rank_id">Ранг барбера:</label>
                            <select name="rank_id" class="form-control">
                                @foreach($ranks as $rank)
                                    <option value="{{ $rank->id }}" {{ $rank->id == old('rank_id') ? 'selected' : '' }}>{{ $rank->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tags</label>
                            <select class="select2" name="service_ids[]" multiple="multiple" data-placeholder="Select a Tags"
                                    style="width: 100%;">
                                @foreach($services as $service)
                                    <option {{ is_array(old('service_ids')) && in_array($service->id, old('service_ids')) ? 'selected' : '' }} value="{{ $service->id }}">{{ $service->title }}</option>
                                @endforeach
                            </select>
                            @error('service_ids')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group" data-select2-id="94">
                            <label>Disabled Result</label>
                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="9" tabindex="-1" aria-hidden="true">
                                <option selected="selected" data-select2-id="11">Alabama</option>
                                <option data-select2-id="95">Alaska</option>
                                <option disabled="disabled" data-select2-id="96">California (disabled)</option>
                                <option data-select2-id="97">Delaware</option>
                                <option data-select2-id="98">Tennessee</option>
                                <option data-select2-id="99">Texas</option>
                                <option data-select2-id="100">Washington</option>
                            </select><span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" data-select2-id="10" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-0r9z-container"><span class="select2-selection__rendered" id="select2-0r9z-container" role="textbox" aria-readonly="true" title="Alabama">Alabama</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                        </div>
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
