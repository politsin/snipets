<?php

namespace Drupal\app\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class HomeController.
 */
class HomeController extends ControllerBase {

  /**
   * Now.
   */
  public static function now($info = '') {
    usleep(500000);
    $time = format_date(time(), 'custom', 'i:s');
    $t = microtime(TRUE);
    $micro = sprintf("%06d", ($t - floor($t)) * 1000000);
    $d = new \DateTime(date('Y-m-d H:i:s.' . $micro, $t));
    $time = $d->format("i:s.u");
    $output = [
      '#markup' => "now {$info}: {$time}<br>",
      '#cache' => [
        'contexts' => [
          'user',
        ],
        'max-age' => -1,
      ],
    ];
    return $output;
  }

  /**
   * Home.
   */
  public function home() {
    $time_start = microtime(TRUE);
    $render_array = [
      'now' => $this->now('inline'),
      'lazy' => [
        '#create_placeholder' => TRUE,
        '#lazy_builder' => [
          __CLASS__ . '::now',
          ['lazy'],
        ],
      ],
    ];
    $time_end = microtime(TRUE);
    $duration = number_format(1000 * ($time_end - $time_start), 2);
    $render_array['duration'] = [
      '#markup' => $this->t('time = @t ms.', ['@t' => $duration]),
    ];
    return $render_array;
  }

}
