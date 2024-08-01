@php($overallRating = \App\CPU\ProductManager::get_overall_rating($product->reviews))


<div class="relative">
        <span onclick="addWishlist('{{$product['id']}}')" class="fav-icon add-favorit cursor-pointer absolute right-3 top-3 z-10">
        
        @php($user = auth('customer')->user())
        @if($user != null)
        @php($is_whishlist = App\Model\Wishlist::where('product_id', $product->id)->where('customer_id',$user->id)->first())
            <svg xmlns="http://www.w3.org/2000/svg" width="37" height="32" viewBox="-2 -2 40 37" fill="none">
                <path d="M34.0648 3.2449C32.1495 1.16755 29.5214 0.0234375 26.664 0.0234375C24.5283 0.0234375 22.5723 0.698669 20.8503 2.03022C19.9814 2.70235 19.1941 3.52465 18.5 4.48443C17.8061 3.52493 17.0186 2.70235 16.1494 2.03022C14.4277 0.698669 12.4717 0.0234375 10.336 0.0234375C7.47865 0.0234375 4.85027 1.16755 2.93494 3.2449C1.04249 5.29798 0 8.10279 0 11.143C0 14.2722 1.16613 17.1366 3.66974 20.1576C5.90941 22.8599 9.12833 25.6032 12.8559 28.7798C14.1288 29.8646 15.5715 31.0943 17.0696 32.4041C17.4654 32.7507 17.9733 32.9416 18.5 32.9416C19.0265 32.9416 19.5346 32.7507 19.9298 32.4046C21.4279 31.0946 22.8715 29.8643 24.1449 28.7789C27.8719 25.6029 31.0909 22.8599 33.3305 20.1573C35.8342 17.1366 37 14.2722 37 11.1427C37 8.10279 35.9575 5.29798 34.0648 3.2449Z" 
                stroke="#CC9933" stroke-width="2" fill="{{$is_whishlist == true?'#CC9933':'transparent'}}"/>
            </svg>

            @else
            <svg xmlns="http://www.w3.org/2000/svg" width="37" height="32" viewBox="-2 -2 40 37" fill="none">
                <path d="M34.0648 3.2449C32.1495 1.16755 29.5214 0.0234375 26.664 0.0234375C24.5283 0.0234375 22.5723 0.698669 20.8503 2.03022C19.9814 2.70235 19.1941 3.52465 18.5 4.48443C17.8061 3.52493 17.0186 2.70235 16.1494 2.03022C14.4277 0.698669 12.4717 0.0234375 10.336 0.0234375C7.47865 0.0234375 4.85027 1.16755 2.93494 3.2449C1.04249 5.29798 0 8.10279 0 11.143C0 14.2722 1.16613 17.1366 3.66974 20.1576C5.90941 22.8599 9.12833 25.6032 12.8559 28.7798C14.1288 29.8646 15.5715 31.0943 17.0696 32.4041C17.4654 32.7507 17.9733 32.9416 18.5 32.9416C19.0265 32.9416 19.5346 32.7507 19.9298 32.4046C21.4279 31.0946 22.8715 29.8643 24.1449 28.7789C27.8719 25.6029 31.0909 22.8599 33.3305 20.1573C35.8342 17.1366 37 14.2722 37 11.1427C37 8.10279 35.9575 5.29798 34.0648 3.2449Z" 
                stroke="#CC9933" stroke-width="2" fill="transparent"/>
            </svg>
        @endif    
          
        </span>
        <a href="{{route('product',$product->slug)}}" class="group">
          <div
            class="w-full aspect-w-1 aspect-h-1 rounded-lg sm:aspect-w-2 sm:aspect-h-3 overflow-hidden min-h-[27rem] max-h-[27rem]"
          >
            <img
              src="{{\App\CPU\ProductManager::product_image_path('thumbnail')}}/{{$product['thumbnail']}}"
                 onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'"
                 
              alt=""
              class="w-full h-full object-center object-cover group-hover:opacity-75 min-h-[27rem]"
            />
          </div>
          <div
            class="mt-4 flex justify-end text-base font-medium text-gray-900px-2"
          >
            <span class="text-[13px] text-[#201A3C] font-shamelnormal font-bold w-full">
                 {{ Str::limit($product['name'], 25) }} 
                
            </span>
          </div>
          <div
            class="mt-4 flex justify-between text-base font-medium text-gray-900"
          >
          
          @php($price_wihe_tax = $product->unit_price+ ($product->unit_price * $product->tax) / 100 )
            <div class="font-bold">{{ \App\CPU\Helpers::currency_converter($price_wihe_tax)}}</div>

          @if($product->discount > 0)
          @php ($product_discount = \App\CPU\Helpers::get_product_discount($product,$product->unit_price)) 
          @php($price_wihe_tax = ($product->unit_price + ($product->unit_price * $product->tax) / 100)+ $product_discount)
            <div class="opacity-25 font-bold">
            
              <del>
            
              {{\App\CPU\Helpers::currency_converter($price_wihe_tax)}}
              </del>
            </div>

          @endif
         
          </div>
        </a>
    </div>
