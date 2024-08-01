@extends('layouts.front-end.app')

@section('title',\App\CPU\translate('Choose Payment Method'))

@push('css_or_js')
<meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .stripe-button-el {
            display: none !important;
        }

        .razorpay-payment-button {
            display: none !important;
        }
    </style>

    {{--stripe--}}
    <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
    <script src="https://js.stripe.com/v3/"></script>
    {{--stripe--}}
@endpush

@section('content')
    <!-- Page Content-->
    @php($coupon_discount = session()->has('coupon_discount') ? session('coupon_discount') : 0)
    @php($amount = \App\CPU\CartManager::cart_grand_total() - $coupon_discount)
    
  

    <div class="mx-auto pb-24 px-4 sm:px-6 lg:max-w-7xl">

      
   <!-- Start breadcrumb -->
   <div class="flex flex-row-reverse py-10 pb-8">
      <ul class="list-reset breadcrumbs flex flex-row-reverse font-shamelnormal text-[16px]">
        <li>
          <a href="{{route('home')}}">الرئيسية</a>
        </li>
        <li class="px-1">/</li>
        <li>
            <a href="{{route('home')}}">عودة الى التسوق</a>
        </li>
      </ul>
    </div>
    <!-- End breadcrumb -->
   <div class="flex flex-row-reverse justify-between items-center pb-8">
      <p class="text-[#201A3C] md:text-[24px] font-bold text-right">شراء المنتجات</p>
      <button onclick="location.href='{{route('home')}}'" type="button" class="items-center flex py-3 pt-4 px-4 md:px-8 border rounded-[10px] border-[#9A92CC] text-[14px] font-shamelBold text-[#201A3C] bg-transparent focus:outline-none market_button">
         <svg width="25" height="23" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg" class="pr-2 pb-1">
            <path d="M2.49939 7.9042L7.70512 12.8745C7.82499 12.989 7.89833 13.1508 7.909 13.3244C7.91967 13.498 7.86681 13.6691 7.76203 13.8001C7.65726 13.9311 7.50916 14.0113 7.35031 14.0229C7.19146 14.0346 7.03489 13.9768 6.91502 13.8623L0.519746 7.75112C0.446537 7.68277 0.389462 7.59617 0.353349 7.49862C0.317236 7.40108 0.303145 7.29547 0.312269 7.19072C0.321392 7.08596 0.353462 6.98515 0.405766 6.89681C0.45807 6.80846 0.529071 6.73518 0.612765 6.68315L6.91502 0.629354C6.9743 0.57258 7.04323 0.529122 7.11788 0.501461C7.19253 0.473801 7.27143 0.462479 7.35008 0.468142C7.42874 0.473805 7.5056 0.496344 7.57628 0.53447C7.64696 0.572596 7.71008 0.625563 7.76203 0.690347C7.81398 0.755131 7.85375 0.830462 7.87906 0.912041C7.90437 0.99362 7.91473 1.07985 7.90955 1.1658C7.90436 1.25176 7.88374 1.33576 7.84885 1.413C7.81397 1.49024 7.7655 1.55922 7.70622 1.616L2.51471 6.59226L16.6972 6.59226C16.8569 6.59226 17.01 6.66156 17.1228 6.78492C17.2357 6.90827 17.2991 7.07557 17.2991 7.25002C17.2991 7.42447 17.2357 7.59178 17.1228 7.71513C17.01 7.83849 16.8569 7.90779 16.6972 7.90779L2.49939 7.9042Z" fill="#201A3C"></path>
         </svg>
         العودة الى التسوق 
      </button>
   </div>
   <div class="mobile:block rounded-lg bg-[#201A3C] max-w-7xl mx-auto container sm:px-6 lg:px-8">
      <div class="p-4">
         <div class="flex items-center sm:justify-start justify-center flex-row-reverse space-x-3">
            <div class="sm:flex sm:flex-row-reverse items-center justify-start mx-0 ml-4 lg:mx-3 lg:ml-4">
               <div class="text-[#201A3C] flex justify-center items-center rounded-full transition duration-500 ease-in-out w-[30px] h-[30px] py-3 pt-[17px] sm:mx-2.5 m-auto bg-gold relative"> 1 </div>
               <div class="text-gold sm:text-[15px] text-[12px] text-center sm:text-right md:pl-2 sm:min-w-max mt-3 sm:mt-0">حقيبة تسوق</div>
               <svg width="23" height="18" class="hidden md:block mb-1" viewBox="0 0 23 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M3.00065 10.1785L10.0283 16.3183C10.1901 16.4597 10.2891 16.6596 10.3035 16.8741C10.3179 17.0885 10.2466 17.2999 10.1051 17.4617C9.96367 17.6235 9.76374 17.7225 9.5493 17.7369C9.33486 17.7514 9.12349 17.68 8.96167 17.5385L0.328167 9.9894C0.229336 9.90497 0.152286 9.79798 0.103534 9.67749C0.0547816 9.55699 0.0357597 9.42653 0.0480765 9.29713C0.0603933 9.16773 0.103687 9.0432 0.174296 8.93407C0.244906 8.82494 0.340755 8.73441 0.45374 8.67014L8.96167 1.19191C9.04169 1.12178 9.13475 1.0681 9.23553 1.03393C9.3363 0.999758 9.44282 0.985772 9.549 0.992768C9.65518 0.999764 9.75894 1.02761 9.85436 1.0747C9.94978 1.1218 10.035 1.18723 10.1051 1.26726C10.1753 1.34728 10.2289 1.44034 10.2631 1.54111C10.2973 1.64189 10.3113 1.74841 10.3043 1.85459C10.2973 1.96077 10.2694 2.06453 10.2223 2.15995C10.1752 2.25537 10.1098 2.34057 10.0298 2.41071L3.02133 8.55787L22.1675 8.55787C22.383 8.55787 22.5897 8.64347 22.742 8.79585C22.8944 8.94823 22.98 9.1549 22.98 9.3704C22.98 9.58589 22.8944 9.79256 22.742 9.94494C22.5897 10.0973 22.383 10.1829 22.1675 10.1829L3.00065 10.1785Z" fill="#CC9933"></path>
               </svg>
            </div>
            <div class="sm:flex sm:flex-row-reverse items-center mx-3 ml-4">
               <div class="text-[#201A3C] bg-[#CC9933] flex justify-center items-center rounded-full transition duration-500 ease-in-out w-[30px] h-[30px] py-3 pt-[17px] sm:mx-2.5 m-auto relative"> 2 </div>
               <div class="text-[#CC9933] sm:text-[15px] text-center sm:text-right md:pl-2 text-[12px] min-w-max mt-3 sm:mt-0"> تأكيد الطلب </div>
               <svg width="23" height="18" viewBox="0 0 23 18" class="hidden md:block mb-1" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M3.00065 10.1785L10.0283 16.3183C10.1901 16.4597 10.2891 16.6596 10.3035 16.8741C10.3179 17.0885 10.2466 17.2999 10.1051 17.4617C9.96367 17.6235 9.76374 17.7225 9.5493 17.7369C9.33486 17.7514 9.12349 17.68 8.96167 17.5385L0.328167 9.9894C0.229336 9.90497 0.152286 9.79798 0.103534 9.67749C0.0547816 9.55699 0.0357597 9.42653 0.0480765 9.29713C0.0603933 9.16773 0.103687 9.0432 0.174296 8.93407C0.244906 8.82494 0.340755 8.73441 0.45374 8.67014L8.96167 1.19191C9.04169 1.12178 9.13475 1.0681 9.23553 1.03393C9.3363 0.999758 9.44282 0.985772 9.549 0.992768C9.65518 0.999764 9.75894 1.02761 9.85436 1.0747C9.94978 1.1218 10.035 1.18723 10.1051 1.26726C10.1753 1.34728 10.2289 1.44034 10.2631 1.54111C10.2973 1.64189 10.3113 1.74841 10.3043 1.85459C10.2973 1.96077 10.2694 2.06453 10.2223 2.15995C10.1752 2.25537 10.1098 2.34057 10.0298 2.41071L3.02133 8.55787L22.1675 8.55787C22.383 8.55787 22.5897 8.64347 22.742 8.79585C22.8944 8.94823 22.98 9.1549 22.98 9.3704C22.98 9.58589 22.8944 9.79256 22.742 9.94494C22.5897 10.0973 22.383 10.1829 22.1675 10.1829L3.00065 10.1785Z" fill="#CC9933"></path>
               </svg>
            </div>
            <div class="sm:flex sm:flex-row-reverse items-center mx-3 ml-4">
               <div class="text-[#201A3C] bg-[#fff] flex justify-center items-center rounded-full transition duration-500 ease-in-out w-[30px] h-[30px] py-3 pt-[17px] sm:mx-2.5 m-auto relative"> 3 </div>
               <div class="text-[#fff] sm:text-[15px] text-center sm:text-right md:pl-2 text-[12px] sm:min-w-max mt-3 sm:mt-0">دفع</div>
               <svg width="23" height="18" class="hidden md:block mb-1" viewBox="0 0 23 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M3.00065 10.1785L10.0283 16.3183C10.1901 16.4597 10.2891 16.6596 10.3035 16.8741C10.3179 17.0885 10.2466 17.2999 10.1051 17.4617C9.96367 17.6235 9.76374 17.7225 9.5493 17.7369C9.33486 17.7514 9.12349 17.68 8.96167 17.5385L0.328167 9.9894C0.229336 9.90497 0.152286 9.79798 0.103534 9.67749C0.0547816 9.55699 0.0357597 9.42653 0.0480765 9.29713C0.0603933 9.16773 0.103687 9.0432 0.174296 8.93407C0.244906 8.82494 0.340755 8.73441 0.45374 8.67014L8.96167 1.19191C9.04169 1.12178 9.13475 1.0681 9.23553 1.03393C9.3363 0.999758 9.44282 0.985772 9.549 0.992768C9.65518 0.999764 9.75894 1.02761 9.85436 1.0747C9.94978 1.1218 10.035 1.18723 10.1051 1.26726C10.1753 1.34728 10.2289 1.44034 10.2631 1.54111C10.2973 1.64189 10.3113 1.74841 10.3043 1.85459C10.2973 1.96077 10.2694 2.06453 10.2223 2.15995C10.1752 2.25537 10.1098 2.34057 10.0298 2.41071L3.02133 8.55787L22.1675 8.55787C22.383 8.55787 22.5897 8.64347 22.742 8.79585C22.8944 8.94823 22.98 9.1549 22.98 9.3704C22.98 9.58589 22.8944 9.79256 22.742 9.94494C22.5897 10.0973 22.383 10.1829 22.1675 10.1829L3.00065 10.1785Z" fill="#fff"></path>
               </svg>
            </div>
            <div class="sm:flex sm:flex-row-reverse items-center mx-3 ml-0 sm:ml-4">
               <div class="text-[#201A3C] flex justify-center items-center rounded-full transition duration-500 ease-in-out w-[30px] h-[30px] py-3 pt-[17px] px-3.5 sm:mx-2.5 m-auto bg-[#C4CDD5] relative"> 4 </div>
               <div class="text-[#C4CDD5] sm:text-[14px] text-[12px] md:pl-2 text-center sm:text-right min-w-max mt-3 sm:mt-0">تم الطلب</div>
            </div>
         </div>
      </div>
   </div>
   <main class="lg:min-h-full lg:overflow-hidden lg:flex lg:flex-row-reverse mt-11">
      <!-- <div class="px-4 py-6 sm:px-6 lg:hidden">
         <div class="max-w-lg mx-auto flex"></div>
      </div> -->
      <!-- Mobile order summary -->
      <!-- <section aria-labelledby="order-heading" class="bg-gray-50 px-4 py-6 sm:px-6 lg:hidden">
         <div class="max-w-lg mx-auto">
            <div class="flex items-center justify-between">
               <h2 id="order-heading" class="text-lg font-medium text-gray-900"> Your Order </h2>
               <button id="headlessui-disclosure-button-1" type="button" aria-expanded="false" class="font-medium text-indigo-600 hover:text-indigo-500">
                    <span>Show full summary</span>
               </button>
            </div>
            
            <p class="flex items-center justify-between text-sm font-medium text-gray-900 border-t border-gray-200 pt-6 mt-6"><span class="text-base">Total</span><span class="text-base">$341.68</span></p>
         </div>
      </section> -->
      <!-- Checkout form -->
      <section aria-labelledby="payment-heading" class="flex basis-[86%] overflow-y-auto pb-10 lg:ml-6 lg:pt-0 lg:pb-24">
      <iframe id="paymentIframeSrc" class="w-full" src="" style="height: 1100px"></iframe>
      </section>
      <!-- Order summary -->
      <section aria-labelledby="summary-heading" class="w-full lg:max-w-md flex-col lg:flex">
         <h2 id="summary-heading" class="sr-only">Order summary</h2>
         <ul role="list" class="flex-auto pt-5 overflow-y-auto px-6 border border-[#E424532E] rounded-[20px] shadow">
            <p class="text-[24px] text-[#201A3C] text-right font-bold">موجز الطلب</p>
            @php($cart=\App\CPU\CartManager::get_cart())
            @foreach($cart as $cartItem)
            <li class="flex flex-row-reverse py-6 space-x-6 border-b border-b-[#9A92CC66]">
               <img 
                      onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'"
                      src="{{\App\CPU\ProductManager::product_image_path('thumbnail')}}/{{$cartItem['thumbnail']}}"
               alt="Moss green canvas compact backpack with double top zipper, zipper front pouch, and matching carry handle and backpack straps." class="flex-none w-32 h-32 object-center object-cover bg-gray-200 rounded-[15px]">
               <div class="flex flex-col justify-start pt-6 items-end space-y-4">
                  <div class="text-right space-y-1 pr-4">
                  @php($variations = $cartItem['name'])
                              @foreach(json_decode($cartItem['variations'],true) as $key1 =>$variation)
                              
                              @php($variations = $variations .'-'.$variation)
                              @endforeach
                     <h3 class="text-[#201A3C] text-[17px] font-shamelnormal">{{$variations}}</h3>
                  </div>
                  <div class="flex flex-row-reverse items-center justify-between px-4 w-64">
                     <p class="text-[14px] text-[#201A3C] font-shamelnormal">{{$cartItem['quantity']}}  طلب</p>
                     @php($price_wihe_tax = $cartItem['price']+$cartItem['tax'] )
                     <p class="text-[18px] text-[#201A3C] pl-14">{{ \App\CPU\Helpers::currency_converter($price_wihe_tax * $cartItem['quantity']) }}</p>
                     <!-- <div class="flex flex-row-reverse items-center justify-start">
                     <img id="close" src="{{asset('assets/front-end/icons/CartDelete.svg')}}" alt="" />
                        <span class="text-[14px] font-shamelnormal text-[#201A3C]"> حذف</span>
                     </div> -->
                  </div>
                  @endforeach
                  <form method="post" action="" id="billing-address-form">
                      @csrf
