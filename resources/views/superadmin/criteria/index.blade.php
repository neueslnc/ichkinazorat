@extends('template')

@section('body')

    <div class="page-wrapper">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Критерии</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="d-flex align-items-center">
                <h6 class="mb-0 text-uppercase">Barcha критериа</h6>
            </div>

            <div class="d-flex align-items-center">
                <div class="ms-auto">
                    <a href="{{ route('superadmin.criteria.create')  }}" class="btn btn-primary px-3"><i class="bx bx-plus"></i>Yangi критериа</a>
                </div>
            </div>
            <hr>
            <div class="card radius-10">
                <div class="card-body">
                    <div class="">
                        <table class="table table-bordered align-middle mb-0">
                            <thead class="table-light">
                            <tr>
                                <th class="fixed_header2 align-middle">#</th>
                                <th class="fixed_header2 align-middle">Критериа асосий</th>
                                <th class="fixed_header2 align-middle">Критериа </th>
                                @foreach($prices as $price)
                                    <th class="fixed_header2 align-middle">{{ $price->name }}</th>
                                @endforeach
                                <th class="fixed_header2 align-middle">Действие </th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($main_criterias as $i => $main_criteria)
                                    <tr>
                                        <td>
                                            {{ ++$i }}
                                        </td>
                                        <td>
                                            {{ $main_criteria->name }}
                                        </td>
                                        @foreach($prices as $price)
                                            <td>
                                            </td>
                                        @endforeach
                                        <td>

                                        </td>
                                        <td>
                                            <a href="{{ route('superadmin.update_criteria_main', ['id' => $main_criteria->id]) }}">
                                                <button type="button" class="btn btn-primary px-5">Обновить</button>
                                            </a>
                                        </td>
                                    </tr>

                                    @foreach($main_criteria->dop_criteria as $dop_criteria)
                                        <tr>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                                {{ $dop_criteria->name }}
                                            </td>
                                            @foreach($prices as $price)
                                                <td>
                                                    {{ $dop_criteria->criteria_on_price->where('criteria_price_id', '=', $price->id)->first()->price ?? '' }}
                                                </td>
                                            @endforeach
                                            <td>
                                                <a href="{{ route('superadmin.update_criteria_dop', ['id' => $dop_criteria->id]) }}">
                                                    <button type="button" class="btn btn-primary px-5">Обновить</button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
