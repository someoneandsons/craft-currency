<?php
namespace Craft;

class CurrencyVariable
{
    public function conversion($from = 'EUR', $to = 'USD', $amount = 1) {
        return craft()->currency->getConversion($from, $to, $amount);
    }
}
