@extends('layouts.front-end.app')

@section('title',\App\CPU\translate('Order Complete'))

@push('css_or_js')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');

        body {
            font-family: 'Montserrat', sans-serif
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
            color: {{$web_config['primary_color']}};
            font-weight: 700;

        }

        .spandHeadO {
            color: #030303;
            font-weight: 500;
            font-size: 20px;

        }

        .font-name {
            font-weight: 600;
            font-size: 13px;
        }

        .amount {
            font-size: 17px;
            color: {{$web_config['primary_color']}};
        }

        @media (max-width: 600px) {
            .orderId {
                margin- {{Session::get('direction') === "rtl" ? 'left' : 'right'}}: 91px;
            }

            .p-5 {
                padding: 2% !important;
            }

            .spanTr {

                font-weight: 400 !important;
                font-size: 12px;
            }

            .spandHeadO {

                font-weight: 300;
                font-size: 12px;

            }

            .table th, .table td {
                padding: 5px;
            }
        }



        .main-div-invoise{
           padding-left: 2.5rem;
           padding-right: 2.5rem;
           width: 100%;
        }

        .name-invoice{
           text-align: center;
           margin-bottom: 0.5rem;
           font-size: 1.875rem;
           line-height: 2.25rem;
        }
        .address{
         margin-bottom: 0.75rem;
         font-size: 16px;
         text-align: center;

        }

        .information-invoise{
           display: flex;
           justify-content: space-between;
           margin-bottom: 2.5rem;
        }

        .information-invoise-col{
           display: flex;
           flex-direction: column;
        }

        .information-invoise-col p{
          margin-top: 0.25rem;
          margin-bottom: 0.25rem;
        }

        .table-div{
           margin-bottom: 2.5rem;
        }

        .table-div table{
           table-layout: fixed;
           text-align: center;
           width: 100%;
           border-width: 1px;
        }

        .table-div table thead tr,.table-div table tbody tr{
           border-bottom-width: 1px;
        }

        th,td{
         padding-top: 0.5rem;
         padding-bottom: 0.5rem;
        }

        .hr{
           border-width: 1px;
           border-color: black;
           margin-bottom: 2.5rem;
        }

        .summary-invoise{
           display: grid;
           grid-template-columns: repeat(2, minmax(0, 1fr));
           margin-bottom: 2.5rem;
           row-gap: 0.75rem;
           column-gap: 3rem;
        }

        .summary-invoise div{
           display: flex;
          justify-content: space-between;
          border-bottom-width: 1px;
        }

        .totals-invoise{
           display: flex;
           justify-content: space-between;
           margin-bottom: 2.5rem;
           text-align: center;
           border-bottom-width: 1px;

        }

        .footer-invoise{
           display: flex;
           justify-content: space-between;
           margin-bottom: 1.25rem;
        }
       
    </style>
@endpush

