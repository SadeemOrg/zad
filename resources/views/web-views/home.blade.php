@extends('layouts.front-end.app')

@section('title',\App\CPU\translate('Welcome To').' '.$web_config['name']->value)

@push('css_or_js')
    <meta property="og:image" content="{{asset('storage/company')}}/{{$web_config['web_logo']->value}}"/>
    <meta property="og:title" content="Welcome To {{$web_config['name']->value}} Home"/>
    <meta property="og:url" content="{{env('APP_URL')}}">
    <meta property="og:description" content="{!! substr($web_config['about']->value,0,100) !!}">

    <meta property="twitter:card" content="{{asset('storage/company')}}/{{$web_config['web_logo']->value}}"/>
    <meta property="twitter:title" content="Welcome To {{$web_config['name']->value}} Home"/>
    <meta property="twitter:url" content="{{env('APP_URL')}}">
    <meta property="twitter:description" content="{!! substr($web_config['about']->value,0,100) !!}">

    <!-- <link rel="stylesheet" href="{{asset('assets/front-end')}}/css/home.css"/> -->
    <style>
      .text-section-wrap:after, .text-section-wrap:before {
        content: '';
        position: absolute;
        left:0;
        top:0;
        bottom:0;
        background-image: url("{{asset('assets/front-end/img/lt-border.png')}}");
        display: block;
        width: 176px;
        height: 100%;
        background-size: contain;
        background-repeat: no-repeat;
        background-position: left;
      }
      .text-section-wrap:before {
        left:auto;
        right:0;
        background-image: url("{{asset('assets/front-end/img/rt-border.png')}}");
        background-position: right;
      }
      .discount-shadow {text-shadow: 0px 10px 5px rgb(0 0 0 / 25%); }  
      .mobile-discount .text-section-wrap:after, .mobile-discount .text-section-wrap:before {width:25%}
      #new-products .item {
        box-shadow: 0px 16px 24px rgba(0, 0, 0, 0.06), 0px 2px 6px rgba(0, 0, 0, 0.04), 0px 0px 1px rgba(0, 0, 0, 0.04);
      } 
      #new-products .owl-item{padding-top: 1rem; padding-bottom: 2.5rem;}
      #new-products .owl-dots {text-align: center;}
      #new-products .owl-dots .owl-dot{
        display:inline-block;
        height:20px;
        width: 20px;
        background-color: #D9D9D9;
        border-radius: 50%;
        margin: 0 3px;
      }
      #new-products .owl-dots .owl-dot.active {
        background-color: #201A3C;
      }
    </style> 

@endpush


