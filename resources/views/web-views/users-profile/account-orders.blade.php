@extends('layouts.front-end.app')

@section('title',\App\CPU\translate('My Order List'))

@push('css_or_js')
    <style>
        .widget-categories .accordion-heading > a:hover {
            color: #FFD5A4 !important;
        }

        .widget-categories .accordion-heading > a {
            color: #FFD5A4;
        }

        body {
            font-family: 'Titillium Web', sans-serif
        }

        .card {
            border: none
        }

        .totals tr td {
            font-size: 13px
        }

        .product-qty span {
            font-size: 14px;
            color: #6A6A6A;
        }

        .spandHeadO {
            color: #FFFFFF !important;
            font-weight: 600 !important;
            font-size: 14px;

        }

        .tdBorder {
            border- {{Session::get('direction') === "rtl" ? 'left' : 'right'}}: 1px solid #f7f0f0;
            text-align: center;
        }

        .bodytr {
            text-align: center;
            vertical-align: middle !important;
        }

        .sidebar h3:hover + .divider-role {
            border-bottom: 3px solid {{$web_config['primary_color']}}                                   !important;
            transition: .2s ease-in-out;
        }

        tr td {
            padding: 3px 5px !important;
        }

        td button {
            padding: 3px 13px !important;
        }

        @media (max-width: 600px) {
            .sidebar_heading {
                background: {{$web_config['primary_color']}};
            }

            .orderDate {
                display: none;
            }

            .sidebar_heading h1 {
                text-align: center;
                color: aliceblue;
                padding-bottom: 17px;
                font-size: 19px;
            }
        }
  </style>

@endpush
@section('content')

