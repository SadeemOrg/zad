@extends('layouts.front-end.app')

@section('title',\App\CPU\translate('Blog'))

@section('content')

<div class="container max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">
    <!-- Start breadcrumb -->
    <div class="flex flex-row-reverse my-8">
         <ul class="list-reset breadcrumbs flex flex-row-reverse font-shamelnormal text-[16px]">
            <li><a class="hover:text-[#CC9933] duration-200" href="{{route('home')}}">الرئيسية</a></li>
            <li class="px-1">/</li>
            <li>المدونة</li>
         </ul>
    </div>
    <!-- End breadcrumb -->
    <!-- Start page content -->

    @if(count($blogs) > 0)
    @foreach($blogs as $blog)
    <div class="md:flex md:flex-row-reverse justify-start items-start gap-8 mb-8">
        <div class="relative overlay-shadow mb-5 md:mb-0">
            <img src="{{asset("storage/blog/$blog->image")}}" class="max-h-[330px] w-full md:w-[400px] md:h-[300px] lg:h-[330px] basis-1/3 rounded-xl object-cover" />
        </div>
        <div class="md:h-[330px] md:flex basis-2/3 items-center" dir="rtl">
            <div>
                <p class="md:text-[22px] text-[20px] text-[#201A3C] font-bold">
                {{$blog->title}}
                </p>
                <p class="text-[17px] font-shamelnormal text-[#201A3C]"> {{date('d M, Y',strtotime($blog->created_at))}}</p>
                <p
                class=" pt-2 mb-8 text-right font-shamelnormal text-[#201A3C] text-[16px]" >
                {!! $blog->content !!}
                </p>
            </div>
        </div>
    </div>
    @endforeach


    @else
    <h2 class="text-center text-[30px] font-bold py-[100px]">
        المدونة فارغة
    </h2>

    @endif

    <div class="mb-16">
        <div class="container max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">        
            <div class="flex justify-center pb-10 px-10">
                <nav class="flex justify-content-between pt-2" aria-label="Page navigation"
                    id="paginator-ajax">
                    {!! $blogs->links() !!}
                </nav>
            </div>
        </div>
    </div>

    
  </div>


@endsection