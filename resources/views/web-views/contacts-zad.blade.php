
@extends('layouts.front-end.app')

@section('title',\App\CPU\translate('Contact Us'))

@push('css_or_js')

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact</title>

  <meta property="og:image" content="{{asset('storage/company')}}/{{$web_config['web_logo']->value}}"/>
    <meta property="og:title" content="Contact {{$web_config['name']->value}} "/>
    <meta property="og:url" content="{{env('APP_URL')}}">
    <meta property="og:description" content="{!! substr($web_config['about']->value,0,100) !!}">

    <meta property="twitter:card" content="{{asset('storage/company')}}/{{$web_config['web_logo']->value}}"/>
    <meta property="twitter:title" content="Contact {{$web_config['name']->value}}"/>
    <meta property="twitter:url" content="{{env('APP_URL')}}">
    <meta property="twitter:description" content="{!! substr($web_config['about']->value,0,100) !!}">

    <meta name="viewport" content="width=device-width, initial-scale=1">



    <link rel="stylesheet" media="screen"
          href="{{asset('assets/front-end')}}/vendor/simplebar/dist/simplebar.min.css"/>
    <link rel="stylesheet" media="screen"
          href="{{asset('assets/front-end')}}/vendor/tiny-slider/dist/tiny-slider.css"/>
    <link rel="stylesheet" media="screen"
          href="{{asset('assets/front-end')}}/vendor/drift-zoom/dist/drift-basic.min.css"/>
    <link rel="stylesheet" media="screen"
          href="{{asset('assets/front-end')}}/vendor/lightgallery.js/dist/css/lightgallery.min.css"/>
    <link rel="stylesheet" href="{{asset('assets/back-end')}}/css/toastr.css"/>

  
    <!-- font -->
    <link href='https://fonts.googleapis.com/css?family=Tajawal' rel='stylesheet'>



    {{--<script src="{{asset('assets/front-end')}}/vendor/jquery/dist/jquery.slim.min.js"></script>--}}
<script src="{{asset('assets/front-end')}}/vendor/jquery/dist/jquery-2.2.4.min.js"></script>

{{--Toastr--}}
<script src={{asset("/assets/back-end/js/toastr.js")}}></script>

{{--Toastr--}}
<script src={{asset("/assets/back-end/js/toastr.js")}}></script>
{!! Toastr::message() !!}

    <style>

        body{
          background: #200A3C;
        }
       
       *{
        font-family: 'Tajawal', sans-serif;
       }

       label{
          color: white !important;
        }

        .headerTitle {
            font-size: 25px;
            font-weight: 700;
            
        }

        .for-contac-image {
            padding: 6%;
        }

        .for-send-message {
            padding: 26px;
            margin-bottom: 2rem;
            margin-top: 2rem;
        }

        /* @media (max-width: 600px) {
            .sidebar_heading {
                background: {{$web_config['primary_color']}}

            }

            .headerTitle {

                font-weight: 700;
                margin-top: 1rem;
            }

            .sidebar_heading h1 {
                text-align: center;
                color: aliceblue;
                padding-bottom: 17px;
                font-size: 19px;
            }
        } */

        .btn ,.btn:hover,.btn:active{
          background: #CC9933 !important;
          border-color: #CC9933 !important;
        }
        .headerTitle {
          color: #CC9933;
        }
        .rtl {
          direction: rtl;
        }

        .toast {
          text-align: end !important;
        }


        
    

        
    </style>

@endpush
@section('content')


