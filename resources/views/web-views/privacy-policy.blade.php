@extends('layouts.front-end.app')

@section('title',\App\CPU\translate('Privacy policy'))

@push('css_or_js')
    <meta property="og:image" content="{{asset('storage/company')}}/{{$web_config['web_logo']->value}}"/>
    <meta property="og:title" content="Terms & conditions of {{$web_config['name']->value}} "/>
    <meta property="og:url" content="{{env('APP_URL')}}">
    <meta property="og:description" content="{!! substr($web_config['about']->value,0,100) !!}">

    <meta property="twitter:card" content="{{asset('storage/company')}}/{{$web_config['web_logo']->value}}"/>
    <meta property="twitter:title" content="Terms & conditions of {{$web_config['name']->value}}"/>
    <meta property="twitter:url" content="{{env('APP_URL')}}">
    <meta property="twitter:description" content="{!! substr($web_config['about']->value,0,100) !!}">

    <style>
        .headerTitle {
            font-size: 25px;
            font-weight: 700;
            margin-top: 2rem;
        }

        .for-container {
            width: 91%;
            border: 1px solid #D8D8D8;
            margin-top: 3%;
            margin-bottom: 3%;
        }

        .for-padding {
            padding: 3%;
        }
    </style>
@endpush

@section('content')


    <div class="bg-gray-50 overflow-hidden">
   <div class="bg-[#201A3C] py-5 relative">
      <div class="flex flex-row-reverse relative max-w-xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-7xl">
         <ul class="list-reset breadcrumbs flex flex-row-reverse font-shamelnormal text-[17px] text-white">
            <li><a class="hover:text-[#CC9933]" href="{{route('home')}}">الرئيسية</a></li>
            <li class="px-2">/</li>
            <li> السياسة والخصوصية</li>
         </ul>
      </div>
      {{-- <div class="flex flex-col items-center w-full justify-center mt-14">
         <img class="max-w-1/5 w-1/5" src="{{asset('assets/front-end/icons/Logo.svg')}}">

      </div> --}}
   </div>
   <div class="relative max-w-xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-7xl rtl">
      <div class="relative text-right">
         <h2 class="text-[28px] leading-8  pt-20 text-[#201A3C] sm:text-[28px]"> السياسة والخصوصية</h2>
         <p dir="rtl" class="mt-7 mb-8  font-shamelnormal text-[#201A3C] text-[16px]">  {!! $privacy_policy['value'] !!} </p>

      </div>

   </div>
</div>
@endsection
