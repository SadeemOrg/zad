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
        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-12" id="banner-btn">
                <button id="main-banner-add" class="btn btn-primary"><i
                        class="tio-add-circle"></i> {{ \App\CPU\translate('add_banner')}}</button>
            </div>
        </div>
        <!-- Content Row -->
        <div class="row pt-4" id="main-banner"
             style="display: none;text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ \App\CPU\translate('banner_form')}}
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.banner.store')}}" method="post" enctype="multipart/form-data"
                              class="banner_form">
                            @csrf
                            @php($language=\App\Model\BusinessSetting::where('type','pnc_language')->first())
                            @php($language = $language->value ?? null)
                            @php($default_lang = 'en')
                            @php($default_lang = json_decode($language)[0])
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
                                        <div class="form-group {{$lang != $default_lang ? 'd-none':''}} lang_form row col-12 mb-5"
                                             id="{{$lang}}-form">
                                             <div class="col-6">
                                             <label class="input-label"
                                                   for="exampleFormControlInput1">{{\App\CPU\translate('title')}}
                                                ({{strtoupper($lang)}})</label>
                                            <input type="text" name="title[]" class="form-control"
                                                   placeholder="{{\App\CPU\translate('title')}}" {{$lang == $default_lang? 'required':''}}>
                                             </div>
                                             <div class="col-6">
                                                   <label class="input-label"
                                                   for="exampleFormControlInput1">{{\App\CPU\translate('subtitle')}}
                                                ({{strtoupper($lang)}})</label>
                                            <input type="text" name="subtitle[]" class="form-control"
                                                   placeholder="{{\App\CPU\translate('subtitle')}}" {{$lang == $default_lang? 'required':''}}>
                                             </div>

                                        </div>
                                        <input type="hidden" name="lang[]" value="{{$lang}}">
                                    @endforeach

                                        

                               
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="hidden" id="id" name="id">
                                            <label for="name">{{ \App\CPU\translate('banner_url')}}</label>
                                            <input type="text" name="url" class="form-control" id="url" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="name">{{\App\CPU\translate('banner_type')}}</label>
                                            <select style="width: 100%"
                                                    class="js-example-responsive form-control"
                                                    name="banner_type" required>
                                                <option value="Main Banner">Main Banner</option>
                                                <option value="Footer Banner">Footer Banner</option>
                                                <option value="Popup Banner">Popup Banner</option>
                                                <option value="Discount Banner">Discount Banner</option>
                                                <option value="New Banner">What's new? Banner</option>
                                                <option value="Featured Banner">Featured Banner</option>
                                                
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="resource_id">{{\App\CPU\translate('resource_type')}}</label>
                                            <select style="width: 100%" onchange="display_data(this.value)"
                                                    class="js-example-responsive form-control"
                                                    name="resource_type" required>
                                                <option value="product">Product</option>
                                                <option value="category">Category</option>
                                                <option value="shop">Shop</option>
                                                <option value="brand">Brand</option>
                                            </select>
                                        </div>

                                        <div class="form-group" id="resource-product">
                                            <label for="product_id">{{\App\CPU\translate('product')}}</label>
                                            <select style="width: 100%"
                                                    class="js-example-responsive form-control"
                                                    name="product_id">
                                                @foreach(\App\Model\Product::active()->get() as $product)
                                                    <option value="{{$product['id']}}">{{$product['name']}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group" id="resource-category" style="display: none">
                                            <label for="name">{{\App\CPU\translate('category')}}</label>
                                            <select style="width: 100%"
                                                    class="js-example-responsive form-control"
                                                    name="category_id">
                                                @foreach(\App\CPU\CategoryManager::parents() as $category)
                                                    <option value="{{$category['id']}}">{{$category['name']}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group" id="resource-shop" style="display: none">
                                            <label for="shop_id">{{\App\CPU\translate('shop')}}</label>
                                            <select style="width: 100%"
                                                    class="js-example-responsive form-control"
                                                    name="shop_id">
                                                @foreach(\App\Model\Shop::active()->get() as $shop)
                                                    <option value="{{$shop['id']}}">{{$shop['name']}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group" id="resource-brand" style="display: none">
                                            <label for="brand_id">{{\App\CPU\translate('brand')}}</label>
                                            <select style="width: 100%"
                                                    class="js-example-responsive form-control"
                                                    name="brand_id">
                                                @foreach(\App\Model\Brand::all() as $brand)
                                                    <option value="{{$brand['id']}}">{{$brand['name']}}</option>
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
                                                src="{{asset('public\assets\back-end\img\400x400\img1.jpg')}}"
                                                alt="banner image"/>
                                        </center>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <a class="btn btn-secondary text-white cancel">{{ \App\CPU\translate('Cancel')}}</a>
                                <button id="add" type="submit"
                                        class="btn btn-primary">{{ \App\CPU\translate('save')}}</button>
                                <a id="update" class="btn btn-primary"
                                   style="display: none; color: #fff;">{{ \App\CPU\translate('update')}}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top: 20px" id="banner-table">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="flex-between row justify-content-between align-items-center flex-grow-1 mx-1">
                            <div class="flex-between">
                                <div><h5>{{ \App\CPU\translate('banner_table')}}</h5></div>
                                <div class="mx-1"><h5 style="color: red;">({{ $banners->total() }})</h5></div>
                            </div>
                            <div style="width: 30vw">
                                <!-- Search -->
                                <form action="{{ url()->current() }}" method="GET">
                                    <div class="input-group input-group-merge input-group-flush">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="tio-search"></i>
                                            </div>
                                        </div>
                                        <input id="datatableSearch_" type="search" name="search" class="form-control"
                                               placeholder="{{ \App\CPU\translate('Search_by_Banner_Type')}}"
                                               aria-label="Search orders" value="{{ $search }}" required>
                                        <button type="submit"
                                                class="btn btn-primary">{{ \App\CPU\translate('Search')}}</button>
                                    </div>
                                </form>
                                <!-- End Search -->
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="padding: 0">
                        <div class="table-responsive">
                            <table id="columnSearchDatatable"
                                   style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};"
                                   class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                                <thead class="thead-light">
                                <tr>
                                    <th>{{\App\CPU\translate('sl')}}</th>
                                    <th>{{\App\CPU\translate('Title')}}</th>
                                    <th>{{\App\CPU\translate('Subtitle')}}</th>
                                    <th>{{\App\CPU\translate('image')}}</th>
                                    <th>{{\App\CPU\translate('banner_type')}}</th>
                                    <th>{{\App\CPU\translate('published')}}</th>
                                    <th style="width: 50px">{{\App\CPU\translate('action')}}</th>
                                </tr>
                                </thead>
                                @foreach($banners as $key=>$banner)
                                    <tbody>

                                    <tr>
                                        <th scope="row">{{$banners->firstItem()+$key}}</th>
                                        <td>{{$banner->title}}</td>
                                        <td>{{$banner->subtitle}}</td>
                                        <td>
                                            <img width="80"
                                                 onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'"
                                                 src="{{asset('storage/banner')}}/{{$banner['photo']}}">
                                        </td>

                                        
                                        <td>{{$banner->banner_type}}</td>
                                        <td><label class="switch"><input type="checkbox" class="status"
                                                                         id="{{$banner->id}}" <?php if ($banner->published == 1) echo "checked" ?>><span
                                                    class="slider round"></span></label></td>

                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown"
                                                        aria-haspopup="true"
                                                        aria-expanded="false">
                                                    <i class="tio-settings"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="{{route('admin.banner.edit',[$banner['id']])}}" style="cursor: pointer;"> {{ \App\CPU\translate('Edit')}}</a>
                                                    <a class="dropdown-item delete" style="cursor: pointer;"
                                                       id="{{$banner['id']}}"> {{ \App\CPU\translate('Delete')}}</a>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>

                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        {{$banners->links()}}
                    </div>
                    @if(count($banners)==0)
                        <div class="text-center p-4">
                            <img class="mb-3" src="{{asset('assets/back-end')}}/svg/illustrations/sorry.svg"
                                 alt="Image Description" style="width: 7rem;">
                            <p class="mb-0">{{ \App\CPU\translate('No_data_to_show')}}</p>
                        </div>
                    @endif
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

        function fbimagereadURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#fbImageviewer').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#fbimageFileUploader").change(function () {
            fbimagereadURL(this);
        });

        function pbimagereadURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#pbImageviewer').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#pbimageFileUploader").change(function () {
            pbimagereadURL(this);
        });

    </script>
    <script>
        $('#main-banner-add').on('click', function () {
            $('#main-banner').show();
        });

        $('.cancel').on('click', function () {
            $('.banner_form').attr('action', "{{route('admin.banner.store')}}");
            $('#main-banner').hide();
        });

        $(document).on('change', '.status', function () {
            var id = $(this).attr("id");
            if ($(this).prop("checked") == true) {
                var status = 1;
            } else if ($(this).prop("checked") == false) {
                var status = 0;
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('admin.banner.status')}}",
                method: 'POST',
                data: {
                    id: id,
                    status: status
                },
                success: function (data) {
                    if (data == 1) {
                        toastr.success('{{\App\CPU\translate('Banner_published_successfully')}}');
                    } else {
                        toastr.success('{{\App\CPU\translate('Banner_unpublished_successfully')}}');
                    }
                }
            });
        });

        $(document).on('click', '.delete', function () {
            var id = $(this).attr("id");
            Swal.fire({
                title: "{{\App\CPU\translate('Are_you_sure_delete_this_banner')}}?",
                text: "{{\App\CPU\translate('You_will_not_be_able_to_revert_this')}}!",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '{{\App\CPU\translate('Yes')}}, {{\App\CPU\translate('delete_it')}}!'
            }).then((result) => {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{route('admin.banner.delete')}}",
                        method: 'POST',
                        data: {id: id},
                        success: function () {
                            toastr.success('{{\App\CPU\translate('Banner_deleted_successfully')}}');
                            location.reload();
                        }
                    });
                }
            })
        });
    </script>
    <!-- Page level plugins -->
@endpush
