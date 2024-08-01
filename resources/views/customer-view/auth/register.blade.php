@extends('layouts.front-end.app')

@section('title', \App\CPU\translate('Register'))

@push('css_or_js')
<style>
    @media (max-width: 500px) {
        #sign_in {
            margin-top: -23% !important;
        }

    }
</style>
@endpush

@section('content')

<div class="py-5 relative">
    <div class="container max-w-7xl mx-auto px-6 lg:px-8 ">
        <ul class="list-reset breadcrumbs flex flex-row-reverse font-shamelnormal text-[16px]">
            <li><a >الرئيسية</a></li>
            <li class="px-2">/</li>
            <li > تسجيل كعضوة جديدة</li>
        </ul>
    </div>
 </div>
<div class="relative mx-6 sm:mx-0">    
    <div class="relative flex flex-col align-bottom bg-white px-3 md:px-20 pb-4 text-left overflow-hidden transform transition-all sm:my-0 sm:align-middle sm:max-w-xl sm:w-full sm:px-6 rounded-20px mx-auto">
        <div>
            <div class="flex flex-col justify-start items-center mt-4">
                <div class="flex flex-row w-full justify-cener  mt-16 mb-8">
                    <button type="button" class="w-[50%] text-center mr-3 px-6 py-3 pt-4 text-[12px] md:text-[14px] font-bolds rounded-md shadow-sm text-white bg-[#CC9933] focus:ring-2 focus:ring-offset-2 rounded-[10px] font-bold"> تسجيل كعضو جديد </button>
                    <button type="button" class="w-[50%] text-center px-6 py-3 pt-4 text-[12px] md:text-[15px] font-bold rounded-md shadow-sm rounded-[10px] hover:text-[#CC9933] font-bold" onclick="location.href='{{route('customer.auth.login')}}'"> تسجيل الدخول الى زاد </button></div>
                <button onclick="location.href='{{route('customer.auth.service-login', 'facebook')}}'" type="button" class="inline-flex w-full items-center justify-center px-10 md:px-[68px] py-3 pt-4 border border-[#9A92CC] shadow-sm text-[#201A3C] font-bold rounded-md bg-white hover:bg-[#CC9933] hover:text-white rounded-[10px] text-[12px] md:text-[14px] mb-4">
                    تسجيل الدخول بواسطة فيس بوك
                    <!-- Heroicon name: solid/mail -->
                    <img class="pl-2 pb-1" src="{{asset('assets/front-end/icons/FaceBookIcon.svg')}}" alt="" />

                </button>
                {{--<button type="button" class="inline-flex w-full items-center justify-center px-11 md:px-[86px] py-3 border border-[#9A92CC] shadow-sm text-[#201A3C] font-bold rounded-md bg-white hover:bg-[#CC9933] hover:text-white rounded-[10px] text-[14px] md:text-[14px] mb-4">
                    تسجيل الدخول بواسطة أبل
                    <!-- Heroicon name: solid/mail -->
                    <img class="pl-2 pb-1" src="{{asset('assets/front-end/icons/AppleIcon.svg')}}" alt="" />

                </button>--}}
                <button onclick="location.href='{{route('customer.auth.service-login', 'google')}}'" type="button" class="inline-flex w-full items-center justify-center px-12 md:px-[75px] py-3 border border-[#9A92CC] shadow-sm text-[#201A3C] font-bold rounded-md bg-white hover:bg-[#CC9933] hover:text-white rounded-[10px] text-[12px] md:text-[14px]">
                    تسجيل الدخول بواسطة جوجل
                    <!-- Heroicon name: solid/mail -->
                    <img class="pl-2 pb-1" src="{{asset('assets/front-end/icons/GoogleIcon.svg')}}" alt="" />

                </button>
            </div>
        </div>
        <div class="flex flex-row justify-between items-center pb-5 pt-9 max-w-[250px] sm:max-w-[290px] md:max-w-[370px] w-full m-auto">
            <div class="border-b-2 border-[#CDCCD2] w-[40%]"></div>
            <span class="">او</span>
            <div class="border-b-2 border-[#CDCCD2] w-[40%]"></div>
        </div>
        <form id="register-form" class="space-y-2 flex flex-col items-center" action="{{route('customer.auth.register')}}" method="post">
            @csrf
            <div class="mt-1 pb-3 w-full">
                <label class="block text-xs md:text-sm text-right font-bold text-[#201A3C]"> الأسم </label>
                <div class="mt-1"><input id="f_name" name="f_name" type="text" autocomplete="f_name" required="" class="inline-flex items-center justify-center w-full px-3 text-right py-3 border border-[#9A92CC] shadow-sm text-[#201A3C] font-medium bg-white rounded-[10px] text-[17px] focus:border-[#CC9933] focus:outline-none"></div>
            </div>


            <div class="mt-1 pb-3 w-full">
                <label class="block text-xs md:text-sm text-right font-bold text-[#201A3C]"> عنوان البريد الالكتروني </label>
                <div class="mt-1"><input name="email" type="email" autocomplete="email" required="" class="inline-flex items-left justify-center w-full px-3 text-left py-3 border border-[#9A92CC] shadow-sm text-[#201A3C] font-medium bg-white rounded-[10px] text-[17px] focus:border-[#CC9933] focus:outline-none"></div>
            </div>

            <div class="pb-3 w-full">
                <label for="phone-number" class="block text-xs md:text-sm font-bold text-right text-[#201A3C] pr-1 pb-1">رقم الهاتف</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 flex items-center">
                        <label for="country" class="sr-only">Country</label>
                        <select id="country" name="country" autocomplete="country" class="focus:ring-indigo-500 focus:border-indigo-500 h-full py-0 pl-3 pr-7 border-transparent bg-transparent text-black sm:text-base font-bold rounded-md hidden md:flex">
                            <option>+972</option>
                            <option>+970</option>
                            <option>+666</option>
                        </select>
                    </div>
                    <input type="text" name="phone" id="phone-number"  required class="inline-flex items-left justify-center text-center w-full px-3 text-left py-3 pt-4 border border-[#9A92CC] focus:border-[#CC9933] focus:outline-none shadow-sm text-[#201A3C] font-medium bg-white rounded-[10px] text-[14px]" placeholder="+972529112233">
                </div>
            </div>
           
            <div class="pb-3 w-full">
                <label class="block text-xs md:text-sm font-bold text-right text-[#201A3C] pr-1 pb-1"> كلمة المرور </label>
                <div><input  name="password" type="password" autocomplete="current-password" required="" class="inline-flex items-center justify-center text-left w-full px-3 py-3 border border-[#9A92CC] shadow-sm text-[#201A3C] font-medium bg-white rounded-[10px] text-[17px] focus:border-[#CC9933] focus:outline-none"></div>
            </div>
            <div class="pb-3 w-full">
                <label class="block text-xs md:text-sm font-bold text-right text-[#201A3C] pr-1 pb-1"> تأكيد كلمة المرور </label>
                <div><input  name="con_password" type="password" autocomplete="current-password" required="" class="inline-flex items-center justify-center text-left w-full px-3 py-3 border border-[#9A92CC] shadow-sm text-[#201A3C] font-medium bg-white rounded-[10px] text-[17px] focus:border-[#CC9933] focus:outline-none"></div>
            </div>
            <button type="submit" class="inline-flex items-center w-full justify-center px-12 md:px-[120px] py-3 pt-4 border border-[#9A92CC] shadow-sm font-bold rounded-md text-white bg-[#201A3C] hover:bg-[#CC9933] rounded-[10px] text-[14px] md:text-[16px]"> تسجيل  </button><button type="button" onclick="location.href='{{route('customer.auth.recover-password')}}'" class="text-[#CC9933] text-sm font-bold pt-4"> هل نسيت كلمة المرور؟ </button>
        </form>
    </div>
</div>
@endsection

@push('script')
<script>
    $('#inputCheckd').change(function() {
        // console.log('jell');
        if ($(this).is(':checked')) {
            $('#sign-up').removeAttr('disabled');
        } else {
            $('#sign-up').attr('disabled', 'disabled');
        }

    });
    /*$('#sign-up-form').submit(function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.post({
            url: '{{route('customer.auth.register')}}',
            dataType: 'json',
            data: $('#sign-up-form').serialize(),
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
              console.log(response)
            }
        });
    });*/
</script>
@endpush