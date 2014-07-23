<?php
namespace Craft;

class CurrencyService extends BaseApplicationComponent
{
    public function getConversion($from = 'EUR', $to = 'USD', $amount = 1) {
		$path = craft()->path->getStoragePath().'currency/';
		$cache = $path.$from.'-'.$to;
		
		if(!is_dir($path)) {
			mkdir($path);
		}
		
		if(file_exists($cache) && filemtime($cache) > time() - (60 * 60 * 24)) {
			return $amount * file_get_contents($cache);
		}
		
		$url = '/d/quotes.csv?s='.$from.$to.'=X&f=l1';
        $client = new \Guzzle\Http\Client('http://download.finance.yahoo.com');
        $response = $client->get($url)->send();

        if ($response->isSuccessful()) {
        	$exchange = trim($response->getBody());
        	
        	file_put_contents($cache, $exchange);
        	
        	return $amount * $exchange;
        } else {
        	return false;
        }
    }
}
