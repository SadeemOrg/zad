<!-- Footer -->

<footer class="bg-[#201A3C] pt-5 pt-md-10" aria-labelledby="footer-heading ">
@php($auth = auth('customer')->id()) 
@php($whatsapp = \App\Model\SocialMedia::where('active_status', 1)->where('name','whatsapp')->first())
    <h2 id="footer-heading" class="sr-only">Footer</h2>
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:py-8 lg:px-8 ">
      
      <div class="grid md:grid-cols-3 lg:grid-cols-4 lg:gap-8">
        <div class="space-y-4 col-span-4 md:col-span-1 lg:col-span-1">
          
          <a href="/"><img src="{{asset('assets/front-end/icons/Logo.svg')}}" class="w-20 m-auto md:m-0" alt="footer logo" /></a>
          <!-- <img class="h-10" src="https://tailwindui.com/img/logos/workflow-mark-gray-300.svg" alt="Company name" /> -->
          <div class="flex flex-row items-center justify-center md:justify-start">
          <img src="{{asset('assets/front-end/icons/email 2.svg')}}" class="w-6" alt="" />
            <p class="text-white text-[15px] md:text-[16px] inter-font pl-1.5 inter-font font-normal">customer@zadshopping.com</p>
          </div>
          <div class="flex flex-row items-center justify-center md:justify-start"">

          @if($whatsapp != null)
          <a class="flex flex-row items-center justify-center md:justify-start space-x-1" href="{{$whatsapp->link}}">
          <svg width="35" height="35" viewBox="0 0 96 96" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M48 96C74.5097 96 96 74.5097 96 48C96 21.4903 74.5097 0 48 0C21.4903 0 0 21.4903 0 48C0 74.5097 21.4903 96 48 96Z" fill="#29A71A"/>
              <path d="M69.1637 26.8366C64.1697 21.7927 57.5377 18.6995 50.4639 18.1149C43.3901 17.5302 36.3402 19.4926 30.5859 23.6481C24.8316 27.8035 20.7516 33.8785 19.0819 40.7772C17.4122 47.676 18.2627 54.9443 21.48 61.2711L18.3218 76.6038C18.2891 76.7565 18.2881 76.9142 18.3191 77.0672C18.3501 77.2201 18.4123 77.3651 18.5018 77.4929C18.633 77.687 18.8203 77.8363 19.0386 77.9211C19.2569 78.0059 19.4959 78.0221 19.7237 77.9675L34.7509 74.4057C41.06 77.5415 48.277 78.3373 55.1178 76.6515C61.9585 74.9657 67.9793 70.9076 72.1089 65.1993C76.2384 59.491 78.2088 52.5027 77.6695 45.478C77.1302 38.4532 74.1162 31.8476 69.1637 26.8366ZM64.4782 64.2329C61.0229 67.6786 56.5734 69.9531 51.7569 70.7359C46.9404 71.5188 41.9996 70.7705 37.6309 68.5966L35.5364 67.5602L26.3237 69.742L26.3509 69.6275L28.26 60.3548L27.2346 58.3311C25.0023 53.9471 24.2149 48.9692 24.985 44.1103C25.7552 39.2514 28.0434 34.7609 31.5218 31.282C35.8926 26.9126 41.8198 24.458 48 24.458C54.1803 24.458 60.1075 26.9126 64.4782 31.282C64.5154 31.3247 64.5555 31.3648 64.5982 31.402C68.9148 35.7827 71.3245 41.6922 71.302 47.8422C71.2796 53.9922 68.8267 59.8839 64.4782 64.2329Z" fill="white"/>
              <path d="M63.6601 57.4313C62.531 59.2095 60.7474 61.3858 58.5056 61.9258C54.5783 62.8749 48.551 61.9586 41.051 54.9658L40.9583 54.884C34.3638 48.7695 32.651 43.6804 33.0656 39.644C33.2947 37.3531 35.2038 35.2804 36.8129 33.9277C37.0672 33.7105 37.3689 33.556 37.6937 33.4763C38.0186 33.3966 38.3575 33.394 38.6835 33.4688C39.0095 33.5435 39.3135 33.6935 39.5711 33.9067C39.8288 34.1199 40.033 34.3905 40.1674 34.6968L42.5947 40.1513C42.7524 40.505 42.8109 40.8949 42.7638 41.2793C42.7167 41.6637 42.5658 42.028 42.3274 42.3331L41.1001 43.9258C40.8368 44.2547 40.6779 44.6549 40.6439 45.0748C40.6098 45.4947 40.7023 45.9152 40.9092 46.2822C41.5965 47.4877 43.2438 49.2604 45.071 50.9022C47.1219 52.7567 49.3965 54.4531 50.8365 55.0313C51.2218 55.1887 51.6454 55.2271 52.0528 55.1416C52.4601 55.056 52.8325 54.8504 53.1219 54.5513L54.5456 53.1167C54.8203 52.8459 55.1619 52.6527 55.5356 52.5569C55.9093 52.461 56.3017 52.466 56.6729 52.5713L62.4383 54.2077C62.7563 54.3052 63.0479 54.4742 63.2906 54.7017C63.5333 54.9292 63.7207 55.2092 63.8386 55.5203C63.9565 55.8313 64.0017 56.1652 63.9708 56.4965C63.9399 56.8277 63.8336 57.1474 63.6601 57.4313Z" fill="white"/>
          </svg>
          <p class="font-shamelnormal md:text-[16px] mt-1.5 pl-1 text-[15px] text-white">{{$web_config['phone']->value}}</p>
         </a>
         @endif
           
          </div>
        </div>
        <div class="space-y-4 col-span-2 md:col-span-1 lg:col-span-1">
          <div class="mt-10 md:mt-0 text-center md:text-right">
            <h3
              class="
                md:text-[18px]
                text-[16px]
                font-shamelBold
                text-white
                tracking-wider
                uppercase                
              "
            >
            مميز
            </h3>
            <ul role="list" class="mt-4 space-y-4 ">
          
            <li>
                <a
                  href="{{route('products',['data_from'=>'featured'])}}"
                  class="
                    md:text-[16px]
                    text-[15px]
                    font-shamelnormal
                    text-white
                    hover:text-[#CC9933]
                  "
                >
                منتجات مميزة
                </a>
              </li>

              <li>
                <a
                  href="{{route('products',['data_from'=>'latest','page'=>1])}}"
                  class="
                    md:text-[16px]
                    text-[15px]
                    font-shamelnormal
                    text-white
                    hover:text-[#CC9933]
                  "
                >
                أحدث المنتجات
                </a>
              </li>


              <li>
                <a
                  href="{{$auth == null?route('customer.auth.login') :route('account-oder')}}"
                  class="
                    md:text-[16px]
                    text-[15px]
                    font-shamelnormal
                    text-white
                    hover:text-[#CC9933]
                  "
                >
                تتبع الطلب
                </a>
              </li>


             
              
            </ul>

            
          </div>
        </div>


        
        <div class="space-y-4 col-span-2 md:col-span-1 lg:col-span-1">
          <div class="mt-10 md:mt-0 text-center md:text-right">
            <h3
              class="
                md:text-[18px]
                text-[16px]
                font-shamelBold
                text-white
                tracking-wider
                uppercase                
              "
            >
              روابط سريعة
            </h3>
            <ul role="list" class="mt-4 space-y-4">
            
            <li>
                <a
                  href="{{route('about-us')}}"
                  class="
                    md:text-[16px]
                    text-[15px]
                    font-shamelnormal
                    text-white
                    hover:text-[#CC9933]
                  
                  "
                >
                من نحن
                </a>
              </li>

              <li>
                <a
                href="{{route('helpTopic')}}"
                  class="
                    md:text-[16px]
                    text-[15px]
                    font-shamelnormal
                    text-white
                    hover:text-[#CC9933]
                  
                  "
                >
                أسئلة متكرره
                </a>
              </li>


              <li>
                <a
                  href="{{route('privacy-policy')}}"
                  class="
                    md:text-[16px]
                    text-[15px]
                    font-shamelnormal
                    text-white
                    hover:text-[#CC9933]
                  
                  "
                >
                السياسة والخصوصية
                </a>
              </li>

              <li>
                <a
                  href="{{route('terms')}}"
                  class="
                    md:text-[16px]
                    text-[15px]
                    font-shamelnormal
                    text-white
                    hover:text-[#CC9933]
                  "
                >
                الشروط والاحكام
                </a>
              </li>

              <li>
                <a
                  href="{{route('shipping-policy')}}"
                  class="
                    md:text-[16px]
                    text-[15px]
                    font-shamelnormal
                    text-white
                    hover:text-[#CC9933]
                  "
                >
                 سياسة الشحن والاسترجاع
                </a>
              </li>

              <li>
                <a
                  href="{{route('contacts')}}"
                  class="
                    md:text-[16px]
                    text-[15px]
                    font-shamelnormal
                    text-white
                    hover:text-[#CC9933]
                  "
                >
                تواصلي معنا
                </a>
              </li>
            
            </ul>
            
          </div>
        </div>
        <div class="space-y-4 mt-12 lg:mt-0 col-span-4 md:col-span-3 lg:col-span-1">
          <div >
            <p class="text-center lg:text-right text-white text-[18px] font-bold pb-4" > تابعينا على</p>
            <!-- @php($social_media = array(["name" => "Facebook", "href" => "#","icon"=>"facebook 2.svg"],["name" => "Twitter", "href" => "#","icon"=>"twitter 2.svg"],["name" => "Painteriest", "href" => "#","icon"=>"pinterest 2.svg"],["name" => "Instagram", "href" => "#","icon"=>"instagram.svg"] )) -->

             @php($social_media = \App\Model\SocialMedia::where('active_status', 1)->get())
            
            <div class="flex social-icons-f space-x-6 lg:items-end lg:justify-end justify-center">
             @if(isset($social_media))
            @foreach ($social_media as $item)  

            @if($item->name == 'google-plus' || $item->name == 'linkedin' || $item->name == 'newsleter' || $item->name == 'whatsapp' || $item->name == 'pinterest' || $item->name == 'twitter')

            @else
            <a 
              href="{{$item->link}}"
              class="text-white hover:text-[#CC9933]"
            >
              <span class="sr-only">{{$item->name}}</span>
              

              @if($item->name == 'facebook')

              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="23" viewBox="0 0 14 26" fill="none">
                <path d="M10.7131 4.16343H13.0022V0.176567C12.6073 0.122239 11.2491 0 9.6673 0C6.36685 0 4.10596 2.07597 4.10596 5.89149V9.40298H0.463867V13.86H4.10596V25.0746H8.57133V13.861H12.0661L12.6209 9.40403H8.57029V6.33343C8.57133 5.04522 8.9182 4.16343 10.7131 4.16343Z" fill="white"/>
              </svg>

              @elseif($item->name == 'twitter')

              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="20" viewBox="0 0 26 21" fill="none">
                <path d="M23.1398 5.43133C24.1595 4.7073 25.0173 3.80357 25.7162 2.76297V2.76193C24.7832 3.17044 23.7907 3.44208 22.7543 3.57372C23.82 2.93745 24.6338 1.9376 25.0162 0.732974C24.0226 1.32536 22.9256 1.74327 21.7565 1.9773C20.8131 0.972227 19.4685 0.350586 18.0016 0.350586C15.1556 0.350586 12.8644 2.66059 12.8644 5.49193C12.8644 5.89939 12.8989 6.29118 12.9835 6.66417C8.71041 6.45521 4.92832 4.40745 2.38742 1.2867C1.94444 2.0567 1.68324 2.93745 1.68324 3.88506C1.68324 5.66536 2.59951 7.24297 3.96712 8.15715C3.14071 8.14148 2.331 7.90118 1.64459 7.52402V7.58043C1.64459 10.0785 3.42593 12.1534 5.76309 12.6319C5.34414 12.7469 4.88862 12.8012 4.41533 12.8012C4.08623 12.8012 3.75399 12.7824 3.44265 12.7134C4.10817 14.7486 5.99921 16.2458 8.24548 16.2949C6.49653 17.6625 4.27533 18.4868 1.8713 18.4868C1.45026 18.4868 1.04593 18.468 0.641602 18.4168C2.91921 19.8848 5.61682 20.7237 8.52757 20.7237C17.5994 20.7237 23.5117 13.1554 23.1398 5.43133V5.43133Z" fill="#fff"/>
                </svg>

              @elseif($item->name == 'pinterest')

              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="26" viewBox="0 0 22 26" fill="none">
                <path d="M11.161 0C4.28737 0.00104478 0.633789 4.40478 0.633789 9.20657C0.633789 11.433 1.87812 14.211 3.8705 15.0918C4.43886 15.3478 4.36364 15.0354 4.85259 13.1652C4.89125 13.0096 4.8714 12.8748 4.74603 12.7296C1.89797 9.43537 4.19021 2.66313 10.7545 2.66313C20.2547 2.66313 18.4796 15.8085 12.4074 15.8085C10.8423 15.8085 9.67632 14.5799 10.0451 13.0597C10.4923 11.2491 11.3678 9.30269 11.3678 7.99776C11.3678 4.70881 6.46782 5.19672 6.46782 9.55448C6.46782 10.9012 6.94424 11.8101 6.94424 11.8101C6.94424 11.8101 5.36767 18.1791 5.07513 19.3691C4.57991 21.3834 5.142 24.6442 5.1911 24.9252C5.2214 25.0799 5.39483 25.129 5.492 25.0015C5.64767 24.7978 7.55334 22.0793 8.08722 20.114C8.28155 19.3984 9.07871 16.4939 9.07871 16.4939C9.60423 17.4425 11.1192 18.2366 12.7333 18.2366C17.5351 18.2366 21.0059 14.0157 21.0059 8.77821C20.9892 3.75701 16.692 0 11.161 0V0Z" fill="white"/>
                </svg>

              @elseif($item->name == 'instagram')

              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 26 26" fill="none">
                <path d="M13.4669 6.09961C9.91156 6.09961 7.0332 8.9811 7.0332 12.5333C7.0332 16.0887 9.9147 18.9671 13.4669 18.9671C17.0223 18.9671 19.9007 16.0856 19.9007 12.5333C19.9007 8.97797 17.0192 6.09961 13.4669 6.09961ZM13.4669 16.7093C11.159 16.7093 9.29096 14.8402 9.29096 12.5333C9.29096 10.2265 11.1601 8.35737 13.4669 8.35737C15.7738 8.35737 17.6429 10.2265 17.6429 12.5333C17.644 14.8402 15.7748 16.7093 13.4669 16.7093Z" fill="white"/>
                <path d="M18.6329 0.0797388C16.326 -0.0278732 10.6121 -0.0226493 8.30318 0.0797388C6.27423 0.174813 4.48453 0.664813 3.04169 2.10765C0.630347 4.51899 0.938556 7.76825 0.938556 12.5335C0.938556 17.4105 0.666914 20.5845 3.04169 22.9593C5.46244 25.379 8.7587 25.0624 13.4675 25.0624C18.2986 25.0624 19.966 25.0656 21.6742 24.4042C23.9968 23.5026 25.7499 21.4266 25.9212 17.6978C26.0299 15.3899 26.0236 9.67706 25.9212 7.3681C25.7144 2.96646 23.3521 0.297052 18.6329 0.0797388V0.0797388ZM22.2844 21.3639C20.7036 22.9447 18.5106 22.8036 13.4372 22.8036C8.21333 22.8036 6.11856 22.8809 4.59005 21.3483C2.8296 19.5962 3.14826 16.7826 3.14826 12.5168C3.14826 6.74437 2.55587 2.5872 8.34915 2.29049C9.6802 2.24347 10.072 2.2278 13.4226 2.2278L13.4696 2.25914C19.0372 2.25914 23.4054 1.67616 23.6677 7.4684C23.7272 8.79004 23.7408 9.18706 23.7408 12.5324C23.7397 17.6957 23.838 19.803 22.2844 21.3639V21.3639Z" fill="white"/>
                <path d="M20.1558 7.34867C20.9861 7.34867 21.6592 6.67555 21.6592 5.84523C21.6592 5.01491 20.9861 4.3418 20.1558 4.3418C19.3255 4.3418 18.6523 5.01491 18.6523 5.84523C18.6523 6.67555 19.3255 7.34867 20.1558 7.34867Z" fill="white"/>
              </svg>

              @endif


            </a>

            @endif

            @endforeach
            @endif 
           
          </div>
        </div>
      </div>

      <div class="mt-5 border-t border-gray-200 pt-8 col-span-4">
        <p class="text-[15px] font-shamelnormal text-white text-center copy-right">
          Copyright <?php echo date("Y"); ?> Zad
        </p>        
        <a target="_blank" href="https://averotech.com/" class="mt-3 flex items-center justify-center pb-0 text-gray-300 hover:text-[#CC9933]">          
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 30 30" width="20" height="20" class="dont-flip fill-current cursor-pointer tracking-wide hover:opacity-100" style="isolation: isolate; transition: opacity 0.4s linear 0s;"><path d=" M 15 0 L 15 0 C 23.279 0 30 6.721 30 15 L 30 27.75 C 30 28.992 28.992 30 27.75 30 L 15 30 C 6.721 30 0 23.279 0 15 L 0 15 C 0 6.721 6.721 0 15 0 Z  M 25 25 L 15 25 C 12.35 25 9.8 23.95 7.93 22.07 C 6.05 20.2 5 17.65 5 15 C 5 12.35 6.05 9.8 7.93 7.93 C 9.8 6.05 12.35 5 15 5 C 17.65 5 20.2 6.05 22.07 7.93 C 23.95 9.8 25 12.35 25 15 L 25 25 Z " fill-rule="evenodd"></path></svg>
          <div class="ml-2 text-xs font-sans mt-px">By Averotech</div> 
        </a>
      </div>
    </div>
  </footer>


<!-- Footer -->
