
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{\App\CPU\translate('invoice')}}</title>
    <meta http-equiv="Content-Type" content="text/html;" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style type="text/stylesheet">


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

        .hr-invoise{
           border-width: 1px;
           border-color: black;
           margin-bottom: 2.5rem;
        }

        div.summary-invoise{
           display: grid;
           grid-template-columns: repeat(2, minmax(0, 1fr));
           margin-bottom: 2.5rem;
           row-gap: 0.75rem;
           column-gap: 3rem;
           
        }

        div.summary-invoise div{
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

        .test{
            color:red;
        }
</style>

  
</head>


<body>
    @php
    use App\Model\BusinessSetting;
    $company_phone =BusinessSetting::where('type', 'company_phone')->first()->value;
    $company_email =BusinessSetting::where('type', 'company_email')->first()->value;
    $company_name =BusinessSetting::where('type', 'company_name')->first()->value;
    $company_web_logo =BusinessSetting::where('type', 'company_web_logo')->first()->value;
    $company_mobile_logo =BusinessSetting::where('type', 'company_mobile_logo')->first()->value;
    @endphp



<div class="main-div-invoise">
        <div>
            <h3 class="name-invoice">ZAD</h3>
            <h5 class="name-invoice">return invoice</h5>
            <p class="address">{{$order->shippingAddress ? $order->shippingAddress['address'] : ""}} <br> {{$order->shippingAddress ? $order->shippingAddress['city'] : ""}} {{$order->shippingAddress ? $order->shippingAddress['zip'] : ""}} <br> {{$order->shippingAddress ? $order->shippingAddress['country'] : ""}} </p>
            <div class="information-invoise">
                <div class="information-invoise-col">
                    <p> <strong>Invoice Number</strong> # {{ $order->id }} </p>
                    <p>  <strong>customer:</strong> {{$order->customer['f_name'].' '.$order->customer['l_name']}}</p>
                    <p> <strong>phone</strong> {{$order->customer['phone']}} </p>
                    <p>  <strong>email</strong> {{$order->customer['email']}} </p>
                </div>
                <p> <strong>Date: </strong> {{date('d-m-Y h:i:s a',strtotime($order['created_at']))}} </p>
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
                @php
                $subtotal=0;
                $total=0;
                $sub_total=0;
                $total_tax=0;
                $total_shipping_cost=0;
                $total_discount_on_product=0;
                $extra_discount=0;
                @endphp
                @foreach($order->details as $key=>$details)
                    @php $subtotal=($details['price'])*$details->qty @endphp
                    <tr>
                        <td>{{$details['product']?$details['product']->name:''}} - {{$details['variant']}}</td>
                        <td>{{$details->qty}}</td>
                        <td>{{\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency((($details->price)+$details->tax)))}}</td>
                        <td>{{\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency(((($details->price)*$details->qty)+$details->tax)))}}</td>
                    </tr>
                    @php
                    $sub_total+=$details['price']*$details['qty'];
                    $total_tax+=$details['tax'];
                    $total_shipping_cost+=$details->shipping ? $details->shipping->cost :0;
                    $total_discount_on_product+=$details['discount'];
                    $total+=$subtotal;
                    @endphp
                    @endforeach

                </tbody>
            </table>
        </div>
        <hr>

        <p class="test" style="width: 100%; text-align:right;">المنتجات المرجعة</p>
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
                @php
                $r_subtotal=0;
                $total=0;
                $sub_total=0;
                $total_tax=0;
                $total_shipping_cost=0;
                $total_discount_on_product=0;
                $extra_discount=0;
                
                @endphp

            
                @foreach($return_product as $key=>$p)
            
              
                    <tr>
                        <td>{{$p->name}}</td>
                        <td>{{$p->qty}}</td>
                        <td>{{\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency( $p->price_wihe_tax))}}</td>
                        <td>{{\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency( $p->price_wihe_tax*$p->qty))}}</td>
                    </tr>
                    @php
                    $r_subtotal+= $p->price_wihe_tax*$p->qty;
                    $total+=$r_subtotal;
                    @endphp
                    @endforeach

                </tbody>
            </table>
        </div>

        <hr class="hr-invoise">
        @php($shipping=$order['shipping_cost'])
        <div class="summary-invoise">
            <div >
                <p><strong>payment method </strong></p>
                <p>{{ str_replace('_',' ',$order->payment_method) }}</p>
            </div>
            <div >
                <p><strong>{{\App\CPU\translate('sub_total')}}</strong></p>
                <p>{{\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($sub_total))}}</p>
            </div>
            <div >
                <p><strong>{{\App\CPU\translate('tax')}}</strong></p>
                <p>{{\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($total_tax))}}</p>
            </div>

            @if($order->order_type == 'default_type')
                          

                  <div>
                <p><strong>{{\App\CPU\translate('shipping')}} </strong></p>
                <p>{{\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($shipping))}}</p>
            </div>
             @endif

             @if($total_discount_on_product > 0)
            <div>
                <p><strong>{{\App\CPU\translate('discount_on_product')}} </strong></p>
                <p> - {{\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($total_discount_on_product))}}</p>
            </div>
            @endif
        </div>

        <div class="totals-invoise">
            <p> <strong>{{\App\CPU\translate('total')}}<strong> </p>
            <p> {{\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($order->order_amount))}}</p>
            <p> - {{\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($r_subtotal))}} </p>
            <p> {{\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($order->order_amount-$r_subtotal))}}</p>
        </div>

        <br>
        <br>
        <br>
        <br>
        <br> <br>

        <div class="footer-invoise">
     <p>{{$company_email}}</p>
     <p>{{url('/')}}</p>
     <p>{{$company_phone}}</p>
  </div>
</div>

</body>

</html>