<style>
    .blocs {
  max-width: 430px;
  height: 360px;
  background: #201b3d;
}
.paragraph_text {
  max-width: 275px;
}
.second_paragraph {
  line-height: 50px;
  font-size: 34px;
  letter-spacing: 0.2px;
}
.market_button{
  border-radius: 10px;
}
</style>

@php($main_banner=\App\Model\Banner::where('banner_type','Main Banner')->where('published',1)->orderBy('id','desc')->get())

<div class="container max-w-7xl mx-auto sm:px-6 lg:px-8">
  <!-- Set up your HTML -->
  <div class="owl-carousel main-home-slider owl-dots-style">
    <!-- This example requires Tailwind CSS v2.0+ -->
    @foreach($main_banner as $key=>$banner)
    <div class="relative bg-gray-50">      
      <main class="lg:relative">
        <div class="text-slider mx-auto max-w-7xl w-full text-center lg:text-left min-h-[350px] lg:h-[73vh] flex items-center justify-center lg:justify-start">
          <div class="px-4 lg:w-1/2 sm:px-8 xl:pr-16 text-right">
            <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl lg:text-5xl xl:text-6xl">              
              <span class="block text-center lg:text-right dark-clr mb-5">{{$banner->title}}</span>
              <span class="block text-center lg:text-right text-indigo-600 leading-[70px] main-clr">{{$banner->subtitle}}</span>             
            </h1>
            {{-- <p class="mt-3 max-w-md mx-auto text-lg text-gray-500 sm:text-xl md:mt-5 md:max-w-3xl">Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat aliqua.</p> --}}
            <div class="mt-10 sm:flex sm:justify-center lg:justify-start">
              <div class="rounded-md shadow">
                <a href="{{$banner['url']}}" class="duration-300 px-3 py-2.5 pt-3 style-btn w-full flex items-center justify-center border border-transparent text-base font-medium rounded-md text-white bg-[#201A3C] hover:bg-[#CC9933] focus:border-0 md:text-lg md:px-10"> تسوقي الآن </a>
              </div>              
            </div>
          </div>
        </div>
        <div class="relative w-full h-64 sm:h-72 md:h-96 lg:absolute lg:inset-y-0 lg:left-0 lg:w-1/2 lg:h-full">
          <img class="absolute inset-0 w-full h-full object-cover" src="{{asset('/storage/banner')}}/{{$banner['photo']}}" alt="">
        </div>
      </main>      
    </div>
    @endforeach    
  </div>
</div>


<script>
    $(function () {
        $('.list-group-item').on('click', function () {
            $('.glyphicon', this)
                .toggleClass('glyphicon-chevron-right')
                .toggleClass('glyphicon-chevron-down');
        });
    });
</script>
