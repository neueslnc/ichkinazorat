@extends('template')

@section('body')

    <div class="page-wrapper">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Criteria qo`shish</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Yangi criteria</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-10 mx-auto">
                    <h6 class="mb-0 text-uppercase">Criteria qo`shish formasi</h6>
                    <hr>
                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body p-5">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                                </div>
                                <h5 class="mb-0 text-primary">Ma'lumotlarni to'ldiring</h5>
                            </div>
                            <hr>
                            <form class="row g-3" method="post" action="{{ route('superadmin.store_update_criteria_dop') }}">
                                @csrf
                                <div class="col-12">
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                                            <div class="text-white">{{ $error }}</div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="col-md-12">
                                    <label for="main_criteria" class="form-label">Criteria asosiy</label>
                                    <select class="single-select" id="main_criteria" name="main_criteria">
                                        <option value="" selected>Criteria tanlang.</option>
                                        @foreach ($main_criterias as $main_criteria)
                                            <option value="{{ $main_criteria->id }}" {{ $dop_criteria->main_criteria_id == $main_criteria->id ? 'selected' : '' }}>{{ $main_criteria->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <input type="hidden" name="id" value="{{ $dop_criteria->id }}">
                                <div class="col-md-12">
                                    <label for="main_criteria" class="form-label">Criteria asosiy</label>
                                    <input type="text" name="name" class="form-control" id="name" value="{{ $dop_criteria->name }}">

                                </div>

                                @foreach($prices as $price)
                                    <div class="col-md-12">
                                        <label for="main_criteria" class="form-label">{{ $price->name }}</label>
                                        <input type="hidden" name="price_id[]" value="{{ $price->id }}" >
                                        <input type="number" name="price[]" class="form-control" value="{{ $dop_criteria->criteria_on_price->where('criteria_price_id', '=', $price->id)->first()->price ?? 0 }}">
                                    </div>
                                @endforeach

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary px-5">Saqlash</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripte_include_end_body')

    <script src="{{ url('assets/plugins/select2/js/select2.min.js') }}"></script>

    <script>
        $('.single-select').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });
    </script>

@endpush
