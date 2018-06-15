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
		
		$settings = craft()->plugins->getPlugin('currency')->getSettings();
		
		$url = '/latest?base='.$from.'&symbols='.$to.'&access_key='.$settings['accessKey'];
        $client = new \Guzzle\Http\Client('http'.($settings['https'] ? 's' : '').'://data.fixer.io/api');
        $response = $client->get($url)->send();

        if ($response->isSuccessful()) {
        	$responseBody = json_decode(trim($response->getBody()));
        	
        	$exchange = (property_exists($responseBody->rates, $to))? $responseBody->rates->$to: 1;
        	
        	file_put_contents($cache, $exchange);
        	
        	return $amount * $exchange;
        } else {
        	return false;
        }
    }
}
