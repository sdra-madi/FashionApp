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
                <a href="{{ route('truck_details') }}" class="active">
                    <span class="material-icons-sharp">
                        edit_note
                    </span>
                    <h3>تفاصيل الشحن</h3>
                </a>
                <a href="{{ route('points') }}">
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
        <h1 class="heading mov or g">  تفاصيل الشحن</h1>
        <section class="points" id="point">
            <div class="table-points">
                <table>
                    <thead>
                        <tr>
                            <th> نوع الشحن</th>
                            <th> تكلفة الشحن</th>
                            <th> مدة التسليم</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($charges as $charge)
                            <tr>
                                <td> {{ $charge->type }}</td>
                                <td> {{ $charge->price }}</td>
                                <td> {{ $charge->durition }}</td>
                                <td class="primary" onclick="document.location = '{{ route('edit_charge',$charge->id) }}'"
                                    style="font-size: 20px;">تعديل</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <button type="submit" class="btn bbtn bbb ddd" style="margin-top: 6%;width:140px; "
                onclick="document.location = '{{ route('add_charge') }}'">
                اضافة نوع شحن </button>
        </section>
    </section>
@endsection
