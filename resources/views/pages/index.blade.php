@extends('layout.master')
@section('content')
    <main>
        <h1>لوحة التحكم</h1>
        {{-- <div class="date">
            <input type="date">
        </div> --}}

        <div class="insights">
            <div class="sales">
                <span class="material-symbols-outlined">
                    analytics
                </span>

                <div class="middlle">

                    <div class="left">
                        <h3>المبيعات الإجمالية</h3>
                        <h1>{{$total_sale}}%</h1>
                    </div>
                </div>

                <small class="text-muted">أخر 24 ساعة</small>
            </div>
            <!---end of sales-->

            <div class="expense">
                <span class="material-symbols-outlined">
                    Checkroom
                </span>

                <div class="middlle">

                    <div class="left">
                        <h3>عدد القطع</h3>
                        <h1>{{$num_pro}}</h1>
                    </div>
                </div>

                <small class="text-muted">أخر 24 ساعة</small>
            </div>
            <!---end of expenses-->

            <div class="income">
                <span class="material-symbols-outlined">
                    stacked_line_chart
                </span>

                <div class="middlle">

                    <div class="left">
                        <h3>قيمة المبيعات الاجمالية</h3>
                        <h1>{{$sum}} </h1>
                    </div>
                </div>

                <small class="text-muted">أخر 24 ساعة</small>
            </div>
            <!---end of income-->
        </div>
        <!--end of insights-->
        <div class="recent-order">
            <h2>الطلبيات الأخيرة</h2>
            <table>
                <thead>
                    <tr>
                        <th>اسم الزبون</th>
                        <th>رقم الهاتف</th>
                        <th>تاريخ الطلبية</th>
                        <th>طريقة الدفع</th>
                        <th>الحالة</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ( $orders as $order )
                    <tr>
                        <td>{{$order->user->name}}</td>
                        <td>{{$order->user->phone_number}}</td>
                        <td>{{$order->date_order}}</td>
                        @if ($order->payment_type=='0')
                        <td>عند الاستلام</td>
                        @endif
                        @if ($order->payment_type=='1')
                        <td>الكتروني</td>
                        @endif
                        @if($order->is_dlivery=='0')
                        <td class="success">قيد التسليم </td>
                        @endif
                        @if($order->is_dlivery=='1')
                        <td class="success">تم التسليم</td>
                        @endif
                        <td class="primary" onclick="document.location = '{{route('detail_order',$order->id)}}'">التفاصيل</td>
                    </tr>
                    @endforeach()
                </tbody>


            </table>
            <a href="{{ route('order') }}">عرض الكل</a>
        </div>
    </main>
    <div class="right">
        <div class="top">
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
        <div class="recent-updates">
            <h2>أخر التحديثات</h2>
            <div class="updates">
                <div class="update">
                    <div class="profile-photo">
                        <img src="./images/image-400.png">
                    </div>
                    <div class="message">
                        <h3> عدد المنتجات التي عدد قطعها اقل  من 10 هو{{$or}}</h3>
                        {{-- <small class="text-muted"> منذ 2 دقيقة</small> --}}
                    </div>
                </div>

                {{-- <div class="update">
                    <div class="profile-photo">
                        <img src="./images/img3.png">
                    </div>
                    <div class="message">
                        <p><b>دانية بدوي </b> استلمت طلبها وهو عبارة عن فستان قطن في منطقة المرديان </p>
                        <small class="text-muted"> منذ 2 دقيقة</small>
                    </div>
                </div> --}}

                {{-- <div class="update">
                    <div class="profile-photo">
                        <img src="./images/user2.jpg">
                    </div>
                    <div class="message">
                        <p><b>محمد </b>استلم طلبه وهو عبارة عن بلوزة قطن في منطقة الفرقان </p>
                        <small class="text-muted"> منذ 2 دقيقة</small>
                    </div>
                </div> --}}


            </div>
        </div>
        <!----end of recent updates--->

        <div class="sales-analytics">
            <h2>تحليلات المبيعات</h2>
            <div class="item online">
                <div class="icon">
                    <span class="material-icons-sharp">shopping_cart</span>
                </div>

                <div class="right">
                    <div class="info">
                        <h3>إجمالي الطلبيات المستلمة</h3>
                        <small class="text-muted">أخر 24 ساعة</small>
                    </div>
                    <h5 class="success">{{$orders_delivery_percent}}%</h5>
                    <h3>{{$orders_delivery}}</h3>
                </div>
            </div>


            <div class="item offline">
                <div class="icon">
                    <span class="material-icons-sharp">local_mall</span>
                </div>

                <div class="right">
                    <div class="info">
                        <h3>إجمالي الطلبيات المعلقة</h3>
                        <small class="text-muted">أخر 24 ساعة</small>
                    </div>
                    <h5 class="danger">{{$orders_not_delivery_percent}}%</h5>
                    <h3>{{$orders_not_delivery}}</h3>
                </div>
            </div>


            <div class="item Customers">
                <div class="icon">
                    <span class="material-icons-sharp">person</span>
                </div>

                <div class="right">
                    <div class="info">
                        <h3>عدد الزبائن </h3>
                        <small class="text-muted">أخر 24 ساعة</small>
                    </div>
                    {{-- <h5 class="success">+25%</h5> --}}
                    <h3>{{$users}}</h3>
                </div>
            </div>

            <div class="item add-product">
                <div onclick="document.location = '{{ route('addproduct') }}'">
                    <span class="material-icons-sharp">add</span>
                    <h3>إضافة منتج</h3>
                </div>
            </div>

        </div>
    </div>
@endsection
