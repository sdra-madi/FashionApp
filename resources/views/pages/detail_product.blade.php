@extends('layout.master2')
@section('content')
    <section class="products" id="products">
        <div class="right">
            <div class="top">
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

        <h1 class="heading mov hed " > تفاصيل المنتج </h1>
        @if (Session::has('message_sent'))
            <div class="alert alert-success">
                {{ Session::get('message_sent') }}
            </div>
        @endif


        <section class="feature" id="featured" >

            <div class="row" >
                {{-- <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <span>(500+) التقييم</span>
                    </div> --}}
                <div class="content">
                    <h3 style="padding-bottom:0; margin-top:-15%; ">{{ $details[0]->name }} </h3>
                    <p>{{ $details[0]->description }}</p>
                    <span>السعر :</span>
                    <strong class="price">{{ $details[0]->price }} <span></span> </strong>


                    <h4>المقاسات :</h4>
                    <div class="size">
                        @foreach ($details[0]->sizes as $size)
                            <span>{{ $size->title }}</span>
                            <br>
                            <br>
                            <div class="colorr">
                                <div class="namee">الالوان :</div>
                                @foreach ($size->colors as $color)
                                    <span style="background:#e753ae ;">{{ $color->color }}</span>
                                @endforeach
                                <br>
                                <br>
                                <div class="colorr">
                                    <div class="namee">عدد القطع :</div>
                                    @foreach ($size->colors as $color)
                                        <span style="background:#e753ae ;">{{ $color->num_pieces }}</span>
                                    @endforeach
                                </div>
                            </div>
                            <br>
                            <br>
                        @endforeach
                    </div>
                    <div class="number">
                        <h4> الصنف :</h4>
                        <div class="size">
                            <span>{{ $details[0]->type->classification->name }}</span>
                        </div>
                        <h4> نوع المنتج :</h4>
                        <div class="size">
                            <span>{{ $details[0]->type->name }}</span>
                        </div>

                    </div>

                    <div class="number">
                        <h4>عدد القطع :</h4>
                        <div class="size">
                            <span>{{ $details[0]->number_pieces }}</span>
                        </div>


                        <h4> عدد النقاط :</h4>
                        <div class="size">
                            <span>{{ $details[0]->number_points }}</span>
                        </div>

                    </div>



                    <div class="tap">
                        <a href="{{ route('edit_product', $details[0]->id) }}"><button class="btn bbtn">تعديل</button></a>
                        @if(count($details[0]->discounts)==0)
                        <a href="{{ route('add_discount', $details[0]->id) }}"><button class="btn bbtn"> حسم</button></a>
                        @endif
                        <a href="{{ route('hide_product', $details[0]->id) }}"><button class="btn bbtn">إخفاء</button></a>
                    </div>
                </div>
                <div class="image-container">
                    <div class="big-image">
                        <img src="{{$details[0]->photos[0]->img}}" alt="">
                    </div>

                    <div class="small-image">
                        <img class="image-active" src="{{$details[0]->photos[0]->img}}" alt="">
                        <img src="{{$details[0]->photos[1]->img}}" alt="">
                        <img src="{{$details[0]->photos[2]->img}}" alt="">
                        <img src="{{$details[0]->photos[3]->img}}" alt="">
                    </div>

                </div>

            </div>

        </section>


    </section>
@endsection
