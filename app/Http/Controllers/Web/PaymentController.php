<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use \Carbon\Carbon;
use App\Http\Helpers\Cardcom;
use Validator;
use App\Http\Controllers\Controller;
use App\CPU\OrderManager;
use App\CPU\CartManager;
use Exception;
use Brian2694\Toastr\Facades\Toastr;
use function App\CPU\translate;

class PaymentController extends Controller
{

    public function getIframe(Request $request)
    {
       
        
       
        $booking = $request->validate([
            'total' => 'required',
            "accept_conditions" => 'accepted',
        ]);

        $price = $booking['total'];
        $title = "";

        // $order = $this->makeOrder($price, $booking);
        
        $iframe = (new Cardcom($price, $title, [
            'success' => route('customer.payments.cardcomSuccess', ['locale' => config('app.locale')]),
            'error' => route('customer.payments.cardcomError', ['locale' => config('app.locale')]),
            'indicator' => route('customer.payments.cardcomIndicator', ['locale' => config('app.locale')])
        ]))->getIframe();
        

        try {
            // $order->update([
            //     'low_profile_code' => $iframe['LowProfileCode']
            // ]);
        } catch (Exception $e) {
            throw new Exception("Error Processing Request", $e);
        }
        return response()->json([
            'status' => true,
            'url' => $iframe['url']
        ]);
        
    }

    public function makeOrder($price, $data)
    {
        $order = Order::create([
            'data' => [
                // why to not just make it like this:
                // 'date_from' => $data['from_date'],
                // 'date_to' => $data['to_date'],
                // 'total_price' => $price

                //dont use variabels as json keys agian!!!!!!!!!
                $data['product_id'] => [
                    'date_from' => $data['from_date'],
                    'date_to' => $data['to_date'],
                ],
                'total_price' => $price
            ],
            'client' => [
                'name' => $data['name'],
                'phone' => $data['phone'],
                'email' => $data['email'],
            ],
            'service_status' => 'new',
        ]);


        //ToDo: replace the order structure with this: and update the dashboard views
        // 'data' => [
        //     'date_from' => $data['from_date'],
        //     'date_to' => $data['to_date'],
        //     'total_price' => $price,
        // ]

        return $order;
    }

    public function success(Request $request)
    {
        // $order = Order::findOrFail($request->order_id);

        // //this will work only on localhost
        // if (env('APP_ENV') == 'local')
        //     $order->update([
        //         'paid_at' => Carbon::now(),
        //         'payment_status' => 1,
        //     ]);

        return '<script> window.parent.chkoutCompleate(); </script>';
    }

    public function error(Request $request)
    {
        // $order = Order::findOrFail($request->order_id);
        // return '<script> window.parent.swipeToError('. $order->toJson() .'); </script>';

        Toastr::warning(translate('Payment Failed'));
        return Back();
    }

    public function indicator(Request $request)
    {
        // $order = Order::findOrFail($request->order_id);

        // $order->update([
        //     'paid_at' => Carbon::now(),
        //     'payment_status' => 1,
        // ]);
    }
}
