<?php

namespace App\Http\Helpers;

class Cardcom
{
    public $TerminalNumber = ''; # Company terminal 
    public $UserName = '';   # API User
    public $CreateInvoice = false;  # to Create Invoice (Need permissions to create invoice )
    public $IsIframe = true;   # Iframe or Redirect 
    public $Operation = 1;  # = 1 - Bill Only , 2- Bill And Create Token , 3 - Token Only , 4 - Suspended Deal (Order).
    public $MaxNumOfPayments = 5;

    public $SuccessRedirectUrl;
    public $ErrorRedirectUrl;
    public $IndicatorUrl;

    public $price;
    public $title;

    public $vars = [];

    public function __construct($price, $title = '', $routes = null)
    {
        $this->TerminalNumber = config('payments.cardcom.terminal_number');
        $this->UserName = config('payments.cardcom.user_name');
        $this->CreateInvoice = config('payments.cardcom.create_invoice');
        $this->price = $price;
        $this->title = $title;

        if ($routes) $this->redirect($routes);
    }

    public function redirect($routes)
    {
        
        $this->SuccessRedirectUrl = $routes['success'] ?? url('/');
        $this->ErrorRedirectUrl = $routes['error'] ?? url('/');
        $this->IndicatorUrl = $routes['indicator'] ?? url('/');

        return $this;
    }

    public function getIframe($routes = [])
    {
        
        $vars = array_merge($this->vars, [
            'TerminalNumber' => $this->TerminalNumber,
            'UserName' => $this->UserName,

            'APILevel' => "10",
            'codepage' => '65001', // unicode
            'Operation' => $this->Operation,
            'Language' => config('app.locale'),
            'CoinID' => '1', //1- NIS, 2- USD, other, article: http://kb.cardcom.co.il/article/AA-00247/0
            'SumToBill' => $this->price,
            'ProductName' => $this->title,

            
            'SuccessRedirectUrl' => $this->SuccessRedirectUrl,
            'ErrorRedirectUrl' => $this->ErrorRedirectUrl,
            'IndicatorUrl' => $this->IndicatorUrl, //Notify URL . after use -  http://kb.cardcom.co.il/article/AA-00240/0

            // 'CancelType' => "2", # show Cancel button on start , 
            // 'CancelUrl' => "http://www.yoursite.com/OrderCanceld",
        
            'ReturnValue' => "1234", // Optional , ,recommended , value that will be return and save in CardCom system
            'MaxNumOfPayments' => $this->MaxNumOfPayments, // max num of payments to show  to the user

            'ShowInvoiceHead' => $this->CreateInvoice ? "true" : "false", //  if show & edit Invoice Details on the page.
            'InvoiceHeadOperation' => $this->CreateInvoice ? "1" : "0", //  0 = no create & show Invoice.  1 =(default)create Invoice.  2 = show Details Invoice but not create Invoice !   

            // 'CSSUrl' => url('/css/iframe.css'),
        ]);

        $responce = $this->postVars($vars,'https://secure.cardcom.solutions/Interface/LowProfile.aspx');
      
        return $responce;
    }

    public function CreateInvoice()
    {
        if ($this->CreateInvoice) {
            // article for invoice vars:  http://kb.cardcom.co.il/article/AA-00244/0
            $vars['IsCreateInvoice'] = "true";
            // customer info :
            $vars["InvoiceHead.CustName"] = $this->data['client']['fullname']; // customer name
            $vars["InvoiceHead.SendByEmail"] = "true"; // will the invoice be send by email to the customer
            $vars["InvoiceHead.Language"] = "he"; // he or en only
            $vars["InvoiceHead.Email"] = $this->data['client']['email'];
            $vars["InvoiceHead.Phone"] = $this->data['client']['phone']; // manual added

            // products info 

            if(
                isset($this->data['products']) &&
                is_array($this->data['products']) &&
                count($this->data['products'])
            ) {
                foreach($this->data['products'] as $index => $product) {
                    $count = $index+1;
                    $vars["InvoiceLines{$index}.Description"] = $peoduct['title'];
                    $vars["InvoiceLines{$index}.Price"] = $product['price'];
                    $vars["InvoiceLines{$index}.Quantity"] = $product['quantity'];
                }
            } 

            // ********   Sum of all Lines Price*Quantity  must be equals to SumToBill ***** //
        }
    }


    function postVars($vars,$PostVarsURL)
    {
        $urlencoded = http_build_query($vars);

        $CR = curl_init();
        curl_setopt($CR, CURLOPT_URL, $PostVarsURL);
        curl_setopt($CR, CURLOPT_POST, 1);
        curl_setopt($CR, CURLOPT_FAILONERROR, true);
        curl_setopt($CR, CURLOPT_POSTFIELDS, $urlencoded );
        curl_setopt($CR, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($CR, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($CR, CURLOPT_FAILONERROR,true);
        $r = curl_exec( $CR );
        $error = curl_error ( $CR );
        # some error , send email to developer
        if(!empty( $error)) {
           
            echo $error;
            die();
        }
        curl_close( $CR );

        parse_str($r,$responseArray);
        return $responseArray;
    }
}
