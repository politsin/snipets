#Drupal Services Example

```php
<?php

$config = \Drupal::config('city.settings');
$phone = $config->get('phone');


$subdomain = \Drupal::service('idna.service')->decode($subdomain);
$frontpage = \Drupal::service('path.matcher')->isFrontPage();
$node = \Drupal::request()->attributes->get('node');
$path = \Drupal::service('path.current')->getPath(); //String
$host = \Drupal::request()->getHost();
$lang = \Drupal::languageManager()->getCurrentLanguage()->getId();
$request = \Drupal::request();

$storage = \Drupal::entityManager()->getStorage('city');
$terms_storage = \Drupal::service('entity_type.manager')->getStorage("taxonomy_term");

```
