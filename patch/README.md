The setup
In your favorite command line tool, you will want to add the composer-patches project:

composer require cweagans/composer-patches

```json
{
    "extra": {
        "patches": {
            "bluerhinos/phpmqtt": {
                "TLS": "https://raw.githubusercontent.com/politsin/snipets/master/patch/phpMQTT.patch"
            },
           "symfony/symfony": {
                "Webhook": "https://raw.githubusercontent.com/politsin/snipets/master/patch/symfony-webhook.patch"
            },
            "kilylabs/client-bank-exchange-php": {
                "КодНазПлатежа": "https://raw.githubusercontent.com/politsin/snipets/master/patch/kl21c.patch"
            },
            "drupal/commerce": {
                "Condition based on order subtotal — Issue #2938729": "https://www.drupal.org/files/issues/2020-06-05/2938729.patch",
                "Promotion condition for order total — Issue #2993928": "https://www.drupal.org/files/issues/2019-02-11/shipping_calculated_on_subtotal-2993928-3.patch"
            },
            "drupal/devel": {
                "ClassMethods — Issue #221": "https://raw.githubusercontent.com/politsin/snipets/master/patch/kint.patch"
            }
        }
   }
}
```