{{--<div class="container rtl">
        <div class="row">
            <div class="col-md-12 sidebar_heading text-center mb-2">
                <h1 class="h3  mb-0 folot-left headerTitle" style="font-size: 50px;">{{\App\CPU\translate('قريباً')}}...</h1>
                <h1 class="h3  mb-0 folot-left headerTitle" style="font-size: 35px;">ملابس شرعية وفساتين لكل صبية</h1>
                <h1 class="h3  mb-0 folot-left headerTitle mt-2" style="font-size: 30px;">بكبسة زر ولباب البيت</h1>
                <h1 class="h3  mb-0 folot-left headerTitle mt-6" style="font-size: 25px;">ترقبي لتوصيّ أحلى الموديلات</h1>
            </div>
        </div>
    </div>

    <!-- Split section: Map + Contact form-->
    <div class="container rtl" style="text-align: right;">
        <div class="row no-gutters justify-content-center">
            <div class="col-lg-6 justify-content-center row w-50">
                <img style="" class="for-contac-image w-50" src="{{asset("/assets/front-end/img/icon.svg")}}" alt="">
            </div>
            <div class="col-lg-6 for-send-message px-4 px-xl-5  box-shadow-sm">                
                    <form id="contact" action="{{route('contact.store')}}" method="POST">
                        @csrf
                        <div class="row">
                          <div class="col-sm-6">
                              <div class="form-group">
                                <label >الاسم الكامل</label>
                                <input class="form-control name" name="name" type="text" placeholder="الاسم الكامل" required>

                              </div>
                            </div>
                          <div class="col-sm-6">
                              <div class="form-group">
                                <label for="cf-email">البريد الاكتروني</label>
                                <input class="form-control email" name="email" type="email" placeholder="البريد الاكتروني" required >

                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label for="cf-phone">رقم الهاتف</label>
                                <input class="form-control mobile_number"  type="text" name="mobile_number" placeholder="{{\App\CPU\translate('رقم الاتصال')}}" required>

                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label for="cf-subject">العنوان</label>
                                <input class="form-control subject" type="text" name="subject"  placeholder="{{\App\CPU\translate('العنوان')}}" required>

                              </div>
                            </div>
                             <div class="col-md-12">
                            <div class="form-group">
                              <label for="cf-message">الرسالة</label>
                              <textarea class="form-control message" name="message"  rows="6" required></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="">
                          <button class="btn btn-primary" type="submit">إرسال</button>
                      </div>
                    </form>
            </div>
        </div>
</div>--}}

