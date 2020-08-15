<?php

namespace wenhaokho\Omise\process;

use wenhaokho\Omise\process\Omise;
use Illuminate\Support\Facades\Http;

class OmiseCard extends Omise
{
    public static function list(string $customerId)
    {
        static::init();

        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . base64_encode(self::$secret_key)
        ])->get(static::$url . '/customers/'.$customerId.'/cards');

        return $response->json();
    }

    public static function get(string $customerId, string $cardId)
    {
        static::init();

        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . base64_encode(self::$secret_key)
        ])->get(static::$url . '/customers/'.$customerId.'/cards/'.$cardId);

        return $response->json();
    }
}