<div class="mb-20">
   <div class="container max-w-7xl mx-auto sm:px-6 lg:px-8 py-10 pb-8 px-4">
      <div class="flex flex-row-reverse">
         <ul class="list-reset breadcrumbs flex flex-row-reverse font-shamelnormal text-[16px]">
            <li><a class="hover:text-[#CC9933] duration-200" href="{{route('home')}}">الرئيسية</a></li>
            <li class="px-1">/</li>
            <li>طلباتي</li>
         </ul>
      </div>
   </div>
   <div class="lg:flex lg:flex-row-reverse flex flex-col mx-auto px-4 my-4 sm:px-6 lg:max-w-7xl">
      <div class="lg:basis-1/4 min-w-[300px] lg:block">
         <nav class="bg-[#201A3C] text-white rounded-md overflow-hidden" aria-label="Sidebar">
           
            <a  href="{{route('user-account')}}" class="flex hover:bg-[#CC9933] duration-300 hover:text-[#fff] justify-between flex-row-reverse px-5 py-3 text-[16px] font-shamelBold border-b-2 border-[#393063]" href="#">
               <span class="truncate">الملف الشخصي </span>
               <svg width="11" height="17" viewBox="0 0 11 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.1582 16.1799L10.1582 0.820002C10.1582 0.0931492 9.28049 -0.277135 8.75934 0.244005L1.07932 7.92396C0.763893 8.23939 0.763893 8.76053 1.07932 9.07609L8.75934 16.7561C9.28049 17.2771 10.1582 16.9068 10.1582 16.1799Z" fill="white"></path>
               </svg>
            </a>
           
            <a href="{{route('account-oder') }}" class="flex bg-[#CC9933] duration-300 text-[#fff] hover:text-[#fff] duration-300 justify-between flex-row-reverse px-5 py-3 text-[16px] font-shamelBold border-b-2 border-[#393063]" href="#">
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
            <a href="{{route('customer.auth.logout')}}" class="flex hover:bg-[#CC9933] duration-300 hover:text-[#fff] justify-between flex-row-reverse px-5 pl-3 py-3 text-sm font-medium">
               <span> تسيجل خروج </span>
               <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M6.73828 17.6094V19.4062C6.73828 21.3879 8.35038 23 10.332 23H19.3613C21.343 23 22.9551 21.3879 22.9551 19.4062V3.59375C22.9551 1.6121 21.343 0 19.3613 0H10.332C8.35038 0 6.73828 1.6121 6.73828 3.59375V5.39062C6.73828 5.88687 7.14047 6.28906 7.63672 6.28906C8.13297 6.28906 8.53516 5.88687 8.53516 5.39062V3.59375C8.53516 2.60301 9.34129 1.79688 10.332 1.79688H19.3613C20.3521 1.79688 21.1582 2.60301 21.1582 3.59375V19.4062C21.1582 20.397 20.3521 21.2031 19.3613 21.2031H10.332C9.34129 21.2031 8.53516 20.397 8.53516 19.4062V17.6094C8.53516 17.1131 8.13297 16.7109 7.63672 16.7109C7.14047 16.7109 6.73828 17.1131 6.73828 17.6094ZM0.612938 9.95669L2.62477 7.94485C2.97572 7.5939 3.54462 7.5939 3.89539 7.94485C4.24635 8.29563 4.24635 8.86452 3.89539 9.2153L2.46439 10.6465H13.252C13.7482 10.6465 14.1504 11.0487 14.1504 11.5449C14.1504 12.0412 13.7482 12.4434 13.252 12.4434H2.46439L3.89539 13.8745C4.24635 14.2253 4.24635 14.7942 3.89539 15.145C3.71992 15.3205 3.49004 15.4082 3.26017 15.4082C3.03012 15.4082 2.80025 15.3205 2.62477 15.145L0.612938 13.1332C-0.262863 12.2574 -0.262863 10.8325 0.612938 9.95669Z" fill="white"></path>
               </svg>
            </a>
         </nav>
      </div>
      <div class="lg:basis-3/4">
         <div class="px-4 sm:px-6 lg:px-8 h-full">
            <div class="sm:flex sm:items-center"></div>
            <div class="mt-8 lg:mt-0 flex flex-col h-full">
               <div class="-mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8 h-full">
                  <div class="inline-block min-w-full align-middle lg:px-8 lg:pl-0 h-full">
                     <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-0 rounded-md h-full">
                        <table class="min-w-full bg-[#fafafa] px-4 pb-20 h-full" style="border-collapse:separate; border-spacing:0 8px;" cellspacing="0">
                           <thead class="text-right">
                              <tr class="border-b border-[#9A92CC]">
                                 <th scope="col" class="border-b border-[#9A92CC] py-3.5 pl-4 pr-3 text-center text-[17px] text-[#201A3C] sm:pl-6">الحدث</th>
                                 <th scope="col" class="border-b border-[#9A92CC] py-3.5 pl-4 pr-3 text-center text-[17px] text-[#201A3C] sm:pl-6">السعر</th>
                                 <th scope="col" class="border-b border-[#9A92CC] px-3 py-3.5 text-center text-[17px] text-[#201A3C]">تاريخ الطلب</th>
                                 <th scope="col" class="border-b border-[#9A92CC] px-3 py-3.5 text-center text-[17px] text-[#201A3C]">الحالة</th>
                                 <th scope="col" class="border-b border-[#9A92CC] px-3 py-3.5 text-center text-[17px] text-[#201A3C]">الطلب</th>
                                 <!-- <th scope="col" class="border-b border-[#9A92CC] relative py-3.5 pl-3 pr-4 sm:pr-6"><span class="sr-only">Edit</span></th> -->
                              </tr>
                           </thead>
                           <tbody>

                           @foreach($orders as $order)
                              <tr class="bg-white">
                                 <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm text-[#201A3C] sm:pl-6">
                                    <div class="lg:px-0 px-10 sm:px-0 flex flex-row-reverse items-center justify-center">
                                       <img onclick="location.href='{{ route('account-order-details', ['id'=>$order->id]) }}'" 
                                       class="ml-5 cursor-pointer" src="{{asset('assets/front-end/icons/eye 1.svg')}}" alt="" />
                                       @if($order['payment_method']=='cash_on_delivery' && $order['order_status']=='pending')
                                       <img class="cursor-pointer" onclick="route_alert('{{ route('order-cancel',[$order->id]) }}','{{\App\CPU\translate('')}}')"
                                        src="{{asset('assets/front-end/icons/CartDelete.svg')}}" alt="" />
                                        @else
                                        <img class="cursor-pointer" onclick="cancel_message()"
                                        src="{{asset('assets/front-end/icons/CartDelete.svg')}}" alt="" />
                                        @endif

                                    </div>
                                 </td>
                                 <td class="whitespace-nowrap px-3 text-center py-4 text-sm text-[#201A3C]"> 
                                    <p class="my-2">
                                    {{\App\CPU\Helpers::currency_converter($order['order_amount'])}}
                                    </p>
                                 </td>
                                 <td class="whitespace-nowrap px-3 text-center py-4 text-sm text-[#201A3C]">
                                    <p>
                                       {{$order['created_at']}}
                                    </p>
                                 </td>
                                 @if($order['order_status']=='failed' || $order['order_status']=='canceled')
                                 <td class="whitespace-nowrap px-3 text-center py-4 text-sm text-[#201A3C]"> {{\App\CPU\translate($order['order_status'])}}</td>
                                 @elseif($order['order_status']=='confirmed' || $order['order_status']=='processing' || $order['order_status']=='delivered')
                                 <td class="whitespace-nowrap px-3 text-center py-4 text-sm text-[#201A3C]"> {{\App\CPU\translate($order['order_status'])}}</td>
                                 @else
                                 <td class="whitespace-nowrap px-3 text-center py-4 text-sm text-[#201A3C]"> {{\App\CPU\translate($order['order_status'])}}</td>
                                 @endif
                                 <td class="whitespace-nowrap px-3 text-center py-4 text-sm text-[#201A3C] w-12 h-12 object-fill"> 
                                    <p class="px-5">
                                       {{\App\CPU\translate('ID')}}: {{$order['id']}}
                                    </p>
                                 </td>

                              </tr>

                              @endforeach
                              @if($orders->count()==0)
                              <tr class="whitespace-nowrap px-3 text-center text-sm text-[#201A3C]">
                                 <td colspan="5">
                                    <div class="py-10">
                                       <p class=" font-bold">لم يتم العثور على أي طلب</p>
                                       <a href="{{route('home')}}" class="inline-block rounded-[10px] mt-3 px-7 py-3 pt-4 border border-[#CC9933] hover:bg-[#CC9933] hover:text-white text-[18px] font-shamelBold text-white bg-[#CC9933]"> تسوقي الآن </a>
                                    </div>
                                 </td>
                              </tr>
                              @endif
                             
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
              
            </div>
         </div>
      </div>
   </div>
</div>


@endsection

@push('script')
    <script>
        function cancel_message() {
            toastr.info('{{\App\CPU\translate('order_can_be_canceled_only_when_pending.')}}', {
                CloseButton: true,
                ProgressBar: true
            });
        }
    </script>
@endpush
