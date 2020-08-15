<?php

namespace wenhaokho\Omise\process;

use wenhaokho\Omise\process\Omise;
use Illuminate\Support\Facades\Http;

class OmiseCustomer extends Omise
{
    public static function create(array $data)
    {
        static::init();

        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . base64_encode(self::$secret_key)
        ])->post(static::$url . '/customers', $data);

        return $response->json();
    }

    public static function addCard(string $customerId, array $data)
    {
        static::init();

        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . base64_encode(self::$secret_key)
        ])->patch(static::$url . '/customers/' . $customerId, $data);

        return $response->json();
    }
}
