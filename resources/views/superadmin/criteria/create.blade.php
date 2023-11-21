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
                            <form class="row g-3" method="post" action="{{ route('superadmin.criteria.store') }}">
                                @csrf
                                <div class="col-12">
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                                            <div class="text-white">{{ $error }}</div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="col-md-11">
                                    <label for="main_criteria" class="form-label">Criteria asosiy</label>
                                    <select class="single-select" id="main_criteria" name="main_criteria">
                                        <option value="" selected>Criteria tanlang.</option>
                                        @foreach ($main_criterias as $main_criteria)
                                            <option value="{{ $main_criteria->id }}" >{{ $main_criteria->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-1 mt-5">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">+</button>
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label for="main_criteria" class="form-label">Criteria asosiy</label>
                                                            <input type="text" name="main_name" class="form-control" id="main_name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary" id="save_main_name">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="main_criteria" class="form-label">Criteria asosiy</label>
                                    <input type="text" name="name" class="form-control" id="name">

                                </div>

                                @foreach($prices as $price)
                                    <div class="col-md-12">
                                        <label for="main_criteria" class="form-label">{{ $price->name }}</label>
                                        <input type="hidden" name="price_id[]" value="{{ $price->id }}" >
                                        <input type="number" name="price[]" class="form-control" >
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

        $('#save_main_name').on('click', function (){
            $.ajax('{{ route('superadmin.store_criteria_main') }}', {
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "name" : $('#main_name').val()
                },
                success: function (data, status) {

                    let objects = [];

                    objects.push({id : '', text: ''})

                    for (const item of data.objects) {

                        objects.push({id : item.id, text: item.name})
                    }

                    succes_noti();

                    $('#main_criteria').empty().select2({
                        theme: 'bootstrap4',
                        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                        placeholder: "Ўқув режани танланг",
                        allowClear: Boolean($(this).data('allow-clear')),
                        data: objects,
                        disabled : false
                    });
                },
                error: function (jqXhr, textStatus, errorMessage) {

                    error_noti(errorMessage);
                }
            });
        });
    </script>

@endpush
