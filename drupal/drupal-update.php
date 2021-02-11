# Drupal Update TrubleShooting

* Обновить ядро и модули: 
  - `cd /var/www/html && composer update --with-dependencies && drush updatedb --yes`
  - `drush updatedb --yes` - если предыдущая страница завершилась ошибкой дёргаем только это

## Composer 1 → Composer 2
1. Заменить  `drupal-composer/drupal-scaffold`
2. Поменять `"extra"` > `"drupal-scaffold"`
3. Почистить `scripts`

```
        "drupal-composer/drupal-scaffold": "^2.5",
        "zaporylie/composer-drupal-optimizations": "^1.0",
        "webmozart/path-util": "^2.3",
заменить на
        "drupal/core-composer-scaffold": "^8.0",
        "drupal/core-project-message": "^8.0",
        "drupal/core-recommended": "^8.0",
        "drupal/core-vendor-hardening": "^8.0",

```


Итого:
```json
{
    "name": "drupal/drupal",
    "description": "Drupal.",
    "type": "project",
    "license": "GPL-2.0+",
    "require": {
        "php": "^7.4",
        "composer/installers": "^1.9",
        "cweagans/composer-patches": "^1.6",
        "oomphinc/composer-installers-extender": "^2.0",
        "politsin/colorbox": "^1.0",
        "drupal/core-composer-scaffold": "^8.0",
        "drupal/core-project-message": "^8.0",
        "drupal/core-recommended": "^8.0",
        "drupal/core-vendor-hardening": "^8.0",
        "drush/drush": "^9.0",
        "drupal/core": "~8.0",
        ...
    },
    ...,
    "extra": {
        "drupal-scaffold": {
            "locations": {
                "web-root": "./"
            },
            "file-mapping": {
                "[web-root]/robots.txt": false,
                "[web-root]/.gitignore": false,
                "[web-root]/sites/default/default.settings.php": false,
                "[web-root]/web.config": false
            }      
        },
        ...
    },
    ...,
    "scripts": {вся зона не нужна},
    ...
}

```


## Views [Update aborted by: views_post_update_remove_core_key]:
 * Косяк в файле `core/modules/dblog/config/optional/views.view.watchdog.yml`
   - Как должно быть: https://git.drupalcode.org/project/drupal/-/blob/8.8.x/core/modules/dblog/config/optional/views.view.watchdog.yml#L658
   - `area: {id: area_text_custom}` заменить на `area_text_custom: {id: area_text_custom}`

## Drupal `8` > `9`
* The config sync directory is not defined in $settings["config_sync_directory"]
 - В файле `settings.php` заменяем `$config_directories['sync']` на `$settings["config_sync_directory"]`


## Admin toolbar  `admin_toolbar_tools_update_8001`
* Накатить новый `composer require 'drupal/admin_toolbar:^2.4'`

## Не обновляются переводы
* Ошибки
  - Failed to save file due to error "The specified file 'temporary://*
  - could not be copied because the destination directory is not properly configured. This may be caused by a problem with file or directory permissions."
* Действия
  - `/admin/config/media/file-system` - пересохранить страницу
  - `mkdir /var/www/html/sites/default/files/translations` - создать папку

## Devel / Kint
 * One Line Command: `drush pmu devel kint && composer require 'drupal/devel:^4.0' kint-php/kint && drush en devel`
 * Custom:
   - `drush pmu devel kint`
   - `equire 'drupal/devel:^4.0' kint-php/kint`
   - drush en devel
 * Если всё обновили но присутствует ошибка `The module kint does not exist.`
   - `mkdir modules/temp && echo $'name: temp\ntype: module\ncore: 8.x' > modules/temp/kint.info.yml`
   - `drush en kint && drush pmu kint`
   - `rm modules/temp/kint.info.yml && rm -r modules/temp`

### Разово накатить kint-патч
```sh
cd /var/www/html
wget https://raw.githubusercontent.com/politsin/snipets/master/patch/drupal-kint.patch -q -O kint.patch
patch -p1 < kint.patch
```
### Навсегда накатить kint-патч
```json
{
    "extra": {
        "patches": {
            "drupal/devel": {
                "ClassMethods — Issue #221": "https://raw.githubusercontent.com/politsin/snipets/master/patch/kint.patch"
            }
        }
   }
}
```

## Проблемы с композером:

* Композер просит токен
  * убедиться что часть `repositories` очищена от старых зависимостей
    - `"repositories": [{"type": "composer", "url": "https://packages.drupal.org/8"}]`
  * заменить "верхушку" у файла composer.json
  * попробовать ещё раз
* Композер не может разобраться с зависимостями
  * заменить "верхушку" у файла composer.json
  * почистить то что контролирует композер
    - `cd /var/www/html && rm -rf core && rm -rf vendor && rm composer.json`


