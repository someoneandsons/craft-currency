# Craft Currency

Convert currencies in Craft CMS 2.

## Set-up

The plugin uses the [fixer.io](https://fixer.io) API for currency conversions. The service requires an access key to be provided, which can be acquired for free from the website.

Paid plans also have the option to specify requests are made over HTTPS, and the plugin settings add the ability to enable this option also.

## Usage

* `from_currency`: 3 letter currency symbol (defaults to `'EUR'`)
* `to_currency`: 3 letter currency symbol (defaults to `'USD'`)
* `amount`: amount in `from_currency` to convert from (defaults to `1`)

***

	{{ craft.currency.conversion(from_currency, to_currency, amount) }}

## Example

	{# Converts 79 Australian dollars to Malaysian Ringits. #}
	{{ craft.currency.conversion('AUD', 'MYR', 79) }}

###### Result

	236.4312

## Craft currency filter

The currency plugin works well with the currency filter built into Craft.

	{# Converts 426 Icelandic krona to Danish kroner, and formats it using currency filter. #}
	{{ craft.currency.conversion('ISK', 'DKK', 426)|currency('DKK') }}

###### Result

	DKK20.49
