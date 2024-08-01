
  @php($cart=\App\CPU\CartManager::get_cart())
  @php($auth = auth('customer')->id()) 
  {{-- {{$cart->count()}} --}}
<div
   class="
   cart-dropdown
   overflow-y-auto 
   absolute
   top-16
   left-[-70px] 
   sm:left-0
   {{$auth == null? 'sm:right-0' : '' }}
   mt-px
   pb-6
   bg-white
   shadow-lg
   sm:px-2
   top-full
   lg:left-0
   lg:mt-3
   lg:-mr-1.5
   lg:w-80
   lg:rounded-lg
   lg:ring-1
   lg:ring-black
   lg:ring-opacity-5
   z-50
   dropdown-menu bg-white rounded
   "
   >
   {{-- <h2 class="sr-only">Shopping Cart</h2> --}}
   <form class="max-w-3xl mx-auto px-4 for-direction">
   @if($cart->count() > 0)
      <ul role="list" class="divide-y divide-gray-200 for-direction">
      @php($sub_total=0)
      @php($total_tax=0)
      @foreach($cart as  $cartItem)
         <li class="py-6 flex flex-row items-center">
            <img
            onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'"
            src="{{\App\CPU\ProductManager::product_image_path('thumbnail')}}/{{$cartItem['thumbnail']}}"
                        
               alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt."
               class="
               object-cover
               flex-none
               w-20
               h-24
               rounded-md
               border border-gray-200
               "
               />
            <div class="flex-auto for-margin-direction">
               <h3
                  class="
                  font-shamelnormal
                  textt-[13px]
                  text-right                  
                  text-[#201A3C]
                  "
                  >
                  <a href="{{route('product',$cartItem['slug'])}}">{{$cartItem['name']}}</a>
               </h3>
               <div
                  onclick="removeFromCart({{ $cartItem['id'] }})"
                  class="
                  flex flex-row
                  justify-between
                  items-center
                  "
                  >
                 
                 
                  @php($price_wihe_tax = $cartItem['price']+$cartItem['tax'] )
                  <p class="text-[#CC9933] text-[15px] text-right pr-2">
                  {{\App\CPU\Helpers::currency_converter(($price_wihe_tax))}}
                  </p>
                  <img id="close" class="cursor-pointer" src="{{asset('assets/front-end/icons/CartDelete.svg')}}" alt="" />
                  
               </div>
               <div
                  
                  class="
                  flex flex-row
                  justify-between
                  items-center
                  mt-3
                  "
                  >
                  <p
                     class="
                     text-[#201A3C] text-[12px]
                     font-shamelnormal
                     text-right                  
                     font-bold
                     "
                     >
                     اجمالي السعر
                     
                  </p>
                  <span class="font-shamelBold text-[#201A3C]">
                     {{\App\CPU\Helpers::currency_converter(($price_wihe_tax)*$cartItem['quantity'])}}
                         </span>
                  {{-- <select
                     :id="`quantity-id`"
                     :name="`quantity-id`"
                     class="
                     mr-2
                     rounded-[10px]
                     border border-gray-300
                     py-2
                     pt-3
                     px-7
                     lg:px-2
                     text-base
                     leading-5
                     font-medium
                     text-[#201A3C] text-left
                     shadow-sm
                     focus:outline-none
                     focus:ring-1
                     focus:ring-[#9A92CC]
                     focus:border-[#9A92CC]
                     sm:text-sm
                     "
                     >
                     <option value="1" selected>{{$cartItem['quantity']}}</option>
                     <option value="2">2</option>
                     <option value="3">3</option>
                     <option value="4">4</option>
                     <option value="5">5</option>
                  </select> --}}
                  <span>x</span>
                  <span>{{$cartItem['quantity']}} </span>
               </div>
            </div>
         </li>

         @php($sub_total+=($cartItem['price'])*$cartItem['quantity'])
          @php($total_tax+=$cartItem['tax']*$cartItem['quantity'])
          @endforeach
         <li class="pt-6 text-right text-[#201A3C] text-[16px] font-bold">
         {{\App\CPU\Helpers::currency_converter($sub_total+$total_tax)}}
         </li>
         <!-- More products... -->
      </ul>
      <div class="">
         <button
            onclick="location.href='{{route('shop-cart')}}'"
            type="button"
            class="            
            rounded-[10px]
            my-4            
            py-3
            w-full
            pt-4
            border border-[#CC9933]
            text-[15px]
            font-shamelBold
            text-[#CC9933]
            bg-transparent
            focus:outline-none
            focus:ring-2
            focus:ring-offset-2
            market_button
            "
            >
         حقيبة التسوق
         </button>
      </div>
      @else
      <div  class="p-8 text-center">
         <svg class="m-auto" width="29" height="33" viewBox="0 0 29 33" fill="none">
            <path d="M28.4219 29.1328C28.4219 29.8448 27.8448 30.4219 27.1328 30.4219H25.8438V31.7109C25.8438 32.4229 25.2666 33 24.5547 33C23.8427 33 23.2656 32.4229 23.2656 31.7109V30.4219H21.9766C21.2646 30.4219 20.6875 29.8448 20.6875 29.1328C20.6875 28.4209 21.2646 27.8438 21.9766 27.8438H23.2656V26.5547C23.2656 25.8427 23.8427 25.2656 24.5547 25.2656C25.2666 25.2656 25.8438 25.8427 25.8438 26.5547V27.8438H27.1328C27.8448 27.8438 28.4219 28.4209 28.4219 29.1328ZM28.4219 9.02344V21.3984C28.4219 22.1104 27.8448 22.6875 27.1328 22.6875C26.4209 22.6875 25.8438 22.1104 25.8438 21.3984V10.3125H23.2656V14.1797C23.2656 14.8916 22.6885 15.4688 21.9766 15.4688C21.2646 15.4688 20.6875 14.8916 20.6875 14.1797V10.3125H8.3125V14.1797C8.3125 14.8916 7.73539 15.4688 7.02344 15.4688C6.31149 15.4688 5.73438 14.8916 5.73438 14.1797V10.3125H3.15625V30.4219H16.8203C17.5323 30.4219 18.1094 30.999 18.1094 31.7109C18.1094 32.4229 17.5323 33 16.8203 33H1.86719C1.15524 33 0.578125 32.4229 0.578125 31.7109V9.02344C0.578125 8.31149 1.15524 7.73438 1.86719 7.73438H5.79535C6.30743 3.38527 10.0155 0 14.5 0C18.9845 0 22.6926 3.38527 23.2047 7.73438H27.1328C27.8448 7.73438 28.4219 8.31149 28.4219 9.02344ZM20.6011 7.73438C20.1086 4.81175 17.5604 2.57812 14.5 2.57812C11.4396 2.57812 8.89135 4.81175 8.39893 7.73438H20.6011Z" fill="#CC9933"/>
         </svg>
         <p class="mt-4">حقيبة التسوق فارغة</p>
      </div>
      @endif
      
   </form>
</div>