@extends('layout.master2')
@section('content')

    <main>
        <section class="total" id="total">
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
            <h1 class="heading mov or">  الطلبيات</h1>
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
                <a href="#">التالي</a>
            </div>
        </section>
    </main>
@endsection
