@extends('template')
@section('body')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Foydalanuvchi</div>
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
                <h6 class="mb-0 text-uppercase">Barcha foydalanuvchilar</h6>
            </div>

            <div class="d-flex align-items-center">
                <div class="ms-auto">
                    <a href="{{ route('superadmin.supervisor.create') }}" class="btn btn-primary px-3"><i class="bx bx-plus"></i>Yangi foydalanuvchi qo`shish</a>
                </div>
            </div>
            <hr>
            <div class="card">
                <div class="card-body">
                    <table class="table mb-0 table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">F.I.O</th>
                            <th scope="col">Tip</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($medicines as $medicine)
                            <tr>
                                <th scope="row">{{ ($medicines->currentpage()-1)*$medicines->perpage() + ($loop->index + 1) }}</th>
                                <td>{{ $medicine->full_name }}</td>
                                <td>{{ $medicine->supervisor_types->name }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $medicines->links() }}
                </div>
            </div>

        </div>
    </div>
@endsection