@section('content')



    <!-- Hero (Banners + Slider)-->
    @include('web-views.partials._home-top-slider')

     <!-- Start social media icons behind slider -->
     <ul class="lateral-social-list list-none z-5 fixed m-0 p-0">
     @php($social_media = \App\Model\SocialMedia::where('active_status', 1)->get())
     @if(isset($social_media))
     @foreach ($social_media as $item)  

            @if($item->name == 'google-plus' || $item->name == 'linkedin')

            @endif

      @if($item->name == 'facebook')    
      <li class="mb-4">
         <a href="{{$item->link}}">
          <svg class="m-auto" xmlns="http://www.w3.org/2000/svg" width="13" height="27" viewBox="0 0 16 30" fill="none">
            <path d="M12.9961 4.98125H15.7349V0.21125C15.2624 0.14625 13.6374 0 11.7449 0C7.79614 0 5.09114 2.48375 5.09114 7.04875V11.25H0.733643V16.5825H5.09114V30H10.4336V16.5837H14.6149L15.2786 11.2512H10.4324V7.5775C10.4336 6.03625 10.8486 4.98125 12.9961 4.98125Z" fill="#BBBBBB"/>
          </svg>
         </a>
       </li>
       @endif
       @if($item->name == 'twitter')    
       {{--<li class="mb-4">
        <a href="{{$item->link}}">
          <svg class="m-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 30 26" fill="none">
            <path d="M26.9175 6.89125C28.1375 6.025 29.1637 4.94375 30 3.69875V3.6975C28.8837 4.18625 27.6962 4.51125 26.4562 4.66875C27.7312 3.9075 28.705 2.71125 29.1625 1.27C27.9737 1.97875 26.6612 2.47875 25.2625 2.75875C24.1337 1.55625 22.525 0.8125 20.77 0.8125C17.365 0.8125 14.6237 3.57625 14.6237 6.96375C14.6237 7.45125 14.665 7.92 14.7662 8.36625C9.65375 8.11625 5.12875 5.66625 2.08875 1.9325C1.55875 2.85375 1.24625 3.9075 1.24625 5.04125C1.24625 7.17125 2.3425 9.05875 3.97875 10.1525C2.99 10.1337 2.02125 9.84625 1.2 9.395V9.4625C1.2 12.4512 3.33125 14.9337 6.1275 15.5062C5.62625 15.6437 5.08125 15.7087 4.515 15.7087C4.12125 15.7087 3.72375 15.6862 3.35125 15.6037C4.1475 18.0387 6.41 19.83 9.0975 19.8887C7.005 21.525 4.3475 22.5112 1.47125 22.5112C0.9675 22.5112 0.48375 22.4887 0 22.4275C2.725 24.1837 5.9525 25.1875 9.435 25.1875C20.2887 25.1875 27.3625 16.1325 26.9175 6.89125Z" fill="#BBBBBB"/>
          </svg>
        </a>
      </li>--}}
      @endif

      @if($item->name == 'instagram')    
      <li class="mb-4">
        <a href="{{$item->link}}">
          <svg class="m-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 30 31" fill="none">
            <path d="M15.0051 7.29785C10.7514 7.29785 7.30762 10.7453 7.30762 14.9953C7.30762 19.2491 10.7551 22.6928 15.0051 22.6928C19.2589 22.6928 22.7026 19.2453 22.7026 14.9953C22.7026 10.7416 19.2551 7.29785 15.0051 7.29785ZM15.0051 19.9916C12.2439 19.9916 10.0089 17.7553 10.0089 14.9953C10.0089 12.2353 12.2451 9.9991 15.0051 9.9991C17.7651 9.9991 20.0014 12.2353 20.0014 14.9953C20.0026 17.7553 17.7664 19.9916 15.0051 19.9916Z" fill="#BBBBBB"/>
            <path d="M21.185 0.0952099C18.425 -0.0335401 11.5888 -0.0272901 8.82629 0.0952099C6.39879 0.20896 4.25754 0.79521 2.53129 2.52146C-0.35371 5.40646 0.0150399 9.29396 0.0150399 14.9952C0.0150399 20.8302 -0.30996 24.6277 2.53129 27.469C5.42754 30.364 9.37129 29.9852 15.005 29.9852C20.785 29.9852 22.78 29.989 24.8238 29.1977C27.6025 28.119 29.7 25.6352 29.905 21.174C30.035 18.4127 30.0275 11.5777 29.905 8.81521C29.6575 3.54896 26.8313 0.35521 21.185 0.0952099ZM25.5538 25.5602C23.6625 27.4515 21.0388 27.2827 14.9688 27.2827C8.71879 27.2827 6.21254 27.3752 4.38379 25.5415C2.27754 23.4452 2.65879 20.079 2.65879 14.9752C2.65879 8.06896 1.95004 3.09521 8.88129 2.74021C10.4738 2.68396 10.9425 2.66521 14.9513 2.66521L15.0075 2.70271C21.6688 2.70271 26.895 2.00521 27.2088 8.93521C27.28 10.5165 27.2963 10.9915 27.2963 14.994C27.295 21.1715 27.4125 23.6927 25.5538 25.5602Z" fill="#BBBBBB"/>
            <path d="M23.0075 8.79282C24.0009 8.79282 24.8062 7.98749 24.8062 6.99406C24.8062 6.00064 24.0009 5.19531 23.0075 5.19531C22.0141 5.19531 21.2087 6.00064 21.2087 6.99406C21.2087 7.98749 22.0141 8.79282 23.0075 8.79282Z" fill="#BBBBBB"/>
          </svg>
        </a>
      </li>
      @endif
      @if($item->name == 'pinterest')    
     {{-- <li class="mb-4">
        <a href="{{$item->link}}">
          <svg class="m-auto" xmlns="http://www.w3.org/2000/svg" width="23" height="27" viewBox="0 0 26 30" fill="none">
            <path d="M13.4075 0C5.18375 0.00125 0.8125 5.27 0.8125 11.015C0.8125 13.6787 2.30125 17.0025 4.685 18.0562C5.365 18.3625 5.275 17.9887 5.86 15.7512C5.90625 15.565 5.8825 15.4037 5.7325 15.23C2.325 11.2887 5.0675 3.18625 12.9212 3.18625C24.2875 3.18625 22.1637 18.9137 14.8987 18.9137C13.0262 18.9137 11.6312 17.4437 12.0725 15.625C12.6075 13.4587 13.655 11.13 13.655 9.56875C13.655 5.63375 7.7925 6.2175 7.7925 11.4312C7.7925 13.0425 8.3625 14.13 8.3625 14.13C8.3625 14.13 6.47625 21.75 6.12625 23.1737C5.53375 25.5837 6.20625 29.485 6.265 29.8212C6.30125 30.0062 6.50875 30.065 6.625 29.9125C6.81125 29.6687 9.09125 26.4162 9.73 24.065C9.9625 23.2087 10.9162 19.7337 10.9162 19.7337C11.545 20.8687 13.3575 21.8187 15.2887 21.8187C21.0337 21.8187 25.1862 16.7687 25.1862 10.5025C25.1662 4.495 20.025 0 13.4075 0V0Z" fill="#BBBBBB"/>
          </svg>
        </a>
      </li>--}}
      @endif
      @if($item->name == 'newsleter')    
      {{--<li>
        <a href="{{route('products',['data_from'=>'featured','page'=>1])}}">
          <svg class="m-auto" xmlns="http://www.w3.org/2000/svg" width="15" height="131" viewBox="0 0 15 131" fill="none">
            <path d="M14 118.804L14 122.26L4.28 127.858L4.28 127.93C4.58 127.918 4.886 127.906 5.198 127.894C5.498 127.882 5.804 127.87 6.116 127.858C6.416 127.834 6.722 127.816 7.034 127.804C7.334 127.792 7.64 127.78 7.952 127.768L14 127.768L14 130.198L1.148 130.198L1.148 126.76L10.778 121.18L10.778 121.126C10.478 121.138 10.184 121.15 9.896 121.162C9.596 121.174 9.302 121.186 9.014 121.198C8.714 121.198 8.42 121.204 8.132 121.216C7.832 121.228 7.532 121.24 7.232 121.252L1.148 121.252L1.148 118.804L14 118.804ZM14 106.357L14 113.755L1.148 113.755L1.148 106.357L3.38 106.357L3.38 111.037L6.206 111.037L6.206 106.681L8.438 106.681L8.438 111.037L11.75 111.037L11.75 106.357L14 106.357ZM1.148 86.0969L14 89.3729L14 92.4689L7.25 94.2149C7.118 94.2509 6.92 94.2989 6.656 94.3589C6.392 94.4069 6.104 94.4669 5.792 94.5389C5.48 94.5989 5.186 94.6529 4.91 94.7009C4.622 94.7489 4.4 94.7849 4.244 94.8089C4.4 94.8209 4.622 94.8569 4.91 94.9169C5.186 94.9649 5.48 95.0189 5.792 95.0789C6.092 95.1389 6.38 95.1989 6.656 95.2589C6.92 95.3189 7.124 95.3669 7.268 95.4029L14 97.1309L14 100.227L1.148 103.503L1.148 100.821L8.168 99.1829C8.372 99.1349 8.624 99.0809 8.924 99.0209C9.212 98.9609 9.518 98.9009 9.842 98.8409C10.154 98.7809 10.46 98.7269 10.76 98.6789C11.06 98.6189 11.318 98.5769 11.534 98.5529C11.306 98.5289 11.048 98.4929 10.76 98.4449C10.46 98.3969 10.16 98.3429 9.86 98.2829C9.548 98.2229 9.26 98.1689 8.996 98.1209C8.72 98.0609 8.504 98.0069 8.348 97.9589L1.148 96.0869L1.148 93.5129L8.348 91.6409C8.504 91.6049 8.72 91.5569 8.996 91.4969C9.26 91.4369 9.548 91.3769 9.86 91.3169C10.172 91.2569 10.478 91.2029 10.778 91.1549C11.066 91.1069 11.318 91.0709 11.534 91.0469C11.234 91.0109 10.88 90.9569 10.472 90.8849C10.052 90.8129 9.632 90.7349 9.212 90.6509C8.792 90.5549 8.444 90.4769 8.168 90.4169L1.148 88.7789L1.148 86.0969ZM10.436 75.1026C11.192 75.1026 11.852 75.2886 12.416 75.6606C12.98 76.0326 13.418 76.5726 13.73 77.2806C14.03 77.9766 14.18 78.8286 14.18 79.8366C14.18 80.2806 14.15 80.7186 14.09 81.1506C14.03 81.5706 13.946 81.9786 13.838 82.3746C13.718 82.7586 13.574 83.1246 13.406 83.4726L10.868 83.4726C11.132 82.8606 11.378 82.2306 11.606 81.5826C11.822 80.9226 11.93 80.2686 11.93 79.6206C11.93 79.1766 11.87 78.8226 11.75 78.5586C11.63 78.2826 11.468 78.0846 11.264 77.9646C11.06 77.8326 10.826 77.7666 10.562 77.7666C10.238 77.7666 9.962 77.8806 9.734 78.1086C9.506 78.3246 9.296 78.6186 9.104 78.9906C8.9 79.3626 8.684 79.7886 8.456 80.2686C8.312 80.5686 8.144 80.8926 7.952 81.2406C7.748 81.5886 7.502 81.9246 7.214 82.2486C6.914 82.5606 6.554 82.8186 6.134 83.0226C5.714 83.2266 5.21 83.3286 4.622 83.3286C3.854 83.3286 3.2 83.1546 2.66 82.8066C2.108 82.4466 1.688 81.9426 1.4 81.2946C1.112 80.6346 0.967997 79.8606 0.967997 78.9726C0.967997 78.3006 1.046 77.6646 1.202 77.0646C1.358 76.4526 1.58 75.8166 1.868 75.1566L3.992 76.0386C3.752 76.6266 3.566 77.1546 3.434 77.6226C3.302 78.0906 3.236 78.5706 3.236 79.0626C3.236 79.3986 3.29 79.6866 3.398 79.9266C3.506 80.1666 3.656 80.3526 3.848 80.4846C4.04 80.6046 4.268 80.6646 4.532 80.6646C4.832 80.6646 5.09 80.5746 5.306 80.3946C5.51 80.2146 5.708 79.9446 5.9 79.5846C6.092 79.2246 6.32 78.7746 6.584 78.2346C6.896 77.5746 7.22 77.0166 7.556 76.5606C7.892 76.0926 8.288 75.7326 8.744 75.4806C9.2 75.2286 9.764 75.1026 10.436 75.1026ZM14 70.9665L1.148 70.9665L1.148 68.2485L11.75 68.2485L11.75 63.0285L14 63.0285L14 70.9665ZM14 51.5908L14 58.9888L1.148 58.9888L1.148 51.5908L3.38 51.5908L3.38 56.2708L6.206 56.2708L6.206 51.9148L8.438 51.9148L8.438 56.2708L11.75 56.2708L11.75 51.5908L14 51.5908ZM14 42.1665L14 44.8845L3.416 44.8845L3.416 48.3765L1.148 48.3765L1.148 38.6745L3.416 38.6745L3.416 42.1665L14 42.1665ZM14 29.5911L14 32.3091L3.416 32.3091L3.416 35.8011L1.14799 35.8011L1.14799 26.0991L3.416 26.0991L3.416 29.5911L14 29.5911ZM14 14.9193L14 22.3173L1.14799 22.3173L1.14799 14.9193L3.37999 14.9193L3.37999 19.5993L6.20599 19.5993L6.20599 15.2433L8.43799 15.2433L8.43799 19.5993L11.75 19.5993L11.75 14.9193L14 14.9193ZM1.14799 6.70104C1.14799 5.53704 1.29199 4.57704 1.57999 3.82104C1.85599 3.06504 2.28199 2.50104 2.85799 2.12904C3.42199 1.75704 4.13599 1.57104 4.99999 1.57104C5.58799 1.57104 6.10399 1.68504 6.54799 1.91304C6.97999 2.12904 7.35199 2.42304 7.66399 2.79504C7.96399 3.15504 8.20999 3.54504 8.40199 3.96504L14 0.185039L14 3.20904L9.06799 6.26904L9.06799 7.72704L14 7.72704L14 10.445L1.14799 10.445L1.14799 6.70104ZM3.37999 6.89904L3.37999 7.72704L6.85399 7.72704L6.85399 6.84504C6.85399 6.24504 6.78799 5.75904 6.65599 5.38704C6.52399 5.01504 6.32599 4.74504 6.06199 4.57704C5.78599 4.40904 5.45599 4.32504 5.07199 4.32504C4.66399 4.32504 4.33999 4.42104 4.09999 4.61304C3.84799 4.79304 3.66799 5.07504 3.55999 5.45904C3.43999 5.83104 3.37999 6.31104 3.37999 6.89904Z" fill="#BBBBBB"/>
          </svg>
        </a>
      </li>--}}
      @endif

      @if($item->name == 'whatsapp')    
      <li class="mt-4 whats-app">
        <a href="{{$item->link}}">
          <svg width="35" height="35" viewBox="0 0 96 96" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M48 96C74.5097 96 96 74.5097 96 48C96 21.4903 74.5097 0 48 0C21.4903 0 0 21.4903 0 48C0 74.5097 21.4903 96 48 96Z" fill="#29A71A"/>
              <path d="M69.1637 26.8366C64.1697 21.7927 57.5377 18.6995 50.4639 18.1149C43.3901 17.5302 36.3402 19.4926 30.5859 23.6481C24.8316 27.8035 20.7516 33.8785 19.0819 40.7772C17.4122 47.676 18.2627 54.9443 21.48 61.2711L18.3218 76.6038C18.2891 76.7565 18.2881 76.9142 18.3191 77.0672C18.3501 77.2201 18.4123 77.3651 18.5018 77.4929C18.633 77.687 18.8203 77.8363 19.0386 77.9211C19.2569 78.0059 19.4959 78.0221 19.7237 77.9675L34.7509 74.4057C41.06 77.5415 48.277 78.3373 55.1178 76.6515C61.9585 74.9657 67.9793 70.9076 72.1089 65.1993C76.2384 59.491 78.2088 52.5027 77.6695 45.478C77.1302 38.4532 74.1162 31.8476 69.1637 26.8366ZM64.4782 64.2329C61.0229 67.6786 56.5734 69.9531 51.7569 70.7359C46.9404 71.5188 41.9996 70.7705 37.6309 68.5966L35.5364 67.5602L26.3237 69.742L26.3509 69.6275L28.26 60.3548L27.2346 58.3311C25.0023 53.9471 24.2149 48.9692 24.985 44.1103C25.7552 39.2514 28.0434 34.7609 31.5218 31.282C35.8926 26.9126 41.8198 24.458 48 24.458C54.1803 24.458 60.1075 26.9126 64.4782 31.282C64.5154 31.3247 64.5555 31.3648 64.5982 31.402C68.9148 35.7827 71.3245 41.6922 71.302 47.8422C71.2796 53.9922 68.8267 59.8839 64.4782 64.2329Z" fill="white"/>
              <path d="M63.6601 57.4313C62.531 59.2095 60.7474 61.3858 58.5056 61.9258C54.5783 62.8749 48.551 61.9586 41.051 54.9658L40.9583 54.884C34.3638 48.7695 32.651 43.6804 33.0656 39.644C33.2947 37.3531 35.2038 35.2804 36.8129 33.9277C37.0672 33.7105 37.3689 33.556 37.6937 33.4763C38.0186 33.3966 38.3575 33.394 38.6835 33.4688C39.0095 33.5435 39.3135 33.6935 39.5711 33.9067C39.8288 34.1199 40.033 34.3905 40.1674 34.6968L42.5947 40.1513C42.7524 40.505 42.8109 40.8949 42.7638 41.2793C42.7167 41.6637 42.5658 42.028 42.3274 42.3331L41.1001 43.9258C40.8368 44.2547 40.6779 44.6549 40.6439 45.0748C40.6098 45.4947 40.7023 45.9152 40.9092 46.2822C41.5965 47.4877 43.2438 49.2604 45.071 50.9022C47.1219 52.7567 49.3965 54.4531 50.8365 55.0313C51.2218 55.1887 51.6454 55.2271 52.0528 55.1416C52.4601 55.056 52.8325 54.8504 53.1219 54.5513L54.5456 53.1167C54.8203 52.8459 55.1619 52.6527 55.5356 52.5569C55.9093 52.461 56.3017 52.466 56.6729 52.5713L62.4383 54.2077C62.7563 54.3052 63.0479 54.4742 63.2906 54.7017C63.5333 54.9292 63.7207 55.2092 63.8386 55.5203C63.9565 55.8313 64.0017 56.1652 63.9708 56.4965C63.9399 56.8277 63.8336 57.1474 63.6601 57.4313Z" fill="white"/>
          </svg>
        </a>
      </li>
       @endif
      @endforeach
      
      <li style="writing-mode: vertical-rl;" class="mt-4 ml-1 -rotate-180 hover:text-[#CC9933] mt-4 text-2xl ">
      <a style="writing-mode: vertical-rl;" class="hover:text-[#CC9933] text-[#BBBBBB]" href="{{route('contacts')}}">
      تواصلي معنا
        </a>
      </li>
      @endif
     </ul>
     <!-- End social media icons behind slider -->

 <div class="container max-w-7xl mx-auto sm:px-6 lg:px-8 mt-10">
    <h2
      class="
        px-6
        flex
        items-center
        justify-center
        lg:px-8
        xl:px-0
        text-[38px]
        font-shamelBold
        tracking-tight
        text-gray-900
        pb-8
      "
    >
      الفئات
    </h2>

    <div
      class="grid mx-6 sm:mx-0 md:grid-cols-3 md:gap-x-6 grid-cols-1 gap-y-8"
    >

    @foreach($categories as $category)
     <a href="{{route('products',['id'=> $category['id'],'name'=>$category['name'],'data_from'=>'category','page'=>1,'isCategory'=>true])}}"> <div
        class="
        shadow-xl hover:border-[#201A3C] hover:text-[#201A3C]
          bg-white
          flex flex-row
          justify-between
          py-10
          px-4
          border-[2px]
          rounded-[20px]
          items-center
          border-[#E424532E]
          text-[28px]
          text-[#201A3C]
          font-shamelBold
          duration-200
        "
      >
      <img style="max-width: 90px" src="{{asset("storage/category/$category->icon")}}" alt="" />

        <h2>{{$category['name']}}</h2>
      </div>
     </a>
     @endforeach



    </div>




    {{--<div class="mx-auto pt-12 px-4 max-w-7xl sm:px-6 lg:px-8 lg:pt-20">
      <div
        class="
          md:flex
          md:pl-0
          pt-10
          justify-center
          items-center"
        >

        <div
          class="
            block
            md:mx-5
            mx-auto
            mb-20
            md:mb-0
            text-[25px] text-center
            font-bold
            border-b-[18px] border-b-[#A9F7F7]
            relative
            w-[285px]
          "
          >
          <span class="absolute top-[-16px] left-0 w-full text-[#201A3C] text-[24px] font-shamelBold">
            توصيل خلال 24 ساعة
          </span>
          <span class="absolute top-[25px] color-[#201A3C] left-0 text-[13px] left-0 w-full">افضل خدمات التوصيل</span>
        </div>
        <div
          class="
            block
            md:mx-5
            mx-auto
            text-[25px] text-center
            font-bold
            border-b-[18px] border-b-[#A9F7F7]
            relative
            w-[310px]
          "
          >
          <span class="absolute top-[-16px] left-0 w-full text-[#201A3C] text-[24px] font-shamelBold ">
            تسوق على حسب السعر
          </span>
          <span class="absolute top-[25px] color-[#201A3C] left-0 text-[13px] left-0 w-full">أفضل الاسعار</span>
        </div>
      </div>
    </div>--}}

    @if(!empty($featured_products))
    <!-- Start new products section -->
    <section class="my-24 rounded-xl overflow-hidden relative">
      <h2 class="text-[30px] font-shamelBold text-right text-gray-900">
        المنتجات الجديدة
      </h2>
        <div class="owl-carousel" id="new-products">
          @foreach($featured_products as $featured_product)
          <div class="item relative border border-[#CC993333]  rounded-[20px] overflow-hidden">
            
        
             <span class="fav-icon add-favorit cursor-pointer absolute right-3 top-3 z-10" onclick="addWishlist('{{$featured_product['id']}}')">
            @php($user = auth('customer')->user())
            @if($user != null)
            @php($is_whishlist = App\Model\Wishlist::where('product_id', $featured_product->id)->where('customer_id',$user->id)->first())
             <svg xmlns="http://www.w3.org/2000/svg" width="37" height="32" viewBox="-2 -2 40 37" fill="none">
                    <path d="M34.0648 3.2449C32.1495 1.16755 29.5214 0.0234375 26.664 0.0234375C24.5283 0.0234375 22.5723 0.698669 20.8503 2.03022C19.9814 2.70235 19.1941 3.52465 18.5 4.48443C17.8061 3.52493 17.0186 2.70235 16.1494 2.03022C14.4277 0.698669 12.4717 0.0234375 10.336 0.0234375C7.47865 0.0234375 4.85027 1.16755 2.93494 3.2449C1.04249 5.29798 0 8.10279 0 11.143C0 14.2722 1.16613 17.1366 3.66974 20.1576C5.90941 22.8599 9.12833 25.6032 12.8559 28.7798C14.1288 29.8646 15.5715 31.0943 17.0696 32.4041C17.4654 32.7507 17.9733 32.9416 18.5 32.9416C19.0265 32.9416 19.5346 32.7507 19.9298 32.4046C21.4279 31.0946 22.8715 29.8643 24.1449 28.7789C27.8719 25.6029 31.0909 22.8599 33.3305 20.1573C35.8342 17.1366 37 14.2722 37 11.1427C37 8.10279 35.9575 5.29798 34.0648 3.2449Z" 
                    stroke="#CC9933" stroke-width="2" fill="{{$is_whishlist == true?'#CC9933':'transparent'}}"></path>
                </svg>

            @else
            <svg xmlns="http://www.w3.org/2000/svg" width="37" height="32" viewBox="-2 -2 40 37" fill="none">
                <path d="M34.0648 3.2449C32.1495 1.16755 29.5214 0.0234375 26.664 0.0234375C24.5283 0.0234375 22.5723 0.698669 20.8503 2.03022C19.9814 2.70235 19.1941 3.52465 18.5 4.48443C17.8061 3.52493 17.0186 2.70235 16.1494 2.03022C14.4277 0.698669 12.4717 0.0234375 10.336 0.0234375C7.47865 0.0234375 4.85027 1.16755 2.93494 3.2449C1.04249 5.29798 0 8.10279 0 11.143C0 14.2722 1.16613 17.1366 3.66974 20.1576C5.90941 22.8599 9.12833 25.6032 12.8559 28.7798C14.1288 29.8646 15.5715 31.0943 17.0696 32.4041C17.4654 32.7507 17.9733 32.9416 18.5 32.9416C19.0265 32.9416 19.5346 32.7507 19.9298 32.4046C21.4279 31.0946 22.8715 29.8643 24.1449 28.7789C27.8719 25.6029 31.0909 22.8599 33.3305 20.1573C35.8342 17.1366 37 14.2722 37 11.1427C37 8.10279 35.9575 5.29798 34.0648 3.2449Z" 
                stroke="#CC9933" stroke-width="2" fill="transparent"/>
            </svg>
           @endif  
            </span>
            <a  href="{{route('product',$featured_product->slug)}}" class="group">
              <div class="w-full bg-gray-100 aspect-w-1 aspect-h-1 sm:aspect-w-2 sm:aspect-h-3 overflow-hidden h-[400px] min-h-[400px] max-h-[400px]">
                <img  src="{{\App\CPU\ProductManager::product_image_path('thumbnail')}}/{{$featured_product['thumbnail']}}" alt="new product image" class="w-full h-full object-center object-cover group-hover:opacity-75">
              </div>
              <div class="text-right font-medium text-gray-900 p-5 rounded-b-[20px]">
                 @php($category_id = collect((array) (json_decode($featured_product->category_ids))))
                 @php($category_id = json_decode($category_id->where('position','1')))

                 @if(!empty($category_id))
                 @php($category = \App\Model\Category::where('id',$category_id[0]->id)->first())
                <h4 class="text-[#201A3C] mb-2 text-[18px] lg:text-[21px] font-shamelBold">{{$category['name']}}</h4>

                @endif

                <p class="text-[16px] lg:text-[18px] mb-2 text-[#201A3C] font-shamelnormal font-bold w-full">
                {{ Str::limit($featured_product['name'], 25) }}  
                </p>

                @if($featured_product->discount > 0)
                @php ($product_discount = \App\CPU\Helpers::get_product_discount($featured_product,$featured_product->unit_price)) 
                @php($price_wihe_tax = ($featured_product->unit_price + ($featured_product->unit_price * $featured_product->tax) / 100)+ $product_discount)

                @else
                @php($price_wihe_tax = $featured_product->unit_price+ ($featured_product->unit_price * $featured_product->tax) / 100 )
                @endif
                <div class="font-bold text-[23px] lg:text-[28px] text-[#CC9933] font-shamelBold"> {{\App\CPU\Helpers::currency_converter($price_wihe_tax)}}</div>  
              </div>              
            </a>
          </div>
          @endforeach
          
        </div>
        <div>
          <span class="rt-arrow cursor-pointer bg-white h-[52px] w-[52px] flex justify-center items-center rounded-full absolute right-5 top-[40%] z-10">
            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="29" viewBox="0 0 17 29" fill="none">
              <path d="M16.4655 14.6062C16.4655 15.1005 16.2768 15.5946 15.9002 15.9714L4.04315 27.8284C3.2889 28.5826 2.066 28.5826 1.31205 27.8284C0.558094 27.0744 0.558094 25.8517 1.31205 25.0974L11.8038 14.6062L1.31241 4.11499C0.558459 3.36074 0.558459 2.1382 1.31241 1.38431C2.06636 0.62969 3.28926 0.62969 4.04352 1.38431L15.9006 13.2411C16.2773 13.6181 16.4655 14.1122 16.4655 14.6062Z" fill="#201A3C"/>
            </svg>
          </span>
          <span class="lt-arrow cursor-pointer bg-white h-[52px] w-[52px] flex justify-center items-center rounded-full absolute left-5 top-[40%] z-10">
            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="29" viewBox="0 0 17 29" fill="none">
              <path d="M0.534461 14.3938C0.534461 13.8995 0.723162 13.4054 1.09977 13.0286L12.9568 1.17165C13.7111 0.417393 14.934 0.417393 15.688 1.17165C16.4419 1.9256 16.4419 3.14826 15.688 3.90257L5.19616 14.3938L15.6876 24.885C16.4415 25.6393 16.4415 26.8618 15.6876 27.6157C14.9336 28.3703 13.7107 28.3703 12.9565 27.6157L1.0994 15.7589C0.722734 15.3819 0.534461 14.8878 0.534461 14.3938Z" fill="#201A3C"/>
            </svg>
          </span>
        </div>
    </section> 
    @endif
    <!-- End new products section -->

    @php($new_banner=\App\Model\Banner::where('banner_type','New Banner')->where('published',1)->first())
    @if($new_banner != null)
    <div
      class="
        border-[1px]
        bg-[#FADBDA]
        border-[#FADBDA]
        rounded-[20px]
        mt-24
        flex flex-row flex-wrap
        justify-center
        xl:justify-between
        items-center        
        lg:min-h-[640px]
        py-10
        px-8 
      "
    >
      <div class="pl-10 relative hidden xl:flex mt-[120px]">
      <img class="-mt-32" src="{{asset('assets/front-end/icons/CustomCircular.svg')}}" alt="" />

        <div
          class="
            absolute
            top-[7%]
            left-[30.5%]
            flex flex-col
            justify-center
            items-center
          "
        >
          <p class="text-sm text-[#201A3C] font-shamelnormal">{{$new_banner->title}}</p>
          <p class="text-[40px] text-[#201A3C] font-bold">ما جديدنا#</p>
          <p class="text-[17px] text-[#201A3C] font-shamelnormal">{{$new_banner->subtitle}}</p>
          <!-- <p class="text-[17px] text-[#201A3C] font-shamelnormal pb-2">
            وانضمي لعائلة زاد
          </p> -->
          <div class="px-2 pt-2 pb-3 space-y-1">
            <a
            href="{{$new_banner['url']}}"
              class="
                register
                bg-[#201A3C]
                text-white
                block
                px-8
                py-3
                rounded-[10px]
                text-[16px]
                font-bold
                hover:bg-[#CC9933]
                duration-300
                link-button
              "
              aria-current="page"
              >انضمي الان</a
            >
          </div>
        </div>
      </div>
      <div class="what-new-image relative lg:w-[50%]">
        <img class="rounded-[20px] max-w-[577px] w-full relative z-10 " src="{{asset('/storage/banner')}}/{{$new_banner['photo']}}" alt="" />
      </div>
    </div>
    @endif
 </div>

  {{--End Categories--}}

  {{--section--}}


  

    
  <div class="mx-auto pt-12 px-4 max-w-7xl sm:px-6 lg:px-8 lg:pt-20 mb-28">
    <div
      class="
        grid grid-cols-1
        gap-12
        {{-- pl-48 --}}
        md:pl-0
        pt-10
        md:pt-0 md:grid-cols-2
        lg:grid-cols-2
        xl:grid-cols-3
        gap-y-16
        justify-between
        items-center
        pb-20
        rtl
      "
      >
      <div
        class="
          block
          w-full
          m-auto
          text-[25px] text-center
          font-bold
          border-b-[18px] border-b-[#A9F7F7]
          max-w-[250px]
          relative
        "
      >
        <span class="absolute -top-[21px] right-5 text-[#201A3C] text-[24px] font-shamelBold"
          >توصيل سريع 3 ايام</span
        >
      </div>
      <div
        class="
          block
          w-full
          m-auto
          text-[25px] text-center
          font-bold
          border-b-[18px] border-b-[#A9F7F7]
          max-w-[250px]
          -pb-2
          relative
        "
        >
        <span class="absolute -top-[21px] right-4 text-[#201A3C] text-[24px] font-shamelBold"
          >توصيل مجاني +300
        </span>
      </div>
      <div
        class="
          block
          w-full
          m-auto
          text-[25px] text-center
          font-bold
          border-b-[18px] border-b-[#A9F7F7]
          max-w-[250px]
          relative
           md:col-span-2
           xl:col-span-1
        "
      >
        <span class=" absolute -top-5 right-0 w-full text-[#201A3C] text-[24px] font-shamelBold"

          >تغليف مجاني
        </span>
      </div>
     
    </div>
    @php($discount_banner=\App\Model\Banner::where('banner_type','Discount Banner')->where('published',1)->first())
    @if($discount_banner != null)
    <section class="discount-section mb-24 rounded-xl overflow-hidden">
      <div class="relative h-[350px] sm:h-[400px] md:h-[500px] lg:h-[600px]  " style="background-image: url({{asset('/storage/banner')}}/{{$discount_banner['photo']}}); background-size: cover;">      
        <div class="hidden md:block absolute top-[50%] translate-y-[-50%] scale-[0.5] md:scale-[0.7] lg:scale-[1] right-[-50px] lg:right-10 w-[470px] lg:w-[50%] xl:w-[55%] h-[60%] lg:h-[50%] xl:h-[60%]">
          <div class="text-section-wrap relative w-full h-full">
            <div class="box-title text-center text-white absolute top-[-40px] w-full">
              <span class="lg:text-[16px] xl:text-[20px]">{{$discount_banner['title']}}</span>
              <p class="lg:text-[22px] xl:text-[28px] font-bold">تخفيضات تصل الى</p>            
            </div>
            <div class="overlay-text relative w-full flex justify-center items-center text-white h-full inter-font font-bold discount-shadow">
              <p class="text-[200px] lg:text-[200px] xl:text-[250px] inter-font">{{$discount_banner['subtitle']}}</p>
              <p>
                <span class="block inter-font text-center font-bold text-[150px] lg:text-[150px] xl:text-[190px] leading-none">%</span>
                <span class="block inter-font font-bold text-center text-[50px] lg:text-[50px] xl:text-[80px] leading-none">OFF</span>              
              </p>
            </div>
            <div class="text-center relative z-10 top-[-30px]">
            <a href="{{$discount_banner['url']}}" class="duration-300 px-3 py-2.5 pt-3 style-btn border border-transparent font-medium rounded-md text-white bg-[#201A3C] hover:bg-[#CC9933] focus:border-0 md:text-lg lg:px-8 xl:px-12">
              تسوقي الآن
            </a>
            </div>
          </div>

          <!-- <a href="{{$discount_banner['url']}}">
            <img class="pb-24" src="{{asset('/storage/banner')}}/{{$discount_banner['photo']}}" alt="" />
          </a> -->
        </div>
      </div>
      <div>
      <div class="bg-[#201A3C] px-5 py-16 md:hidden mobile-discount">
          <div class="text-section-wrap relative w-full h-full">
            <div class="box-title text-center text-white absolute top-[-40px] w-full">
              <span class="text-[15px] ">{{$discount_banner['title']}}</span>
              <p class="text-[16px] font-bold">تخفيضات تصل الى</p>            
            </div>
            <div class="overlay-text relative w-full flex justify-center items-center text-white h-full inter-font font-bold discount-shadow">
              <p class="text-[100px] inter-font">{{$discount_banner['subtitle']}}</p>
              <p>
                <span class="block inter-font text-center font-bold text-[70px] leading-none">%</span>
                <span class="block inter-font font-bold text-center text-[30px] leading-none">OFF</span>              
              </p>
            </div>
            <div class="text-center relative z-10">
            <a href="{{$discount_banner['url']}}" class="duration-300 px-3 py-2.5 pt-3 style-btn border border-transparent font-medium rounded-md text-white focus:bg-[#CC9933] hover:bg-[#CC9933] bg-[#CC9933] focus:border-0 md:text-lg lg:px-8 xl:px-12">
              تسوقي الآن
            </a>
            </div>
          </div>

          <!-- <a href="{{$discount_banner['url']}}">
            <img class="pb-24" src="{{asset('/storage/banner')}}/{{$discount_banner['photo']}}" alt="" />
          </a> -->
        </div>

      </div>
    </section>    
    @endif   

    <div class="text-center">
      <!-- <p class="text-[#201A3C] font-bold text-[25px] md:text-[39px] font-shamelBold pb-10">
        احصلي على هدية مع اختيار التغليف#
      </p> -->
      <div
        class="
          space-y-0
          sm:grid sm:grid-cols-2 sm:gap-6  sm:space-y-0
          lg:grid-cols-3 lg:gap-3
        "
      >

      @php($featured_banners=\App\Model\Banner::where('banner_type','Featured Banner')->where('published',1)->get())
      @if($featured_banners != null)
      @foreach ($featured_banners as $featured_banner)
      <a href="{{$featured_banner['url']}}">
      <div

          class="space-y-6 xl:space-y-10 relative"
        >
          <img
            class="w-full max-h-[37rem] rounded-[20px] mb-10 sm:mb-0"
            src="{{asset('/storage/banner')}}/{{$featured_banner['photo']}}"
            alt=""
          />
          <div
            class="
              flex flex-col
              items-end
              justify-end
              absolute
              bottom-8
              right-8
              sm:max-w-[275px]
              leading-[30px]
            "
          >

            <div
              class="
                bg-[#201A3C]
                rounded-[10px]
                flex
                items-center
                justify-center
                mb-[2px]
              "
            >
              <h3
                class="text-white py-3 px-4 text-[27px] text-center font-shamelnormal"
              >
                {{ $featured_banner['title'] }}
              </h3>
            </div>

            <div
              class="
                bg-[#201A3C]
                rounded-[10px]
                flex
                items-center
                justify-center
              "
            >
              <h3
                class="
                  text-white text-[27px]
                  font-shamelBold
                  xl:text-[22px]
                  py-2.5
                  pt-5
                  pr-4 pl-20
                  md:pl-14
                  xl:pl-18
                  sm:text-[27px]
                  text-right

                "
              >

                {{ $featured_banner['subtitle']}}
              </h3>
            </div>
          </div>
        </div>
      </a>
        @endforeach
        @endif
      </div>
    </div>
  </div>
  {{--end section--}}

  {{--Reviews--}}
  {{--<div class="max-w-7xl mx-auto container px-6 lg:px-8 pt-16 mb-28">
    <div
      class="
        text-[#201A3C] text-[36px]
        font-shamelBold
        flex
        justify-center
        items-center
        relative
        
      "
    >

      <img class="absolute w-[60px] hidden md:w-auto left-4 -top-5 h-20" src="{{asset('assets/front-end/icons/whatsapp 1.svg')}}" alt="" />
      <!-- <p>رأي زبونتنا</p> -->
    </div>


    <div
      class="
        flex flex-col
        items-center
        justify-center
        border-2 border-[#E424532E]
        pt-[35px]
        pb-[80px]
        lg:min-h-[400px]
        rounded-[20px]
        shadow-2xl
      "
    >

    <div class="owl-carousel reviews-slider owl-dots-style dots-down">
      <div class="text-center">
        <p class="text-[#CC9933] text-[27px] font-shamelBold mb-3">امل عماد</p>
        <p
          class="px-4 text-[16px] text-[#201A3C] max-w-[400px] m-auto font-shamelnormal px-5"
        >
          هناك حقيقة مثبته منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي
          القارئ عن التركيز على الشكل الخارجي للنص او شكل توضع الفقرات في
          الصفحةالتي يقرأها
        </p>
      </div>
      <div class="text-center">
        <p class="text-[#CC9933] text-[27px] font-shamelBold mb-3">هبة علي</p>
        <p
          class="px-4 md:px-0 text-[16px] text-[#201A3C] m-auto max-w-[400px] text-center font-shamelnormal"
        >
          هناك حقيقة مثبته منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي
          القارئ عن التركيز على الشكل الخارجي للنص او شكل توضع الفقرات في
          الصفحةالتي يقرأها
        </p>
      </div>
      <div class="text-center">
        <p class="text-[#CC9933] text-[27px] font-shamelBold mb-3">زبون دائم</p>
        <p
          class="px-4 text-[16px] text-[#201A3C] m-auto max-w-[400px] text-center font-shamelnormal"
        >
          هناك حقيقة مثبته منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي
          القارئ عن التركيز على الشكل الخارجي للنص او شكل توضع الفقرات في
          الصفحةالتي يقرأها
        </p>
      </div>
    </div>




    </div>
  </div>--}}

  {{--end Reviews--}}

  {{--Zad Social--}}
  
  @if(count($home_blogs) > 0)
  <div class="bg-[#FEF0F0]">
    <div class="mx-auto pt-12 px-4 max-w-7xl sm:px-6 lg:px-8 lg:pt-12">
      <div class="space-y-8">
        <div
          class="
            space-y-5
            sm:space-y-4
            flex flex-col
            items-center
            justify-center
          "
        >
          <span
            class="
              text-[45px]
              leading-10
              font-extrabold
              text-[#201A3C]
              tracking-tight
              sm:text-4xl
              spanTitle
              drop-shadow-none
            "
            >مجتمع زاد</span
          >
        </div>
        <div
          class="
            space-y-6
            sm:grid sm:grid-cols-2 sm:gap-6 sm:space-y-0
            lg:grid-cols-3 lg:gap-3
            pb-16
          "
        >

        
        @foreach ($home_blogs as $blog)
           <a href="{{route('blog')}}">
            <div class="lg:mt-0 md:mt-0 mt-10 overlay-shadow relative space-y-6 xl:mt-0 xl:space-y-10">
              <img
                class=" w-full max-h-[550px] rounded-[20px] "
                src='{{asset("storage/blog/$blog->image")}}'
                alt=""
              />
              <div class="flex flex-col items-end justify-end absolute  bottom-16 right-8 sm:max-w-[275px] leading-[30px] z-10">
                <h3 class="text-white text-[14px] font-normal">{{date('d M, Y',strtotime($blog->created_at))}}</h3>
                <h3 class="text-white
                text-[18px] font-bold lg:text-[22px] text-right"> {{$blog->title}}</h3>

              </div>
          </div>
          </a>
          @endforeach

        </div>
      </div>
    </div>
  </div>
  @endif
  {{--end Zad Social--}}

@endsection

@push('script')


    <script>
        $('#new-products').owlCarousel({
            loop: true,
            autoplay: true,
            nav: false,
            margin: 20,                                
            autoplayHoverPause: true,                        
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 2
                },
                //Small
                576: {
                    items: 2
                },
                //Medium
                768: {
                    items: 3
                },
                //Large
                992: {
                    items: 3
                },
                //Extra large
                1200: {
                    items: 3
                }
            }
        });
        // Go to the next item
        $('.rt-arrow').click(function() {
            $('#new-products').trigger('next.owl.carousel');
        })
        // Go to the previous item
        $('.lt-arrow').click(function() {            
            $('#new-products').trigger('prev.owl.carousel', [300]);
        })
       
    </script>

    <!-- Login -->

    @if(session('registration'))
    <script>
    $("#register-form").hide();
     $("#login-form").show();
    $("#popup-modal-register").show();
    </script>
    @endif

    <script>
        $('#sign-in-form').submit(function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post({
                url: '{{route('customer.auth.login')}}',
                dataType: 'json',
                data: $('#sign-in-form').serialize(),
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
                        toastr.success(data.message, {
                            CloseButton: true,
                            ProgressBar: true
                        });
                        setInterval(function () {
                            location.href = data.url;
                        }, 2000);
                    }
                },
                complete: function () {
                    $('#loading').hide();
                },
                error: function () {
                    toastr.error('Credentials do not match or account has been suspended.', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            });
        });
    </script>
    {{-- recaptcha scripts start --}}
    <!-- @if(isset($recaptcha) && $recaptcha['status'] == 1)
        <script type="text/javascript">
            var onloadCallback = function () {
                grecaptcha.render('recaptcha_element', {
                    'sitekey': '{{ \App\CPU\Helpers::get_business_settings('recaptcha')['site_key'] }}'
                });
            };
        </script>
        <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async
                defer></script> -->
        <script>
            // $("#login-form").on('submit', function (e) {
            //     var response = grecaptcha.getResponse();

            //     if (response.length === 0) {
            //         e.preventDefault();
            //         toastr.error("{{\App\CPU\translate('Please check the recaptcha')}}");
            //     }
            // });
        </script>
    <!-- @endif -->

    <!-- end Login -->
@endpush

