@extends('layouts.front-end.app')
@section('title', \App\CPU\translate('تفعيل الحساب'))

@section('content')
    


<div class="py-5 relative">
    <div class="container max-w-7xl mx-auto px-6 lg:px-8 ">
        <ul class="list-reset breadcrumbs flex flex-row-reverse font-shamelnormal text-[16px]">
            <li><a class="hover:text-[#CC9933]" href="{{route('home')}}">الرئيسية</a></li>
            <li class="px-2">/</li>
            <li>تفعيل الحساب</li>
        </ul>
    </div>
</div>
  
<div class="max-w-7xl mx-auto container sm:px-6 lg:px-8 my-16 mb-20">
    <div class="mx-auto max-w-[450px] text-center px-5 sm:px-0">
        <img class="m-auto" src="{{asset('assets/front-end/img/verification-image.png')}}" alt="verification image">
        <h3 class="text-[32px] text-[#201A3C] font-shamelBold mt-8 mb-5 rtl">تأكيد طلب الشراء</h3>
        <p class="text-[#201A3C] sm:text-[18px] mb-7 leading-8 rtl">
          لتأ:يد عملية الشراء يرجى ادخال الرمز المكون من 4 أرقام المرسال إلى رقم هاتف المنتهي ب <span>23</span> 
        </p>
        
            <form class="verification-form" action="">
                <div class="flex justify-between px-5 sm:px-9">
                    <div class="relative input-wrap">
                        <input name="val-1" maxlength="1" class="h-[84px] max-w-[63px] sm:h-[104px] sm:max-w-[83px] pt-5 pb-3 border border-[#201A3C] border-[2px] rounded-xl text-center sm:text-[32px] text-[20px] font-shamelBold text-[#201A3C] focus:border-[#CC9933] outline-none focus:text-[#CC9933]" type="text">
                        <span class="bottom-line sm:w-[65px] w-[40px] h-[2px] bottom-[17px]"></span>
                    </div>                    
                    <div class="relative input-wrap">
                        <input name="val-2" maxlength="1" class="h-[84px] max-w-[63px] sm:h-[104px] sm:max-w-[83px] pt-5 pb-3 border border-[#201A3C] border-[2px] rounded-xl text-center sm:text-[32px] text-[20px] font-shamelBold text-[#201A3C] focus:border-[#CC9933] outline-none focus:text-[#CC9933]" type="text">
                        <span class="bottom-line sm:w-[65px] w-[40px] h-[2px] bottom-[17px]"></span>
                    </div>
                    <div class="relative input-wrap">
                        <input name="val-3" maxlength="1" class="h-[84px] max-w-[63px] sm:h-[104px] sm:max-w-[83px] pt-5 pb-3 border border-[#201A3C] border-[2px] rounded-xl text-center sm:text-[32px] text-[20px] font-shamelBold text-[#201A3C] focus:border-[#CC9933] outline-none focus:text-[#CC9933]" type="text">
                        <span class="bottom-line sm:w-[65px] w-[40px] h-[2px] bottom-[17px]"></span>
                    </div>
                    <div class="relative input-wrap">
                        <input name="val-4" maxlength="1" class="h-[84px] max-w-[63px] sm:h-[104px] sm:max-w-[83px] pt-5 pb-3 border border-[#201A3C] border-[2px] rounded-xl text-center sm:text-[32px] text-[20px] font-shamelBold text-[#201A3C] focus:border-[#CC9933] outline-none focus:text-[#CC9933]" type="text">
                        <span class="bottom-line sm:w-[65px] w-[40px] h-[2px] bottom-[17px]"></span>
                    </div>
                    
                </div>
                <button type="submit" class="rtl text-[21px] font-shamelBold w-full mt-14 my-10 h-[75px] duration-300 px-3 pt-3 pb-2 border border-transparent font-medium text-white bg-[#201A3C] hover:bg-[#CC9933] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 rounded-[20px]">
                    تأكيد الطلب
                </button>
            </form>
            <p class="text-[21px] font-shamelBold rtl">
                لم يتم ارسال الكود؟
                <a class="text-[#CC9933] font-shamelBold " href="#">اعادة الارسال</a>
            </p>
        
    </div>
</div>
   

@endsection

@push('script')
<script>
    $( document ).ready(function() {
        $(".input-wrap input").keyup(function () {
            if (this.value.length == this.maxLength) {                
                $(this).parent('.input-wrap').next('.input-wrap').find('input').focus();
            }
        });
    });
</script>



@endpush


