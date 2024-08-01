@extends('layouts.front-end.app')

@section('title', \App\CPU\translate('Reset Password'))

@push('css_or_js')
    <style>
        .text-primary{
            color: {{$web_config['primary_color']}} !important;
        }
    </style>
@endpush

@section('content')
    {{--<div class="container py-4 py-lg-5 my-4">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <h2 class="h3 mb-4">{{\App\CPU\translate('Reset your password')}}</h2>
                <p class="font-size-md">{{\App\CPU\translate('Change your password in two easy steps. This helps to keep your new password secure')}}.</p>
                <ol class="list-unstyled font-size-md">
                    <li><span class="text-primary mr-2">{{\App\CPU\translate('1')}}.</span>{{\App\CPU\translate('New Password')}}.</li>
                    <li><span class="text-primary mr-2">{{\App\CPU\translate('2')}}.</span>{{\App\CPU\translate('Confirm Password')}}.</li>
                </ol>
                <div class="card py-2 mt-4">
                    <form class="card-body needs-validation" novalidate method="POST"
                          action="{{request('customer.auth.password-recovery')}}">
                        @csrf
                        <div class="form-group" style="display: none">
                            <input type="text" name="reset_token" value="{{$token}}" required>
                        </div>

                        <div class="form-group">
                                <label for="si-password">{{\App\CPU\translate('New')}}{{\App\CPU\translate('password')}}</label>
                                <div class="password-toggle">
                                    <input class="form-control" name="password" type="password" id="si-password"
                                           required>
                                    <label class="password-toggle-btn">
                                        <input class="custom-control-input" type="checkbox"><i
                                            class="czi-eye password-toggle-indicator"></i><span
                                            class="sr-only">{{\App\CPU\translate('Show')}} {{\App\CPU\translate('password')}} </span>
                                    </label>
                                    <div class="invalid-feedback">{{\App\CPU\translate('Please provide valid password')}}.</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="si-password">{{\App\CPU\translate('confirm_password')}}</label>
                                <div class="password-toggle">
                                    <input class="form-control" name="confirm_password" type="password" id="si-password"
                                           required>
                                    <label class="password-toggle-btn">
                                        <input class="custom-control-input" type="checkbox"><i
                                            class="czi-eye password-toggle-indicator"></i><span
                                            class="sr-only">{{\App\CPU\translate('Show')}} {{\App\CPU\translate('password')}} </span>
                                    </label>
                                    <div class="invalid-feedback">{{\App\CPU\translate('Please provide valid password')}}.</div>
                                </div>
                            </div>

                        <button class="btn btn-primary" type="submit">{{\App\CPU\translate('Reset password')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
--}}


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
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

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
          <p class="text-center my-3 text-[18px] font-bold">اعادة تعين كلمة المرور</p>

          <form class="space-y-2 flex flex-col items-center"  novalidate method="POST"
                          action="{{request('customer.auth.password-recovery')}}">
                        @csrf

                        <div class="form-group" style="display: none">
                            <input type="text" name="reset_token" value="{{$token}}" required>
                        </div>


            <div class="py-2 w-3/4">
              <label class="
                      block
                      text-xs
                      md:text-sm
                      font-medium
                      text-right text-[#201A3C]
                      pr-1
                      pb-1
                    ">
                كلمة مرور جديدة
              </label>
              <div>
                <input name="password" type="password" autocomplete="current-password" id="si-password" required
                     class="
                     bg-white border border-[#9A92CC] focus:border-[#CC9933] focus:outline-none font-medium inline-flex items-center justify-center px-3 py-3 rounded-[10px] shadow-sm text-[#201A3C] text-[17px] w-full
                      " />
              </div>
            </div>
            <div class="pb-4 w-3/4">
              <label class="
                      block
                      text-xs
                      md:text-sm
                      font-medium
                      text-right text-[#201A3C]
                      pr-1
                      pb-1
                    ">
                تأكيد كلمة المرور
              </label>
              <div>
                <input id="si-password" name="confirm_password" type="password" autocomplete="current-password" required class="
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
                    md:px-[80px]
                    py-3
                    pt-4
                    border border-[#9A92CC]
                    shadow-sm
                    font-bold
                    rounded-md
                    text-white
                    bg-[#201A3C]
                    hover:bg-[#CC9933]
                    rounded-[20px]
                    text-[12px]
                    md:text-[14px]
                  ">
               اعادة تعين كلمة المرور
            </button>
          </form>
        </div>

</div>
@endsection

@push('script')

@endpush
