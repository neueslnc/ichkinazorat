@extends('template')

@section('body')

    <div class="page-wrapper">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Talaba</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <hr>
            <div class="card radius-10">
                <div class="card-body">

                    <div id="vue-block">
                        <main-component
                            v-bind:key="1"
                        >
                        </main-component>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ url('assets/plugins/select2/js/select2.min.js') }}"></script>

@endsection

@push('scripte_include_end_body')

    <script src="{{ url('vue/vue.global.js') }}"></script>

    <script>

        let users = {{ Js::from($users) }};
        let criteria_on_prices = {{ Js::from($criteria_on_prices) }};

    </script>

    <script src="{{ url('vue/report/dean/student/index.js?1') }}"></script>
@endpush
