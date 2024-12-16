<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Paykassa\PaykassaCurrency;

if (!function_exists('getCurrencyRate')) {
    /**
     * @throws Exception
     */
    function getCurrencyRate(string $key): float {
        $key = Str::snake($key);

        $currencyPairs = [];

        foreach (config('balance.currencies') as $currency) {
            $currencyPairs[] = "{$currency}_USD";
            $currencyPairs[] = "USD_{$currency}";
        }

        if (!in_array(Str::upper($key), $currencyPairs)) {
            throw new InvalidArgumentException("Invalid key [$key].");
        }

        $currenciesRates = Cache::remember('currencies_rates', 3600, function() use ($currencyPairs) {
            try {
                $response = PaykassaCurrency::getCurrencyPairs($currencyPairs);
                $rates = [];

                foreach ($response['data'] as $pair) {
                    foreach ($pair as $key => $value) {
                        $rates[strtolower($key)] = $value;
                    }
                }

                return $rates;
            } catch (Exception $e) {
                Log::error('Failed to retrieve currency pairs: ' . $e->getMessage());
                throw new Exception('Failed to retrieve currency pairs.');
            }
        });

        return (float) $currenciesRates[$key];
    }
}

