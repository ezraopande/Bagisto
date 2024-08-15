<?php

namespace Webkul\Mpesa\Payment;

use Webkul\Payment\Payment\Payment;
use Safaricom\Mpesa\Mpesa;

class MpesaPayment extends Payment
{
    protected $code = 'mpesa';

    public function getRedirectUrl()
    {
        return route('mpesa.redirect');
    }

    public function authorize($order)
    {
        $mpesaNumber = request('mpesa_number');

        // Handle MPESA payment authorization
        $response = $this->initiateStkPush($order, $mpesaNumber);

        // Handle the response accordingly
        return $response;
    }

    protected function initiateStkPush($order, $mpesaNumber)
    {
        $mpesa = new Mpesa(config('mpesa'));

        $response = $mpesa->STKPushSimulation(
            config('mpesa.shortcode'),
            config('mpesa.passkey'),
            'CustomerPayBillOnline',
            $order->grand_total,
            $mpesaNumber,
            config('mpesa.shortcode'),
            $mpesaNumber,
            config('mpesa.callback_url'),
            'Order #' . $order->id,
            'Payment for order #' . $order->id
        );

        return json_decode($response, true);
    }
}
