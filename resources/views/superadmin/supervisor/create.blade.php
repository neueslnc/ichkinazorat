@extends('template')

@section('body')

    <div class="page-wrapper">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Foydalanuvchi qo`shish</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Yangi foydalanuvchi</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-10 mx-auto">
                    <h6 class="mb-0 text-uppercase">Foydalanuvchi qo`shish formasi</h6>
                    <hr>
                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body p-5">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                                </div>
                                <h5 class="mb-0 text-primary">Ma'lumotlarni to'ldiring</h5>
                            </div>
                            <hr>
                            <form class="row g-3" method="post" action="{{ route('superadmin.supervisor.store') }}">
                                @csrf
                                <div class="col-12">
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                                            <div class="text-white">{{ $error }}</div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-md-12">
                                    <label for="full_name" class="form-label">Ism</label>
                                    <input type="text" name="full_name" class="form-control" id="full_name">
                                </div>
                                <input type="hidden" name="level_id" value="2">
                                <div class="col-md-12">
                                    <label for="supervisor_type" class="form-label">Rol</label>
                                    <select class="form-select mb-3" id="supervisor_type" name="supervisor_type">
                                        <option value="">Rolni tanlang!</option>
                                        @foreach ($supervisor_type as $item)
                                            <option value="{{ $item->id }}">{{ __($item->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div id="block">

                                </div>
                                <div class="col-md-12">
                                    <label for="login" class="form-label">Login</label>
                                    <input type="text" name="login" class="form-control" id="login">
                                </div>
                                <div class="col-md-12">
                                    <label for="password" class="form-label">Parol</label>
                                    <input type="password" name="password" class="form-control" id="password">
                                </div>
                                <div class="col-md-12">
                                    <label for="password_confirmation" class="form-label">Parolni qayta kiriting</label>
                                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                                </div>
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
