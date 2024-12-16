<?php

namespace App\Classes\Paykassa;

use Exception;
use Illuminate\Support\Facades\Cache;
use InvalidArgumentException;
use Paykassa\PaykassaAPI;
use Paykassa\PaykassaCurrency;
use RuntimeException;

class Paykassa
{
    /**
     * @throws Exception
     */
    private static function getClientCredentials(string $type): array
    {
        $client_id = env("PAYKASSA_{$type}_CLIENT_ID");
        $client_secret = env("PAYKASSA_{$type}_CLIENT_SECRET");

        if (!$client_id || !$client_secret) {
            throw new Exception("Missing Paykassa {$type} client credentials");
        }

        return [$client_id, $client_secret];
    }

    /**
     * @throws Exception
     */
    public static function api(): PaykassaAPI
    {
        [$client_id, $client_secret] = self::getClientCredentials('API');

        return new PaykassaAPI($client_id, $client_secret, true);
    }

    /**
     * @throws Exception
     */
    public static function sci(): PaykassaSCI
    {
        [$client_id, $client_secret] = self::getClientCredentials('SCI');

        return new PaykassaSCI($client_id, $client_secret, true);
    }

    public static function getCurrentRateForCurrencies(string $baseCurrency, string $targetCurrency): float
    {
        if (!self::isAvailableCurrency($baseCurrency) || !self::isAvailableCurrency($targetCurrency)) {
            throw new InvalidArgumentException("Invalid currencies.");
        }

        $pair = "{$baseCurrency}_{$targetCurrency}";

        if (Cache::has($pair)) {
            return Cache::get($pair);
        }

        try {
            $response = PaykassaCurrency::getCurrencyPairs([$pair]);
            if (isset($response['data'][0][$pair])) {
                $rate = $response['data'][0][$pair];

                Cache::put($pair, $rate, now()->addMinutes(10));

                return $rate;
            }
            else {
                throw new RuntimeException("Failed to retrieve exchange rate for {$pair}");
            }
        }
        catch (Exception $e) {
            throw new RuntimeException($e->getMessage());
        }
    }

    protected static function isAvailableCurrency(string $currency): bool
    {
        $availableCurrencies = PaykassaCurrency::getAvailableCurrencies();

        return in_array($currency, $availableCurrencies['data']);
    }
}