@section('content')
  
    <div class="mx-auto pb-24 px-4 sm:px-6 lg:max-w-7xl">

   <!-- <nav class="flex flex-row-reverse justify-start items-center font-shamelnormal text-[#201A3C] pb-3">
      <p>/الرئيسية</p>
      <p>عودة الى التسوق</p>
   </nav> -->
   
   <!-- Start breadcrumb -->
   <div class="flex flex-row-reverse py-10 pb-8">
      <ul class="list-reset breadcrumbs flex flex-row-reverse font-shamelnormal text-[16px]">
        <li>
          <a class="hover:text-[#CC9933]" href="{{route('home')}}">الرئيسية</a>
        </li>
        <li class="px-1">/</li>
        <li>
            حقيبة التسوق
        </li>
      </ul>
    </div>
    <!-- End breadcrumb -->



   <div class="flex flex-row-reverse justify-between items-center pb-8">
      <p class="text-[#201A3C] md:text-[24px] font-bold text-right">شراء المنتجات</p>
      <a href="{{route('home')}}" class="items-center flex py-3 pt-4 px-3 sm:px-8 border rounded-[10px] border-[#9A92CC] text-[14px] font-shamelBold text-[#201A3C] bg-transparent focus:outline-none market_button">
         <svg width="25" height="23" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg" class="pr-2 pb-1">
            <path d="M2.49939 7.9042L7.70512 12.8745C7.82499 12.989 7.89833 13.1508 7.909 13.3244C7.91967 13.498 7.86681 13.6691 7.76203 13.8001C7.65726 13.9311 7.50916 14.0113 7.35031 14.0229C7.19146 14.0346 7.03489 13.9768 6.91502 13.8623L0.519746 7.75112C0.446537 7.68277 0.389462 7.59617 0.353349 7.49862C0.317236 7.40108 0.303145 7.29547 0.312269 7.19072C0.321392 7.08596 0.353462 6.98515 0.405766 6.89681C0.45807 6.80846 0.529071 6.73518 0.612765 6.68315L6.91502 0.629354C6.9743 0.57258 7.04323 0.529122 7.11788 0.501461C7.19253 0.473801 7.27143 0.462479 7.35008 0.468142C7.42874 0.473805 7.5056 0.496344 7.57628 0.53447C7.64696 0.572596 7.71008 0.625563 7.76203 0.690347C7.81398 0.755131 7.85375 0.830462 7.87906 0.912041C7.90437 0.99362 7.91473 1.07985 7.90955 1.1658C7.90436 1.25176 7.88374 1.33576 7.84885 1.413C7.81397 1.49024 7.7655 1.55922 7.70622 1.616L2.51471 6.59226L16.6972 6.59226C16.8569 6.59226 17.01 6.66156 17.1228 6.78492C17.2357 6.90827 17.2991 7.07557 17.2991 7.25002C17.2991 7.42447 17.2357 7.59178 17.1228 7.71513C17.01 7.83849 16.8569 7.90779 16.6972 7.90779L2.49939 7.9042Z" fill="#201A3C"></path>
         </svg>
         العودة الى التسوق 
     </a>
   </div>

   <div class="mobile:block rounded-lg bg-[#201A3C] max-w-7xl mx-auto container sm:px-6 lg:px-8">
      <div class="p-4">
         <div class="flex items-center sm:justify-start justify-center flex-row-reverse space-x-3">
            <div class="sm:flex sm:flex-row-reverse items-center justify-start mx-0 ml-4 lg:mx-3 lg:ml-4">
               <div class="text-[#201A3C] flex justify-center items-center rounded-full transition duration-500 ease-in-out w-[30px] h-[30px] py-3 pt-[17px] sm:mx-2.5 m-auto bg-gold relative"> 1 </div>
               <div class="text-gold sm:text-[15px] text-[12px] text-center sm:text-right md:pl-2 sm:min-w-max mt-3 sm:mt-0">حقيبة التسوق</div>
               <svg width="23" height="18" class="hidden md:block mb-1" viewBox="0 0 23 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M3.00065 10.1785L10.0283 16.3183C10.1901 16.4597 10.2891 16.6596 10.3035 16.8741C10.3179 17.0885 10.2466 17.2999 10.1051 17.4617C9.96367 17.6235 9.76374 17.7225 9.5493 17.7369C9.33486 17.7514 9.12349 17.68 8.96167 17.5385L0.328167 9.9894C0.229336 9.90497 0.152286 9.79798 0.103534 9.67749C0.0547816 9.55699 0.0357597 9.42653 0.0480765 9.29713C0.0603933 9.16773 0.103687 9.0432 0.174296 8.93407C0.244906 8.82494 0.340755 8.73441 0.45374 8.67014L8.96167 1.19191C9.04169 1.12178 9.13475 1.0681 9.23553 1.03393C9.3363 0.999758 9.44282 0.985772 9.549 0.992768C9.65518 0.999764 9.75894 1.02761 9.85436 1.0747C9.94978 1.1218 10.035 1.18723 10.1051 1.26726C10.1753 1.34728 10.2289 1.44034 10.2631 1.54111C10.2973 1.64189 10.3113 1.74841 10.3043 1.85459C10.2973 1.96077 10.2694 2.06453 10.2223 2.15995C10.1752 2.25537 10.1098 2.34057 10.0298 2.41071L3.02133 8.55787L22.1675 8.55787C22.383 8.55787 22.5897 8.64347 22.742 8.79585C22.8944 8.94823 22.98 9.1549 22.98 9.3704C22.98 9.58589 22.8944 9.79256 22.742 9.94494C22.5897 10.0973 22.383 10.1829 22.1675 10.1829L3.00065 10.1785Z" fill="#CC9933"></path>
               </svg>
            </div>
            <div class="sm:flex sm:flex-row-reverse items-center mx-3 ml-4">
               <div class="bg-gold text-[#201A3C] flex justify-center items-center rounded-full transition duration-500 ease-in-out w-[30px] h-[30px] py-3 pt-[17px] sm:mx-2.5 m-auto relative"> 2 </div>
               <div class="text-gold sm:text-[15px] text-center sm:text-right md:pl-2 text-[12px] min-w-max mt-3 sm:mt-0"> تأكيد الطلب </div>
               <svg width="23" height="18" viewBox="0 0 23 18" class="hidden md:block mb-1" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M3.00065 10.1785L10.0283 16.3183C10.1901 16.4597 10.2891 16.6596 10.3035 16.8741C10.3179 17.0885 10.2466 17.2999 10.1051 17.4617C9.96367 17.6235 9.76374 17.7225 9.5493 17.7369C9.33486 17.7514 9.12349 17.68 8.96167 17.5385L0.328167 9.9894C0.229336 9.90497 0.152286 9.79798 0.103534 9.67749C0.0547816 9.55699 0.0357597 9.42653 0.0480765 9.29713C0.0603933 9.16773 0.103687 9.0432 0.174296 8.93407C0.244906 8.82494 0.340755 8.73441 0.45374 8.67014L8.96167 1.19191C9.04169 1.12178 9.13475 1.0681 9.23553 1.03393C9.3363 0.999758 9.44282 0.985772 9.549 0.992768C9.65518 0.999764 9.75894 1.02761 9.85436 1.0747C9.94978 1.1218 10.035 1.18723 10.1051 1.26726C10.1753 1.34728 10.2289 1.44034 10.2631 1.54111C10.2973 1.64189 10.3113 1.74841 10.3043 1.85459C10.2973 1.96077 10.2694 2.06453 10.2223 2.15995C10.1752 2.25537 10.1098 2.34057 10.0298 2.41071L3.02133 8.55787L22.1675 8.55787C22.383 8.55787 22.5897 8.64347 22.742 8.79585C22.8944 8.94823 22.98 9.1549 22.98 9.3704C22.98 9.58589 22.8944 9.79256 22.742 9.94494C22.5897 10.0973 22.383 10.1829 22.1675 10.1829L3.00065 10.1785Z" fill="#CC9933"></path>
               </svg>
            </div>
            <div class="sm:flex sm:flex-row-reverse items-center mx-3 ml-4">
               <div class="bg-gold text-[#201A3C] flex justify-center items-center rounded-full transition duration-500 ease-in-out w-[30px] h-[30px] py-3 pt-[17px] sm:mx-2.5 m-auto relative"> 3 </div>
               <div class="text-gold sm:text-[15px] text-center sm:text-right md:pl-2 text-[12px] sm:min-w-max mt-3 sm:mt-0">دفع</div>
               <svg width="23" height="18" class="hidden md:block mb-1" viewBox="0 0 23 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M3.00065 10.1785L10.0283 16.3183C10.1901 16.4597 10.2891 16.6596 10.3035 16.8741C10.3179 17.0885 10.2466 17.2999 10.1051 17.4617C9.96367 17.6235 9.76374 17.7225 9.5493 17.7369C9.33486 17.7514 9.12349 17.68 8.96167 17.5385L0.328167 9.9894C0.229336 9.90497 0.152286 9.79798 0.103534 9.67749C0.0547816 9.55699 0.0357597 9.42653 0.0480765 9.29713C0.0603933 9.16773 0.103687 9.0432 0.174296 8.93407C0.244906 8.82494 0.340755 8.73441 0.45374 8.67014L8.96167 1.19191C9.04169 1.12178 9.13475 1.0681 9.23553 1.03393C9.3363 0.999758 9.44282 0.985772 9.549 0.992768C9.65518 0.999764 9.75894 1.02761 9.85436 1.0747C9.94978 1.1218 10.035 1.18723 10.1051 1.26726C10.1753 1.34728 10.2289 1.44034 10.2631 1.54111C10.2973 1.64189 10.3113 1.74841 10.3043 1.85459C10.2973 1.96077 10.2694 2.06453 10.2223 2.15995C10.1752 2.25537 10.1098 2.34057 10.0298 2.41071L3.02133 8.55787L22.1675 8.55787C22.383 8.55787 22.5897 8.64347 22.742 8.79585C22.8944 8.94823 22.98 9.1549 22.98 9.3704C22.98 9.58589 22.8944 9.79256 22.742 9.94494C22.5897 10.0973 22.383 10.1829 22.1675 10.1829L3.00065 10.1785Z" fill="#CC9933"></path>
               </svg>
            </div>
            <div class="sm:flex sm:flex-row-reverse items-center mx-3 ml-0 sm:ml-4">
               <div class="text-[#201A3C] flex justify-center items-center rounded-full transition duration-500 ease-in-out w-[30px] h-[30px] py-3 pt-[17px] px-3.5 sm:mx-2.5 m-auto bg-[#fff] relative"> 4 </div>
               <div class="text-[#fff] sm:text-[14px] text-[12px] md:pl-2 text-center sm:text-right min-w-max mt-3 sm:mt-0">تم الطلب</div>
            </div>
         </div>
      </div>
   </div>
   <main class="lg:min-h-full lg:overflow-hidden lg:flex lg:flex-col mt-11 justify-center items-center">
      <div class="px-4 py-6 sm:px-6 lg:hidden">
         <div class="max-w-lg mx-auto flex"></div>
      </div>
      <!-- payDone -->
      <div class="mt-20 flex flex-col items-center justify-center mb-16 w-full">
         <svg width="78" height="78" viewBox="0 0 78 78" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M26.681 34.4277C28.1995 34.4305 29.6565 35.0278 30.74 36.0917C32.081 37.3917 33.388 38.7227 34.713 40.0377C35.525 40.8437 35.726 40.8457 36.534 40.0377C43.134 33.4377 49.734 26.8377 56.334 20.2377C58.622 17.9487 61.343 17.4297 63.834 18.8137C64.6447 19.2562 65.3403 19.8826 65.865 20.6426C66.3897 21.4027 66.7288 22.2751 66.8553 23.19C66.9817 24.1049 66.8918 25.0366 66.5929 25.9105C66.2939 26.7843 65.7943 27.5759 65.134 28.2217C60.98 32.4357 56.778 36.6007 52.595 40.7847C48.4316 44.9487 44.2673 49.1117 40.102 53.2737C39.5479 53.9126 38.8635 54.4257 38.0948 54.7784C37.3261 55.1311 36.4909 55.3154 35.6452 55.3188C34.7994 55.3222 33.9627 55.1447 33.1912 54.7982C32.4197 54.4517 31.7312 53.9441 31.172 53.3097C28.295 50.4597 25.417 47.6097 22.582 44.7187C21.7993 43.9895 21.2289 43.0618 20.9312 42.0344C20.6335 41.0069 20.6197 39.918 20.8913 38.8834C21.1629 37.8487 21.7097 36.9069 22.4736 36.1581C23.2376 35.4093 24.1901 34.8815 25.23 34.6307C25.7093 34.535 26.1938 34.4673 26.681 34.4277Z" fill="#CC9933"></path>
            <path d="M10.8179 41.4138C10.811 36.7594 11.9534 32.1753 14.1434 28.0683C16.3335 23.9613 19.5035 20.4585 23.3723 17.8708C27.241 15.2831 31.6887 13.6905 36.3207 13.2343C40.9527 12.7781 45.6257 13.4725 49.9249 15.2558C50.0579 15.3108 50.1859 15.3758 50.3159 15.4358C50.4419 15.4719 50.5583 15.5356 50.6567 15.6221C50.7551 15.7087 50.8331 15.816 50.885 15.9363C50.937 16.0566 50.9616 16.187 50.9571 16.318C50.9525 16.449 50.919 16.5773 50.8589 16.6938C50.6129 17.2708 50.1459 17.3538 49.5689 17.1628C47.9909 16.6408 46.4319 16.0218 44.8159 15.6628C39.6887 14.5286 34.3396 14.9518 29.4545 16.8779C24.5694 18.804 20.3709 22.1453 17.3973 26.4734C14.4238 30.8014 12.8107 35.919 12.7649 41.1699C12.7192 46.4209 14.2428 51.5658 17.1405 55.9451C20.0381 60.3243 24.1778 63.7383 29.0286 65.7492C33.8794 67.7602 39.2203 68.2764 44.3665 67.2318C49.5127 66.1872 54.2296 63.6294 57.9124 59.8862C61.5952 56.1431 64.0761 51.3852 65.0369 46.2228C65.515 43.7077 65.6138 41.1351 65.3299 38.5908C65.3129 38.4478 65.3059 38.3048 65.2919 38.1618C65.2319 37.5438 65.4119 37.0238 66.0859 36.9508C66.7859 36.8738 67.1489 37.3338 67.1739 37.9988C67.3148 39.7721 67.3568 41.5518 67.2999 43.3298C66.8511 49.9278 64.1041 56.1599 59.5365 60.9424C54.9688 65.7249 48.8695 68.7553 42.299 69.5067C35.7285 70.2581 29.1026 68.6829 23.5732 65.055C18.0437 61.4272 13.9607 55.9762 12.0339 49.6498C11.2287 46.9785 10.819 44.2038 10.8179 41.4138Z" fill="#CC9933"></path>
            <path opacity="0.2" d="M39 78C60.5391 78 78 60.5391 78 39C78 17.4609 60.5391 0 39 0C17.4609 0 0 17.4609 0 39C0 60.5391 17.4609 78 39 78Z" fill="#E3E3E3"></path>
         </svg>
         <p class="text-[#201A3C] text-[32px] max-w-[300px] text-center"> لقد تم تجهيز طلبك بنجاح </p>

         <div class="mt-5">
         <!-- <a href="{{route('home')}}" class="items-center flex rounded-[10px] mt-8 px-5 py-3 pt-4 border border-[#CC9933] hover:bg-[#CC9933] hover:text-white text-[18px] font-shamelBold text-white bg-[#CC9933] market_button"> اكمل التسوق </a> -->
         <a href="{{route('account-oder')}}" class="duration-200 items-center flex rounded-[10px] mt-8 px-8 py-3 pt-4 border border-[#CC9933] hover:bg-[#CC9933] hover:text-white text-[18px] font-shamelBold text-[#CC9933] market_button"> ملخص الطلب </a>
         
         </div>
      </div>
     
   </main>
