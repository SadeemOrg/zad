

<!-- Grid-->
{{-- <hr class="view_border"> --}}
@php($shippingMethod=\App\CPU\Helpers::get_business_settings('shipping_method'))

@if(auth('customer')->id() != null)
@php($cart=\App\Model\Cart::where(['customer_id' => auth('customer')->id()])->get()->groupBy('cart_group_id'))
@endif

@if(auth('customer')->id() == null)
@php($cart=\App\CPU\CartManager::get_cart())
@endif


@if(!empty($cart) && count($cart) > 0)

<!-- New Desine -->
@php($shippings=\App\CPU\Helpers::get_shipping_methods(1,'admin'))

<div class="bg-white">
   <div class="max-w-2xl mx-auto pt-16 pb-24 px-4 sm:px-6 lg:max-w-7xl lg:px-2">
      <h1 class="text-3xl font-extrabold tracking-tight text-[#201A3C] sm:text-4xl text-center"> اكملي حقيبة الشراء </h1>
      @if(auth('customer')->id() != null)
      <form class="for-direction mt-12 lg:grid lg:grid-cols-12 lg:gap-x-12 lg:items-start xl:gap-x-6 md:flex md:flex-col-reverse">
         <!-- Order summary -->
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
            @php($total = $sub_total+$total_tax) 
            @php(round($total) >= 300 ? $total_shipping_cost = 0.0 : $total_shipping_cost = $shipping_cost)
            @php(round($total) >= 300 ? $shipping_cost=0 : $shipping_cost = $shipping_cost)
            @php($total = $sub_total+$total_tax+$total_shipping_cost)
            @if(round($sub_total+$total_tax) >= 270 && round($sub_total+$total_tax) <= 300)
            @php($total = 300)
            @endif
        @endif    
    

        <section aria-labelledby="cart-heading" class="lg:col-span-8 xl:col-span-7">
            <div class="wrap wrap-cart-products"> 
                <div class="content-width flex flex-row justify-between items-center text-white bg-[#201A3C] rounded-[10px] text-lg py-5 px-8 mb-6 font-shamelnormal">
                    <p class="laptop:basis-2/5 text-right">المنتج</p>
                    <p class="laptop:basis-1/5 pr-28 laptop:pr-0">السعر</p>
                    <p class="laptop:basis-1/5 hidden sm:block">العدد</p>
                    <p class="laptop:basis-1/5 hidden laptop:block">اجمالي</p>
                </div>

                           
                <ul role="list" class="content-width product-cat-list px-4 shadow border border-[#E424532E] rounded-[20px] divide-y divide-gray-200">
                @foreach($cart as $group_key=>$group)
                @foreach($group as $cart_key=>$cartItem)
                    @if($cart_key==0)
                        @if($cartItem->seller_is=='admin')
                           <p class="flex justify-start pr-2.5 pt-1.5"> {{\App\CPU\Helpers::get_business_settings('company_name')}}</p>
                        @else
                            {{\App\Model\Shop::where(['seller_id'=>$cartItem['seller_id']])->first()->name}}
                        @endif
                    @endif
                    
                        
                <li class="relative grid grid-cols-4 py-4 gap-x-6 items-center  min-h-[180px]">
                    <div class="flex-shrink-0" >
                        <img 
                        onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'"
                        src="{{\App\CPU\ProductManager::product_image_path('thumbnail')}}/{{$cartItem['thumbnail']}}"
                        alt="product image" class="w-35 h-35 rounded-md object-center object-cover sm:w-40 sm:h-40">
                    </div>
                    <div class="col-span-3 justify-center">
                        <div class="pr-9 flex flex-row items-center justify-between gap-x-6 pr-0">
                            <p class="text-[24px] text-[#CC9933] font-shamelBold hidden laptop:flex">120₪</p>
                            
                            <div class="flex flex-col justify-center items-start w-full">
                                <div class="flex flex-row-reverse justify-between items-center">
                                    <div class="sm:flex sm:flex-row-reverse justify-between items-center">
                                        @if($cartItem['discount'] > 0)
                                        @php($price_wihe_tax = $cartItem['price']+$cartItem['tax'] + $cartItem['discount'])
                                        <div class="relative">
                                            <p class="text-[20px] text-[#C4C4C4] font-shamelBold">{{ \App\CPU\Helpers::currency_converter($price_wihe_tax) }}</p>
                                            <div class="border-b-2 border-[#C4C4C4] w-14 absolute top-2.5"></div>
                                        </div>
                                        @endif

                                        
                                        @php($price_wihe_tax = $cartItem['price']+$cartItem['tax'] )
                                        <p class="text-[18px] sm:text-[24px] text-[#CC9933] font-shamelBold pl-4">{{ \App\CPU\Helpers::currency_converter($price_wihe_tax) }}</p>
                                    </div>
                                    @php($variations = $cartItem['name'])
                                    @foreach(json_decode($cartItem['variations'],true) as $key1 =>$variation)
                                    
                                    @php($variations = $variations .'-'.$variation)
                                    @endforeach
                                    <p class="text-[14px] ml-5 sm:ml-10 md:text-[18px] font-shamelnormal max-w-[180px] text-[#201A3C] text-right">{{$variations}}</p>
                                    
                                </div>


                                <div class="flex flex-row w-full mt-4" >
                                    
                                    <div class="flex flex-row items-center" onclick="removeFromCart({{ $cartItem['id'] }})">
                                        <span class="font-shamelnormal text-[12px]">حذف</span>
                                        <img id="close" src="{{asset('assets/front-end/icons/CartDelete.svg')}}" alt="" />
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 sm:mt-0 sm:pr-9 quantity-responsive">
                                <label for="quantity-0" class="sr-only">Quantity, Basic Tee</label>
                                
                                <select class="max-w-full rounded-[10px] border border-gray-300 py-1 sm:py-2 pt-3 sm:px-4 px-2 text-base leading-5 font-medium text-[#201A3C] text-left shadow-sm focus:outline-none focus:ring-1 focus:ring-[#9A92CC] focus:border-[#9A92CC] sm:text-sm"
                                name="quantity[{{ $cartItem['id'] }}]" id="cartQuantity{{$cartItem['id']}}"
                                                onchange="updateCartQuantity('{{$cartItem['id']}}')">
                                            @for ($i = 1; $i <= 10; $i++)
                                                <option
                                                    value="{{$i}}" {{$cartItem['quantity'] == $i?'selected':''}}>
                                                    {{$i}}
                                                </option>
                                            @endfor
                                </select>
                            
                            </div>
                        </div>
                    </div>
                    
                    </li>
                
            
                    @endforeach
                   @endforeach
            
            
            
                </ul>
            </div>

            @php($choosen_shipping=\App\Model\CartShipping::where(['cart_group_id'=>$cartItem['cart_group_id']])->first())
                        @if(isset($choosen_shipping)==false)
                            @php($choosen_shipping['shipping_method_id']=0)
                        @endif
            @if($shippingMethod=='inhouse_shipping')
                @php($shippings=\App\CPU\Helpers::get_shipping_methods(1,'admin'))
                <div class="row">
                    <div class="col-12 relative mt-4">
                        <select id="shipping_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" onchange="set_shipping_id(this.value,'all_cart_group')">
                            <option value="-1"> {{\App\CPU\translate('أختاري طريقة الشحن')}}</option>
                            @foreach($shippings as $shipping)
                                <option
                                    value="{{$shipping['id']}}" {{$choosen_shipping['shipping_method_id']==$shipping['id']?'selected':''}}>
                                    {{$shipping['title'].' ( '.$shipping['duration'].' ) '.\App\CPU\Helpers::currency_converter($shipping['cost'])}}
                                </option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </div>
            @endif
             
        </section>
        <section aria-labelledby="summary-heading" class="mt-16 border border-[#E424532E] rounded-[20px] shadow px-4 py-6 sm:p-6 lg:p-8 lg:mt-0 mb-6 lg:mb-0 lg:col-span-4 xl:col-span-5">
            <h2 id="summary-heading" class="text-[24px] text-[#201A3C] text-right font-bold"> موجز الطلب </h2>
            <div class="mt-6 space-y-4">
                <div class="flex items-center justify-between">
                    <p class="text-[18px] font-shamelnormal text-[#201A3C]"> السعر </p>
                    <p class="text-[20px] font-shamelBold text-[#201A3C]">{{\App\CPU\Helpers::currency_converter($sub_total+$total_tax)}}</p>                    
                </div>


                {{--<div class="flex items-center justify-between">
                    <p class="text-[18px] font-shamelnormal text-[#201A3C]"> الضرائب </p>
                    <p class="text-[20px] font-shamelBold text-[#201A3C]">{{\App\CPU\Helpers::currency_converter($total_tax)}}</p>                    
                </div>--}}

                @if($total_discount_on_product > 0)
                <div class="flex items-center justify-between">
                    <span class="text-[18px] font-shamelnormal text-[#201A3C]">اجمالي التخفيض</span>
                    <span class="text-[18px] font-shamelBold text-[#29A71A]">- {{\App\CPU\Helpers::currency_converter($total_discount_on_product)}}</span>
                
                </div>
                @endif

                <div class="flex items-center justify-between">
                    <span class="text-[18px] font-shamelnormal text-[#201A3C]">تكلفة الشحن</span>
                    <span class="text-[20px] font-shamelBold text-[#201A3C]"> {{\App\CPU\Helpers::currency_converter($shipping_cost)}}</span>                
                </div>
               
                <div class="flex items-center justify-between">
                    <p class="text-[18px] font-shamelnormal text-[#201A3C]">السعر الاجمالي</p>  
                    <p class="text-[25px] lg:text-[32px] font-shamelBold text-[#CC9933]">  {{\App\CPU\Helpers::currency_converter($total)}}</p>                    
                </div>
               <!-- <div class="flex items-center justify-end">
                  <p class="text-[14px] text-[#201A3C] font-shamelnormal text-right"> مكافأة <span class="font-shamelBold">46 نقاط </span> من زاد </p>
               </div> -->
            </div>
            <div class="mt-6"><button onclick="checkout()" type="button" class="w-full border border-[#CC9933] rounded-[10px] shadow-sm text-[18px] py-3 pt-4 px-4 text-base font-medium text-[#CC9933] hover:bg-[#CC9933] hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50"> اتمام الشراء </button></div>
            <div class="flex items-center justify-center py-3 rounded-[10px] bg-[#F6F6F6] mt-3">
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
         </section>

        

        

         
      </form>
      @endif

      @if(auth('customer')->id() == null)
      <form class="for-direction mt-12 lg:grid lg:grid-cols-12 lg:gap-x-12 lg:items-start xl:gap-x-6 md:flex md:flex-col-reverse">
         <!-- Order summary -->
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
            @php($total = $sub_total+$total_tax) 
            @php(round($total) >= 300 ? $total_shipping_cost = 0.0 : $total_shipping_cost = $shipping_cost)
            @php(round($total) >= 300 ? $shipping_cost=0 : $shipping_cost = $shipping_cost)
            @php($total = $sub_total+$total_tax+$total_shipping_cost)
            @if( round($sub_total+$total_tax) >= 270 && round($sub_total+$total_tax) <= 300)
            @php($total = 300)
            @endif
        @endif     
         

        <section aria-labelledby="cart-heading" class="lg:col-span-8 xl:col-span-7">
            <div class="wrap wrap-cart-products"> 
                <div class="content-width flex flex-row justify-between items-center text-white bg-[#201A3C] rounded-[10px] text-lg py-5 px-8 mb-6 font-shamelnormal">
                    <p class="laptop:basis-2/5 text-right">المنتج</p>
                    <p class="laptop:basis-1/5 pr-28 laptop:pr-0">السعر</p>
                    <p class="laptop:basis-1/5 hidden sm:block">العدد</p>
                    <p class="laptop:basis-1/5 hidden laptop:block">اجمالي</p>
                </div>

                           
                <ul role="list" class="content-width product-cat-list shadow px-4 border border-[#E424532E] rounded-[20px] divide-y divide-gray-200">
                @foreach($cart as $cartItem)
                    
                        
                <li class="relative grid grid-cols-4 py-4 gap-x-6 items-center  min-h-[180px] ">
                    <div class="flex-shrink-0" >
                        <img 
                        onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'"
                        src="{{\App\CPU\ProductManager::product_image_path('thumbnail')}}/{{$cartItem['thumbnail']}}"
                        alt="product image" class="w-35 h-35 rounded-md object-center object-cover sm:w-40 sm:h-40">
                    </div>
                    <div class="col-span-3 justify-center">
                        <div class="pr-9 flex flex-row items-center justify-between gap-x-6 pr-0">
                            <p class="text-[24px] text-[#CC9933] font-shamelBold hidden laptop:flex">120₪</p>
                            
                            <div class="flex flex-col justify-center items-start w-full">
                                <div class="flex flex-row-reverse justify-between items-center w-full">
                                    <div class="sm:flex sm:flex-row-reverse justify-between items-center">
                                    @if($cartItem['discount'] > 0)
                                    @php($price_wihe_tax = $cartItem['price']+$cartItem['tax'] + $cartItem['discount'])
                                        <div class="relative">
                                            <p class="text-[20px] text-[#C4C4C4] font-shamelBold">{{ \App\CPU\Helpers::currency_converter($price_wihe_tax) }}</p>
                                            <div class="border-b-2 border-[#C4C4C4] w-14 absolute top-2.5"></div>
                                        </div>
                                    @endif
                                
                                    @php($price_wihe_tax = $cartItem['price']+$cartItem['tax'] )
                                    <p class="text-[18px] sm:text-[24px] text-[#CC9933] font-shamelBold pl-4">{{ \App\CPU\Helpers::currency_converter($price_wihe_tax) }}</p>
                                    
                                </div>
                                @php($variations = $cartItem['name'])
                                @foreach(json_decode($cartItem['variations'],true) as $key1 =>$variation)
                                
                                @php($variations = $variations .'-'.$variation)
                                @endforeach
                                <p class="text-[14px] ml-5 sm:ml-10 md:text-[18px] font-shamelnormal max-w-[180px] text-[#201A3C] text-right">{{$variations}}</p>
                                
                                </div>
                                <div class="flex flex-row w-full mt-4" >
                                    
                                    <button id="remove_cart" type="button"  class="flex flex-row items-center" onclick="removeFromCartNotLoginShopCart({{ $cartItem['id'] }})" value="{{ $cartItem['id'] }}">
                                        <span class="font-shamelnormal text-[12px]">حذف</span>
                                        <img id="close" src="{{asset('assets/front-end/icons/CartDelete.svg')}}" alt="" />
                                    </button>
                                </div>
                            </div>
                            <div class="mt-4 sm:mt-0 sm:pr-9 quantity-responsive">
                                <label for="quantity-0" class="sr-only">Quantity, Basic Tee</label>
                                
                                <select class="max-w-full rounded-[10px] border border-gray-300 py-1 sm:py-2 pt-3 sm:px-4 px-2 text-base leading-5 font-medium text-[#201A3C] text-left shadow-sm focus:outline-none focus:ring-1 focus:ring-[#9A92CC] focus:border-[#9A92CC] sm:text-sm"
                                name="quantity[{{ $cartItem['id'] }}]" id="cartQuantity{{$cartItem['id']}}"
                                                onchange="updateCartQuantity('{{$cartItem['id']}}')">
                                            @for ($i = 1; $i <= 10; $i++)
                                                <option
                                                    value="{{$i}}" {{$cartItem['quantity'] == $i?'selected':''}}>
                                                    {{$i}}
                                                </option>
                                            @endfor
                                </select>
                            
                            </div>
                        </div>
                    </div>
                    
                    </li>
                
            
                    @endforeach
            
            
            
                </ul>
            </div>

            @php($choosen_shipping=\App\Model\CartShipping::where(['cart_group_id'=>$cartItem['cart_group_id']])->first())
                        @if(isset($choosen_shipping)==false)
                            @php($choosen_shipping['shipping_method_id']=0)
                        @endif
            @if($shippingMethod=='inhouse_shipping')
                @php($shippings=\App\CPU\Helpers::get_shipping_methods(1,'admin'))
                <div class="row">
                    <div class="col-12 relative mt-4">
                        <select id="shipping_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 pt-4 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" onchange="set_shipping_id(this.value,'all_cart_group')">
                            <option value="-1">{{\App\CPU\translate('أختاري طريقة الشحن')}}</option>
                            @foreach($shippings as $shipping)
                                <option
                                    value="{{$shipping['id']}}" {{$choosen_shipping['shipping_method_id']==$shipping['id']?'selected':''}}>
                                    {{$shipping['title'].' ( '.$shipping['duration'].' ) '.\App\CPU\Helpers::currency_converter($shipping['cost'])}}
                                </option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </div>
            @endif
             
         </section>
        <section aria-labelledby="summary-heading" class="mt-16 border border-[#E424532E] rounded-[20px] shadow px-4 py-6 sm:p-6 lg:p-8 lg:mt-0 mb-6 lg:mb-0 lg:col-span-4 xl:col-span-5">
            <h2 id="summary-heading" class="text-[24px] text-[#201A3C] text-right font-bold"> موجز الطلب </h2>
            <div class="mt-6 space-y-4">
                <div class="flex items-center justify-between">
                    <p class="text-[18px] font-shamelnormal text-[#201A3C]"> السعر </p>
                    <p class="text-[20px] font-shamelBold text-[#201A3C]">{{\App\CPU\Helpers::currency_converter($sub_total+$total_tax)}}</p>
                  
               </div>

               {{--<div class="flex items-center justify-between">
               <p class="text-[18px] font-shamelnormal text-[#201A3C]"> الضرائب </p>
               <p class="text-[20px] font-shamelBold text-[#201A3C]">{{\App\CPU\Helpers::currency_converter($total_tax)}}</p>
                  
               </div>--}}

               @if($total_discount_on_product > 0)
               <div class="flex items-center justify-between">
                    <span class="text-[18px] font-shamelnormal text-[#201A3C]">اجمالي التخفيض</span>
                   <span class="text-[18px] font-shamelBold text-[#29A71A]">- {{\App\CPU\Helpers::currency_converter($total_discount_on_product)}}</span>
               
               </div>
               @endif
               
               

               <div class="flex items-center justify-between">
               <span class="text-[18px] font-shamelnormal text-[#201A3C]">تكلفة الشحن</span>
                   <span class="text-[20px] font-shamelBold text-[#201A3C]"> {{\App\CPU\Helpers::currency_converter($shipping_cost)}}</span>
               
               </div>
               
               <div class="flex items-center justify-between">
               <p class="text-[18px] font-shamelnormal text-[#201A3C]">السعر الاجمالي</p>  
               <p class="text-[25px] lg:text-[32px] font-shamelBold text-[#CC9933]">  {{\App\CPU\Helpers::currency_converter($total)}}</p>
                 
               <!-- <div class="flex items-center justify-end">
                  <p class="text-[14px] text-[#201A3C] font-shamelnormal text-right"> المبلغ الكلي <span class="font-shamelBold">{{ \App\CPU\Helpers::currency_converter(($cartItem['price']-$cartItem['discount'])*$cartItem['quantity']) }} </span></p>
               </div> -->
            </div>
            <div class="mt-6"><button onclick="checkout()" type="button" class="w-full border border-[#CC9933] rounded-[10px] shadow-sm text-[18px] py-3 pt-4 px-4 text-base font-medium text-[#CC9933] hover:bg-[#CC9933] hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50"> اتمام الشراء </button></div>
        
            <div class="flex items-center justify-center py-3 rounded-[10px] bg-[#F6F6F6] mt-3">
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
        </section>


         
         

        

      </form>
      @endif

   </div>
