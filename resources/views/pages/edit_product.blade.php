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

        <h1 class="heading mov hed"> التعديل على المنتج </h1>
        @if (Session::has('message_sent'))
        <div class="alert alert-success">
            <h4 style="color:darksalmon"> {{ Session::get('message_sent') }}</h4>
        </div>
    @endif
        <section class="feature" id="featured">

            <div class="row">

                <form class="content direction " action="{{route('store_product',$details[0]->id)}}" method="post" >
                    @csrf
                    {{-- @method('PUT') --}}
                    <div class="section-one">
                        <div class="namee">اسم المنتج :</div>
                        <input type="text" name="name" class="in" placeholder="" value="{{ $details[0]->name }}">
                        <h5 style="color:red"> @error('name'){{$message}}@enderror</h5><br>
                        <div class="namee">تفاصيل المنتج :</div>
                        <textarea rows="4" name="description" class="in" placeholder="">{{ $details[0]->description }}</textarea>
                        <h5 style="color:red"> @error('description'){{$message}}@enderror</h5><br>
                        <div class="namee"> السعر :</div>
                        <input type="number" name="price" style="margin-bottom: 3%;" class="in"
                            placeholder="" value="{{ $details[0]->price }}">
                            <h5 style="color:red"> @error('price'){{$message}}@enderror</h5><br>
                        <div class="namee">عدد النقاط :</div>
                        <input type="number" name="number_points" class="in ch-size"
                            placeholder="" value="{{ $details[0]->number_points }}" />
                            <h5 style="color:red"> @error('number_points'){{$message}}@enderror</h5><br>

                        <h4>المقاسات :</h4>
                        <div class="namee">
                            @foreach ($details[0]->sizes as $size)
                                <input type="text" name="size[]" class="in ch-size"
                                    placeholder=" " value="{{ $size->title }}" />
                                <br>
                                <div class="number">
                                    <div class="namee">الالوان :</div>
                                    @foreach ($size->colors as $color)
                                        <input type="text" name="color[]" class="in ch-size"
                                            placeholder="" value="{{ $color->color }}" />
                                    @endforeach
                                    <br>
                                    <div class="number">
                                        <div class="namee">عدد القطع :</div>
                                        @foreach ($size->colors as $color)
                                            <input type="number" name="num[]" class="in ch-size"
                                                placeholder="" value="{{ $color->num_pieces }}" />
                                                <h5 style="color:red"> @error('num[]'){{$message}}@enderror</h5><br>
                                        @endforeach
                                    </div>
                                </div>
                                <br>
                                <br>
                            @endforeach
                        </div>
                        <button type="submit" class="btn bbtn bbb" style="margin-left: 100%; margin-top: 6%">
                            موافق
                        </button>
                    </div>

                </form>
            </div>

        </section>


    </section>
@endsection