### Верхушка модуля composer.json если с актуальными версиями:
Актуальная верхушка, из которой почищены по максимому `@alpha` и `@dev`
```json
{
    "name": "drupal/drupal",
    "description": "Drupal is an open source CMS",
    "type": "project",
    "license": "GPL-2.0+",
    "require": {
        "php": "~7.0",
        "composer/installers": "^1.0.24",
        "webmozart/path-util": "^2.3",
        "zaporylie/composer-drupal-optimizations": "^1.0",
        "onlyextart/colorbox": "dev-master",
        "drupal-composer/drupal-scaffold": "^2.5",
        "cweagans/composer-patches": "~1.0",
        "drush/drush": "^9.0.0",
        "drupal/core": "~8.0",
        "drupal/admin_toolbar": "^2.0",
        "drupal/ckeditor_youtube": "^1.1",
        "drupal/colorbox": "^1.4",
        "drupal/contact_ajax": "^1.4",
        "drupal/contact_block": "^1.4",
        "drupal/contact_storage": "^1.0",
        "drupal/ctools": "^3.0",
        "drupal/devel": "^4.0",
        "kint-php/kint": "^3.0",
        "drupal/field_group": "^3.0",
        "drupal/pathauto": "^1.0",
        "drupal/xmlsitemap": "^1.0@alpha",
        "drupal/token": "^1.0",
        "drupal/twig_tweak": "^2.0",
        "drupal/paragraphs": "^1.7",
        "drupal/cache_alter": "^1.0",
        "drupal/synajax": "^1.0",
        "drupal/synapse": "^1.0",
        "drupal/synhelper": "^1.0",
        "drupal/phpmail_alter": "^1.0",
        "drupal/contact_mail": "^1.0",
        "drupal/synmap": "^1.0",
        "drupal/xframe_allow_webvisor": "^1.0",
        "drupal/bootbase": "^1.0",
        "drupal/metatag": "^1.10"
        ...
```

## CmlStarter / сломан контекстный фильтр

1. `drush cr`
2. идём в конфигурацию сломанной вьюхи `/devel/config/edit/views.view.product`
3. делаем правку: https://git.synapse-studio.ru/d-org/cmlstarter/commit/172c3f3523481d15df176fb741dae66a50abd866
   - т.е. нужно удалить `10` строчку `- product_taxonomy_filter` из зависимостей
4. `mkdir modules/temp && echo $'name: temp\ntype: module\ncore: 8.x' > modules/temp/product_taxonomy_filter.info.yml`
5. `drush en product_taxonomy_filter && drush pmu product_taxonomy_filter`
6. `rm modules/temp/product_taxonomy_filter.info.yml && rm -r modules/temp`

### Устаревшие и дургие варианты
1. включаем модуль конфиг-ентити
1. переходим в импорт единичной вьюхи
1. берём views.view.product.yml файл из экспортированного конфига или из модуля
   - https://git.synapse-studio.ru/d-org/cmlstarter/blob/master/config/optional/views.view.product.yml
1. пытаемся его импортировать
  - если ругается на зависимость от `product_taxonomy_filter` - правим конфиг и импортируем
  - вот необходимя правка если что: https://git.synapse-studio.ru/d-org/cmlstarter/commit/172c3f3523481d15df176fb741dae66a50abd866
  
## Пропал модуль
1. делаем файл с названием модуля
1. включаем его
1. выключаем

## Path Alias / system_update_8804
```
The service "pathauto.alias_storage_helper" has a dependency on a non-existent service "path_alias.repository".
```
* `drush en drush en path_alias`

## Path Alias / system_update_8804
* При запуске `drush updatedb --yes` видим ошибку `system_update_8804`
   - (`Table 'drupal.path_alias' doesn't exist: INSERT INTO {path_alias} (id,`)

Нужно создать необходимые таблицы в базе вручную:

```sql

CREATE TABLE `path_alias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `revision_id` int(10) unsigned DEFAULT NULL,
  `uuid` varchar(128) CHARACTER SET ascii NOT NULL,
  `langcode` varchar(12) CHARACTER SET ascii NOT NULL,
  `path` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `path_alias_field__uuid__value` (`uuid`),
  UNIQUE KEY `path_alias__revision_id` (`revision_id`),
  KEY `path_alias__status` (`status`,`id`),
  KEY `path_alias__alias_langcode_id_status` (`alias`(191),`langcode`,`id`,`status`),
  KEY `path_alias__path_langcode_id_status` (`path`(191),`langcode`,`id`,`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='The base table for path_alias entities.';

CREATE TABLE `path_alias_revision` (
  `id` int(10) unsigned NOT NULL,
  `revision_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `langcode` varchar(12) CHARACTER SET ascii NOT NULL,
  `path` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `revision_default` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`revision_id`),
  KEY `path_alias__id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='The revision table for path_alias entities.';

```

## jQuery UI Touch Punch
* JS-библиотека для друпала: `composer require politsin/jquery-ui-touch-punch`
* или вручную:
  * `cd /var/www/html/libraries/`
  * `git clone https://github.com/furf/jquery-ui-touch-punch`
  * `cd jquery-ui-touch-punch/ && rm -rf .git`


##  Определения сущности/поля 
* `composer require 'drupal/devel_entity_updates:^3.0' && drush en devel_entity_updates`
* `drush entity-updates`

