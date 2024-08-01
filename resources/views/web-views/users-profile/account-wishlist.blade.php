@extends('layouts.front-end.app')

@section('title',\App\CPU\translate('My Wishlists'))

@push('css_or_js')
    <style>
        .headerTitle {
            font-size: 24px;
            font-weight: 600;
            margin-top: 1rem;
        }

        body {
            font-family: 'Titillium Web', sans-serif
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
        }
    </style>
@endpush

@section('content')
   

    <div class="container max-w-7xl mx-auto sm:px-6 lg:px-8 pt-10 px-2">
        <div class="flex flex-row-reverse">
            <ul class="list-reset breadcrumbs flex flex-row-reverse font-shamelnormal text-[16px]">
                <li>
                    <a class="hover:text-[#CC9933] duration-200" href="{{route('home')}}">الرئيسية</a>
                </li>
                <li class="px-1">/</li>
                <li>المفضلة</li>
            </ul>
        </div>
    </div>
    <div class="bg-white">
        <h2 class="font-bold text-center my-10 shamelFamilyBold text-[25px]">قائمة ما تتمنيه</h2>
   <div class="max-w-2xl mx-auto pb-16 px-4 sm:pb-24 sm:px-6 lg:max-w-7xl lg:px-8">
      <h2 id="products-heading" class="sr-only">Products</h2>
      <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-4 xl:gap-x-4 rtl">
         
      @if($wishlists->count()>0)
       @foreach($wishlists as $wishlist)
        @php($product = $wishlist->product_full_info)
        @if( $wishlist->product_full_info)
         <a href="{{route('product',$product['slug'])}}" class="favorit-item group rounded-[20px] overflow-hidden relative">            
            <div class="w-full aspect-w-1 aspect-h-1 overflow-hidden sm:aspect-w-2 sm:aspect-h-3 relative">
               <img  src="{{\App\CPU\ProductManager::product_image_path('thumbnail')}}/{{$product['thumbnail']}}" alt="Person using a pen to cross a task off a productivity paper card." class="relative w-full h-full object-center object-cover rounded-tl-[20px] rounded-tr-[20px] md:h-[300px]">
               <div class="z-50 absolute top-3 right-3" onclick="removeWishlist('{{$product['id']}}')">
                <svg width="30" height="25" viewBox="0 0 37 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M34.0648 3.2449C32.1495 1.16755 29.5214 0.0234375 26.664 0.0234375C24.5283 0.0234375 22.5723 0.698669 20.8503 2.03022C19.9814 2.70235 19.1941 3.52465 18.5 4.48443C17.8061 3.52493 17.0186 2.70235 16.1494 2.03022C14.4277 0.698669 12.4717 0.0234375 10.336 0.0234375C7.47865 0.0234375 4.85027 1.16755 2.93494 3.2449C1.04249 5.29798 0 8.10279 0 11.143C0 14.2722 1.16613 17.1366 3.66974 20.1576C5.90941 22.8599 9.12833 25.6032 12.8559 28.7798C14.1288 29.8646 15.5715 31.0943 17.0696 32.4041C17.4654 32.7507 17.9733 32.9416 18.5 32.9416C19.0265 32.9416 19.5346 32.7507 19.9298 32.4046C21.4279 31.0946 22.8715 29.8643 24.1449 28.7789C27.8719 25.6029 31.0909 22.8599 33.3305 20.1573C35.8342 17.1366 37 14.2722 37 11.1427C37 8.10279 35.9575 5.29798 34.0648 3.2449Z" fill="#CC9933"></path>
                </svg>
               </div>
            </div>
            <div class="flex flex-col justify-start items-start text-base px-4 py-2 font-medium text-gray-900 border-[1px] border-[#E424532E] rounded-br-[20px] rounded-bl-[20px]">
               <h3 class="text-[17px] font-bold">{{$product['name']}}</h3>
               {{--<p class="mt-1 text-[16px] text-right font-normal text-[#201A3C]">{{\App\CPU\translate('ماركة')}} :{{$product->brand?$product->brand['name']:''}}</p>--}}
               
                @php($price_wihe_tax = $product->unit_price+ ($product->unit_price * $product->tax) / 100 )
               <p class="text-[#CC9933] font-bold text-xl">{{App\CPU\Helpers::currency_converter($price_wihe_tax)}}</p>

            </div>
            <div class="favorit-overlay absolute duration-200 bg-[#201b3db3] top-0 right-0 bottom-0 left-0 text-center flex justify-center items-center">
                <div>
                    <button class=" mb-3 duration-300 px-8 sm:px-24 lg:px-16 pb-3 pt-4 border border-transparent w-full font-medium rounded-[10px] shadow-sm text-white bg-login hover:bg-[#CC9933] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 rounded-[10px]">أضف الى العربة</button>
                    <button class="bg-transparent hover:text-white text-[#fff] border border-[#fff] rounded-[10px] pb-3 pt-4 px-8 sm:px-24 lg:px-16 w-full text-[16px] flex items-center justify-center text-base font-medium hover:bg-[#CC9933] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500 duration-200">منتجات مشابهة</button>
                </div>
            </div>
         </a>
         @endif
    @endforeach
    @endif

         
      </div>
   </div>
</div>
@endsection

@push('script')

@endpush
