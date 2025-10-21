<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function installment()
    {
        return view('layouts.supports.installment');
    }

    public function warranty()
    {
        return view('layouts.supports.warranty');
    }

    public function returnPolicy()
    {
        return view('layouts.supports.return-policy');
    }

    public function shippingPayment()
    {
        return view('layouts.supports.shipping-payment');
    }

}