</div>

<!-- end new desine -->

@endif

@if(empty($cart) || count($cart) == 0)
<div class="bg-white">
   <div class="flex flex-col items-center justify-center py-10 max-w-2xl mx-auto pt-16 pb-24 px-4 sm:px-6 lg:max-w-7xl lg:px-2">
      <img src="{{asset('assets/front-end/icons/empty-cart.svg')}}"/>
      <p class="text-[#201A3C] text-[35px] text-center">حقيبة التسوق <br>فارغة</p>
      <button onclick="location.href='{{route('home')}}'" type="button" class="items-center flex rounded-[10px] mt-4 px-9 py-3 pt-4 border border-transparent text-[18px] font-shamelBold text-white bg-[#CC9933] focus:outline-none focus:ring-2 focus:ring-offset-2 market_button"> تسوقي الآن </button>
   </div>
</div>
@endif

<script>


selectedShippingsId();
function selectedShippingsId(){
    
        
        var shippings = <?php if(isset($shippings)) echo json_encode($shippings)?>;
        
        if(shippings.length > 0){
           
            
            setTimeout(() => {
             
            if( $('#shipping_id').val() == '-1')
            {
             $('#shipping_id').val((shippings[0].id).toString()).change();
            }
            }, 100)
          }   
        
      
    }
   
</script>
<script>
    cartQuantityInitialize();
    
    function set_shipping_id(id, cart_group_id) {
        $.get({
            url: '{{url('/')}}/customer/set-shipping-method',
            dataType: 'json',
            data: {
                id: id,
                cart_group_id: cart_group_id
            },
            beforeSend: function () {
                $('#loading').show();
            },
            success: function (data) {
                location.reload();
            },
            complete: function () {
                $('#loading').hide();
            },
        });
    }
</script>
<script>
    function checkout(){
        let order_note = $('#order_note').val();
        console.log(order_note);
        $.post({
            url: "{{route('order_note')}}",
            data: {
                    _token: '{{csrf_token()}}',
                    order_note:order_note,
                    
                },
            beforeSend: function () {
                $('#loading').show();
            },
            success: function (data) {
                let url = "{{ route('checkout-details') }}";
                location.href=url;

            },
            complete: function () {
                $('#loading').hide();
            },
        });
    }
    
</script>

