@extends('layouts.front-end.app')

@section('title',ucfirst($data['data_from']).' products')

@push('css_or_js')
    <meta property="og:image" content="{{asset('storage/company')}}/{{$web_config['web_logo']}}"/>
    <meta property="og:title" content="Products of {{$web_config['name']}} "/>
    <meta property="og:url" content="{{env('APP_URL')}}">
    <meta property="og:description" content="{!! substr($web_config['about']->value,0,100) !!}">

    <meta property="twitter:card" content="{{asset('storage/company')}}/{{$web_config['web_logo']}}"/>
    <meta property="twitter:title" content="Products of {{$web_config['name']}}"/>
    <meta property="twitter:url" content="{{env('APP_URL')}}">
    <meta property="twitter:description" content="{!! substr($web_config['about']->value,0,100) !!}">

@endpush

@section('content')



    <!-- new desine products -->
    <div>


    <!-- heder -->
  <div class="container max-w-7xl mx-auto sm:px-6 lg:px-8 pt-10 px-5">
    <div class="flex flex-row-reverse">
      <ul class="list-reset breadcrumbs flex flex-row-reverse font-shamelnormal text-[16px]">
        <li>
          <a class="hover:text-[#CC9933] duration-200" href="{{route('home')}}">الرئيسية</a>
        </li>
        <li class="px-1">/</li>
        <li>جميع المنتجات</li>
      </ul>
    </div>
  </div>
<!-- nav bar  -->
<div class="container max-w-7xl mx-auto sm:px-6 lg:px-8 px-5">
  <div
    class="md:flex py-4 md:py-5 justify-between items-center flex-row-reverse md:h-14 rounded-lg mt-10 bg-login my-2 text-white px-3"
    >
    <div class="grid grid-cols-1 text-right content-center md:w-52 font-shamelnormal text-[18px] md:py-4 min-w-[170px]">
      @if($data['data_from'] == 'best-selling')
      أكثر المنتجات مبيعًا
      @elseif($data['data_from'] == 'top-rated')
      الأعلى تقيما
      @elseif($data['data_from'] == 'most-favorite')
      اكثر تفضيلا
      @elseif($data['data_from'] == 'category')
      {{$data['name']}}
      @else
      جميع المنتجات
    @endif
  
  
  
  </div>
    <div class="grid md:gap-2 md:grid-cols-2 md:w-72 md:w-full content-center">
      <div class="flex justify-center md:justify-start">
        <div class="flex flex-row justify-center md:justify-start items-center min-w-[230px] relative">
          <!-- <div class="" style="width:200px;">
            <form id="search-form" action="{{ route('products') }}" method="GET">
            @csrf
              <input hidden name="data_from" value="{{$data['data_from']}}">
              <select class="text-right text-right custom-select bg-[#201A3C] custom-select font-normal font-shamelnormal text-right w-10/12" onchange="filter(this.value)">
                <option class=" text-[18px]" selected value="latest">تمت اضافتها حديثا</option>
                <option value="low-high"> السعر المنخفض إلى المرتفع</option>
                <option value="high-low">السعر المرتفع إلى المنخفض</option>
                <option value="a-z">تريب من أ الى ي</option>
                <option value="z-a">تريب من ي الى أ</option>
              </select>
            </form>
              
          </div>
          <span class="text-18px font-bold">          صنف ب
          </span>
        </div> -->
      </div>
    </div>
  </div>

