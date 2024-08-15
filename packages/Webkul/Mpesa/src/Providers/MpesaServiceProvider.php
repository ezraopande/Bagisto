<?php

namespace Webkul\Mpesa\Providers;

use Illuminate\Support\ServiceProvider;
use Webkul\Payment\Facades\Payment;
use Webkul\Mpesa\Payment\MpesaPayment;

class MpesaServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('mpesa', MpesaPayment::class);

        $this->registerPaymentMethods();
    }

    protected function registerPaymentMethods()
    {
        Payment::register('mpesa', [
            'title'       => 'MPESA',
            'description' => 'Pay using MPESA',
            'class'       => MpesaPayment::class,
            'active'      => true,
            'sort'        => 1,
        ]);
    }
}
