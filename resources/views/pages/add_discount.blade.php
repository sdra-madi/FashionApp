@extends('layout.master2')
@section('content')
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
        @if (Session::has('message_sent'))
        <div class="alert alert-success">
           <h4> {{ Session::get('message_sent') }}</h4>
        </div>
    @endif
        <h1 class="heading mov hed"> اضافة حسم </h1>
        <section class="feature" id="featured">
            <div class="row">
                <div class="content" style="padding-left: 20%;">

                    <h3>{{$product[0]->name}}</h3>
                    <span>السعر قبل الحسم:</span>
                    <strong class="price">{{$product[0]->price}} </strong>
                    <form action="{{route('store_discount',$product[0]->id)}}" method="post" >
                        @csrf
                        <div class="namee" style="padding-bottom: 15%;"> قيمة الحسم:</div>
                        <input type="number" name="value" style="margin-bottom: 3%;" class="in" placeholder=" قيمة الحسم">
                        <div class="namee" style="padding-bottom: 15%;"> مدة الحسم:</div>
                        <input type="text" name="duration"  style="margin-bottom: 3%;" class="in" placeholder="لمدة يوم.. " />
                        <button type="submit" class="btn bbtn" style="margin-left: 100%; margin-top: 10%;  ">إضافة</button>
                    </form>


                </div>
                {{-- <div class="image-container fofo">

                    <div class="big-image">
                        <img src="" alt="">
                    </div>

                    <div class="small-image">
                        <img class="image-active" src="images/product_img12.jpg" alt="">
                        <img src="images/product_img17.jpg" alt="">
                        <img src="images/product_img18.jpg" alt="">
                        <img src="images/product_img19.jpg" alt="">
                    </div>

                </div> --}}

            </div>

        </section>


    </section>
@endsection
