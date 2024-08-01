@extends('layouts.front-end.app')

@section('title',\App\CPU\translate('Order Details'))

@push('css_or_js')
    <style>
        .page-item.active .page-link {
            background-color: {{$web_config['primary_color']}}            !important;
        }

        .page-item.active > .page-link {
            box-shadow: 0 0 black !important;
        }

        .widget-categories .accordion-heading > a:hover {
            color: #FFD5A4 !important;
        }

        .widget-categories .accordion-heading > a {
            color: #FFD5A4;
        }

        body {
            font-family: 'Titillium Web', sans-serif
        }

        .card {
            border: none
        }


        .totals tr td {
            font-size: 13px
        }

        .footer span {
            font-size: 12px
        }

        .product-qty span {
            font-size: 14px;
            color: #6A6A6A;
        }

        .spanTr {
            color: #FFFFFF;
            font-weight: 900;
            font-size: 13px;

        }

        .spandHeadO {
            color: #FFFFFF !important;
            font-weight: 400;
            font-size: 13px;

        }

        .font-name {
            font-weight: 600;
            font-size: 12px;
            color: #030303;
        }

        .amount {
            font-size: 15px;
            color: #030303;
            font-weight: 600;
            margin- {{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 60px;

        }

        a {
            color: {{$web_config['primary_color']}};
            cursor: pointer;
            text-decoration: none;
            background-color: transparent;
        }

        a:hover {
            cursor: pointer;
        }

        @media (max-width: 600px) {
            .sidebar_heading {
                background: #1B7FED;
            }

            .sidebar_heading h1 {
                text-align: center;
                color: aliceblue;
                padding-bottom: 17px;
                font-size: 19px;
            }
        }

        @media (max-width: 768px) {
            .for-tab-img {
                width: 100% !important;
            }

            .for-glaxy-name {
                display: none;
            }
        }

        @media (max-width: 360px) {
            .for-mobile-glaxy {
                display: flex !important;
            }

            .for-glaxy-mobile {
                margin- {{Session::get('direction') === "rtl" ? 'left' : 'right'}}: 6px;
            }

            .for-glaxy-name {
                display: none;
            }
        }

        @media (max-width: 600px) {
            .for-mobile-glaxy {
                display: flex !important;
            }

            .for-glaxy-mobile {
                margin- {{Session::get('direction') === "rtl" ? 'left' : 'right'}}: 6px;
            }

            .for-glaxy-name {
                display: none;
            }

            .order_table_tr {
                display: grid;
            }

            .order_table_td {
                border-bottom: 1px solid #fff !important;
            }

            .order_table_info_div {
                width: 100%;
                display: flex;
            }

            .order_table_info_div_1 {
                width: 50%;
            }

            .order_table_info_div_2 {
                width: 49%;
                text-align: {{Session::get('direction') === "rtl" ? 'left' : 'right'}}        !important;
            }

            .spandHeadO {
                font-size: 16px;
                margin- {{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 16px;
            }

            .spanTr {
                font-size: 16px;
                margin- {{Session::get('direction') === "rtl" ? 'left' : 'right'}}: 16px;
                margin-top: 10px;
            }

            .amount {
                font-size: 13px;
                margin- {{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 0px;

            }

        }
    </style>
@endpush

@section('content')

    





        
 <div class="mb-20">
   <div class="container max-w-7xl mx-auto sm:px-6 lg:px-8 pt-10 px-2">
      <div class="flex flex-row-reverse">
         <ul class="list-reset breadcrumbs flex flex-row-reverse font-shamelnormal text-[16px]">
            <li><a>الرئيسية</a></li>
            <li>/</li>
            <li> الملف الشخصي</li>
            <li>/</li>
            <li>تتبع الطلبات</li>
         </ul>
      </div>
   </div>
   <div class="flex flex-col-reverse lg:flex-row mx-auto px-4 my-4 sm:px-6 lg:max-w-7xl">
      <div class="basis-3/4 lg:mr-5">
         <div class="py-5">
            <div class="mx-4 py-4">
               <div class="sm:flex items-center flex-row-reverse space-y-6 sm:space-y-0">
                  <!-- 1 -->
                  
                  
                  @php($summary=\App\CPU\OrderManager::order_summary($order))
                
                  <div class="flex items-center flex-row-reverse sm:flex-row text-[#201A3C] relative">
                     <div class="rounded-full transition duration-500 ease-in-out h-16 w-16 py-3 border-2 border-[#201A3C] bg-[#201A3C]">
                        <svg width="100%" height="100%" viewBox="0 0 34 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M28.1086 32.329H6.03365C4.57041 32.3274 3.16755 31.7454 2.13288 30.7108C1.09821 29.6761 0.516237 28.2732 0.514648 26.81V26.022C0.525648 26.05 1.64365 28.851 6.03365 29.175H28.1086C32.3876 28.911 33.6156 26.05 33.6276 26.022V26.81C33.6261 28.2732 33.0441 29.6761 32.0094 30.7108C30.9747 31.7454 29.5719 32.3274 28.1086 32.329ZM28.1086 27.599H6.03365C4.57041 27.5974 3.16755 27.0154 2.13288 25.9808C1.09821 24.9461 0.516237 23.5432 0.514648 22.08L0.514648 21.292C0.525648 21.32 1.64365 24.123 6.03365 24.447H28.1086C32.3876 24.182 33.6156 21.321 33.6276 21.292V22.081C33.6258 23.5441 33.0437 24.9467 32.0091 25.9811C30.9744 27.0156 29.5717 27.5974 28.1086 27.599ZM28.1086 22.869H6.03365C4.57041 22.8674 3.16755 22.2854 2.13288 21.2508C1.09821 20.2161 0.516237 18.8132 0.514648 17.35L0.514648 6.31099C0.516237 4.84775 1.09821 3.44489 2.13288 2.41022C3.16755 1.37555 4.57041 0.79358 6.03365 0.791992L28.1086 0.791992C29.5719 0.79358 30.9747 1.37555 32.0094 2.41022C33.0441 3.44489 33.6261 4.84775 33.6276 6.31099V17.35C33.6261 18.8132 33.0441 20.2161 32.0094 21.2508C30.9747 22.2854 29.5719 22.8674 28.1086 22.869ZM13.9406 14.261C13.7354 14.2599 13.538 14.3393 13.3907 14.4821C13.2433 14.6249 13.1579 14.8199 13.1526 15.025L13.1296 15.749C13.1266 15.8544 13.1447 15.9594 13.1829 16.0578C13.2211 16.1561 13.2786 16.2458 13.3521 16.3215C13.4256 16.3972 13.5135 16.4574 13.6106 16.4985C13.7078 16.5397 13.8122 16.5609 13.9176 16.561H16.2836V17.336C16.2836 17.5451 16.3667 17.7457 16.5146 17.8935C16.6625 18.0414 16.863 18.1245 17.0721 18.1245C17.2813 18.1245 17.4818 18.0414 17.6297 17.8935C17.7776 17.7457 17.8606 17.5451 17.8606 17.336V16.561H18.6496C19.2773 16.5602 19.879 16.3102 20.3225 15.866C20.766 15.4218 21.0149 14.8197 21.0146 14.192V13.406C21.0141 12.779 20.765 12.1778 20.3218 11.7343C19.8786 11.2907 19.2776 11.0411 18.6506 11.04H15.5146C15.3056 11.04 15.105 10.957 14.9571 10.8093C14.8092 10.6615 14.7259 10.4611 14.7256 10.252V9.46199C14.7267 9.25343 14.8103 9.05377 14.9582 8.90667C15.106 8.75957 15.3061 8.67699 15.5146 8.67699H19.4586C19.5021 8.86718 19.6146 9.03446 19.7744 9.14648C19.9341 9.2585 20.1297 9.30728 20.3233 9.28339C20.5169 9.2595 20.6948 9.16463 20.8225 9.01714C20.9502 8.86966 21.0187 8.68004 21.0146 8.48499V7.89199C21.0146 7.68291 20.9317 7.48238 20.7839 7.33444C20.6362 7.1865 20.4357 7.10326 20.2266 7.10299H17.8596V6.31099C17.8596 6.10187 17.7766 5.90131 17.6287 5.75344C17.4808 5.60557 17.2803 5.52249 17.0711 5.52249C16.862 5.52249 16.6615 5.60557 16.5136 5.75344C16.3657 5.90131 16.2826 6.10187 16.2826 6.31099V7.09899H15.5146C14.8873 7.09952 14.2858 7.34897 13.8422 7.79256C13.3986 8.23616 13.1492 8.83765 13.1486 9.46499V10.255C13.1497 10.882 13.3994 11.483 13.8429 11.9261C14.2865 12.3693 14.8877 12.6185 15.5146 12.619H18.6466C18.8557 12.6193 19.0562 12.7025 19.2039 12.8504C19.3517 12.9984 19.4346 13.1989 19.4346 13.408V14.192C19.4346 14.4011 19.3517 14.6016 19.2039 14.7495C19.0562 14.8975 18.8557 14.9807 18.6466 14.981H14.7266C14.7105 14.7881 14.6239 14.6078 14.4834 14.4746C14.3428 14.3415 14.1582 14.2647 13.9646 14.259H13.9406V14.261Z" fill="white"></path>
                        </svg>
                     </div>
                     <div class="sm:absolute top-3 right-[-32px] -ml-10 text-center sm:mt-16 w-32 text-xs font-medium uppercase text-[#201A3C]">تأكيد الطلب</div>
                  </div>
                
                  
                  <div class="flex-auto border-t-2 transition duration-500 ease-in-out border-[#201A3C]"></div>
                  <!-- 2 -->

                  <div class="flex items-center flex-row-reverse sm:flex-row text-[#201A3C] relative">
                     <div class="rounded-full transition duration-500 ease-in-out h-16 w-16 py-3 border-2  @if($order['order_status']=='processing') border-gold bg-gold @elseif($order['order_status']!='processing' && ($order['order_status']=='processed' || $order['order_status']=='out_for_delivery' || $order['order_status']=='delivered')) border-[#201A3C] bg-[#201A3C] @else border-gray-300 @endif ">
                        <svg width="100%" height="100%" viewBox="0 0 29 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M23.4376 32.2662H5.90864C4.47073 32.2787 3.08656 31.7204 2.05978 30.7137C1.03301 29.707 0.447478 28.3341 0.431643 26.8962C0.431429 26.6745 0.445458 26.4531 0.473643 26.2332L0.487643 26.1332H28.8576L28.8696 26.2332C28.9589 26.9257 28.9095 27.629 28.7242 28.3021C28.539 28.9753 28.2216 29.6049 27.7906 30.1542C27.3461 30.7263 26.7921 31.2043 26.161 31.5602C25.5299 31.9161 24.8343 32.1428 24.1146 32.2272C23.89 32.2537 23.6639 32.2667 23.4376 32.2662ZM28.6626 24.5952H0.681643L2.94364 6.85819C2.96917 6.67071 3.06215 6.49897 3.20517 6.37509C3.34818 6.25121 3.53144 6.1837 3.72064 6.18519H5.57364V12.3232C5.60087 13.0394 5.90451 13.7171 6.42083 14.2142C6.93714 14.7112 7.62595 14.9889 8.34264 14.9889C9.05933 14.9889 9.74815 14.7112 10.2645 14.2142C10.7808 13.7171 11.0844 13.0394 11.1116 12.3232V6.18619H18.2316V12.3232C18.2553 13.0417 18.5573 13.7228 19.074 14.2227C19.5906 14.7226 20.2813 15.002 21.0001 15.002C21.719 15.002 22.4097 14.7226 22.9263 14.2227C23.4429 13.7228 23.745 13.0417 23.7686 12.3232V6.18619H25.6236C25.8127 6.18513 25.9958 6.25279 26.1387 6.37659C26.2816 6.50039 26.3747 6.67189 26.4006 6.85919L28.6616 24.5932L28.6626 24.5952ZM21.0016 13.4732C20.6917 13.4777 20.3926 13.3591 20.17 13.1433C19.9475 12.9275 19.8196 12.6322 19.8146 12.3222V6.18619C19.7994 5.25673 19.4161 4.37126 18.749 3.72396C18.0818 3.07666 17.1851 2.72036 16.2556 2.73319H13.0906C12.1611 2.72036 11.2645 3.07666 10.5973 3.72396C9.93015 4.37126 9.54691 5.25673 9.53164 6.18619V12.3232C9.52268 12.6319 9.39374 12.925 9.17221 13.1402C8.95068 13.3554 8.65399 13.4757 8.34514 13.4757C8.0363 13.4757 7.73961 13.3554 7.51808 13.1402C7.29654 12.925 7.16761 12.6319 7.15864 12.3232V6.18619C7.1847 4.63741 7.82374 3.16215 8.93569 2.08375C10.0476 1.00535 11.5418 0.411795 13.0906 0.43319H16.2556C17.8047 0.411528 19.2991 1.00496 20.4112 2.08339C21.5234 3.16182 22.1626 4.63724 22.1886 6.18619V12.3232C22.1834 12.633 22.0555 12.928 21.8329 13.1436C21.6104 13.3592 21.3114 13.4777 21.0016 13.4732Z" fill="@if($order['order_status']=='processing') white @elseif($order['order_status']!='processing' && ($order['order_status']=='processed' || $order['order_status']=='out_for_delivery' || $order['order_status']=='delivered')) white @else #C4C4C4 @endif"></path>
                        </svg>
                     </div>
                     <div class="sm:absolute top-3 right-[-32px] -ml-10 text-center sm:mt-16 w-32 text-xs font-medium uppercase @if($order['order_status']=='processing') text-gold @elseif($order['order_status']!='processing' && ($order['order_status']=='processed' || $order['order_status']=='out_for_delivery' || $order['order_status']=='delivered')) text-[#201A3C] @else text-black @endif ">تجهيز الطلب</div>
                  </div>
                  <div class="flex-auto border-t-2 transition duration-500 ease-in-out @if($order['order_status']=='processing') border-gold bg-gold @elseif($order['order_status']!='processing' && ($order['order_status']=='processed' || $order['order_status']=='out_for_delivery' || $order['order_status']=='delivered')) border-[#201A3C] bg-[#201A3C] @else border-gray-300 @endif "></div>
                  <!-- 3 -->
                  <div class="flex items-center flex-row-reverse sm:flex-row text-gray-500 relative">
                     <div class="rounded-full transition duration-500 ease-in-out h-16 w-16 py-3 border-2 @if($order['order_status']=='processed' || $order['order_status']=='out_for_delivery' ) border-gold bg-gold @elseif($order['order_status'] !='processed' && ($order['order_status']=='delivered') ) border-[#201A3C] bg-[#201A3C] @else border-gray-300 @endif ">
                        <svg width="100%" height="100%" viewBox="0 0 34 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M11.759 23.8093C11.759 23.0297 11.5278 22.2675 11.0946 21.6193C10.6615 20.971 10.0458 20.4658 9.32552 20.1674C8.60522 19.869 7.81261 19.791 7.04794 19.9431C6.28326 20.0952 5.58087 20.4706 5.02957 21.0219C4.47827 21.5732 4.10283 22.2756 3.95073 23.0403C3.79863 23.805 3.87669 24.5976 4.17505 25.3179C4.47341 26.0382 4.97867 26.6538 5.62693 27.087C6.27518 27.5201 7.03733 27.7513 7.81698 27.7513C8.86198 27.7497 9.86372 27.3339 10.6026 26.595C11.3416 25.8561 11.7574 24.8543 11.759 23.8093ZM29.104 23.8093C29.104 23.0297 28.8728 22.2675 28.4396 21.6193C28.0065 20.971 27.3908 20.4658 26.6705 20.1674C25.9502 19.869 25.1576 19.791 24.3929 19.9431C23.6283 20.0952 22.9259 20.4706 22.3746 21.0219C21.8233 21.5732 21.4478 22.2756 21.2957 23.0403C21.1436 23.805 21.2217 24.5976 21.5201 25.3179C21.8184 26.0382 22.3237 26.6538 22.9719 27.087C23.6202 27.5201 24.3823 27.7513 25.162 27.7513C26.207 27.7497 27.2087 27.3339 27.9476 26.595C28.6866 25.8561 29.1024 24.8543 29.104 23.8093ZM30.625 23.0213H31.468C32.0952 23.0208 32.6965 22.7715 33.1401 22.3281C33.5836 21.8847 33.8332 21.2835 33.834 20.6563V19.0793C33.8332 18.4521 33.5837 17.8507 33.1401 17.4072C32.6966 16.9637 32.0952 16.7141 31.468 16.7133H14.777C14.8658 16.4597 14.9115 16.193 14.912 15.9243V4.88733C14.9112 4.26007 14.6617 3.65873 14.2181 3.21519C13.7746 2.77165 13.1732 2.52212 12.546 2.52133C12.4319 2.52178 12.318 2.5298 12.205 2.54533L4.02298 3.73533C3.55663 3.80224 3.121 4.00726 2.77221 4.32397C2.42341 4.64068 2.17744 5.05457 2.06598 5.51233L2.02598 5.67533H6.23998C6.86767 5.67639 7.46926 5.92662 7.91253 6.37102C8.35581 6.81542 8.60452 7.41764 8.60398 8.04533V11.1983C8.60346 11.8253 8.35429 12.4265 7.91112 12.8701C7.46796 13.3136 6.86698 13.5633 6.23998 13.5643H0.720985V15.9283C0.719536 16.51 0.933239 17.0717 1.32098 17.5053C0.933907 17.9397 0.720325 18.5015 0.720985 19.0833V20.6603C0.719524 21.1629 0.878746 21.6528 1.1754 22.0585C1.47206 22.4641 1.89062 22.7644 2.36998 22.9153C2.58479 21.6156 3.25734 20.4355 4.26613 19.5883C5.27493 18.7411 6.55346 18.2826 7.87075 18.2957C9.18805 18.3087 10.4572 18.7924 11.4491 19.6594C12.4409 20.5265 13.09 21.7196 13.279 23.0233H19.698C19.8882 21.7101 20.545 20.5094 21.5483 19.6409C22.5516 18.7725 23.8341 18.2945 25.161 18.2945C26.4879 18.2945 27.7704 18.7725 28.7737 19.6409C29.7769 20.5094 30.4338 21.7101 30.624 23.0233L30.625 23.0213ZM33.834 15.1373V3.31133C33.8341 3.00058 33.773 2.69286 33.6542 2.40574C33.5353 2.11863 33.361 1.85775 33.1413 1.63802C32.9216 1.41829 32.6607 1.24402 32.3736 1.12516C32.0865 1.0063 31.7787 0.945196 31.468 0.945328H15.7C15.2111 0.943583 14.7337 1.09385 14.334 1.37533C14.9811 1.70585 15.5243 2.20873 15.9037 2.82846C16.2831 3.44819 16.4839 4.16069 16.484 4.88733V15.1373H33.834ZM0.721985 11.9843H6.23998C6.44907 11.9841 6.64949 11.9008 6.79725 11.7529C6.945 11.6049 7.02798 11.4044 7.02798 11.1953V8.04533C7.02772 7.83633 6.94465 7.63595 6.79695 7.48807C6.64926 7.34019 6.44899 7.25686 6.23998 7.25633H1.63998L0.789986 10.7163C0.744507 10.9012 0.721672 11.0909 0.721985 11.2813V11.9863V11.9843Z" fill="@if($order['order_status']=='processed' || $order['order_status']=='out_for_delivery' ) white @elseif($order['order_status'] !='processed' && ($order['order_status']=='delivered') ) white @else #C4C4C4 @endif"></path>
                        </svg>
                     </div>
                     <div class="sm:absolute top-3 right-[-32px] -ml-10 text-center sm:mt-16 w-32 text-xs font-medium uppercase @if($order['order_status']=='processed' || $order['order_status']=='out_for_delivery' ) text-gold @elseif($order['order_status'] !='processed' && ($order['order_status']=='delivered') )  text-[#201A3C] @else text-black @endif ">الشحن</div>
                  </div>
                  <div class="flex-auto border-t-2 transition duration-500 ease-in-out @if($order['order_status']=='processed' || $order['order_status']=='out_for_delivery' ) border-gold bg-gold @elseif($order['order_status'] !='processed' && ($order['order_status']=='delivered') ) border-[#201A3C] bg-[#201A3C] @else border-gray-300 @endif "></div>
                  <!-- 4 -->
                  <div class="flex items-center flex-row-reverse sm:flex-row text-gray-500 relative">
                     <div class="rounded-full transition duration-500 ease-in-out h-16 w-16 py-3 border-2 @if($order['order_status']=='delivered') border-[#201A3C] bg-[#201A3C] @elseif($order['order_status'] !='delivered') border-gray-300 @endif ">
                        <svg width="100%" height="100%" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M6.53893 31.1591H23.7859C25.1195 31.1575 26.398 30.627 27.3409 29.6841C28.2839 28.7411 28.8143 27.4626 28.8159 26.1291V12.3511H1.50793V26.1281C1.50925 27.462 2.03973 28.7409 2.98294 29.6841C3.92615 30.6273 5.20503 31.1578 6.53893 31.1591ZM19.4729 15.3481C19.6635 15.3481 19.8462 15.4238 19.981 15.5585C20.1157 15.6933 20.1914 15.876 20.1914 16.0666C20.1914 16.2571 20.1157 16.4399 19.981 16.5746C19.8462 16.7094 19.6635 16.7851 19.4729 16.7851H10.8529C10.6624 16.7851 10.4796 16.7094 10.3449 16.5746C10.2101 16.4399 10.1344 16.2571 10.1344 16.0666C10.1344 15.876 10.2101 15.6933 10.3449 15.5585C10.4796 15.4238 10.6624 15.3481 10.8529 15.3481H19.4729ZM1.50793 10.9141H28.8159C29.2361 10.7651 29.5998 10.4897 29.8572 10.1257C30.1145 9.76165 30.2527 9.32687 30.2529 8.88107V3.13207C30.2524 2.56043 30.0251 2.01235 29.6209 1.60814C29.2167 1.20392 28.6686 0.976604 28.0969 0.976074L2.22693 0.976074C1.65519 0.976603 1.10701 1.20389 0.702639 1.60808C0.298265 2.01226 0.0707226 2.56034 0.0699291 3.13207V8.88107C0.0703526 9.32695 0.208817 9.76176 0.466297 10.1258C0.723778 10.4898 1.08765 10.7652 1.50793 10.9141Z" fill="@if($order['order_status']=='delivered') white @elseif($order['order_status'] !='delivered') #C4C4C4 @endif"></path>
                        </svg>
                     </div>
                     <div class="sm:absolute top-3 right-[-32px] -ml-10 text-center sm:mt-16 w-32 text-xs font-medium uppercase @if($order['order_status']=='delivered') text-[#201A3C] @elseif($order['order_status'] !='delivered') text-black @endif">التسليم</div>
                  </div>
               </div>
            </div>
         </div>
         <!-- flex justify-between  -->
         <div class="flex flex-row-reverse justify-between items-start flex-wrap mt-7 border rounded-lg text-white bg-[#201A3C] text-whites">
            <div class="p-6 w-1/2 md:w-1/5 grid grid-cols-1 gap-3 place-content-center place-items-center"><span class="text-[18px] text-center"> رقم الطلب </span><span class="font-shamelnormal text-[15px]"> {{$order->id}} </span></div>
            <div class="p-6 w-1/2 md:w-1/5 grid grid-cols-1 gap-3 place-content-center place-items-center"><span class="text-[18px] text-center"> تاريخ الطلب </span><span class="font-shamelnormal text-[14px]"> {{date('d M, Y',strtotime($order->created_at))}} </span></div>
            <div class="p-6 w-1/2 md:w-2/5 grid grid-cols-1 gap-3 place-content-center place-items-center">
               <span class="text-[18px] text-center"> عنوان الشحن </span>
               @if($order->shippingAddress)
                @php($shipping=$order->shippingAddress)
                @else
                @php($shipping=json_decode($order['shipping_address_data']))
                @endif
                
               <p class="text-center text-[10px] sm:text-[16px] font-shamelnormal"> 
               @if($shipping)
                {{$shipping->address}},<br>
                {{$shipping->city}}
                , {{$shipping->zip}}
                , {{$shipping->country}}
              @endif
               </p>
            </div>
            <div class="p-6 w-1/2 md:w-1/5 grid grid-cols-1 gap-3 place-content-center place-items-center">
               <span class="text-[18px] font-shamelBold"> السعر </span>
               <span class="flex">
                  <p class="text-center text-[16px]">{{\App\CPU\Helpers::currency_converter($order->order_amount)}}</p>
               </span>
            </div>
         </div>

         <input id="order_id_data" type="hidden" value="{{$order->id}}">

         @foreach ($order->details as $key=>$detail)
         @php($product=json_decode($detail->product_details,true))
         
         <div class="sm:flex sm:flex-row-reverse justify-between">
            <div onclick="location.href='{{route('product',$product['slug'])}}'"
            class="flex flex-row-reverse mt-7 rounded-lg h-36">
               <img  onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'"
                     src="{{\App\CPU\ProductManager::product_image_path('thumbnail')}}/{{$product['thumbnail']}}" alt="" class="rounded-md w-[120px] md:w-[150px] my-auto h-[110px] md:h-[130px] object-cover">
               <div class="my-auto text-right font-shamelnormal text-[17px] text-[#201A3C] mr-5 object-cover" dir="rtl"> {{isset($product['name']) ? Str::limit($product['name'],40) : ''}}<br> 
               {{$detail->variant}} <br> 
               {{"طلب" ." : ".$detail->qty}} 
               
                <span class="font-shamelBold text-[#201A3C] text-[20px] pr-2">{{\App\CPU\Helpers::currency_converter((($detail->price)*$detail->qty)+$detail->tax)}}</span></div>

            </div>
           
            @if($order->order_status=='delivered')
            <div class="my-auto text-center">
               <button value="{{$product['id']}}" class="review border-2 border-[#CC9933] h-1/3 hover:bg-[#CC9933] hover:text-white my-auto px-10 sm:px-6 pt-3 pb-2 relative rounded-[10px] text-[#CC9933] text-center">تقييم المنتج</button>
            </div>
            @endif
         </div>

         @endforeach
        
         <div class="grid justify-items-end gap-7 mt-7 rounded-lg p-2 bg-[#FAFAFA] p-6 md:p-10">
            <div class="sm:w-1/3 w-full flex justify-between flex-row-reverse"><span class="text-[#201A3C] text-[16px] font-shamelnormal">العناصر</span><span class="text-[#201A3C] text-[16px] font-shamelnormal w-[80px] text-center">{{$order->details->count()}}</span></div>
            <div class="sm:w-1/3 w-full flex justify-between flex-row-reverse"><span class="text-[#201A3C] text-[16px] font-shamelnormal">المبلغ</span><span class="text-[#201A3C] text-[16px] font-shamelnormal w-[80px] text-center">{{\App\CPU\Helpers::currency_converter($summary['subtotal'])}}</span></div>
            <div class="sm:w-1/3 w-full flex justify-between flex-row-reverse"><span class="text-[#201A3C] text-[16px] font-shamelnormal">الضرائب</span><span class="text-[#201A3C] text-[16px] font-shamelnormal w-[80px] text-center">{{\App\CPU\Helpers::currency_converter($summary['total_tax'])}}</span></div>
            @if($summary['total_discount_on_product'] > 0)
            <div class="sm:w-1/3 w-full flex justify-between flex-row-reverse"><span class="text-[#201A3C] text-[16px] font-shamelnormal">خصم على المنتج</span><span class="text-[#201A3C] text-[16px] font-shamelnormal w-[80px] text-center">{{\App\CPU\Helpers::currency_converter($summary['total_discount_on_product'])}}</span></div>
            @endif
            <div class="sm:w-1/3 w-full flex justify-between flex-row-reverse"><span class="text-[#201A3C] text-[16px] font-shamelnormal">التوصيل</span><span class="text-[#201A3C] text-[16px] font-shamelnormal w-[80px] text-center">{{\App\CPU\Helpers::currency_converter($summary['total_shipping_cost'])}}</span></div>
            
            <div class="sm:w-1/3 w-full flex justify-between flex-row-reverse border-b border-t border-[#201A3C4D] py-3">
               <span class="text-[#201A3C] text-[16px] font-shamelnormal">المبلغ الاجمالي</span>                  
               <span class="w-[80px] text-center">{{\App\CPU\Helpers::currency_converter($order->order_amount)}}</span>
            </div>

            <div class="sm:w-1/3 w-full flex justify-between flex-row-reverse border-t border-gray-200 sm:border-none">
              <!-- <div class="w-1/2 sm:border-t sm:border-gray-200 text-white pt-6"><button class="w-full h-14 rounded-lg bg-[#CC9933]"> تتبع الطلب </button></div> -->
               <a href="{{route('generate-invoice',[$order->id])}}" class="w-full duration-300 text-center border border-[#CC9933] rounded-[10px] shadow-sm text-[18px] py-3 pt-4 px-4 text-base font-medium text-[#CC9933] hover:bg-[#CC9933] hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50">إنشاء الفاتورة</a>
            </div>
         </div>
            
         </div>
      
    <div class="lg:basis-1/4 min-w-[300px] lg:block">
         <nav class="bg-[#201A3C] text-white rounded-md overflow-hidden" aria-label="Sidebar">
           
            <a  href="{{route('user-account')}}" class="flex hover:bg-[#CC9933] duration-300 hover:text-[#fff] justify-between flex-row-reverse px-5 py-3 text-[16px] font-shamelBold border-b-2 border-[#393063]" href="#">
               <span class="truncate">الملف الشخصي </span>
               <svg width="11" height="17" viewBox="0 0 11 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.1582 16.1799L10.1582 0.820002C10.1582 0.0931492 9.28049 -0.277135 8.75934 0.244005L1.07932 7.92396C0.763893 8.23939 0.763893 8.76053 1.07932 9.07609L8.75934 16.7561C9.28049 17.2771 10.1582 16.9068 10.1582 16.1799Z" fill="white"></path>
               </svg>
            </a>
           
            <a href="{{route('account-oder') }}" class="flex hover:bg-[#CC9933] duration-300 hover:text-[#fff] justify-between flex-row-reverse px-5 py-3 text-[16px] font-shamelBold border-b-2 border-[#393063]" href="#">
               <span class="truncate">طلباتي </span>
               <svg width="11" height="17" viewBox="0 0 11 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.1582 16.1799L10.1582 0.820002C10.1582 0.0931492 9.28049 -0.277135 8.75934 0.244005L1.07932 7.92396C0.763893 8.23939 0.763893 8.76053 1.07932 9.07609L8.75934 16.7561C9.28049 17.2771 10.1582 16.9068 10.1582 16.1799Z" fill="white"></path>
               </svg>
            </a>
            <a href="{{route('wishlists')}}" class="flex hover:bg-[#CC9933] duration-300 hover:text-[#fff] justify-between flex-row-reverse px-5 py-3 text-[16px] font-shamelBold border-b-2 border-[#393063]" href="#">
               <span class="truncate">المفضلة</span>
               <svg width="11" height="17" viewBox="0 0 11 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.1582 16.1799L10.1582 0.820002C10.1582 0.0931492 9.28049 -0.277135 8.75934 0.244005L1.07932 7.92396C0.763893 8.23939 0.763893 8.76053 1.07932 9.07609L8.75934 16.7561C9.28049 17.2771 10.1582 16.9068 10.1582 16.1799Z" fill="white"></path>
               </svg>
            </a>
            <!--<a class="flex hover:bg-[#CC9933] duration-300 hover:text-[#fff] justify-between flex-row-reverse px-5 py-3 text-[16px] font-shamelBold border-b-2 border-[#393063]" href="#">
               <span class="truncate">عنواني </span>
               <svg width="11" height="17" viewBox="0 0 11 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.1582 16.1799L10.1582 0.820002C10.1582 0.0931492 9.28049 -0.277135 8.75934 0.244005L1.07932 7.92396C0.763893 8.23939 0.763893 8.76053 1.07932 9.07609L8.75934 16.7561C9.28049 17.2771 10.1582 16.9068 10.1582 16.1799Z" fill="white"></path>
               </svg>
            </a>
            <a class="flex justify-between flex-row-reverse px-5 py-3 text-[16px] font-shamelBold border-b-2 border-[#393063]" href="#">
               <span class="truncate hover:text-gold">خدمة العملاء  </span>
               <svg width="11" height="17" viewBox="0 0 11 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.1582 16.1799L10.1582 0.820002C10.1582 0.0931492 9.28049 -0.277135 8.75934 0.244005L1.07932 7.92396C0.763893 8.23939 0.763893 8.76053 1.07932 9.07609L8.75934 16.7561C9.28049 17.2771 10.1582 16.9068 10.1582 16.1799Z" fill="white"></path>
               </svg>
            </a>-->
            <a href="{{route('customer.auth.logout')}}" class="flex hover:bg-[#CC9933] duration-300 hover:text-[#fff] justify-between flex-row-reverse px-5 pl-3 py-3 text-sm font-medium">
               <span> تسيجل خروج </span>
               <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M6.73828 17.6094V19.4062C6.73828 21.3879 8.35038 23 10.332 23H19.3613C21.343 23 22.9551 21.3879 22.9551 19.4062V3.59375C22.9551 1.6121 21.343 0 19.3613 0H10.332C8.35038 0 6.73828 1.6121 6.73828 3.59375V5.39062C6.73828 5.88687 7.14047 6.28906 7.63672 6.28906C8.13297 6.28906 8.53516 5.88687 8.53516 5.39062V3.59375C8.53516 2.60301 9.34129 1.79688 10.332 1.79688H19.3613C20.3521 1.79688 21.1582 2.60301 21.1582 3.59375V19.4062C21.1582 20.397 20.3521 21.2031 19.3613 21.2031H10.332C9.34129 21.2031 8.53516 20.397 8.53516 19.4062V17.6094C8.53516 17.1131 8.13297 16.7109 7.63672 16.7109C7.14047 16.7109 6.73828 17.1131 6.73828 17.6094ZM0.612938 9.95669L2.62477 7.94485C2.97572 7.5939 3.54462 7.5939 3.89539 7.94485C4.24635 8.29563 4.24635 8.86452 3.89539 9.2153L2.46439 10.6465H13.252C13.7482 10.6465 14.1504 11.0487 14.1504 11.5449C14.1504 12.0412 13.7482 12.4434 13.252 12.4434H2.46439L3.89539 13.8745C4.24635 14.2253 4.24635 14.7942 3.89539 15.145C3.71992 15.3205 3.49004 15.4082 3.26017 15.4082C3.03012 15.4082 2.80025 15.3205 2.62477 15.145L0.612938 13.1332C-0.262863 12.2574 -0.262863 10.8325 0.612938 9.95669Z" fill="white"></path>
               </svg>
            </a>
         </nav>
    </div>
   </div>
</div>





<div id="reviewModal" class="modal-wrap-pop fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
   <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
      &gt; 
      <form action="{{route('review.store')}}" method="post">
      @csrf
      <input id="product_id_form" name="product_id" type="hidden" value="1">
      <input id="rating_input" type="hidden" name="rating" value="4">
      <input id="order_id_form" type="hidden" name="order_id" value="{{$order->id}}">
      <div class="modal-con relative inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-xl sm:w-full sm:p-6">
         <div>
            <div class="mx-auto flex items-center justify-center">
               <!-- Heroicon name: outline/check -->
               <img class="w-20" src="{{asset('assets/front-end/icons/Logo.svg')}}" alt="" />
            </div>
            <div class="mt-3 text-center sm:mt-5">
               <h3 class="leading-6 text-[23px] text-[#201A3C]" id="modal-title"> شاركينا رأيك عن المنتج </h3>
              
               
               <div class="rating shadow-none"></div>


            </div>
         </div>
         <!--Message details -->
         <div class="mt-1">
            <p class="text-right text-[#201B3D] text-[21px] font-shamelBold">رايك الخاص</p>
            <textarea id="message" name="comment" rows="6" cols="45" class="py-3 px-4 block w-full shadow-sm focus:ring-[#9A92CC] placeholder-[#201A3C] text-right border border-[#9A92CC] rounded-[15px]"></textarea>
         </div>
         <button type="submit" class="w-full border border-[#CC9933] rounded-[10px] shadow-sm bg-[#201B3D] text-[18px] py-3 pt-4 px-4 mt-4 text-base font-medium text-white hover:bg-[#CC9933] hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50"> ارسال </button>
        
      </div>
      </form>
   </div>
</div>
    

@endsection


@push('script')
    <script>
        function review_message() {
            toastr.info('{{\App\CPU\translate('you_can_review_after_the_product_is_delivered!')}}', {
                CloseButton: true,
                ProgressBar: true
            });
        }

        function refund_message(){
            toastr.info('{{\App\CPU\translate('you_can_refund_request_after_the_product_is_delivered!')}}', {
                CloseButton: true,
                ProgressBar: true
            });
        }

        
        $("#reviewModal").hide();
        $(".review").click(function(){
            $('#order_id_form').val($('#order_id_data').val())
            $('#product_id_form').val($(this).val())
            $("#reviewModal").show();
           
        })

        //Start rating stars js code
        $( document ).ready(function() {
            $('.rating').starRating({
               starIconEmpty: 'fa-solid fa-star',
               starIconFull: 'fa-solid fa-star',
               starColorEmpty: 'lightgray',
               starColorFull: '#FFC107',
               starsSize: 2, // em
               stars: 5,
               showInfo: false,
            });
            $(document).on('change', '.rating', function (e, stars, index) {
               
               $('#rating_input').val(stars);
              
            });
         });
         //End rating stars js code
        

    </script>
@endpush