<div class="form-check"
     style="padding-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 1.25rem;">
    
</div>
@php($billing_addresses=\App\Model\ShippingAddress::where('customer_id',auth('customer')->id())->where('is_billing',1)->get())

<div id="hide_billing_address" class="card-body" style="padding: 0!important;">
    <ul class="list-group">
    <input type="hidden" name="billing_method_id"id="sh-0" value="0">
        @foreach($billing_addresses as $key=>$address)

            <li class="list-group-item mb-2 mt-2"
                style="cursor: pointer;background: rgba(245,245,245,0.51)"
                onclick="$('#bh-{{$address['id']}}').prop( 'checked', true )">
                <input type="radio" name="billing_method_id"
                       id="bh-{{$address['id']}}"
                       value="{{$address['id']}}" {{$key==0?'checked':''}}>
                <span class="checkmark"
                      style="margin-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}: 10px"></span>
                <label class="badge"
                       style="background: {{$web_config['primary_color']}}; color:white !important;">{{$address['address_type']}}</label>
                <small>
                    <i class="fa fa-phone"></i> {{$address['phone']}}
                </small>
                <hr>
                <span>{{ \App\CPU\translate('contact_person_name')}}: {{$address['contact_person_name']}}</span><br>
                <span>{{ \App\CPU\translate('address')}} : {{$address['address']}}, {{$address['city']}}, {{$address['zip']}}, {{$address['country']}}.</span>
            </li>
        @endforeach
       
    </ul>
