# Drupal Update TrubleShooting

* Update: `cd /var/www/html && composer update --with-dependencies && drush updatedb --yes`

## Views:
 * Косяк в файле `core/modules/dblog/config/optional/views.view.watchdog.yml`
   - `area: {id: area_text_custom}` заменить на `area_text_custom: {id: area_text_custom}`

## Devel / Kint
 * One Line Command: `drush pmu devel kint && composer require 'drupal/devel:^4.0' kint-php/kint && drush en devel`
 * Custom:
   - `drush pmu devel kint`
   - `equire 'drupal/devel:^4.0' kint-php/kint`
   - drush en devel

```sh
cd /var/www/html
wget https://raw.githubusercontent.com/politsin/snipets/master/patch/drupal-kint.patch -q -O kint.patch
patch -p1 < kint.patch
```
