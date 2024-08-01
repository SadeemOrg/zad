@extends('layouts.front-end.app')
@section('title', \App\CPU\translate('Login'))
@push('css_or_js')
    <style>
        .password-toggle-btn .custom-control-input:checked ~ .password-toggle-indicator {
            color: {{$web_config['primary_color']}};
        }

        .for-no-account {
            margin: auto;
            text-align: center;
        }
    </style>
@endpush
@section('content')
    


<div class="py-5 relative">
    <div class="container max-w-7xl mx-auto px-6 lg:px-8 ">
        <ul class="list-reset breadcrumbs flex flex-row-reverse font-shamelnormal text-[16px]">
            <li><a >الرئيسية</a></li>
            <li class="px-2">/</li>
            <li > تسجيل الدخول</li>
        </ul>
    </div>
 </div>
  
   <div class="max-w-7xl mx-auto container sm:px-6 lg:px-8">
      <div class="relative mx-6 sm:mx-0">         
         <div class="relative flex flex-col align-bottom bg-white px-3 md:px-20 pb-4 text-left overflow-hidden transform transition-all sm:my-0 sm:align-middle sm:max-w-xl sm:w-full sm:px-6 rounded-20px mx-auto">
            <div>
               <div class="flex flex-col justify-start items-center mt-4">
                  <div class="flex flex-row justify-cener mt-16 mb-8"><button type="button" class="inline-flex items-center px-6 py-3 pt-4 text-[10px] md:text-[15px] font-bold rounded-md rounded-[10px] hover:text-[#CC9933]" onclick="location.href='{{route('customer.auth.register')}}'"> تسجيل كعضوة جديدة </button><button type="button" class="inline-flex items-center px-6 py-3 pt-4 border border-transparent text-[10px] md:text-[15px] font-bolds rounded-md shadow-sm text-white bg-[#CC9933] focus:ring-2 focus:ring-offset-2 rounded-[10px]" > تسجيل الدخول الى زاد </button></div>
                 
                        
                  <button onclick="location.href='{{route('customer.auth.service-login', 'facebook')}}'" type="button" class="w-full font-bold inline-flex items-center justify-center px-10 md:px-[68px] py-3 pt-4 border border-[#9A92CC] shadow-sm text-[#201A3C] rounded-md bg-white hover:bg-[#CC9933] hover:text-white rounded-[10px] text-[12px] md:text-[14px] mb-4">
                     تسجيل الدخول بواسطة فيس بوك <!-- Heroicon name: solid/mail -->
                     <img class="pl-2 pb-1" src="{{asset('assets/front-end/icons/FaceBookIcon.svg')}}" alt="" />

                  </button>
                  {{--<button type="button" class="w-full font-bold inline-flex items-center justify-center px-11 md:px-[86px] py-3 border border-[#9A92CC] shadow-sm text-[#201A3C] font-medium rounded-md bg-white hover:bg-[#CC9933] hover:text-white rounded-[10px] text-[14px] md:text-[14px] mb-4">
                     تسجيل الدخول بواسطة أبل <!-- Heroicon name: solid/mail -->
                     <img class="pl-2 pb-1" src="{{asset('assets/front-end/icons/AppleIcon.svg')}}" alt="" />

                  </button>--}}
                  <button onclick="location.href='{{route('customer.auth.service-login', 'google')}}'"  type="button" class="w-full font-bold inline-flex items-center justify-center px-12 md:px-[75px] py-3 border border-[#9A92CC] shadow-sm text-[#201A3C] font-medium rounded-md bg-white hover:bg-[#CC9933] hover:text-white rounded-[10px] text-[12px] md:text-[14px]">
                     تسجيل الدخول بواسطة جوجل <!-- Heroicon name: solid/mail -->
                     <img class="pl-2 pb-1" src="{{asset('assets/front-end/icons/GoogleIcon.svg')}}" alt="" />

                  </button>
               </div>
            </div>
            <div class="flex flex-row justify-between items-center pb-5 pt-9 max-w-[250px] sm:max-w-[290px] md:max-w-[370px] w-full m-auto">
                <div class="border-b-2 border-[#CDCCD2] w-[40%]"></div>
                <span class="">او</span>
                <div class="border-b-2 border-[#CDCCD2] w-[40%]"></div>
            </div>
            <form id="login-form" class="space-y-2 flex flex-col items-center" action="{{route('customer.auth.login')}}" method="post">
            @csrf
                       <div class="mt-1 w-full">
                  <label class="font-bold block text-xs md:text-sm text-right font-medium text-[#201A3C] mt-12 sm:mt-0"> عنوان البريد الالكتروني </label>
                  <div class="mt-1"><input id="si-email" name="user_id" type="email" autocomplete="email" required="" class="inline-flex items-center justify-center w-full px-3 py-3 border border-[#9A92CC] shadow-sm text-[#201A3C] font-medium bg-white rounded-[10px] text-[17px] focus:border-[#CC9933] focus:outline-none"></div>
               </div>
               <div class="pb-5 pt-2 w-full">
                  <label class="font-bold block text-xs md:text-sm font-medium text-right text-[#201A3C] pr-1 pb-1"> كلمة المرور </label>
                  <div><input id="si-password" name="password"  type="password" autocomplete="current-password" required="" class="inline-flex items-center justify-center text-left w-full px-3 py-3 border border-[#9A92CC] shadow-sm text-[#201A3C] font-medium bg-white rounded-[10px] text-[17px] focus:border-[#CC9933] focus:outline-none"></div>
               </div>
               <button type="submit" class="w-full inline-flex items-center justify-center px-12 md:px-[120px] py-3 pt-4 border border-[#9A92CC] shadow-sm font-bold rounded-md text-white bg-[#201A3C] hover:bg-[#CC9933] rounded-[10px] text-[14px] md:text-[16px]"> تسجيل الدخول </button><button onclick="location.href='{{route('customer.auth.recover-password')}}'" type="button" class="text-[#CC9933] text-sm font-bold pt-4"> هل نسيت كلمة المرور؟ </button>
            </form>
         </div>
      </div>
   </div>
   

@endsection

@push('script')
       <script>
        $('#sign-in-form').submit(function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post({
                url: '{{route('customer.auth.login')}}',
                dataType: 'json',
                data: $('#sign-in-form').serialize(),
                beforeSend: function () {
                    $('#loading').show();
                },
                success: function (data) {
                    if (data.errors) {
                        for (var i = 0; i < data.errors.length; i++) {
                            toastr.error(data.errors[i].message, {
                                CloseButton: true,
                                ProgressBar: true
                            });
                        }
                    } else {
                        toastr.success(data.message, {
                            CloseButton: true,
                            ProgressBar: true
                        });
                        setInterval(function () {
                            location.href = data.url;
                        }, 2000);
                    }
                },
                complete: function () {
                    $('#loading').hide();
                },
                error: function () {
                    toastr.error('Credentials do not match or account has been suspended.', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            });
        });
    </script>
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
            $("#form-id").on('submit', function (e) {
                var response = grecaptcha.getResponse();

                if (response.length === 0) {
                    e.preventDefault();
                    toastr.error("{{\App\CPU\translate('Please check the recaptcha')}}");
                }
            });
        </script>
    @endif
    {{-- recaptcha scripts end --}}
@endpush