@php($user = auth('customer')->user())
<div class="">
  <div class="rtl">
        <div class="">
          <div class="pt-10 text-center mb-2">                                
              <h1 class="mb-0 headerTitle mt-6" style="font-size: 25px;">تواصلي معنا</h1>
          </div>
        </div>
    </div>

    <!-- Split section: Map + Contact form-->

        <div class="rtl grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-2 container max-w-7xl mx-auto px-6 lg:px-8 ">
            <div class="flex flex-center">
                <img  class="for-contac-image lg:w-[45%] w-[30%]" src="{{asset("/assets/front-end/img/icon.svg")}}" alt="">
            </div>
            <div class=" my-16">              
                    <form class="mt-3" id="contact" action="{{route('contact.store')}}" method="POST">
                        @csrf
                        
                          <div class=" gap-2.5 gap-y-4 grid grid-cols-1 lg:grid-cols-2 md:grid-cols-2 xl:grid-cols-2">
                              <div class="col-span-2 flex flex-col lg:col-span-1 md:col-span-1 w-full xl:col-span-1">
                                <label class="mb-1">الاسم الكامل</label>
                                <input class="h-11 name px-3 w-full rounded name border border-[#9A92CC] focus:border-[#CC9933] focus:outline-none" name="name" type="text" value="{{$user != null ? $user->f_name .' '.$user->l_name:''}}" placeholder="الاسم الكامل" required>
                              </div>
                          
                          <div class="col-span-2 flex flex-col lg:col-span-1 md:col-span-1 w-full xl:col-span-1">                              
                                <label class="mb-1" for="cf-email">البريد الاكتروني</label>
                                <input class="h-11 name px-3 w-full rounded email border border-[#9A92CC] focus:border-[#CC9933] focus:outline-none" name="email" type="email" value="{{$user != null ? $user->email:''}}" placeholder="البريد الاكتروني" required >
                            </div>
                            <div class="col-span-2 flex flex-col lg:col-span-1 md:col-span-1 w-full xl:col-span-1">
                                <label class="mb-1" for="cf-phone">رقم الهاتف</label>
                                <input class="h-11 name px-3 w-full rounded mobile_number border border-[#9A92CC] focus:border-[#CC9933] focus:outline-none"  type="text" name="mobile_number" value="{{$user != null ? $user->phone:''}}" placeholder="{{\App\CPU\translate('رقم الاتصال')}}" required>
                            </div>
                            <div class="col-span-2 flex flex-col lg:col-span-1 md:col-span-1 w-full xl:col-span-1">
                                <label class="mb-1" for="cf-subject">العنوان</label>
                                <input class="h-11 name px-3 w-full rounded subject border border-[#9A92CC] focus:border-[#CC9933] focus:outline-none" type="text" name="subject" value="{{$user != null ? $user->street_address:''}}" placeholder="{{\App\CPU\translate('العنوان')}}" required>
                            </div>
                             <div class="flex flex-col w-full col-span-2">
                              <label class="mb-1" for="cf-message">الرسالة</label>
                              <textarea class="h-11 h-auto message name px-3 py-2 rounded w-full message border border-[#9A92CC] focus:border-[#CC9933] focus:outline-none" name="message"  rows="6" required></textarea>
                          </div>
                        </div>

                        {{-- recaptcha --}}
                            @php($recaptcha = \App\CPU\Helpers::get_business_settings('recaptcha'))
                            @if(isset($recaptcha) && $recaptcha['status'] == 1)
                                <div id="recaptcha_element" style="width: 100%;" data-type="image"></div>
                                <br/>
                            @else
                                <div class="flex flex-row-reverse justify-end  mt-4 p-2 row">
                                    <div class="col-6 pr-0 w-1/3">
                                        <input type="text" class="form-control form-control-lg px-2 h-full text-[12px] mx-2 rounded w-full" name="builder"
                                               value=""
                                               id="builder" required
                                               placeholder="{{\App\CPU\translate('أدخل الرمز الذي تراه في الصورة')}}"
                                               style="border: none" autocomplete="off">
                                    </div>
                                    <div class="w-1/3 rounded" style="background-color: #FFFFFF; border-radius: 5px;">
                                        <img src="{{$builder->inline()}}"
                                             style="width: 100%; border-radius: 4px;"/>
                                    </div>
                                </div>
                            @endif

                        <div class="mt-10">
                          <button class="bg-[#CC9933] h-11 rounded text-white w-[10rem]" type="submit">إرسال</button>
                      </div>
                    </form>
            </div>
        </div>

</div>
  
@endsection


@push('script')

{{-- recaptcha scripts start --}}
    @if(isset($recaptcha) && $recaptcha['status'] == 1)
        <script type="text/javascript">
            var onloadCallback = function () {
                grecaptcha.render('recaptcha_element', {
                    'sitekey': '{{ \App\CPU\Helpers::get_business_settings('recaptcha')['site_key'] }}'
                });
            };
        </script>
        <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async
                defer></script>
        <script>
            $("#contact").on('submit', function (e) {
                var response = grecaptcha.getResponse();

                if (response.length === 0) {
                    e.preventDefault();
                    toastr.error("{{\App\CPU\translate('Please check the recaptcha')}}");
                }
            });
        </script>
    @endif
    {{-- recaptcha scripts end --}}

<script>

 
// $('#contact').on('submit', function (e) {
//             e.preventDefault();

//             $.ajaxSetup({
//                 headers: {
//                     'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
//                 }
//             });

//             $.ajax({
//                 type: "post",
//                 url: '{{route('contact.store')}}',
//                 data: $('#contact').serialize(),
//                 success: function (respons) {

//                     toastr.success('{{\App\CPU\translate('تم إرسال رسالتك بنجاح')}}', {
//                         CloseButton: true,
//                         ProgressBar: true
//                     });
//                     $('#contact').trigger('reset');
//                 }
//             });

//         });

        

</script>
@endpush
    



    


