@extends('layouts.back-end.app')

@section('title', \App\CPU\translate('Blog'))

@push('css_or_js')

@endpush

@section('content')
    <div class="content container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{\App\CPU\translate('Dashboard')}}</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">{{\App\CPU\translate('blog')}}</li>
            </ol>
        </nav>

        @php($language=\App\Model\BusinessSetting::where('type','pnc_language')->first())
                            @php($language = $language->value ?? null)
                            @php($default_lang = 'en')
                            @php($default_lang = json_decode($language)[0])
        
    

        <div class="row" style="margin-top: 20px" id="cate-table">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row flex-between justify-content-between align-items-center flex-grow-1">
                           
                            <div class="col-12 col-sm-6 col-md-4" style="width: 30vw">
                                
                             <!-- Search -->
                                <form action="{{ url()->current() }}" method="GET">
                                    <div class="input-group input-group-merge input-group-flush">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="tio-search"></i>
                                            </div>
                                        </div>
                                        <input id="" type="search" name="search" class="form-control"
                                            placeholder="{{ \App\CPU\translate('search_here')}}" value="{{ $search }}" required>
                                        <button type="submit" class="btn btn-primary">{{\App\CPU\translate('search')}}</button>
                                    </div>
                                </form>
                                <!-- End Search -->
                            </div>
                            <div class="col-12 col-md-3">
                            <a href="{{route('admin.blog.add-new')}}" class="btn btn-primary  float-right">
                                <i class="tio-add-circle"></i>
                                <span class="text">{{\App\CPU\translate('Add new blog')}}</span>
                            </a>
                        </div>
                        </div>
                    </div>
                    <div class="card-body" style="padding: 0">
                        <div class="table-responsive">
                            <table style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};"
                                class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                                <thead class="thead-light">
                                <tr>
                                    <th style="width: 100px">{{ \App\CPU\translate('blog')}} {{ \App\CPU\translate('ID')}}</th>
                                    <th>{{ \App\CPU\translate('title')}}</th>
                                    {{--<th>{{ \App\CPU\translate('slug')}}</th>--}}
                                    <th>{{ \App\CPU\translate('image')}}</th>
                                    <th>{{ \App\CPU\translate('blog_status')}}</th>
                                    <th class="text-center" style="width:15%;">{{ \App\CPU\translate('action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($blogs as $key=>$blog)
                                    <tr>
                                        <td class="text-center">{{$blog['id']}}</td>
                                        <td>{{$blog['title']}}</td>
                                        {{--<td>{{$blog['slug']}}</td>--}}
                                        <td>
                                            <img width="64"
                                                 onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'"
                                                 src="{{asset('storage/blog')}}/{{$blog['image']}}">
                                        </td>
                                        <td>
                                            @if($blog->blog_status == true)
                                                <div style="padding: 10px;border: 1px solid;cursor: pointer"
                                                     onclick="location.href='{{route('admin.blog.status',[$blog['id'],0])}}'">
                                                    <span class="legend-indicator bg-success" style="{{Session::get('direction') === "rtl" ? 'margin-right: 0;margin-left: .4375rem;' : 'margin-left: 0;margin-right: .4375rem;'}}"></span>{{\App\CPU\translate('active')}}
                                                </div>
                                            @elseif($blog->blog_status == false)
                                                <div style="padding: 10px;border: 1px solid;cursor: pointer"
                                                     onclick="location.href='{{route('admin.blog.status',[$blog['id'],1])}}'">
                                                    <span class="legend-indicator bg-danger" style="{{Session::get('direction') === "rtl" ? 'margin-right: 0;margin-left: .4375rem;' : 'margin-left: 0;margin-right: .4375rem;'}}"></span>{{\App\CPU\translate('disabled')}}
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-primary btn-sm edit" style="cursor: pointer;"
                                               href="{{route('admin.blog.edit',[$blog['id']])}}">
                                                <i class="tio-edit"></i>{{ \App\CPU\translate('Edit')}}
                                            </a>
                                            <a class="btn btn-danger btn-sm delete" style="cursor: pointer;"
                                               id="{{$blog['id']}}">
                                                <i class="tio-add-to-trash"></i>{{ \App\CPU\translate('Delete')}}
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-footer">
                        {{$blogs->links()}}
                    </div>
                    @if(count($blogs)==0)
                        <div class="text-center p-4">
                            <img class="mb-3" src="{{asset('assets/back-end')}}/svg/illustrations/sorry.svg" alt="Image Description" style="width: 7rem;">
                            <p class="mb-0">{{\App\CPU\translate('no_data_found')}}</p>
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

        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>

    <script>
        $(document).on('click', '.delete', function () {
            var id = $(this).attr("id");
            Swal.fire({
                title: '{{\App\CPU\translate('Are_you_sure')}}?',
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
                        url: "{{route('admin.blog.delete')}}",
                        method: 'POST',
                        data: {id: id},
                        success: function () {
                            toastr.success('{{\App\CPU\translate('Blog_deleted_Successfully.')}}');
                            location.reload();
                        }
                    });
                }
            })
        });
    </script>

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#viewer').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#customFileEg1").change(function () {
            readURL(this);
        });
    </script>
@endpush
