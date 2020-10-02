<?php

namespace App\Http\Controllers\Payments;

use App\Http\Controllers\Controller;

class PaymentController extends Controller
{

    public function index()
    {
        return view('payments.index');
    }
}
