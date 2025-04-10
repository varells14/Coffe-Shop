<?php

namespace App\Services;

use Midtrans\Config;
use Midtrans\Snap;

class MidtransService
{
    public function __construct()
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = false; // Sandbox mode
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function createTransaction($params)
    {
        return Snap::getSnapToken($params);
    }
}
