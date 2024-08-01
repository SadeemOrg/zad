@extends('layouts.front-end.app')

@section('title', $product['name'])

@push('css_or_js')
    <meta name="description" content="{{ $product->slug }}">
    <meta name="keywords"
        content="@foreach (explode(' ', $product['name']) as $keyword) {{ $keyword . ' , ' }} @endforeach">
    @if ($product->added_by == 'seller')
        <meta name="author"
            content="{{ $product->seller->shop ? $product->seller->shop->name : $product->seller->f_name }}">
    @elseif($product->added_by == 'admin')
        <meta name="author" content="{{ $web_config['name']->value }}">
    @endif
    <!-- Viewport-->

    @if ($product['meta_image'] != null)
        <meta property="og:image" content="{{ asset('storage/product/meta') }}/{{ $product->meta_image }}" />
        <meta property="twitter:card" content="{{ asset('storage/product/meta') }}/{{ $product->meta_image }}" />
    @else
        <meta property="og:image" content="{{ asset('storage/product/thumbnail') }}/{{ $product->thumbnail }}" />
        <meta property="twitter:card" content="{{ asset('storage/product/thumbnail/') }}/{{ $product->thumbnail }}" />
    @endif

    @if ($product['meta_title'] != null)
        <meta property="og:title" content="{{ $product->meta_title }}" />
        <meta property="twitter:title" content="{{ $product->meta_title }}" />
    @else
        <meta property="og:title" content="{{ $product->name }}" />
        <meta property="twitter:title" content="{{ $product->name }}" />
    @endif
    <meta property="og:url" content="{{ route('product', [$product->slug]) }}">

    @if ($product['meta_description'] != null)
        <meta property="twitter:description" content="{!! $product['meta_description'] !!}">
        <meta property="og:description" content="{!! $product['meta_description'] !!}">
    @else
        <meta property="og:description"
            content="@foreach (explode(' ', $product['name']) as $keyword) {{ $keyword . ' , ' }} @endforeach">
        <meta property="twitter:description"
            content="@foreach (explode(' ', $product['name']) as $keyword) {{ $keyword . ' , ' }} @endforeach">
    @endif
    <meta property="twitter:url" content="{{ route('product', [$product->slug]) }}">

    <link rel="stylesheet" href="{{ asset('assets/front-end/css/product-details.css') }}" />
    <style>
        .msg-option {
            display: none;
        }

        .chatInputBox {
            width: 100%;
        }

        .go-to-chatbox {
            width: 100%;
            text-align: center;
            padding: 5px 0px;
            display: none;
        }

        .feature_header {
            display: flex;
            justify-content: center;
        }

        .btn-number:hover {
            color: {{ $web_config['secondary_color'] }};

        }

        .for-total-price {
            margin- {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }}: -30%;
        }

        .feature_header span {
            padding- {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }}: 15px;
            font-weight: 700;
            font-size: 25px;
            background-color: #ffffff;
            text-transform: uppercase;
        }

        @media (max-width: 768px) {
            .feature_header span {
                margin-bottom: -40px;
            }

            .for-total-price {
                padding- {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }}: 30%;
            }

            .product-quantity {
                padding- {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }}: 4%;
            }

            .for-margin-bnt-mobile {
                margin- {{ Session::get('direction') === 'rtl' ? 'left' : 'right' }}: 7px;
            }

            .font-for-tab {
                font-size: 11px !important;
            }

            .pro {
                font-size: 13px;
            }
        }

        @media (max-width: 375px) {
            .for-margin-bnt-mobile {
                margin- {{ Session::get('direction') === 'rtl' ? 'left' : 'right' }}: 3px;
            }

            .for-discount {
                margin- {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }}: 10% !important;
            }

            .for-dicount-div {
                margin-top: -5%;
                margin- {{ Session::get('direction') === 'rtl' ? 'left' : 'right' }}: -7%;
            }

            .product-quantity {
                margin- {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }}: 4%;
            }

        }

        @media (max-width: 500px) {
            .for-dicount-div {
                margin-top: -4%;
                margin- {{ Session::get('direction') === 'rtl' ? 'left' : 'right' }}: -5%;
            }

            .for-total-price {
                margin- {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }}: -20%;
            }

            .view-btn-div {

                margin-top: -9%;
                float: {{ Session::get('direction') === 'rtl' ? 'left' : 'right' }};
            }

            .for-discount {
                margin- {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }}: 7%;
            }

            .viw-btn-a {
                font-size: 10px;
                font-weight: 600;
            }

            .feature_header span {
                margin-bottom: -7px;
            }

            .for-mobile-capacity {
                margin- {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }}: 7%;
            }
        }

    </style>
    <style>
        th,
        td {
            border-bottom: 1px solid #ddd;
            padding: 5px;
        }

        thead {
            background: {{ $web_config['primary_color'] }} !important;
            color: white;
        }

    </style>
@endpush

