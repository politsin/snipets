<?php
namespace Drupal\city\Controller;

/**
 * @file
 * Contains \Drupal\app\Controller\AjaxResult.
 */

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Request;

/**
 * Controller routines for page example routes.
 */
class GetCity extends ControllerBase {

  /**
   * Get Cached.
   */
  public static function get() {
    $data = &drupal_static('GetCity::get()');
    if (!isset($data)) {
      $host = \Drupal::request()->getHost();
      $lang = \Drupal::languageManager()->getCurrentLanguage()->getId();
      $cache_key = 'city:' . $host . ':' . $lang;
      if ($cache = \Drupal::cache()->get($cache_key)) {
        $data = $cache->data;
      }
      else {
        $data = self::detect($host);
        \Drupal::cache()->set($cache_key, $data);
      }
    }
    return $data;
  }