</div>


{{-- invoise --}}





{{--<div class="main-div-invoise">
   <div>
      <h3 class="name-invoice">ZAD</h3>
      <p class="address">address</p>
      <div class="information-invoise">
         <div class="information-invoise-col">
            <p> <strong>Invoice Number</strong> #10008 </p>
            <p > <strong>customer:</strong> owais</p>
            <p > <strong>phone</strong> 123456789 </p>
         </div>
         <p> <strong>Date</strong> 04/17/2022 17:08 </p>
      </div>
   </div>
   <div class="table-div">
      <table>
         <thead>
            <tr>
               <th> Product</th>
               <th> Quantity</th>
               <th> Unit Price</th>
               <th> Subtotal</th>
            </tr>
         </thead>
         <tbody>
         <tr>
               <td>test</td>
               <td>1</td>
               <td>12</td>
               <td>22</td>
            </tr>
            <tr>
               <td>test</td>
               <td>1</td>
               <td>12</td>
               <td>22</td>
            </tr>

            <tr>
               <td>test</td>
               <td>1</td>
               <td>12</td>
               <td>22</td>
            </tr>

         </tbody>
      </table>
   </div>

   <hr class="hr">

   <div class="summary-invoise">
   <div>
      <p><strong>type payment </strong></p>
      <p>Cashe</p>
   </div>
   <div >
      <p><strong>Total Paid</strong></p>
      <p>$ 12.50</p>
   </div>
   <div >
      <p><strong>Subtotal</strong></p>
      <p>$ 12.50</p>
   </div>
   <div >
      <p><strong>Tax </strong></p>
      <p>$ 12.50</p>
   </div>
 </div>

   <div class="totals-invoise">
   <p> <strong>Total<strong> </p>
   <p>$ 12.50</p>
   </div>

   <br> <br><br><br><br> <br>

  <div class="footer-invoise">
     <p>zad@zad.com</p>
     
     <p>url</p>
     <p>1234567</p>
  </div>

</div>--}}





@endsection

@push('script')

@endpush
