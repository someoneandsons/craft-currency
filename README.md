# Craft Currency

Convert currencies in Craft CMS.

## Usage

* `from_currency`: 3 letter currency symbol (defaults to `'EUR'`)
* `to_currency`: 3 letter currency symbol (defaults to `'USD'`)
* `amount`: amount in from_currency to convert from (defaults to `1`)

***

	{{ craft.currency.conversion(from_currency, to_currency, amount) }}

## Example

	{# Converts 79 Australian dollars to Malaysian Ringits. #}
	{{ craft.currency.conversion('AUD', 'MYR', 79) }}

###### Result

	236.4312

## Craft currency filter

The currency plugin works well with the currency filter built into Craft.

	{# Converts 42 Icelandic krona to Danish kroner, and formats it using currency filter. #}
	{{ craft.currency.conversion('ISK', 'DKK', 42)|currency('DKK') }}

###### Result

	DKK20.49