</div>
</form>
               </div>

            </li>
           
            

        @php($sub_total=0)
        @php($total_tax=0)
        @php($total_shipping_cost=0)
        @php($total_discount_on_product=0)
        @php($cart_summary=\App\CPU\CartManager::get_cart())
        @php($shipping_cost=\App\CPU\CartManager::get_shipping_cost())
        @if($cart_summary->count() > 0)
            @foreach($cart_summary as $key => $cartItem)
                @php($sub_total+=($cartItem['price'])*$cartItem['quantity'])
                @php($total_tax+=$cartItem['tax']*$cartItem['quantity'])
                @php($total_discount_on_product+=$cartItem['discount']*$cartItem['quantity'])
            @endforeach
            @php($total_shipping_cost=$shipping_cost)
        @endif
           
        @php($total = $sub_total+$total_tax) 
        @php(round($total) >= 300 ? $total_shipping_cost = 0.0 : $total_shipping_cost = $shipping_cost)
        @php(round($total) >= 300 ? $shipping_cost=0 : $shipping_cost = $shipping_cost)
        @php($total = $sub_total+$total_tax+$total_shipping_cost) 
        @if(round($sub_total+$total_tax) >= 270 && round($sub_total+$total_tax) <= 300)
            @php($total = 300)
        @endif
            <!-- <li class="flex flex-row-reverse py-6 space-x-6 border-b border-b-[#9A92CC66]">
               <div class="w-full">
                  <div class="flex flex-row-reverse w-full items-center justify-between">
                     <p class="text-[18px] text-[#201A3C] font-shamelnormal"> سعر الطلبات </p>
                     <p class="text-[18px] text-[#2B3872]">240₪</p>
                  </div>
                  <div class="flex flex-row-reverse w-full items-center justify-between py-4">
                     <p class="text-[18px] text-[#201A3C] font-shamelnormal"> التوصيل </p>
                     <p class="text-[18px] text-[#2B3872]">20₪</p>
                  </div>
                  <div class="flex flex-row-reverse w-full items-center justify-between">
                     <p class="text-[18px] text-[#201A3C] font-shamelnormal"> الضرايب </p>
                     <p class="text-[18px] text-[#2B3872]">2.5₪</p>
                  </div>
               </div>
            </li> -->
            <li class="flex flex-row-reverse py-6 space-x-6 border-b border-b-[#9A92CC66]">
               <div class="w-full">
                  <div class="flex flex-row-reverse w-full items-center justify-between">
                     <p class="text-[18px] text-[#201A3C] font-shamelnormal"> اجمالي المبلغ </p>
                     <p class="text-[20px] text-[#201A3C] font-shamelBold">{{\App\CPU\Helpers::currency_converter($sub_total+$total_tax)}}</p>
                  </div>

                {{--  <div class="flex flex-row-reverse w-full items-center justify-between">
                     <p class="text-[18px] text-[#201A3C] font-shamelnormal"> الضرائب </p>
                     <p class="text-[20px] text-[#201A3C] font-shamelBold">{{\App\CPU\Helpers::currency_converter($total_tax)}}</p>
                  </div>--}}
                  
                  @if($total_discount_on_product > 0)
                  <div class="flex flex-row-reverse w-full items-center justify-between py-4">
                     <p class="text-[18px] text-[#201A3C] font-shamelnormal"> اجمالي التخفيض </p>
                     <p class="text-[18px] font-shamelBold text-[#29A71A]">-{{\App\CPU\Helpers::currency_converter($total_discount_on_product)}}</p>
                  </div>
                  @endif
                  

                  <div class="flex flex-row-reverse w-full items-center justify-between">
                     <p class="text-[18px] text-[#201A3C] font-shamelnormal"> تكلفة الشحن </p>
                     <p class="text-[27px] font-shamelBold text-[#201A3C]">{{$total > 300?\App\CPU\Helpers::currency_converter(00):\App\CPU\Helpers::currency_converter($shipping_cost)}}</p>
                  </div>
                  


                  <div class="flex flex-row-reverse w-full items-center justify-between">
                     <p class="text-[18px] text-[#201A3C] font-shamelnormal">السعر الاجمالي</p>
                    
                     <p class="text-[25px] lg:text-[32px] font-shamelBold text-[#CC9933]">{{\App\CPU\Helpers::currency_converter($total)}}</p>
                     <input name="total" type="hidden" value="{{$total}}"/>
                  </div>

            
               </div>

               
            </li>

            <div class="flex flex-row-reverse items-center justify-center py-3 rounded-[10px] bg-[#F6F6F6] mt-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="53" height="53" viewBox="0 0 53 53" fill="none">
                <g clip-path="url(#clip0_1539_7)">
                <path d="M21.8445 39.9801C23.536 38.4033 23.7965 35.9334 22.4263 34.4635C21.056 32.9935 18.574 33.0802 16.8824 34.6571C15.1909 36.2339 14.9304 38.7038 16.3006 40.1737C17.6709 41.6436 20.1529 41.557 21.8445 39.9801Z" fill="#201A3C"/>
                <path d="M44.2266 39.9816C45.9181 38.4047 46.1786 35.9348 44.8084 34.4649C43.4381 32.995 40.956 33.0817 39.2645 34.6585C37.5729 36.2354 37.3125 38.7053 38.6827 40.1752C40.0529 41.6451 42.535 41.5584 44.2266 39.9816Z" fill="#201A3C"/>
                <path d="M4.09512 20.6811C4.09512 19.7049 3.30377 18.9136 2.32759 18.9136C1.35141 18.9136 0.560059 19.7049 0.560059 20.6811C0.560059 21.6573 1.35141 22.4486 2.32759 22.4486C3.30377 22.4486 4.09512 21.6573 4.09512 20.6811Z" fill="#201A3C"/>
                <path d="M35.866 36.9488C36.4944 33.8433 39.428 31.3755 42.5811 31.3755C45.6172 31.3755 47.8055 33.6643 47.7455 36.6072C51.029 36.6931 51.943 32.3693 51.943 32.3693C52.2194 31.1602 52.6325 28.8032 52.9782 26.4896C53.0915 25.7753 53.0044 25.0436 52.7267 24.3758C51.8683 22.3722 50.8311 20.45 49.6274 18.6328C48.4887 16.9341 46.5789 15.9279 44.3988 15.8917C43.0987 15.871 41.8223 15.8585 40.8586 15.8585L40.8503 15.8503C40.7261 13.7717 39.2106 12.1796 37.0834 11.9891C35.6994 11.8659 30.2172 11.7759 27.5858 11.7759C26.5403 11.7759 25.0404 11.7904 23.5228 11.8152V11.809H23.5104H5.26475C5.03252 11.8089 4.80255 11.8545 4.58798 11.9433C4.37341 12.0321 4.17845 12.1623 4.01424 12.3265C3.85004 12.4908 3.71981 12.6857 3.63101 12.9003C3.5422 13.1149 3.49656 13.3448 3.4967 13.5771V13.5853C3.4967 14.0521 3.6821 14.4997 4.01212 14.8297C4.34214 15.1597 4.78975 15.3451 5.25646 15.3451H8.93437C9.37724 15.3778 9.79139 15.5766 10.0938 15.9018C10.3961 16.2271 10.5644 16.6546 10.5647 17.0987V17.108C10.5654 17.3404 10.5203 17.5707 10.4318 17.7857C10.3434 18.0007 10.2135 18.1961 10.0495 18.3608C9.88543 18.5255 9.69054 18.6562 9.47593 18.7455C9.26132 18.8348 9.03121 18.8809 8.79877 18.8812H6.91271C6.44407 18.8812 5.99463 19.0674 5.66325 19.3987C5.33187 19.7301 5.1457 20.1796 5.1457 20.6482C5.14557 20.8803 5.19117 21.1102 5.27991 21.3247C5.36865 21.5392 5.49879 21.7341 5.66288 21.8983C5.82698 22.0625 6.02182 22.1928 6.23627 22.2816C6.45072 22.3705 6.68058 22.4163 6.91271 22.4163H8.79877C9.26768 22.4163 9.71739 22.6025 10.049 22.9341C10.3805 23.2657 10.5668 23.7154 10.5668 24.1843C10.5668 24.6532 10.3805 25.1029 10.049 25.4345C9.71739 25.7661 9.26768 25.9523 8.79877 25.9523H1.74314C1.27441 25.9523 0.824856 26.1385 0.493312 26.4698C0.161769 26.8012 -0.0246279 27.2506 -0.0249023 27.7194C-0.0249023 28.1883 0.161373 28.638 0.492947 28.9696C0.82452 29.3011 1.27423 29.4874 1.74314 29.4874H8.79877C9.26768 29.4874 9.71739 29.6737 10.049 30.0053C10.3805 30.3368 10.5668 30.7865 10.5668 31.2555C10.5663 31.724 10.3797 32.1732 10.0482 32.5043C9.71672 32.8354 9.26733 33.0214 8.79877 33.0214H6.61666C6.14802 33.0214 5.69857 33.2076 5.36719 33.539C5.03581 33.8704 4.84965 34.3198 4.84965 34.7884C4.84965 35.2572 5.03578 35.7067 5.36713 36.0383C5.69848 36.3698 6.14792 36.5562 6.61666 36.5565L13.5791 36.5513L14.1578 35.1093C15.343 32.9231 17.7011 31.3745 20.1979 31.3745C23.352 31.3745 25.5921 33.8444 25.3457 36.9519H35.865L35.866 36.9488ZM18.3295 19.7041H15.9569C15.9546 19.7043 15.9525 19.7052 15.9508 19.7067C15.9492 19.7082 15.948 19.7102 15.9476 19.7124L15.7291 21.2652C15.7288 21.2664 15.7288 21.2677 15.7291 21.269C15.7293 21.2702 15.7299 21.2714 15.7307 21.2724C15.7315 21.2734 15.7325 21.2742 15.7337 21.2748C15.7349 21.2753 15.7361 21.2756 15.7374 21.2755H17.5034C17.5901 21.273 17.6762 21.29 17.7555 21.325C17.8349 21.3601 17.9053 21.4124 17.9619 21.4781C18.0184 21.5439 18.0596 21.6214 18.0823 21.7051C18.1051 21.7888 18.1089 21.8765 18.0934 21.9618C18.0632 22.1494 17.9685 22.3205 17.8256 22.4458C17.6828 22.5711 17.5008 22.6426 17.3109 22.6481H15.5428C15.5407 22.6481 15.5386 22.6488 15.5369 22.6501C15.5352 22.6514 15.534 22.6533 15.5335 22.6554L15.2167 24.911C15.1865 25.0985 15.0918 25.2697 14.9489 25.395C14.8061 25.5202 14.6241 25.5918 14.4342 25.5973C14.3475 25.5998 14.2614 25.5829 14.1821 25.5478C14.1028 25.5128 14.0324 25.4604 13.9759 25.3947C13.9195 25.3289 13.8784 25.2513 13.8558 25.1676C13.8332 25.0839 13.8295 24.9963 13.8452 24.911L14.6671 19.0603C14.6996 18.8622 14.8001 18.6816 14.9511 18.5494C15.1022 18.4172 15.2945 18.3417 15.4952 18.3357H18.521C18.6076 18.3332 18.6937 18.3501 18.773 18.3851C18.8523 18.4202 18.9227 18.4725 18.9792 18.5383C19.0356 18.6041 19.0767 18.6817 19.0993 18.7653C19.1219 18.849 19.1256 18.9367 19.11 19.022C19.0793 19.2086 18.9846 19.3787 18.8422 19.5032C18.6998 19.6277 18.5185 19.6987 18.3295 19.7041ZM24.6708 18.8015C24.9173 19.0202 25.0907 19.3092 25.1677 19.6296C25.2537 19.9926 25.2678 20.3689 25.2091 20.7372C25.1371 21.3104 24.9026 21.851 24.5331 22.2951C24.3076 22.5619 24.021 22.7703 23.6978 22.9028C23.6963 22.9043 23.6955 22.9064 23.6955 22.9085C23.6955 22.9106 23.6963 22.9126 23.6978 22.9142L24.2857 24.6108C24.4441 25.0663 24.0373 25.5973 23.5311 25.5973H23.498C23.3752 25.6009 23.2544 25.5653 23.1532 25.4957C23.0519 25.4261 22.9755 25.3261 22.9349 25.2101L22.2237 23.1398C22.2227 23.1383 22.2213 23.137 22.2197 23.1361C22.2181 23.1352 22.2163 23.1347 22.2144 23.1347H20.7031C20.701 23.1348 20.6989 23.1355 20.6973 23.1368C20.6956 23.1381 20.6944 23.1399 20.6938 23.1419L20.4453 24.9099C20.4151 25.0975 20.3204 25.2686 20.1775 25.3939C20.0347 25.5192 19.8526 25.5907 19.6627 25.5963C19.5761 25.5988 19.49 25.5819 19.4107 25.5468C19.3314 25.5117 19.261 25.4594 19.2045 25.3936C19.148 25.3278 19.107 25.2503 19.0844 25.1666C19.0618 25.0829 19.0581 24.9952 19.0737 24.9099L19.8956 19.0592C19.9282 18.8612 20.0286 18.6806 20.1797 18.5484C20.3308 18.4162 20.5231 18.3406 20.7238 18.3346H23.0632C23.0632 18.3346 24.0901 18.3025 24.6708 18.8015ZM31.1095 18.9733C31.0814 19.1485 30.9929 19.3084 30.8595 19.4254C30.7261 19.5424 30.556 19.6091 30.3787 19.6141H27.6572C27.6551 19.6142 27.6531 19.615 27.6515 19.6162C27.6498 19.6175 27.6486 19.6193 27.6479 19.6213L27.4316 21.1575C27.4313 21.1587 27.4312 21.1601 27.4315 21.1613C27.4318 21.1626 27.4323 21.1637 27.4331 21.1648C27.4339 21.1658 27.435 21.1666 27.4361 21.1671C27.4373 21.1676 27.4386 21.1679 27.4399 21.1679H29.5536C29.6346 21.1655 29.7151 21.1812 29.7892 21.2139C29.8632 21.2466 29.9291 21.2954 29.9819 21.3568C30.0347 21.4183 30.0731 21.4907 30.0942 21.5689C30.1154 21.647 30.1189 21.7289 30.1044 21.8086C30.0762 21.9838 29.9878 22.1437 29.8544 22.2607C29.721 22.3777 29.5509 22.4444 29.3735 22.4494H27.2587C27.2566 22.4495 27.2546 22.4502 27.2529 22.4515C27.2513 22.4528 27.25 22.4546 27.2494 22.4566L26.9896 24.3054C26.9896 24.308 26.9905 24.3105 26.9922 24.3124C26.9939 24.3143 26.9963 24.3155 26.9989 24.3158H29.7182C29.7992 24.3134 29.8797 24.3291 29.9537 24.3618C30.0278 24.3945 30.0937 24.4433 30.1465 24.5048C30.1992 24.5662 30.2376 24.6386 30.2588 24.7168C30.28 24.7949 30.2835 24.8769 30.2689 24.9565C30.2408 25.1317 30.1524 25.2916 30.019 25.4086C29.8856 25.5256 29.7155 25.5923 29.5381 25.5973H26.1635C26.0725 25.5986 25.9822 25.5798 25.8992 25.5423C25.8162 25.5049 25.7425 25.4496 25.6832 25.3805C25.624 25.3113 25.5807 25.23 25.5563 25.1422C25.532 25.0545 25.5272 24.9625 25.5424 24.8727L26.3592 19.0634C26.3917 18.8653 26.4921 18.6847 26.6432 18.5525C26.7943 18.4203 26.9866 18.3448 27.1873 18.3388H30.5609C30.641 18.3369 30.7206 18.3527 30.7939 18.3852C30.8672 18.4177 30.9324 18.466 30.9849 18.5266C31.0373 18.5873 31.0757 18.6588 31.0972 18.736C31.1188 18.8132 31.123 18.8943 31.1095 18.9733ZM36.7625 18.9733C36.7343 19.1485 36.6459 19.3084 36.5125 19.4254C36.3791 19.5424 36.209 19.6091 36.0317 19.6141H33.3102C33.3081 19.6142 33.3061 19.615 33.3044 19.6162C33.3028 19.6175 33.3015 19.6193 33.3009 19.6213L33.0856 21.1575C33.0853 21.1587 33.0853 21.1601 33.0855 21.1613C33.0858 21.1626 33.0863 21.1637 33.0872 21.1648C33.088 21.1658 33.089 21.1666 33.0901 21.1671C33.0913 21.1676 33.0926 21.1679 33.0939 21.1679H35.2077C35.2886 21.1655 35.3691 21.1812 35.4432 21.2139C35.5173 21.2466 35.5831 21.2954 35.6359 21.3568C35.6887 21.4183 35.7271 21.4907 35.7483 21.5689C35.7695 21.647 35.7729 21.7289 35.7584 21.8086C35.7302 21.9838 35.6418 22.1437 35.5084 22.2607C35.375 22.3777 35.2049 22.4444 35.0276 22.4494H32.9117C32.9096 22.4495 32.9076 22.4502 32.9059 22.4515C32.9042 22.4528 32.903 22.4546 32.9024 22.4566L32.6426 24.3054C32.6425 24.308 32.6435 24.3105 32.6452 24.3124C32.6469 24.3143 32.6493 24.3155 32.6519 24.3158H35.3712C35.4522 24.3134 35.5326 24.3291 35.6067 24.3618C35.6808 24.3945 35.7467 24.4433 35.7995 24.5048C35.8522 24.5662 35.8906 24.6386 35.9118 24.7168C35.933 24.7949 35.9365 24.8769 35.9219 24.9565C35.8938 25.1317 35.8054 25.2916 35.672 25.4086C35.5385 25.5256 35.3685 25.5923 35.1911 25.5973H31.8165C31.7254 25.5986 31.6352 25.5798 31.5522 25.5423C31.4692 25.5049 31.3955 25.4496 31.3362 25.3805C31.277 25.3113 31.2336 25.23 31.2093 25.1422C31.185 25.0545 31.1802 24.9625 31.1954 24.8727L32.0121 19.0634C32.0447 18.8653 32.1451 18.6847 32.2962 18.5525C32.4473 18.4203 32.6396 18.3448 32.8403 18.3388H36.2138C36.294 18.3369 36.3736 18.3527 36.4469 18.3852C36.5202 18.4177 36.5854 18.466 36.6378 18.5266C36.6903 18.5873 36.7286 18.6588 36.7502 18.736C36.7717 18.8132 36.7759 18.8943 36.7625 18.9733ZM40.6961 18.3098C41.6205 18.3098 42.8171 18.3222 44.0179 18.3419C45.4733 18.3657 46.7466 19.0344 47.5105 20.1751C48.3265 21.4053 49.06 22.6883 49.7061 24.0156C50.0477 24.7112 49.4193 25.617 48.5964 25.617H39.7717L40.6961 18.3098Z" fill="#201A3C"/>
                <path d="M22.5096 21.8544H20.874L21.1846 19.6143H22.8191C22.8191 19.6143 24.0188 19.5367 23.8222 20.7343C23.8273 20.7343 23.6897 21.8544 22.5096 21.8544Z" fill="#201A3C"/>
                </g>
                <defs>
                <clipPath id="clip0_1539_7">
                <rect width="53" height="53" fill="white"/>
                </clipPath>
                </defs>
            </svg>
            <p class="mr-2 font-normal text-[19px] text-[#201A3C] rtl">
                شحن مجاني 
                <span class="font-bold inter-font"> 300 ₪</span>
                فما فوق
            </p>
        </div>
            <div class="flex flex-col justify-center items-center">
               <button  type="button" class="hidden items-center flex rounded-[10px] mt-4 px-32 py-4 pt-5 min-h-[80px] border border-[#CC9933] hover:bg-[#CC9933] hover:text-white text-[18px] font-shamelBold text-[#CC9933] bg-transparent market_button"> تسوقي الآن </button>
               <button onclick="location.href='{{route('shop-cart')}}'" type="button" class="items-center flex rounded-[10px] mt-4 px-8 py-4 pt-5 min-h-[80px] text-[18px] font-shamelBold text-[#201A3C] bg-transparent focus:outline-none market_button">
                  <svg width="25" height="23" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg" class="pr-2 pb-1">
                     <path d="M2.49939 7.9042L7.70512 12.8745C7.82499 12.989 7.89833 13.1508 7.909 13.3244C7.91967 13.498 7.86681 13.6691 7.76203 13.8001C7.65726 13.9311 7.50916 14.0113 7.35031 14.0229C7.19146 14.0346 7.03489 13.9768 6.91502 13.8623L0.519746 7.75112C0.446537 7.68277 0.389462 7.59617 0.353349 7.49862C0.317236 7.40108 0.303145 7.29547 0.312269 7.19072C0.321392 7.08596 0.353462 6.98515 0.405766 6.89681C0.45807 6.80846 0.529071 6.73518 0.612765 6.68315L6.91502 0.629354C6.9743 0.57258 7.04323 0.529122 7.11788 0.501461C7.19253 0.473801 7.27143 0.462479 7.35008 0.468142C7.42874 0.473805 7.5056 0.496344 7.57628 0.53447C7.64696 0.572596 7.71008 0.625563 7.76203 0.690347C7.81398 0.755131 7.85375 0.830462 7.87906 0.912041C7.90437 0.99362 7.91473 1.07985 7.90955 1.1658C7.90436 1.25176 7.88374 1.33576 7.84885 1.413C7.81397 1.49024 7.7655 1.55922 7.70622 1.616L2.51471 6.59226L16.6972 6.59226C16.8569 6.59226 17.01 6.66156 17.1228 6.78492C17.2357 6.90827 17.2991 7.07557 17.2991 7.25002C17.2991 7.42447 17.2357 7.59178 17.1228 7.71513C17.01 7.83849 16.8569 7.90779 16.6972 7.90779L2.49939 7.9042Z" fill="#201A3C"></path>
                  </svg>
                  العودة الى الحقيبة 
               </button>
            </div>
         </ul>


        
        
      </section>
   </main>
