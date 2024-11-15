@extends('layout.master')
@section('content')
    <section class="orders" id="orders">
    <div class="right" >
            <div class="top ntop" style=" margin-left: -45% " >
                <span class="material-symbols-outlined homee">
                    <a href="{{ route('index') }}">home</a>
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



        <h1 class="heading mov or"> تفاصيل الطلبية</h1>
        @if (Session::has('message_sent'))
        <div class="alert alert-success">
            <h3 style="color:darksalmon"> {{ Session::get('message_sent') }}</h3>
        </div>
    @endif
        <div class="wrapper">
            <div class="project">
                <div class="shop">
                    <br>
                    <p><span style="font-size: larger; font-weight: bold; color: var(--color-primary);">اسم الزبون :</span>
                        <span
                            style="font-size: larger; font-weight: bold; color: var(--color-dark); ">{{ $details[0]->order->user->name }}</span>
                    </p>
                    <p style="margin-top: 1rem;"><span
                            style="font-size: larger; font-weight: bold; color: var(--color-primary);"> عنوان الزبون
                            :</span> <span
                            style="font-size: larger; font-weight: bold; color: var(--color-dark);">{{ $details[0]->order->user->location }}</span>
                    </p>

                    @foreach ($details as $detail)
                        <div class="boxx">
                            <img src="{{$detail->product->photos[0]->img}}" alt="">
                            <div class="contentt">
                                <h3>{{ $detail->product->type->name }}</h3>
                                <h4> السعر:{{ $detail->product->price }} </h4>
                                <p class="unit">العدد:{{ $detail->number_product }}</p>

                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="right-bar">

                    <p><span class="hard"> المجموع الجزئي</span>
                        <span> {{ $details[0]->order->price}}</span>
                    </p>
                    <p><span>الشحن</span> <span>{{ $details[0]->order->charge->price }}</span></p>
                    <hr>
                    <p><span>السعر الكلي</span> <span>{{ $total }}</span></p>
                    @if ($details[0]->order->is_dlivery == '0')
                        <a href="{{ route('delivery_order', $details[0]->order_id) }}"><button class="btn bbtn">شحن <i
                                    class="fa fa-truck"></i></button></a>
                    @endif


                </div>
            </div>
        </div>

    </section>
@endsection
