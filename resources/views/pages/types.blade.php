@extends('layout.master')
@section('content')
    <section class="products koko" id="products" style="width:145% ">
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

        <div class="gallery" id="gallery">
            @if ($types[0]->classification_id==1)
            <h1 class="heading mov"> المنتجات الرجالية </h1>
            @endif
            @if ($types[0]->classification_id==2)
            <h1 class="heading mov"> المنتجات النسائية</h1>
            @endif
            @if ($types[0]->classification_id==3)
            <h1 class="heading mov"> المنتجات الولادية</h1>
            @endif
            <ul class="controls">
                @if ($types[0]->classification_id==1)
                <a href="{{route('man')}}" class="btn button-active" data-filter="all">الكل</a>
                @endif
                @if ($types[0]->classification_id==2)
                <a href="{{route('women')}}" class="btn button-active" data-filter="all">الكل</a>
                @endif
                @if ($types[0]->classification_id==3)
                <a href="{{route('kids')}}" class="btn button-active" data-filter="all">الكل</a>
                @endif
                @foreach ($types as $type)
                    <a href="{{route('type_products',$type->id)}}" class="btn" data-filter="jacket">{{ $type->name }}</a>
                @endforeach
            </ul>

            <div class="box-container">
                @foreach ($products as $product)
                    <div class="box" data-item="special">
                        <div class="image">
                            <img src="{{$product->photos[0]->img}}" alt="">
                        </div>
                        <div class="content">
                            <h3>{{$product->name}}</h3>
                            <div class="price">
                                <div class="amount">السعر:{{$product->price}}</div>
                            </div>

                        </div>
                        <a href="{{ route('detail_product',$product->id) }}" class="btn">مزيد من التفاصيل</a>
                    </div>
                @endforeach



            </div>
        </div>

    </section>
@endsection
