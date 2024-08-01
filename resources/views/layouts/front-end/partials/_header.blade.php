<!--  Modal -->


<!--  Modal1 -->
<div id="popup-modal-register" tabindex="-1" class="modal-wrap-pop hidden fixed z-50 inset-0 overflow-y-auto">
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
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity overflow-y-auto">
      <!-- Modal content -->
      <div class="">
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
                shadow-xl
                transform
                transition-all
                sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6
                rounded-20px
                mx-auto
              ">
          <div>

            <img id="close_register" src="{{asset('assets/front-end/icons/Cross.svg')}}" alt="" />
            <div class="
                    mx-auto
                    flex
                    items-center
                    justify-center
                    h-12
                    w-12
                    rounded-full
                  ">

              <img src="{{asset('assets/front-end/icons/Logo.svg')}}" alt="" />
            </div>

          </div>

          <div class="flex flex-col justify-start items-center mt-4">
            <div class="flex flex-row justify-cener mt-4 mb-8">
              <button onclick="location.href='{{route('customer.auth.register')}}'" id="new-register" type="button" class="
                      inline-flex
                      items-center
                      px-6
                      py-3
                      pt-4
                      text-[10px]
                      md:text-[15px]
                      font-bold
                      rounded-md
                      rounded-[10px]
                      hover:text-[#CC9933]
                    ">
                    تسجيل كعضوة جديدة
              </button>
              <button id="login" onclick="location.href='{{route('customer.auth.login')}}'" type="button" class="inline-flex items-center px-6 py-3 pt-4 border border-transparent text-[10px] md:text-[15px] font-bolds rounded-md shadow-sm text-white bg-[#CC9933] focus:ring-2 focus:ring-offset-2 rounded-[10px]">
                تسجيل الدخول الى زاد
              </button>
            </div>
            <button type="button" class="
                    inline-flex
                    items-center
                    justify-center
                    px-10
                    md:px-[68px]
                    py-3
                    pt-4
                    border border-[#9A92CC]
                    shadow-sm
                    text-[#201A3C]
                    rounded-md
                    bg-white
                    hover:bg-[#CC9933] hover:text-white
                      rounded-[10px]
                    text-[12px]
                    md:text-[14px]
                    mb-4
                  ">
              تسجيل الدخول بواسطة فيس بوك
              <!-- Heroicon name: solid/mail -->
              <img class="pl-2 pb-1" src="{{asset('assets/front-end/icons/FaceBookIcon.svg')}}" alt="" />

            </button>
            <button type="button" class="
                    inline-flex
                    items-center
                    justify-center
                    px-11
                    md:px-[86px]
                    py-3
                    border border-[#9A92CC]
                    shadow-sm
                    text-[#201A3C]
                    font-medium
                    rounded-md
                    bg-white
                    hover:bg-[#CC9933] hover:text-white
                      rounded-[10px]
                    text-[14px]
                    md:text-[14px]
                    mb-4
                  ">
              تسجيل الدخول بواسطة أبل
              <!-- Heroicon name: solid/mail -->
              <img class="pl-2 pb-1" src="{{asset('assets/front-end/icons/AppleIcon.svg')}}" alt="" />

            </button>
            <button type="button" class="
                    inline-flex
                    items-center
                    justify-center
                    px-12
                    md:px-[75px]
                    py-3
                    border border-[#9A92CC]
                    shadow-sm
                    text-[#201A3C]
                    font-medium
                    rounded-md
                    bg-white
                    hover:bg-[#CC9933] hover:text-white
                    rounded-[10px]
                    text-[12px]
                    md:text-[14px]
                  ">
              تسجيل الدخول بواسطة جوجل
              <!-- Heroicon name: solid/mail -->

              <img class="pl-2 pb-1" src="{{asset('assets/front-end/icons/GoogleIcon.svg')}}" alt="" />
            </button>
          </div>
          <div class="flex flex-row justify-between items-center my-4 sm:max-w-[290px] md:max-w-[342px] sm:ml-20 md:ml-14">
            <div class="border-b-2 border-[#CDCCD2] w-[45%]"></div>
            <span class="">او</span>
            <div class="border-b-2 border-[#CDCCD2] w-[45%]"></div>
          </div>

          <form id="login-form" class="space-y-2 flex flex-col items-center" action="{{route('customer.auth.login')}}" method="post">
            @csrf
            <!-- {{ csrf_field() }} -->
            <div class="-mt-2">
              <label class="
                      block
                      text-xs
                      md:text-sm
                      text-right
                      font-medium
                      text-[#201A3C]
                    ">
                عنوان البريد الالكتروني
              </label>
              <div class="mt-1">
                <input id="si-email" name="user_id" type="email" autocomplete="email" required="" class="
                        inline-flex
                        items-center
                        justify-center
                        px-9
                        md:px-20
                        py-3
                        border border-[#9A92CC]
                        shadow-sm
                        text-[#201A3C]
                        font-medium
                        bg-white
                        rounded-[10px]
                        text-[17px]
                        focus:border-[#CC9933] focus:outline-none
                      " />
              </div>
            </div>
            <div class="pb-2">
              <label class="
                      block
                      text-xs
                      md:text-sm
                      font-medium
                      text-right text-[#201A3C]
                      pr-1
                      pb-1
                    ">
                كلمة المرور
              </label>
              <div>
                <input id="si-password" name="password" type="password" autocomplete="current-password" required="" class="
                        inline-flex
                        items-center
                        justify-center
                        text-left
                        px-9
                        md:px-20
                        py-3
                        border border-[#9A92CC]
                        shadow-sm
                        text-[#201A3C]
                        font-medium
                        bg-white
                      rounded-[10px]
    
                        text-[17px]
                        focus:border-[#CC9933] focus:outline-none
                      " />
              </div>
            </div>
        
        <button type="submit" class="
                  inline-flex
                  items-center
                  justify-center
                  px-12
                  md:px-[120px]
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
                  duration-300
                ">
          تسجيل الدخول
        </button>
        <button type="button" class="text-[#CC9933] text-sm font-bold ">
          هل نسيت كلمة المرور؟
        </button>
        </form>
       
        <form id="register-form" class="space-y-2 flex flex-col items-center" action="{{route('customer.auth.register')}}" method="post">
        @csrf  
        
        
        <div class="-mt-2">
            <label class="
                      block
                      text-xs
                      md:text-sm
                      text-right
                      font-medium
                      text-[#201A3C]
                    ">
              الأسم
            </label>
            <div class="mt-1">
              <input id="f_name" name="f_name" type="text" autocomplete="f_name" required="" class="
                        inline-flex
                        items-center
                        justify-center
                        px-9
                        md:px-20
                        py-3
                        border border-[#9A92CC]
                        shadow-sm
                        text-[#201A3C]
                        font-medium
                        bg-white
                       rounded-[10px]
                        text-[17px]
                        focus:border-[#CC9933] focus:outline-none
                      " />
            </div>
          </div>
        <div class="-mt-2">
            <label class="
                      block
                      text-xs
                      md:text-sm
                      text-right
                      font-medium
                      text-[#201A3C]
                    ">
              عنوان البريد الالكتروني
            </label>
            <div class="mt-1">
              <input id="email" name="email" type="email" autocomplete="email" required="" class="
                        inline-flex
                        items-center
                        justify-center
                        px-9
                        md:px-20
                        py-3
                        border border-[#9A92CC]
                        shadow-sm
                        text-[#201A3C]
                        font-medium
                        bg-white
                       rounded-[10px]
                        text-[17px]
                        focus:border-[#CC9933] focus:outline-none
                      " />
            </div>
          </div>

          <div>
            <label for="phone-number" class="
                      block
                      text-xs
                      md:text-sm
                      font-medium
                      text-right text-[#201A3C]
                      pr-1
                      pb-1
                    ">رقم الهاتف</label>
            <div class="mt-1 relative rounded-md shadow-sm">
              <div class="absolute inset-y-0 left-0 flex items-center">
                <label for="country" class="sr-only">Country</label>
                <select id="country" name="country" autocomplete="country" class="
                          focus:ring-indigo-500 focus:border-indigo-500
                          h-full
                          py-0
                          pl-3
                          pr-7
                          border-transparent
                          bg-transparent
                          text-black
                          sm:text-base
                          font-bold
                          rounded-md
                          hidden md:flex
                        ">
                  <option>+972</option>
                  <option>+970</option>
                  <option>+666</option>
                </select>
              </div>
              <input type="text" name="phone" id="phone-number" class="
                        inline-flex
                        items-center
                        justify-center
                        text-center
                        px-14
                        md:px-24
                        py-3
                        pt-4
                        border border-[#9A92CC]
                        focus:border-[#CC9933] focus:outline-none
                        shadow-sm
                        text-[#201A3C]
                        font-medium
                        bg-white
                       rounded-[10px]
                        text-[14px]
                      " placeholder="+1 (555) 987-6543" />
            </div>
          </div>

          <div class="pb-2">
            <label class="
                      block
                      text-xs
                      md:text-sm
                      font-medium
                      text-right text-[#201A3C]
                      pr-1
                      pb-1
                    ">
              كلمة المرور
            </label>
            <div>
              <input name="password" type="password" autocomplete="current-password" required="" class="
                        inline-flex
                        items-center
                        justify-center
                        text-left
                        px-9
                        md:px-20
                        py-3
                        border border-[#9A92CC]
                        shadow-sm
                        text-[#201A3C]
                        font-medium
                        bg-white
                       rounded-[10px]
                        text-[17px]
                        focus:border-[#CC9933] focus:outline-none
                      " />
            </div>
          </div>
          <div class="pb-2">
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
              <input name="con_password" type="password" autocomplete="current-password" required="" class="
                      inline-flex
                        items-center
                        justify-center
                        text-left
                        px-9
                        md:px-20
                        py-3
                        border border-[#9A92CC]
                        shadow-sm
                        text-[#201A3C]
                        font-medium
                        bg-white
                        rounded-[10px]
                        text-[17px]
                        focus:border-[#CC9933] focus:outline-none
                      " />
            </div>
          </div>
          <button type="submit" class="
                    inline-flex
                    items-center
                    justify-center
                    px-24
                    md:px-[120px]
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
                    md:text-[17px]
                    duration-300
                  ">
            تسجيل الدخول
          </button>
        </form>
      </div>
    </div>
  </div>
 </div>
</div>

<!--  Modal2 -->
<div id="popup-modal-compleate-register" tabindex="-1" class="modal-wrap-pop hidden fixed z-50 inset-0 overflow-y-auto">
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
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity overflow-y-auto">
      <!-- Modal content -->
      <div class="">
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
                shadow-xl
                transform
                transition-all
                sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6
                rounded-20px
                mx-auto
              ">
          <div>
            <img id="close-register-compleate" src="{{asset('assets/front-end/icons/Cross.svg')}}" alt="" />

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

          <div class="space-y-2 pb-6 flex flex-col items-center">
            <p class="text-center my-6 text-[18px] font-bold">
              !تهانينا! تم الربط بنجاح
            </p>
            <button type="submit" class="
                    space-y-2
                    inline-flex
                    items-center
                    justify-center
                    px-12
                    md:px-[80px]
                    py-3
                    border border-[#9A92CC]
                    shadow-sm
                    font-bold
                    rounded-md
                    text-white
                    bg-[#201A3C]
                    hover:bg-[#CC9933]
                    rounded-[20px]
                    text-[14px]
                    md:text-[16px]
                  ">
              متابعة الى الرئيسية
            </button>
          </div>
        </div>



      </div>
    </div>


  </div>
 </div>
</div>
<!--  Modal3 -->
<div id="popup-modal-reset-password" tabindex="-1" class="hidden fixed z-50 inset-0 overflow-y-auto">
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
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity overflow-y-auto">
      <!-- Modal content -->
      <div class="">
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
                shadow-xl
                transform
                transition-all
                sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6
                rounded-20px
                mx-auto
              ">
          <div>
            <img id="close-reset-password" src="{{asset('assets/front-end/icons/Cross.svg')}}" alt="" />
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

          <form class="space-y-2 flex flex-col items-center">
            <div class="py-4">
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
                <input id="text" name="text" type="text" autocomplete="current-text" required="" class="
                        inline-flex
                        items-center
                        justify-center
                        px-[75px]
                        md:px-16
                        py-3
                        border border-[#9A92CC]
                        shadow-sm
                        text-[#201A3C]
                        font-medium
                        bg-white
                        rounded-[10px]
                        text-[14px]
                        focus:border-[#CC9933] focus:outline-none
                      " />
              </div>
            </div>
            <button type="submit" class="
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
              تأكيد اعادة تعين كلمة المرور
            </button>
          </form>
        </div>

      </div>
    </div>


    </div>
</div>

<!--  Modal4 -->
<div id="popup-modal-reset-new-password" tabindex="-1" class="modal-wrap-pop hidden fixed z-50 inset-0 overflow-y-auto">
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
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity overflow-y-auto">
      <!-- Modal content -->
      <div class="">
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
                shadow-xl
                transform
                transition-all
                sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6
                rounded-20px
                mx-auto
              ">
          <div>
            <img id="close-reset-new-password" src="{{asset('assets/front-end/icons/Cross.svg')}}" alt="" />
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

          <form class="space-y-2 flex flex-col items-center">
            <div class="py-2">
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
                <input name="password" type="password" autocomplete="current-password" required="" class="
                        inline-flex
                        items-center
                        justify-center
                        px-9
                        md:px-16
                        py-3
                        border border-[#9A92CC]
                        shadow-sm
                        text-[#201A3C]
                        font-medium
                        bg-white
                        rounded-[20px]
                        text-[17px]
                        focus:border-[#CC9933] focus:outline-none
                      " />
              </div>
            </div>
            <div class="pb-4">
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
                <input name="password" type="password" autocomplete="current-password" required="" class="
                        inline-flex
                        items-center
                        justify-center
                        px-9
                        md:px-16
                        py-3
                        border border-[#9A92CC]
                        shadow-sm
                        text-[#201A3C]
                        font-medium
                        bg-white
                        rounded-[20px]
                        text-[17px]
                        focus:border-[#CC9933] focus:outline-none
                      " />
              </div>
            </div>
            <button type="submit" class="
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
              تأكيد اعادة تعين كلمة المرور
            </button>
          </form>
        </div>

      </div>
    </div>


   </div>
</div>



<!--  End Modal -->

<style>
  .tabs {
    background: #CC9933;
    min-height: 60px;
  }

  .tabs nav {
    min-height: 60px;
  }
</style>


<header class="box-shadow-sm rtl">
  @php($categories = App\Model\Category::where('position', 0)->take(12)->get())
  @php($auth = auth('customer')->id()) 

  <nav class="bg-white my-2">
    <div class="container max-w-7xl mx-auto sm:px-6 ">
      <div class="relative flex items-center justify-between h-16 mx-6 sm:mx-0">


        <div class="logo-wrap absolute inset-y-0 right-0 flex items-center sm:hidden">
          <a href="/"><img src="{{asset('assets/front-end/icons/Logo.svg')}}" alt="logo" /></a>
        </div>

        @if($auth = auth('customer')->id())
        <div class="hidden sm:flex">
          <a href="/"><img src="{{asset('assets/front-end/icons/Logo.svg')}}" alt="logo" /></a>
        </div>
        @endif
        
        <div class="header-icons absolute inset-y-0 left-0 sm:right-0 flex items-center pr-2 sm:static sm:inset-auto sm:pr-0">
          
          <!-- favourite -->
          <button type="button" class="
                  p-1
                  pl-3
                  rounded-full
                  text-gray-400
                  hover:text-white
                  focus:outline-none                  
                " onclick="location.href='{{route('wishlists')}}'">
            {{-- <img src="{{asset('assets/front-end/icons/Favourite.svg')}}" alt="" /> --}}
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="21" viewBox="0 0 34 31" fill="none">
              <path d="M31.3254 3.77914C29.5801 1.88626 27.1854 0.84375 24.5818 0.84375C22.6357 0.84375 20.8534 1.45902 19.2844 2.67232C18.4927 3.28476 17.7753 4.03404 17.1428 4.90859C16.5105 4.0343 15.7929 3.28476 15.0009 2.67232C13.4321 1.45902 11.6499 0.84375 9.70374 0.84375C7.10016 0.84375 4.70519 1.88626 2.95996 3.77914C1.23556 5.6499 0.285645 8.20563 0.285645 10.9759C0.285645 13.8272 1.34822 16.4372 3.6295 19.1899C5.67028 21.6523 8.60335 24.152 11.9999 27.0465C13.1597 28.0349 14.4744 29.1554 15.8395 30.3489C16.2001 30.6648 16.6628 30.8386 17.1428 30.8386C17.6225 30.8386 18.0855 30.6648 18.4456 30.3494C19.8107 29.1557 21.1261 28.0347 22.2864 27.0457C25.6825 24.1517 28.6156 21.6523 30.6563 19.1897C32.9376 16.4372 33.9999 13.8272 33.9999 10.9756C33.9999 8.20563 33.05 5.6499 31.3254 3.77914Z" fill="#201A3C"/>
              </svg>

          </button>

          <!-- profile -->
          <div 
          {{--onclick="location.href='{{$auth == null?route('customer.auth.login') :route('account-oder')}}'" --}}
          class="
                  p-1
                  pl-3
                  rounded-full
                  text-gray-400
                  hover:text-white
                  focus:outline-none  
                  nav-item                
                ">
                  
            <a class="stop-link text-white hover:text-gray-800 px-3 py-2 font-shamelnormal text-[16px] rounded-md fontnnn" href="{{$auth == null? route('customer.auth.login') : route('account-oder')}}">
             <!-- <img src="{{asset('assets/front-end/icons/Profile.svg')}}" alt="" />  -->
              <svg width="24" height="30" viewBox="0 0 35 34" fill="none">
                <g clip-path="url(#clip0_337_440)">
                <path d="M17.1409 16.2403C19.3721 16.2403 21.304 15.4401 22.8826 13.8613C24.4611 12.2827 25.2614 10.3512 25.2614 8.11988C25.2614 5.88928 24.4611 3.95757 22.8823 2.3785C21.3035 0.800207 19.3718 0 17.1409 0C14.9096 0 12.9781 0.800207 11.3995 2.37876C9.82098 3.95731 9.02051 5.88902 9.02051 8.11988C9.02051 10.3512 9.82098 12.283 11.3998 13.8615C12.9786 15.4398 14.9103 16.2403 17.1409 16.2403Z" fill="#201A3C"/>
                <path d="M31.3494 25.9244C31.3039 25.2675 31.2118 24.5509 31.0762 23.7941C30.9394 23.0317 30.7632 22.311 30.5523 21.6523C30.3344 20.9714 30.0381 20.2991 29.6718 19.6547C29.2916 18.986 28.8451 18.4036 28.344 17.9244C27.8201 17.4231 27.1786 17.02 26.4367 16.726C25.6975 16.4336 24.8782 16.2854 24.0019 16.2854C23.6577 16.2854 23.3249 16.4266 22.6821 16.8451C22.2865 17.1031 21.8238 17.4015 21.3073 17.7315C20.8656 18.0129 20.2673 18.2765 19.5283 18.5152C18.8074 18.7485 18.0753 18.8669 17.3528 18.8669C16.6302 18.8669 15.8985 18.7485 15.1767 18.5152C14.4385 18.2768 13.8402 18.0132 13.3991 17.7318C12.8874 17.4048 12.4244 17.1065 12.0229 16.8449C11.3809 16.4264 11.0478 16.2852 10.7036 16.2852C9.82704 16.2852 9.00806 16.4336 8.26906 16.7263C7.52776 17.0198 6.886 17.4228 6.36152 17.9247C5.86072 18.4041 5.41393 18.9862 5.03427 19.6547C4.66825 20.2991 4.37193 20.9712 4.15381 21.6525C3.94315 22.3113 3.76695 23.0317 3.63011 23.7941C3.49455 24.5498 3.40247 25.2667 3.35694 25.9252C3.31219 26.5703 3.28955 27.2398 3.28955 27.9161C3.28955 29.676 3.849 31.1007 4.95222 32.1514C6.0418 33.1883 7.48352 33.7143 9.23672 33.7143H25.4704C27.2236 33.7143 28.6648 33.1885 29.7546 32.1514C30.8581 31.1015 31.4175 29.6765 31.4175 27.9158C31.4173 27.2365 31.3944 26.5664 31.3494 25.9244Z" fill="#201A3C"/>
                </g>
                <defs>
                <clipPath id="clip0_337_440">
                <rect width="33.7143" height="33.7143" fill="white" transform="translate(0.523926)"/>
                </clipPath>
                </defs>
              </svg>
            </a>
           

            @if($auth == null)
            <div class="dropdown-menu bg-white rounded dropdown-menu bg-white drop-shadow-lg rounded left-[-80px] sm:right-0">
              <a class="dropdown-item py-2 pt-3 register" href="{{route('customer.auth.login')}}"> تسجيل دخول</a>
              <hr style="border-bottom: 1px solid rgba(32, 27, 61, 0.4);">
              <a class="dropdown-item py-2 pt-3 register" href="{{route('customer.auth.register')}}">انشاء حساب جديد</a>
            </div>

            @else            
            <div class="dropdown-menu bg-white rounded dropdown-menu bg-white drop-shadow-lg rounded {{$auth == null ? '' : 'sm:left-0 sm:right-auto' }} left-[-80px] sm:right-0">              
                          
              <a  href="{{route('user-account')}}" class="flex dropdown-item duration-300 hover:text-[#fff] justify-between px-2 py-2 pt-3 border-b border-[#201b3d66]">
               <span class="truncate">الملف الشخصي </span>
               <svg width="11" height="17" viewBox="0 0 11 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.1582 16.1799L10.1582 0.820002C10.1582 0.0931492 9.28049 -0.277135 8.75934 0.244005L1.07932 7.92396C0.763893 8.23939 0.763893 8.76053 1.07932 9.07609L8.75934 16.7561C9.28049 17.2771 10.1582 16.9068 10.1582 16.1799Z" fill="#212529"></path>
               </svg>
              </a>              
              <a href="{{route('account-oder') }}" class="flex dropdown-item duration-300 hover:text-[#fff] justify-between px-2 py-2 pt-3 border-b border-[#201b3d66]">
                <span class="truncate">طلباتي </span>
                <svg width="11" height="17" viewBox="0 0 11 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.1582 16.1799L10.1582 0.820002C10.1582 0.0931492 9.28049 -0.277135 8.75934 0.244005L1.07932 7.92396C0.763893 8.23939 0.763893 8.76053 1.07932 9.07609L8.75934 16.7561C9.28049 17.2771 10.1582 16.9068 10.1582 16.1799Z" fill="#212529"></path>
                </svg>
              </a>              
              <a href="{{route('wishlists')}}" class="flex dropdown-item duration-300 hover:text-[#fff] justify-between px-2 py-2 pt-3 border-b border-[#201b3d66]">
                <span class="truncate">المفضلة</span>
                <svg width="11" height="17" viewBox="0 0 11 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.1582 16.1799L10.1582 0.820002C10.1582 0.0931492 9.28049 -0.277135 8.75934 0.244005L1.07932 7.92396C0.763893 8.23939 0.763893 8.76053 1.07932 9.07609L8.75934 16.7561C9.28049 17.2771 10.1582 16.9068 10.1582 16.1799Z" fill="#212529"></path>
                </svg>
              </a>
              <a class="flex dropdown-item duration-300 hover:text-[#fff] justify-between px-2 py-2 pt-3" href="{{route('customer.auth.logout')}}">
                <span class="truncate">تسجيل الخروج</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23" fill="none">
                  <path d="M6.73828 17.6094V19.4062C6.73828 21.3879 8.35038 23 10.332 23H19.3613C21.343 23 22.9551 21.3879 22.9551 19.4062V3.59375C22.9551 1.6121 21.343 0 19.3613 0H10.332C8.35038 0 6.73828 1.6121 6.73828 3.59375V5.39062C6.73828 5.88687 7.14047 6.28906 7.63672 6.28906C8.13297 6.28906 8.53516 5.88687 8.53516 5.39062V3.59375C8.53516 2.60301 9.34129 1.79688 10.332 1.79688H19.3613C20.3521 1.79688 21.1582 2.60301 21.1582 3.59375V19.4062C21.1582 20.397 20.3521 21.2031 19.3613 21.2031H10.332C9.34129 21.2031 8.53516 20.397 8.53516 19.4062V17.6094C8.53516 17.1131 8.13297 16.7109 7.63672 16.7109C7.14047 16.7109 6.73828 17.1131 6.73828 17.6094ZM0.612938 9.95669L2.62477 7.94485C2.97572 7.5939 3.54462 7.5939 3.89539 7.94485C4.24635 8.29563 4.24635 8.86452 3.89539 9.2153L2.46439 10.6465H13.252C13.7482 10.6465 14.1504 11.0487 14.1504 11.5449C14.1504 12.0412 13.7482 12.4434 13.252 12.4434H2.46439L3.89539 13.8745C4.24635 14.2253 4.24635 14.7942 3.89539 15.145C3.71992 15.3205 3.49004 15.4082 3.26017 15.4082C3.03012 15.4082 2.80025 15.3205 2.62477 15.145L0.612938 13.1332C-0.262863 12.2574 -0.262863 10.8325 0.612938 9.95669Z" fill="#212529"/>
                </svg>
              </a>
            </div>
            @endif
          </div>
          <!-- cart -->
          <div id="cart_items" class="nav-item">
            <div class="
                  cart-icon
                  cursor-pointer
                  p-1
                  pl-3
                  rounded-full
                  text-gray-400
                  hover:text-white
                  focus:outline-none                                  
                "               
                {{-- onclick=" if (window.innerWidth > 767) { location.href='{{route('shop-cart')}}'}" --}}
                >
              @php($cart=\App\CPU\CartManager::get_cart())
              <span class="products-counter absolute d-block h-5 w-5 text-white text-center rounded-full">{{$cart->count()}}</span>
              {{-- <img src="{{asset('assets/front-end/icons/Cart.svg')}}" alt="" /> --}}
              <svg xmlns="http://www.w3.org/2000/svg" width="19" height="26" viewBox="0 0 24 32" fill="none">
                <path d="M11.6191 0.0537109C9.94255 0.0537109 8.33467 0.719717 7.14918 1.90521C5.96368 3.09071 5.29767 4.69859 5.29767 6.37514V7.42871H4.42321C3.53622 7.42778 2.68305 7.76898 2.04131 8.38128C1.39957 8.99358 1.01871 9.8298 0.978028 10.7159L0.145706 28.0471C0.124369 28.5132 0.197622 28.9787 0.361046 29.4157C0.524471 29.8526 0.774685 30.252 1.0966 30.5897C1.41853 30.9273 1.80549 31.1963 2.23416 31.3804C2.66284 31.5645 3.12435 31.6599 3.59089 31.6609H19.6473C20.1139 31.6599 20.5754 31.5645 21.004 31.3804C21.4327 31.1963 21.8197 30.9273 22.1416 30.5897C22.4635 30.252 22.7137 29.8526 22.8772 29.4157C23.0406 28.9787 23.1138 28.5132 23.0925 28.0471L22.2602 10.7159C22.2195 9.8298 21.8386 8.99358 21.1969 8.38128C20.5552 7.76898 19.702 7.42778 18.815 7.42871H17.9405V6.37514C17.9405 4.69859 17.2745 3.09071 16.089 1.90521C14.9035 0.719717 13.2957 0.0537109 11.6191 0.0537109ZM7.40482 6.37514C7.40482 5.25744 7.84882 4.18552 8.63915 3.39519C9.42948 2.60486 10.5014 2.16085 11.6191 2.16085C12.7368 2.16085 13.8087 2.60486 14.5991 3.39519C15.3894 4.18552 15.8334 5.25744 15.8334 6.37514V7.42871H7.40482V6.37514ZM5.67696 11.8432C5.67696 11.6348 5.73875 11.4311 5.85452 11.2578C5.97028 11.0846 6.13483 10.9495 6.32735 10.8698C6.51986 10.7901 6.7317 10.7692 6.93607 10.8098C7.14044 10.8505 7.32817 10.9508 7.47552 11.0982C7.62286 11.2455 7.72321 11.4333 7.76386 11.6376C7.80451 11.842 7.78365 12.0538 7.7039 12.2464C7.62416 12.4389 7.48912 12.6034 7.31586 12.7192C7.1426 12.835 6.93891 12.8967 6.73053 12.8967C6.4511 12.8967 6.18313 12.7857 5.98554 12.5882C5.78796 12.3906 5.67696 12.1226 5.67696 11.8432ZM15.4541 11.8432C15.4541 11.6348 15.5159 11.4311 15.6317 11.2578C15.7474 11.0846 15.912 10.9495 16.1045 10.8698C16.297 10.7901 16.5088 10.7692 16.7132 10.8098C16.9176 10.8505 17.1053 10.9508 17.2527 11.0982C17.4 11.2455 17.5004 11.4333 17.541 11.6376C17.5817 11.842 17.5608 12.0538 17.4811 12.2464C17.4013 12.4389 17.2663 12.6034 17.093 12.7192C16.9198 12.835 16.7161 12.8967 16.5077 12.8967C16.2283 12.8967 15.9603 12.7857 15.7627 12.5882C15.5651 12.3906 15.4541 12.1226 15.4541 11.8432Z" fill="#201A3C"/>
              </svg>

            </div>

            @include('layouts.front-end.partials.cart')
          </div>

          <!-- nav Bar Left Icons -->
          <!-- search -->
          <button type="button" class="
                  search-btn
                  p-1                  
                  rounded-full
                  text-gray-400
                  hover:text-white
                  focus:outline-none                  
                " 
                {{-- onclick="location.href='{{route('products',['data_from'=>'latest'])}}'" --}}
                >
            
              <svg class="search-ic" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 34 34" fill="none">
                <path d="M13.5689 27.1266C16.5824 27.1267 19.5096 26.1213 21.887 24.2696L30.8561 33.2386C31.5261 33.8857 32.5937 33.8672 33.2408 33.1971C33.8721 32.5435 33.8721 31.5074 33.2408 30.8539L24.2717 21.8848C28.8666 15.97 27.7966 7.45026 21.8818 2.85541C15.967 -1.73943 7.44733 -0.669453 2.85248 5.24535C-1.74236 11.1602 -0.672383 19.6799 5.24242 24.2747C7.62367 26.1246 10.5535 27.1281 13.5689 27.1266ZM6.36237 6.36011C10.3425 2.37992 16.7955 2.37985 20.7757 6.35997C24.7559 10.3401 24.756 16.7931 20.7759 20.7733C16.7958 24.7535 10.3427 24.7536 6.36252 20.7735C6.36245 20.7734 6.36245 20.7734 6.36237 20.7733C2.38225 16.8222 2.3588 10.3927 6.30992 6.41256C6.32738 6.39503 6.34484 6.37757 6.36237 6.36011Z" fill="#201A3C"/>
              </svg>
              <svg class="close-ic hidden" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 31 30" fill="none">
                <path d="M19.0143 15L30.2317 26.2178C30.5402 26.5266 30.7105 26.9386 30.711 27.3779C30.711 27.8174 30.5407 28.2299 30.2317 28.5382L29.2487 29.5209C28.9396 29.8305 28.5276 30 28.0879 30C27.6488 30 27.2368 29.8305 26.9278 29.5209L15.7105 18.3039L4.49265 29.5209C4.18409 29.8305 3.77187 30 3.33233 30C2.89327 30 2.48105 29.8305 2.1725 29.5209L1.18902 28.5382C0.548974 27.8982 0.548974 26.8571 1.18902 26.2178L12.4066 15L1.18902 3.78265C0.880215 3.47336 0.710204 3.06138 0.710204 2.62209C0.710204 2.18279 0.880215 1.77081 1.18902 1.46177L2.17225 0.479019C2.48081 0.169731 2.89327 -3.8147e-05 3.33208 -3.8147e-05C3.77163 -3.8147e-05 4.18385 0.169731 4.4924 0.479019L15.7102 11.6963L26.9275 0.479019C27.2366 0.169731 27.6486 -3.8147e-05 28.0876 -3.8147e-05H28.0881C28.5274 -3.8147e-05 28.9394 0.169731 29.2484 0.479019L30.2314 1.46177C30.54 1.77057 30.7102 2.18279 30.7102 2.62209C30.7102 3.06138 30.54 3.47336 30.2314 3.78241L19.0143 15Z" fill="#201B3D"/>
                </svg>
          </button>
          {{-- Start nav-btn --}}
          <!-- Mobile menu button-->
          <button type="button" class="
              sm:hidden
              inline-flex
              items-center
              justify-center
              p-2              
              rounded-md
              text-gray-400
              hover:text-white hover:bg-gray-700
              focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white
              nav-btn
            " aria-controls="mobile-menu" aria-expanded="false">
            {{-- <span class="sr-only">Open main menu</span> --}}

            <svg class="block nav-icon h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <!--
            Icon when menu is open.

            Heroicon name: outline/x

            Menu open: "block", Menu closed: "hidden"
            -->
            <svg class="hidden nav-icon h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
          {{-- End nav-btn --}}
        </div>

        @if($auth == null)
        <div class="hidden sm:flex">
          <a href="/"><img src="{{asset('assets/front-end/icons/Logo.svg')}}" alt="logo" /></a>
        </div>
        
        <div class="flex items-center justify-center sm:items-stretch sm:justify-start">
          <div class="hidden sm:block ml-0">
            <div class="flex space-x-4 items-center">
              <button onclick="location.href='{{route('customer.auth.login')}}'" type="button" class="register duration-300 login_button inline-flex items-center px-3 pt-3 pb-2 border border-transparent font-medium rounded-md shadow-sm text-white bg-login hover:bg-[#CC9933] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 rounded-[10px]">
                تسجيل الدخول
              </button>
            </div>
          </div>
        </div>
        @endif

      </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    @if($auth == null)
    <div class="hidden" id="mobile-menu">
      <div class="px-2 pt-2 pb-3 space-y-1">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        <a  href="{{route('customer.auth.login')}}" class="
                login-btn
                bg-gray-900
                text-white
                block
                px-3
                py-2
                rounded-md
                text-base
                font-medium
                duration-300
              " aria-current="page">تسجيل الدخول</a>
      </div>
    </div>
    @endif
  </nav>


  <div class="tabs nav-links-wrap relative bg-[#CC9933] min-h-[60px]">

    


    <div class="close-modile-wrap flex">
      <svg class="close-menu sm:hidden" width="24" height="24" viewBox="0 0 34 34" fill="none">
        <path d="M20.1149 17.0279L33.3539 3.78854C34.2154 2.92737 34.2154 1.53499 33.3539 0.673827C32.4927 -0.187337 31.1003 -0.187337 30.2392 0.673827L16.9998 13.9132L3.76089 0.673827C2.89932 -0.187337 1.50734 -0.187337 0.646175 0.673827C-0.215392 1.53499 -0.215392 2.92737 0.646175 3.78854L13.8851 17.0279L0.646175 30.2672C-0.215392 31.1284 -0.215392 32.5207 0.646175 33.3819C1.07535 33.8115 1.63964 34.0273 2.20353 34.0273C2.76742 34.0273 3.33131 33.8115 3.76089 33.3819L16.9998 20.1426L30.2392 33.3819C30.6687 33.8115 31.2326 34.0273 31.7965 34.0273C32.3604 34.0273 32.9243 33.8115 33.3539 33.3819C34.2154 32.5207 34.2154 31.1284 33.3539 30.2672L20.1149 17.0279Z" fill="#fff" fill-opacity="0.84" />
      </svg>
    </div>
    <div class="relative">
      <nav class="flex justify-center items-center min-h-[60px] header-nav mt-10 sm:mt-0" aria-label="Tabs">
        <!-- Current: "bg-gray-200 text-gray-800", Default: "text-gray-600 hover:text-gray-800" -->
        <ul class="navbar-nav flex justify-center space-x-4 items-center min-h-[60px]">
          <li class="nav-item pl-md-0 ml-0 ml-md-4">
            <a class="nav-link text-white hover:text-gray-800 px-3 py-2 font-shamelnormal text-[16px] rounded-md fontnnn" href="{{route('home')}}">الرئيسية</a>
          </li>
          <li class="nav-item pl-md-0 ml-0 ml-md-4">
            <a class="nav-link text-white hover:text-gray-800 px-3 py-2 font-shamelnormal text-[16px] rounded-md fontnnn" href="{{route('products',['data_from'=>'latest'])}}">جميع المنتجات</a>
          </li>
          
          <li class="nav-item custom-nav-drop pl-md-0 ml-0 ml-md-4 relative sm:static">
            <a class="nav-link md:ml-5 text-white hover:text-gray-800 px-3 py-2 font-shamelnormal text-[16px] rounded-md fontnnn" href="#">
              <svg class="drop-icon" width="15" height="9" viewBox="0 0 17 11" fill="none">
                <path d="M16.1799 0.842773H0.820002C0.0931492 0.842773 -0.277135 1.72049 0.244006 2.24163L7.92396 9.92165C8.23939 10.2371 8.76053 10.2371 9.07609 9.92165L16.7561 2.24163C17.2771 1.72049 16.9068 0.842773 16.1799 0.842773Z" fill="white" />
              </svg>
              فئات
            </a>
            <div class="dropdown-menu right-0 left-0 w-100 bg-transparent">
              {{-- @foreach($categories as $category)
                <a class="dropdown-item" href="{{route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])}}">{{Str::limit($category->name, 17)}}</a>
              @endforeach --}}


              <!-- This example requires Tailwind CSS v2.0+ -->
        <div class=" z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="
            flex
            items-end
            justify-center            
            pt-4
            px-4
            pb-20
            text-center
            sm:block sm:p-0
          ">
          <div
            class="inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
            aria-hidden="true" ></div>

          <div class="
              mobile-sub-menu
              absolute          
              sm:relative
              inline-block
              align-bottom
              bg-white
              rounded-b
              px-4
              pt-5
              pb-4
              text-left
              overflow-hidden
              shadow-xl
              transform
              transition-all
              sm:align-middle sm:max-w-7xl sm:w-full sm:p-6">
            <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
              <div
                class="
                  sm:h-24
                  container
                  max-w-7xl
                  mx-auto
                  sm:px-6
                  lg:px-8                  
                  px-2
                  flex
                  flex-col
                  h-[auto]
                  items-stretch
                  justify-between
                  sm:flex-row-reverse
                ">
                @foreach($categories as $category)                

                <div class="flex flex-col items-center justify-center relative">
                  <a href="{{route('products',['id'=> $category['id'],'name'=>$category['name'],'data_from'=>'category','page'=>1])}}">
                    <div class="sm:block hidden">
                      <img class="m-auto" style="max-width:90px" src="{{asset("storage/category/$category->icon")}}" alt="" />                    
                    </div>
                    <p class="pt-2 text-[17px] text-[#201A3C] text-center font-bold">{{$category['name']}}</p>
                  </a>
                  @if($loop->index != count($categories)-1)
                  <div class="categories-lines border-b border-b-[#C4C4C4] w-28 lg:w-32 absolute top-[55%] md:flex "></div>
                  @endif
                </div>
                
                @endforeach                

              </div>
            </div>
          </div>
        </div>
      </div>















            </div>
          </li>
          
          <li class="nav-item pl-md-0 ml-0 ml-md-4">
            <a class="nav-link text-white hover:text-gray-800 px-3 py-2 font-shamelnormal text-[16px] rounded-md fontnnn" href="{{route('products',['data_from'=>'featured','page'=>1])}}">جديد</a>
          </li>
          <li class="nav-item pl-md-0 ml-0 ml-md-4">
            <a class="nav-link text-white hover:text-gray-800 px-3 py-2 font-shamelnormal text-[16px] rounded-md fontnnn" href="{{route('blog')}}">مجتمع زاد</a>
          </li>
        </ul>


      </nav>
    </div>
    <img src="{{asset('assets/front-end/icons/LeftSideLogin.svg')}}" alt="" />
  </div>


  <style>
    .tabs {
      background: #CC9933;
      min-height: 60px;
    }

    .tabs nav {
      min-height: 60px;
    }
  </style>
</header>

<script>
  function myFunction() {
    $('#anouncement').addClass('d-none').removeClass('d-flex')
  }
</script>



