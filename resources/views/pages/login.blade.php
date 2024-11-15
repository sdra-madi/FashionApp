<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pro5.css') }}">
    <title>Login page</title>
</head>

<body style="background-color: #fff; margin-top:-50px ;">



    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img class="mov" src="images/11.jpg" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3 style="color:rgb(228, 132, 196) ; text-align: end; font-weight: bold; padding-bottom: 15px;  font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;" ">  <br>تسجيل الدخول <br> </h3>
              <p class="mb-4" style="text-align: end; font-size: 20px; font-weight: 400;  font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">الرجاء تسجيل الدخول قبل الإنتقال إالى لوحة التحكم <br></p>
            </div>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div style="direction: rtl; padding-left:27%; color:rgb(228, 132, 196) ; text-align: end; font-weight: bold; padding-bottom: 15px;  font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
                    <h3 style="padding-left:40%;">   <x-input-label for="email" :value="__('البريد الالكتروني')" />
                    <x-text-input id="email" class="block mt-1 w-full delet" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"  />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </h3>
                </div>

              {{-- <div class="form-group first" style="direction: rtl; margin-bottom: 4px; ">
                <label for="username" ></label>
                <input type="text" class="form-control" id="username" placeholder="اسم المستخدم"  style="color: rgba(0, 0, 0, 0.726); font-size: 18px; caret-color:rgb(228, 132, 196) ;  font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;"">

              </div> --}}
              <div class="mt-4" style="direction: rtl;  padding-left:30%; color:rgb(228, 132, 196) ; text-align: end; font-weight: bold; padding-bottom: 15px;  font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
                <h3  style="padding-left:55%; "><x-input-label for="password" :value="__('كلمة المرور')" />

                <x-text-input id="password" class="block mt-1 w-full delet "
                                type="password"
                                name="password"
                                required autocomplete="current-password"

                                />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
              </h3>
            </div>
              {{-- <div class="form-group last mb-4" style="direction: rtl;">
                <label for="password"  > </label>
                <input type="password" class="form-control" id="password" placeholder="كلمة المرور" style="color: rgba(0, 0, 0, 0.726); font-size: 18px; caret-color:rgb(228, 132, 196) ;  font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;"">

              </div> --}}

              {{-- <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption" style="direction: rtl; font-size: medium; font-weight: bold; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">ذكرني</span>
                  <input  type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="#" style="color:rgb(228, 132, 196) ; font-size: medium;  font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;"" class="forgot-pass">هل نسيت كلمة المرور؟</a></span>
              </div> --}}
              <div class="block mt-4" style="direction: rtl; padding-left:80%; font-size:1.3rem; font-weight: bold;">
                {{-- <label  for="remember_me" style="direction: rtl;" class="inline-flex items-center  ">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember"  >
                    <span class="ml-2 text-sm text-gray-600">{{ __('ذكرني ') }}</span>
                </label> --}}
            </div>

            <div class="flex items-center justify-end mt-4">
                  @if (Route::has('password.request'))
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                        href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                    @endif
                                    <x-primary-button class="btn btn-primary" style="margin-left:10%; width:90%;">
                                        {{ __('Log in') }}
                                    </x-primary-button>
                                    {{-- <input type="submit" value="تسجيل االدخول" style="font-size: 20px;  font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;"" class="btn btn-block btn-primary" > --}}

                            </div>
                            </form>

                        </div>

                    </div>

                </div>
            </div>
        </div>


        <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
