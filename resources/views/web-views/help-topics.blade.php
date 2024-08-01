@extends('layouts.front-end.app')

@section('title',\App\CPU\translate('FAQ'))

@push('css_or_js')
    <meta property="og:image" content="{{asset('storage/company')}}/{{$web_config['web_logo']->value}}"/>
    <meta property="og:title" content="FAQ of {{$web_config['name']->value}} "/>
    <meta property="og:url" content="{{env('APP_URL')}}">
    <meta property="og:description" content="{!! substr($web_config['about']->value,0,100) !!}">

    <meta property="twitter:card" content="{{asset('storage/company')}}/{{$web_config['web_logo']->value}}"/>
    <meta property="twitter:title" content="FAQ of {{$web_config['name']->value}}"/>
    <meta property="twitter:url" content="{{env('APP_URL')}}">
    <meta property="twitter:description" content="{!! substr($web_config['about']->value,0,100) !!}">

    <style>
        .headerTitle {
            font-size: 25px;
            font-weight: 700;
            margin-top: 2rem;
        }

        body {
            font-family: 'Titillium Web', sans-serif
        }

        .product-qty span {
            font-size: 14px;
            color: #6A6A6A;
        }

        .btn-link {
            color: #4c5056e3;
        }

        .btnF {
            display: inline-block;
            font-weight: normal;
            margin-top: 4%;
            color: #4b566b;
            text-align: center;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-color: transparent;
            border: 1px solid transparent;
            font-size: .9375rem;
            transition: color 0.25s ease-in-out, background-color 0.25s ease-in-out, border-color 0.25s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        @media (max-width: 600px) {
            .sidebar_heading {
                background: {{$web_config['primary_color']}}
            }

            .sidebar_heading h1 {
                text-align: center;
                color: aliceblue;
                padding-bottom: 17px;
                font-size: 19px;
            }

            .headerTitle {

                font-weight: 700;
                margin-top: 1rem;
            }
        }

    </style>
@endpush

@section('content')
   


    <div class="bg-gray-50 overflow-hidden">
   <div class="bg-[#201A3C] py-5 relative">
      <div class="flex flex-row-reverse relative max-w-xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-7xl">
         <ul class="list-reset breadcrumbs flex flex-row-reverse font-shamelnormal text-[17px] text-white">
            <li><a class="hover:text-[#CC9933]" href="{{route('home')}}"> الرئيسية </a></li>
            <li class="px-2"> / </li>
            <li> اسئلة متكررة </li>
         </ul>
      </div>
      {{-- <div class=" flex flex-col items-center w-full justify-center mt-14">
      <img class="max-w-1/5 w-1/5" src="{{asset('assets/front-end/icons/Logo.svg')}}">
      </div> --}}
   </div>
   
   <div class="relative mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-7xl">
      <div class="relative overflow-auto mb-10">
         <h2 class="text-[28px] leading-8 text-center pt-20 text-[#201A3C] sm:text-[28px]"> اسئلة متكررة</h2>
         <div class="flex flex-col items-end justify-start max-w-[1105px] max-h-[1170px] border-2 border-[#E8EDF4] mt-16 mx-auto">
         @php $length=count($helps); @endphp
         @for($i=0;$i<$length;$i++)
            <div class="accordion-item py-5 flex flex-col items-end justify-start px-6 lg:px-10 border-b-2 border-[#E8EDF4] w-full">
               <div id="collapseTwo{{ $helps[$i]['id'] }}" class="run-accordion flex flex-row-reverse justify-between items-center w-full collapse">
                  <p class="text-[18px] text-black text-right rtl"> {{ $helps[$i]['question'] }}</p>
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="10" viewBox="0 0 24 14" fill="none">
                    <path d="M0.502103 0.512563C1.16467 -0.163809 2.23466 -0.170782 2.90563 0.491644L2.92647 0.512563L12 9.77514L21.0735 0.512563C21.7361 -0.163809 22.8061 -0.170782 23.4771 0.491644L23.4979 0.512563C24.1605 1.18894 24.1673 2.28122 23.5184 2.96617L23.4979 2.98744L13.2122 13.4874C12.5496 14.1638 11.4796 14.1708 10.8087 13.5084L10.7878 13.4874L0.502103 2.98744C-0.167368 2.30402 -0.167368 1.19598 0.502103 0.512563Z" fill="#C4C4C4"/>
                    </svg>
               </div>
               <p class="accordion-content text-[16px] text-black text-right font-shamelnormal rtl">  {{ $helps[$i]['answer'] }} </p>
            </div>
           
            @endfor 
         </div>
      </div>
   </div>
  
</div>

@endsection


