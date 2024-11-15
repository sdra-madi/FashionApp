@extends('layout.master1')
@section('content')
    <aside>
        <div class="conta">
            <div class="top">
                <div class="logo">
                    <img src="{{ asset('images/logo2.jpg') }}">
                    <h2>عالم <span style=" color: var(--color-primary);"> التسوق</span> </h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">close</span>

                </div>
            </div>
            <div class="asidebar">
                <a href="{{ route('index') }}">
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>لوحة التحكم</h3>
                </a>

                <a href="{{ route('order') }}">
                    <span class="material-icons-sharp">receipt_long</span>
                    <h3>الطلبيات</h3>
                </a>
                <a href="{{ route('analytic') }}">
                    <span class="material-icons-sharp">insights</span>
                    <h3>الإحصائيات</h3>
                </a>


                <a href="#" class="links">
                    <span class="material-icons-sharp">inventory</span>

                    <h3 id="show">المنتجات</h3>
                    <ul class="menuu">
                        <li class="man"><button onclick="document.location = '{{ route('man') }}'"
                                class="fix">رجالي</button></li>
                        <li class="woman"><button onclick="document.location = '{{ route('women') }}'"
                                class="fix">نسائي</button>
                        </li>
                        <li class="child"><button onclick="document.location = '{{ route('kids') }}'"
                                class="fix">ولادي</button>
                        </li>
                    </ul>

                </a>


                <a href="{{ route('addproduct') }}">
                    <span class="material-icons-sharp">add</span>
                    <h3>إضافة منتج</h3>
                </a>

                <a href="{{ route('truck') }}">
                    <span class="material-symbols-outlined">
                        local_shipping
                    </span>
                    <h3> شحن</h3>
                </a>

                <a href="{{ route('discounts') }}">
                    <span class="material-symbols-outlined">
                        sell
                    </span>
                    <h3> الحسومات</h3>
                </a>
                <a href="{{ route('truck_details') }}">
                    <span class="material-icons-sharp">
                        edit_note
                    </span>
                    <h3>تفاصيل الشحن</h3>
                </a>
                <a href="{{ route('points') }}" class="active">
                    <span class="material-icons-sharp">
                        summarize
                    </span>
                    <h3>تفاصيل النقاط</h3>
                </a>

                <a href="{{ route('guide') }}">
                    <span class="material-icons-sharp">report_gmailerrorred</span>
                    <h3>دليل المستخدم</h3>
                </a>

                <a href="{{ route('logout') }}">
                    <span class="material-icons-sharp">logout</span>
                    <h3>تسجيل خروج</h3>
                </a>
            </div>
        </div>
    </aside>
    <section class="products" id="products">
        <div class="right">
            <div class="top">
                <span class="material-symbols-outlined homee">
                    <a href="index.html">home</a>
                </span>
                <button id="menu-btn">
                    <span class="material-icons-sharp">menu</span>
                </button>
                <div class="theme-toggler">
                    <span class="material-icons-sharp active">light_mode</span>
                    <span class="material-icons-sharp">dark_mode</span>
                </div>
                <div class="profile">
                    <div class="info">
                        <p>مستخدم, <b>الموقع</b></p>
                        <small class="text-muted">المدير</small>
                    </div>
                    <div class="profile-photo">
                        <img src="./images/user1.jpg">
                    </div>
                </div>
            </div>
        </div>
        <h1 class="heading mov or u"> ادخل تفاصيل النقاط</h1>
        @if (Session::has('message_sent'))
            <div class="alert alert-success">
                <h3 style="color:darksalmon"> {{ Session::get('message_sent') }}</h3>
            </div>
        @endif
        <section class="feat" id="featured">
            <div class="roww">
                <form class="contentt" action="{{ route('score_points') }}" method="post">
                    @csrf
                    <div class="section-two">
                        <div class="namee">
                            <label for="number">عدد النقاط:</label><br>
                            <br>
                            <input type="number" id="number" name="number" class="in1 ch-size">
                            <h5 style="color:red"> @error('number'){{$message}}@enderror</h5><br>
                        </div>
                        <div class="namee">
                            <label for="cost"> يقابلها:</label><br>
                            <br>
                            <input type="number" id="cost" name="cost" class="in1 ">
                            <h5 style="color:red"> @error('cost'){{$message}}@enderror</h5><br>
                        </div>

                        <button type="submit" class="btn bbtn bbb" style="margin-left: 100%; margin-top: 6%">
                            موافق
                        </button>

                    </div>
        </section>
    </section>
    </section>
@endsection
