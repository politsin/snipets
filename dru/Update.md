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

## Catalog

1. включаем модуль конфиг-ентити
1. переходим в импорт единичной вьюхи
1. берём views.view.product.yml файл из экспортированного конфига или из модуля
1. пытаемся его импортировать, 
  - если ругается на зависимость от `product_taxonomy_filter` - правим конфиг и импортируем
  
## Пропал модуль
1. делаем файл с названием модуля
1. включаем его
1. выключаем