</div>


    
@endsection

@push('script')

    @if(env('APP_MODE')=='live')
        <script id="myScript"
                src="https://scripts.pay.bka.sh/versions/1.2.0-beta/checkout/bKash-checkout.js"></script>
    @else
        <script id="myScript"
                src="https://scripts.sandbox.bka.sh/versions/1.2.0-beta/checkout/bKash-checkout-sandbox.js"></script>
    @endif

    <script>
        setTimeout(function () {
            $('.stripe-button-el').hide();
            $('.razorpay-payment-button').hide();
        }, 10)
    </script>

    <script type="text/javascript">


            function proceed_to_next() {
            let billing_addresss_same_shipping = $('#same_as_shipping_address').is(":checked");

            let allAreFilled = true;
            document.getElementById("address-form").querySelectorAll("[required]").forEach(function (i) {
                if (!allAreFilled) return;
                if (!i.value) allAreFilled = false;
                if (i.type === "radio") {
                    let radioValueCheck = false;
                    document.getElementById("address-form").querySelectorAll(`[name=${i.name}]`).forEach(function (r) {
                        if (r.checked) radioValueCheck = true;
                    });
                    allAreFilled = radioValueCheck;
                }
            });

            //billing address saved
            let allAreFilled_shipping = true;

            if (billing_addresss_same_shipping != true) {

                document.getElementById("billing-address-form").querySelectorAll("[required]").forEach(function (i) {
                    if (!allAreFilled_shipping) return;
                    if (!i.value) allAreFilled_shipping = false;
                    if (i.type === "radio") {
                        let radioValueCheck = false;
                        document.getElementById("billing-address-form").querySelectorAll(`[name=${i.name}]`).forEach(function (r) {
                            if (r.checked) radioValueCheck = true;
                        });
                        allAreFilled_shipping = radioValueCheck;
                    }
                });
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post({
                url: '{{route('customer.choose-shipping-address')}}',
                // dataType: 'json',
                data: {
                    shipping: $('#address-form').serialize(),
                    billing: $('#billing-address-form').serialize(),
                    billing_addresss_same_shipping: billing_addresss_same_shipping
                },
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
                        location.href = "{{route('checkout-complete',['payment_method'=>'cash_on_delivery'])}}";
                       // location.href = '{{route('checkout-payment')}}';
                    }
                },
                complete: function () {
                    $('#loading').hide();
                },
                error: function () {
                    toastr.error('{{\App\CPU\translate('Please fill all required fields of shipping/billing address')}}', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            });

            /*if (allAreFilled && allAreFilled_shipping) {

            } else {
                toastr.error('{{\App\CPU\translate('Please fill all required fields of shipping/billing address')}}', {
                    CloseButton: true,
                    ProgressBar: true
                });
            }*/
        }

$( document ).ready(function() {
    console.log( "ready!" );
    getOrderIframe();
});
           

function getOrderIframe() {
                // this.getIframButtonLoader = true;
                

                
               

                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
               });
                $.post({
                url: "{{route('customer.payments.getIframe')}}",
                
                // dataType: 'json',
                data: {
                    total: $("input[name='total']").val(),
                    accept_conditions:true
                   
                },
                beforeSend: function () {
                    $('#loading').show();
                },
                success: function (data) {
                    
                  
                        $("#paymentIframeSrc").attr('src', data.url);
                        $("#paymentIframeSrc").load();
                },
                complete: function () {
                   
                    $('#loading').hide();
                },
                error: function () {
                    toastr.error('{{\App\CPU\translate('Please fill all required fields of shipping/billing address')}}', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            });
                
     }

        function BkashPayment() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $('#loading').show();
            // get token
            $.ajax({
                url: "{{ route('bkash-get-token') }}",
                type: 'POST',
                contentType: 'application/json',
                success: function (data) {
                    $('#loading').hide();
                    $('pay-with-bkash-button').trigger('click');
                    if (data.hasOwnProperty('msg')) {
                        showErrorMessage(data) // unknown error
                    }
                },
                error: function (err) {
                    $('#loading').hide();
                    showErrorMessage(err);
                }
            });
        }

        let paymentID = '';
        bKash.init({
            paymentMode: 'checkout',
            paymentRequest: {},
            createRequest: function (request) {
                setTimeout(function () {
                    createPayment(request);
                }, 2000)
            },
            executeRequestOnAuthorization: function (request) {
                $.ajax({
                    url: '{{ route('bkash-execute-payment') }}',
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify({
                        "paymentID": paymentID
                    }),
                    success: function (data) {
                        if (data) {
                            if (data.paymentID != null) {
                                BkashSuccess(data);
                            } else {
                                showErrorMessage(data);
                                bKash.execute().onError();
                            }
                        } else {
                            $.get('{{ route('bkash-query-payment') }}', {
                                payment_info: {
                                    payment_id: paymentID
                                }
                            }, function (data) {
                                if (data.transactionStatus === 'Completed') {
                                    BkashSuccess(data);
                                } else {
                                    createPayment(request);
                                }
                            });
                        }
                    },
                    error: function (err) {
                        bKash.execute().onError();
                    }
                });
            },
            onClose: function () {
                // for error handle after close bKash Popup
            }
        });

        function createPayment(request) {
            // because of createRequest function finds amount from this request
            request['amount'] = "{{round(\App\CPU\Convert::usdTobdt($amount),2)}}"; // max two decimal points allowed
            $.ajax({
                url: '{{ route('bkash-create-payment') }}',
                data: JSON.stringify(request),
                type: 'POST',
                contentType: 'application/json',
                success: function (data) {
                    $('#loading').hide();
                    if (data && data.paymentID != null) {
                        paymentID = data.paymentID;
                        bKash.create().onSuccess(data);
                    } else {
                        bKash.create().onError();
                    }
                },
                error: function (err) {
                    $('#loading').hide();
                    showErrorMessage(err.responseJSON);
                    bKash.create().onError();
                }
            });
        }

        function BkashSuccess(data) {
            $.post('{{ route('bkash-success') }}', {
                payment_info: data
            }, function (res) {
                @if(session()->has('payment_mode') && session('payment_mode') == 'app')
                    location.href = '{{ route('payment-success')}}';
                @else
                    location.href = '{{route('order-placed')}}';
                @endif
            });
        }

        function showErrorMessage(response) {
            let message = 'Unknown Error';
            if (response.hasOwnProperty('errorMessage')) {
                let errorCode = parseInt(response.errorCode);
                let bkashErrorCode = [2001, 2002, 2003, 2004, 2005, 2006, 2007, 2008, 2009, 2010, 2011, 2012, 2013, 2014,
                    2015, 2016, 2017, 2018, 2019, 2020, 2021, 2022, 2023, 2024, 2025, 2026, 2027, 2028, 2029, 2030,
                    2031, 2032, 2033, 2034, 2035, 2036, 2037, 2038, 2039, 2040, 2041, 2042, 2043, 2044, 2045, 2046,
                    2047, 2048, 2049, 2050, 2051, 2052, 2053, 2054, 2055, 2056, 2057, 2058, 2059, 2060, 2061, 2062,
                    2063, 2064, 2065, 2066, 2067, 2068, 2069, 503,
                ];
                if (bkashErrorCode.includes(errorCode)) {
                    message = response.errorMessage
                }
            }
            Swal.fire("Payment Failed!", message, "error");
        }

        function click_if_alone() {
            let total = $('.checkout_details .click-if-alone').length;
            if (Number.parseInt(total) < 2) {
                $('.click-if-alone').click()
                $('.checkout_details').html('<h1>{{\App\CPU\translate('Redirecting_to_the_payment')}}......</h1>');
            }
        }
        click_if_alone();

        function chkoutCompleate(){
            location.href="{{route('checkout-complete-view')}}";
        }


        

    </script>
@endpush
