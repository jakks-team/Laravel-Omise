<?php

namespace wenhaokho\Omise\process;

use wenhaokho\Omise\process\Omise;
use Illuminate\Support\Facades\Http;

class OmiseEvent extends Omise
{
    public static function get(string $eventId)
    {
        static::init();

        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . base64_encode(self::$secret_key)
        ])->get(static::$url . '/events/'.$eventId);

        return $response->json();
    }
}