</div>
  




  <div
    class="flex flex-col-reverse md:flex-row container max-w-7xl mx-auto my-10 sm:space-x-4 mb-2"
  >
  <!-- products show -->
  @if(count($products) > 0)
    <div class="basis-3/4 rtl">
     
      <div id="ajax-products" class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:gap-x-8" >

      @include('web-views.products._ajax-products',['products'=>$products])

        <!-- More products... -->
      </div>
      
    </div>

    @else
    <div class="basis-3/4 flex  justify-center rtl">
     
      <div>
        <p class="text-5xl text-[#CC9933] text-center mt-10">قريبا</p> <br>
        <div class="mt-5">          
          <a href="{{route('products',['data_from'=>'latest'])}}" class="duration-200 items-center flex rounded-[10px] mt-8 px-8 py-3 pt-4 border border-[#CC9933] hover:bg-[#CC9933] hover:text-white text-[18px] font-shamelBold text-[#CC9933] market_button"> إظهار جميع المنتجات</a>         
         </div>
      </div>

    </div>
      @endif




    <!-- filter -->
    <div class="basis-1/4 flex-row-reverse justify-between md:justify-start md:flex-col mb-6 bg-gray-50 remove-m-mobile rounded-lg py-5">
      <button class="flex toggle-filter-btn md:hidden justify-between w-full px-4 py-4 text-sm font-medium text-left bg-gray-50 rounded-lg hover:bg-gray-100 focus:outline-none focus-visible:ring focus-visible:bg-gray-100 sidebar-widget-title">
        <img class="arrow-img w-5 h-5 purple-500 transform rotate-180" src="{{asset('assets/front-end/icons/down-filled-triangular-arrow 2.svg')}}" />
        <span class="text-[#201A3C] text-[16px] font-bold"> الفلاتر </span>
      </button>
      <div class="wrap-filters hidden sm:block mt-3 md:mt-0"> <!------------Start Wrap filter---------------->
          <!--search -->
             
          <div class="mt-2">
          <button
            class="flex justify-between w-full px-4 py-3 text-sm font-medium text-left bg-gray-50 rounded-lg hover:bg-gray-100 focus:outline-none focus-visible:ring focus-visible:bg-gray-100 sidebar-widget-title">
            <img class="arrow-img w-5 h-5 purple-500 transform rotate-180" src="{{asset('assets/front-end/icons/down-filled-triangular-arrow 2.svg')}}" />
            <span class="text-[#201A3C] text-[16px] font-bold"> البحث </span>
          </button>
          <div class="px-4 pt-4 pb-2 text-sm widget-content">
            <div class="">
              <div class="flex flex-col items-end space-y-3 font-shamelnormal border-b  border-[#201B3D66] pb-8 ">
                <div class="relative w-full">
                  <form action="{{route('products')}}" type="submit" class="search_form">
                      <input class="rounded-lg px-3 first-letter:  text-right border w-full h-12 block p-0 placeholder-gray-500 focus:ring-0 focus:outline-[#201A3C] font-bold focus:border-[#201A3C] text-[#201A3C] sm:text-sm form-control appended-form-control search-bar-input-product" type="text"
                              autocomplete="off"
                              placeholder="{{\App\CPU\translate('البحث')}}"
                              name="name">
                      <button class="input-group-append-overlay search_button" type="submit"
                              style="border-radius: {{Session::get('direction') === "rtl" ? '7px 0px 0px 7px; right: unset; left: 0' : '0px 7px 7px 0px; left: unset; right: 0'}};">
                              <span class="input-group-text" style="font-size: 20px;">
                                  <i class="czi-search text-white"></i>
                              </span>
                      </button>
                      <input name="data_from" value="search" hidden>
                      <input name="page" value="1" hidden>
                      <div class="card absolute bg-white search-card z-10 h-40 overflow-auto top-12 rounded shadow"
                            style="width: 100%;display: none">
                          <div class="card-body search-result-box p-3 text-right" style="overflow:scroll;overflow-x: hidden"></div>
                      </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
          <!-- div -->
        <div class="flex justify-center">
            <div class="w-full pt-2">

            <div class="w-full mx-auto bg-white rounded-2xl b-2 bg-gray-50">

                {{-- <div class="mt-2">
                  <button
                    class="flex justify-between w-full px-4 py-3 text-sm font-medium text-left bg-gray-50 rounded-lg hover:bg-gray-100 focus:outline-none focus-visible:ring focus-visible:bg-gray-100 sidebar-widget-title"
                  >
                    <img class="arrow-img w-5 h-5 purple-500 transform rotate-180" src="{{asset('assets/front-end/icons/down-filled-triangular-arrow 2.svg')}}" />
                    <span class="text-[#201A3C] text-[16px] font-bold"> ترتيب حسب </span>
                  </button>
                  <div class="px-4 pt-4 pb-2 text-sm widget-content">
                    <div class="">               
                        <div class="flex flex-col items-end space-y-3 font-shamelnormal border-b  border-[#201B3D66] pb-8 ">                    
                            <div onclick="location.href='{{route('products',['id'=> $data['id'],'data_from'=>'low-high','page'=>1])}}'" class="-m-0.5 relative p-0.5  text-[#201A3C] flex items-end justify-center cursor-pointer focus:outline-none mb-1">

                            أكثر المنتجات مبيعًا
                            </div>

                            <div onclick="location.href='{{route('products',['id'=> $data['id'],'data_from'=>'high-low','page'=>1])}}'" class="-m-0.5 relative p-0.5 text-[#201A3C]  flex items-end justify-center cursor-pointer focus:outline-none mb-1">

                              الأعلى تقيما
                            </div>

                            <div onclick="location.href='{{route('products',['id'=> $data['id'],'data_from'=>'a-z','page'=>1])}}'" class="-m-0.5 relative p-0.5 text-[#201A3C]  flex items-end justify-center cursor-pointer focus:outline-none mb-1">

                            اكثر تفضيلا
                            </div>


                            <div onclick="location.href='{{route('products',['id'=> $data['id'],'data_from'=>'z-a','page'=>1])}}'" class="-m-0.5 relative p-0.5   flex items-end justify-center cursor-pointer focus:outline-none">

                              {{\App\CPU\translate('most_favorite')}}
                            </div>




                        </div>
                        </div>

                    </div>
                    </div> --}}


                <div class="mt-2">
                  <button
                    class="flex justify-between w-full px-4 py-3 text-sm font-medium text-left bg-gray-50 rounded-lg hover:bg-gray-100 focus:outline-none focus-visible:ring focus-visible:bg-gray-100 sidebar-widget-title">
                    <img class="arrow-img w-5 h-5 purple-500 transform rotate-180" src="{{asset('assets/front-end/icons/down-filled-triangular-arrow 2.svg')}}" />
                    <span class="text-[#201A3C] text-[16px] font-bold"> فلترة حسب </span>
                  </button>
                  <div class="px-4 pt-4 pb-2 text-sm widget-content">
                    <div class="">

                     {{-- <div class="flex flex-col items-end font-shamelnormal border-b  border-[#201B3D66] pb-8 ">
                        <div onclick="location.href='{{route('products',['id'=> $data['id'],'data_from'=>'best-selling','page'=>1])}}'" class="filter-item mt-0 w-full -m-0.5 relative p-0.5 hover:text-[#fff] hover:bg-[#CC9933] duration-300 px-3 py-3 flex items-end justify-end cursor-pointer focus:outline-none {{$data['filter']->search('best-selling') == true? 'text-[#fff] bg-[#CC9933]' : ''}} mb-1">
                          أكثر المنتجات مبيعًا
                        </div>
                        <div onclick="location.href='{{route('products',['id'=> $data['id'],'data_from'=>'top-rated','page'=>1])}}'" class="filter-item mt-0 w-full -m-0.5 relative p-0.5 hover:text-[#fff] hover:bg-[#CC9933] duration-300 px-3 py-3 flex items-end justify-end cursor-pointer focus:outline-none {{$data['filter']->search('top-rated') == true? 'text-[#fff] bg-[#CC9933]' : ''}} mb-1">
                          الأعلى تقيما
                        </div>
                        <div onclick="location.href='{{route('products',['id'=> $data['id'],'data_from'=>'most-favorite','page'=>1])}}'" class="filter-item mt-0 w-full -m-0.5 relative p-0.5 hover:text-[#fff] hover:bg-[#CC9933] duration-300 px-3 py-3 flex items-end justify-end cursor-pointer focus:outline-none {{$data['filter']->search('most-favorite') == true? 'text-[#fff] bg-[#CC9933]' : ''}}">
                         اكثر تفضيلا
                        </div>

                      </div>--}}

                      <div class="flex flex-col items-end font-shamelnormal border-b  border-[#201B3D66] pb-8 ">
                        <div onclick="location.href='{{route('products',['id'=> $data['id'],'data_from'=>'best-selling','page'=>1])}}'" class="filter-item mt-0 w-full -m-0.5 relative p-0.5 hover:text-[#fff] hover:bg-[#CC9933] duration-300 px-3 py-3 flex items-end justify-end cursor-pointer focus:outline-none {{$data['data_from'] == 'best-selling'? 'text-[#fff] bg-[#CC9933]' : ''}} mb-1">
                          أكثر المنتجات مبيعًا
                        </div>
                        <div onclick="location.href='{{route('products',['id'=> $data['id'],'data_from'=>'top-rated','page'=>1])}}'" class="filter-item mt-0 w-full -m-0.5 relative p-0.5 hover:text-[#fff] hover:bg-[#CC9933] duration-300 px-3 py-3 flex items-end justify-end cursor-pointer focus:outline-none {{$data['data_from'] == 'top-rated'?  'text-[#fff] bg-[#CC9933]' : ''}} mb-1">
                          الأعلى تقيما
                        </div>
                        <div onclick="location.href='{{route('products',['id'=> $data['id'],'data_from'=>'most-favorite','page'=>1])}}'" class="filter-item mt-0 w-full -m-0.5 relative p-0.5 hover:text-[#fff] hover:bg-[#CC9933] duration-300 px-3 py-3 flex items-end justify-end cursor-pointer focus:outline-none {{$data['data_from'] == 'most-favorite'? 'text-[#fff] bg-[#CC9933]' : ''}}">
                         اكثر تفضيلا
                        </div>

                      </div>
                    </div>

                  </div>
                </div>


                {{--<div class="mt-2">
                  <button
                    class="flex justify-between w-full px-4 py-3 text-sm font-medium text-left bg-gray-50 rounded-lg hover:bg-gray-100 focus:outline-none focus-visible:ring focus-visible:bg-gray-100 sidebar-widget-title"
                  >
                    <img class="arrow-img w-5 h-5 purple-500 transform rotate-180" src="{{asset('assets/front-end/icons/down-filled-triangular-arrow 2.svg')}}" />
                    <span class="text-[#201A3C] text-[16px] font-bold"> العلامات التجارية</span>
                  </button>
                  <div class="px-4 pt-4 pb-2 text-sm widget-content">
                    <div class="">

                        <div class="flex flex-col items-end space-y-3 font-shamelnormal border-b  border-[#201B3D66] pb-8 ">

                        @foreach(\App\CPU\BrandManager::get_brands() as $brand)

                            <div onclick="location.href='{{route('products',['id'=> $brand['id'],'data_from'=>'brand','page'=>1])}}'"
                            class="filter-item w-full mt-0 -m-0.5 relative p-0.5 hover:text-[#fff] hover:bg-[#CC9933] duration-300 px-3 py-3 flex items-end justify-end cursor-pointer focus:outline-none  {{$data['data_from'] == 'brand' && $data['id']==$brand['id'] ? 'text-[#fff] bg-[#CC9933]' : ''}}">

                            {{ $brand['name'] }}
                            </div>

                        @endforeach

                        </div>
                        </div>

                    </div>
                    </div>--}}


                <div class="mt-2">
                  <button
                    class="flex justify-between w-full px-4 py-3 text-sm font-medium text-left bg-gray-50 rounded-lg hover:bg-gray-100 focus:outline-none focus-visible:ring focus-visible:bg-gray-100 sidebar-widget-title"
                  >
                    <img class="arrow-img w-5 h-5 purple-500 transform rotate-180" src="{{asset('assets/front-end/icons/down-filled-triangular-arrow 2.svg')}}" />
                    <span class="text-[#201A3C] text-[16px] font-bold"> الفئات</span>
                  </button>
                  <div class="px-4 pt-4 pb-2 text-sm widget-content">
                    <div class="">
                        <div class="flex flex-col items-end font-shamelnormal border-b  border-[#201B3D66] pb-8 ">
                          @php($categories=\App\CPU\CategoryManager::parents())
                          @foreach($categories as $category)

                              {{--<div onclick="location.href='{{route('products',['id'=> $category['id'],'name'=>$category['name'],'data_from'=>'category','page'=>1])}}'"

                              class="filter-item mt-0 w-full -m-0.5 relative p-0.5 hover:text-[#fff] hover:bg-[#CC9933] duration-300 px-3 py-3 flex items-end justify-end cursor-pointer focus:outline-none {{$data['filter']->search('category') == true && $data['categories_id']->search($category['id']) !== false ? 'text-[#fff] bg-[#CC9933]' : ''}} mb-1">

                              {{$category['name']}}
                              </div>--}}


                              <div onclick="location.href='{{route('products',['id'=> $category['id'],'name'=>$category['name'],'data_from'=>'category','page'=>1])}}'"

                              class="filter-item mt-0 w-full -m-0.5 relative p-0.5 hover:text-[#fff] hover:bg-[#CC9933] duration-300 px-3 py-3 flex items-end justify-end cursor-pointer focus:outline-none {{$data['data_from'] == 'category' && $data['id']==$category['id'] ? 'text-[#fff] bg-[#CC9933]' : ''}} mb-1">

                              {{$category['name']}}
                              </div>

                          @endforeach

                        </div>
                      </div>
                    </div>
                  </div>





                <div class="mt-2">
                  {{-- <button
                    class="flex justify-between w-full px-4 py-3 text-sm font-medium text-left bg-gray-50 rounded-lg hover:bg-gray-100 focus:outline-none focus-visible:ring focus-visible:bg-gray-100 sidebar-widget-title"
                  >
                  <img class="arrow-img w-5 h-5 purple-500 transform rotate-180" src="{{asset('assets/front-end/icons/down-filled-triangular-arrow 2.svg')}}" />

                    <span class="text-[#201A3C] text-[16px] font-bold font-bold"> مقاسات</span>
                  </button> --}}

                  {{-- <div class="px-4 pt-4 pb-2 text-sm widget-content text-gray-500">



                      <div class="mt-2">


                    <div class="grid grid-cols-3 gap-4 place-items-end   font-shamelnormal border-b  border-[#201B3D66] pb-8 ">

                    @php($sizes = array(["name"=> "X"],["name"=> "XL"],["name"=> "XXL"] ))
                    @foreach ($sizes as $size)
                        <div
                          class="w-12 rounded-20px flex items-center justify-center text-sm font-medium uppercase sm:flex-1"
                        >
                          <p>
                            {{ $size["name"] }}
                          </p>

                          </div>

                    @endforeach
                    </div>

                    </div>
                </div> --}}




                <!-- <div class="mt-2">
                  <button class="flex justify-between w-full px-4 py-2 text-sm font-medium text-left bg-gray-50 rounded-lg hover:bg-gray-100 focus:outline-none focus-visible:ring focus-visible:bg-gray-100">
                  <img class="w-5 h-5 purple-500 transform rotate-180" src="{{asset('assets/front-end/icons/down-filled-triangular-arrow 2.svg')}}" />
                  <span class="text-[#201A3C] text-[16px]">اللون</span>
                  </button>

                  <div class="px-4 pt-4 pb-2 text-sm text-gray-500">
                    <div class="flex flex-col items-end border-b border-[#201B3D66] pb-8">

                      <div class="mt-2">
                        <div class="sr-only">
                          Choose a color
                        </div>


                        <div class="flex flex-row gap-2 items-center font-shamelnormal ">
                        @php($colors = array(["name"=> "Moonstone Blue", "bgColor"=> "bg-[#6AACC8]","selectedColor"=> "#6AACC8"],["name"=> "Moonstone Blue", "bgColor"=> "bg-[#6AACC8]","selectedColor"=> "#6AACC8"],["name"=> "Moonstone Blue", "bgColor"=> "bg-[#6AACC8]","selectedColor"=> "#6AACC8"] ))
                        @foreach ($colors as $color)
                            <div
                              class="-m-0.5 relative p-0.5 rounded-full flex cursor-pointer focus:outline-none {{$color['bgColor']}}"
                            >
                              <p class="sr-only">
                                {{ $color["name"] }}
                                </p>
                              <span
                                aria-hidden="true"
                                class='h-8 w-8 border border-black border-opacity-10 rounded-full'/>
                            </div>

                            @endforeach

                        </div>
                                </div>
                    </div>
                        </div>
                </div>  -->
              </div>
            </div>
            </div>
        </div>

        <!-- slider -->
          <div class="my-6 px-4">
            <div class="flex flex-row-reverse mt-4 text-[16px] text-[#201A3C] mr-3 font-bold">السعر</div>
            <div class="flex justify-between mb-2">
              <div class="text-[#201A3C]">10 ₪</div>
              {{-- <div class="mr-3 amount" id="amount">500 ₪</div> --}}
              <div class="text-[#201A3C]">
                <output id="rangevalue">500</output><span> ₪</span>
              </div>
            </div>
            <div class="grid grid-cols-1">
              <form action="">
                <input id ="price-range" type="range" value="500" min="10" max="500" oninput="rangevalue.value=value"/>
              </form>
            </div>
          </div>
      </div> <!------------End Wrap filter---------------->

      <div class="hidden top-0 p-4">
        <div
          class="relative overflow-hidden rounded-lg shadow-lg cursor-pointer overlay-shadow"
        >
          <img
            src='{{asset("assets/front-end/img/image1.png")}}'
            class="object-cover h-96 w-72"
          />
          <div class="absolute flex top-0 left-0 px-6 py-4 space-x-1 z-10 image-offer-shadow-text">
            <h4 class="mb-3 text-4xl font-semibold tracking-tight text-white">
              50 %
            </h4>
               <h4 class="grid self-end  mb-3  text-xl font-semibold tracking-tight text-white">
            off
            </h4>

          </div>
          <div class="absolute bottom-0 right-0 b px-6 py-4 z-10">
            <h4 class="text-right mb-3 text-xl font-semibold tracking-tight text-white">             
            </h4>
          </div>
        </div>
      </div>
    </div>
  </div>
      <div class="mb-16 ">
        <div class="container max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 ">
          <nav class="flex justify-content-between pt-2" aria-label="Page navigation"
              id="paginator-ajax">
              {!! $products->links() !!}
          </nav>
        </div>
      </div>
    </div>
