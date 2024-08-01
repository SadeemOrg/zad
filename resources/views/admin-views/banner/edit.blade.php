@extends('layouts.back-end.app')
@section('title', \App\CPU\translate('Banner'))
@push('css_or_js')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('content')
    <div class="content container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a
                        href="{{route('admin.dashboard')}}">{{\App\CPU\translate('Dashboard')}}</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">{{\App\CPU\translate('Banner')}}</li>
            </ol>
        </nav>
        <!-- Content Row -->
        <div class="row pt-4" style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ \App\CPU\translate('banner_update_form')}}
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.banner.update',[$banner['id']])}}" method="post" enctype="multipart/form-data"
                              class="banner_form">
                            @csrf
                            @php($language=\App\Model\BusinessSetting::where('type','pnc_language')->first())
                            @php($language = $language->value ?? null)
                            @php($default_lang = 'en')
                            @php($default_lang = json_decode($language)[0])

                            @method('put')
                            <div class="form-group">

                            <ul class="nav nav-tabs mb-4">
                                @foreach(json_decode($language) as $lang)
                                    <li class="nav-item">
                                        <a class="nav-link lang_link {{$lang == $default_lang? 'active':''}}"
                                           href="#"
                                           id="{{$lang}}-link">{{\App\CPU\Helpers::get_language_name($lang).'('.strtoupper($lang).')'}}</a>
                                    </li>
                                @endforeach
                            </ul>
                                <div class="row">

                                @foreach(json_decode($language) as $lang)

                                <?php
                                if (count($banner['translations'])) {
                                    $translate = [];
                                    foreach ($banner['translations'] as $t) {

                                        if ($t->locale == $lang && $t->key == "title") {
                                            $translate[$lang]['title'] = $t->value;
                                        }
                                        if ($t->locale == $lang && $t->key == "subtitle") {
                                            $translate[$lang]['subtitle'] = $t->value;
                                        }

                                    }
                                }
                                ?>
                                        <div class="form-group {{$lang != $default_lang ? 'd-none':''}} lang_form row col-12 mb-5"
                                             id="{{$lang}}-form">
                                             <div class="col-6">
                                             <label class="input-label"
                                                   for="exampleFormControlInput1">{{\App\CPU\translate('title')}}
                                                ({{strtoupper($lang)}})</label>
                                            <input type="text" name="title[]" class="form-control"
                                            value="{{$translate[$lang]['title']??$banner['title']}}"
                                                   placeholder="{{\App\CPU\translate('title')}}" {{$lang == $default_lang? 'required':''}}>
                                             </div>
                                             <div class="col-6">
                                                   <label class="input-label"
                                                   for="exampleFormControlInput1">{{\App\CPU\translate('subtitle')}}
                                                ({{strtoupper($lang)}})</label>
                                            <input type="text" name="subtitle[]" class="form-control"
                                            value="{{$translate[$lang]['subtitle']??$banner['subtitle']}}"
                                                   placeholder="{{\App\CPU\translate('subtitle')}}" {{$lang == $default_lang? 'required':''}}>
                                             </div>

                                        </div>
                                        <input type="hidden" name="lang[]" value="{{$lang}}">
                                    @endforeach

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="hidden" id="id" name="id">
                                            <label for="name">{{ \App\CPU\translate('banner_url')}}</label>
                                            <input type="text" name="url" class="form-control" value="{{$banner['url']}}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="name">{{\App\CPU\translate('banner_type')}}</label>
                                            <select style="width: 100%"
                                                    class="js-example-responsive form-control"
                                                    name="banner_type" required>
                                                <option value="Main Banner" {{$banner['banner_type']=='Main Banner'?'selected':''}}>Main Banner</option>
                                                <option value="Footer Banner" {{$banner['banner_type']=='Footer Banner'?'selected':''}}>Footer Banner</option>
                                                <option value="Popup Banner" {{$banner['banner_type']=='Popup Banner'?'selected':''}}>Popup Banner</option>
                                                <option value="Discount Banner" {{$banner['banner_type']=='Discount Banner'?'selected':''}}>Discount Banner</option>
                                                <option value="New Banner" {{$banner['banner_type']=='New Banner'?'selected':''}}>What's new? Banner</option>
                                                <option value="Featured Banner" {{$banner['banner_type']=='Featured Banner'?'selected':''}}>Featured Banner</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="resource_id">{{\App\CPU\translate('resource_type')}}</label>
                                            <select style="width: 100%" onchange="display_data(this.value)"
                                                    class="js-example-responsive form-control"
                                                    name="resource_type" required>
                                                <option value="product" {{$banner['resource_type']=='product'?'selected':''}}>Product</option>
                                                <option value="category" {{$banner['resource_type']=='category'?'selected':''}}>Category</option>
                                                <option value="shop" {{$banner['resource_type']=='shop'?'selected':''}}>Shop</option>
                                                <option value="brand" {{$banner['resource_type']=='brand'?'selected':''}}>Brand</option>
                                            </select>
                                        </div>

                                        <div class="form-group" id="resource-product" style="display: {{$banner['resource_type']=='product'?'block':'none'}}">
                                            <label for="product_id">{{\App\CPU\translate('product')}}</label>
                                            <select style="width: 100%"
                                                    class="js-example-responsive form-control"
                                                    name="product_id">
                                                @foreach(\App\Model\Product::active()->get() as $product)
                                                    <option value="{{$product['id']}}" {{$banner['resource_id']==$product['id']?'selected':''}}>{{$product['name']}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group" id="resource-category" style="display: {{$banner['resource_type']=='category'?'block':'none'}}">
                                            <label for="name">{{\App\CPU\translate('category')}}</label>
                                            <select style="width: 100%"
                                                    class="js-example-responsive form-control"
                                                    name="category_id">
                                                @foreach(\App\CPU\CategoryManager::parents() as $category)
                                                    <option value="{{$category['id']}}" {{$banner['resource_id']==$category['id']?'selected':''}}>{{$category['name']}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group" id="resource-shop" style="display: {{$banner['resource_type']=='shop'?'block':'none'}}">
                                            <label for="shop_id">{{\App\CPU\translate('shop')}}</label>
                                            <select style="width: 100%"
                                                    class="js-example-responsive form-control"
                                                    name="shop_id">
                                                @foreach(\App\Model\Shop::active()->get() as $shop)
                                                    <option value="{{$shop['id']}}" {{$banner['resource_id']==$shop['id']?'selected':''}}>{{$shop['name']}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group" id="resource-brand" style="display: {{$banner['resource_type']=='brand'?'block':'none'}}">
                                            <label for="brand_id">{{\App\CPU\translate('brand')}}</label>
                                            <select style="width: 100%"
                                                    class="js-example-responsive form-control"
                                                    name="brand_id">
                                                @foreach(\App\Model\Brand::all() as $brand)
                                                    <option value="{{$brand['id']}}" {{$banner['resource_id']==$brand['id']?'selected':''}}>{{$brand['name']}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <label for="name">{{ \App\CPU\translate('Image')}}</label><span
                                            class="badge badge-soft-danger">( {{\App\CPU\translate('ratio')}} 4:1 )</span>
                                        <br>
                                        <div class="custom-file" style="text-align: left">
                                            <input type="file" name="image" id="mbimageFileUploader"
                                                   class="custom-file-input"
                                                   accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                            <label class="custom-file-label"
                                                   for="mbimageFileUploader">{{\App\CPU\translate('choose')}} {{\App\CPU\translate('file')}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <center>
                                            <img
                                                style="width: auto;border: 1px solid; border-radius: 10px; max-width:400px;"
                                                id="mbImageviewer"
                                                src="{{asset('storage/banner')}}/{{$banner['photo']}}"
                                                alt=""/>
                                        </center>
                                    </div>

                                    <div class="col-md-12 mt-3">
                                        <button type="submit" class="btn btn-primary">{{ \App\CPU\translate('update')}}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>

$(".lang_link").click(function (e) {
            e.preventDefault();
            $(".lang_link").removeClass('active');
            $(".lang_form").addClass('d-none');
            $(this).addClass('active');

            let form_id = this.id;
            let lang = form_id.split("-")[0];
            console.log(lang);
            $("#" + lang + "-form").removeClass('d-none');
            if (lang == '{{$default_lang}}') {
                $(".from_part_2").removeClass('d-none');
            } else {
                $(".from_part_2").addClass('d-none');
            }
        });
        $(".js-example-theme-single").select2({
            theme: "classic"
        });

        $(".js-example-responsive").select2({
            // dir: "rtl",
            width: 'resolve'
        });

        function display_data(data) {

            $('#resource-product').hide()
            $('#resource-brand').hide()
            $('#resource-category').hide()
            $('#resource-shop').hide()

            if (data === 'product') {
                $('#resource-product').show()
            } else if (data === 'brand') {
                $('#resource-brand').show()
            } else if (data === 'category') {
                $('#resource-category').show()
            } else if (data === 'shop') {
                $('#resource-shop').show()
            }
        }
    </script>

    <script>
        function mbimagereadURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#mbImageviewer').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#mbimageFileUploader").change(function () {
            mbimagereadURL(this);
        });
    </script>
@endpush
