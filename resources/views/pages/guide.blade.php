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
            <a href="{{ route('index') }}" >
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

            <a href="{{route('discounts')}}">
                <span class="material-symbols-outlined">
                    sell
                </span>
                <h3> الحسومات</h3>
            </a>
            <a href="{{route('truck_details')}}">
                <span class="material-icons-sharp">
                    edit_note
                </span>
                <h3>تفاصيل الشحن</h3>
            </a>
            <a href="{{route('points')}}">
                <span class="material-icons-sharp">
                    summarize
                </span>
                <h3>تفاصيل النقاط</h3>
            </a>

            <a href="{{ route('guide') }}" class="active">
                <span class="material-icons-sharp">report_gmailerrorred</span>
                <h3>دليل المستخدم</h3>
            </a>

            <a href="{{route('logout')}}">
                <span class="material-icons-sharp">logout</span>
                <h3>تسجيل خروج</h3>
            </a>
        </div>
    </div>
</aside>
    <section class="guide" id="guide">
        <div class="right">
            <div class="top">
                <span class="material-symbols-outlined homee">
                    <a href="{{route('index')}}">home</a>
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
        <h1 class="heading mov or design"> دليل المستخدم</h1>
        <div class="guide">
            <br>
            <p class="text-dania desig">
                <span> لوحة التحكم هذه لتطبيق الكتروني لبيع الملابس تحتوي على اشعارات من التطبيق باستلام الزبائن لطلبهم وعدد
                    الطلبيات المستلمة وعدد الطلبيات المعلقة وعدد الزبائن </span>
                بالاضافة الى احصائيات المبيعات من المبيعات الكلية وعدد القطع ,الخ..
                التي نجدها كاملة في صفحة الاحصائيات ، كما تسمح هذه اللوحة للمسوقة بالتحكم بالتالي :
            </p>
            <div class="contt-d">
                <div class="card-d" style="--clr:#009688">
                    <div class="imgbx">
                        <img src="images/products.jpg">
                    </div>
                    <div class="content-d">
                        <h2>المنتجات</h2>
                        <p>حيث يمكن اضافة منتج جديد لقائمة منتجاتك كما يمكن حذف منتج منها او التعديل على منتج موجود مسبقا
                            وهناك امكانية لرؤية جميع منتجاتك بشكل منسق وجميل في صفحة المنتجات.</p>
                    </div>
                </div>
                <div class="card-d" style="--clr:#ff3e7f">
                    <div class="imgbx">
                        <img src="images/orders.jpg">
                    </div>
                    <div class="content-d">
                        <h2>الطلبيات</h2>
                        <p>حيث يمكنك رؤية جميع طلبيات  الزبائن بشكل منظم في الصفحة الرئيسية كما يمكنك رؤية كل طلبية بشكل
                            مفصل عند الضغط على تفاصيل لتنقلك الى صفحةكل طلبية على حدى.</p>
                    </div>
                </div>
                <div class="card-d" style="--clr:#03a9f4">
                    <div class="imgbx">
                        <img src="images/truk.jpg">
                    </div>
                    <div class="content-d">
                        <h2>الشحن</h2>
                        <p>حيث يمكنك من خلال الانتقال الي صفحة الشحن رؤية جميع الطلبيات المشحونة سواء التي تم تسليمها او
                            التي ما زالت قيد الانتظار بالاضافة الي رؤية طريقة شحن كل طلبية .</p>
                    </div>
                </div>
                <div class="card-d" style="--clr:#ff3e7f">
                    <div class="imgbx">
                        <img src="images/analtics.jpg">
                    </div>
                    <div class="content-d">
                        <h2>الاحصائيات</h2>
                        <p>تحتوي صفحة الاحصائيات على اجمالي مبيعات التطبيق وعدد القطع والارباح الكلية بالاضافة الى نسبة
                            المبيعات من كل صنف (رجالي،نسائي،ولادي)</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
