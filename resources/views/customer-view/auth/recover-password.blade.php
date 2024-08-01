@extends('layouts.front-end.app')
@section('title', \App\CPU\translate('Forgot Password'))
@push('css_or_js')
    <style>
        .text-primary {
            color: {{$web_config['primary_color']}}  !important;
        }
    </style>
@endpush

@section('content')
    @php($verification_by=\App\CPU\Helpers::get_business_settings('forgot_password_verification'))
   {{-- <!-- Page Content-->
    <div class="container py-4 py-lg-5 my-4">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <h2 class="h3 mb-4">{{\App\CPU\translate('Forgot your password')}}?</h2>
                <p class="font-size-md">{{\App\CPU\translate('Change your password in three easy steps. This helps to keep your new password secure')}}
                    .</p>
                @if($verification_by=='email')
                    <ol class="list-unstyled font-size-md">
                        <li><span
                                class="text-primary mr-2">{{\App\CPU\translate('1')}}.</span>{{\App\CPU\translate('Fill in your email address below')}}
                            .
                        </li>
                        <li><span
                                class="text-primary mr-2">{{\App\CPU\translate('2')}}.</span>{{\App\CPU\translate('We will email you a temporary code')}}
                            .
                        </li>
                        <li><span
                                class="text-primary mr-2">{{\App\CPU\translate('3')}}.</span>{{\App\CPU\translate('Use the code to change your password on our secure website')}}
                            .
                        </li>
                    </ol>
                    <div class="card py-2 mt-4">
                        <form class="card-body needs-validation" action="{{route('customer.auth.forgot-password')}}"
                              method="post">
                            @csrf
                            <div class="form-group">
                                <label for="recover-email">{{\App\CPU\translate('Enter your email address')}}</label>
                                <input class="form-control" type="email" name="identity" id="recover-email" required>
                                <div
                                    class="invalid-feedback">{{\App\CPU\translate('Please provide valid email address')}}
                                    .
                                </div>
                            </div>
                            <button class="btn btn-primary"
                                    type="submit">{{\App\CPU\translate('Get new password')}}</button>
                        </form>
                    </div>
                @else
                    <div class="card py-2 mt-4">
                        <form class="card-body needs-validation" action="{{route('customer.auth.forgot-password')}}"
                              method="post">
                            @csrf
                            <div class="form-group">
                                <label for="recover-email">{{\App\CPU\translate('Enter your phone number')}}</label>
                                <input class="form-control" type="text" name="identity" required>
                                <div
                                    class="invalid-feedback">{{\App\CPU\translate('Please provide valid phone number')}}
                                </div>
                            </div>
                            <button class="btn btn-primary"
                                    type="submit">{{\App\CPU\translate('proceed')}}</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>--}}



@if($verification_by=='email')
<div class="
            flex
            items-end
            justify-center
            min-h-screen
            pt-4
            px-4
            pb-20
            text-center
            sm:block sm:p-0
          ">
    <div class="
                modal-con
                relative
                inline-block
                align-bottom
                bg-white
                rounded-lg
                px-4
                pt-5
                pb-4
                text-left
                overflow-hidden
                
                transform
                transition-all
                sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6
                rounded-20px
                mx-auto
              ">
          <div>
           
            <div class="
                    mx-auto
                    flex
                    items-center
                    justify-center
                    h-12
                    w-12
                    rounded-full
                  ">
              <img class="pb-2" src="{{asset('assets/front-end/icons/Logo.svg')}}" alt="" />
            </div>
          </div>
          <p class="text-center my-3 text-[18px] font-bold">
            إعادة تعيين كلمة المرور
          </p>

          <form class="space-y-2 flex flex-col items-center" action="{{route('customer.auth.forgot-password')}}"
                              method="post">
                            @csrf
            <div class="py-4 w-3/4">
              <label class="
                      block
                      text-xs
                      md:text-[14px]
                      font-medium
                      text-right text-[#201A3C]
                      pr-1
                      pb-1
                    ">
               الأيميل
              </label>
              <div>
                <input id="text" type="email" autocomplete="current-text"  name="identity" id="recover-email" required
                class="
                bg-white border border-[#9A92CC] focus:border-[#CC9933] focus:outline-none font-medium inline-flex items-center justify-center px-3 py-3 rounded-[10px] shadow-sm text-[#201A3C] text-[17px] w-full
                      " />
              </div>
            </div>
            <button type="submit" class="
                    w-3/4
                    inline-flex
                    items-center
                    justify-center
                    px-16
                    md:px-[40px]
                    py-3
                    pt-4
                    border border-[#9A92CC]
                    shadow-sm
                    font-bold
                    rounded-md
                    text-white
                    bg-[#201A3C]
                    hover:bg-[#CC9933]
                    rounded-[10px]
                    text-[14px]
                    md:text-[16px]
                  ">
               إعادة تعيين كلمة المرور
            </button>
          </form>
        </div>
</div>

@else



<div class="
            flex
            items-end
            justify-center
            min-h-screen
            pt-4
            px-4
            pb-20
            text-center
            sm:block sm:p-0
          ">
    <div class="
                modal-con
                relative
                inline-block
                align-bottom
                bg-white
                rounded-lg
                px-4
                pt-5
                pb-4
                text-left
                overflow-hidden
                
                transform
                transition-all
                sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6
                rounded-20px
                mx-auto
              ">
          <div>
           
            <div class="
                    mx-auto
                    flex
                    items-center
                    justify-center
                    h-12
                    w-12
                    rounded-full
                  ">
              <img class="pb-2" src="{{asset('assets/front-end/icons/Logo.svg')}}" alt="" />
            </div>
          </div>
          <p class="text-center my-3 text-[18px] font-bold">
            اعادة تعين كلمة المرور
          </p>

          <form class="space-y-2 flex flex-col items-center" action="{{route('customer.auth.forgot-password')}}"
                              method="post">
            <div class="py-4 w-3/4">
              <label class="
                      block
                      text-xs
                      md:text-[14px]
                      font-medium
                      text-right text-[#201A3C]
                      pr-1
                      pb-1
                    ">
                رقم الهاتف
              </label>
              <div>
                <input id="text" name="identity" type="text" autocomplete="current-text" required class="
                bg-white border border-[#9A92CC] focus:border-[#CC9933] focus:outline-none font-medium inline-flex items-center justify-center px-3 py-3 rounded-[10px] shadow-sm text-[#201A3C] text-[17px] w-full
                      " />
              </div>
            </div>
            <button type="submit" class="
        
                    w-3/4
                    inline-flex
                    items-center
                    justify-center
                    px-16
                    md:px-[40px]
                    py-3
                    pt-4
                    border border-[#9A92CC]
                    shadow-sm
                    font-bold
                    rounded-md
                    text-white
                    bg-[#201A3C]
                    hover:bg-[#CC9933]
                    rounded-[10px]
                    text-[14px]
                    md:text-[16px]
                  ">
               اعادة تعين كلمة المرور
            </button>
          </form>
        </div>
</div>
@endif









 
@endsection