@endsection

@push('script')
    <script>
      
        function openNav() {
            document.getElementById("mySidepanel").style.width = "50%";
        }

        function closeNav() {
            document.getElementById("mySidepanel").style.width = "0";
        }

        $("#price-range").change(function () {

          searchByPriceRang($(this).val());
        });

        function searchByPriceRang(value) {
          console.log(value);
            // let min = $('#min_price').val();
            let max = value;
            $.get({
                url: '{{url('/')}}/products',
                data: {
                    id: '{{$data['id']}}',
                    name: '{{$data['name']}}',
                    data_from: '{{$data['data_from']}}',
                    sort_by: '{{$data['sort_by']}}',
                    min_price: 10,
                    max_price: max,
                },
                dataType: 'json',
                beforeSend: function () {
                    $('#loading').show();
                },
                success: function (response) {
                    $('#ajax-products').html(response.view);
                    $('#paginator-ajax').html(response.paginator);
                },
                complete: function () {
                    $('#loading').hide();
                },
            });
        }


          // $(document).on('input', '#price-range', function() {
          //   console.log($(this).val());
          // });

        function filter(value) {
         
            $.get({
                url: '{{url('/')}}/products',
                data: {
                    id: '{{$data['id']}}',
                    name: '{{$data['name']}}',
                    data_from: '{{$data['data_from']}}',
                    min_price: '{{$data['min_price']}}',
                    max_price: '{{$data['max_price']}}',
                    sort_by: value
                },
                dataType: 'json',
                beforeSend: function () {
                    $('#loading').show();
                },
                success: function (response) {
                    $('#ajax-products').html(response.view);
                },
                complete: function () {
                    $('#loading').hide();
                },
            });
        }

        function searchByPrice() {
            let min = $('#min_price').val();
            let max = $('#max_price').val();
            $.get({
                url: '{{url('/')}}/products',
                data: {
                    id: '{{$data['id']}}',
                    name: '{{$data['name']}}',
                    data_from: '{{$data['data_from']}}',
                    sort_by: '{{$data['sort_by']}}',
                    min_price: min,
                    max_price: max,
                },
                dataType: 'json',
                beforeSend: function () {
                    $('#loading').show();
                },
                success: function (response) {
                    $('#ajax-products').html(response.view);
                    $('#paginator-ajax').html(response.paginator);
                },
                complete: function () {
                    $('#loading').hide();
                },
            });
        }

        $('#searchByFilterValue, #searchByFilterValue-m').change(function () {
            var url = $(this).val();
            if (url) {
                window.location = url;
            }
            return false;
        });

        $("#search-brand").on("keyup", function () {
            var value = this.value.toLowerCase().trim();
            $("#lista1 div>li").show().filter(function () {
                return $(this).text().toLowerCase().trim().indexOf(value) == -1;
            }).hide();
        });
    </script>
@endpush
