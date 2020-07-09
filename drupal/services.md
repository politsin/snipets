#Drupal Services Example

```php
<?php

use Symfony\Component\HttpFoundation\Request;
public function page(Request $request) {
  $key = $request->query->get('key');
  $key = \Drupal::request()->query->get('key');
}

$config = \Drupal::config('city.settings');
$phone = $config->get('phone');

\Drupal::service('date.formatter')->format($timestamp, $type, $format, $timezone, $langcode);

\Drupal::transliteration()->transliterate($foo);

\Drupal::service('uuid')->generate();

$subdomain = \Drupal::service('idna')->decode($subdomain);
$frontpage = \Drupal::service('path.matcher')->isFrontPage();
$node = \Drupal::request()->attributes->get('node');
$path = \Drupal::service('path.current')->getPath(); //String
$host = \Drupal::request()->getHost();
$lang = \Drupal::languageManager()->getCurrentLanguage()->getId();

// Request.
$request = \Drupal::request();
$request->getUri(); // "https://example.com/app/debug"
$request->getRequestUri(); // "/app/debug"

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

// drupal_message
\Drupal::messenger()->addMessage('Hello world', $type);
// Specific.
\Drupal::messenger()->addError('Hello world');
\Drupal::messenger()->addStatus('Hello world');
\Drupal::messenger()->addWarning('Hello world');

// Watchdog
\Drupal::logger('my_module')->notice($message);
\Drupal::logger('my_module')->error($message);

```
