#Drupal Services Example

```php
<?php

$config = \Drupal::config('city.settings');
$phone = $config->get('phone');

\Drupal::service('date.formatter')->format($timestamp, $type, $format, $timezone, $langcode);

\Drupal::transliteration()->transliterate($foo);

\Drupal::service('uuid')->generate();

$subdomain = \Drupal::service('idna.service')->decode($subdomain);
$frontpage = \Drupal::service('path.matcher')->isFrontPage();
$node = \Drupal::request()->attributes->get('node');
$path = \Drupal::service('path.current')->getPath(); //String
$host = \Drupal::request()->getHost();
$lang = \Drupal::languageManager()->getCurrentLanguage()->getId();
$request = \Drupal::request();

$storage = \Drupal::entityManager()->getStorage('city');
$terms_storage = \Drupal::service('entity_type.manager')->getStorage("taxonomy_term");

use \Drupal\user\Entity\User;
$uid = \Drupal::currentUser()->id();
$user = User::load($uid);

\Drupal::service('module_handler')->alter('letsencrypt_challenge', $challenge, $drupalroot);
$dir = \Drupal::service('file_system')->realpath('private://');

// Cache.
$renderCache = \Drupal::service('cache.render');
$renderCache->invalidateAll();
```
