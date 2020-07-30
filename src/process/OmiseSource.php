<?php

namespace wenhaokho\Omise\process;

use wenhaokho\Omise\process\Omise;
use Illuminate\Support\Facades\Http;

class OmiseSource extends Omise
{ 
    public static function create(array $data)
    {
        static::init();

        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . base64_encode(self::$public_key)
        ])->post(static::$url . '/sources', $data);

        return $response->json();
    }
}
