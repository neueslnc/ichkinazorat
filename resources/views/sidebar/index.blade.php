<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ url('logo.png') }}" width="10" height="50" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text"><a style="color: #fff" href="">

                    {{ env('APP_NAME') }}
                </a></h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        @role('super_admin')
            <li class="">
                <a href="javascript:;" class="has-arrow" aria-expanded="false">
                    <div class="parent-icon"><i class='bx bx-home-circle'></i>
                    </div>
                    <div class="menu-title">Назоратчи</div>
                </a>
                <ul>
                    <li>
                        <a href="#" onclick="redrect('{{ route('superadmin.supervisor.create') }}')"><i class="bx bx-right-arrow-alt"></i>Nazoratchi qo'shish</a>
                    </li>
                    <li>
                        <a href="#" onclick="redrect('{{ route('superadmin.supervisor.index') }}')"><i class="bx bx-right-arrow-alt"></i>Nazoratchilar ro'yxati</a>
                    </li>
                    <li>
                        <a href="#" onclick="redrect('{{ route('superadmin.supervisor.medicine') }}')"><i class="bx bx-right-arrow-alt"></i>Tibbiyot</a>
                    </li>
                    <li>
                        <a href="#" onclick="redrect('{{ route('superadmin.supervisor.social') }}')"><i class="bx bx-right-arrow-alt"></i>Ijtimoiy</a>
                    </li>
                    <li>
                        <a href="#" onclick="redrect('{{ route('superadmin.criteria.index') }}')"><i class="bx bx-right-arrow-alt"></i>Критериа</a>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="javascript:;" class="has-arrow" aria-expanded="false">
                    <div class="parent-icon"><i class='bx bx-home-circle'></i>
                    </div>
                    <div class="menu-title">Проректорлар</div>
                </a>
                <ul>
                    <li>
                        <a href="#" onclick="redrect()"><i class="bx bx-right-arrow-alt"></i>Молия проректор</a>
                    </li>
                    <li>
                        <a href="#" onclick="redrect()"><i class="bx bx-right-arrow-alt"></i>Укув ишлари проректор</a>
                    </li>
                </ul>
            </li>
            <li>
                <a>
                    <div class="parent-icon"><i class="bx bx-home-circle"></i>
                    </div>
                    <div class="menu-title">Маънавият</div>
                </a>
            </li>
        @endrole

    </ul>
    <!--end navigation-->
</div>

<script>

    function redrect(url) {
        window.location.href = url;
    }

</script>
