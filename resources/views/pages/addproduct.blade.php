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


            <a href="{{ route('addproduct') }}" class="active">
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

            <a href="{{ route('guide') }}">
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
        @if (Session::has('message_sent'))
            <div class="alert alert-success">
                <h3 style="color:darksalmon">{{ Session::get('message_sent') }}</h3>
            </div>
        @endif
        <h1 class="heading mov hed"> إضافة منتج جديد </h1>
        <section class="feature" id="featured">
            <div class="row">
                <form id="form" class="content direction" action="{{ route('register_product') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="section-one">
                        <div class="namee">اسم المنتج :</div>
                        <input type="text" name="name" class="in" placeholder="اسم المنتج" />
                       <h5 style="color:red"> @error('name'){{$message}}@enderror</h5>
                        <div class="namee">تفاصيل المنتج :</div>
                        <textarea rows="4" class="in" name="description" placeholder="تفاصيل المنتج"></textarea>
                        <h5 style="color:red">@error('description'){{$message}}@enderror</h5>
                        <div class="namee">السعر :</div>
                        <input id="pric" type="number" name="price" style="margin-bottom: 3%" class="in"
                            placeholder=" السعر  "  onkeyup="truee('pric','text')"/>
                            <span id="text"></span>
                            <h5 style="color:red"> @error('price'){{$message}}@enderror</h5>
                            <div class="number">
                                <div class="namee">الصنف</div>
                                <select class="in ch-size" type="text" name="class" id="slct1"
                                    style="text-align: center; color: var(--color-dark) ;padding:  5px">
                                    <option style="color: var(--color-dark) ; padding: 5px">النوع</option>
                                </select>
                                <h5 style="color:red"> @error('class'){{$message}}@enderror</h5>
                                <div class="namee">نوع المنتج </div>
                                <select class="in ch-size" type="text" name="type" style="text-align: center; color: var(--color-dark) ; width: 100px" id="slct2">
                                </select>
                                <h5 style="color:red"> @error('type'){{$message}}@enderror</h5>
                            </div>
                        <div class="namee">عدد النقاط :</div>
                        <input type="number" name="number_points" class="in ch-size" placeholder="0 " id="col_4" onkeyup="truee('col_4','n_4')"/>
                        <span id="n_4" style="width : 200px"></span>
                        <h5 style="color:red"> @error('number_points'){{$message}}@enderror</h5>

                        <div class="namee"> المقاس 1</div>
                        <input type="text" name="size1" class="in ch-size" placeholder=" " />
                        {{-- <h5 style="color:red"> @error('size1'){{$message}}@enderror</h5> --}}
                        <div class="number" >
                            <div class="namee">الالوان</div>
                            <h5 style="color:red"> @error('color11'){{$message}}@enderror</h5>
                            <select class="in ch-size slctcolor1" name="color11" id="slctcolor1"
                                style="text-align: center; color: var(--color-dark) ;padding:  5px">
                                <option style="color: var(--color-dark) ; padding: 5px"></option>
                            </select>


                            <select class="in ch-size slctcolor2" name="color21" id="slctcolor2"
                                style="text-align: center; color: var(--color-dark) ;padding:  5px">
                                <option style="color: var(--color-dark) ; padding: 5px"></option>
                            </select>

                             <select class="in ch-size slctcolor3" name="color31" id="slctcolor3"
                                style="text-align: center; color: var(--color-dark) ;padding:  5px">
                                <option style="color: var(--color-dark) ; padding: 5px"></option>
                            </select>

                            <select class="in ch-size slctcolor4" name="color41" id="slctcolor4"
                                style="text-align: center; color: var(--color-dark) ;padding:  5px">
                                <option style="color: var(--color-dark) ; padding: 5px"></option>
                            </select>
                            <p class="reset popr" style="color: rgb(228, 132, 196) ; padding: 3px 15px ; font-size: 15px ;flex:1 ; border-bottom: 2px solid rgb(228, 132, 196) ;cursor: pointer ; border-radius: 15px;box-shadow: 0 2px 4px 0 black ; width: 65px;"
                            onclick="res()" > reset</p>
                        </div>
                        <div class="number">
                            <div class="namee">العدد</div>
                            <input type="number" name="num11" class="in ch-size" placeholder="0 " id="col_8" onkeyup="truee('col_8','n_8')" />
                            <span id="n_8"></span>
                            <h5 style="color:red"> @error('num11'){{$message}}@enderror</h5>
                            <input type="number" name="num21" class="in ch-size" placeholder="0 " id="col_9" onkeyup="truee('col_9','n_9')" />
                            <span id="n_9"></span>
                            <h5 style="color:red"> @error('num21'){{$message}}@enderror</h5>
                            <input type="number" name="num31" class="in ch-size" placeholder="0 "id="col_10" onkeyup="truee('col_10','n_10')" />
                            <span id="n_10"></span>
                            <h5 style="color:red"> @error('num31'){{$message}}@enderror</h5>
                            <input type="number" name="num41" class="in ch-size" placeholder="0 "id="col_11" onkeyup="truee('col_11','n_11')" />
                            <span id="n_11"></span>
                            <h5 style="color:red"> @error('num41'){{$message}}@enderror</h5>
                            <p class="reset popr" style="color: rgb(228, 132, 196) ; padding: 3px 15px ; font-size: 15px ;flex:1 ; border-bottom: 2px solid rgb(228, 132, 196) ;cursor: pointer ; border-radius: 15px;box-shadow: 0 2px 4px 0 black ; width: 65px; visibility: hidden ;"
                            onclick="res2()" > reset</p>
                        </div>
                        <div class="namee">المقاس 2</div>
                        <input type="text" name="size2" class="in ch-size" placeholder=" " />

                        <div class="number">
                            <div class="namee">الالوان</div>
                            <select class="in ch-size slctcolor5" name="color12" id="slctcolor5"
                                style="text-align: center; color: var(--color-dark) ;padding:  5px">
                                <option style="color: var(--color-dark) ; padding: 5px"></option>
                            </select>

                            <select class="in ch-size slctcolor6" name="color22" id="slctcolor6"
                                style="text-align: center; color: var(--color-dark) ;padding:  5px">
                                <option style="color: var(--color-dark) ; padding: 5px"></option>
                            </select>

                             <select class="in ch-size slctcolor7" name="color32" id="slctcolor7"
                                style="text-align: center; color: var(--color-dark) ;padding:  5px">
                                <option style="color: var(--color-dark) ; padding: 5px"></option>
                            </select>

                            <select class="in ch-size slctcolor8" name="color42" id="slctcolor8"
                                style="text-align: center; color: var(--color-dark) ;padding:  5px">
                                <option style="color: var(--color-dark) ; padding: 5px"></option>
                            </select>
                            <p class="reset popr" style="color: rgb(228, 132, 196) ; padding: 3px 15px ; font-size: 15px ;flex:1 ; border-bottom: 2px solid rgb(228, 132, 196) ;cursor: pointer ; border-radius: 15px;box-shadow: 0 2px 4px 0 black ; width: 65px;"
                            onclick="res1()" > reset</p>
                        </div>

                        <div class="number">
                            <div class="namee">العدد</div>
                            <input type="number" name="num12" class="in ch-size" placeholder="0 " id="col_1" onkeyup="truee('col_1','n_1')" />
                            <span id="n_1"></span>
                            <h5 style="color:red"> @error('num12'){{$message}}@enderror</h5>
                            <input type="number" name="num22" class="in ch-size" placeholder="0 " id="col_2" onkeyup="truee('col_2','n_2')"/>
                            <span id="n_2"></span>
                            <h5 style="color:red"> @error('num22'){{$message}}@enderror</h5>
                            <input type="number" name="num32" class="in ch-size" placeholder="0 " id="col_3" onkeyup="truee('col_3','n_3')"/>
                            <span id="n_3"></span>
                            <h5 style="color:red"> @error('num32'){{$message}}@enderror</h5>
                            <input type="number" name="num42" class="in ch-size" placeholder="0 " id="col_13" onkeyup="truee('col_13','n_13')"/>
                            <span id="n_13"></span>
                            <h5 style="color:red"> @error('num42'){{$message}}@enderror</h5>
                            <p class="reset popr" style="color: rgb(228, 132, 196) ; padding: 3px 15px ; font-size: 15px ;flex:1 ; border-bottom: 2px solid rgb(228, 132, 196) ;cursor: pointer ; border-radius: 15px;box-shadow: 0 2px 4px 0 black ; width: 65px; visibility: hidden ;"
                            onclick="res2()" > reset</p>
                        </div>


                        <div class="namee">المقاس 3</div>
                        <input type="text" name="size3" class="in ch-size" placeholder=" " />

                        <div class="number">
                            <div class="namee">الالوان</div>
                            <select class="in ch-size slctcolor9" name="color13" id="slctcolor9"
                                style="text-align: center; color: var(--color-dark) ;padding:  5px">
                                <option style="color: var(--color-dark) ; padding: 5px"></option>
                            </select>

                            <select class="in ch-size slctcolor10" name="color23" id="slctcolor10"
                                style="text-align: center; color: var(--color-dark) ;padding:  5px">
                                <option style="color: var(--color-dark) ; padding: 5px"></option>
                            </select>

                             <select class="in ch-size slctcolor11" name="color33" id="slctcolor11"
                                style="text-align: center; color: var(--color-dark) ;padding:  5px">
                                <option style="color: var(--color-dark) ; padding: 5px"></option>
                            </select>

                            <select class="in ch-size slctcolor12" name="color43" id="slctcolor12" 
                                style="text-align: center; color: var(--color-dark) ;padding:  5px">
                                <option style="color: var(--color-dark) ; padding: 5px"></option>
                            </select>
                            <p class="reset popr" style="color: rgb(228, 132, 196) ; padding: 3px 15px ; font-size: 15px ;flex:1 ; border-bottom: 2px solid rgb(228, 132, 196) ;cursor: pointer ; border-radius: 15px;box-shadow: 0 2px 4px 0 black ; width: 65px;"
                            onclick="res2()" > reset</p>
                        </div>
                        <div class="number">
                            <div class="namee">العدد</div>
                            <input type="number" name="num13" class="in ch-size" placeholder="0 " id="col_5" onkeyup="truee('col_5','n_5')"/>
                            <span id="n_5"></span>
                            <h5 style="color:red"> @error('num13'){{$message}}@enderror</h5>
                            <input type="number" name="num23" class="in ch-size" placeholder="0 " id="col_6" onkeyup="truee('col_6','n_6')" />
                            <span id="n_6"></span>
                            <h5 style="color:red"> @error('num23'){{$message}}@enderror</h5>
                            <input type="number" name="num33" class="in ch-size" placeholder="0 " id="col_7" onkeyup="truee('col_7','n_7')" />
                            <span id="n_7"></span>
                            <h5 style="color:red"> @error('num33'){{$message}}@enderror</h5>
                            <input type="number" name="num43" class="in ch-size" placeholder="0 " id="col_12" onkeyup="truee('col_12','n_12')" />
                            <span id="n_12"></span>
                            <h5 style="color:red"> @error('num43'){{$message}}@enderror</h5>
                            <p class="reset popr" style="color: rgb(228, 132, 196) ; padding: 3px 15px ; font-size: 15px ;flex:1 ; border-bottom: 2px solid rgb(228, 132, 196) ;cursor: pointer ; border-radius: 15px;box-shadow: 0 2px 4px 0 black ; width: 65px; visibility: hidden ;"
                            onclick="res2()" > reset</p>
                        </div>
                        <button type="submit" class="btn bbtn bbb" style="margin-left: 100%; margin-top: 6%">
                            موافق
                        </button>
                    </div>

                    <div class="image-container spacee">

                        <div class="image">أدخل الصورة الأولى :</div>
                        <input type="file" name="img1" class="filee" >
                        <h5 style="color:red">@error('img1'){{$message}}@enderror</h5>
                        <div class="image">أدخل الصورة الثانية :</div>
                        <input type="file" name="img2" class="filee" />
                        <h5 style="color:red">@error('img2'){{$message}}@enderror</h5>
                        <div class="image">أدخل الصورة الثالثة :</div>
                        <input type="file" name="img3" class="filee" />
                        <h5 style="color:red">@error('img3'){{$message}}@enderror</h5>
                        <div class="image">أدخل الصورة الرابعة :</div>
                        <input type="file" name="img4" class="filee" />
                        <h5 style="color:red">@error('img4'){{$message}}@enderror</h5>


                    </div>
                </form>
            </div>
        </section>


    </section>
@endsection
