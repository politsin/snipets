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
            "kilylabs/client-bank-exchange-php": {
                "КодНазПлатежа": "https://raw.githubusercontent.com/politsin/snipets/master/patch/kl21c.patch"
            },
            "drupal/devel": {
                "ClassMethods — Issue #221": "https://raw.githubusercontent.com/politsin/snipets/master/patch/kint.patch"
            }
        }
   }
}
```