@section('content')
    <?php
    $overallRating = \App\CPU\ProductManager::get_overall_rating($product->reviews);
    $rating = \App\CPU\ProductManager::get_rating($product->reviews);
    ?>



    {{-- desine --}}


    <div class="bg-white">
        <div class="max-w-7xl mx-auto pt-8 lg:pt-16 py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
            <div class="lg:grid lg:grid-cols-3 lg:gap-x-8 lg:items-start flex flex-col-reverse">
                <!-- Product info -->
                <div class="mt-10 px-4 sm:px-0 sm:mt-6 lg:mt-0 col-span-1">
                    <h1 class="text-[22px] font-bold tracking-tight text-[#201A3C] text-right">{{ $product->name }}</h1>
                    <!-- Reviews -->
                    <div class="mt-3 ">
                       <h3 id="sku" class="text-[#9B9994] text-[16px]">SKU:</h3>
                        <div class="flex flex-row justify-between items-center">                            
                            <div class="flex">
                                <a href="#" class="text-sm font-bold text-[#CC9933] text-[14px]">
                                    ({{ $overallRating[1] }} {{ \App\CPU\translate('المراجعات') }})
                                </a>
                            </div>
                            <div class="flex items-center">
                                @for ($inc = 0; $inc < 5; $inc++)
                                    @if ($inc < $overallRating[0])
                                        <img src="{{ asset('assets/front-end/icons/star 1.svg') }}" />
                                    @else
                                        <img src="{{ asset('assets/front-end/icons/star 2.svg') }}" />
                                    @endif
                                @endfor
                            </div>
                        </div>                        
                    </div>
                    <!-- price -->
                    <div class="mt-3 flex flex-row justify-end items-center border-b-[1px] border-[#201B3D66] pb-2">
                        @if ($product->discount > 0)
                            <h3 class="text-[#29A71A] text-[16px] font-bold">
                                @if ($product->discount_type == 'percent')
                                    {{ round($product->discount, 2) }}%
                                @elseif($product->discount_type == 'flat')
                                    {{ \App\CPU\Helpers::currency_converter($product->discount) }}
                                @endif
                                {{ \App\CPU\translate('خصم') }}
                            </h3>
                        @endif

                        @if($product->discount > 0)
                        @php ($product_discount = \App\CPU\Helpers::get_product_discount($product,$product->unit_price)) 
                        @php($price_wihe_tax = ($product->unit_price + ($product->unit_price * $product->tax) / 100)+ $product_discount)
                        <h3 class="text-[#C4C4C4] sm:text-[24px]  font-bold px-4 line-through">
                            {{ \App\CPU\Helpers::currency_converter($price_wihe_tax) }}</h3>
                        @endif

                   
                        @php($price_wihe_tax = $product->unit_price+ ($product->unit_price * $product->tax) / 100 )
                    
                        <h3 class="text-[#CC9933] sm:text-[38px] text-[26px] font-bold">
                     
                            {{ \App\CPU\Helpers::currency_converter($price_wihe_tax)}}</h3>

                          
                    </div>
                    
                    <form id="add-to-cart-form" class="mt-6">

                        @csrf
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <input type="hidden" name="quantity" value="1">

                        <!-- Colors -->
                        <div class="flex flex-col items-end">
                            @if (count(json_decode($product->colors)) > 0)
                                <div>

                                    <h3 class="text-[16px] font-bold text-[#201A3C] font-bold text-right">الألوان</h3>
                                    <div class="mt-2" aria-labelledby="headlessui-label-2">
                                        <div class="flex flex-row-reverse items-center checkbox-color-circle radio-color-circle" role="none">
                                            @foreach (json_decode($product->colors) as $key => $color)
                                                <li class="bg-[{{ $color->color_code }}] w-8 h-8 ml-3 -m-0.5 relative rounded-full flex items-center justify-center cursor-pointer focus:outline-none"
                                                    id="headlessui-radiogroup-option-3" role="radio" aria-checked="true"
                                                    tabindex="0" aria-labelledby="headlessui-label-4">
                                                    <input type="radio"
                                                        id="{{ $product->id }}-color-{{ $key }}" data-key="{{ $key }}" name="color" data-image={{$color->images}} data-name = {{$color->color_name}}
                                                        value="{{ $color->color_code }}"
                                                        @if ($key == 0) checked @endif>
                                                        
                                                    <label class="h-full w-full rounded-full cursor-pointer label-color"
                                                        style="background: {{ $color->color_code }}; "
                                                        for="{{ $product->id }}-color-{{ $key }}"
                                                        data-toggle="tooltip">
                                                        <i class="fa-solid fa-check absolute check-icon-color top-[50%] left-[50%] translate-y-[-50%] translate-x-[-50%]"></i>
                                                        </label>
                                                        {{--<input id="{{str_replace('#','',$color->color_code)}}" type="hidden" value="{{$color->images}}">--}}
                                                </li>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <!-- Size picker -->
                        <input type="hidden" id='choiceOptions' data-choiceoptions="{{$product->choice_options}}" data-variation="{{$product->variation}}"/>
                        @foreach (json_decode($product->choice_options) as $key => $choice)
                            <div class="block flex flex-col items-end mt-8">
                                <div class="flex items-center justify-between">
                                    <!-- <a href="#" class="text-sm font-bold text-[#CC9933]">مرجع المقاس</a> -->
                                    <h2 class="text-[17px] font-bold text-[#201A3C]">{{ $choice->title }}</h2>
                                </div>
                                <div id="" class="mt-2" aria-labelledby="headlessui-label-12">
                                    <label id="headlessui-label-12" class="sr-only" role="none"> Choose a size
                                    </label>
                                    <div class="flex space-x-7 flex-wrap items-center checkbox-color-circle rtl">
                                        <li class="hidden"></li>
                                        <input type="hidden" id="selected_color" name="selected_color" value=""/>
                                        
                                        
                                               
                                        @foreach ($choice->options as $key => $option)
                                    
                                           
                                            <li id="li-option-{{ str_replace(' ','',$option) }}" class="relative cursor-pointer min-w-[65px] flex for-mobile-capacity bg-white border-gray-200 text-gray-900 hover:bg-gray-50 border rounded-md py-3 flex items-center justify-center text-sm font-medium uppercase"
                                                id="headlessui-radiogroup-option-13" role="radio" aria-checked="false"
                                                aria-disabled="true" tabindex="-1" aria-labelledby="headlessui-label-14">
                                                <input type="radio" id="{{ $choice->name }}-{{ $option }}"
                                                    name="{{ $choice->name }}" value="{{ $option }}"
                                                    @if ($key == 0) checked @endif>

                                                <label
                                                    class="cursor-pointer bg-white border-[#201A3C] text-[#201A3C] text-[16px] hover:bg-[#CC9933] hover:text-white border rounded-[10px] py-3 px-4 flex items-center justify-center text-sm inter-font uppercase sm:flex-1"
                                                    for="{{ $choice->name }}-{{ $option }}">{{ $option }}</label>
                                                    
                                                   
                                            </li>
                                            
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- Submit Buttons -->
                        <div class="mt-10 flex flex-row items-center justify-between sm:flex-col1">
                            <button onclick="addWishlist('{{$product['id']}}')" type="button"
                                class="add-favorit py-2 px-3 rounded-[15px] text-[#201A3C] border border-[#201A3C] duration-200 flex items-center justify-center hover:bg-gray-100 hover:text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" aria-hidden="true" class="duration-200 h-8 w-8 flex-shrink-0">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                    </path>
                                </svg>
                            </button>
                            <button type="button" onclick="addToCart()"
                                class="max-w-screen-xl bg-transparent hover:text-white text-[#201A3C] border border-[#201A3C] rounded-[15px] pb-3 pt-4 px-8 sm:px-24 lg:px-16 w-full text-[16px] ml-2 flex items-center justify-center text-base font-medium hover:bg-[#CC9933] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500 duration-200">
                                أضيفي إلى السلة </button>
                        </div>
                        <div class="flex items-end justify-center"><button type="button" onclick="buy_now()"
                                class="max-w-screen-xl bg-[#201A3C] mt-2 text-white text-[18px] border border-[#201A3C] rounded-[15px] pb-3 pt-4 w-full flex items-center justify-center text-base font-bold hover:bg-[#CC9933] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500 duration-200">
                                إشتري الآن </button></div>

                        <!-- AddingTabelHere -->
                        <div class="px-4 overflow-hidden sm:px-6 lg:px-8 mt-6 block lg:hidden">
                            <div class="mt-8 flex flex-col">
                                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="inline-block min-w-full py-2 align-middle md:px-0 lg:px-0">
                                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                            <table class="min-w-full divide-y divide-gray-300">
                                                <thead class="bg-[#FAFAFA]">
                                                    <tr class="divide-x divide-gray-200">
                                                        <th scope="col"
                                                            class="py-3.5 text-center pl-4 pr-4 text-sm font-bold text-[#201A3C] sm:pl-6">
                                                            قياس الخصر</th>
                                                        <th scope="col"
                                                            class="px-4 py-3.5 text-center text-sm font-bold text-[#201A3C]">
                                                            قياس الصدر</th>
                                                        <th scope="col"
                                                            class="px-4 py-3.5 text-center text-sm font-bold text-[#201A3C]">
                                                            طول الأكمام</th>
                                                        <th scope="col"
                                                            class="py-3.5 pl-4 pr-4 text-center text-sm font-bold text-[#201A3C] sm:pr-6">
                                                            الطول</th>
                                                        <th scope="col"
                                                            class="py-3.5 pl-4 pr-4 text-center text-sm font-bold text-[#201A3C] sm:pr-6">
                                                            كتف</th>
                                                        <th scope="col"
                                                            class="py-3.5 pl-4 pr-4 text-center text-sm font-bold text-[#201A3C] sm:pr-6">
                                                            المقاس</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="divide-y divide-gray-200 bg-[#FAFAFA]">
                                                    <tr class="divide-x divide-gray-200">
                                                        <td
                                                            class="whitespace-nowrap p-4 text-sm font-normal text-center text-[#201A3C]">
                                                            51</td>
                                                        <td
                                                            class="whitespace-nowrap p-4 text-sm font-normal text-center text-[#201A3C]">
                                                            127</td>
                                                        <td
                                                            class="whitespace-nowrap p-4 text-sm font-normal text-center text-[#201A3C]">
                                                            51</td>
                                                        <td
                                                            class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-normal text-center text-[#201A3C] sm:pr-6">
                                                            65.4</td>
                                                        <td
                                                            class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-normal text-center text-[#201A3C] sm:pr-6">
                                                            60</td>
                                                        <td
                                                            class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-normal text-center text-[#201A3C] sm:pr-6">
                                                            s</td>
                                                    </tr>
                                                    <tr class="divide-x divide-gray-200">
                                                        <td
                                                            class="whitespace-nowrap p-4 text-sm font-normal text-center text-[#201A3C]">
                                                            71</td>
                                                        <td
                                                            class="whitespace-nowrap p-4 text-sm font-normal text-center text-[#201A3C]">
                                                            127</td>
                                                        <td
                                                            class="whitespace-nowrap p-4 text-sm font-normal text-center text-[#201A3C]">
                                                            71</td>
                                                        <td
                                                            class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-normal text-center text-[#201A3C] sm:pr-6">
                                                            85.4</td>
                                                        <td
                                                            class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-normal text-center text-[#201A3C] sm:pr-6">
                                                            80</td>
                                                        <td
                                                            class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-normal text-center text-[#201A3C] sm:pr-6">
                                                            m</td>
                                                    </tr>
                                                    <tr class="divide-x divide-gray-200">
                                                        <td
                                                            class="whitespace-nowrap p-4 text-sm font-normal text-center text-[#201A3C]">
                                                            81</td>
                                                        <td
                                                            class="whitespace-nowrap p-4 text-sm font-normal text-center text-[#201A3C]">
                                                            127</td>
                                                        <td
                                                            class="whitespace-nowrap p-4 text-sm font-normal text-center text-[#201A3C]">
                                                            81</td>
                                                        <td
                                                            class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-normal text-center text-[#201A3C] sm:pr-6">
                                                            95.4</td>
                                                        <td
                                                            class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-normal text-center text-[#201A3C] sm:pr-6">
                                                            100</td>
                                                        <td
                                                            class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-normal text-center text-[#201A3C] sm:pr-6">
                                                            l</td>
                                                    </tr>
                                                    <tr class="divide-x divide-gray-200">
                                                        <td
                                                            class="whitespace-nowrap p-4 text-sm font-normal text-center text-[#201A3C]">
                                                            91</td>
                                                        <td
                                                            class="whitespace-nowrap p-4 text-sm font-normal text-center text-[#201A3C]">
                                                            128</td>
                                                        <td
                                                            class="whitespace-nowrap p-4 text-sm font-normal text-center text-[#201A3C]">
                                                            91</td>
                                                        <td
                                                            class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-normal text-center text-[#201A3C] sm:pr-6">
                                                            99.4</td>
                                                        <td
                                                            class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-normal text-center text-[#201A3C] sm:pr-6">
                                                            110</td>
                                                        <td
                                                            class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-normal text-center text-[#201A3C] sm:pr-6">
                                                            xl</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>





                        <!-- Services -->
                        <div class="bg-[#F6F6F6] rounded-[20px] flex flex-col mt-6 px-3  mb-6 lg:mb-0">
                            <div class="flex flex-col items-end border-b-[1px] border-b-[#565656] p-4">
                                <div class="flex flex-row justify-end items-center">
                                    <div class="text-right cursor-pointer">
                                        <h3 class="text-[#201A3C] text-[17px] font-bold ">شحن مجاني</h3>
                                        <h6 class="text-[#201A3C] text-[14px] text-right font-normal">شحن مجاني 300 ₪ فما فوق</h6>
                                    </div>
                                    <div>
                                        <svg width="30" height="30" viewBox="0 0 35 35" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="ml-3">
                                            <g clip-path="url(#clip0_245_3979)">
                                                <path
                                                    d="M14.4254 26.4018C15.5425 25.3605 15.7145 23.7295 14.8096 22.7588C13.9048 21.7881 12.2657 21.8453 11.1486 22.8866C10.0315 23.9279 9.85952 25.559 10.7644 26.5297C11.6693 27.5004 13.3084 27.4432 14.4254 26.4018Z"
                                                    fill="#201A3C"></path>
                                                <path
                                                    d="M29.2062 26.4029C30.3233 25.3616 30.4953 23.7306 29.5904 22.7599C28.6855 21.7892 27.0464 21.8464 25.9294 22.8877C24.8123 23.929 24.6403 25.5601 25.5452 26.5308C26.45 27.5015 28.0891 27.4443 29.2062 26.4029Z"
                                                    fill="#201A3C"></path>
                                                <path
                                                    d="M2.7041 13.6572C2.7041 13.0126 2.18151 12.49 1.53687 12.49C0.892218 12.49 0.369629 13.0126 0.369629 13.6572C0.369629 14.3019 0.892218 14.8245 1.53687 14.8245C2.18151 14.8245 2.7041 14.3019 2.7041 13.6572Z"
                                                    fill="#201A3C"></path>
                                                <path
                                                    d="M23.685 24.4002C24.0999 22.3495 26.0372 20.7198 28.1194 20.7198C30.1244 20.7198 31.5695 22.2312 31.5299 24.1747C33.6982 24.2314 34.3019 21.376 34.3019 21.376C34.4844 20.5776 34.7571 19.021 34.9854 17.4932C35.0603 17.0215 35.0028 16.5383 34.8193 16.0973C34.2525 14.7742 33.5675 13.5048 32.7727 12.3047C32.0207 11.183 30.7595 10.5185 29.3198 10.4946C28.4612 10.4809 27.6184 10.4727 26.9819 10.4727L26.9765 10.4672C26.8944 9.09458 25.8936 8.04321 24.4889 7.91743C23.5749 7.83608 19.9546 7.77661 18.2169 7.77661C17.5265 7.77661 16.5359 7.78618 15.5338 7.80259V7.79849H15.5256H3.47656C3.32321 7.7984 3.17134 7.82854 3.02964 7.88718C2.88795 7.94582 2.7592 8.03182 2.65076 8.14026C2.54232 8.2487 2.45632 8.37745 2.39768 8.51915C2.33903 8.66084 2.30889 8.81271 2.30898 8.96606V8.97153C2.30898 9.27974 2.43142 9.57533 2.64936 9.79327C2.8673 10.0112 3.16288 10.1336 3.47109 10.1336H5.8999C6.19236 10.1552 6.46586 10.2865 6.66554 10.5013C6.86522 10.7161 6.97632 10.9984 6.97656 11.2917V11.2978C6.97701 11.4513 6.94719 11.6034 6.8888 11.7454C6.83041 11.8873 6.7446 12.0164 6.63628 12.1251C6.52796 12.2339 6.39926 12.3202 6.25753 12.3792C6.11581 12.4382 5.96385 12.4686 5.81035 12.4688H4.56484C4.25536 12.4688 3.95856 12.5917 3.73972 12.8106C3.52089 13.0294 3.39795 13.3262 3.39795 13.6357C3.39786 13.789 3.42798 13.9408 3.48658 14.0825C3.54518 14.2241 3.63112 14.3528 3.73948 14.4613C3.84785 14.5697 3.97652 14.6557 4.11813 14.7144C4.25975 14.7731 4.41155 14.8033 4.56484 14.8033H5.81035C6.12001 14.8033 6.41699 14.9263 6.63595 15.1452C6.85492 15.3642 6.97793 15.6612 6.97793 15.9709C6.97793 16.2805 6.85492 16.5775 6.63595 16.7965C6.41699 17.0154 6.12001 17.1384 5.81035 17.1384H1.15098C0.841434 17.1384 0.544559 17.2613 0.325616 17.4802C0.106672 17.699 -0.0164203 17.9958 -0.0166016 18.3053C-0.0166016 18.615 0.106411 18.912 0.325374 19.1309C0.544337 19.3499 0.841316 19.4729 1.15098 19.4729H5.81035C6.12001 19.4729 6.41699 19.5959 6.63595 19.8149C6.85492 20.0338 6.97793 20.3308 6.97793 20.6405C6.97757 20.9499 6.85439 21.2465 6.63547 21.4652C6.41655 21.6839 6.11977 21.8067 5.81035 21.8067H4.36934C4.05986 21.8067 3.76305 21.9296 3.54422 22.1485C3.32538 22.3673 3.20244 22.6641 3.20244 22.9736C3.20244 23.2831 3.32536 23.58 3.54418 23.7989C3.76299 24.0179 4.05979 24.141 4.36934 24.1412L8.96719 24.1377L9.34932 23.1855C10.132 21.7418 11.6893 20.7191 13.3381 20.7191C15.421 20.7191 16.9003 22.3501 16.7376 24.4023H23.6843L23.685 24.4002ZM12.1042 13.0123H10.5374C10.5359 13.0124 10.5345 13.013 10.5334 13.014C10.5323 13.0149 10.5315 13.0163 10.5312 13.0177L10.387 14.0431C10.3868 14.0439 10.3868 14.0448 10.387 14.0456C10.3871 14.0465 10.3875 14.0472 10.388 14.0479C10.3886 14.0486 10.3892 14.0491 10.39 14.0495C10.3908 14.0498 10.3916 14.05 10.3925 14.05H11.5587C11.6159 14.0483 11.6728 14.0595 11.7252 14.0826C11.7776 14.1058 11.8241 14.1403 11.8615 14.1838C11.8988 14.2272 11.926 14.2784 11.941 14.3336C11.956 14.3889 11.9585 14.4468 11.9483 14.5032C11.9284 14.627 11.8658 14.7401 11.7715 14.8228C11.6772 14.9055 11.557 14.9528 11.4315 14.9564H10.264C10.2625 14.9564 10.2612 14.9568 10.26 14.9577C10.2589 14.9586 10.2581 14.9598 10.2578 14.9612L10.0486 16.4507C10.0286 16.5746 9.96611 16.6876 9.87179 16.7703C9.77746 16.8531 9.65724 16.9003 9.53184 16.904C9.47461 16.9056 9.41774 16.8944 9.36539 16.8713C9.31303 16.8481 9.26651 16.8136 9.22923 16.7701C9.19195 16.7267 9.16484 16.6755 9.1499 16.6202C9.13496 16.5649 9.13256 16.507 9.14287 16.4507L9.68564 12.5871C9.70715 12.4563 9.77347 12.337 9.87323 12.2497C9.973 12.1624 10.1 12.1125 10.2325 12.1085H12.2307C12.2879 12.1069 12.3448 12.1181 12.3971 12.1412C12.4495 12.1644 12.496 12.1989 12.5333 12.2424C12.5706 12.2858 12.5977 12.337 12.6126 12.3923C12.6275 12.4476 12.6299 12.5055 12.6196 12.5618C12.5994 12.685 12.5368 12.7974 12.4428 12.8796C12.3488 12.9618 12.229 13.0087 12.1042 13.0123ZM16.2919 12.4162C16.4547 12.5606 16.5692 12.7515 16.62 12.963C16.6768 13.2027 16.6861 13.4512 16.6474 13.6945C16.5998 14.073 16.4449 14.43 16.201 14.7233C16.052 14.8994 15.8628 15.0371 15.6493 15.1246C15.6484 15.1256 15.6478 15.1269 15.6478 15.1283C15.6478 15.1297 15.6484 15.1311 15.6493 15.1321L16.0376 16.2525C16.1422 16.5533 15.8735 16.904 15.5393 16.904H15.5174C15.4363 16.9063 15.3565 16.8828 15.2897 16.8369C15.2228 16.7909 15.1723 16.7249 15.1455 16.6483L14.6759 15.2811C14.6752 15.2801 14.6743 15.2792 14.6732 15.2786C14.6722 15.278 14.671 15.2777 14.6697 15.2777H13.6717C13.6703 15.2778 13.669 15.2783 13.6679 15.2791C13.6668 15.28 13.6659 15.2811 13.6655 15.2825L13.5015 16.4501C13.4815 16.5739 13.4189 16.6869 13.3246 16.7697C13.2303 16.8524 13.1101 16.8996 12.9847 16.9033C12.9274 16.9049 12.8706 16.8938 12.8182 16.8706C12.7659 16.8475 12.7193 16.8129 12.6821 16.7695C12.6448 16.726 12.6177 16.6748 12.6027 16.6195C12.5878 16.5643 12.5854 16.5064 12.5957 16.4501L13.1385 12.5864C13.16 12.4556 13.2263 12.3363 13.3261 12.249C13.4258 12.1617 13.5528 12.1118 13.6854 12.1079H15.2303C15.2303 12.1079 15.9084 12.0867 16.2919 12.4162ZM20.5438 12.5296C20.5253 12.6453 20.4669 12.7509 20.3788 12.8282C20.2907 12.9054 20.1784 12.9495 20.0612 12.9528H18.2641C18.2627 12.9529 18.2613 12.9534 18.2602 12.9542C18.2591 12.9551 18.2583 12.9562 18.2579 12.9576L18.115 13.972C18.1148 13.9728 18.1148 13.9737 18.115 13.9745C18.1152 13.9754 18.1155 13.9761 18.1161 13.9768C18.1166 13.9775 18.1173 13.978 18.118 13.9784C18.1188 13.9787 18.1197 13.9789 18.1205 13.9789H19.5164C19.5699 13.9773 19.623 13.9877 19.6719 14.0093C19.7209 14.0309 19.7643 14.0631 19.7992 14.1037C19.8341 14.1442 19.8594 14.1921 19.8734 14.2437C19.8874 14.2953 19.8897 14.3494 19.8801 14.402C19.8615 14.5177 19.8031 14.6233 19.715 14.7005C19.6269 14.7778 19.5146 14.8219 19.3975 14.8251H18.0009C17.9995 14.8252 17.9982 14.8257 17.9971 14.8266C17.996 14.8274 17.9951 14.8286 17.9947 14.8299L17.8231 16.0508C17.8231 16.0525 17.8238 16.0542 17.8249 16.0554C17.826 16.0567 17.8276 16.0575 17.8293 16.0577H19.6251C19.6786 16.0561 19.7317 16.0665 19.7806 16.0881C19.8295 16.1097 19.873 16.1419 19.9079 16.1825C19.9427 16.223 19.9681 16.2709 19.9821 16.3225C19.9961 16.3741 19.9984 16.4282 19.9888 16.4808C19.9702 16.5965 19.9118 16.7021 19.8237 16.7793C19.7356 16.8566 19.6233 16.9007 19.5061 16.904H17.2776C17.2175 16.9048 17.1579 16.8924 17.1031 16.8677C17.0483 16.8429 16.9996 16.8064 16.9605 16.7608C16.9213 16.7151 16.8927 16.6614 16.8767 16.6035C16.8606 16.5455 16.8575 16.4847 16.8675 16.4254L17.4068 12.5891C17.4283 12.4583 17.4947 12.339 17.5944 12.2517C17.6942 12.1644 17.8212 12.1145 17.9537 12.1106H20.1815C20.2345 12.1093 20.287 12.1198 20.3354 12.1413C20.3838 12.1627 20.4269 12.1946 20.4615 12.2347C20.4962 12.2747 20.5215 12.3219 20.5357 12.3729C20.55 12.4239 20.5527 12.4774 20.5438 12.5296ZM24.277 12.5296C24.2584 12.6453 24.2 12.7509 24.1119 12.8282C24.0238 12.9054 23.9115 12.9495 23.7943 12.9528H21.9972C21.9958 12.9529 21.9944 12.9534 21.9933 12.9542C21.9922 12.9551 21.9914 12.9562 21.991 12.9576L21.8488 13.972C21.8486 13.9728 21.8486 13.9737 21.8488 13.9745C21.8489 13.9754 21.8493 13.9761 21.8498 13.9768C21.8504 13.9775 21.8511 13.978 21.8518 13.9784C21.8526 13.9787 21.8534 13.9789 21.8543 13.9789H23.2502C23.3036 13.9773 23.3568 13.9877 23.4057 14.0093C23.4546 14.0309 23.4981 14.0631 23.533 14.1037C23.5678 14.1442 23.5932 14.1921 23.6072 14.2437C23.6212 14.2953 23.6235 14.3494 23.6139 14.402C23.5953 14.5177 23.5369 14.6233 23.4488 14.7005C23.3607 14.7778 23.2484 14.8219 23.1312 14.8251H21.734C21.7326 14.8252 21.7313 14.8257 21.7302 14.8266C21.7291 14.8274 21.7282 14.8286 21.7278 14.8299L21.5562 16.0508C21.5562 16.0525 21.5569 16.0542 21.558 16.0554C21.5591 16.0567 21.5607 16.0575 21.5624 16.0577H23.3582C23.4117 16.0561 23.4648 16.0665 23.5137 16.0881C23.5626 16.1097 23.6061 16.1419 23.641 16.1825C23.6758 16.223 23.7012 16.2709 23.7152 16.3225C23.7292 16.3741 23.7315 16.4282 23.7219 16.4808C23.7033 16.5965 23.6449 16.7021 23.5568 16.7793C23.4687 16.8566 23.3564 16.9007 23.2393 16.904H21.0107C20.9506 16.9048 20.891 16.8924 20.8362 16.8677C20.7814 16.8429 20.7327 16.8064 20.6936 16.7608C20.6544 16.7151 20.6258 16.6614 20.6098 16.6035C20.5937 16.5455 20.5906 16.4847 20.6006 16.4254L21.1399 12.5891C21.1614 12.4583 21.2278 12.339 21.3275 12.2517C21.4273 12.1644 21.5543 12.1145 21.6868 12.1106H23.9146C23.9676 12.1093 24.0201 12.1198 24.0685 12.1413C24.1169 12.1627 24.16 12.1946 24.1946 12.2347C24.2293 12.2747 24.2546 12.3219 24.2688 12.3729C24.2831 12.4239 24.2858 12.4774 24.277 12.5296ZM26.8746 12.0915C27.4851 12.0915 28.2753 12.0997 29.0683 12.1126C30.0294 12.1284 30.8702 12.57 31.3747 13.3233C31.9136 14.1357 32.3979 14.9829 32.8246 15.8594C33.0502 16.3188 32.6353 16.9169 32.0918 16.9169H26.2642L26.8746 12.0915Z"
                                                    fill="#201A3C"></path>
                                                <path
                                                    d="M14.8647 14.432H13.7847L13.9897 12.9527H15.0691C15.0691 12.9527 15.8614 12.9014 15.7315 13.6924C15.735 13.6924 15.644 14.432 14.8647 14.432Z"
                                                    fill="#201A3C"></path>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_245_3979">
                                                    <rect width="35" height="35" fill="white"></rect>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div id="paywhenRecived" class="flex flex-col items-end border-b-[1px] border-b-[#565656] p-4">
                                <div class="flex flex-row justify-end items-center">
                                    <div class="text-right cursor-pointer">
                                        <h3 class="text-[#201A3C] text-[17px] font-bold ">خدمة الدفع عند الاستلام</h3>
                                        <h6 class="text-[#201A3C] text-[14px] text-right font-normal">تعرفي أكثر</h6>
                                    </div>
                                    <div>
                                        <svg width="30" height="30" viewBox="0 0 35 35" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="ml-3">
                                            <path
                                                d="M33.4196 21.0149C31.698 20.3918 29.7868 20.5357 28.1758 21.4099C28.1548 21.4203 21.868 24.2615 21.868 24.2615C21.4214 24.596 20.9033 24.7727 20.3699 24.7727H16.4144C15.923 24.7727 15.5247 24.3748 15.5247 23.8841C15.5247 23.3934 15.923 22.9955 16.4144 22.9955H20.3699C21.6063 22.9955 21.6334 20.4516 20.4223 20.3508L14.9092 20.2875C13.9364 20.2767 12.9628 19.6514 11.9373 19.6279C10.8936 19.6041 9.90617 19.8702 9.0287 20.4394C7.80684 21.2319 6.97268 22.4913 6.41357 23.8118L9.39635 31.3441H17.9729C18.747 31.3441 19.5114 31.141 20.1833 30.7566L33.4935 23.1423C33.8981 22.7992 34.2108 22.3985 34.0734 21.7831C33.9961 21.4372 33.7478 21.1339 33.4196 21.0149Z"
                                                fill="#201A3C"></path>
                                            <path
                                                d="M0.893555 24.7347L4.95849 35.0001L8.22134 33.2085L4.15633 22.9432L0.893555 24.7347Z"
                                                fill="#201A3C"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M33.0909 9.54543C33.0909 14.1143 29.387 17.8182 24.8181 17.8182C20.2492 17.8182 16.5454 14.1143 16.5454 9.54543C16.5454 4.97653 20.2492 1.27271 24.8181 1.27271C29.387 1.27271 33.0909 4.97653 33.0909 9.54543ZM20.3636 12.7396V5.72725H23.6682C25.2662 5.73011 26.5612 7.02508 26.564 8.62308V10.3497H25.1118V8.72885C25.1118 7.87411 24.42 7.17945 23.5653 7.17945H21.8158V12.7396H20.3636ZM22.7391 9.84659C22.7391 11.4446 24.037 12.7396 25.635 12.7424V12.7396H28.9396V5.72725H27.4874V11.2902H25.7379C24.8831 11.2902 24.1913 10.5984 24.1913 9.74367V8.11995H22.7391V9.84659Z"
                                                fill="#201A3C"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div id="PrivecyPolicy" class="flex flex-col items-end p-4">
                                <div class="flex flex-row justify-end items-center">
                                    <div class="text-right cursor-pointer">
                                        <h3 class="text-[#201A3C] text-[17px] font-bold">سياسة الإرجاع</h3>
                                        <h6 class="text-[#201A3C] text-[14px] text-right font-normal">إرجاع أو إستبدال
                                            المنتجات ممكنة</h6>
                                    </div>
                                    <div>
                                        <svg width="30" height="30" viewBox="0 0 35 35" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="ml-3">
                                            <path
                                                d="M2.88734 22.0517C2.75555 21.6287 2.64125 21.1955 2.54637 20.7643C2.52183 20.6593 2.45694 20.5682 2.36574 20.5107C2.27454 20.4532 2.16437 20.4339 2.05906 20.457C1.95374 20.4802 1.86177 20.5438 1.80303 20.6342C1.74429 20.7246 1.72351 20.8345 1.7452 20.9402C1.84473 21.3941 1.96531 21.8499 2.10367 22.2953C2.13598 22.3992 2.20825 22.4861 2.30458 22.5367C2.4009 22.5873 2.5134 22.5976 2.61733 22.5653C2.72125 22.533 2.80808 22.4608 2.85872 22.3644C2.90935 22.2681 2.91965 22.1556 2.88734 22.0517Z"
                                                fill="#201A3C"></path>
                                            <path
                                                d="M3.89032 24.5151C3.68907 24.1208 3.50286 23.7136 3.33634 23.3048C3.31625 23.2546 3.28644 23.2089 3.24863 23.1703C3.21081 23.1317 3.16574 23.1009 3.116 23.0798C3.06626 23.0587 3.01283 23.0476 2.95878 23.0471C2.90474 23.0467 2.85114 23.057 2.80107 23.0773C2.75101 23.0977 2.70546 23.1277 2.66704 23.1658C2.62863 23.2038 2.59811 23.249 2.57723 23.2989C2.55636 23.3487 2.54555 23.4022 2.54541 23.4563C2.54528 23.5103 2.55583 23.5638 2.57645 23.6138C2.75145 24.0445 2.94778 24.4729 3.1597 24.888C3.18419 24.936 3.21789 24.9787 3.25887 25.0136C3.29985 25.0486 3.34732 25.0751 3.39856 25.0917C3.4498 25.1083 3.50381 25.1147 3.5575 25.1104C3.61119 25.1061 3.66352 25.0913 3.71149 25.0668C3.75947 25.0424 3.80215 25.0087 3.8371 24.9677C3.87205 24.9267 3.89858 24.8792 3.91519 24.828C3.9318 24.7767 3.93815 24.7227 3.93388 24.669C3.92961 24.6154 3.91481 24.563 3.89032 24.5151Z"
                                                fill="#201A3C"></path>
                                            <path
                                                d="M1.96285 19.9134C2.07068 19.8991 2.16845 19.8427 2.23465 19.7564C2.30085 19.6701 2.33006 19.561 2.31586 19.4532C2.25789 19.0157 2.21797 18.57 2.19664 18.1262C2.19507 18.0721 2.1826 18.0188 2.15999 17.9696C2.13738 17.9205 2.10508 17.8763 2.06504 17.8399C2.02499 17.8035 1.97801 17.7755 1.92691 17.7577C1.87581 17.7398 1.82163 17.7324 1.76762 17.736C1.71381 17.7385 1.66103 17.7517 1.61229 17.7746C1.56356 17.7976 1.51983 17.8299 1.48359 17.8698C1.44736 17.9097 1.41933 17.9563 1.40111 18.007C1.3829 18.0577 1.37485 18.1115 1.37742 18.1653C1.39957 18.632 1.44168 19.1013 1.50238 19.5598C1.50942 19.6132 1.52692 19.6647 1.55388 19.7114C1.58083 19.7581 1.61672 19.7989 1.65948 19.8317C1.70224 19.8645 1.75104 19.8885 1.8031 19.9025C1.85515 19.9164 1.90944 19.9199 1.96285 19.9128V19.9134Z"
                                                fill="#201A3C"></path>
                                            <path
                                                d="M4.54502 25.6758C4.51715 25.6289 4.4802 25.588 4.43634 25.5555C4.39248 25.5231 4.34258 25.4997 4.28956 25.4868C4.23655 25.4738 4.18149 25.4716 4.12761 25.4802C4.07373 25.4889 4.02211 25.5081 3.97578 25.537C3.92944 25.5658 3.88932 25.6035 3.85776 25.6481C3.82621 25.6926 3.80385 25.7429 3.79201 25.7962C3.78016 25.8495 3.77906 25.9046 3.78878 25.9583C3.79849 26.012 3.81882 26.0632 3.84857 26.1089C4.09467 26.5035 4.35935 26.8929 4.63771 27.2664C4.66991 27.3096 4.71029 27.346 4.75656 27.3736C4.80284 27.4012 4.85409 27.4194 4.9074 27.4272C4.96071 27.4349 5.01502 27.4322 5.06725 27.4189C5.11948 27.4057 5.1686 27.3824 5.2118 27.3502C5.25499 27.318 5.29143 27.2776 5.31902 27.2313C5.34661 27.1851 5.36481 27.1338 5.3726 27.0805C5.38038 27.0272 5.37758 26.9729 5.36437 26.9206C5.35116 26.8684 5.3278 26.8193 5.2956 26.7761C5.03146 26.4195 4.77853 26.0496 4.54502 25.6758Z"
                                                fill="#201A3C"></path>
                                            <path
                                                d="M9.1329 30.4369C8.76622 30.1892 8.40556 29.9234 8.06076 29.6456C8.01878 29.6118 7.97056 29.5867 7.91887 29.5715C7.86717 29.5564 7.813 29.5516 7.75945 29.5575C7.7059 29.5633 7.65402 29.5796 7.60677 29.6054C7.55952 29.6313 7.51783 29.6662 7.48408 29.7082C7.45032 29.7502 7.42517 29.7984 7.41005 29.8501C7.39493 29.9018 7.39014 29.9559 7.39595 30.0095C7.40177 30.063 7.41807 30.1149 7.44394 30.1622C7.4698 30.2094 7.50472 30.2511 7.54669 30.2849C7.90927 30.5764 8.28825 30.8566 8.67435 31.1167C8.76436 31.1776 8.87488 31.2003 8.98163 31.1798C9.08837 31.1593 9.18261 31.0972 9.24364 31.0073C9.27391 30.9626 9.29507 30.9124 9.30589 30.8595C9.3167 30.8066 9.31698 30.7521 9.30669 30.6991C9.2964 30.6461 9.27575 30.5957 9.24593 30.5507C9.21611 30.5057 9.1777 30.467 9.1329 30.4369Z"
                                                fill="#201A3C"></path>
                                            <path
                                                d="M6.13521 27.8086C6.06309 27.7272 5.96157 27.6778 5.85299 27.6712C5.7444 27.6646 5.63765 27.7014 5.55621 27.7735C5.47477 27.8456 5.42531 27.9472 5.41872 28.0557C5.41213 28.1643 5.44895 28.2711 5.52107 28.3525C5.83033 28.7014 6.15763 29.0408 6.49369 29.3615C6.53231 29.4003 6.57832 29.431 6.629 29.4518C6.67968 29.4726 6.73401 29.483 6.78877 29.4824C6.84354 29.4818 6.89764 29.4703 6.94787 29.4485C6.99811 29.4266 7.04346 29.395 7.08127 29.3554C7.11907 29.3157 7.14855 29.2689 7.16798 29.2177C7.1874 29.1665 7.19638 29.1119 7.19437 29.0572C7.19236 29.0025 7.17941 28.9487 7.15628 28.899C7.13315 28.8494 7.10031 28.8049 7.0597 28.7681C6.74006 28.4624 6.42916 28.1395 6.13521 27.8086Z"
                                                fill="#201A3C"></path>
                                            <path
                                                d="M17.9333 0.792969C15.2749 0.795572 12.6561 1.43627 10.2968 2.66121C7.9375 3.88616 5.90672 5.65955 4.37515 7.83234C4.3125 7.92129 4.28774 8.03148 4.30633 8.13868C4.32492 8.24588 4.38533 8.34131 4.47427 8.40396C4.56322 8.46662 4.67341 8.49138 4.78061 8.47279C4.88781 8.4542 4.98324 8.39379 5.04589 8.30484C6.76583 5.86212 9.14502 3.95895 11.9058 2.81743C14.6666 1.6759 17.6951 1.34312 20.6379 1.85792C23.5807 2.37271 26.3164 3.71385 28.5257 5.72481C30.735 7.73578 32.3268 10.3336 33.1154 13.2152C33.9039 16.0967 33.8566 19.1431 32.9791 21.9988C32.1015 24.8544 30.4299 27.4016 28.1593 29.3431C25.8886 31.2846 23.1127 32.5402 20.1553 32.9634C17.198 33.3867 14.1812 32.9601 11.4572 31.7335C11.0552 31.5519 10.6549 31.3507 10.2677 31.1341C10.2207 31.1074 10.1688 31.0902 10.1151 31.0837C10.0614 31.0771 10.0069 31.0812 9.95479 31.0957C9.90267 31.1103 9.85395 31.135 9.81143 31.1685C9.76891 31.2019 9.73344 31.2435 9.70705 31.2907C9.68066 31.338 9.66388 31.39 9.65767 31.4437C9.65147 31.4975 9.65596 31.5519 9.67089 31.6039C9.68583 31.656 9.7109 31.7045 9.74468 31.7468C9.77845 31.789 9.82026 31.8242 9.86769 31.8503C10.2754 32.0778 10.6965 32.2902 11.1198 32.4811C13.3738 33.497 15.8265 33.9958 18.2983 33.941C20.7701 33.8862 23.1983 33.2791 25.4051 32.1643C27.6119 31.0495 29.5414 29.4551 31.0521 27.498C32.5629 25.5409 33.6168 23.2707 34.1365 20.8535C34.6563 18.4364 34.6287 15.9336 34.0559 13.5285C33.483 11.1234 32.3794 8.87684 30.8259 6.95349C29.2724 5.03013 27.3083 3.47866 25.0775 2.41271C22.8467 1.34676 20.4057 0.793331 17.9333 0.792969Z"
                                                fill="#201A3C"></path>
                                            <path
                                                d="M3.37324 8.50525C3.39704 8.65305 3.44973 8.79471 3.52828 8.92215C3.60683 9.04959 3.70972 9.1603 3.83106 9.24798C3.95241 9.33566 4.08983 9.39857 4.23549 9.43314C4.38115 9.4677 4.53219 9.47324 4.67999 9.44943L6.79859 9.10818C6.90372 9.0885 6.99701 9.02853 7.05857 8.94106C7.12012 8.85358 7.14507 8.74552 7.12809 8.63992C7.11112 8.53431 7.05356 8.43952 6.96769 8.37574C6.88182 8.31197 6.77443 8.28426 6.66843 8.29853L4.54984 8.6406C4.46609 8.65378 4.38052 8.63333 4.31178 8.5837C4.24305 8.53407 4.19672 8.45928 4.18288 8.37564L3.84163 6.25622C3.82196 6.15108 3.76199 6.05779 3.67452 5.99624C3.58704 5.93468 3.47898 5.90973 3.37338 5.92671C3.26777 5.94369 3.17298 6.00125 3.1092 6.08711C3.04543 6.17298 3.01772 6.28037 3.03199 6.38637L3.37324 8.50525Z"
                                                fill="#201A3C"></path>
                                            <path
                                                d="M10.9623 12.4871C10.9787 12.4775 10.9943 12.4666 11.0115 12.4578L21.5252 7.13675H21.5279L18.3697 5.47152C18.2395 5.40284 18.0945 5.36694 17.9473 5.36694C17.8 5.36694 17.655 5.40284 17.5248 5.47152L7.55801 10.7243C7.54543 10.7308 7.53449 10.739 7.52246 10.7461L10.9623 12.4871Z"
                                                fill="#201A3C"></path>
                                            <path
                                                d="M14.1934 14.1225L17.7229 15.9091C17.7923 15.9441 17.869 15.9622 17.9467 15.9622C18.0244 15.9622 18.1011 15.9441 18.1705 15.9091L28.3714 10.7461C28.3593 10.739 28.3484 10.7308 28.3361 10.7242L24.6912 8.80469L14.2431 14.093C14.2256 14.1017 14.21 14.1129 14.1934 14.1225Z"
                                                fill="#201A3C"></path>
                                            <path
                                                d="M18.5413 16.6406C18.4817 16.6702 18.4199 16.6951 18.3564 16.7152V29.266C18.3605 29.2638 18.3652 29.2633 18.3693 29.2611L28.3361 24.0111C28.4811 23.9333 28.6024 23.8178 28.6871 23.6768C28.7718 23.5358 28.8168 23.3744 28.8173 23.2099V11.5254C28.8173 11.498 28.8141 11.4707 28.8116 11.4434L18.5413 16.6406Z"
                                                fill="#201A3C"></path>
                                            <path
                                                d="M17.5363 16.7149C17.4732 16.695 17.4117 16.6701 17.3525 16.6405L13.7516 14.8181C13.7489 14.8454 13.7456 14.8728 13.7456 14.9023V19.589C13.7456 19.6794 13.7185 19.7676 13.6679 19.8424C13.6172 19.9172 13.5453 19.9751 13.4615 20.0087C13.3776 20.0422 13.2856 20.0499 13.1973 20.0306C13.1091 20.0114 13.0286 19.9662 12.9663 19.9007L12.0694 18.9656C12.0164 18.9094 11.9498 18.8678 11.8761 18.8448C11.8023 18.8218 11.7239 18.8182 11.6483 18.8343L11.0632 18.9601C10.997 18.9746 10.9284 18.9741 10.8625 18.9586C10.7965 18.9431 10.7349 18.913 10.6821 18.8705C10.6294 18.8279 10.5868 18.7741 10.5577 18.713C10.5285 18.6518 10.5134 18.5849 10.5136 18.5171V13.2644C10.5136 13.2371 10.5169 13.2097 10.5193 13.1824L7.07947 11.4414C7.07701 11.4687 7.07373 11.4961 7.07373 11.5256V23.2093C7.07424 23.3742 7.11953 23.5358 7.20478 23.6769C7.29003 23.818 7.41202 23.9333 7.55771 24.0105L17.5245 29.2605C17.5283 29.2624 17.5324 29.263 17.5363 29.2649V16.7149Z"
                                                fill="#201A3C"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Image gallery -->
                <div class="grid col-span-2 px-4 sm:px-0">
                    <!-- Image selector -->
                    <div class="w-auto sm:max-h-[600px] flex flex-col sm:flex-row gap-6 items-center justify-center">
                        <!-- <img src="https://tailwindui.com/img/ecommerce-images/product-page-01-featured-product-shot.jpg" alt="https://tailwindui.com/img/ecommerce-images/product-page-01-featured-product-shot.jpg" class="w-full h-full object-center object-cover sm:rounded-lg flex-[0.8]"> -->
                        @if ($product->images != null)
                          @if(!empty(json_decode($product->colors)))
                           @if(!empty(json_decode(json_decode($product->colors)[0]->images)))
                              @php($image = json_decode(json_decode($product->colors)[0]->images)[0])
                             @else
                             @php($image = json_decode($product->images)[0])
                             @endif
                             @else
                             @php($image = json_decode($product->images)[0])
                          @endif  
                            <div class="img-responsive w-full h-full object-center object-cover sm:rounded-lg flex-[0.7] active"
                                id="image2">
                                <img class="main-image img-responsive w-full h-full object-center object-cover sm:rounded-lg"
                                    onerror="this.src='{{ asset('assets/front-end/img/image-place-holder.png') }}'"
                                    src="{{ asset("storage/product/$image") }}" {{-- data-zoom="{{asset("storage/product/$image")}}" --}} alt="Product image"
                                    width="">
                                <div class="cz-image-zoom-pane"></div>
                            </div>
                        @endif
                        <div class="flex sm:flex-col flex-row gap-x-2 flex-[0.3] h-full overflow-y-auto">
                            @if ($product->images != null)
                                @foreach (json_decode($product->images) as $key => $photo)
                                    <a class="stop-link img-anchor w-full  object-center object-cover sm:rounded-lg mb-2"
                                        href="#image{{ $key }}">
                                        <img data-image="{{ $key }}" onerror="this.src='{{ asset('assets/front-end/img/image-place-holder.png') }}'"
                                            src="{{ asset("storage/product/$photo") }}" alt="Product thumb"
                                            class="w-full h-full object-center object-cover sm:rounded-lg mb-2">
                                    </a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="hidden w-full max-w-2xl mx-auto sm:block lg:max-w-none"></div>
                    <section aria-labelledby="details-heading" class="mt-12">
                        <h2 id="details-heading" class="sr-only">Additional details</h2>
                        <div>
                            <div class="">
                                <h3 class="">
                                    <button id="headlessui-disclosure-button-25" type="button" aria-expanded="false"
                                        class="w-full flex justify-between items-center text-left expand-btn">
                                        <svg class="duration-300" xmlns="http://www.w3.org/2000/svg" width="17"
                                            height="11" viewBox="0 0 17 11" fill="none">
                                            <path
                                                d="M16.1799 10.1577H0.820002C0.0931492 10.1577 -0.277135 9.28 0.244006 8.75885L7.92396 1.07883C8.23939 0.763406 8.76053 0.763406 9.07609 1.07883L16.7561 8.75885C17.2771 9.28 16.9068 10.1577 16.1799 10.1577Z"
                                                fill="#201A3C" />
                                        </svg>
                                        <span class="text-[#201A3C] text-[16px] font-bold">وصف</span>
                                    </button>
                                </h3>
                                <div id="headlessui-disclosure-panel-82"
                                    class="desc-wrap pt-2 pl-16 text-[16px] font-normal text-[#201A3C] text-right">

                                    {!! $product['details'] !!}

                                    {{-- <ul role="list">
                           <li class="font-shamelnormal text-[16px]"> {!! $product['details'] !!} </li>
                        </ul> --}}
                                </div>
                                <!---->
                            </div>
                        </div>
                        <!--<div class="pt-8">
                              <div>
                                 <h3>
                                    <button id="headlessui-disclosure-button-27" type="button" aria-expanded="false" class="group relative w-full flex justify-between items-center text-left">
                                       <span class="ml-6 flex items-center">
                                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="block h-6 w-6 text-gray-400 group-hover:text-gray-500">
                                             <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                          </svg>
                                       </span>
                                       <span class="text-[#201A3C] text-[16px] font-bold">الحجم والمقاس</span>
                                    </button>
                                 </h3>

                              </div>
                              </div>-->
                    </section>
                    <div class="px-4 overflow-hidden sm:px-6 lg:px-8 mt-6 hidden lg:block">
                        <div class="mt-8 flex flex-col">
                            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 align-middle md:px-0 lg:px-0">
                                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-300">
                                            <thead class="bg-[#FAFAFA]">
                                                <tr class="divide-x divide-gray-200">
                                                    <th scope="col"
                                                        class="py-3.5 text-center pl-4 pr-4 text-sm font-bold text-[#201A3C] sm:pl-6">
                                                        قياس الخصر</th>
                                                    <th scope="col"
                                                        class="px-4 py-3.5 text-center text-sm font-bold text-[#201A3C]">
                                                        قياس الصدر</th>
                                                    <th scope="col"
                                                        class="px-4 py-3.5 text-center text-sm font-bold text-[#201A3C]">
                                                        طول الأكمام</th>
                                                    <th scope="col"
                                                        class="py-3.5 pl-4 pr-4 text-center text-sm font-bold text-[#201A3C] sm:pr-6">
                                                        الطول</th>
                                                    <th scope="col"
                                                        class="py-3.5 pl-4 pr-4 text-center text-sm font-bold text-[#201A3C] sm:pr-6">
                                                        كتف</th>
                                                    <th scope="col"
                                                        class="py-3.5 pl-4 pr-4 text-center text-sm font-bold text-[#201A3C] sm:pr-6">
                                                        المقاس</th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-200 bg-[#FAFAFA]">
                                                <tr class="divide-x divide-gray-200">
                                                    <td
                                                        class="whitespace-nowrap p-4 text-sm font-normal text-center text-[#201A3C]">
                                                        51</td>
                                                    <td
                                                        class="whitespace-nowrap p-4 text-sm font-normal text-center text-[#201A3C]">
                                                        127</td>
                                                    <td
                                                        class="whitespace-nowrap p-4 text-sm font-normal text-center text-[#201A3C]">
                                                        51</td>
                                                    <td
                                                        class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-normal text-center text-[#201A3C] sm:pr-6">
                                                        65.4</td>
                                                    <td
                                                        class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-normal text-center text-[#201A3C] sm:pr-6">
                                                        60</td>
                                                    <td
                                                        class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-normal text-center text-[#201A3C] sm:pr-6">
                                                        s</td>
                                                </tr>
                                                <tr class="divide-x divide-gray-200">
                                                    <td
                                                        class="whitespace-nowrap p-4 text-sm font-normal text-center text-[#201A3C]">
                                                        71</td>
                                                    <td
                                                        class="whitespace-nowrap p-4 text-sm font-normal text-center text-[#201A3C]">
                                                        127</td>
                                                    <td
                                                        class="whitespace-nowrap p-4 text-sm font-normal text-center text-[#201A3C]">
                                                        71</td>
                                                    <td
                                                        class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-normal text-center text-[#201A3C] sm:pr-6">
                                                        85.4</td>
                                                    <td
                                                        class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-normal text-center text-[#201A3C] sm:pr-6">
                                                        80</td>
                                                    <td
                                                        class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-normal text-center text-[#201A3C] sm:pr-6">
                                                        m</td>
                                                </tr>
                                                <tr class="divide-x divide-gray-200">
                                                    <td
                                                        class="whitespace-nowrap p-4 text-sm font-normal text-center text-[#201A3C]">
                                                        81</td>
                                                    <td
                                                        class="whitespace-nowrap p-4 text-sm font-normal text-center text-[#201A3C]">
                                                        127</td>
                                                    <td
                                                        class="whitespace-nowrap p-4 text-sm font-normal text-center text-[#201A3C]">
                                                        81</td>
                                                    <td
                                                        class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-normal text-center text-[#201A3C] sm:pr-6">
                                                        95.4</td>
                                                    <td
                                                        class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-normal text-center text-[#201A3C] sm:pr-6">
                                                        100</td>
                                                    <td
                                                        class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-normal text-center text-[#201A3C] sm:pr-6">
                                                        l</td>
                                                </tr>
                                                <tr class="divide-x divide-gray-200">
                                                    <td
                                                        class="whitespace-nowrap p-4 text-sm font-normal text-center text-[#201A3C]">
                                                        91</td>
                                                    <td
                                                        class="whitespace-nowrap p-4 text-sm font-normal text-center text-[#201A3C]">
                                                        128</td>
                                                    <td
                                                        class="whitespace-nowrap p-4 text-sm font-normal text-center text-[#201A3C]">
                                                        91</td>
                                                    <td
                                                        class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-normal text-center text-[#201A3C] sm:pr-6">
                                                        99.4</td>
                                                    <td
                                                        class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-normal text-center text-[#201A3C] sm:pr-6">
                                                        110</td>
                                                    <td
                                                        class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-normal text-center text-[#201A3C] sm:pr-6">
                                                        xl</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p class="text-[20px] font-bold text-[#201A3C] mt-14 text-right px-4">ما ينظر اليه الأخرون</p>
            <ul role="list" dir="rtl"
                class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8 mt-6 px-4">
                @if (count($relatedProducts) > 0)
                    @foreach ($relatedProducts as $key => $relatedProduct)
                        <li class="relative">
                            <a href="{{ route('product', $relatedProduct->slug) }}">
                                <div
                                    class="group block h-[25rem] w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100 focus-within:ring-indigo-500 overflow-hidden">
                                    <img src="{{ \App\CPU\ProductManager::product_image_path('thumbnail') }}/{{ $relatedProduct['thumbnail'] }}"
                                        onerror="this.src='{{ asset('assets/front-end/img/image-place-holder.png') }}'"
                                        alt="" class="h-full w-full object-cover pointer-events-none group-hover:opacity-75"><button
                                        type="button" class="absolute inset-0 focus:outline-none"><span
                                            class="sr-only">View details for IMG_4985.HEIC</span></button>
                                </div>
                                <!-- <p class="mt-2 block text-sm font-medium text-gray-900 truncate pointer-events-none">test</p> -->
                               
                                @if($relatedProduct->discount > 0)
                                @php ($product_discount = \App\CPU\Helpers::get_product_discount($product,$relatedProduct->unit_price)) 
                                @php($price_wihe_tax = ($relatedProduct->unit_price + ($relatedProduct->unit_price * $relatedProduct->tax) / 100)+ $product_discount)

    
                                <p class="block text-[18px] font-bold text-[#201A3C] pointer-events-none text-right pt-4">
                                {{ \App\CPU\Helpers::currency_converter($price_wihe_tax)}}</p>
                                @else
                                @php($price_wihe_tax = $relatedProduct->unit_price+ ($relatedProduct->unit_price * $relatedProduct->tax) / 100 )
                                <p class="block text-[18px] font-bold text-[#201A3C] pointer-events-none text-right pt-4">
                                {{ \App\CPU\Helpers::currency_converter($price_wihe_tax)}}</p>

                                @endif
                                
                            </a>
                        </li>
                    @endforeach
                @endif
            </ul>
            @php($category = json_decode($product['category_ids']))
            <a href="{{ route('products', ['id' => $category[0]->id, 'data_from' => 'category', 'page' => 1]) }}">
                <div class="flex items-center justify-center mt-6"><button type="submit"
                        class="bg-transparent text-[#201A3C] border border-[#201A3C] rounded-[15px] py-3 px-8 sm:px-24 lg:px-16 text-[16px] ml-2 flex items-center justify-center text-base font-medium hover:bg-[#CC9933] hover:text-[#fff] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500">
                        رؤية المزيد </button></div>
            </a>
        </div>

        <div id="popUpPayWhenRecived" class="modal-wrap-pop fixed hidden z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class=" flex items-center justify-center min-h-screen pt-4 px-4 text-center sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                <div class=" modal-con relative inline-block align-bottom bg-white rounded-xl px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:align-middle sm:max-w-4xl sm:w-[75%] sm:p-6">
                    <div >
                        <img id="colsePaymentModal" class="max-w-[23px] cursor-pointer max-h-[23px] mx-8 mt-9"
                            src="/assets/front-end/icons/Close.svg" />
                        <div class=" mx-auto flex items-center justify-center">
                            <!-- Heroicon name: outline/check -->
                        </div>
                        <div class="mt-3 text-center sm:mt-0">
                            <h3 class=" leading-4 text-[21px] font-shamelBold text-[#201A3C]" id="modal-title">
                                خدمة الدفع عند الاستلام
                            </h3>
                            <div class="w-full rounded-lg bg-[#FAFAFA] mt-14 pt-6 px-7 pb-7 " dir="rtl">
                                <p class="text-right text-[16px] font-shamelnormal text-[#201A3C]">
                                        - خدمة الدفع عند الإستلام متاحة لجميع زبوناتنا.
                                </p>
                                <p class="text-right text-[16px] font-shamelnormal text-[#201A3C]">
                                - الدفع عند الإستلام يكون نقدًا فقط.
                                </p>
                                <p class="text-right font-shamelnormal text-[14px] pt-8 text-[#201A3C]">ملاحظات:</p>
                                <p class="text-right font-shamelnormal text-[14px] pt-2 text-[#201A3C]">
                                1. لخاصية الدفع عند الاستلام توجد تكلفة إضافية ب-10 شيكل جديد (تكلفة الشحن الكلية 40شيكل).
                                </p>
                                <p class="text-right font-shamelnormal text-[14px]  text-[#201A3C]">
                                2. اذا لم يتم إستلام الطلب بعد محاولتين بموعدين مختلفين من شركة الشحن، ستتم إعادة المنتج تلقائيا وسيتم إضافة رسوم الشحن لطلبك التالي.
                                </p>                                
                                <a href="#"
                                    class="text-right hidden font-shamelBold text-[16px] mt-6 flex items-end text-[#CC9933]">
                                    بالتفصيل </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="PopUpReturnPolicy" class="modal-wrap-pop fixed hidden z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class=" flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:p-0 ">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                <div class="modal-con relative inline-block align-bottom rounded-xl bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-[75%] sm:p-6 ">
                    <div>
                        <img id="ClosePrivecyPolicy" class="cursor-pointer max-w-[23px] max-h-[23px] mx-7 mt-9" src="/assets/front-end/icons/Close.svg" />
                        <div class=" mx-auto flex items-center justify-center ">
                            <!-- Heroicon name: outline/check -->
                        </div>
                        <div class="mt-3 text-center sm:mt-0">
                            <h3 class=" leading-4 text-[21px] font-shamelBold text-[#201A3C]" id="modal-title">
                                سياسة الإرجاع
                            </h3>
                            <div class="w-full rounded-lg bg-[#FAFAFA] mt-8 pt-8 px-7 pb-7" dir="rtl">
                                <p class="text-right text-[18px] font-shamelBold text-[#201A3C]">ضماننا</p>
                                <p class="text-right font-shamelnormal text-[14px] pt-2 text-[#201A3C]">
                                    للإرجاع او
                                    للإستبدال خلال 14 يوما من تاريخ الإستلام</p>
                                <p class="text-right font-shamelnormal text-[14px] pt-2 text-[#201A3C]">
                                1. أن يتم تقديم طلب الإعادة خلال 14 يوم من تاريخ إستلام الطلب
                                </p>
                                <p class="text-right font-shamelnormal text-[14px]  text-[#201A3C]">
                                    2. أن تكون المنتجات غير مستخدمة، غير تالفة وفي الطرد الأصلي
                                </p>
                                {{--<p class="text-right font-shamelnormal text-[14px]  text-[#201A3C]">
                                3. رسوم الشحن للإرجاع تتحملها المشترية 
                                </p> --}}
                                <a href="#"
                                    class="text-right hidden font-shamelBold text-[16px] mt-2.5 flex items-end text-[#CC9933]">
                                    إعرفي المزيد
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
    
    <script type="text/javascript">
        cartQuantityInitialize();
        getVariantPrice();
        checkOutOfStock(); 
        $('#add-to-cart-form input').on('change', function() {
            checkOutOfStock(); 
            getVariantPrice();
        });
        $("#paywhenRecived").click(function() {
            $("#popUpPayWhenRecived").show();
        });
        $("#colsePaymentModal").click(function() {
            $("#popUpPayWhenRecived").hide();
        });
        $(document).click(function (event) {
           console.log('outScreen')
    /* $('#myDIV:visible').hide(); */
});
        $("#PrivecyPolicy").click(function() {
            $("#PopUpReturnPolicy").show();
        });
        $("#ClosePrivecyPolicy").click(function() {
            $("#PopUpReturnPolicy").hide();
        });

        function showInstaImage(link) {
            $("#attachment-view").attr("src", link);
            $('#show-modal-view').modal('toggle')
        }
    </script>

    {{-- Messaging with shop seller --}}
    <script>
        $('#contact-seller').on('click', function(e) {
            // $('#seller_details').css('height', '200px');
            $('#seller_details').animate({
                'height': '276px'
            });
            $('#msg-option').css('display', 'block');
        });
        $('#sendBtn').on('click', function(e) {
            e.preventDefault();
            let msgValue = $('#msg-option').find('textarea').val();
            let data = {
                message: msgValue,
                shop_id: $('#msg-option').find('textarea').attr('shop-id'),
                seller_id: $('.msg-option').find('.seller_id').attr('seller-id'),
            }
            if (msgValue != '') {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "post",
                    url: '{{ route('messages_store') }}',
                    data: data,
                    success: function(respons) {
                        console.log('send successfully');
                    }
                });
                $('#chatInputBox').val('');
                $('#msg-option').css('display', 'none');
                $('#contact-seller').find('.contact').attr('disabled', '');
                $('#seller_details').animate({
                    'height': '125px'
                });
                $('#go_to_chatbox').css('display', 'block');
            } else {
                console.log('say something');
            }
        });
        $('#cancelBtn').on('click', function(e) {
            e.preventDefault();
            $('#seller_details').animate({
                'height': '114px'
            });
            $('#msg-option').css('display', 'none');
        });
    </script>

    <script type="text/javascript"
        src="https://platform-api.sharethis.com/js/sharethis.js#property=5f55f75bde227f0012147049&product=sticky-share-buttons"
        async="async"></script>
    
@endpush
