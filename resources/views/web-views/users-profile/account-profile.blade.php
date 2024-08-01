@extends('layouts.front-end.app')

@section('title',auth('customer')->user()->f_name.' '.auth('customer')->user()->l_name)

@push('css_or_js')
    <style>
        .headerTitle {
            font-size: 24px;
            font-weight: 600;
            margin-top: 1rem;
        }

        /* .border:hover {
            border: 3px solid{{$web_config['primary_color']}};
            margin-bottom: 5px;
            margin-top: -6px;
        } */

        body {
            font-family: 'Titillium Web', sans-serif
        }


        .footer span {
            font-size: 12px
        }

        .product-qty span {
            font-size: 12px;
            color: #6A6A6A;
        }

        .spandHeadO {
            color: {{$web_config['primary_color']}};
            font-weight: 400;
            font-size: 13px;

        }

        .spandHeadO:hover {
            color: {{$web_config['primary_color']}};
            font-weight: 400;
            font-size: 13px;

        }

        .font-name {
            font-weight: 600;
            margin-top: 0px !important;
            margin-bottom: 0;
            font-size: 15px;
            color: #030303;
        }

        .font-nameA {
            font-weight: 600;
            margin-top: 0px;
            margin-bottom: 7px !important;
            font-size: 17px;
            color: #030303;
        }

        label {
            font-size: 16px;
        }

        .photoHeader {
            margin- {{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 1rem;
            margin- {{Session::get('direction') === "rtl" ? 'left' : 'right'}}: 2rem;
            padding: 13px;
        }

        .card-header {
            border-bottom: none;
        }

        .sidebarL h3:hover + .divider-role {
            border-bottom: 3px solid {{$web_config['primary_color']}}          !important;
            transition: .2s ease-in-out;
        }

        @media (max-width: 350px) {

            .photoHeader {
                margin-left: 0.1px !important;
                margin-right: 0.1px !important;
                padding: 0.1px !important;

            }
        }

        @media (max-width: 600px) {
            .sidebar_heading {
                background: {{$web_config['primary_color']}};
            }

            .sidebar_heading h1 {
                text-align: center;
                color: aliceblue;
                padding-bottom: 17px;
                font-size: 19px;
            }

            .photoHeader {
                margin- {{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 2px !important;
                margin- {{Session::get('direction') === "rtl" ? 'left' : 'right'}}: 1px !important;
                padding: 13px;
            }
        }
    </style>
@endpush

@section('content')


    <div>
        <div class="mx-auto px-4 sm:px-6 lg:max-w-7xl">
            <!-- Start breadcrumb -->
            <div class="flex flex-row-reverse py-10 pb-8">
                <ul class="list-reset breadcrumbs flex flex-row-reverse font-shamelnormal text-[16px]">
                    <li>
                        <a class="hover:text-[#CC9933] duration-200" href="{{route('home')}}">الرئيسية</a>
                    </li>
                    <li class="px-1">/</li>
                    <li>
                        الملف الشخصي    
                    </li>
                </ul>
            </div>
            <!-- End breadcrumb -->
        </div>
   <div class="lg:flex lg:flex-row-reverse flex flex-col mx-auto px-4 my-4 mb-10 sm:px-6 lg:max-w-7xl">   
    
    <div class="lg:basis-1/4 min-w-[300px] lg:block">
         <nav class="bg-[#201A3C] text-white rounded-md overflow-hidden" aria-label="Sidebar">
            

            <a  href="{{route('user-account')}}" class="flex bg-[#CC9933] duration-300 text-[#fff] hover:text-[#fff] justify-between flex-row-reverse px-5 py-3 text-[16px] font-shamelBold rounded-md border-b-2 border-[#393063]" href="#">
               <span class="truncate">الملف الشخصي </span>

               <svg width="11" height="17" viewBox="0 0 11 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.1582 16.1799L10.1582 0.820002C10.1582 0.0931492 9.28049 -0.277135 8.75934 0.244005L1.07932 7.92396C0.763893 8.23939 0.763893 8.76053 1.07932 9.07609L8.75934 16.7561C9.28049 17.2771 10.1582 16.9068 10.1582 16.1799Z" fill="white"></path>
               </svg>
            </a>
           
            <a href="{{route('account-oder') }}" class="flex hover:bg-[#CC9933] duration-300 hover:text-[#fff] justify-between flex-row-reverse px-5 py-3 text-[16px] font-shamelBold border-b-2 border-[#393063]" href="#">
               <span class="truncate">طلباتي </span>
               <svg width="11" height="17" viewBox="0 0 11 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.1582 16.1799L10.1582 0.820002C10.1582 0.0931492 9.28049 -0.277135 8.75934 0.244005L1.07932 7.92396C0.763893 8.23939 0.763893 8.76053 1.07932 9.07609L8.75934 16.7561C9.28049 17.2771 10.1582 16.9068 10.1582 16.1799Z" fill="white"></path>
               </svg>
            </a>
            <a href="{{route('wishlists')}}" class="flex hover:bg-[#CC9933] duration-300 hover:text-[#fff] justify-between flex-row-reverse px-5 py-3 text-[16px] font-shamelBold border-b-2 border-[#393063]" href="#">
               <span class="truncate">المفضلة</span>
               <svg width="11" height="17" viewBox="0 0 11 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.1582 16.1799L10.1582 0.820002C10.1582 0.0931492 9.28049 -0.277135 8.75934 0.244005L1.07932 7.92396C0.763893 8.23939 0.763893 8.76053 1.07932 9.07609L8.75934 16.7561C9.28049 17.2771 10.1582 16.9068 10.1582 16.1799Z" fill="white"></path>
               </svg>
            </a>
            <!--<a class="flex hover:bg-[#CC9933] duration-300 hover:text-[#fff] justify-between flex-row-reverse px-5 py-3 text-[16px] font-shamelBold border-b-2 border-[#393063]" href="#">
               <span class="truncate">عنواني </span>
               <svg width="11" height="17" viewBox="0 0 11 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.1582 16.1799L10.1582 0.820002C10.1582 0.0931492 9.28049 -0.277135 8.75934 0.244005L1.07932 7.92396C0.763893 8.23939 0.763893 8.76053 1.07932 9.07609L8.75934 16.7561C9.28049 17.2771 10.1582 16.9068 10.1582 16.1799Z" fill="white"></path>
               </svg>
            </a>
            <a class="flex justify-between flex-row-reverse px-5 py-3 text-[16px] font-shamelBold border-b-2 border-[#393063]" href="#">
               <span class="truncate hover:text-gold">خدمة العملاء  </span>
               <svg width="11" height="17" viewBox="0 0 11 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.1582 16.1799L10.1582 0.820002C10.1582 0.0931492 9.28049 -0.277135 8.75934 0.244005L1.07932 7.92396C0.763893 8.23939 0.763893 8.76053 1.07932 9.07609L8.75934 16.7561C9.28049 17.2771 10.1582 16.9068 10.1582 16.1799Z" fill="white"></path>
               </svg>
            </a>-->
            <a href="{{route('customer.auth.logout')}}" class="flex hover:bg-[#CC9933] duration-300 hover:text-[#fff] justify-between flex-row-reverse px-5 pl-3 py-3 text-sm font-medium">
               <span> تسيجل خروج </span>
               <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M6.73828 17.6094V19.4062C6.73828 21.3879 8.35038 23 10.332 23H19.3613C21.343 23 22.9551 21.3879 22.9551 19.4062V3.59375C22.9551 1.6121 21.343 0 19.3613 0H10.332C8.35038 0 6.73828 1.6121 6.73828 3.59375V5.39062C6.73828 5.88687 7.14047 6.28906 7.63672 6.28906C8.13297 6.28906 8.53516 5.88687 8.53516 5.39062V3.59375C8.53516 2.60301 9.34129 1.79688 10.332 1.79688H19.3613C20.3521 1.79688 21.1582 2.60301 21.1582 3.59375V19.4062C21.1582 20.397 20.3521 21.2031 19.3613 21.2031H10.332C9.34129 21.2031 8.53516 20.397 8.53516 19.4062V17.6094C8.53516 17.1131 8.13297 16.7109 7.63672 16.7109C7.14047 16.7109 6.73828 17.1131 6.73828 17.6094ZM0.612938 9.95669L2.62477 7.94485C2.97572 7.5939 3.54462 7.5939 3.89539 7.94485C4.24635 8.29563 4.24635 8.86452 3.89539 9.2153L2.46439 10.6465H13.252C13.7482 10.6465 14.1504 11.0487 14.1504 11.5449C14.1504 12.0412 13.7482 12.4434 13.252 12.4434H2.46439L3.89539 13.8745C4.24635 14.2253 4.24635 14.7942 3.89539 15.145C3.71992 15.3205 3.49004 15.4082 3.26017 15.4082C3.03012 15.4082 2.80025 15.3205 2.62477 15.145L0.612938 13.1332C-0.262863 12.2574 -0.262863 10.8325 0.612938 9.95669Z" fill="white"></path>
               </svg>
            </a>
         </nav>
      </div>
    
<div class="lg:basis-3/4">
      <form action="{{route('user-update')}}" method="post"
                              enctype="multipart/form-data">
                              @csrf
         <div class="flex flex-col lg:px-6 lg:pl-0 justify-end items-center lg:items-end">
            <div class="flex flex-row-reverse items-center justify-between w-full py-3 lg:pt-0">
               <p class="text-[#201A3C] text-[21px]"> معلوماتك الشخصية</p>
               <button type="submit" class="duration-300 inline-flex items-center px-5 sm:px-8 pt-3 pb-2 border border-transparent font-medium rounded-md shadow-sm text-white bg-login hover:bg-[#CC9933] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 rounded-[10px]">تعديل</button>
            </div>

            <!-- Address details -->

            
            <div class="sm:flex sm:flex-row-reverse justify-start items-center w-full">
               <div class="mt-1 mb-3 sm:mb-0 w-full sm:w-[50%]"><input id="name" name="f_name" type="name" placeholder="الأسم" required="" class="w-full inline-flex items-center text-right justify-center placeholder-[#201A3C] px-4 py-3 pt-4 border border-[#9A92CC] shadow-sm text-[#201A3C] font-medium bg-white rounded-[15px] text-[16px] focus:border-[#CC9933] focus:outline-none" value="{{$customerDetail['f_name']}}"></div>
               <div class="mt-1 sm:pr-3 w-full sm:w-[50%]"><input id="name" name="l_name" type="name" placeholder="أسم الأسرة" required="" class="w-full inline-flex items-center text-right justify-center placeholder-[#201A3C] px-5 py-3 pt-4 border border-[#9A92CC] shadow-sm text-[#201A3C] font-medium bg-white rounded-[15px] text-[16px] focus:border-[#CC9933] focus:outline-none"  value="{{$customerDetail['l_name']}}"></div>
            </div>
            <div class="sm:flex sm:flex-row-reverse justify-start items-center w-full">
                <div class="mt-3 mb-3 sm:mb-0 w-full sm:w-[50%] text-center lg:text-right"><input id="name" name="email" type="name" placeholder="البريد الألكتروني" required="" class="inline-flex items-center text-left justify-center placeholder-[#201A3C] px-6 w-full py-3 pt-4 border border-[#9A92CC] shadow-sm text-[#201A3C] font-medium bg-white rounded-[15px] text-[16px] focus:border-[#CC9933] focus:outline-none" value="{{$customerDetail['email']}}" disabled>
                </div>
                <div class="mt-3 relative rounded-md shadow-sm sm:pr-3 w-full sm:w-[50%] text-center lg:text-right">
                  <div class="absolute inset-y-0 left-0 flex items-center">
                     <label for="country" class="sr-only">Country</label>
                     <select id="country" name="country" autocomplete="country" class="focus:ring-indigo-500 focus:border-indigo-500 h-full py-0 pl-3 border-transparent bg-transparent text-black sm:text-base font-bold rounded-md flex">
                        <option>+972</option>
                        <option>+970</option>
                        <option>+666</option>
                     </select>
                  </div>
                  <input type="text" name="phone" id="phone-number" placeholder="رقم الهاتف" class="pl-24 inline-flex items-center justify-center text-left px-6 w-full py-3 pt-4 border border-[#9A92CC] focus:border-[#CC9933] focus:outline-none shadow-sm text-[#201A3C] font-medium bg-white rounded-[15px] text-[16px] placeholder-[#201A3C]" value="{{ substr($customerDetail['phone'],4)}}">
                </div>         
            </div>
            <div class="w-full pt-7">
               <p class="text-[#201A3C] text-[21px] text-right"> تفاصيل العنوان</p>               
            </div>
            <div class="mt-3 sm:flex sm:flex-row-reverse justify-start items-center w-full">
               <div class="mt-1 mb-3 sm:mb-0 w-full sm:w-[50%]"><input id="name" name="city" type="name" placeholder="المدينة" required="" class="w-full inline-flex items-center text-right justify-center placeholder-[#201A3C] px-4 py-3 pt-4 border border-[#9A92CC] shadow-sm text-[#201A3C] font-medium bg-white rounded-[15px] text-[16px] focus:border-[#CC9933] focus:outline-none" value="{{$customerDetail['city']}}"></div>
               <div class="mt-1 sm:pr-3 w-full sm:w-[50%]"><input id="name" name="zip" type="number" placeholder="الرمز البريدي" required="" class="w-full inline-flex items-center text-right justify-center placeholder-[#201A3C] px-5 py-3 pt-4 border border-[#9A92CC] shadow-sm text-[#201A3C] font-medium bg-white rounded-[15px] text-[16px] focus:border-[#CC9933] focus:outline-none"  value="{{$customerDetail['zip']}}"></div>
            </div>
            <div class="mt-3 mt-1 w-[100%]"><input id="name" name="street_address" type="name" placeholder="تفاصيل العنوان(شارع-اسم شركة-عنوان)" required="" class="w-full inline-flex items-center text-right justify-center placeholder-[#201A3C] px-4 py-3 pt-4 border border-[#9A92CC] shadow-sm text-[#201A3C] font-medium bg-white rounded-[15px] text-[16px] focus:border-[#CC9933] focus:outline-none" value="{{$customerDetail['street_address']}}"></div>
           
           
            
              
            
            
         </div>
         </form>
      </div>
   </div>
</div>
@endsection

@push('script')
    <script src="{{asset('assets/front-end')}}/vendor/nouislider/distribute/nouislider.min.js"></script>
    <script src="{{asset('assets/back-end/js/croppie.js')}}"></script>
    <script>
        function checkPasswordMatch() {
            var password = $("#password").val();
            var confirmPassword = $("#confirm_password").val();
            $("#message").removeAttr("style");
            $("#message").html("");
            if (confirmPassword == "") {
                $("#message").attr("style", "color:black");
                $("#message").html("{{\App\CPU\translate('Please ReType Password')}}");

            } else if (password == "") {
                $("#message").removeAttr("style");
                $("#message").html("");

            } else if (password != confirmPassword) {
                $("#message").html("{{\App\CPU\translate('Passwords do not match')}}!");
                $("#message").attr("style", "color:red");
            } else if (confirmPassword.length <= 6) {
                $("#message").html("{{\App\CPU\translate('password Must Be 6 Character')}}");
                $("#message").attr("style", "color:red");
            } else {

                $("#message").html("{{\App\CPU\translate('Passwords match')}}.");
                $("#message").attr("style", "color:green");
            }

        }

        $(document).ready(function () {
            $("#confirm_password").keyup(checkPasswordMatch);

        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#files").change(function () {
            readURL(this);
        });

    </script>
@endpush
