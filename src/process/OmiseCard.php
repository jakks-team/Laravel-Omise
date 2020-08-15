<?php

namespace wenhaokho\Omise\process;

use wenhaokho\Omise\process\Omise;
use Illuminate\Support\Facades\Http;

class OmiseCard extends Omise
{
    public static function create(string $customerId, array $data)
    {
        static::init();

        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . base64_encode(self::$secret_key)
        ])->post(static::$url . '/customers/'.$customerId.'/card', $data);

        return $response->json();
    }
}
