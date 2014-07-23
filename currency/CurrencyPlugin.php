<?php
namespace Craft;

class CurrencyPlugin extends BasePlugin
{
    public function getName()
    {
         return Craft::t('Currency');
    }

    public function getVersion()
    {
        return '1.0';
    }

    public function getDeveloper()
    {
        return 'Mike Pierce';
    }

    public function getDeveloperUrl()
    {
        return 'http://someoneandsons.net';
    }
}
